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
 * Class forum_moderator
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */
class forum_moderator extends frontend
{
	private $logging;
	private $functions;
	private $auth;
	
	public function __construct()
	{
		$this->logging = new forum_logging();
		$this->import('Database');
		$this->import('Environment');
		$this->functions=new forum_common_functions();
		$this->auth=new forum_auth();
	}
	
	public function postSetDeleted($intPost,$strDeleted)
	{
		$forum=$this->functions->getForumFromPost($intPost);
		if($strDeleted=='1'){$object='d';}else{$object='u';}
		if($this->auth->checkPermissions($forum,'m_pe_d_' . $object)=='A')
		{
			$arrUser=$this->functions->getUser();
			//Check for old value
			$objPost = $this->Database->prepare("SELECT deleted FROM tl_forum_posts WHERE id=?")->execute($intPost);
			//Update post
			$this->Database->prepare("UPDATE tl_forum_posts SET deleted=? WHERE id=?")->execute($strDeleted,$intPost);
			$this->logging->moderator_log($this->forum_forum_root,'forum_logging_mod_post_setdelete',0,0,$intPost,0,$arrUser['id'],$this->Environment->ip,'MOD_DELETE_POST','TL_FORUM_POSTS.DELETED',$objPost->deleted,$strDeleted,'POST');
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	public function threadSetThreadtype($intThread,$strThreadtype)
	{
		$forum=$this->functions->getForumFromThread($intThread);
		if($this->auth->checkPermissions($forum,'m_te_t_' . strtolower($strThreadtype))=='A')
		{
			$arrUser=$this->functions->getUser();
			//Check for old value
			$objThread = $this->Database->prepare("SELECT thread_type FROM tl_forum_threads WHERE id=?")->execute($intThread);
			//Update post
			$this->Database->prepare("UPDATE tl_forum_threads SET thread_type=? WHERE id=?")->execute($strThreadtype,$intThread);
			$this->logging->moderator_log($this->forum_forum_root,'forum_logging_mod_thread_settype',0,$intThread,0,0,$arrUser['id'],$this->Environment->ip,'MOD_SET_THREADTYPE','TL_FORUM_POSTS.THREAD_TYPE',$objThread->thread_type,$strThreadtype,'THREAD');
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	public function threadSetSpecial($intThread,$strSpecial)
	{
		$forum=$this->functions->getForumFromThread($intThread);
		if($strSpecial=='1'){$object='s';}else{$object='u';}
		if($this->auth->checkPermissions($forum,'m_te_s_' . $object)=='A')
		{
			$arrUser=$this->functions->getUser();
			//Check for old value
			$objThread = $this->Database->prepare("SELECT special FROM tl_forum_threads WHERE id=?")->execute($intThread);
			//Update post
			$this->Database->prepare("UPDATE tl_forum_threads SET special=? WHERE id=?")->execute($strSpecial,$intThread);
			$this->logging->moderator_log($this->forum_forum_root,'forum_logging_mod_thread_setspecial',0,$intThread,0,0,$arrUser['id'],$this->Environment->ip,'MOD_SET_SPECIAL','TL_FORUM_POSTS.SPECIAL',$objThread->special,$strSpecial,'THREAD');
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	public function threadSetLocked($intThread,$strLocked)
	{
		$forum=$this->functions->getForumFromThread($intThread);
		if($strLocked=='1'){$object='l';}else{$object='u';}
		if($this->auth->checkPermissions($forum,'m_te_l_' . $object)=='A')
		{
			$arrUser=$this->functions->getUser();
			//Check for old value
			$objThread = $this->Database->prepare("SELECT locked FROM tl_forum_threads WHERE id=?")->execute($intThread);
			//Update post
			$this->Database->prepare("UPDATE tl_forum_threads SET locked=? WHERE id=?")->execute($strLocked,$intThread);
			$this->logging->moderator_log($this->forum_forum_root,'forum_logging_mod_thread_setlocked',0,$intThread,0,0,$arrUser['id'],$this->Environment->ip,'MOD_SET_LOCKED','TL_FORUM_POSTS.LOCKED',$objThread->locked,$strLocked,'THREAD');
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function threadSetDeleted($intThread,$strDeleted)
	{
		$forum=$this->functions->getForumFromThread($intThread);
		if($strDeleted=='1'){$object='d';}else{$object='u';}
		if($this->auth->checkPermissions($forum,'m_te_d_' . $object)=='A')
		{
			$arrUser=$this->functions->getUser();
			//Check for old value
			$objThread = $this->Database->prepare("SELECT deleted FROM tl_forum_threads WHERE id=?")->execute($intThread);
			//Update post
			$this->Database->prepare("UPDATE tl_forum_threads SET deleted=? WHERE id=?")->execute($strDeleted,$intThread);
			$this->logging->moderator_log($this->forum_forum_root,'forum_logging_mod_thread_setdeleted',0,$intThread,0,0,$arrUser['id'],$this->Environment->ip,'MOD_SET_DELETED','TL_FORUM_POSTS.DELETED',$objThread->deleted,$strDeleted,'THREAD');
			return true;
		}
		else
		{
			return false;
		}
	}
	
}

?>