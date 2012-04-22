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
 * Table tl_forum_permissions 
 */
$GLOBALS['TL_DCA']['tl_forum_permissions'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'ptable'                      => 'tl_forum_forums'
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('member_group'),
			'headerFields'            => array('id','title'),
			'flag'                    => 11,
			'disableGrouping'		  => true,
			'child_record_callback'   => array('tl_forum_permissions', 'listPermissions'),
		),
		'label' => array
		(
			'fields'                  => array('group'),
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
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('user_group','u','u_fa','u_ta','u_te','u_ta_m','u_ta_o','u_te','u_te_m','u_te_m_t','u_te_m_s','u_te_m_l','u_te_m_d','u_pc','u_pe','u_pc_r','u_pc_q','u_pc_a','u_pe_m','u_pe_m_d','m','m_te','m_pe','m_te_t','m_te_l','m_te_s','m_te_d','m_te_m','m_pe_d'),
		'default'                     => 'user_group;{lbl_u},u;{lbl_m},m;'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'user_group'  		=> '',
		'user_group_G'		=> '',
		'user_group_B'		=> '',
		'user_group_C'		=> 'member_group',
		'u'			  		=> '',
		'u_A'				=> '',
		'u_D'				=> '',
		'u_N'				=> '',
		'u_C'				=> ';{lbl_u_fa},u_fa;{lbl_u_tc},u_tc;{lbl_u_te},u_te;{lbl_u_pc},u_pc;{lbl_u_pe},u_pe;',
		'u_fa'			  	=> '',
		'u_fa_A'			=> '',
		'u_fa_D'			=> '',
		'u_fa_N'			=> '',
		'u_fa_C'			=> 'u_fa_l,u_fa_r;',
		'u_ta'			  	=> '',
		'u_ta_A'			=> '',
		'u_ta_D'			=> '',
		'u_ta_N'			=> '',
		'u_ta_C'			=> 'u_ta_m,u_ta_o;',
		'u_ta_m'		  	=> '',
		'u_ta_m_A'			=> '',
		'u_ta_m_D'			=> '',
		'u_ta_m_N'			=> '',
		'u_ta_m_C'			=> 'u_ta_m_n,u_ta_m_b,u_ta_m_s,u_ta_m_l,u_ta_m_a;',
		'u_ta_o'		  	=> '',
		'u_ta_o_A'			=> '',
		'u_ta_o_D'			=> '',
		'u_ta_o_N'			=> '',
		'u_ta_o_C'			=> 'u_ta_o_n,u_ta_o_b,u_ta_o_s,u_ta_o_l,u_ta_o_a;',
		'u_te'			  	=> '',
		'u_te_A'	  		=> '',
		'u_te_D'	  		=> '',
		'u_te_N'	  		=> '',
		'u_te_C'	  		=> 'u_te_m;',
		'u_te_m'	  		=> '',
		'u_te_m_A'		  	=> '',
		'u_te_m_D'		  	=> '',
		'u_te_m_N'		  	=> '',
		'u_te_m_C'		  	=> 'u_te_m_h,u_te_m_t,u_te_m_s,u_te_m_l,u_te_m_d;',
		'u_te_m_t'		  	=> '',
		'u_te_m_t_A'	  	=> '',
		'u_te_m_t_D'	  	=> '',
		'u_te_m_t_N'	  	=> '',
		'u_te_m_t_C'	  	=> 'u_te_m_t_n,u_te_m_t_b,u_te_m_t_a',
		'u_te_m_s'		  	=> '',
		'u_te_m_s_A'	  	=> '',
		'u_te_m_s_D'	  	=> '',
		'u_te_m_s_N'	  	=> '',
		'u_te_m_s_C'	  	=> 'u_te_m_s_s,u_te_m_s_u',
		'u_te_m_l'		  	=> '',
		'u_te_m_l_A'	  	=> '',
		'u_te_m_l_D'	  	=> '',
		'u_te_m_l_N'	  	=> '',
		'u_te_m_l_C'	  	=> 'u_te_m_l_l,u_te_m_l_u',
		'u_te_m_d'		  	=> '',
		'u_te_m_d_A'	  	=> '',
		'u_te_m_d_D'	  	=> '',
		'u_te_m_d_N'	  	=> '',
		'u_te_m_d_C'  		=> 'u_te_m_d_d,u_te_m_d_u',
		'u_pc'				=> '',
		'u_pc_A'			=> '',
		'u_pc_D'			=> '',
		'u_pc_N'			=> '',
		'u_pc_C'			=> 'u_pc_r,u_pc_q,u_pc_a;',
		'u_pc_r'			=> '',
		'u_pc_r_A'			=> '',
		'u_pc_r_D'			=> '',
		'u_pc_r_N'			=> '',
		'u_pc_r_C'			=> 'u_pc_r_m,u_pc_p;',
		'u_pc_q'			=> '',
		'u_pc_q_A'			=> '',
		'u_pc_q_D'			=> '',
		'u_pc_q_N'			=> '',
		'u_pc_q_C'			=> 'u_pc_q_m,u_pc_q_o;',
		'u_pc_a'			=> '',
		'u_pc_a_A'			=> '',
		'u_pc_a_D'			=> '',
		'u_pc_a_N'			=> '',
		'u_pc_a_C'			=> 'u_pc_a_m,u_pc_a_o;',
		'u_pe'				=> '',
		'u_pe_A'			=> '',
		'u_pe_D'			=> '',
		'u_pe_N'			=> '',
		'u_pe_C'			=> 'u_pe_m;',
		'u_pe_m'			=> '',
		'u_pe_m_A'			=> '',
		'u_pe_m_D'			=> '',
		'u_pe_m_N'			=> '',
		'u_pe_m_C'			=> 'u_pe_m_h,u_pe_m_t,u_pe_m_d;',
		'u_pe_m_d'			=> '',
		'u_pe_m_d_A'		=> '',
		'u_pe_m_d_D'		=> '',
		'u_pe_m_d_N'		=> '',
		'u_pe_m_d_C'		=> 'u_pe_m_d_d,u_pe_m_d_u;',
		'm'			  		=> '',
		'm_A'				=> '',
		'm_D'				=> '',
		'm_N'				=> '',
		'm_C'				=> ';{lbl_m_te},m_te;{lbl_m_pe},m_pe;',
		'm_te'		  		=> '',
		'm_te_A'			=> '',
		'm_te_D'			=> '',
		'm_te_N'			=> '',
		'm_te_C'			=> 'm_te_h,m_te_t;{lbl_m_te_t},m_te_t;{lbl_m_te_l},m_te_l;{lbl_m_te_s},m_te_s;{lbl_m_te_d},m_te_d;{lbl_m_te_m},m_te_m;',
		'm_te_t'	  		=> '',
		'm_te_t_A'			=> '',
		'm_te_t_D'			=> '',
		'm_te_t_N'			=> '',
		'm_te_t_C'			=> 'm_te_t_n,m_te_t_a,m_te_t_b',
		'm_te_l'	  		=> '',
		'm_te_l_A'			=> '',
		'm_te_l_D'			=> '',
		'm_te_l_N'			=> '',
		'm_te_l_C'			=> 'm_te_l_l,m_te_l_u',
		'm_te_s'	  		=> '',
		'm_te_s_A'			=> '',
		'm_te_s_D'			=> '',
		'm_te_s_N'			=> '',
		'm_te_s_C'			=> 'm_te_s_s,m_te_s_u',
		'm_te_d'	  		=> '',
		'm_te_d_A'			=> '',
		'm_te_d_D'			=> '',
		'm_te_d_N'			=> '',
		'm_te_d_C'			=> 'm_te_d_d,m_te_d_u',
		'm_te_m'	  		=> '',
		'm_te_m_A'			=> '',
		'm_te_m_D'			=> '',
		'm_te_m_N'			=> '',
		'm_te_m_C'			=> 'm_te_m_f,m_te_m_t',
		'm_pe'		  		=> '',
		'm_pe_A'			=> '',
		'm_pe_D'			=> '',
		'm_pe_N'			=> '',
		'm_pe_C'			=> 'm_pe_h,m_pe_t;{lbl_m_pe_d},m_pe_d;',
		'm_pe_d'	  		=> '',
		'm_pe_d_A'			=> '',
		'm_pe_d_D'			=> '',
		'm_pe_d_N'			=> '',
		'm_pe_d_C'			=> 'm_pe_d_d,m_pe_d_u'
	),

	// Fields
	'fields' => array
	(
		'user_group' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['user_group'],
			'exclude'                 => false,
			'inputType'               => 'select',
			'options'                 => array('G','B','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['user_group']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
		),
		'member_group' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['member_group'],
			'exclude'                 => false,
			'inputType'               => 'select',
			'foreignKey'			  => 'tl_member_group.name',
			'eval'                    => array('mandatory'=>true, 'multiple'=>false, 'unique'=>true, 'doNotCopy'=>true)
		),
		'u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_fa' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_fa'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_fa_l' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_fa_l'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_fa_r' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_fa_r'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_ta' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_ta_m' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_m'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_ta_m_n' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_m_n'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_ta_m_b' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_m_b'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_ta_m_s' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_m_s'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_ta_m_l' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_m_l'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_ta_m_a' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_m_a'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_ta_o' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_o'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_ta_o_n' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_o_n'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_ta_o_b' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_o_b'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_ta_o_s' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_o_s'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_ta_o_l' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_o_l'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_ta_o_a' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_ta_o_a'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_tc' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_tc'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_te' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_h' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_h'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_t' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_t'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_t_n' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_t_n'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_t_b' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_t_b'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_t_a' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_t_a'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_s' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_s'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_s_s' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_s_s'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_s_u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_s_u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_l' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_l'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_l_l' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_l_l'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_l_u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_l_u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_d_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_d_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_te_m_d_u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_te_m_d_u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_pc' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_pc_r' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_r'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_pc_r_m' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_r_m'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_pc_r_o' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_r_o'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_pc_q' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_q'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_pc_q_m' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_q_m'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_pc_q_o' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_q_o'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_pc_a' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_a'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_pc_a_m' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_a_m'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_pc_a_o' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pc_a_o'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_pe' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_pe_m' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe_m'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_pe_m_h' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe_m_h'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_pe_m_t' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe_m_t'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_pe_m_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe_m_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'u_pe_m_d_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe_m_d_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'u_pe_m_d_u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['u_pe_m_d_u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>false)
			),
		'm' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_h' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_h'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_t' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_t_n' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t_n'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_t_b' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t_b'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_t_a' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_t_a'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_s' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_s'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_s_s' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_s_s'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_s_u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_s_u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_l' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_l'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_l_l' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_l_l'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_l_u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_l_u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_d_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_d_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_te_d_u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_te_d_u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_pe' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_pe_h' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_h'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_pe_t' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_t'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_pe_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N','C'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['group_permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_pe_d_d' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_d_d'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			),
		'm_pe_d_u' => array
			(
			'label'                   => &$GLOBALS['TL_LANG']['tl_forum_permissions']['m_pe_d_u'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => array('A','D','N'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_forum_permissions']['permission']['reference'],
			'eval'                    => array('mandatory'=>false,'submitOnChange'=>true)
			)
	)
);

class tl_forum_permissions extends Backend
{	
	public function listPermissions($arrRow)
	{
		switch($arrRow['user_group'])
		{
			case 'G':
				return 'Guests';
				break;
			case 'B':
				return 'Bots';
				break;
			case 'C':
				$objMembergroup = $this->Database->prepare("SELECT name FROM tl_member_group WHERE id=?")->execute($arrRow['member_group']);
				return 'Group: ' . $objMembergroup->name;
				break;				
		}
	}
}
?>