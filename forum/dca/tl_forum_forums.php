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
 * Table tl_forum_forums 
 */
$GLOBALS['TL_DCA']['tl_forum_forums'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_forum_threads','tl_forum_user_settings'),
		'enableVersioning'            => true,
		'label'						  => &$GLOBALS['TL_LANG']['tl_forum_forums']['dca_label']
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 5
		),
		'label' => array
		(
			'fields'                  => array('title','description'),
			'format'                  => '%s<br /><i>%s</i>',
			'label_callback'          => array('tl_forum_forums', 'addIcon')
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
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_forums']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_forums']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_forums']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_forums']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			),
			'user_settings' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_forums']['user_settings'],
				'href'                => 'table=tl_forum_user_settings',
				'icon'                => 'edit.gif',
				'attributes'          => 'class="contextmenu"'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('forum_type'),
		'default'                     => 'pid,forum_type'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'forum_type_R'			      => 'title;{forum_redirect_settings},forum_redirect_threadreader,forum_redirect_threadeditor,forum_redirect_forumlist,forum_redirect_posteditor,forum_redirect_moderator_panel;',
		'forum_type_F'			      => 'title,description'
	),

	// Fields
	'fields' => array
	(
		'forum_type' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_forums']['forum_type'],
			'exclude'                 => false,
			'inputType'               => 'select',
			'options'				  => array('R','F'),
			'reference'				  => &$GLOBALS['TL_LANG']['tl_forum_forums']['forum_type']['reference'],
			'eval'                    => array('mandatory'=>true,'submitOnChange'=>true)
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_forums']['title'],
			'exclude'                 => false,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'description' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_forums']['description'],
			'exclude'                 => false,
			'inputType'               => 'textarea',
			'eval'                    => array()
		),
		'forum_redirect_threadreader' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_forums']['forum_redirect_threadreader'],
			'exclude'                 => false,
			'inputType'               => 'pageTree',
			'eval'                    => array('mandatory'=>true,'fieldType'=>'radio', 'tl_class'=>'clr')
		),
		'forum_redirect_threadeditor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_forums']['forum_redirect_threadeditor'],
			'exclude'                 => false,
			'inputType'               => 'pageTree',
			'eval'                    => array('mandatory'=>true,'fieldType'=>'radio', 'tl_class'=>'clr')
		),
		'forum_redirect_forumlist' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_forums']['forum_redirect_forumlist'],
			'exclude'                 => false,
			'inputType'               => 'pageTree',
			'eval'                    => array('mandatory'=>true,'fieldType'=>'radio', 'tl_class'=>'clr')
		),
		'forum_redirect_posteditor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_forums']['forum_redirect_posteditor'],
			'exclude'                 => false,
			'inputType'               => 'pageTree',
			'eval'                    => array('mandatory'=>true,'fieldType'=>'radio', 'tl_class'=>'clr')
		),
		'forum_redirect_moderator_panel' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_forums']['forum_redirect_moderator_panel'],
			'exclude'                 => false,
			'inputType'               => 'pageTree',
			'eval'                    => array('mandatory'=>true,'fieldType'=>'radio', 'tl_class'=>'clr')
		)
	)
);
class tl_forum_forums extends Backend
{
	public function addIcon($row, $label, DataContainer $dc=null, $imageAttribute='', $blnReturnImage=false)
	{
		$newLabel='';
		if($row['forum_type']=='R')
		{
			$newLabel.=$this->generateImage('root.gif', '', $imageAttribute);
			$newLabel.=$row['title'];
		}
		else
		{
			$newLabel.=$row['title'] . '<br /><i>' . $row['description'] . '</i>';
		}
		
		return $newLabel;
		
	}
}
?>