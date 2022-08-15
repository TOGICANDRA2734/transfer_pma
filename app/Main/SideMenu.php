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
            //     'sub_menu' => [
            //         'dashboard-overview-1' => [
            //             'icon' => '',
            //             // 'route_name' => 'dashboard-overview-1',
            //             'params' => [
            //                 'layout' => 'side-menu',
            //             ],
            //             'title' => 'Overview 1'
            //         ],
            //         'dashboard-overview-2' => [
            //             'icon' => '',
            //             // 'route_name' => 'dashboard-overview-2',
            //             'params' => [
            //                 'layout' => 'side-menu',
            //             ],
            //             'title' => 'Overview 2'
            //         ],
            //         'dashboard-overview-3' => [
            //             'icon' => '',
            //             // 'route_name' => 'dashboard-overview-3',
            //             'params' => [
            //                 'layout' => 'side-menu',
            //             ],
            //             'title' => 'Overview 3'
            //         ],
            //         'dashboard-overview-4' => [
            //             'icon' => '',
            //             // 'route_name' => 'dashboard-overview-4',
            //             'params' => [
            //                 'layout' => 'side-menu',
            //             ],
            //             'title' => 'Overview 4'
            //         ]
            //     ]
            ]
        ];
    }
}
