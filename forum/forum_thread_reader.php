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
		
		$objPosts = $this->Database->prepare("SELECT * FROM tl_forum_posts WHERE pid=? ORDER BY order_no ASC")->execute($threadid);
		$i=0;
		while($objPosts->next()){
				$i++;
				//$objCreator=$this->Database->prepare("SELECT * FROM tl_member WHERE id=?")->execute($objComments->created_user);
				//$objChangeUser=$this->Database->prepare("SELECT * FROM tl_member WHERE id=?")->execute($objComments->last_change_user);
				$arrPosts[]=array(
				'id'=>$objPosts->id,
				'class'=>(($i == 1) ? 'first ' : '') . (($i == $objPosts->numRows) ? 'last ' : '') . ((($i % 2) == 0) ? 'even' : 'odd'),
				'title'=>$objPosts->title,
				'description'=>$objPosts->description
				);
		}
		$this->Template->posts=$arrPosts;
	}
}

?>