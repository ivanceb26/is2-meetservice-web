<?php
// $Id$

if (drupal_is_front_page()) {
	drupal_add_js(drupal_get_path('theme', 'metropolis') . '/scripts/jquery.cycle.all.min.js');
}

function metropolis_id_safe($string) {
	// Replace with dashes anything that isn't A-Z, numbers, dashes, or underscores.
	$string = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', $string));
	// If the first character is not a-z, add 'id' in front.
	if (!ctype_lower($string{0})) { // Don't use ctype_alpha since it is locale aware.
		$string = 'id' . $string;
	}
	return $string;
}
 
function metropolis_preprocess_page(&$vars, $hook) {
		
	// Add additional body classes
	$body_classes = array($vars['body_classes']);
	
	if (!$vars['is_front']) {
    // Add unique classes for each page and website section
    $path = drupal_get_path_alias($_GET['q']);
    list($section, ) = explode('/', $path, 2);

    $body_classes[] = metropolis_id_safe('page-' . $path);
    $body_classes[] = metropolis_id_safe('section-' . $section);
		if (arg(0) == 'node') {
			if (arg(1) == 'add') {
				if ($section == 'node') {
					array_pop($body_classes); // Remove 'section-node'
				}
				$body_classes[] = 'section-node-add'; // Add 'section-node-add'
			}
			elseif (is_numeric(arg(1)) && (arg(2) == 'edit' || arg(2) == 'delete')) {
				if ($section == 'node') {
					array_pop($body_classes); // Remove 'section-node'
				}
				$body_classes[] = 'section-node-' . arg(2); // Add 'section-node-edit' or 'section-node-delete'
			}
		}
	}

	if (module_exists('taxonomy') && $vars['node']->nid) {
		foreach (taxonomy_node_get_terms($vars['node']) as $term) {
			$body_classes[] = metropolis_id_safe ('tax-' . eregi_replace('[^a-z0-9]', '-', $term->name));
		}
	}
	
	if (isset($vars['node'])) {
		$body_classes[] = ($vars['node']) ? 'page-view' : '';
	}

	$vars['body_classes'] = implode(' ', $body_classes);
	$vars['footer_message'] .= '<div style="clear:both; font-size:11px; text-align:center;"><em>Theme provided by <a href="http://drupalbycity.com">DrupalByCity</a> under GPL license from <a href="http://comprendo.dk">Comprendo</a></em></div>';

 }
 
function metropolis_blocks($region) {
	$output = '';
	
	if ($list = block_list($region)) {
		$blockcounter = 1;
		foreach ($list as $key => $block) {
			$block->extraclass = '';
			$block->extraclass .= ( $blockcounter == 1 ? ' block-first' : '' );
			$block->extraclass .= ( $blockcounter == count($list) ? ' block-last' : '' );
			$output .= theme('block', $block);
			$blockcounter++;
		}
	}

	// Add any content assigned to this region through drupal_set_content() calls.
	$output .= drupal_get_content($region);
	
	return $output;
}

function metropolis_preprocess_block(&$vars){
	$vars['classes'] .= $vars['block']->extraclass;
}