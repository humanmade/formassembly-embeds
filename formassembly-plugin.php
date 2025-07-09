<?php
/**
 * Plugin Name: FormAssembly Embeds
 * Description: This plugin provides embedding support for FormAssembly forms.
 * Version: 1.0.0
 * Author: Human Made Limited
 * Author URI: https://humanmade.com
 * License: GPL-2.0-or-later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: formassembly-embeds
 *
 * @package formassembly-embeds
 */

wp_embed_register_handler(
	'formassembly',
	'#https?://([^\.]+\.tfaforms\.net)/(?:publish/)?(.+)#i',
	function ( $matches ) {
		static $instance_id = 1;

		$embed = sprintf(
			'<script src="https://%2$s/publish/%3$s" data-qp-target-id="formassembly-form-%1$s" defer></script>' .
			'<div id="formassembly-form-%1$s" class="formassembly-form"></div>' .
			'<noscript><a href="%4$s" rel="nofollow">Open the form</a> (please enable JavaScript to use the form here).</noscript>',
			$instance_id++,
			$matches[1],
			$matches[2],
			$matches[0]
		);

		return $embed;
	}
);
