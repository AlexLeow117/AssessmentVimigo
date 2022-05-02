<?php
/**
 * Demo info
 * 
 * @package Armonia
 * @since 1.2.0
 */
$demos_array = array(
    'armonia' => array(
        'name' => 'Armonia',
        'type' => 'free',
        'buy_url'=> 'https://blazethemes.com/theme/armonia-pro/',
        'external_url' => 'https://demo.blazethemes.com/import-files/armonia/armonia.zip',
        'image' => 'https://blazethemes.com/wp-content/uploads/2022/03/Mask-Group-5.jpg',
        'preview_url' => 'https://demo.blazethemes.com/armonia/',
        'menu_array' => array(
            'menu-1' => 'Header Menu'
        ),
        'home_slug' => 'Home',
        'blog_slug' => 'Blog',
        'plugins' => array(
            'woocommerce' => array(
                'name' => 'Woocommerce',
                'source' => 'wordpress',
                'file_path' => 'woocommerce/woocommerce.php'
            ),
            'contact-form-7'  => array(
                'name' => 'Contact Form 7',
                'source' => 'wordpress',
                'file_path' => 'contact-form-7/wp-contact-form-7.php'
            )
        ),
        'tags' => array(
            'free' => 'Free'
        )
    ),
    'armonia-nature' => array(
        'name' => 'Nature',
        'type' => 'free',
        'buy_url'=> 'https://blazethemes.com/theme/armonia-pro/',
        'external_url' => 'https://demo.blazethemes.com/import-files/armonia/armonia-nature.zip',
        'image' => 'https://blazethemes.com/wp-content/uploads/2022/03/armonia-nature.jpg',
        'preview_url' => 'https://demo.blazethemes.com/armonia-nature/',
        'menu_array' => array(
            'menu-1' => 'Header Menu'
        ),
        'home_slug' => 'Home',
        'blog_slug' => 'Blog',
        'plugins' => array(
            'contact-form-7'  => array(
                'name' => 'Contact Form 7',
                'source' => 'wordpress',
                'file_path' => 'contact-form-7/wp-contact-form-7.php'
            )
        ),
        'tags' => array(
            'free' => 'Free'
        )
    ),
    'armonia-pro' => array(
        'name' => 'Armonia Pro',
        'type' => 'pro',
        'buy_url'=> 'https://blazethemes.com/theme/armonia-pro/',
        'external_url' => 'https://demo.blazethemes.com/import-files/armonia/armonia-pro.zip',
        'image' => 'https://blazethemes.com/wp-content/uploads/2022/03/armonia-pro.jpg',
        'preview_url' => 'https://demo.blazethemes.com/armonia-pro/',
        'menu_array' => array(
            'menu-1' => 'Header Menu'
        ),
        'home_slug' => 'Home',
        'blog_slug' => 'Blog',
        'plugins' => array(
            'woocommerce' => array(
                'name' => 'Woocommerce',
                'source' => 'wordpress',
                'file_path' => 'woocommerce/woocommerce.php'
            ),
            'contact-form-7'  => array(
                'name' => 'Contact Form 7',
                'source' => 'wordpress',
                'file_path' => 'contact-form-7/wp-contact-form-7.php'
            )
        ),
        'tags' => array(
            'pro' => 'Pro'
        )
    ),
    'armonia-pro-fashion' => array(
        'name' => 'Fashion',
        'type' => 'pro',
        'buy_url'=> 'https://blazethemes.com/theme/armonia-pro/',
        'external_url' => 'https://demo.blazethemes.com/import-files/armonia/armonia-pro-fashion.zip',
        'image' => 'https://blazethemes.com/wp-content/uploads/2022/03/armonia-pro-fashion.jpg',
        'preview_url' => 'https://demo.blazethemes.com/armonia-pro-fashion/',
        'menu_array' => array(
            'menu-1' => 'Header Menu'
        ),
        'home_slug' => 'Sample Page',
        'blog_slug' => '',
        'plugins' => array(),
        'tags' => array(
            'pro' => 'Pro'
        )
    ),
    'armonia-pro-tech' => array(
        'name' => 'Tech',
        'type' => 'pro',
        'buy_url'=> 'https://blazethemes.com/theme/armonia-pro/',
        'external_url' => 'https://demo.blazethemes.com/import-files/armonia/armonia-pro-tech.zip',
        'image' => 'https://blazethemes.com/wp-content/uploads/2022/03/armonia-pro-tech.jpg',
        'preview_url' => 'https://demo.blazethemes.com/armonia-pro-tech/',
        'menu_array' => array(
            'menu-1' => 'Header Menu'
        ),
        'home_slug' => 'Home',
        'blog_slug' => 'Blog',
        'plugins' => array(
            'contact-form-7'  => array(
                'name' => 'Contact Form 7',
                'source' => 'wordpress',
                'file_path' => 'contact-form-7/wp-contact-form-7.php'
            )
        ),
        'tags' => array(
            'pro' => 'Pro'
        )
    ),
    'armonia-pro-masonry' => array(
        'name' => 'Masonry',
        'type' => 'pro',
        'buy_url'=> 'https://blazethemes.com/theme/armonia-pro/',
        'external_url' => 'https://demo.blazethemes.com/import-files/armonia/armonia-pro-masonry.zip',
        'image' => 'https://blazethemes.com/wp-content/uploads/2022/03/armonia-masonry-pro.jpg',
        'preview_url' => 'https://demo.blazethemes.com/armonia-pro-masonry/',
        'menu_array' => array(
            'menu-1' => 'Header Menu'
        ),
        'home_slug' => 'Home',
        'blog_slug' => 'Blog',
        'plugins' => array(
            'contact-form-7'  => array(
                'name' => 'Contact Form 7',
                'source' => 'wordpress',
                'file_path' => 'contact-form-7/wp-contact-form-7.php'
            ),
            'woocommerce' => array(
                'name' => 'Woocommerce',
                'source' => 'wordpress',
                'file_path' => 'woocommerce/woocommerce.php'
            ),
        ),
        'tags' => array(
            'pro' => 'Pro'
        )
    )
);
return apply_filters( 'armonia__demos_array_filter', $demos_array );