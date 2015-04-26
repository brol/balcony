<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
# This file is part of Balcony, a theme for Dotclear.
#
# Copyright (c) 2010 - 2015 annso (contact@as-i-am.fr) and contributors
#
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
# -- END LICENSE BLOCK ------------------------------------

if (!defined('DC_CONTEXT_ADMIN')) { return; }

global $core;

//PARAMS

# Translations
l10n::set(dirname(__FILE__).'/locales/'.$_lang.'/public');

# Default values
$default_menu = 'simplemenu';

# Settings
$my_menu = $core->blog->settings->themes->balcony_menu;

# Menu type
$balcony_menu_combo = array(
	__('simpleMenu') => 'simplemenu',
	__('none') => 'menu-no'
);

// POST ACTIONS

if (!empty($_POST))
{
	try
	{
		$core->blog->settings->addNamespace('themes');

		# Menu type
		if (!empty($_POST['balcony_menu']) && in_array($_POST['balcony_menu'],$balcony_menu_combo))
		{
			$my_menu = $_POST['balcony_menu'];

		} elseif (empty($_POST['balcony_menu']))
		{
			$my_menu = $default_menu;

		}
		$core->blog->settings->themes->put('balcony_menu',$my_menu,'string','Menu to display',true);

		// Blog refresh
		$core->blog->triggerBlog();

		// Template cache reset
		$core->emptyTemplatesCache();

		dcPage::success(__('Theme configuration has been successfully updated.'),true,true);
	}
	catch (Exception $e)
	{
		$core->error->add($e->getMessage());
	}
}

// DISPLAY

# Menu
echo
'<div class="fieldset"><h4>'.__('Customizations').'</h4>'.
'<p class="field"><label>'.__('Menu to display:').'</label>'.
form::combo('balcony_menu',$balcony_menu_combo,$my_menu).
'</p>'.
'</div>';