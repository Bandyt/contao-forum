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
				'last_post_creator'=>$objLastPost->created_by,
				'last_post_title'=>$objLastPost->thread_title,
			);
		}
		$this->Template->forums=$arrForums;
		
		$objTargetPage = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($this->forum_redirect_thread);
												
		$objThreads = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE pid=? ORDER BY sorting ASC")->execute($forumid);
		while($objThreads->next()){
			$arrThreads[]=array(
				'id'=>$objThreads->id,
				'title'=>$objThreads->title,
				'redirect'=>$this->generateFrontendUrl($objTargetPage->row(),'/thread/' . $objThreads->id)
			);
		}
		$this->Template->threads=$arrThreads;
	}
}

?>