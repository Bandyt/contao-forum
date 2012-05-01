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
class forum_thread_editor extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'forum_thread_editor';

	private $functions;
	private $arrUser = array();
	private $intForumId;
	private $arrLinks=array();
	
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$return="Forum - Thread editor";
			return $return;
		}
		return parent::generate();
	}

	private function getForumId()
	{
		if($this->forum_use_fixed_forum=='1'){
			$this->intForumId = $this->forum_fixed_forum;
		}
		else
		{
			$this->intForumId = $this->Input->get('forum');
		}
		if($this->intForumId==''){
			$this->intForumId=0;
		}
		$this->Template->this->forumid=$this->intForumId;
	}
	
	private function prepareForm()
	{
		if($this->Input->get('mode')=='edit')
		{
			$mode='edit';
			
		}
		elseif($this->Input->get('mode')=='new')
		{
			$mode='new';
		}
		$this->Template->mode=$mode;
	}
	
	private function processForm()
	{
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
					'created_by' => $this->arrUser['id'],
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
					'created_by' => $this->arrUser['id']
				);
				$postInsertId = $this->Database->prepare("INSERT INTO tl_forum_posts %s")->set($arrSetpost)->execute()->insertId;

				//Thread added. Now update parent forum and redirect to new thread
				
				if($this->intForumId!=0 && $this->intForumId!='')
				{
					$arrSetForum = array
					(
						'last_change_date' => $currenttime,
						'last_change_time' => $currenttime,
					);
					$this->Database->prepare("UPDATE tl_forum_forums %s WHERE id=?")->set($arrSetForum)->execute($this->intForumId);
				}
				$this->redirect($this->generateFrontendUrl($this->arrLinks['thread_reader']->row(),'/thread/' . $insertId);
			}//if($this->Input->post('mode')=='new')
		}
		$this->Template->errors=$errors;
	}
	/**
	 * Generate module
	 */
	protected function compile()
	{
		$this->functions = new forum_common_functions();
		$this->getForumId();
		$this->arrUser=$this->functions->getUser();
		$this->arrLinks= $this->functions->getInternalLinksFromForum($this->intForumId);
		$this->prepareForm();
		$this->processForm();
	}
}

?>