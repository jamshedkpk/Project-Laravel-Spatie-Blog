<x-app-layout>
    <x-slot name="title">Users</x-slot>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Edit Page</h1>
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
                            <form action="{{ route('admin-user-update', $user->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 text-right">
                                        @if ($user->photo)
                                            <img src="{{ asset($user->photo) }}" alt="Image Not Found" height="100"
                                                width="200" style="border-radius: 10px; border:1px solid gray;" />
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $user->name }}" />
                                            @error('name')
                                                <strong class="text-danger">
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ $user->email }}" />
                                            @error('email')
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
                                            <label for="password">Password:</label>
                                            <input type="password" class="form-control" name="password" />
                                            @error('password')
                                                <strong class="text-danger">
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password:</label>
                                            <input type="password" class="form-control" name="password_confirmation" />
                                            @error('password_confirmation')
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
                                <hr style="height:5px;" class="bg-primary">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role">
                                                Role:
                                            </label>
                                            <select name="role" id="role" class="form-control form-select">
                                                <option value="null">Please Select A Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <strong class="text-danger">
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role">
                                                Permission:
                                            </label>
                                            <select name="permission" id="permission" class="form-control form-select">
                                                <option value="null">Please Select A Role</option>
                                                @foreach ($permissions as $permission)
                                                    <option value="{{ $permission->name }}">
                                                        {{ $permission->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('permission')
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
                                                Updated
                                            </strong>
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-primary w-100" href="{{ route('admin-user-index') }}">
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
                <h3>Roles Detail</h3>
                <table class="table table-bordered table-hover table-striped" id="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->roles as $role)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <form action="{{ route('admin-remove-user-role') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="user" value={{ $user->id }} />
                                        <input type="hidden" name="role" value={{ $role->id }} />
                                        <button class="btn btn-danger" type="submit">
                                            <span class="fa fa-trash"></span>
                                            &nbsp;
                                            Remove Role
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- /.container-fluid -->
        <div class="row">
            <div class="col-md-12">
                <h3>Permissions Detail</h3>
                <table class="table table-bordered table-hover table-striped" id="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Permission</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->permissions as $permission)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <form action="{{ route('admin-remove-user-permission') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="user" value={{ $user->id }} />
                                        <input type="hidden" name="permission" value={{ $permission->id }} />
                                        <button class="btn btn-danger" type="submit">
                                            <span class="fa fa-trash"></span>
                                            &nbsp;
                                            Remove Permission
                                        </button>
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
