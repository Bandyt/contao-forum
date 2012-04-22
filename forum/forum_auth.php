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
 * Class forum_auth
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */
class forum_auth extends frontend
{
	public function __construct()
	{
		$this->import('Database');
		$this->import('FrontendUser', 'Member');
	}
	
	public function getUserGroup()
	{
		$usergroup='G';
		if(FE_USER_LOGGED_IN)
		{
			$usergroup='C';
		}
		else
		{
			//Let hook decide if this user is a bot
			$bolBot=false;
			if (isset($GLOBALS['TL_HOOKS']['forum_checkIfUserIsABot']) && is_array($GLOBALS['TL_HOOKS']['forum_checkIfUserIsABot'])) 
			{ 
				foreach ($GLOBALS['TL_HOOKS']['forum_checkIfUserIsABot'] as $callback) 
				{ 
					$this->import($callback[0]); 
					$bolBot = $this->$callback[0]->$callback[1](); 
				} 
			}
			if($bolBot)
			{
				$usergroup='B';
			}
			else
			{
				$usergroup='G';
			}
		}
		return $usergroup;
	}
	
	public function checkPermissions($forum,$permission)
	{
		$usergroup=$this->getUserGroup();
		if($usergroup=='C'){$arrMembergroups=$this->Member->groups;}else{$arrMembergroups=array();}
		$arrPermission=explode('_',$permission);
		return $this->checkAuthObject($forum,$usergroup,$arrMembergroups,$arrPermission,array());
	}
	
	private function checkAuthObject($forum,$usergroup,$arrMembergroups,$arrToBeChecked,$arrAlreadyChecked)
	{
		return 'A';
		//$objProjects = $this->Database->prepare("SELECT * FROM tl_tm_projects ORDER BY project_order ASC")->execute();
	}
}

?>