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
	private $arrUser=array();
	private $arrLinks=array();
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
	}//private function getForumId()
	
	private function updateTracker()
	{
		if(($this->forumid!=0) && ($this->user_logged_in==true))
		{
			$currenttime=time();
			$objTracker = $this->Database->prepare("SELECT tstamp FROM tl_forum_forum_tracker WHERE user=? AND forum=?")->execute($this->arrUser['id'],$this->forumid);
			if($objTracker->numRows!=0)
			{
				$arrSetTracker = array
				(
					'tstamp' => $currenttime
				);
				$this->Database->prepare("UPDATE tl_forum_forum_tracker %s WHERE user=? AND forum=?")->set($arrSetTracker)->execute($this->arrUser['id'],$this->forumid);
			}
			else
			{
				$arrSetTracker = array
				(
					'forum' => $this->forumid,
					'user' => $this->arrUser['id'],
					'tstamp' => $currenttime
				);
				$this->Database->prepare("INSERT INTO tl_forum_forum_tracker %s")->set($arrSetTracker)->execute();
			}
			
		}
	}//private function updateTracker()
	
	private function getForumBreadcrumb($intForumid, $arrCrumbs)
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
	}//private function getForumBreadcrumb
	
	private function getForumStatus($forumid)
	{
		//We are checking currently the last_post_time. This could change in the future
		$arrStatus=array();
		$objTracker = $this->Database->prepare("SELECT forum.last_change_time,forum.last_post_time,tracker.tstamp 
														FROM tl_forum_forums as forum 
														JOIN tl_forum_forum_tracker as tracker
														ON forum.id=tracker.forum
														WHERE tracker.forum=? AND tracker.user=?")->execute($forumid,$this->arrUser['id']);
		//Check if anything new has happened afer the user's last visit
		if ($objTracker->numRows==0)
		{
			//Unread
			$arrStatus[]='unread';
		}
		elseif($objTracker->last_change_time > $objTracker->tstamp)
		{
			//Forum has changed after last visit
			$arrStatus[]='unread';
		}
		elseif($objTracker->last_change_time <= $objTracker->tstamp)
		{
			//Last visit was after the last change
			$arrStatus[]='read';
		}
		return $arrStatus;
	}//private function getForumStatus()
	
	private function getThreadStatus($threadid)
	{
		//We are checking currently the last_post_time. This could change in the future
		$arrStatus=array();
		$objThread = $this->Database->prepare("SELECT thread_type, locked, deleted FROM tl_forum_threads WHERE id=?")->executeUncached($threadid);
		$objTracker = $this->Database->prepare("SELECT thread.last_change_time, thread.last_post_time, tracker.tstamp 
														FROM tl_forum_threads as thread 
														JOIN tl_forum_thread_tracker as tracker
														ON thread.id=tracker.thread
														WHERE tracker.thread=? AND tracker.user=?")->executeUncached($threadid,$this->arrUser['id']);
		//Check if anything new has happened afer the user's last visit
		if ($objTracker->numRows==0)
		{
			//Unread
			$arrStatus[]='unread';
		}
		elseif($objTracker->last_change_time > $objTracker->tstamp)
		{
			//Forum has changed after last visit
			$arrStatus[]='unread';
		}
		elseif($objTracker->last_change_time <= $objTracker->tstamp)
		{
			//Last visit was after the last change
			$arrStatus[]='read';
		}
		//Check for thread type
		switch($objThread->thread_type)
		{
			case 'N':
				$arrStatus[]='normal';
				break;
			case 'A':
				$arrStatus[]='announcement';
				break;
			case 'B':
				$arrStatus[]='broadcast';
				break;
		}
		if($objThread->locked=='1')
		{
			$arrStatus[]='locked';
		}
		if($objThread->deleted=='1')
		{
			$arrStatus[]='deleted';
		}
		if($objThread->special=='1')
		{
			$arrStatus[]='special';
		}
		return $arrStatus;
	}//private function getForumStatus()
	
	private function getForums()
	{
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
				'last_post_link'=>$this->generateFrontendUrl($this->arrLinks['thread_reader']->row(),'/thread/' . $objLastPost->pid) . '#' . $objLastPost->id,
				'status'=>$this->getForumStatus($objForums->id),
				'special'=>$objForums->special
			);
		}
		return $arrForums;
	}//private function getForums()
	
	private function getThreads($deleted,$thread_type)
	{
		$arrThreads=array();
		if($thread_type=='B')//Broadcasted thread must not be search with pid
		{
			$objThreads = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE deleted=? AND thread_type=? ORDER BY sorting ASC")->execute($deleted,$thread_type);
		}
		else
		{
			$objThreads = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE pid=? AND deleted=? AND thread_type=? ORDER BY sorting ASC")->execute($this->forumid,$deleted,$thread_type);
		}
		
		
		while($objThreads->next()){
			$objPosts = $this->Database->prepare("SELECT count(id) as cnt FROM tl_forum_posts WHERE pid=? AND deleted=?")->execute($objThreads->id,'');
			$objLastThreadPost = $this->Database->prepare("SELECT * FROM tl_forum_posts WHERE pid=? AND deleted=? ORDER BY created_time DESC LIMIT 0,1")->execute($objThreads->id,'');
			$arrThreads[]=array(
				'id'=>$objThreads->id,
				'title'=>$objThreads->title,
				'created_by'=>$this->arrMember[$objThreads->created_by]['username'],
				'redirect'=>$this->generateFrontendUrl($this->arrLinks['thread_reader']->row(),'/thread/' . $objThreads->id),
				'post_count'=>$objPosts->cnt,
				'last_post_id'=>$objLastThreadPost->id,
				'last_post_user'=>$this->arrMember[$objLastThreadPost->created_by]['username'],
				'last_post_title'=>$objLastThreadPost->title,
				'last_post_date'=>date($GLOBALS['TL_CONFIG']['dateFormat'],$objLastThreadPost->created_date),
				'last_post_time'=>date($GLOBALS['TL_CONFIG']['timeFormat'],$objLastThreadPost->created_time),
				'last_post_link'=>$this->generateFrontendUrl($this->arrLinks['thread_reader']->row(),'/thread/' . $objLastThreadPost->pid) . '#' . $objLastThreadPost->id,
				'thread_type'=>$objThreads->thread_type,
				'status'=>$this->getThreadStatus($objThreads->id)
			);
		}
		return $arrThreads;
	}//private function getThreads()
	
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
		//Initialize
		$functions = new forum_common_functions();
		$this->arrMember=$functions->getMember();
		$this->arrUser=$functions->getUser();
		$this->arrLinks= $functions->getInternalLinks();
		
		$this->getForumId();
		$this->updateTracker();
		
		//Get data and send them to template
		$this->Template->forums=$this->getForums();
		$this->Template->threadcreator=$this->generateFrontendUrl($this->arrLinks['thread_editor']->row(),'/forum/' . $this->forumid . '/mode/new');
		$this->Template->threads=$this->getThreads('','N'); //Get the normal threads
		$this->Template->announcements=$this->getThreads('','A'); //Get announcements
		$this->Template->broadcasts=$this->getThreads('','B'); //Get broadcasts
		$this->Template->num_threads=count($this->Template->threads)+count($this->Template->announcements)+count($this->Template->broadcasts);
		$this->Template->forumid=$this->forumid;
		$this->Template->forumbreadcrumbs=$this->getForumBreadcrumb($this->forumid,array());
	}//protected function compile()
	
	
}

?>