<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'IBAPE NACIONAL',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b style="color:#fff !important;font-size: 15px;">IBAPE NACIONAL</b>',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogonovo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 200,
            'height' => 200,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => true,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogonovo.png',
            'alt' => 'IBAPE NACIONAL',
            'effect' => 'animation__shake',
            'width' => 365,
            'height' => 134,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => false,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => 'navbar-expand-lg',
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => true,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-white-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-azul',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => '/',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'extensions' => [
        'breadcrumb' => [
            'enable' => true,
        ]
        ],

    'menu' => [
        // Navbar items:
        // [
        //     'type'         => 'navbar-search',
        //     'text'         => 'Procurar Candidato',
        //     'topnav_right' => true,
        //     'can'  => 'admin'
        // ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => false,
        ],
        // [
        //     'type'         => 'navbar-notification',
        //     'id'           => 'my-notification',      // An ID attribute (required).
        //     'icon'         => 'fas fa-bell',          // A font awesome icon (required).
        //     'label_color'  => 'danger-sucess',               // The initial badge color (optional).
        //     'url'          => 'notifications/show',   // The url to access all notifications/elements (required).
        //     'label'        => 0,
        //     'topnav_right' => true,                   // Or "topnav => true" to place on the left (required).
        //     'dropdown_mode'   => true,                // Enables the dropdown mode (optional).
        //     'dropdown_flabel' => 'Ver todas Notifica????es', // The label for the dropdown footer link (optional).
        //     'update_cfg'   => [
        //         'url' => 'notifications/get',         // The url to periodically fetch new data (optional).
        //         'period' => 30,                       // The update period for get new data (in seconds, optional).
        //     ],
        // ],

        // Sidebar items:
        // [
        //     'type' => 'sidebar-menu-search',
        //     'text' => 'search',
        // ],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        // [
        //     'text'        => 'Notifica????es',
        //     'url'         => 'admin/pages',
        //     'icon'        => 'far fa-fw fa-file sera',
        //     'label'       => 0,
        //     'label_color' => 'success',
        //     'classes' => 'test',
        // ],
        ['header' => 'Painel do Admin',
         'can' => 'admin'    
        ],
      
        [
            'text' => 'profile',
            'url'  => 'perfil',
            'icon' => 'fas fa-fw fa-user',
            'can'  => 'admin'
        ],
        // [
        //     'text' => 'change_password',
        //     'url'  => 'admin/settings',
        //     'icon' => 'fas fa-fw fa-lock',
        // ],
        [
            'text'    => 'Usu??rios do Sistema',
            'icon'    => 'fas fa-fw fa-share',
            'can' => 'admin',
            'submenu' => [
                [
                    'text' => 'Candidatos',
                    'url'  => 'candidato',
                ],
                [
                    'text' => 'Julgadores',
                    'url'  => 'julgador',
                    'active' => ['julgador*', 'regex:@^content/[0-9]+$@'],
                ],
                // [
                //     'text'    => 'Julgadores',
                //     'url'     => '#',
                //     'submenu' => [
                //         [
                //             'text' => 'level_two',
                //             'url'  => '#',
                //         ],
                //         [
                //             'text'    => 'level_two',
                //             'url'     => '#',
                //             'submenu' => [
                //                 [
                //                     'text' => 'level_three',
                //                     'url'  => '#',
                //                 ],
                //                 [
                //                     'text' => 'level_three',
                //                     'url'  => '#',
                //                 ],
                //             ],
                //         ],
                //     ],
                // ],
               
            ],
        ],
        // ['header' => 'labels'],
        // [
        //     'text'       => 'important',
        //     'icon_color' => 'red',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'warning',
        //     'icon_color' => 'green',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'information',
        //     'icon_color' => 'cyan',
        //     'url'        => '#',
        // ],


        //MENU CANDIDATO
        ['header' => 'Painel do Candidato - Inscri????o',
         'can' => 'candidato'    
        ],

        [
            'text' => ' Resumo',
            'url'  => '/',
            'icon' => 'fas fa-fw fa-tv',
            'can'  => 'candidato'
        ],

       [
        'text'    => 'Pr??-Qualifica????o',
        'icon'    => 'fas fa-fw fa-share',
        'can' => 'candidato',
        'submenu' => [
            [
                'text' => 'Dados Pessoais',
                'url'  => 'dados',
                'icon'    => 'fas fa-fw fa-user',
                'shift'   => 'ml-2',
                //'label'       => ' aprovado',
               // 'label_color' => 'success',
            ],
            [
                'text' => 'Requerimento',
                'url'  => 'requerimento',
                'icon'    => 'fas fa-fw fa-book',
                'shift'   => 'ml-2',
            ],
            [
                'text' => 'Declara????o de regularidade',
                'url'  => 'atestado',
                'icon'    => 'fas fa-clone',
                'shift'   => 'ml-2',
               // 'label'       => ' aprovado',
               // 'label_color' => 'success',
            ],
            [
                'text' => 'Diploma de Gradua????o',
                'url'  => 'diploma',
                'icon'    => 'fas fa-fw fa-university',
                'shift'   => 'ml-2',
            ],
            [
                'text' => 'Solicita????o justificada',
                'url'  => 'solicitacao',
                'icon'    => 'fas fa-wheelchair',
                'shift'   => 'ml-2',
            ],
            [
                'text' => 'Dados para Pagamento',
                'url'  => 'comprovante',
                'icon'    => 'fas fa-fw fa-barcode',
                'shift'   => 'ml-2',
            ],
        ],
    ],

    [
        'text'    => ' 1 - Forma????o Acad??mica',
        'icon'    => 'fas fa-fw fa-graduation-cap',
        'can' => 'candidato',
        'class' => 'teste',
        'submenu' => [
            [
                'text' => '1.1 - Profissional e Acad??mica',
                'url'  => 'formacao',
                'icon'    => 'fas fa-fw fa-graduation-cap',
                'active' => ['formacao/cadastro', 'regex:@^content/[0-9]+$@'],
                'label'       => 0,
                'label_color' => 'success',
                'id'           => 'formacaoacademica',
                'shift'   => 'ml-2',
            ],
            [
                'text' => '1.2 - Material T??cnico',
                'url'  => 'divulgacao',
                'icon'    => 'fas fa-fw fa-file',
                'active' => ['divulgacao/cadastro', 'regex:@^content/[0-9]+$@'],
                'label'       => 0,
                'label_color' => 'success',
                'id'           => 'materialtecnico',
                'shift'   => 'ml-2',
            ],
            [
                'text' => '1.3 - Trabalhos e Palestras Apresentados em Congressos e Correlatos',
                'url'  => 'trabalho',
                'icon'    => 'fas fa-fw fa-archive',
                'active' => ['trabalho/cadastro', 'regex:@^content/[0-9]+$@'],
                'label'       => 0,
                'label_color' => 'success',
                'id'           => 'trabalhopalestra',
                'shift'   => 'ml-2',
            ],
            [
                'text' => '1.4 Trabalhos Premiados em Congressos e correlatos',
                'url'  => 'premiado',
                'icon'    => 'fas fa-fw fa-trophy',
                'active' => ['premiado/cadastro', 'regex:@^content/[0-9]+$@'],
                'label'       => 0,
                'label_color' => 'success',
                'id'           => 'trabalhopremiado',
                'shift'   => 'ml-2',
            ],
            [
                'text' => '1.5 Exerc??cio da Doc??ncia',
                'url'  => 'docencia',
                'icon'    => 'fas fa-fw fa-university',
                'active' => ['docencia/cadastro', 'regex:@^content/[0-9]+$@'],
                'label'       => 0,
                'label_color' => 'success',
                'id'           => 'exerciciodocencia',
                'shift'   => 'ml-2',
            ],

            [
                'text' => 'Item 1 - Total',
                'url'  => '#',
                'icon'    => 'fas fa-fw fa-graduation-cap',
                'label'       => 0,
                'label_color' => 'success',
                'id'           => 'totalpontos',
                'shift'   => 'ml-2',
            ],

            [
                'text' => '(pontua????o m??xima para o item)',
                'url'  => '#',
                'id'           => 'textototal',
                'shift'   => 'ml-2',
            ],
        ],
    ],

    [
        'text'    => ' 2 - Capacidade T??cnica',
        'icon'    => 'fas fa-fw fa-gavel',
        
        'can' => 'candidato',
        
        'submenu' => [
            [
                'text' => '2.1 Tempo de Atua????o',
                'url'  => 'atuacao',
                'icon'    => 'fas fa-fw fa-clock',
                'active' => ['atuacao/cadastro', 'regex:@^content/[0-9]+$@'],
                'label'       => 0,
                'label_color' => 'success',
                'id'           => 'tempoatuacao',
                'shift'   => 'ml-2',
            ],
            [
                'text' => '2.2 An??lise Curricular',
                'url'  => 'analise',
                'icon'    => 'fas fa-fw fa-search-plus',
                'active' => ['analise/cadastro', 'regex:@^content/[0-9]+$@'],
                'label'       => 0,
                'label_color' => 'success',
                'id'           => 'analisecurricular',
                'shift'   => 'ml-2',
            ],
            [
                'text' => '2.3 Exerc??cio Regular',
                'url'  => 'exercicio',
                'icon'    => 'fas fa-fw fa-user-md',
                'active' => ['exercicio/cadastro', 'regex:@^content/[0-9]+$@'],
                'label'       => 0,
                'label_color' => 'success',
                'id'           => 'exercicioregular',
                'shift'   => 'ml-2',
            ],
            [
                'text' => '2.4 Part. em Congressos',
                'url'  => 'participacao',
                'icon'    => 'fas fa-fw  fa-comment',
                'active' => ['participacao/cadastro', 'regex:@^content/[0-9]+$@'],
                'label'       => 0,
                'label_color' => 'success',
                'id'           => 'participacaocongresso',
                'shift'   => 'ml-2',
            ],

            [
                'text' => 'Item 2 - Total',
                'url'  => '#',
                'icon'    => 'fas fa-fw fa-gavel',
                'label'       => 0,
                'label_color' => 'success',
                'id'           => 'totalpontosdois',
                'shift'   => 'ml-2',
            ],
        ],
    ],

    [
        'text' => ' 3 - An??lise de trabalhos',
        'url'  => 'laudo',
        'icon' => 'fas fa-fw fa-tv',
        'can'  => 'candidato',
    ],

    [
        'text' => ' 4 - Finalizar',
        'url'  => '#',
        'icon' => 'fas fa-fw fa-check-square',
        'can'  => 'candidato',
        'id'   => 'finalizarprocesso',
    ],


    //MENU JULGADOR
    ['header' => 'Painel do Julgador - Inscri????o',
    'can' => 'julgador'    
   ],

   [
       'text' => ' Resumo Certifica????o',
       'url'  => '/',
       'icon' => 'fas fa-fw fa-tv',
       'can'  => 'julgador'
   ],

  [
   'text'    => 'Candidatos',
   'icon'    => 'fas fa-fw fa-share',
   'can' => 'julgador',
   'submenu' => [
       [
           'text' => 'Listagem',
           'url'  => 'listagem',
           'icon'    => 'fas fa-fw fa-user',
       ],
   ],
],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
