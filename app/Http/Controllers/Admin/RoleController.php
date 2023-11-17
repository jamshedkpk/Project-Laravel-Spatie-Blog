<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Image;
use File;

class RoleController extends Controller
{
// display all roles
public function index(){
$roles=Role::all();
    return view('admin.roles.index',compact('roles'));
}
// create new role
public function create(){
return view('admin.roles.create');
}
// store a role
public function store(Request $request){
    // validate data
    $validator=$request->validate([
        'name'=>'required|regex:/^[a-zA-Z ]+$/',
        ]);        
    // If file is uploaded
$save=Role::create([
'name'=>$request->name,
]);
    // if data is stored successfully
if($save)
{
    return redirect()->route('admin-role-index')->with(['record-saved'=>'Record is successfully Stored !']);
}
}
// show a role
public function show($id)
{
    $role=role::findOrFail($id);
    return view('admin.roles.show',compact('role'));
}
// edit a role
public function edit($id)
{
    $role=role::findOrFail($id);
    $permissions=Permission::all();
    return view('admin.roles.edit',compact('role','permissions'));
}
// update a role
public function update(Request $request, $id)
{
// find the role 
    $role=role::findOrFail($id);

    // validate data
        $validator=$request->validate([
        'name'=>'required|regex:/^[a-zA-Z ]+$/',
        ]);        
// update data in database
$update=$role->update([
    'name'=>$request->name,
]);
// if input field has permission 
if($request->permission!='null')
{
// assign permission to role
    $role->givePermissionTo($request->permission);
}
// if data is stored successfully
if($update)
{
    return redirect()->back()->with(['record-updated'=>'Record is successfully Updated !']);
}

}

// delete a role
public function destroy($id){
// delete a role to be deleted
    $role=role::findOrFail($id);
// First delete role photo from public folder
    $delete=$role->delete();
if($delete){
    return redirect()->route('admin-role-index')->with(['record-deleted'=>'Record is successfully Deleted !']);
}
}
// remove permission from role
public function removePermission(Request $request){
// role id
    $role_id=$request->role;
// permission id
    $permission_id=$request->permission;
// find role
    $role=Role::find($role_id);
// find permission
    $permission=Permission::find($permission_id);
// remove permission from role
    $role->revokePermissionTo($permission->id);
return redirect()->back()->with(['permission-removed'=>'Permission is successfully Removed !']);
}
}

