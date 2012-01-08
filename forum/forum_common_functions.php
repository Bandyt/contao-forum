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
 * Class forum_common_functions
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */
class forum_common_functions extends frontend
{
	public function getRootFromForum($intForumId)
	{
		$objForum = $this->Database->prepare("SELECT * FROM tl_forum_forums WHERE id=?")->execute($intForumId);
		if($objForum->forum_type=='R')
		{
			return $objForum->id;
		}
		elseif($objForum->pid==0)
		{
			return 0;
		}
		else
		{
			return $this->getRootFromForum($objForum->pid);
		}
	}
	public function getMember()
	{
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
		return $arrMember;
	}
	
	public function getSignatures($intForumId)
	{
		$intRootId=$this->getRootFromForum($intForumId);
		$objMemberSettings = $this->Database->prepare("SELECT user,signature FROM tl_forum_user_settings WHERE pid=?")->execute($intRootId);
		$arrSignatures=array();
		while($objMemberSettings->next()){
			$arrSignatures[$objMemberSettings->user]=array(
				'signature'=>$objMemberSettings->signature
			);
		}
		return $arrSignatures;
	}
	
	public function getUser()
	{
		$this->import('FrontendUser', 'Member');
		if(FE_USER_LOGGED_IN)
		{
			$user=array(
				'id'=>$this->Member->id,
				'firstname'=>$this->Member->firstname,
				'lastname'=>$this->Member->lastname,
				'username'=>$this->Member->username,
				'groups'=>$this->Member->groups,
				'logged_in' => true
			);
		}
		else
		{
			$user=array(
				'logged_in' => false
			);
		}
		return $user;
	}
	
	public function getInternalLinksFromForum($intForumId)
	{
		$intRoot=$this->getRootFromForum($intForumId);
		$arrLinks=array();
		$objRoot=$this->Database->prepare("SELECT * FROM tl_forum_forums WHERE id=?")->execute($intRoot);
		$arrLinks['thread_reader'] = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($objRoot->forum_redirect_threadreader);
												
		$arrLinks['thread_editor'] = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($objRoot->forum_redirect_threadeditor);
												
		$arrLinks['forum_list'] = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($objRoot->forum_redirect_forumlist);
												
		$arrLinks['post_editor'] = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($objRoot->forum_redirect_posteditor);
												
		$arrLinks['moderator_panel'] = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($objRoot->forum_redirect_moderator_panel);
		return $arrLinks;
	}
}

?>