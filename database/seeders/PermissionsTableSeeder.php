<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'comment_create',
            ],
            [
                'id'    => 18,
                'title' => 'comment_edit',
            ],
            [
                'id'    => 19,
                'title' => 'comment_show',
            ],
            [
                'id'    => 20,
                'title' => 'comment_delete',
            ],
            [
                'id'    => 21,
                'title' => 'comment_access',
            ],
            [
                'id'    => 22,
                'title' => 'campaign_create',
            ],
            [
                'id'    => 23,
                'title' => 'campaign_edit',
            ],
            [
                'id'    => 24,
                'title' => 'campaign_show',
            ],
            [
                'id'    => 25,
                'title' => 'campaign_delete',
            ],
            [
                'id'    => 26,
                'title' => 'campaign_access',
            ],
            [
                'id'    => 27,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
