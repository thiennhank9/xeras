<?php
/**
 * VW Ecommerce Shop Theme Customizer
 *
 * @package VW Ecommerce Shop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_ecommerce_shop_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_ecommerce_shop_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-ecommerce-shop' ),
	    'description' => __( 'Description of what this panel does.', 'vw-ecommerce-shop' ),
	) );

	$wp_customize->add_section( 'vw_ecommerce_shop_left_right', array(
    	'title'      => __( 'General Settings', 'vw-ecommerce-shop' ),
		'priority'   => 30,
		'panel' => 'vw_ecommerce_shop_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_ecommerce_shop_theme_options',array(
	        'default' => __('Right Sidebar','vw-ecommerce-shop'),
	        'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_ecommerce_shop_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Do you want this section','vw-ecommerce-shop'),
	        'section' => 'vw_ecommerce_shop_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','vw-ecommerce-shop'),
	            'Right Sidebar' => __('Right Sidebar','vw-ecommerce-shop'),
	            'One Column' => __('One Column','vw-ecommerce-shop'),
	            'Three Columns' => __('Three Columns','vw-ecommerce-shop'),
	            'Four Columns' => __('Four Columns','vw-ecommerce-shop'),
	            'Grid Layout' => __('Grid Layout','vw-ecommerce-shop')
	        ),
	    )
    );

	$font_array = array(
        '' =>'No Fonts', 
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' =>'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' =>'Arimo', 
        'Arsenal' =>'Arsenal', 
        'Arvo' =>'Arvo', 
        'Alegreya' =>  'Alegreya', 
        'Alfa Slab One' =>  'Alfa Slab One', 
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' =>'Bangers',
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' => 'Bitter', 
        'Bree Serif' =>'Bree Serif',
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo',
        'Courgette' =>'Courgette',
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond',
        'Crimson Text' =>'Crimson Text', 
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' => 'Days One', 
        'Dosis' =>'Dosis', 
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One', 
        'Fjalla One' =>  'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' =>'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee',
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One', 
        'Josefin Slab' => 'Josefin Slab',
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' =>'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' =>'Lato',
        'Lora' =>'Lora',
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' =>'Lobster Two', 
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' =>'Muli', 
        'Marck Script' => 'Marck Script', 
        'Noto Serif' => 'Noto Serif', 
        'Open Sans' =>'Open Sans', 
        'Overpass' =>'Overpass',
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron', 
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico', 
        'Padauk' => 'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' => 'PT Sans', 
        'Philosopher' => 'Philosopher',
        'Permanent Marker' =>'Permanent Marker', 
        'Poiret One' =>'Poiret One', 
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt', 
        'Russo One' => 'Russo One',
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo',
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light',
        'Sacramento' =>'Sacramento', 
        'Shrikhand' =>'Shrikhand', 
        'Tangerine' =>'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323', 
        'Varela Round' =>'Varela Round', 
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' =>'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Typography
	$wp_customize->add_section( 'vw_ecommerce_shop_typography', array(
    	'title'      => __( 'Typography', 'vw-ecommerce-shop' ),
		'priority'   => 30,
		'panel' => 'vw_ecommerce_shop_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'vw_ecommerce_shop_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_ecommerce_shop_paragraph_color', array(
		'label' => __('Paragraph Color', 'vw-ecommerce-shop'),
		'section' => 'vw_ecommerce_shop_typography',
		'settings' => 'vw_ecommerce_shop_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('vw_ecommerce_shop_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_ecommerce_shop_paragraph_font_family', array(
	    'section'  => 'vw_ecommerce_shop_typography',
	    'label'    => __( 'Paragraph Fonts','vw-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('vw_ecommerce_shop_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_typography',
		'setting'	=> 'vw_ecommerce_shop_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'vw_ecommerce_shop_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_ecommerce_shop_atag_color', array(
		'label' => __('"a" Tag Color', 'vw-ecommerce-shop'),
		'section' => 'vw_ecommerce_shop_typography',
		'settings' => 'vw_ecommerce_shop_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('vw_ecommerce_shop_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_ecommerce_shop_atag_font_family', array(
	    'section'  => 'vw_ecommerce_shop_typography',
	    'label'    => __( '"a" Tag Fonts','vw-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'vw_ecommerce_shop_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_ecommerce_shop_li_color', array(
		'label' => __('"li" Tag Color', 'vw-ecommerce-shop'),
		'section' => 'vw_ecommerce_shop_typography',
		'settings' => 'vw_ecommerce_shop_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('vw_ecommerce_shop_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_ecommerce_shop_li_font_family', array(
	    'section'  => 'vw_ecommerce_shop_typography',
	    'label'    => __( '"li" Tag Fonts','vw-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'vw_ecommerce_shop_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_ecommerce_shop_h1_color', array(
		'label' => __('H1 Color', 'vw-ecommerce-shop'),
		'section' => 'vw_ecommerce_shop_typography',
		'settings' => 'vw_ecommerce_shop_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('vw_ecommerce_shop_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_ecommerce_shop_h1_font_family', array(
	    'section'  => 'vw_ecommerce_shop_typography',
	    'label'    => __( 'H1 Fonts','vw-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('vw_ecommerce_shop_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_h1_font_size',array(
		'label'	=> __('H1 Font Size','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_typography',
		'setting'	=> 'vw_ecommerce_shop_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'vw_ecommerce_shop_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_ecommerce_shop_h2_color', array(
		'label' => __('h2 Color', 'vw-ecommerce-shop'),
		'section' => 'vw_ecommerce_shop_typography',
		'settings' => 'vw_ecommerce_shop_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('vw_ecommerce_shop_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_ecommerce_shop_h2_font_family', array(
	    'section'  => 'vw_ecommerce_shop_typography',
	    'label'    => __( 'h2 Fonts','vw-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('vw_ecommerce_shop_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_h2_font_size',array(
		'label'	=> __('h2 Font Size','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_typography',
		'setting'	=> 'vw_ecommerce_shop_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'vw_ecommerce_shop_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_ecommerce_shop_h3_color', array(
		'label' => __('h3 Color', 'vw-ecommerce-shop'),
		'section' => 'vw_ecommerce_shop_typography',
		'settings' => 'vw_ecommerce_shop_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('vw_ecommerce_shop_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_ecommerce_shop_h3_font_family', array(
	    'section'  => 'vw_ecommerce_shop_typography',
	    'label'    => __( 'h3 Fonts','vw-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('vw_ecommerce_shop_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_h3_font_size',array(
		'label'	=> __('h3 Font Size','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_typography',
		'setting'	=> 'vw_ecommerce_shop_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'vw_ecommerce_shop_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_ecommerce_shop_h4_color', array(
		'label' => __('h4 Color', 'vw-ecommerce-shop'),
		'section' => 'vw_ecommerce_shop_typography',
		'settings' => 'vw_ecommerce_shop_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('vw_ecommerce_shop_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_ecommerce_shop_h4_font_family', array(
	    'section'  => 'vw_ecommerce_shop_typography',
	    'label'    => __( 'h4 Fonts','vw-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('vw_ecommerce_shop_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_h4_font_size',array(
		'label'	=> __('h4 Font Size','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_typography',
		'setting'	=> 'vw_ecommerce_shop_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'vw_ecommerce_shop_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_ecommerce_shop_h5_color', array(
		'label' => __('h5 Color', 'vw-ecommerce-shop'),
		'section' => 'vw_ecommerce_shop_typography',
		'settings' => 'vw_ecommerce_shop_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('vw_ecommerce_shop_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_ecommerce_shop_h5_font_family', array(
	    'section'  => 'vw_ecommerce_shop_typography',
	    'label'    => __( 'h5 Fonts','vw-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('vw_ecommerce_shop_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_h5_font_size',array(
		'label'	=> __('h5 Font Size','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_typography',
		'setting'	=> 'vw_ecommerce_shop_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'vw_ecommerce_shop_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_ecommerce_shop_h6_color', array(
		'label' => __('h6 Color', 'vw-ecommerce-shop'),
		'section' => 'vw_ecommerce_shop_typography',
		'settings' => 'vw_ecommerce_shop_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('vw_ecommerce_shop_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_ecommerce_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_ecommerce_shop_h6_font_family', array(
	    'section'  => 'vw_ecommerce_shop_typography',
	    'label'    => __( 'h6 Fonts','vw-ecommerce-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('vw_ecommerce_shop_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_h6_font_size',array(
		'label'	=> __('h6 Font Size','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_typography',
		'setting'	=> 'vw_ecommerce_shop_h6_font_size',
		'type'	=> 'text'
	));	

    
	//Topbar section
	$wp_customize->add_section('vw_ecommerce_shop_topbar',array(
		'title'	=> __('Topbar Section','vw-ecommerce-shop'),
		'description'	=> __('Add Header Content here','vw-ecommerce-shop'),
		'priority'	=> null,
		'panel' => 'vw_ecommerce_shop_panel_id',
	));
	
	$wp_customize->add_setting('vw_ecommerce_shop_shipping',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_shipping',array(
		'label'	=> __('Add Text','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_topbar',
		'setting'	=> 'vw_ecommerce_shop_shipping',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_return',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_return',array(
		'label'	=> __('Add Text','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_topbar',
		'setting'	=> 'vw_ecommerce_shop_return',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_cash',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_cash',array(
		'label'	=> __('Add Text','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_topbar',
		'setting'	=> 'vw_ecommerce_shop_cash',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_contact',array(
		'label'	=> __('Add Phone Number','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_topbar',
		'setting'	=> 'vw_ecommerce_shop_contact',
		'type'		=> 'text'
	));

	//Social Icons(topbar)
	$wp_customize->add_section('vw_ecommerce_shop_topbar_header',array(
		'title'	=> __('Social Icon Section','vw-ecommerce-shop'),
		'description'	=> __('Add Header Content here','vw-ecommerce-shop'),
		'priority'	=> null,
		'panel' => 'vw_ecommerce_shop_panel_id',
	));

	$wp_customize->add_setting('vw_ecommerce_shop_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_youtube_url',array(
		'label'	=> __('Add Youtube link','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_topbar_header',
		'setting'	=> 'vw_ecommerce_shop_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_facebook_url',array(
		'label'	=> __('Add Facebook link','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_topbar_header',
		'setting'	=> 'vw_ecommerce_shop_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('vw_ecommerce_shop_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_twitter_url',array(
		'label'	=> __('Add Twitter link','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_topbar_header',
		'setting'	=> 'vw_ecommerce_shop_twitter_url',
		'type'	=> 'url'
	));
	
	$wp_customize->add_setting('vw_ecommerce_shop_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_insta_url',array(
		'label'	=> __('Add Instagram link','vw-ecommerce-shop'),
		'section'	=> 'vw_ecommerce_shop_topbar_header',
		'setting'	=> 'vw_ecommerce_shop_insta_url',
		'type'	=> 'url'
	));
	
	//home page slider
	$wp_customize->add_section( 'vw_ecommerce_shop_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-ecommerce-shop' ),
		'priority'   => 30,
		'panel' => 'vw_ecommerce_shop_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_ecommerce_shop_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_ecommerce_shop_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'vw_ecommerce_shop_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-ecommerce-shop' ),
			'section'  => 'vw_ecommerce_shop_slidersettings',
			'type'     => 'dropdown-pages'
		) );

	}

	//Trending Product
	$wp_customize->add_section('vw_ecommerce_shop_products',array(
		'title'	=> __('Trending Products','vw-ecommerce-shop'),
		'description'=> __('This section will appear below the slider.','vw-ecommerce-shop'),
		'panel' => 'vw_ecommerce_shop_panel_id',
	));	
	
	$wp_customize->add_setting('vw_ecommerce_shop_maintitle',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_ecommerce_shop_maintitle',array(
		'label'	=> __('Section Title','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_products',
		'setting'=> 'vw_ecommerce_shop_maintitle',
		'type'=> 'text'
	));	

	for ( $count = 0; $count <= 0; $count++ ) {

		$wp_customize->add_setting( 'vw_ecommerce_shop_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		));
		$wp_customize->add_control( 'vw_ecommerce_shop_page' . $count, array(
			'label'    => __( 'Select Page', 'vw-ecommerce-shop' ),
			'section'  => 'vw_ecommerce_shop_products',
			'type'     => 'dropdown-pages'
		));
	}

	//Footer Text
	$wp_customize->add_section('vw_ecommerce_shop_footer',array(
		'title'	=> __('Footer','vw-ecommerce-shop'),
		'description'=> __('This section will appear in the footer','vw-ecommerce-shop'),
		'panel' => 'vw_ecommerce_shop_panel_id',
	));	
	
	$wp_customize->add_setting('vw_ecommerce_shop_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_ecommerce_shop_footer_text',array(
		'label'	=> __('Copyright Text','vw-ecommerce-shop'),
		'section'=> 'vw_ecommerce_shop_footer',
		'setting'=> 'vw_ecommerce_shop_footer_text',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_ecommerce_shop_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Ecommerce_Shop_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Ecommerce_Shop_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Ecommerce_Shop_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'VW E-commerce Pro', 'vw-ecommerce-shop' ),
					'pro_text' => esc_html__( 'Upgrade Pro','vw-ecommerce-shop' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/premium/ecommerce-wordpress-theme/')
				)
			)	
		);

		// Register sections.
		$manager->add_section(
			new VW_Ecommerce_Shop_Customize_Section_Pro(
				$manager,
				'example_2',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Documentation', 'vw-ecommerce-shop' ),
					'pro_text' => esc_html__( 'Docs', 'vw-ecommerce-shop' ),
					'pro_url'  => admin_url( 'themes.php?page=vw_ecommerce_shop_guide')
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-ecommerce-shop-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-ecommerce-shop-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Ecommerce_Shop_Customize::get_instance();