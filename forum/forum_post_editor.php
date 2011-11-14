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
 * Class forum_post_editor
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */
class forum_post_editor extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'forum_post_editor';

	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$return="Forum - Post editor";
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
		if($this->forum_use_fixed_thread=='1'){
			$threadid = $this->forum_fixed_thread;
		}
		else
		{
			$threadid = $this->Input->get('thread');
		}
		if($threadid==''){
			$threadid=0;
		}
		$this->Template->threadid=$threadid;
		//###########################################
		//Get user information
		//###########################################
		$this->import('FrontendUser', 'Member');
		if(FE_USER_LOGGED_IN)
		{
			$user=array(
				'id'=>$this->Member->id
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
			if($this->Input->post('mode')=='new')
			{
				//Add post to database
				$posts = $this->Database->prepare("SELECT max(order_no) as order_no FROM tl_forum_posts WHERE pid=?")->execute($threadid);
				$arrSetthread = array
				(
					'pid' => $threadid,
					'title' => $this->Input->post('title'),
					'text' => $this->Input->post('text'),
					'created_date' => time(),
					'created_time' => time(),
					'created_by' => $user['id'],
					'order_no' => $posts->order_no+1
				);
				$insertId = $this->Database->prepare("INSERT INTO tl_forum_posts %s")->set($arrSetthread)->execute()->insertId;
				
				//Post added. Now redirect to thread reader
				$objTargetPage = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($this->forum_redirect_threadreader);
				$this->log('New post for thread ' . $threadid . ' created. Redirecting to [' . $this->generateFrontendUrl($objTargetPage->row(),'/thread/' . $threadid) . ']', 'Create thread', TL_INFO);
				$this->redirect($this->generateFrontendUrl($objTargetPage->row(),'/thread/' . $threadid));
			}	
		}
		$this->Template->errors=$errors;
		
	}
}

?>