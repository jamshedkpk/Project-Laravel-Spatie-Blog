<x-app-layout>
    <x-slot name="title">Users</x-slot>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User Create Page</h1>
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
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <form action="{{ route('admin-user-store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name:</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" />
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
                                                value="{{ old('email') }}" />
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
                                            <input type="password" class="form-control" name="password"
                                                value="{{ old('password') }}" />
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
                                            <input type="password" class="form-control" name="password_confirmation"
                                                value="{{ old('password_confirmation') }}" />
                                            @error('password_confirmation')
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
                                            <label for="role">
                                                Role:
                                            </label>
                                            <select name="role" id="role" class="form-control form-select">
                                                <option value="null">Please Select A Role</option>
                                                @foreach($roles as $role)
                                                <option value="{{$role->name}}">{{$role->name}}</option>
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
                                                Status:
                                            </label>
                                            <select name="status" id="status" class="form-control form-select">
                                                <option value="null">Please Select A Status</option>
                                                <option value="1">
                                                    {{ 'Active' }}
                                                </option>
                                                <option value="2">
                                                    {{ 'In Active' }}
                                                </option>
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
                                            <span class="fa fa-plus"></span>
                                            <strong>
                                                Add Record
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
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-app-layout>
