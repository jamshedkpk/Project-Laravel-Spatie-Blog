<x-app-layout>
    <x-slot name="title">Roles</x-slot>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Role Edit Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">
                            Roles
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
                @if ($message = Session::get('permission-removed'))
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

                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <form action="{{ route('admin-role-update',$role->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" name="name"
                                            value="{{ $role->name }}"
                                             />
                                            @error('name')
                                                <strong class="text-danger">
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                      <div class="form-group">
                                        <label for="permission">Permission:</label>
                                        <select name="permission" id="permission" class="form-control">
                                        <option value="null">Select A Permission</option>
                                        @foreach($permissions as $permission)
                                        <option value="{{$permission->name}}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <button class="btn btn-success w-100">
                                            <span class="fa fa-edit"></span>
                                            <strong>
                                                Update Record
                                            </strong>
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <a class="btn btn-primary w-100" href="{{ route('admin-role-index') }}">
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
            <div class="row">
                <div class="col-md-12">
                <table class="table table-bordered table-hover table-striped" id="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Role</th>
                            <th>Permission</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($role->permissions as $permission)
                    <tr>
                        <td>
                            {{$permission->id}}
                        </td>
                        <td>
                            {{$role->name}}
                        </td>
                        <td>{{$permission->name}}</td>
                        <td>
                            <form action="{{route('admin-remove-permission')}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="role" value={{ $role->id }}/>
                            <input type="hidden" name="permission" value={{ $permission->id }}/>
                            <button class="btn btn-danger" type="submit">
                                <span class="fa fa-trash"></span>
                                &nbsp;
                                Remove Permission</button>
                        </form>                         
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-app-layout>
