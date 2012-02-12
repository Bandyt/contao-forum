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
 * Class forum_logging
 *
 * @copyright  2011 Andreas Koob 
 * @author     Andreas Koob 
 * @package    Controller
 */
class forum_logging extends frontend
{
	public function moderator_log($intForumId,$strLogAction,$intForum,$intThread,$intPost,$intUser,$intCommitter,$strChangeIP,$strChangeType,$strField,$strOldValue,$strNewValue,$strObject)
	{
		$functions = new forum_common_functions();
		$intRoot=$functions->getRootFromForum($intForumId);
		$bolLog=false;
		switch($strLogAction)
		{
			case 'forum_logging_mod_post_set_delete':
				//$objSettings = $this->Database->prepare("SELECT forum_logging_mod_delete_post FROM tl_forum_forums WHERE id=?")->execute($intRootId);
				//if ($objSettings->forum_logging_mod_delete_post=='' || $objSettings->forum_logging_mod_delete_post=='L'){ $bolLog=true; }
				$bolLog=true;
				break;
			
			case 'forum_logging_mod_threadtype_normal':
				//$objSettings = $this->Database->prepare("SELECT forum_logging_mod_delete_post FROM tl_forum_forums WHERE id=?")->execute($intRootId);
				//TODO: Add settings for log
				$bolLog=true;
				break;
			default:
				$bolLog=true;
		}
		if($bolLog==true)
		{
			$arrSetLog = array
			(
				'forum' => $intForum,
				'thread' => $intThread,
				'post' => $intPost,
				'user' => $intUser,
				'committer' => $intCommitter,
				'change_time' => time(),
				'object' => $strObject,
				'change_ip' => $strChangeIP,
				'change_type' => $strChangeType,
				'field' => $strField,
				'old_value' => $strOldValue,
				'new_value' => $strNewValue
			);
			$this->Database->prepare("INSERT INTO tl_forum_moderator_log %s")->set($arrSetLog)->execute();
		}
	}
}

?>