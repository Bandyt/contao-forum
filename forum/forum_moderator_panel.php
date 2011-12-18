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
class forum_moderator_panel extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'forum_moderator_panel';
	private $arrMember=array();
	private $user=array();
	private $user_logged_in=false;
	private $objPostEditor;
	private $objThreadReader;
	private $arrThread=array();
	
	private function getThreadInformation()
	{
		$objThread = $this->Database->prepare("SELECT * FROM tl_forum_threads WHERE id=?")->execute($this->threadid);
		$this->arrThread['title']=$objThread->title;
		$this->arrThread['locked']=$objThread->locked;
	}
	private function getInternalLinks()
	{
		$this->objPostEditor = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($GLOBALS['TL_CONFIG']['forum_redirect_posteditor']);
		
		$this->objThreadReader = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
												->limit(1)
												->execute($GLOBALS['TL_CONFIG']['forum_redirect_threadreader']);
	}
	private function getUser()
	{
		$this->import('FrontendUser', 'Member');
		if(FE_USER_LOGGED_IN)
		{
			$this->user=array(
				'id'=>$this->Member->id,
				'firstname'=>$this->Member->firstname,
				'lastname'=>$this->Member->lastname,
				'username'=>$this->Member->username,
				'groups'=>$this->Member->groups
			);
			$this->Template->member=$user;
			$this->Template->member_loggedin=true;
			$this->user_logged_in=true;
		}
		else
		{
			$this->Template->member_loggedin=false;
			$this->user_logged_in=false;
		}
	}
	private function processInput()
	{
		switch($this->Input->get('mode'))
		{
			case 'mod-delete-post':
				//TODO: mark post as deleted
				if($this->Input->get('post')!='')
				{
					$arrSetPost = array
					(
						'deleted' => '1'
					);
					$this->log("Moderator " . $this->user['id'] . " (" . $this->user['username'] . ") deleted post " . $this->Input->get('post'), 'Forum thread reader - processInput()', TL_INFO);
					$this->Database->prepare("UPDATE tl_forum_posts %s WHERE id=?")->set($arrSetPost)->execute($this->Input->get('post'));
					$this->redirect($this->generateFrontendUrl($this->objThreadReader->row(),'/thread/' . $this->threadid));
				}
				break;
		}
	}
	private function getMember()
	{
		$objMembers = $this->Database->prepare("SELECT * FROM tl_member")->execute();
		$objMemberSettings = $this->Database->prepare("SELECT signature FROM tl_forum_user_settings WHERE user=?")->execute($objMembers->id);
		while($objMembers->next()){
			$this->arrMember[$objMembers->id]=array(
			'id'=>$objMembers->id,
			'username'=>$objMembers->username,
			'firstname'=>$objMembers->firstname,
			'lastname'=>$objMembers->lastname,
			'signature'=>$objMemberSettings->signature
			);
		}
	}
	
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$return="Forum - Moderator panel";
			return $return;
		}
		return parent::generate();
	}
	
	/**
	 * Generate module
	 */
	protected function compile()
	{
		$this->getUser();
		$this->getInternalLinks();
		$this->processInput();
	}
}

?>