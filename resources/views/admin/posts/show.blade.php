<x-app-layout>
    <x-slot name="title">Posts</x-slot>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Post Create Page</h1>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title:</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $post->title }}" readonly/>
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
                                            readonly>{{$post->description}}</textarea>
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
                                            <input type="text" class="form-control" value="{{$post->category->name}}" readonly/>
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
                                            <input type="text" class="form-control" value="{{ $post->status== 1 ? 'Active' : 'In Active'}}" readonly/>
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

                                            <div class="img-thumbnail bg-danger">
                                                <img id="productPhoto" src="{{ asset($post->photo) }}"
                                                    alt="Not Found" height="100" width="100"
                                                    style="border-radius:5px;">
                                            </div>
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
                                        <a class="btn btn-primary w-100" href="{{ route('admin-post-index') }}">
                                            <span class="fa fa-home"></span>
                                            <strong>
                                                Homepage

                                            </strong>
                                        </a>
                                    </div>
                                </div>
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
