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
 * Class forum_moderator_panel 
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */
class forum_moderator_panel extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'forum_moderator_panel';
	private $arrMember=array();
	private $arrUser=array();
	private $arrInternalLinks=array();
	private $arrThread=array();
	private $functions;
	
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$return="Forum - Moderator panel";
			return $return;
		}
		return parent::generate();
	}
	
	private function getThreadInformation()
	{
		$objThread = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE id=?")->execute($this->threadid);
		$this->arrThread['title']=$objThread->title;
		$this->arrThread['locked']=$objThread->locked;
	}
	
	private function overview()
	{
		$this->Template =  new FrontendTemplate("forum_moderator_panel_overview");
		$this->Template->link_threadmanagement=$this->generateFrontendUrl($this->arrInternalLinks['moderator_panel']->row(),'/mode/threadmanagement/thread/' . $this->Input->get('thread'));
		$this->Template->link_usermanagement=$this->generateFrontendUrl($this->arrInternalLinks['moderator_panel']->row(),'/mode/usermanagement/user/' . $this->Input->get('user'));
	}
	
	private function getChildForums($intForumId,$intDepth,$arrForums)
	{
		$strMinus='';
		for($i=0;$i<$intDepth;$i++)
		{
			$strMinus.='-';
		}
		$objForums = $this->Database->prepare("SELECT * FROM tl_forum_forums WHERE pid=?")->execute($intForumId);
		if($objForums->numRows>0)
		{
			while($objForums->next())
			{
				$arrForums[]=array(
					'id'=>$objForums->id,
					'title'=>$strMinus . $objForums->title
				);
				$arrForums=$this->getChildForums($objForums->id,$intDepth+1,$arrForums);
			}
		}
		return $arrForums;
	}
	
	private function threadmanagement()
	{
		$this->Template =  new FrontendTemplate("forum_moderator_panel_threadmanagement");
		$this->Template->link_overview=$this->generateFrontendUrl($this->arrInternalLinks['moderator_panel']->row(),'/mode/overview');
		$this->Template->link_usermanagement=$this->generateFrontendUrl($this->arrInternalLinks['moderator_panel']->row(),'/mode/usermanagement/user/' . $this->Input->get('user'));
		//Check for the current thread (First from url parameter and then from post-parameter)
		if($this->Input->get('thread') && $this->Input->get('thread')!='')
		{
			$current_thread=$this->Input->get('thread');
		}
		if($this->Input->post('thread') && $this->Input->post('thread')!='')
		{
			$current_thread=$this->Input->post('thread');
		}
		//If there is a current thread, list information about it
		if($current_thread!='')
		{
			$objThread = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE id=?")->execute($current_thread);
			$objPosts = $this->Database->prepare("SELECT count(id) as posts FROM tl_forum_posts WHERE pid=?")->execute($current_thread);
			$arrThread = array(
				'id' => $objThread->id,
				'title' => $objThread->title,
				'created_by' => $this->functions->getUsernameFromId($objThread->created_by),
				'created_date' => $objThread->created_date,
				'created_time' => date($GLOBALS['TL_CONFIG']['timeFormat'],$objThread->created_time),
				'created_date' => date($GLOBALS['TL_CONFIG']['dateFormat'],$objThread->created_date),
				'deleted' => $this->functions->convertCheckboxvalueToString($objThread->deleted),
				'locked' => $this->functions->convertCheckboxvalueToString($objThread->locked),
				'special' => $this->functions->convertCheckboxvalueToString($objThread->special),
				'thread_type' => $this->functions->threadTypeToString($objThread->thread_type),
				'posts' => $objPosts->posts
			);
		}		
		//check for the current forum or take the defined root
		if($this->Input->get('forum') && $this->Input->get('forum')!='')
		{
			$current_forum=$this->Input->get('forum');
		}
		if($this->Input->post('forum') && $this->Input->post('forum')!='')
		{
			$current_forum=$this->Input->post('forum');
		}
		if($current_forum==''){
			$current_forum=$this->forum_forum_root;
		}
		//list all threads in this forum
		$objAllThreads = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE pid=?")->execute($current_forum);
		$this->log("Listing threads for forum " . $current_forum . ". No of threads: " . $objAllThreads->numRows, 'forum_moderator_panel.threadmanagement()', TL_INFO);
		while($objAllThreads->next())
		{
			$arrAllThreads[]=array(
				'id'=>$objAllThreads->id,
				'title'=>$objAllThreads->title,
				'link_show'=>$this->generateFrontendUrl($this->arrInternalLinks['moderator_panel']->row(),'/mode/threadmanagement/thread/' . $objAllThreads->id)
			);
		}
		$this->Template->allthreads=$arrAllThreads;
		$this->Template->thread=$arrThread;
		//Get a forums in this root and list them for the select field
		$arrAllForums=$this->getChildForums($this->forum_forum_root,0,array());
		$this->Template->allForums=$arrAllForums;
		
	}
	
	private function usermanagement()
	{
		$this->Template =  new FrontendTemplate("forum_moderator_panel_usermanagement");
		$this->Template->link_threadmanagement=$this->generateFrontendUrl($this->arrInternalLinks['moderator_panel']->row(),'/mode/threadmanagement/thread/' . $this->Input->get('thread'));
		$this->Template->link_overview=$this->generateFrontendUrl($this->arrInternalLinks['moderator_panel']->row(),'/mode/overview');
		if($this->Input->get('user') && $this->Input->get('user')!='')
		{
			$current_user=$this->Input->get('user');
		}
		if($this->Input->post('user') && $this->Input->post('user')!='')
		{
			$current_user=$this->Input->post('user');
		}
		if($current_user!='')
		{
			//Get user information
			$objUser = $this->Database->prepare("SELECT * FROM tl_member WHERE id=?")->execute($current_user);
			$objUserSettings= $this->Database->prepare("SELECT * FROM tl_forum_user_settings WHERE pid=? AND user=?")->execute($this->forum_forum_root,$current_user);
			$objPosts = $this->Database->prepare("SELECT count(id) as posts FROM tl_forum_posts WHERE created_by=?")->execute($current_user);
			$objThreads = $this->Database->prepare("SELECT count(id) as threads FROM tl_forum_threads WHERE created_by=?")->execute($current_user);
			$arrUser= array(
				'username' => $objUser->username,
				'signature' => $objUserSettings->signature,
				'threads' => $objThreads->threads,
				'posts' => $objPosts->posts
				
			);
			$this->Template->user=$arrUser;
		}
		$this->Template->current_user=$current_user;
		//Get list of user
		$objUsers = $this->Database->prepare("SELECT * FROM tl_member")->execute();
		while($objUsers->next())
		{
			$arrUsers[]=array(
				'username'=>$objUsers->username,
				'id' => $objUsers->id
			);
		}
		$this->Template->users=$arrUsers;
	}
	
	/**
	 * Generate module
	 */
	protected function compile()
	{
		$this->functions = new forum_common_functions();
		$this->arrInternalLinks=$this->functions->getInternalLinksFromForum($this->forum_forum_root);
		$this->arrUser=$this->functions->getUser();
		
		switch($this->Input->get('mode'))
		{
			case 'mod-delete-post':
				$this->log("Delete post", 'forum_moderator_panel.processInput()', TL_INFO);
				if($this->Input->get('post')!='')
				{
					$arrSetPost = array
					(
						'deleted' => '1'
					);
					$this->Database->prepare("UPDATE tl_forum_posts %s WHERE id=?")->set($arrSetPost)->execute($this->Input->get('post'));
					$logging = new forum_logging();
					$logging->moderator_log($this->forum_forum_root,'forum_logging_mod_delete_post',0,0,$this->Input->get('post'),0,$this->arrUser['id'],$this->Environment->ip,'MOD_DELETE_POST','TL_FORUM_POSTS.DELETED','','1','POST');
					$this->redirect($this->generateFrontendUrl($this->arrInternalLinks['thread_reader']->row(),'/thread/' . $this->Input->get('thread')));
				}
				break;
			
			case '':
			case 'overview':
				$this->overview();
				break;
			case 'threadmanagement':
				$this->threadmanagement();
				break;
			case 'usermanagement':
				$this->usermanagement();
				break;
		}
	}
}

?>