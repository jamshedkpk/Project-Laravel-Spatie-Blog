<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Post;
use Image;
use File;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
// display all categorys
public function index(){
$categories=Category::all();
    return view('user.categories.index',compact('categories'));
}
// create new category
public function create(){
return view('user.categories.create');
}
// store a category
public function store(Request $request){
    // validate data
    $validator=$request->validate([
        'name'=>'required|regex:/^[a-zA-Z ]+$/',
    ]);        
    // If file is uploaded
$save=Category::create([
'name'=>$request->name,
'user_id'=>Auth::id(),
]);
    // if data is stored successfully
if($save)
{
    return redirect()->route('user-category-index')->with(['record-saved'=>'Record is successfully Stored !']);
}
}
// show a category
public function show($id)
{
    $category=Category::findOrFail($id);
    return view('user.categories.show',compact('category'));
}
// edit a category
public function edit($id)
{
    $category=Category::findOrFail($id);
    return view('user.categories.edit',compact('category'));
}
// update a category
public function update(Request $request, $id)
{
// find the category 
    $category=Category::findOrFail($id);

    // validate data
        $validator=$request->validate([
        'name'=>'required|regex:/^[a-zA-Z ]+$/',
        ]);        
// update data in database
$update=$category->update([
    'name'=>$request->name,
    'user_id'=>Auth::id(),
]);
// if data is stored successfully
if($update)
{
    return redirect()->route('user-category-index')->with(['record-updated'=>'Record is successfully Updated !']);
}

}

// delete a category
    public function destroy($id)
{
    // find category
    $category=Category::findOrFail($id);
    // find all posts inside it
    $posts=Post::where(['category_id'=>$id]);
    // delete category
    $category->delete();
    // delete posts inside it
    $posts->delete();
    return redirect()->route('user-category-index')->with(['record-deleted'=>'Record is successfully Deleted !']);
}
}

