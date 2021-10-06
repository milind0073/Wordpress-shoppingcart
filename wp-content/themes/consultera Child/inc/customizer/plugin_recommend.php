<?php
/* Notify in customizer */
require get_template_directory() . '/inc/customizer-notify/consultera-customizer-notify.php';

$config_customizer = array(
	'recommended_plugins'       => array(
		'wpazure-kit' => array(
			'recommended' => true,
			'description' => sprintf('Activate by installing <strong>wpazure kit</strong> plugin to use front page and all theme features %s.', 'consultera'),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'consultera' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'consultera' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'consultera' ),
	'activate_button_label'     => esc_html__( 'Activate', 'consultera' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'consultera' ),
);
Consultera_Customizer_Notify::init( apply_filters( 'consultera_customizer_notify_array', $config_customizer ) );