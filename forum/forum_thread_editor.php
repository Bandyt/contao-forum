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
 * Class forum_thread_editor
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */
class forum_thread_editor extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'forum_thread_editor';

	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$return="Forum - Thread editor";
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
		$this->Template->forumid=$forumid;
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
		//Prepare form
		//###########################################
		if($this->Input->get('mode')=='edit')
		{
			$mode='edit';
			
		}
		elseif($this->Input->get('mode')=='new')
		{
			$mode='new';
		}
		$this->Template->mode=$mode;
		//###########################################
		//Process form
		//###########################################
		$errors=array();
		if($this->Input->post('submit'))
		{
			$currenttime=time();
			if($this->Input->post('mode')=='new')
			{
				//Add thread to database
				$arrSetthread = array
				(
					'pid' => $forumid,
					'title' => $this->Input->post('title'),
					'created_date' => $currenttime,
					'created_time' => $currenttime,
					'created_by' => $user['id'],
					'thread_type' => $this->Input->post('thread_type')
				);
				$insertId = $this->Database->prepare("INSERT INTO tl_forum_threads %s")->set($arrSetthread)->execute()->insertId;
				$arrSetpost=array
				(
					'pid'=>$insertId,
					'order_no'=>0,
					'title'=>$this->Input->post('title'),
					'text'=>$this->Input->post('text'),
					'created_date' => $currenttime,
					'created_time' => $currenttime,
					'created_by' => $user['id']
				);
				$postInsertId = $this->Database->prepare("INSERT INTO tl_forum_posts %s")->set($arrSetpost)->execute()->insertId;

				//Thread added. Now update parent forum and redirect to new thread
				
				if($forumid!=0 && $forumid!='')
				{
					$arrSetForum = array
					(
						'last_change_date' => $currenttime,
						'last_change_time' => $currenttime,
					);
					$this->Database->prepare("UPDATE tl_forum_forums %s WHERE id=?")->set($arrSetForum)->execute($forumid);
				}
				$objTargetPage = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($GLOBALS['TL_CONFIG']['forum_redirect_threadreader']);
				$this->redirect($this->generateFrontendUrl($objTargetPage->row(),'/thread/' . $insertId));
			}//if($this->Input->post('mode')=='new')
		}
		$this->Template->errors=$errors;
		
	}
}

?>