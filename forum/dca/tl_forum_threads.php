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
 * Table tl_forum_threads 
 */
$GLOBALS['TL_DCA']['tl_forum_threads'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_forum_forums',
		'ctable'                      => array('tl_forum_posts'),
		'enableVersioning'            => true,
		'onsubmit_callback' => array
		(
			array('tl_forum_threads', 'adjustTime')
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 6,
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_threads']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_threads']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_threads']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_threads']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			),
			'posts' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_threads']['posts'],
				'href'                => 'table=tl_forum_posts',
				'icon'                => 'edit.gif',
				'attributes'          => 'class="contextmenu"'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array(''),
		'default'                     => 'title;{forum_creator_information},created_by,created_date,created_time;{forum_additional_settings},deleted'
	),

	// Subpalettes
	'subpalettes' => array
	(
		''                            => ''
	),

	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_threads']['title'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'created_by' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_threads']['created_by'],
			'exclude'                 => false,
			'inputType'               => 'select',
			'options_callback'        => array('tl_forum_threads', 'getMembers'),
			'eval'                    => array('mandatory'=>true, 'multiple'=>false)
		),
		'created_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_threads']['created_date'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true,'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString())
		),
		'created_time' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_threads']['created_time'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true,'rgxp'=>'time')
		),
		'deleted' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_threads']['deleted'],
			'exclude'                 => false,
			'inputType'               => 'checkbox',
			'eval'                    => array('mandatory'=>false)
		)
	)
);

class tl_forum_threads extends Backend
{
	
	public function getMembers($dc)
	{
		$return = array();
		$objMembers = $this->Database->prepare("SELECT * FROM tl_member WHERE disable=?")->execute('');

		if ($objMembers->numRows < 1)
		{
			return array();
		}
		
		while ($objMembers->next())
		{
			
			$return[$objMembers->id] = $objMembers->firstname . " " . $objMembers->lastname . "(" . $objMembers->username . ")";
			
		}
		
		return $return;
	}
	
	public function adjustTime(DataContainer $dc)
	{
		// Return if there is no active record (override all)
		if (!$dc->activeRecord)
		{
			return;
		}

		// Adjust start and end time
		$arrSet['created_time'] = strtotime(date('Y-m-d', $dc->activeRecord->created_date) . ' ' . date('H:i:s', $dc->activeRecord->created_time));

		$this->Database->prepare("UPDATE tl_forum_threads %s WHERE id=?")->set($arrSet)->execute($dc->id);
	}
	
}

?>