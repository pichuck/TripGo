<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Traits\FlashAlert;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{

    use FlashAlert;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return Inertia::render('Role/index', [
            'roles' => $roles->items(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return Inertia::render('Role/create', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
            'display_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);

        $role->givePermissions($request->input('permissions_id'));

        return Inertia::location(route('admin.role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $role = Role::findOrFail($id);
            $permissions = Permission::all();
            $rolePermissions = $role->permissions()->get()->pluck('id')->toArray();

            return Inertia::render('Role/edit', [
                'role' => $role,
                'permissions' => $permissions,
                'rolePermissions' => $rolePermissions,
            ]);
        } catch (ModelNotFoundException $e) {
            return Inertia::location(route('admin.role.index'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $role = Role::findOrFail($id);

            $request->validate([
                'name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $id],
                'display_name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
            ]);

            $role->update([
                'name' => $request->input('name'),
                'display_name' => $request->input('display_name'),
                'description' => $request->input('description'),
            ]);

            $role->syncPermissions($request->input('permissions_id'));

            return Inertia::location(route('admin.role.index'));
        } catch (ModelNotFoundException $e) {
            return Inertia::location(route('admin.role.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->removePermissions($role->permissions()->get()->pluck('id')->toArray());
            $role->forceDelete();

            return Inertia::location(route('admin.role.index'));
        } catch (ModelNotFoundException $e) {
            return Inertia::location(route('admin.role.index'));
        }
    }
}
