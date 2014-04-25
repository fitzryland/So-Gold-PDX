<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_options-page',
		'title' => 'Options Page',
		'fields' => array (
			array (
				'key' => 'field_5348911a7b567',
				'label' => 'Background Image',
				'name' => 'background_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

?>