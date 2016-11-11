<?php 
    /*
    Plugin Name: UDD Ventures Alumnos
    Description: Plugin implementado para configurar el sitio UDD Ventures Alumnos
    Author: Angelo Calvo A.
    Version: 1.0
    Author URI: http://www.github.com/acalvoa
    */
    // La función para llamar a las configuraciones
    // Configuraciones
    function UDDVentures_alumnos_Panel()
    {
        // Verificamos si el usuario puede administrar opciones, en caso de que no pueda
        // se envía un mensaje que no tiene los permisos suficientes
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
        include("config_panel.php");
    }
    function UDDVentures_alumnos_settings(){
        register_setting('UDD_alumnos_settings', 'landing-img' );
        register_setting('UDD_alumnos_settings', 'postula-img' );
        register_setting('UDD_alumnos_settings', 'faq-img' );
        register_setting('UDD_alumnos_settings', 'postula-img-int' );
        register_setting('UDD_alumnos_settings', 'eventos-img' );
        register_setting('UDD_alumnos_settings', 'facebook-general' );
        register_setting('UDD_alumnos_settings', 'twitter-general' );
    }
    function UDDVentures_Menu_Alumnos() {
        add_options_page( 'UDDVentures Alumnos', 'UDDVentures Alumnos', 'manage_options', 'udd_alumnos_settings', 'UDDVentures_alumnos_Panel' );
    }
    //FUNCIONES DE USUARIOS
    function get_landing_alumnos_image() {
        return get_option('landing-img');
    }
    function get_postula_image() {
        return get_option('postula-img');
    }
    function get_postula_int_image() {
        return get_option('postula-img-int');
    }
    function get_eventos_image() {
        return get_option('eventos-img');
    }
    function get_faq_image() {
        return get_option('faq-img');
    }
    function get_facebook_general() {
        return get_option('facebook-general');
    }
    function get_twitter_general() {
        return get_option('twitter-general');
    }
    //REGISTRAMOS TODAS LAS ACCIONES EJECUTADAS
    add_action( 'admin_menu', 'UDDVentures_Menu_Alumnos');
    add_action( 'admin_menu', 'UDDVentures_alumnos_settings');
    function wp_gear_manager_admin_scripts() {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('jquery');
    }

    function wp_gear_manager_admin_styles() {
     wp_enqueue_style('thickbox');
    }

    add_action('admin_print_scripts', 'wp_gear_manager_admin_scripts');
    add_action('admin_print_styles', 'wp_gear_manager_admin_styles');
?>