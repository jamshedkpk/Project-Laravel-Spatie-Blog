<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use Image;
use File;

class PostController extends Controller
{
// display all posts
public function index(){
$posts=Post::all();
return view('user.posts.index',compact('posts'));
}
// create new post
public function create(){
    $categories=Category::all();
    return view('user.posts.create',compact('categories'));
}
// store a post
public function store(Request $request){
    // validate data
    $validator=$request->validate([
        'title'=>'required|regex:/^[a-zA-Z ]+$/',
        'description'=>'required',
        'category_id'=>'required|notIn:null',
        'photo'=>'required|image|mimes:jpg,jpeg,png,ico,gif',
        'status'=>'required|in:0,1'    
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
$fileRezise->save(public_path('uploaded/posts/'.$fileName));
// save data in database
    $save=post::create([
    'title'=>$request->title,
    'description'=>$request->description,
    'category_id'=>$request->category_id,
    'photo'=>'uploaded/posts/'.$fileName,
    'status'=>1,
    'user_id'=>Auth::id(),
]);    
}
// if data is stored successfully
if($save)
{
    return redirect()->route('user-post-index')->with(['record-saved'=>'Record is successfully Stored !']);
}
}
// show a post
public function show($id)
{
    $post=post::with('user')->where(['id'=>$id])->first();
    return view('user.posts.show',compact('post'));
}
// edit a post
public function edit($id)
{
    $post=post::findOrFail($id);
    $categories=Category::all();
    return view('user.posts.edit',compact('post','categories'));
}
// update a post
public function update(Request $request, $id)
{
// find the post 
$post=post::findOrFail($id);
    // validate data
        $validator=$request->validate([
            'title'=>'required|regex:/^[a-zA-Z ]+$/',
            'description'=>'required',
            'category_id'=>'required|notIn:null',
            'status'=>'required|in:0,1'    
            ]);        
    // If file is uploaded
if($request->hasFile('photo'))
{
// delete post old photo from public folder
$path=$post->photo;
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
$fileRezise->save(public_path('uploaded/posts/'.$fileName));

// update data in database
$update=$post->update([
    'title'=>$request->title,
    'description'=>$request->description,
    'category_id'=>$request->category_id,
    'photo'=>'uploaded/posts/'.$fileName,
    'status'=>1,
    'user_id'=>Auth::id(),
]);
// if data is stored successfully
if($update)
{
    // First delete post photo from public folder
    return redirect()->route('user-post-index')->with(['record-updated'=>'Record is successfully Updated !']);    
}
}
else
{
// update data in database
$update=$post->update([
    'title'=>$request->title,
    'description'=>$request->description,
    'category_id'=>$request->category_id,
    'status'=>1,
    'user_id'=>Auth::id(),
]);
// if data is stored successfully
if($update)
{
    return redirect()->route('user-post-index')->with(['record-updated'=>'Record is successfully Updated !']);
}

}
}

// delete a post
public function destroy($id){
// delete a post to be deleted
    $post=post::findOrFail($id);
// First delete post photo from public folder
$path=$post->photo;
if(File::exists($path))
{
File::delete($path);
}
    $delete=$post->delete();
if($delete){
    return redirect()->route('user-post-index')->with(['record-deleted'=>'Record is successfully Deleted !']);
}
}
}
