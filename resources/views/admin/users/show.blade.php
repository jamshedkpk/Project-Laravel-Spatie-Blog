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
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
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
    <form action="{{route('admin-user-edit',$user->id)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" value="{{$user->name}}" readonly/>
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
    <input type="text" class="form-control" name="email" value="{{$user->email}}" readonly/>
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
        <label for="status">Status:</label>
        <input type="text" class="form-control" value="{{ $user->status==1?'Active':'In Active' }}" readonly/>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label for="role">
        Roles:
        </label>
        <br>
        @foreach($user->roles as $role)
        <div class="badge badge-primary py-2 px-4">{{$role->name}}</div>
        @endforeach
        @error('role')
        <strong class="text-danger">
            {{ $message }}
        </strong>
        @enderror
        </div>
        </div>
        </div>
    
    <div class="row">
    <div class="col-md-12">
    <div class="form-group">
    <label for="photo">
    Photo:
    </label>
    @if($user->photo)
    <div class="img-thumbnail text-center bg-primary">
        <img src="{{asset($user->photo)}}" alt="Not Found" height="400" width="400" style="border-radius:10px;"/>    
    </div>
    @else
    <h3>No Photo Were Uploaded Yet</h3>
    @endif
    @error('photo')
    <strong class="text-danger">
        {{ $message }}
    </strong>
    @enderror
    </div>
    </div>
</div>
    <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary w-100" href="{{route('admin-user-index')}}">
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