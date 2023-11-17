<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
public function index(){
    $permissions=Permission::all();
    return view('admin.permissions.index',compact('permissions'));
}
public function create(){
    return view('admin.permissions.create');
}
public function store(Request $request)
{
$validator=$request->validate([
    'name'=>'required',
]);
$save=Permission::create([
    'name'=>$request->name,
]);
if($save){
    return redirect()->route('admin-permission-index')->with(['record-saved'=>'Record is successfully Stored !']);
}
}
// show a permission
public function show($id)
{
    $permission=Permission::findOrFail($id);
    return view('admin.permissions.show',compact('permission'));
}
// edit a permission
public function edit($id)
{
    $permission=Permission::findOrFail($id);
    $roles=Role::all();
    return view('admin.permissions.edit',compact(['permission','roles']));
}
// update a permission
public function update(Request $request, $id)
{
// find the permission 
    $permission=Permission::findOrFail($id);

    // validate data
        $validator=$request->validate([
        'name'=>'required',
        ]);        
// update data in database
$update=$permission->update([
    'name'=>$request->name,
]);
// if input has role 
if($request->role!='null'){
// then assign role to permission
    $permission->assignRole($request->role);
}
// if data is stored successfully
if($update)
{
    return redirect()->back()->with(['record-updated'=>'Record is successfully Updated !']);
}

}

public function destroy($id){
$permission=Permission::findOrFail($id);
$delete=$permission->delete();
if($delete){
    return redirect()->route('admin-permission-index')->with(['record-deleted'=>'Record is successfully Deleted !']);
}
}
// remove role from permission
public function removeRole(Request $request){
    // role id
    $role_id=$request->role;
    // permission id
    $permission_id=$request->permission;
    // find role 
    $role=Role::find($role_id);
    // find permission
    $permission=Permission::find($permission_id);
    // remove role from permission
    $permission->removeRole($role);
    return redirect()->back()->with(['role-removed'=>'Permission is successfully Removed !']);
    }
}
