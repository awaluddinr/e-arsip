<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('permissions')->whereNot('name', 'admin-utama')->get();

        // $perm = Role::with('permissions')->whereNot('name', 'admin-utama')->get();

        return view('main-layouts.pengaturan.role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::orderBy('id', 'asc')->pluck('name', 'id')->all();
        // $permissions = Permission::whereNot('name', 'pengaturan-menu')
        //     ->whereNot('name', 'data-pengguna-menu')
        //     ->whereNot('name', 'laporan-menu')
        //     ->whereNot('name', 'persuratan (menu-utama)')
        //     ->orderBy('id', 'asc')
        //     ->pluck('name', 'id')
        //     ->all();

        // dd($permissions);

        return view('main-layouts.pengaturan.tambah-role', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'role' => 'required|string|unique:roles,name',
                'permissions' => 'array'
            ],
            [
                'role.required' => 'Harap mengisi kolom role',
                'role.unique' => 'Role sudah terdaftar'
            ]
        );


        // foreach ($data['permissions'] as $permission) {
        //     $role->syncPermissions([$permission]);
        // }

        if (empty($data['permissions'])) {
            $pesan = 'Tidak ada hak akses yang dipilih';
            $title = 'Gagal';
            $icon = 'warning';
            return redirect()->route('role.create')->with('status', compact('pesan', 'title', 'icon'));
        } else {
            $role = Role::create([
                'name' => $data['role']
            ]);

            $role->syncPermissions($data['permissions']);
        }

        $pesan = 'Data berhasil ditambahkan';
        $title = 'Berhasil';
        $icon = 'success';
        return redirect()->route('role')->with('status', compact('pesan', 'title', 'icon'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Role::findOrFail($id);

        $permissions = Permission::Role($roles->name)->get();

        return response()->json(['role' => $roles, 'permissions' => $permissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $roles = Role::findOrFail($id);

        $permissions = Permission::Role($roles->name)->get();

        $permissionsNotOwned = Permission::whereDoesntHave('roles', function ($query) use ($roles) {
            $query->where('role_id', $roles->id);
        })->get();

        // $otherPermissions = Permission::whereDoesntHave('roles', function ($query) use ($roles) {
        //     $query->where('role_id', $roles->id);
        // })->get();

        return view('main-layouts.pengaturan.edit-role', compact(['roles', 'permissions', 'permissionsNotOwned']));
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

        $role = Role::findOrFail($id);

        $perm = Role::with('permissions')->where('id', $role->id)->first();

        foreach ($perm->permissions as $p) {
            $dk = $p['name'];
        }

        if (empty($request->permissions)) {
            $pesan = 'Tidak ada hak akses yang dipilih';
            $title = 'Gagal';
            $icon = 'warning';
            return back()->with('status', compact('pesan', 'title', 'icon'));
        } else {

            if ($request->role != $role->name) {
                $rules = $request->validate([
                    'role'  => 'required|string|unique:roles,name'
                ], [
                    'role.required' => 'Harap mengisi kolom role',
                    'role.unique' => 'Role sudah terdaftar'
                ]);

                Role::where('id', $role->id)->update([
                    'name' => $rules['role']
                ]);
            }

            $role->syncPermissions([$request->permissions]);

            $roleSesudah = Role::findOrFail($id);

            $permSudah = Role::with('permissions')->where('id', $role->id)->first();

            // dd($permSudah->permissions->pluck('name'));

            foreach ($permSudah->permissions as $p) {
                $dt = $p['name'];
            }

            // cek apakah ada perubahan data

            $adaPerubahan = $role->getOriginal('name') !== $roleSesudah->name
                || $dk !== $dt;

            if ($adaPerubahan) {
                $pesan = 'Data berhasil diubah';
                $title = 'Berhasil';
                $icon = 'success';
                return redirect()->route('role')->with('status', compact('pesan', 'title', 'icon'));
            } else {
                return redirect()->route('role');
            }
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
        $role =  Role::find($id);
        // $usersWithRole = User::whereHas('roles', function ($query) use ($role) {
        //     $query->where('name', $role->name);
        // })->get();

        $user = User::Role($role->name)->get();

        if ($user->isNotEmpty()) {
            $pesan = 'Gagal menghapus peran ada pengguna yang memiliki peran ini';
            $title = 'Gagal';
            $icon = 'error';
            return redirect()->back()->with('status', compact('pesan', 'title', 'icon'));
        } else {
            Role::find($id)->delete();
        }

        $pesan = 'Data berhasil dihapus';
        $title = 'Berhasil';
        $icon = 'success';

        return redirect()->route('role')->with('status', compact('pesan', 'title', 'icon'));
    }
}
