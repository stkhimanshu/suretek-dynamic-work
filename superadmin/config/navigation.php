<?php

$navigation = [

    [
        'title' => 'Dashboard',
        'icon'  => 'dashboard',
        'url'   => ADMIN_PATH . '/pages/dashboard.php',
    ],

    [
        'title' => 'Blogs',
        'icon'  => 'post',
        'url'   => ADMIN_PATH . '/pages/blogs/',
        'children' => [

            [
                'title' => 'All Blogs',
                'url'   => ADMIN_PATH . '/pages/blogs/',
            ],

            [
                'title' => 'Add Blog',
                'url'   => ADMIN_PATH . '/pages/blogs/create.php',
            ],

            [
                'title' => 'Categories',
                'url'   => ADMIN_PATH . '/pages/category/',
            ],

        ]
    ],

    [
        'title' => 'Case Studies',
        'icon'  => 'news',
        'url'   => ADMIN_PATH . '/pages/case-studies/',
    ],

    [
        'title' => 'Settings',
        'icon'  => 'settings',
        'url'   => ADMIN_PATH . '/pages/settings/',
        'children' => [

            [
                'title' => 'General',
                'url'   => ADMIN_PATH . '/pages/settings/general.php',
            ],

            [
                'title' => 'SEO',
                'url'   => ADMIN_PATH . '/pages/settings/seo.php',
            ],

        ]
    ],

];
