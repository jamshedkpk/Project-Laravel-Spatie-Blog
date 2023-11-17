<x-app-layout>
<x-slot name="title">Posts</x-slot>
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Post Edit Page</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">
Posts
</li>
</ol>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="card card-primary card-outline">
<div class="card-body">
<form action="{{ route('admin-post-update',$post->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label for="title">Title:</label>
<input type="text" class="form-control" name="title"
value="{{ $post->title }}"/>
@error('title')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<label for="description">Description:</label>
<textarea textarea type="text" class="form-control" name="description"
>{{$post->description}}</textarea>
@error('description')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="category">Category:</label>
<select class="form-control" name="category_id" id="category">
<option value="null">Select A Category</option>
@foreach($categories as $category)
<option value="{{$category->id}}" {{$category->id==$post->category->id?'selected':''}}>
{{$category->name}}
</option>
@endforeach
</select>
@error('category_id')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="status">Status:</label>
<select name="status" id="status" class="form-control">
<option value="null">Select A Status</option>
<option value="1" {{$post->status==1 ? 'selected' : ''}}>Active</option>
<option value="0" {{$post->status==0 ? 'selected' : ''}}>In Active</option>
</select>
@error('status')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror

</div>
</div>
</div>
<hr style="height:5px;" class="bg-primary">
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label for="photo">
Photo:
</label>
<div id ="preview"
style="width:500px; height:300px; border:1px solid #000;"></div>
<input type="file" id="photo" accept="image/*" name="photo" />

@error('photo')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<button class="btn btn-success w-100">
<span class="fa fa-edit"></span>
<strong>
Update Record
</strong>
</button>
</div>
<div class="col-md-6">
<a class="btn btn-primary w-100" href="{{ route('admin-post-index') }}">
<span class="fa fa-home"></span>
<strong>
Homepage

</strong>
</a>
</div>
</div>
</form>

</div>
</div><!-- /.card -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</x-app-layout>
