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
 * -------------------------------------------------------------------------
 * BACK END MODULES
 * -------------------------------------------------------------------------
 *
 * Back end modules are stored in a global array called "BE_MOD". Each module 
 * has certain properties like an icon, an optional callback function and one 
 * or more tables. Each module belongs to a particular group.
 * 
 *   $GLOBALS['BE_MOD'] = array
 *   (
 *       'group_1' => array
 *       (
 *           'module_1' => array
 *           (
 *               'tables'       => array('table_1', 'table_2'),
 *               'key'          => array('Class', 'method'),
 *               'callback'     => 'ClassName',
 *               'icon'         => 'path/to/icon.gif',
 *               'stylesheet'   => 'path/to/stylesheet.css',
 *               'javascript'   => 'path/to/javascript.js'
 *           )
 *       )
 *   );
 * 
 * Use function array_insert() to modify an existing modules array.
 */
 $GLOBALS['BE_MOD']['forum'] = array
 (
   'tl_forum_forums' => array
	 (
	    'tables' => array('tl_forum_forums')
	 ),
	'tl_forum_threads' => array
	 (
	    'tables' => array('tl_forum_threads','tl_forum_posts')
	 ) 
 );

/**
 * -------------------------------------------------------------------------
 * FRONT END MODULES
 * -------------------------------------------------------------------------
 *
 * List all front end modules and their class names.
 * 
 *   $GLOBALS['FE_MOD'] = array
 *   (
 *       'group_1' => array
 *       (
 *           'module_1' => 'Contentlass',
 *           'module_2' => 'Contentlass'
 *       )
 *   );
 * 
 * Use function array_insert() to modify an existing CTE array.
 */
 

/**
 * -------------------------------------------------------------------------
 * CONTENT ELEMENTS
 * -------------------------------------------------------------------------
 *
 * List all content elements and their class names.
 * 
 *   $GLOBALS['TL_CTE'] = array
 *   (
 *       'group_1' => array
 *       (
 *           'cte_1' => 'Contentlass',
 *           'cte_2' => 'Contentlass'
 *       )
 *   );
 * 
 * Use function array_insert() to modify an existing CTE array.
 */
$GLOBALS['TL_CTE']['tl_forum']['forum_forum_list'] = 'forum_forum_list';  
$GLOBALS['TL_CTE']['tl_forum']['forum_thread_reader'] = 'forum_thread_reader'; 
$GLOBALS['TL_CTE']['tl_forum']['forum_thread_editor'] = 'forum_thread_editor'; 
$GLOBALS['TL_CTE']['tl_forum']['forum_post_editor'] = 'forum_post_editor'; 

/**
 * -------------------------------------------------------------------------
 * BACK END FORM FIELDS
 * -------------------------------------------------------------------------
 *
 * List all back end form fields and their class names.
 * 
 *   $GLOBALS['BE_FFL'] = array
 *   (
 *       'input'  => 'Class',
 *       'select' => 'Class'
 *   );
 * 
 * Use function array_insert() to modify an existing FFL array.
 */


/**
 * -------------------------------------------------------------------------
 * FRONT END FORM FIELDS
 * -------------------------------------------------------------------------
 *
 * List all form fields and their class names.
 * 
 *   $GLOBALS['TL_FFL'] = array
 *   (
 *       'input'  => Class,
 *       'select' => Class
 *   );
 * 
 * Use function array_insert() to modify an existing FFL array.
 */


/**
 * -------------------------------------------------------------------------
 * CACHE TABLES
 * -------------------------------------------------------------------------
 *
 * These tables are used to cache data and can be truncated using back end 
 * module "clear cache".
 * 
 *   $GLOBALS['TL_CACHE'] = array
 *   (
 *       'table_1',
 *       'table_2'
 *   );
 * 
 * Use function array_insert() to modify an existing cache array.
 */


/**
 * -------------------------------------------------------------------------
 * HOOKS
 * -------------------------------------------------------------------------
 *
 * Hooking allows you to register one or more callback functions that are 
 * called on a particular event in a specific order. Thus, third party 
 * extensions can add functionality to the core system without having to
 * modify the source code.
 * 
 *   $GLOBALS['TL_HOOKS'] = array
 *   (
 *       'hook_1' => array
 *       (
 *           array('Class', 'Method'),
 *           array('Class', 'Method')
 *       )
 *   );
 * 
 * Use function array_insert() to modify an existing hooks array.
 */


/**
 * -------------------------------------------------------------------------
 * PAGE TYPES
 * -------------------------------------------------------------------------
 *
 * Page types and their corresponding front end controller class.
 * 
 *   $GLOBALS['TL_PTY'] = array
 *   (
 *       'type_1' => 'PageType1',
 *       'type_2' => 'PageType2'
 *   );
 * 
 * Use function array_insert() to modify an existing page types array.
 */
 
?>