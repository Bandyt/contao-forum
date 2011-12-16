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
 * Class forum_forum_list 
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */
class forum_forum_list extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'forum_forum_list';
	private $arrMember=array();
	private $user=array();
	private $user_logged_in=false;
	private $forumid;
	
	private function getForumId()
	{
		if($this->forum_use_fixed_forum=='1'){
			$this->forumid = $this->forum_fixed_forum;
		}
		else
		{
			$this->forumid = $this->Input->get('forum');
		}
		if($this->forumid==''){
			$this->forumid=0;
		}
	}
	
	private function updateTracker()
	{
		if(($this->forumid!=0) && ($this->user_logged_in==true))
		{
			$currenttime=time();
			$objTracker = $this->Database->prepare("SELECT tstamp FROM tl_forum_forum_tracker WHERE user=? AND forum=?")->execute($this->user['id'],$this->forumid);
			if($objTracker->numRows!=0)
			{
				$arrSetTracker = array
				(
					'tstamp' => $currenttime
				);
				$this->Database->prepare("UPDATE tl_forum_forum_tracker %s WHERE user=? AND forum=?")->set($arrSetTracker)->execute($this->user['id'],$this->forumid);
			}
			else
			{
				$arrSetTracker = array
				(
					'forum' => $this->forumid,
					'user' => $this->user['id'],
					'tstamp' => $currenttime
				);
				$this->Database->prepare("INSERT INTO tl_forum_forum_tracker %s")->set($arrSetTracker)->execute();
			}
			
		}
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
	
	private function getMember()
	{
		$objMembers = $this->Database->prepare("SELECT * FROM tl_member")->execute();
		
		while($objMembers->next()){
			$this->arrMember[$objMembers->id]=array(
			'id'=>$objMembers->id,
			'username'=>$objMembers->username,
			'firstname'=>$objMembers->firstname,
			'lastname'=>$objMembers->lastname
			);
		}
	}
	public function getForumBreadcrumb($intForumid, $arrCrumbs)
	{
		$objForum = $this->Database->prepare("SELECT id,title,pid FROM tl_forum_forums WHERE id=?")->execute($intForumid);
		$class='';
		if($intForumid==0)
		{
			$arrNewCrumb = array(
				'id' => $objForum->id,
				'title' => $GLOBALS['TL_LANG']['forum']['forum'],
				'link' => $this->addToUrl('forum=0'),
				'class' => $class
			);
		}
		else
		{
			$arrNewCrumb = array(
				'id' => $objForum->id,
				'title' => $objForum->title,
				'link' => $this->addToUrl('forum=' . $objForum->id),
				'class' => $class
			);
		}
		
		array_unshift($arrCrumbs,$arrNewCrumb);
		if($objForum->id!=0)
		{
			$arrTotalArray=$this->getForumBreadcrumb($objForum->pid,$arrCrumbs);
			return $arrTotalArray;
		}
		else
		{
			return $arrCrumbs;
		}
		
		
		
		
	}//public function getForumBreadcrumb
	
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$return="Forum - Forum list";
			return $return;
		}
		return parent::generate();
	}

	/**
	 * Generate module
	 */
	protected function compile()
	{
		$this->getForumId();
		$this->getUser();
		$this->updateTracker();
		$this->getMember();
		
		$objThreadReader = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($this->forum_redirect_threadreader);
													
		$objForums = $this->Database->prepare("SELECT * FROM tl_forum_forums WHERE pid=? ORDER BY sorting ASC")->execute($this->forumid);
		while($objForums->next()){
			$objThreads = $this->Database->prepare("SELECT count(id) as num_threads FROM tl_forum_threads WHERE pid=?")->execute($objForums->id);
			$objLastPost = $this->Database->prepare("SELECT thr.title as thread_title,pst.* FROM tl_forum_threads as thr INNER JOIN tl_forum_posts as pst ON thr.id=pst.pid WHERE thr.pid=? ORDER BY created_time DESC LIMIT 0,1")->execute($objForums->id);
			if($objThreads->num_threads==0)
			{
				$Threads=0;
			}
			else
			{
				$Threads=$objThreads->num_threads;
			}
			$arrForums[]=array(
				'id'=>$objForums->id,
				'title'=>$objForums->title,
				'redirect'=>$this->addToUrl('forum=' . $objForums->id),
				'num_threads'=>$Threads,
				'last_post_creator'=>$this->arrMember[$objLastPost->created_by]['username'],
				'last_post_date'=>date($GLOBALS['TL_CONFIG']['dateFormat'],$objLastPost->created_date),
				'last_post_time'=>date($GLOBALS['TL_CONFIG']['timeFormat'],$objLastPost->created_time),
				'last_post_title'=>$objLastPost->thread_title,
				'last_post_link'=>$this->generateFrontendUrl($objThreadReader->row(),'/thread/' . $objLastPost->pid) . '#' . $objLastPost->id
			);
		}
		$this->Template->forums=$arrForums;
		
		
												
		$objThreads = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE pid=? ORDER BY sorting ASC")->execute($this->forumid);
		while($objThreads->next()){
			$objPosts = $this->Database->prepare("SELECT count(id) as cnt FROM tl_forum_posts WHERE pid=? AND deleted=?")->execute($objThreads->id,'');
			$objLastThreadPost = $this->Database->prepare("SELECT * FROM tl_forum_posts WHERE pid=? AND deleted=? ORDER BY created_time DESC LIMIT 0,1")->execute($objThreads->id,'');
			$arrThreads[]=array(
				'id'=>$objThreads->id,
				'title'=>$objThreads->title,
				'created_by'=>$this->arrMember[$objThreads->created_by]['username'],
				'redirect'=>$this->generateFrontendUrl($objThreadReader->row(),'/thread/' . $objThreads->id),
				'post_count'=>$objPosts->cnt,
				'last_post_id'=>$objLastThreadPost->id,
				'last_post_user'=>$arrMember[$objLastThreadPost->created_by]['username'],
				'last_post_title'=>$objLastThreadPost->title,
				'last_post_date'=>date($GLOBALS['TL_CONFIG']['dateFormat'],$objLastThreadPost->created_date),
				'last_post_time'=>date($GLOBALS['TL_CONFIG']['timeFormat'],$objLastThreadPost->created_time),
				'last_post_link'=>$this->generateFrontendUrl($objThreadReader->row(),'/thread/' . $objLastThreadPost->pid) . '#' . $objLastThreadPost->id
			);
		}
		$objThreadEditor = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($this->forum_redirect_threadeditor);
		$this->Template->threadcreator=$this->generateFrontendUrl($objThreadEditor->row(),'/forum/' . $this->forumid . '/mode/new');
		$this->Template->num_threads=count($arrThreads);
		$this->Template->threads=$arrThreads;
		$this->Template->forumid=$this->forumid;
		$this->Template->forumbreadcrumbs=$this->getForumBreadcrumb($this->forumid,array());
	}//protected function compile()
	
	
}

?>