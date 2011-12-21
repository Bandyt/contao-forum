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
$GLOBALS['TL_DCA']['tl_forum_settings'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'File',
	),
	// Palettes
	'palettes' => array
	(
		'default'                     => '{forum_redirect_settings},forum_redirect_threadreader,forum_redirect_threadeditor,forum_redirect_forumlist,forum_redirect_posteditor,forum_redirect_moderator_panel;
		{forum_logging},forum_logging_mod_delete_post'
	),

	// Subpalettes
	'subpalettes' => array
	(
	),

	// Fields
	'fields' => array
	(
		'forum_redirect_threadreader' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_settings']['forum_redirect_threadreader'],
			'exclude'                 => false,
			'inputType'               => 'pageTree',
			'eval'                    => array('mandatory'=>true,'fieldType'=>'radio', 'tl_class'=>'clr')
		),
		'forum_redirect_threadeditor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_settings']['forum_redirect_threadeditor'],
			'exclude'                 => false,
			'inputType'               => 'pageTree',
			'eval'                    => array('mandatory'=>true,'fieldType'=>'radio', 'tl_class'=>'clr')
		),
		'forum_redirect_forumlist' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_settings']['forum_redirect_forumlist'],
			'exclude'                 => false,
			'inputType'               => 'pageTree',
			'eval'                    => array('mandatory'=>true,'fieldType'=>'radio', 'tl_class'=>'clr')
		),
		'forum_redirect_posteditor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_settings']['forum_redirect_posteditor'],
			'exclude'                 => false,
			'inputType'               => 'pageTree',
			'eval'                    => array('mandatory'=>true,'fieldType'=>'radio', 'tl_class'=>'clr')
		),
		'forum_redirect_moderator_panel' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_settings']['forum_redirect_moderator_panel'],
			'exclude'                 => false,
			'inputType'               => 'pageTree',
			'eval'                    => array('mandatory'=>true,'fieldType'=>'radio', 'tl_class'=>'clr')
		),
		'forum_logging_mod_delete_post' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_settings']['forum_loggin_mod_delete_post'],
			'exclude'                 => false,
			'inputType'               => 'select',
			'options'				  => array('L','N'),
			'reference'				  => &$GLOBALS['TL_LANG']['tl_forum_settings']['logging']['reference'],
			'eval'                    => array('mandatory'=>true)
		)
	)
);
?>