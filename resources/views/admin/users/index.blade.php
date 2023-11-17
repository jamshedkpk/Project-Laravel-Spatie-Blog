<x-app-layout>
<x-slot name="title">Users</x-slot>
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">User Index Page</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item active">
Users
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
    <a class="btn btn-success" href="{{ route('admin-user-create') }}">
<span class="fa fa-plus"></span>
Add New
</a>
<br>
<br>
<div class="card card-primary card-outline">
<div class="card-body">
<div class="col-lg-12">
@if ($message = Session::get('record-saved'))
<script>
Swal.fire({
position: 'center',
icon: 'success',
iconColor: 'geen',
title: '{{ $message }}',
showConfirmButton: true,
timer: 2000
});
</script>
@endif
@if ($message = Session::get('record-deleted'))
<script>
Swal.fire({
position: 'center',
icon: 'success',
iconColor: 'red',
title: '{{ $message }}',
showConfirmButton: true,
timer: 2000
});
</script>
@endif
@if ($message = Session::get('record-updated'))
<script>
Swal.fire({
position: 'center',
icon: 'success',
iconColor: 'orange',
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
<th>Name</th>
<th>Email</th>
<th>Roles</th>
<th>Permissions</th>
<th>Photo</th>
<th>Show</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
@if ($users->count() > 0)
<tbody>
@foreach ($users as $user)
<tr>
<td>
{{ $user->id }}
</td>
<td>
{{ $user->name }}
</td>
<td>
{{ $user->email }}
</td>
<td>
@foreach ($user->roles as $role)
{{ '( ' . $role->name . ' )' }}
@endforeach
</td>
<td>
@foreach ($user->permissions as $permission)
{{ '( ' . $permission->name . ' )' }}
@endforeach
</td>
<td>
<div class="img-thumbnail bg-danger">
<img id="productPhoto" src="{{ asset($user->photo) }}"
alt="Not Found" height="100" width="100"
style="border-radius:5px;">
</div>
</td>
<td>
    <a href="{{ route('admin-user-show', $user->id) }}"
class="btn btn-primary">
<span class="fa fa-eye"></span>
</a>
</td>
<td>
    <a href="{{ route('admin-user-edit', $user->id) }}"
class="btn btn-warning">
<span class="fa fa-edit"></span>
</a>
</td>
<td>
    <a href="{{ route('admin-user-destroy', $user->id) }}"
    class="btn btn-danger">
    <span class="fa fa-trash"></span>
    </a>
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
<!-- /.content -->
</div>
</x-app-layout>
