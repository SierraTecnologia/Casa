<?php

namespace Casa\Services;

class MenuService
{

    public static function getAdminMenu()
    {
        $casa = [];
        $casa[] = [
            'text'        => 'Dash House',
            'route'       => 'casa.dash.index',
            'icon'        => 'dashboard',
            'icon_color'  => 'blue',
            'label_color' => 'success',
            // 'access' => \App\Models\Role::$ADMIN
        ];
        $casa[] = [
            'text'        => 'Financeiro',
            'route'       => 'casa.finances.index',
            'icon'        => 'dashboard',
            'icon_color'  => 'blue',
            'label_color' => 'success',
            // 'access' => \App\Models\Role::$ADMIN
        ];
        $casa[] = [
            'text'        => 'Espolios',
            'route'       => 'casa.espolio.index',
            'icon'        => 'dashboard',
            'icon_color'  => 'blue',
            'label_color' => 'success',
            // 'access' => \App\Models\Role::$ADMIN
        ];

        return $casa;
    }
}
