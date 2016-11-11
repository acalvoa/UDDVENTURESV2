<?php 
    /*
    Plugin Name: UDD Ventures Landing
    Description: Plugin implementado para configurar el sitio UDD Ventures Landing
    Author: Angelo Calvo A.
    Version: 1.0
    Author URI: http://www.github.com/acalvoa
    */
    // La función para llamar a las configuraciones
    // Configuraciones
    function UDDVentures_landing_Panel()
    {
        // Verificamos si el usuario puede administrar opciones, en caso de que no pueda
        // se envía un mensaje que no tiene los permisos suficientes
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
        include("config_panel.php");
    }
    function UDDVentures_landing_settings(){
        register_setting('UDD_landing_settings', 'landing-img-alumnos' );
        register_setting('UDD_landing_settings', 'landing-img-aceleradora' );
    }
    function UDDVentures_Menu_landing() {
        add_options_page( 'UDDVentures Landing', 'UDDVentures Landing', 'manage_options', 'udd_landing_settings', 'UDDVentures_landing_Panel' );
    }
    //FUNCIONES DE USUARIOS
    function get_landing_alumnos_image() {
        return get_option('landing-img-alumnos');
    }
    //FUNCIONES DE USUARIOS
    function get_landing_aceleradora_image() {
        return get_option('landing-img-aceleradora');
    }
    //REGISTRAMOS TODAS LAS ACCIONES EJECUTADAS
    add_action( 'admin_menu', 'UDDVentures_Menu_landing');
    add_action( 'admin_menu', 'UDDVentures_landing_settings');
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
