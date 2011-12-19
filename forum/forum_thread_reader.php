<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    forum 
 * @license    LGPL 
 * @filesource
 */


/**
 * Class forum_thread_reader 
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */
class forum_thread_reader extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'forum_thread_reader';
	private $arrMember=array();
	private $threadid;
	private $user=array();
	private $user_logged_in=false;
	private $objPostEditor;
	private $objThreadReader;
	private $objModeratorPanel;
	private $arrThread=array();
	
	private function getThreadInformation()
	{
		$objThread = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE id=?")->execute($this->threadid);
		$this->arrThread['title']=$objThread->title;
		$this->arrThread['locked']=$objThread->locked;
	}
	private function getInternalLinks()
	{
		$this->objPostEditor = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($GLOBALS['TL_CONFIG']['forum_redirect_posteditor']);
		
		$this->objThreadReader = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($GLOBALS['TL_CONFIG']['forum_redirect_threadreader']);
		$this->objModeratorPanel = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($GLOBALS['TL_CONFIG']['forum_redirect_moderator_panel']);
	}
	private function getPosts()
	{
		$objPosts = $this->Database->prepare("SELECT * FROM tl_forum_posts WHERE pid=? AND deleted=? ORDER BY order_no ASC")->execute($this->threadid,'');
		$i=0;
		while($objPosts->next()){
				$i++;
				$arrPosts[]=array(
				'id'=>$objPosts->id,
				'class'=>(($i == 1) ? 'first ' : '') . (($i == $objPosts->numRows) ? 'last ' : '') . ((($i % 2) == 0) ? 'even' : 'odd'),
				'post_no'=>$i,
				'created_date'=>date($GLOBALS['TL_CONFIG']['dateFormat'],$objPosts->created_date),
				'created_time'=>date($GLOBALS['TL_CONFIG']['timeFormat'],$objPosts->created_time),
				'creator_id'=>$this->arrMember[$objPosts->created_by]['id'],
				'creator_username'=>$this->arrMember[$objPosts->created_by]['username'],
				'creator_signature'=>$this->arrMember[$objPosts->created_by]['signature'],
				'title'=>$objPosts->title,
				'text'=>$objPosts->text,
				'changed'=>$objPosts->changed,
				'last_change_by'=>$this->arrMember[$objPosts->last_change_by]['username'],
				'last_change_date'=>date($GLOBALS['TL_CONFIG']['dateFormat'],$objPosts->last_change_date),
				'last_change_time'=>date($GLOBALS['TL_CONFIG']['timeFormat'],$objPosts->last_change_time),
				'last_change_reason'=>$objPosts->last_change_reason,
				'quote_link'=>$this->generateFrontendUrl($this->objPostEditor->row(),'/thread/' . $this->threadid . '/mode/quote/post/' . $objPosts->id),
				'edit_link'=>$this->generateFrontendUrl($this->objPostEditor->row(),'/thread/' . $this->threadid . '/mode/edit/post/' . $objPosts->id),
				'mod_tools_delete_link'=>$this->generateFrontendUrl($this->objThreadReader->row(),'/thread/' . $this->threadid . '/mode/mod-delete-post/post/' . $objPosts->id),
				);
		}
		return $arrPosts;
	}
	private function getUser()
	{
		$this->import('FrontendUser', 'Member');
		if(FE_USER_LOGGED_IN)
		{
			$this->user=array(
				'id'=>$this->Member->id,
				'firstname'=>$this->Member->firstname,
				'lastname'=>$this->Member->lastname,
				'username'=>$this->Member->username,
				'groups'=>$this->Member->groups
			);
			$this->Template->member=$user;
			$this->Template->member_loggedin=true;
			$this->user_logged_in=true;
		}
		else
		{
			$this->Template->member_loggedin=false;
			$this->user_logged_in=false;
		}
	}
	private function getThreadId()
	{
		if($this->forum_use_fixed_thread=='1'){
			$this->threadid = $this->forum_fixed_thread;
		}
		else
		{
			$this->threadid = $this->Input->get('thread');
		}
	}
	
	private function updateTracker()
	{
		if(($this->threadid!=0) && ($this->user_logged_in==true))
		{
			$currenttime=time();
			$objTracker = $this->Database->prepare("SELECT tstamp FROM tl_forum_thread_tracker WHERE user=? AND thread=?")->execute($this->user['id'],$this->threadid);
			if($objTracker->numRows!=0)
			{
				$arrSetTracker = array
				(
					'tstamp' => $currenttime
				);
				$this->Database->prepare("UPDATE tl_forum_thread_tracker %s WHERE user=? AND thread=?")->set($arrSetTracker)->execute($this->user['id'],$this->threadid);
			}
			else
			{
				$arrSetTracker = array
				(
					'thread' => $this->threadid,
					'user' => $this->user['id'],
					'tstamp' => $currenttime
				);
				$this->Database->prepare("INSERT INTO tl_forum_thread_tracker %s")->set($arrSetTracker)->execute();
			}
			
		}
	}

	private function getMember()
	{
		$objMembers = $this->Database->prepare("SELECT * FROM tl_member")->execute();
		$objMemberSettings = $this->Database->prepare("SELECT signature FROM tl_forum_user_settings WHERE user=?")->execute($objMembers->id);
		while($objMembers->next()){
			$this->arrMember[$objMembers->id]=array(
			'id'=>$objMembers->id,
			'username'=>$objMembers->username,
			'firstname'=>$objMembers->firstname,
			'lastname'=>$objMembers->lastname,
			'signature'=>$objMemberSettings->signature
			);
		}
	}
	
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$return="Forum - Thread reader";
			return $return;
		}
		return parent::generate();
	}
	
	/**
	 * Generate module
	 */
	protected function compile()
	{
		$this->getUser();
		$this->getThreadId();
		$this->getInternalLinks();
		$this->Template->postcreator=$this->generateFrontendUrl($this->objPostEditor->row(),'/thread/' . $this->threadid . '/mode/new');
		$this->getThreadInformation();
		$this->Template->thread = $this->arrThread;
		$this->getMember();
		$this->updateTracker();
		$this->Template->posts=$this->getPosts();
		
		
	}
}

?>