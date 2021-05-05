<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.role.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $success = '';
        try {
            $name = $request->name;
            $rol = Role::whereName($name)->first();
            if (!$rol) {
                $role = Role::create([
                    'name' => slugify($request->name),
                    'guard_name' => 'web',
                    'is_see_admin' => $request->is_see_admin,
                ]);
                $role ? $success=true:$success=false;
            }else{
                flash()->warning('Mükerrer İşlem', 'Bu Role Zaten Önceden Kayıtlı');
            }


        } catch (\Exception $e) {
            $success=false;
            flash()->error('Hata', 'Role Kaydı Esnasında Hata OLuştu');
        }
        if ($success){
            DB::commit();
            flash()->success('İşlem Başarılı', 'Role Kaydı Yapıldı');
        }
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $roles = Role::find($id);
        return view('admin.role.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->is_see_admin = $request->is_see_admin;
        $role->save();
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $rol = Role::find($id);
        if ($rol->is_main != 1)
            $rol->delete();
        return redirect()->back();
    }

    public function managerPermissions($id)
    {
        $role = Role::find($id)->load('permissions');
        $permissions = Permission::all();
        return view('admin.role.common.manage-permission', compact('role', 'permissions'));
    }

    public function managerPermissionsStore(Request $request)
    {
        $role = Role::find($request->id);
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $permission->removeRole($role);
        }
        $reqPermissions = $request->permissions;
        if ($reqPermissions) {
            foreach ($reqPermissions as $key => $perm) {
                $dbPerm = Permission::find($key);
                $role->givePermissionTo($dbPerm);
            }
        }
        return redirect()->back();

    }
}
