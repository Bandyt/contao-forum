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
 * Class forum_thread_reader 
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */
class forum_thread_reader extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'forum_thread_reader';
	private $arrMember=array();
	private $intThreadId;
	private $arrUser=array();
	private $arrLinks=array();
	private $arrThread=array();
	private $arrSignatures=array();
	private $auth;
	
	private function getThreadInformation()
	{
		$functions = new forum_common_functions();
		$objThread = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE id=?")->execute($this->intThreadId);
		$this->arrThread['title']=$objThread->title;
		$this->arrThread['locked']=$objThread->locked;
		$this->arrThread['special']=$objThread->special;
		$this->arrThread['thread_type']=$objThread->thread_type;
		$this->arrThread['created_by']=$objThread->created_by;
		$this->arrThread['forum']=$objThread->pid;
		$this->arrThread['root']=$functions->getRootFromForum($objThread->pid);
		if($this->forum_use_fixed_thread=='1'){
			$this->intThreadId = $this->forum_fixed_thread;
		}
		else
		{
			$this->intThreadId = $this->Input->get('thread');
		}
	}
	
	private function getPosts()
	{
		$objPosts = $this->Database->prepare("SELECT * FROM tl_forum_posts WHERE pid=? AND deleted=? ORDER BY order_no ASC")->execute($this->intThreadId,'');
		$intI=0;
		$answerMyPosts=$this->auth->checkPermissions($this->arrThread['forum'],'u_pc_a_m');
		$answerOthersPosts=$this->auth->checkPermissions($this->arrThread['forum'],'u_pc_a_o');
		$quoteMyPosts=$this->auth->checkPermissions($this->arrThread['forum'],'u_pc_q_m');
		$quoteOthersPosts=$this->auth->checkPermissions($this->arrThread['forum'],'u_pc_q_o');
		$editMyPostsHeading=$this->auth->checkPermissions($this->arrThread['forum'],'u_pe_m_h');
		$editMyPostsText=$this->auth->checkPermissions($this->arrThread['forum'],'u_pe_m_t');
		$editMyPostsDelete=$this->auth->checkPermissions($this->arrThread['forum'],'u_pe_m_d_d');
		while($objPosts->next()){
				$intI++;
				$strPostText=$objPosts->text;
				
				if (isset($GLOBALS['TL_HOOKS']['forum_parsePostText']) && is_array($GLOBALS['TL_HOOKS']['forum_parsePostText'])) 
				{ 
					foreach ($GLOBALS['TL_HOOKS']['forum_parsePostText'] as $callback) 
					{ 
						$this->import($callback[0]); 
						$strPostText = $this->$callback[0]->$callback[1]($strPostText,$objPosts->id,$this->intThreadId); 
					} 
				}
				if($objPosts->created_by==$arrUser['id'])
				{
					if($answerMyPosts=='A'){$answer_link=$this->generateFrontendUrl($this->arrLinks['post_editor']->row(),'/thread/' . $this->intThreadId . '/mode/answer/post/' . $objPosts->id),}else{$answer_link='';}
					if($quoteMyPosts=='A'){$quote_link=$this->generateFrontendUrl($this->arrLinks['post_editor']->row(),'/thread/' . $this->intThreadId . '/mode/quote/post/' . $objPosts->id),}else{$quote_link='';}
					if($MyPosts=='A'){$edit_link=$this->generateFrontendUrl($this->arrLinks['post_editor']->row(),'/thread/' . $this->intThreadId . '/mode/edit/post/' . $objPosts->id),}else{$edit_link='';}
				}
				else
				{
					if($answerOthersPosts=='A'){$answer_link=$this->generateFrontendUrl($this->arrLinks['post_editor']->row(),'/thread/' . $this->intThreadId . '/mode/answer/post/' . $objPosts->id),}else{$answer_link='';}
					if($quoteOthersPosts=='A'){$quote_link=$this->generateFrontendUrl($this->arrLinks['post_editor']->row(),'/thread/' . $this->intThreadId . '/mode/quote/post/' . $objPosts->id),}else{$quote_link='';}
					$edit_link='';
				}
				$arrPosts[]=array(
					'id'=>$objPosts->id,
					'class'=>(($intI == 1) ? 'first ' : '') . (($intI == $objPosts->numRows) ? 'last ' : '') . ((($intI % 2) == 0) ? 'even' : 'odd'),
					'post_no'=>$intI,
					'created_date'=>date($GLOBALS['TL_CONFIG']['dateFormat'],$objPosts->created_date),
					'created_time'=>date($GLOBALS['TL_CONFIG']['timeFormat'],$objPosts->created_time),
					'creator_id'=>$this->arrMember[$objPosts->created_by]['id'],
					'creator_username'=>$this->arrMember[$objPosts->created_by]['username'],
					'creator_signature'=>$this->arrSignatures[$objPosts->created_by]['signature'],
					'title'=>$objPosts->title,
					'text'=>$strPostText,
					'changed'=>$objPosts->changed,
					'last_change_by'=>$this->arrMember[$objPosts->last_change_by]['username'],
					'last_change_date'=>date($GLOBALS['TL_CONFIG']['dateFormat'],$objPosts->last_change_date),
					'last_change_time'=>date($GLOBALS['TL_CONFIG']['timeFormat'],$objPosts->last_change_time),
					'last_change_reason'=>$objPosts->last_change_reason,
					'answer_link'=>$answer_link;
					'quote_link'=>$quote_link;
					'edit_link'=>$edit_link;
					'mod_tools_delete_link'=>$this->generateFrontendUrl($this->arrLinks['moderator_panel']->row(),'/thread/' . $this->intThreadId . '/mode/mod-delete-post/post/' . $objPosts->id),
				);
		}
		return $arrPosts;
	}
	
	private function getBreadcrumb($intForumId, $arrCrumbs)
	{
		if(count($arrCrumbs)==0) //Array is empty. Prefill with thread information
		{
			$objThread = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE id=?")->execute($this->intThreadId);
			$arrCrumbs[]=array(
				'id'=>$objThread->id,
				'title'=>$objThread->title,
				'link'=>$this->generateFrontendUrl($this->arrLinks['thread_reader']->row(),'/thread/' . $this->intThreadId),
				'class'=>''
			);
			$intForumId=$objThread->pid;
		} 
		$objForum = $this->Database->prepare("SELECT id,title,pid FROM tl_forum_forums WHERE id=?")->execute($intForumId);
		$class='';
		if($intForumId==0)
		{
			$arrNewCrumb = array(
				'id' => $objForum->id,
				'title' => $GLOBALS['TL_LANG']['forum']['forum'],
				'link' => $this->generateFrontendUrl($this->arrLinks['forum_list']->row(),'/forum/0'),
				'class' => $class
			);
		}
		else
		{
			$arrNewCrumb = array(
				'id' => $objForum->id,
				'title' => $objForum->title,
				'link' => $this->generateFrontendUrl($this->arrLinks['forum_list']->row(),'/forum/' . $objForum->id),
				'class' => $class
			);
		}
		
		array_unshift($arrCrumbs,$arrNewCrumb);
		if($objForum->id!=0)
		{
			$arrTotalArray=$this->getBreadcrumb($objForum->pid,$arrCrumbs);
			return $arrTotalArray;
		}
		else
		{
			return $arrCrumbs;
		}
	}//private function getForumBreadcrumb
	
	private function updateTracker()
	{
		if(($this->intThreadId!=0) && ($this->arrUser['logged_in']==true))
		{
			$currenttime=time();
			$objTracker = $this->Database->prepare("SELECT tstamp FROM tl_forum_thread_tracker WHERE user=? AND thread=?")->execute($this->arrUser['id'],$this->intThreadId);
			
			if($objTracker->numRows!=0)
			{
				$arrSetTracker = array
				(
					'tstamp' => $currenttime
				);
				$this->Database->prepare("UPDATE tl_forum_thread_tracker %s WHERE user=? AND thread=?")->set($arrSetTracker)->execute($this->arrUser['id'],$this->intThreadId);
			}
			else
			{
				$arrSetTracker = array
				(
					'thread' => $this->intThreadId,
					'user' => $this->arrUser['id'],
					'tstamp' => $currenttime
				);
				$this->Database->prepare("INSERT INTO tl_forum_thread_tracker %s")->set($arrSetTracker)->execute();
			}
			
		}
	}
	
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$return="Forum - Thread reader";
			return $return;
		}
		return parent::generate();
	}
	
	/**
	 * Generate module
	 */
	protected function compile()
	{
		$this->auth = new forum_auth();
		$functions = new forum_common_functions();
		$this->getThreadInformation();
		$this->arrUser=$functions->getUser();
		
		$bolAccessAllowed=false;
		if($this->arrThread['created_by']!=$this->arrUser['id']){$creator='m';}else{$creator='o';}
		$accessAllowed=$this->auth->checkPermissions($this->arrThread['forum'],'u_ta_' . $creator . '_' . strtolower($this->arrThread['thread_type']));
		if($this->arrThread['special']==1){$accessSpecial=$this->auth->checkPermissions($this->arrThread['forum'],'u_ta_' . $creator . '_s');}else{$accessSpecial='A'};
		if($this->arrThread['locked']==1){$accessLocked=$this->auth->checkPermissions($this->arrThread['forum'],'u_ta_' . $creator . '_l');}else{$accessLocked='A'};
		
		if(($accessAllowed!='A') || ($accessSpecial!='A') || ($accessLocked!='A'))
		{
			$objTemplate=new frontendTemplate('forum_thread_reader_noaccess');
			$this->Template->objTemplate;
			
		}
		else
		{
			$this->arrMember=$functions->getMember();
			$this->arrLinks= $functions->getInternalLinksFromForum($this->arrThread['root']);
			$this->arrSignatures = $functions->getSignatures($this->arrThread['root']);
			$this->Template->postcreator=$this->generateFrontendUrl($this->arrLinks['post_editor']->row(),'/thread/' . $this->intThreadId . '/mode/new');
			$this->Template->thread = $this->arrThread;
			$this->updateTracker();
			$this->Template->posts=$this->getPosts();
		}//if(($accessAllowed!='A') || ($accessSpecial!='A') || ($accessLocked!='A')){
		$this->Template->breadcrumbs=$this->getBreadcrumb($this->intThreadId,array());
	}
}

?>