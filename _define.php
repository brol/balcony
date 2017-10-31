<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
# This file is part of Balcony, a theme for Dotclear.
#
# Copyright (c) 2010 - 2016 annso (contact@as-i-am.fr) and contributors
#
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
# -- END LICENSE BLOCK ------------------------------------
if (!defined('DC_RC_PATH')) { return; }

$this->registerModule(
	/* Name */			"Balcony",
	/* Description*/	"Theme illustrated by Sophie Griotto",
	/* Author */		"annso, Pierre Van Glabeke",
	/* Version */		'1.4',
	array(
		'type'	 =>	'theme',
		'tplset' => 'mustek',
		'dc_min' => '2.8'
	)
);