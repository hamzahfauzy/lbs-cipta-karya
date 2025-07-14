<?php

namespace App\Controllers\Lbs;

use App\Controllers\CrudController;
use App\Models\User;

class PenggunaController extends CrudController {

    protected $model = User::class;

    protected function getTitle()
    {
        return 'Pengguna';
    }

    protected function getSlug()
    {
        return 'pengguna';
    }

    protected function columns()
    {
        return [
            'name' => [
                'label' => 'Nama'
            ],
            'email' => [
                'label' => 'Email'
            ],
            'role' => [
                'label' => 'Peran'
            ],
        ];
    }

    protected function details()
    {
        return [];
    }

    protected function fields()
    {
        return [
            'name' => [
                'label' => 'Nama',
                'type' => 'text'
            ],
            'email' => [
                'label' => 'Email',
                'type' => 'email'
            ],
            'password' => [
                'label' => 'Password',
                'type' => 'password',
                'value' => ''
            ],
            'role' => [
                'label' => 'Peran',
                'type' => 'select',
                'options' => [
                    'Penyewa' => 'Penyewa',
                    'Admin' => 'Admin',
                ]
            ],
        ];
    }

    public function beforeInsert($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        return $data;
    }
    
    public function beforeUpdate($data)
    {
        if(!empty($data['password']))
        {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }
        else
        {
            unset($data['password']);
        }

        return $data;
    }

}