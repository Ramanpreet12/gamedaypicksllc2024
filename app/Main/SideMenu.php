<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Dashboard',
                'route_name' => 'admin/dashboard',
                'params' => ''
            ],

            'user' => [
                'icon' => 'users',
                'route_name' => 'admin/user',
                'params' => '',
                'title' => 'Users'
            ],

            'pre_signup_users' => [
                'icon' => 'users',
                'route_name' => 'pre-signup-users.index',
                'params' => '',
                'title' => 'Pre Signup Users'
            ],


            'team' => [
                'icon' => 'users',
                'route_name' => 'team.index',
                'params' => '',
                // [
                //     'layout' => 'side-menu'
                // ],
                'title' => 'Team'
            ],
            'payment' => [
                'icon' => 'dollar-sign',
                'route_name' => 'admin/payments',
                'params' => '',
                // [
                //     'layout' => 'side-menu'
                // ],
                'title' => 'Payments'
            ],

            'shop-order-payment' => [
                'icon' => 'dollar-sign',
                'route_name' => 'admin/get-all-orders',
                'params' => '',
                'title' => 'Shop Order Payments'
            ],

            // 'greek-order-payment' => [
            //     'icon' => 'dollar-sign',
            //     'route_name' => 'admin/greek-order-payments',
            //     'params' => '',
            //     'title' => 'Greek Order Payments'
            // ],


            'region' => [
                'icon' => 'settings',
                'route_name' => 'region.index',
                'params' => '',
                'title' => 'Region'
            ],

            'season' => [
                'icon' => 'cloud',
                'route_name' => 'season.index',
                'params' => '',
                // [
                //     'layout' => 'side-menu'
                // ],
                'title' => 'Season Management'
            ],


            'fixtures' => [
                'icon' => 'calendar',
                'route_name' => 'fixtures.index',
                'params' => '',
                'title' => 'Fixtures'
            ],



            'team_result' => [
                'icon' => 'settings',
                'route_name' => 'admin/teams/result',
                'params' => '',
                'title' => 'Teams Result'
            ],



            'winner' => [
                'icon' => 'star',
                'route_name' => 'winner.index',
                'params' => '',
                'title' => 'Winner'
            ],

            'contact' => [
                'icon' => 'phone',
                'route_name' => 'contact.index',
                'params' => '',
                // [
                //     'layout' => 'side-menu'
                // ],
                'title' => 'Contacts'
            ],

            'reviews' => [
                'icon' => 'star',
                'route_name' => 'reviews.index',
                'params' => '',
                // [
                //     'layout' => 'side-menu'
                // ],
                'title' => 'Reviews'
            ],



            // 'coupons' => [
            //     'icon' => 'gift',
            //     'route_name' => 'coupons.index',
            //     'params' => '',
            //     'title' => 'Coupons'
            // ],


            // 'Jersey' => [
            //     'icon' => 'gift',
            //     'route_name' => 'jerseys.index',
            //     'params' => '',
            //     'title' => 'Jersey'
            // ],

            'Products' => [
                'icon' => 'shopping-bag',
                'route_name' => 'shop.index',
                'params' => '',
                'title' => 'Products'
            ],

            // 'ProductVariations' => [
            //     'icon' => 'shopping-bag',
            //     'route_name' => 'product-variations.index',
            //     'params' => '',
            //     'title' => 'Product Variations'
            // ],

            'product-size' => [
                'icon' => 'shopping-bag',
                'route_name' => 'product-sizes.index',
                'params' => '',
                'title' => 'Product Size'
            ],

            'greek-store' => [
                'icon' => 'shopping-bag',
                'route_name' => 'greek-store.index',
                'params' => '',
                'title' => 'Greek Store'
            ],


            'setting' => [
                'icon' => 'settings',
                'route_name' => 'admin/profile',
                'params' => '',
                'title' => 'Admin Settings'
            ],


            'devider',
            'site_setting' => [
                'icon' => 'edit',
                'title' => 'Site Setting',
                'sub_menu' => [
                    'menu-setting' => [
                        'icon' => 'settings',
                        'route_name' => 'menu.index',
                        'params' => '',
                        'title' => 'Menu Setting'
                    ],

                    'general' => [
                        'icon' => '',
                        'route_name' => 'admin/general',
                        'params' => '',
                        'title' => 'General'
                    ],
                    'banner' => [
                        'icon' => '',
                        'route_name' => 'banner.index',
                        'params' => '',
                        'title' => 'Banner'
                    ],

                    'vacationPac' => [
                        'icon' => 'settings',
                        'route_name' => 'vacation.index',
                        'params' => '',
                        'title' => 'Vacation Pac'
                    ],

                    'news' => [
                        'icon' => 'settings',
                        'route_name' => 'news.index',
                        'params' => '',
                        'title' => 'News'
                    ],

                    'color-setting' => [
                        'icon' => 'settings',
                        'route_name' => 'admin/color_setting',
                        'params' => '',
                        'title' => 'Color Setting'
                    ],

                    'match-result' => [
                        'icon' => '',
                        'route_name' => 'admin/match_result',
                        'params' => '',
                        'title' => 'Match Result By Region'
                    ],

                    'match-fixture' => [
                        'icon' => '',
                        'route_name' => 'admin/match_fixture',
                        'params' => '',
                        'title' => 'Match Fixture'
                    ],

                    'prize' => [
                        'icon' => 'award',
                        'route_name' => 'prize.index',
                        'params' => '',
                        // [
                        //     'layout' => 'side-menu'
                        // ],
                        'title' => 'Prize Management'
                    ],

                    'contact-page' => [
                        'icon' => 'phone',
                        'route_name' => 'admin/contact_page',
                        'params' => '',
                        'title' => 'Contact Page'
                    ],

                    'about-page' => [
                        'icon' => 'phone',
                        'route_name' => 'admin/about_page',
                        'params' => '',
                        'title' => 'About Page'
                    ],

                    'news_alert' => [
                        'icon' => 'phone',
                        'route_name' => 'admin/news_alerts',
                        'params' => '',
                        'title' => 'News Alerts'
                    ],

                    'pony_express_flag' => [
                        'icon' => 'phone',
                        'route_name' => 'admin.edit.pony-express-flag-football',
                        'params' => '',
                        'title' => 'Pony Express Flag Football League'
                    ],




                    'landing_count' => [
                        'icon' => 'phone',
                        'route_name' => 'admin/landing_count',
                        'params' => '',
                        'title' => 'Landing Counts'
                    ],

                    'privacy' => [
                        'icon' => 'phone',
                        'route_name' => 'admin/privacy',
                        'params' => '',
                        'title' => 'Privacy'
                    ],


                ]
            ],
        ];
    }
}
