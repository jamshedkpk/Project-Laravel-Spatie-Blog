<x-app-layout>
<x-slot name="title">Posts</x-slot>
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Index Page</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
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
<a class="btn btn-success" href="{{route('user-post-create')}}">
<span class="fa fa-plus"></span>	
Add New
</a>
<br>
<br>
<div class="card card-primary card-outline">
<div class="card-body">
<div class="col-lg-12">
	@if($message=Session::get('record-saved'))
	<script>
		Swal.fire({
		position: 'center',
		icon: 'success',
		iconColor:'geen',
		title: '{{$message}}',
		showConfirmButton: true,
		timer: 2000
		});
		</script>
	@endif					
	@if($message=Session::get('record-deleted'))
	<script>
		Swal.fire({
		position: 'center',
		icon: 'success',
		iconColor:'red',
		title: '{{ $message }}',
		showConfirmButton: true,
		timer: 2000
		});
		</script>
	@endif					
	@if($message=Session::get('record-updated'))
	<script>
		Swal.fire({
		position: 'center',
		icon: 'success',
		iconColor:'yellow',
		title: '{{ $message }}',
		showConfirmButton: true,
		timer: 2000
		});
		</script>
	@endif					
			
<table class="table table-bordered table-hover table-striped" id="table">
<thead>
<tr>
<th>ID</th>
<th>Title</th>
<th>Category</th>
<th>Created By</th>
<th>Photo</th>
<th>Show</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
@if($posts->count()>0)
<tbody>
@foreach($posts as $post)	
<tr>
<td>
{{ $post->id }}
</td>
<td>
{{ $post->title }}
</td>
<td>
{{$post->category->name}}
</td>
<td>
{{$post->user->name}}
</td>
<td>
	<div class="img-thumbnail bg-danger">
		<img id="productPhoto" src="{{asset($post->photo)}}" alt="Not Found" height="100" width="100" style="border-radius:5px;">
		</div>
</td>
<td>
@can('view-post')
<a href="{{route('user-post-show',$post->id)}}" class="btn btn-primary">
<span class="fa fa-eye"></span>
</a>
@endcan
</td>
<td>
@can('edit-post')
	<a href="{{route('user-post-edit',$post->id)}}" class="btn btn-warning">
<span class="fa fa-edit"></span>
</a>
@endcan
</td>
<td>
@can('delete-post')
	<a href="{{route('user-post-destroy',$post->id)}}" class="btn btn-danger">
<span class="fa fa-trash"></span>
</a>
@endcan
</td>
</tr>
@endforeach
</tbody>
@else
<tbody>
<td colspan="7" class="bg-danger">
<strong class="text-light">
No Record Were Found In Database
</strong>
</td>		
</tbody>
@endif

</table>
</div>
</div><!-- /.card -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
</div>
<!-- /.content -->  
</x-app-layout>