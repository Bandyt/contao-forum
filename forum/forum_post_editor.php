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
class forum_post_editor extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'forum_post_editor';
	private $arrMember=array();
	private $arrUser=array();
	private $arrLinks=array();
	private $functions;
	private $intForumId;
	private $intThreadId;
	
	
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$return="Forum - Post editor";
			return $return;
		}
		return parent::generate();
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
		if($this->intThreadId==''){
			$this->intThreadId=0;
		}
		$objThread = $this->Database->prepare("SELECT pid FROM tl_forum_threads WHERE id=?")->execute($this->intThreadId);
		$this->intForumId=$objThread->pid;
		$this->Template->threadid=$this->intThreadId;
	}
	
	private function processForm()
	{
		$arrErrors=array();
		if($this->Input->post('submit'))
		{
			$currenttime=time();
			if(($this->Input->post('mode')=='new')||($this->Input->post('mode')=='quote')||($this->Input->post('mode')=='answer'))
			{
				if(!$this->Input->post('quoted_id'))
				{
					$quoted_post=0;
				}
				else
				{
					$quoted_post=$this->Input->post('quoted_id');
				}
				if(!$this->Input->post('answered_id'))
				{
					$answered_post=0;
				}
				else
				{
					$answered_post=$this->Input->post('answered_id');
				}
				//Add post to database
				$posts = $this->Database->prepare("SELECT max(order_no) as order_no FROM tl_forum_posts WHERE pid=?")->execute($threadid);
				$arrSetthread = array
				(
					'pid' => $this->intThreadId,
					'title' => $this->Input->post('title'),
					'text' => $this->Input->post('text'),
					'created_date' => $currenttime,
					'created_time' => $currenttime,
					'created_by' => $this->arrUser['id'],
					'created_ip' => $this->Environment->ip,
					'answered_post' => $answered_post,
					'quoted_post' => $quoted_post,
					'order_no' => $posts->order_no+1
				);
				$insertId = $this->Database->prepare("INSERT INTO tl_forum_posts %s")->set($arrSetthread)->execute()->insertId;
				
				$arrSet = array
				(
					'last_change_date' => $currenttime,
					'last_change_time' => $currenttime,
					'last_post_date' => $currenttime,
					'last_post_time' => $currenttime
				);
				$this->Database->prepare("UPDATE tl_forum_threads %s WHERE id=?")->set($arrSet)->execute($this->intThreadId);
				$this->Database->prepare("UPDATE tl_forum_forums %s WHERE id=?")->set($arrSet)->execute($intForumId);
			
				//Post added. Now redirect to thread reader
				$this->redirect($this->generateFrontendUrl($this->arrLinks['thread_reader']->row(),'/thread/' . $this->intThreadId);
			}//if(($this->Input->post('mode')=='new')||($this->Input->post('mode')=='quote'))
			elseif($this->Input->post('mode')=='edit')
			{
				$arrSetpost = array
				(
					'id' => $this->Input->post('post_id'),
					'title' => $this->Input->post('title'),
					'text' => $this->Input->post('text'),
					'changed' => 1,
					'last_change_by' => $this->arrUser['id'],
					'last_change_date' => $currenttime,
					'last_change_time' => $currenttime,
					'last_change_reason'=>$this->Input->post('reason')
				);
				$this->Database->prepare("UPDATE tl_forum_posts %s WHERE id=?")->set($arrSetpost)->execute($this->Input->post('post_id'));
				
				$arrSet = array
				(
					'last_change_date' => $currenttime,
					'last_change_time' => $currenttime
				);
				$this->Database->prepare("UPDATE tl_forum_threads %s WHERE id=?")->set($arrSet)->execute($this->intThreadId);
				$this->Database->prepare("UPDATE tl_forum_forums %s WHERE id=?")->set($arrSet)->execute($intForumId);
				
				$this->redirect($this->generateFrontendUrl($this->arrLinks['thread_reader']->row(),'/thread/' . $this->intThreadId);
			}//elseif($this->Input->post('mode')=='edit')
			//Post created/edited. Now update forum and thread
			$arrSetForum = array
			(
				'last_change_date' => $currenttime,
				'last_change_time' => $currenttime,
			);
			$this->Database->prepare("UPDATE tl_forum_forums %s WHERE id=?")->set($arrSetForum)->execute($intForumId);
			
		}//if($this->Input->post('submit'))
		
		$this->Template->arrErrors=$arrErrors;
	}//private function processForm()
	
	private function prepareForm()
	{
		switch($this->Input->get('mode'))
		{
			case 'new':
				$mode='new';
				break;
				
			case 'edit':
				$mode='edit';
				$postid=intval($this->Input->get('post'));
				if($postid!='')
				{
					if(is_int($postid)==true)
					{
						$objPost = $this->Database->prepare("SELECT title,text FROM tl_forum_posts WHERE id=?")->executeUncached($postid);
						$this->Template->post=$objPost->text;
						$this->Template->title=$objPost->title;
						$this->Template->post_id=$postid;
					}
				}
				break;
				
			case 'answer':
				$mode='answer';
				$answeredid=intval($this->Input->get('post'));
				$this->Template->answered_id=$answeredid;
				break;
				
			case 'quote':
				$mode='quote';
				//TODO: Add code for quoting posts
				$quoteid=intval($this->Input->get('post'));
				if($quoteid!='')
				{
					if(is_int($quoteid)==true)
					{
						$quoted_post = $this->Database->prepare("SELECT created_by,text FROM tl_forum_posts WHERE id=?")->executeUncached($quoteid);
						$strQuoteText=$quoted_post->text;
						if (isset($GLOBALS['TL_HOOKS']['forum_quotePostText']) && is_array($GLOBALS['TL_HOOKS']['forum_quotePostText'])) 
						{ 
							foreach ($GLOBALS['TL_HOOKS']['forum_quotePostText'] as $callback) 
							{ 
								$this->import($callback[0]); 
								$strQuoteText = $this->$callback[0]->$callback[1]($strQuoteText,$quoteid,$this->arrMember[$quoted_post->created_by]); 
							} 
						}
						$this->Template->quoted_id=$quoteid;
						$this->Template->quoted_text=$strQuoteText;
					}					
				}
				break;
		}
		$this->Template->mode=$mode;	
	} //private function prepareForm()
	
	/**
	 * Generate module
	 */
	protected function compile()
	{
		$this->functions = new forum_common_functions();
		$this->arrMember=$this->functions->getMember();
		$this->arrUser=$this->functions->getUser();
		$this->getThreadId();//incl. forum id
		$this->arrLinks= $this->functions->getInternalLinksFromForum($this->intForumId);
		$this->Template->member=$this->functions->getUser();
		
		$this->processForm();
		$this->prepareForm();
	}
}

?>