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
 * Class forum_user_panel
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */
class forum_user_panel extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'forum_user_panel';
	
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$return="Forum - User panel";
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
		//Process form
		//###########################################
		if($this->Input->post('submit'))
		{
			$objUserSettings = $this->Database->prepare("SELECT * FROM tl_forum_user_settings WHERE pid=? AND user=?")->execute($this->forum_forum_root,$user['id']);
			$arrSetSettings = array
			(
				'user'      => $user['id'],
				'signature' => $this->Input->post('signature'),
				'pid'		=> $this->forum_forum_root
			);
			if($objUserSettings->numRows==0)//No settings stored up to now
			{
				
				$insertId = $this->Database->prepare("INSERT INTO tl_forum_user_settings %s WHERE")->set($arrSetSettings)->execute()->insertId;
			}
			else
			{
				$this->Database->prepare("UPDATE tl_forum_user_settings %s WHERE pid=? AND user=?")->set($arrSetSettings)->execute($this->forum_forum_root,$user['id']);
			}
		}
		//###########################################
		//Get user settings
		//###########################################
		$objUserSettings = $this->Database->prepare("SELECT * FROM tl_forum_user_settings WHERE pid=? AND user=?")->executeUncached($this->forum_forum_root,$user['id']);
		
		//###########################################
		//Send data to template
		//###########################################
		$this->Template->user_signature=$objUserSettings->signature;
	}
}

?>