<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-active',
            'product-edit',
            'product-delete',
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'brand-list',
            'brand-create',
            'brand-edit',
            'brand-delete',
            'city-list',
            'city-create',
            'city-edit',
            'city-delete',
            'country-list',
            'country-create',
            'country-edit',
            'country-delete',
            'order-list',
            'order-show',
            'page-list',
            'page-create',
            'page-edit',
            'page-delete',
            'setting-list',
            'setting-create',
            'setting-edit',
            'setting-delete',
            'contact-list',
            'contact-create',
            'contact-edit',
            'contact-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'notification-list',
            'notification-create',
            'notification-edit',
            'notification-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}