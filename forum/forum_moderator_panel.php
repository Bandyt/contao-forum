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
 * Class forum_moderator_panel 
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */
class forum_moderator_panel extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'forum_moderator_panel';
	private $arrMember=array();
	private $arrUser=array();
	private $arrInternalLinks=array();
	private $arrThread=array();
	
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$return="Forum - Moderator panel";
			return $return;
		}
		return parent::generate();
	}
	
	private function getThreadInformation()
	{
		$objThread = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE id=?")->execute($this->threadid);
		$this->arrThread['title']=$objThread->title;
		$this->arrThread['locked']=$objThread->locked;
	}
	
	
	private function processInput()
	{
		$this->log("Mode [" . $this->Input->get('mod') . "]", 'forum_moderator_panel.processInput()', TL_INFO);
		switch($this->Input->get('mode'))
		{
			case 'mod-delete-post':
				$this->log("Delete post", 'forum_moderator_panel.processInput()', TL_INFO);
				if($this->Input->get('post')!='')
				{
					$arrSetPost = array
					(
						'deleted' => '1'
					);
					$this->Database->prepare("UPDATE tl_forum_posts %s WHERE id=?")->set($arrSetPost)->execute($this->Input->get('post'));
					$logging = new forum_logging();
					$logging->moderator_log($this->forum_forum_root,'forum_logging_mod_delete_post',0,0,$this->Input->get('post'),0,$this->arrUser['id'],$this->Environment->ip,'MOD_DELETE_POST','TL_FORUM_POSTS.DELETED','','1','POST');
					$this->redirect($this->generateFrontendUrl($this->arrInternalLinks['thread_reader']->row(),'/thread/' . $this->Input->get('thread')));
				}
				break;
		}
	}
	
	
	
	/**
	 * Generate module
	 */
	protected function compile()
	{
		$functions = new forum_common_functions();
		$this->arrInternalLinks=$functions->getInternalLinksFromForum($this->forum_forum_root);
		$this->arrUser=$functions->getUser();
		$this->processInput();
	}
}

?>