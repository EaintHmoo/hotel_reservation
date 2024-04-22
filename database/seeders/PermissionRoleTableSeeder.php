<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($super_admin_permissions->pluck('id'));

        $hotel_reservation_permissions = $super_admin_permissions->filter(function ($permission) {
            return $permission->title === 'profile_password_edit' || $permission->title === 'form_access' || $permission->title === 'form_show' || $permission->title === 'form_edit';
        });
        Role::findOrFail(2)->permissions()->sync($hotel_reservation_permissions->pluck('id'));

        $reservation_permissions = $super_admin_permissions->filter(function ($permission) {
            return $permission->title === 'profile_password_edit' || $permission->title === 'form_access' || $permission->title === 'form_show';
        });
        Role::findOrFail(3)->permissions()->sync($reservation_permissions->pluck('id'));
    }
}
