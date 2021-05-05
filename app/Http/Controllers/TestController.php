<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class TestController extends Controller
{
    public function index()
    {
        clearAllLogs();

//        $defaultSytemvar = getVar('system');
//        $role = Role::all()->pluck('name')->all();
//        foreach ($defaultSytemvar as $key => $value) {
//            if ($key === 'default_role') {
//                if (!in_array($value['name'], $role)) {
//                    if ($value['name'] != 'User')
//                        $is_see_main = 1;
//                    else
//                        $is_see_main = 0;
//                    Role::create([
//                        'name' => $value['name'],
//                        'description' => $value['description'],
//                        'is_main' => $value['is_main'],
//                        'is_see_admin' => $is_see_main,
//                        'guard_name' => $value['guard_name'],
//                    ]);
//                }
//
//            }
//
//
//        }
    }
}


