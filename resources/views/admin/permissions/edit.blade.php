<x-app-layout>
    <x-slot name="title">Permissions</x-slot>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Permission Edit Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">
                            Permissions
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
                @if ($message = Session::get('role-removed'))
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
                            <form action="{{ route('admin-permission-update',$permission->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" name="name"
                                            value="{{ $permission->name }}"
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
                                        <label for="role">Roles:</label>
                                        <select name="role" id="role" class="form-control">
                                        <option value="null">Select A Role</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->name}}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <button class="btn btn-success w-100">

                                            <span class="fa fa-edit"></span>
                                            <strong>
                                                Update
                                        </strong>

                                        </button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <a class="btn btn-primary w-100" href="{{ route('admin-permission-index') }}">
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
        </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                <table class="table table-bordered table-hover table-striped" id="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Permission</th>
                            <th>Role</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($permission->roles as $role)
                    <tr>
                        <td>
                            {{$permission->id}}
                        </td>
                        <td>
                            {{$permission->name}}
                        </td>
                        <td>
                        {{$role->name}}
                        </td>
                        <td>
                            <form action="{{route('admin-remove-role')}}" method="post">
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

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-app-layout>
