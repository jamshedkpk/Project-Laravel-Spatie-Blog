<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Image;
use File;

class UserController extends Controller
{
public function dashboard(){
return view('user-dashboard');
}
// display all users
public function index(){
$users=User::with('roles')->get();
return view('admin.users.index',compact('users'));
}
// create new user
public function create(){
$roles=Role::all();
return view('admin.users.create',compact('roles'));
}
// store a user
public function store(Request $request){
// validate data
$validator=$request->validate([
'name'=>'required|regex:/^[a-zA-Z ]+$/',
'email'=>'required|email',
'password'=>'required|min:5|confirmed',
'password_confirmation'=>'required|min:5',
'photo'=>'required|image|mimes:jpg,jpeg,png,ico,gif',
'role'=>'required|in:admin,moderator,user',
'status'=>'required|notIn:null',
]);        
// If file is uploaded
if($request->hasFile('photo'))
{
// Get Name of uploaded File with Extension
$originalPhotoName=$request->file('photo')->getClientOriginalName();
// Get Extension of uploaded File
$originalPhotoExtension=$request->file('photo')->getClientOriginalExtension();
// Get Only name of uploaded File
$originalPhoto=pathinfo($originalPhotoName,PATHINFO_FILENAME);
// Make a unique file name to store in DB
$fileName=$originalPhoto."-".time().".".$originalPhotoExtension;
// Upload file to the directory and & resize it
$photo=$request->file('photo');
$fileRezise=Image::make($photo->getRealPath());
$fileRezise->resize(300,300);
$fileRezise->save(public_path('uploaded/users/'.$fileName));
// save data in database
$save=User::create([
'name'=>$request->name,
'email'=>$request->email,
'password'=>Hash::make($request->password),
'photo'=>'uploaded/users/'.$fileName,
'status'=>1,
])->assignRole($request->role);    
}
// if data is stored successfully
if($save)
{
return redirect()->route('admin-user-index')->with(['record-saved'=>'Record is successfully Stored !']);
}
}
// show a user
public function show($id)
{
$user=User::findOrFail($id);
return view('admin.users.show',compact('user'));
}
// edit a user
public function edit($id)
{
$user=User::findOrFail($id);
$roles=Role::all();
$permissions=Permission::all();
return view('admin.users.edit',compact('user','roles','permissions'));
}
// update a user
public function update(Request $request, $id)
{
// find the user 
$user=User::findOrFail($id);

// validate data
$validator=$request->validate([
'name'=>'required|regex:/^[a-zA-Z ]+$/',
'email'=>'required|email',
]);        
// If file is uploaded
if($request->hasFile('photo'))
{
// delete user old photo from public folder
$path=$user->photo;
if(File::exists($path))
{
File::delete($path);
}
// Get Name of uploaded File with Extension
$originalPhotoName=$request->file('photo')->getClientOriginalName();
// Get Extension of uploaded File
$originalPhotoExtension=$request->file('photo')->getClientOriginalExtension();
// Get Only name of uploaded File
$originalPhoto=pathinfo($originalPhotoName,PATHINFO_FILENAME);
// Make a unique file name to store in DB
$fileName=$originalPhoto."-".time().".".$originalPhotoExtension;
// Upload file to the directory and & resize it
$photo=$request->file('photo');
$fileRezise=Image::make($photo->getRealPath());
$fileRezise->resize(300,300);
$fileRezise->save(public_path('uploaded/users/'.$fileName));

// update data in database
$update=$user->update([
'name'=>$request->name,
'email'=>$request->email,
'password'=>Hash::make($request->password),
'photo'=>'uploaded/users/'.$fileName,
'status'=>1,
]);
if($request->role!='null'){
$user->assignRole($request->role);
}
if($request->permission!='null'){
$user->givePermissionTo($request->permission);
}
// if data is stored successfully
if($update)
{
// First delete user photo from public folder
return redirect()->back()->with(['record-updated'=>'Record is successfully Updated !']);    
}
}
else
{
// update data in database
$update=$user->update([
'name'=>$request->name,
'email'=>$request->email,
'password'=>Hash::make($request->password),
'status'=>1,
]);
if($request->role!='null')
{
$user->assignRole($request->role);
}
if($request->permission!='null')
{
$user->givePermissionTo($request->permission);
}

// if data is stored successfully
if($update)
{
return redirect()->back()->with(['record-updated'=>'Record is successfully Updated !']);
}

}
}

// delete a user
public function destroy($id){
// delete a user to be deleted
$user=User::findOrFail($id);
// First delete user photo from public folder
$path=$user->photo;
if(File::exists($path))
{
File::delete($path);
}
$delete=$user->delete();
if($delete){
return redirect()->route('admin-user-index')->with(['record-deleted'=>'Record is successfully Deleted !']);
}
}
// delete role from user
public function removeRole(Request $request){
// find user
    $user=User::find($request->user);
// find role
    $role=Role::find($request->role);
// check if user has the role
    if($user->hasRole($role->id)){
// remove role from the user
        $user->removeRole($role->id);
return redirect()->back()->with(['role-removed'=>'Role is successfully Removed!']);
}
}
// delete permission from user
public function removePermission(Request $request){
// find user
    $user=User::find($request->user);
// find permission
    $permission=Permission::find($request->permission);
// check if user has the permission
    if($user->hasDirectPermission($permission->id))
{
// remove the permission from user
    $user->revokePermissionTo($permission);
return redirect()->back()->with(['role-removed'=>'Role is successfully Removed!']);
}
}   
}
