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

	public function getForumBreadcrumb($intForumid, $arrCrumbs)
	{
		$this->log("Breadcrumb for " . $intForumid, 'Forum list - getForumBreadcrumb', TL_INO);
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
		//###########################################
		//Get forum id
		//###########################################
		if($this->forum_use_fixed_forum=='1'){
			$forumid = $this->forum_fixed_forum;
		}
		else
		{
			$forumid = $this->Input->get('forum');
		}
		if($forumid==''){
			$forumid=0;
		}
		
		//###########################################
		//Get user information
		//###########################################
		$this->import('FrontendUser', 'Member');
		if(FE_USER_LOGGED_IN)
		{
			$user=array(
				'id'=>$this->Member->id,
				'firstname'=>$this->Member->firstname,
				'lastname'=>$this->Member->lastname,
				'username'=>$this->Member->username,
				'groups'=>$this->Member->groups
			);
			$this->Template->member=$user;
			$this->Template->member_loggedin=true;
		}
		else
		{
			$this->Template->member_loggedin=false;
		}
		
		//###########################################
		//Get forums and threads and list them
		//###########################################
		$objThreadReader = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($this->forum_redirect_threadreader);
												
		$objMembers = $this->Database->prepare("SELECT * FROM tl_member")->execute();
		$arrMember=array();
		while($objMembers->next()){
			$arrMember[$objMembers->id]=array(
			'id'=>$objMembers->id,
			'username'=>$objMembers->username,
			'firstname'=>$objMembers->firstname,
			'lastname'=>$objMembers->lastname
			);
		}
		
		$objForums = $this->Database->prepare("SELECT * FROM tl_forum_forums WHERE pid=? ORDER BY sorting ASC")->execute($forumid);
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
				'last_post_creator'=>$arrMember[$objLastPost->created_by]['username'],
				'last_post_date'=>date($GLOBALS['TL_CONFIG']['dateFormat'],$objLastPost->created_date),
				'last_post_time'=>date($GLOBALS['TL_CONFIG']['timeFormat'],$objLastPost->created_time),
				'last_post_title'=>$objLastPost->thread_title,
				'last_post_link'=>$this->generateFrontendUrl($objThreadReader->row(),'/thread/' . $objLastPost->pid) . '#' . $objLastPost->id
			);
		}
		$this->Template->forums=$arrForums;
		
		
												
		$objThreads = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE pid=? ORDER BY sorting ASC")->execute($forumid);
		while($objThreads->next()){
			$objPosts = $this->Database->prepare("SELECT count(id) as cnt FROM tl_forum_posts WHERE pid=? AND deleted=?")->execute($objThreads->id,'');
			$objLastThreadPost = $this->Database->prepare("SELECT * FROM tl_forum_posts WHERE pid=? AND deleted=? ORDER BY created_time DESC LIMIT 0,1")->execute($objThreads->id,'');
			$arrThreads[]=array(
				'id'=>$objThreads->id,
				'title'=>$objThreads->title,
				'created_by'=>$arrMember[$objThreads->created_by]['username'],
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
		$this->Template->threadcreator=$this->generateFrontendUrl($objThreadEditor->row(),'/forum/' . $forumid . '/mode/new');
		$this->Template->num_threads=count($arrThreads);
		$this->Template->threads=$arrThreads;
		$this->Template->forumid=$forumid;
		$this->Template->forumbreadcrumbs=$this->getForumBreadcrumb($forumid,array());
	}//protected function compile()
	
	
}

?>