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
class forum_thread_reader extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'forum_thread_reader';

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
		if($this->forum_use_fixed_thread=='1'){
			$threadid = $this->forum_fixed_thread;
		}
		else
		{
			$threadid = $this->Input->get('thread');
		}
		$objPostEditor = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($this->forum_redirect_posteditor);
		$this->Template->postcreator=$this->generateFrontendUrl($objPostEditor->row(),'/thread/' . $threadid . '/mode/new');
		
		//Get thread information
		$objThread = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE id=?")->execute($threadid);
		$this->Template->title=$objThread->title;
		
		//Get member information
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
		
		//Get post information
		$objPosts = $this->Database->prepare("SELECT * FROM tl_forum_posts WHERE pid=? ORDER BY order_no ASC")->execute($threadid);
		$i=0;
		while($objPosts->next()){
				$i++;
				$arrPosts[]=array(
				'id'=>$objPosts->id,
				'class'=>(($i == 1) ? 'first ' : '') . (($i == $objPosts->numRows) ? 'last ' : '') . ((($i % 2) == 0) ? 'even' : 'odd'),
				'order_no'=>$objPosts->order_no+1,
				'created_date'=>date($GLOBALS['TL_CONFIG']['dateFormat'],$objPosts->created_date),
				'created_time'=>date($GLOBALS['TL_CONFIG']['timeFormat'],$objPosts->created_time),
				'creator_id'=>$arrMember[$objPosts->created_by]['id'],
				'creator_username'=>$arrMember[$objPosts->created_by]['username'],
				'title'=>$objPosts->title,
				'text'=>$objPosts->text,
				'changed'=>$objPosts->changed,
				'last_change_by'=>$arrMember[$objPosts->last_change_by]['username'],
				'last_change_date'=>date($GLOBALS['TL_CONFIG']['dateFormat'],$objPosts->last_change_date),
				'last_change_time'=>date($GLOBALS['TL_CONFIG']['timeFormat'],$objPosts->last_change_time),
				'last_change_reason'=>$objPosts->last_change_reason,
				'quote_link'=>$this->generateFrontendUrl($objPostEditor->row(),'/thread/' . $threadid . '/mode/quote/post/' . $objPosts->id),
				'edit_link'=>$this->generateFrontendUrl($objPostEditor->row(),'/thread/' . $threadid . '/mode/edit/post/' . $objPosts->id)
				);
		}
		$this->Template->posts=$arrPosts;
		
		
	}
}

?>