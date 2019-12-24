<?php

namespace Casa\Services;

class MenuService
{

    public static function getAdminMenu()
    {
        $casa = [];
        $casa[] = [
            'text'        => 'Casa',
            'url'         => '', //route('casa.analytics'),
            'icon'        => 'dashboard',
            'icon_color'  => 'blue',
            'label_color' => 'success',
            // 'access' => \App\Models\Role::$ADMIN
        ];

        return $casa;
    }
}