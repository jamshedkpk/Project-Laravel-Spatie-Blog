<x-app-layout>
<x-slot name="title">Roles</x-slot>
<div class="content-header">
	<div class="container-fluid">
	<div class="row mb-2">
	<div class="col-sm-6">
	<h1 class="m-0">Role Index Page</h1>
	</div><!-- /.col -->
	<div class="col-sm-6">
	<ol class="breadcrumb float-sm-right">
	<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">
	Roles
	</li>
	</ol>
	</div><!-- /.col -->
	</div><!-- /.row -->
	</div><!-- /.container-fluid -->
	</div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{ route('admin-role-create') }}">
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
                                            iconColor: 'yellow',
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
                                            <th>Show</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    @if ($roles->count() > 0)
                                        <tbody>
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td>
                                                        {{ $role->id }}
                                                    </td>
                                                    <td>
														{{$role->name}}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin-role-show', $role->id) }}"
                                                            class="btn btn-primary">
                                                            <span class="fa fa-eye"></span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin-role-edit', $role->id) }}"
                                                            class="btn btn-warning">
                                                            <span class="fa fa-edit"></span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin-role-destroy', $role->id) }}"
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