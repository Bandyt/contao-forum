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
	private $intThreadId;
	private $arrUser=array();
	private $arrLinks=array();
	private $arrThread=array();
	
	private function getThreadInformation()
	{
		$objThread = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE id=?")->execute($this->intThreadId);
		$this->arrThread['title']=$objThread->title;
		$this->arrThread['locked']=$objThread->locked;
	}
	
	private function getPosts()
	{
		$objPosts = $this->Database->prepare("SELECT * FROM tl_forum_posts WHERE pid=? AND deleted=? ORDER BY order_no ASC")->execute($this->intThreadId,'');
		$intI=0;
		while($objPosts->next()){
				$intI++;
				$strPostText=$objPosts->text;
				
				if (isset($GLOBALS['TL_HOOKS']['forum_parsePostText']) && is_array($GLOBALS['TL_HOOKS']['forum_parsePostText'])) 
				{ 
					foreach ($GLOBALS['TL_HOOKS']['forum_parsePostText'] as $callback) 
					{ 
						$this->import($callback[0]); 
						$strPostText = $this->$callback[0]->$callback[1]($strPostText,$objPosts->id,$this->intThreadId); 
					} 
				}  
				$arrPosts[]=array(
				'id'=>$objPosts->id,
				'class'=>(($intI == 1) ? 'first ' : '') . (($intI == $objPosts->numRows) ? 'last ' : '') . ((($intI % 2) == 0) ? 'even' : 'odd'),
				'post_no'=>$intI,
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
				'quote_link'=>$this->generateFrontendUrl($this->arrLinks['post_editor']->row(),'/thread/' . $this->intThreadId . '/mode/quote/post/' . $objPosts->id),
				'edit_link'=>$this->generateFrontendUrl($this->arrLinks['post_editor']->row(),'/thread/' . $this->intThreadId . '/mode/edit/post/' . $objPosts->id),
				'mod_tools_delete_link'=>$this->generateFrontendUrl($this->arrLinks['moderator_panel']->row(),'/thread/' . $this->intThreadId . '/mode/mod-delete-post/post/' . $objPosts->id),
				);
		}
		return $arrPosts;
	}
	
	private function getThreadId()
	{
		if($this->forum_use_fixed_thread=='1'){
			$this->intThreadId = $this->forum_fixed_thread;
		}
		else
		{
			$this->intThreadId = $this->Input->get('thread');
		}
	}
	
	private function updateTracker()
	{
		if(($this->intThreadId!=0) && ($this->user_logged_in==true))
		{
			$currenttime=time();
			$objTracker = $this->Database->prepare("SELECT tstamp FROM tl_forum_thread_tracker WHERE user=? AND thread=?")->execute($this->arrUser['id'],$this->intThreadId);
			if($objTracker->numRows!=0)
			{
				$arrSetTracker = array
				(
					'tstamp' => $currenttime
				);
				$this->Database->prepare("UPDATE tl_forum_thread_tracker %s WHERE user=? AND thread=?")->set($arrSetTracker)->execute($this->arrUser['id'],$this->intThreadId);
			}
			else
			{
				$arrSetTracker = array
				(
					'thread' => $this->intThreadId,
					'user' => $this->arrUser['id'],
					'tstamp' => $currenttime
				);
				$this->Database->prepare("INSERT INTO tl_forum_thread_tracker %s")->set($arrSetTracker)->execute();
			}
			
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
		$functions = new forum_common_functions();
		$this->arrMember=$functions->getMember();
		$this->arrUser=$functions->getUser();
		$this->arrLinks= $functions->getInternalLinks();
		
		$this->getThreadId();
		$this->Template->postcreator=$this->generateFrontendUrl($this->arrLinks['post_editor']->row(),'/thread/' . $this->intThreadId . '/mode/new');
		$this->getThreadInformation();
		$this->Template->thread = $this->arrThread;
		$this->updateTracker();
		$this->Template->posts=$this->getPosts();
		
		
	}
}

?>