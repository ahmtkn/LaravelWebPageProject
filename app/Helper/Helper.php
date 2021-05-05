<?php


namespace App\Helper;


use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Helper
{
    public static function setRoles()
    {
        $defaultSytemVars = getVar("system");
        $roles = Role::all()->pluck('name')->all();
        foreach ($defaultSytemVars['default_role'] as $value) {
            if (!in_array(slugify($value['name']), $roles)) {
                if (slugify($value['name']) !== 'user')
                    $is_see_admin = 1;
                else
                    $is_see_admin = 0;
                Role::create([
                    'name' => slugify($value['name']),
                    'description' => $value['description'],
                    'is_main' => 1,
                    'is_see_admin' => $is_see_admin,
                    'guard_name' => $value['guard_name'],
                ]);
            }

        }

        $users = User::all()->pluck('email')->all();
        foreach ($defaultSytemVars['default_users'] as $value) {
            if (!in_array($value['email'], $users)) {
                User::create([
                    'name' => $value['name'],
                    'email' => $value['email'],
                    'password' => bcrypt($value['password'])
                ]);
            }

        }

        $permissions = Permission::all()->pluck('name')->all();
        foreach ($defaultSytemVars['default_permission'] as $value) {
            if (!in_array(slugify($value['name']), $permissions)) {
                Permission::create([
                    'name' => slugify($value['name']),
                    'descpirtion' => $value['descpirtion'],
                    'is_main' => 1,
                    'guard_name' => $value['guard_name']
                ]);
            }
        }


        $permissions = Permission::all();
        $admin_role = Role::whereName('admin')->first();
        $adminUser = User::whereEmail('admin@chico.com')->first();
        $user_role = Role::whereName('user')->first();
        $webUser = User::whereEmail('user@user.com')->first();
        $adminUser->assignRole($admin_role);
        $webUser->assignRole($user_role);
        $admin_role->givePermissionTo($permissions);

    }

}
