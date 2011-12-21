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
 * Table tl_forum_posts 
 */
$GLOBALS['TL_DCA']['tl_forum_posts'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_forum_threads',
		'enableVersioning'            => true,
		'onsubmit_callback' => array
		(
			array('tl_forum_posts', 'adjustTime')
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('order_no'),
			'flag'                    => 12,
			'headerFields'            => array('title'),
			'child_record_callback'   => array('tl_forum_posts', 'listPosts'),
			'disableGrouping'		  => true,
		),
		'label' => array
		(
			'fields'                  => array('title','description'),
			'format'                  => '%s<br />%s'
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
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_posts']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_posts']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_posts']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_posts']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('changed'),
		'default'                     => 'title,text;{forum_creator_information},created_by,created_date,created_time,created_ip;{forum_additional_settings},changed,deleted'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'changed'                            => 'last_change_by,last_change_date,last_change_time,last_change_reason'
	),

	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_posts']['title'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255)
		),
		'text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_posts']['text'],
			'exclude'                 => true,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>true)
		),
		'created_by' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_posts']['created_by'],
			'exclude'                 => false,
			'inputType'               => 'select',
			'options_callback'        => array('tl_forum_posts', 'getMembers'),
			'eval'                    => array('mandatory'=>true, 'multiple'=>false)
		),
		'created_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_posts']['created_date'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true,'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard')
		),
		'created_time' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_posts']['created_time'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true,'rgxp'=>'time')
		),
		'created_ip' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_posts']['created_ip'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true)
		),
		'changed' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_posts']['changed'],
			'exclude'                 => false,
			'inputType'               => 'checkbox',
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
		),
		'last_change_by' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_posts']['last_change_by'],
			'exclude'                 => false,
			'inputType'               => 'select',
			'options_callback'        => array('tl_forum_posts', 'getMembers'),
			'eval'                    => array('mandatory'=>false, 'multiple'=>false)
		),
		'last_change_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_posts']['last_change_date'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false,'rgxp'=>'date', 'datepicker'=>$this->getDatePickerString())
		),
		'last_change_time' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_posts']['last_change_time'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false,'rgxp'=>'time')
		),
		'last_change_reason' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_posts']['last_change_reason'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false)
		),
		'deleted' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_posts']['deleted'],
			'exclude'                 => false,
			'inputType'               => 'checkbox',
			'eval'                    => array('mandatory'=>false)
		)
	)
);

class tl_forum_posts extends Backend
{
	public function editHeader($row, $href, $label, $title, $icon, $attributes)
	{
		return  '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
	}
	
	public function listPosts($arrRow)
	{
		return '<div><strong>' . $arrRow['title'] . '</strong><br />' . $arrRow['text'] . '</div>';
	}
	
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
		$arrSet['last_change_time'] = strtotime(date('Y-m-d', $dc->activeRecord->last_change_date) . ' ' . date('H:i:s', $dc->activeRecord->last_change_time));
		$this->Database->prepare("UPDATE tl_forum_posts %s WHERE id=?")->set($arrSet)->execute($dc->id);
	}
}
?>