@extends('layouts.admin_master')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Brand
                </div>
                <div class="card-body">
                @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                 @endif
                  <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Name</th>
                        <th scope="col">Brand Image</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- @php($i=1) -->
                        @foreach($brands as $brand)
                        <tr>
                            <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
                            <td>{{$brand->brand_name}}</td>
                            <td>
                            <img src="{{ asset($brand->brand_image) }}" width ="120" height = "60">
                            </td>

                            <td>
                                    @if($brand->created_at == NULL)
                                        <span>No time set</span>
                                    @else
                                    {{$brand->created_at->diffForHumans()}}
                                    @endif
                            </td>
                            <td>
                                <a href ="{{url('Brand/Edit/'.$brand->id)}}" class ="btn btn-primary">Edit</a>
                                <a href ="{{url('Delete/Brand/'.$brand->id)}}" onclick ="return confirm('Are you sure Delete')" class ="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                     {{$brands->links()}}
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} -->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add Brand
                </div>
                <div class="card-body">

                <form action = "{{route('store.brand')}}" method ="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                                <label for="exampleInputEmail1">Brand Name</label>
                                <input type="text" name = "brand_name" class="form-control
                                @error('brand_name') is-invalid @enderror "
                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder = "Enter Brand Name" >
                                @error('brand_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                      </div>
                      <div class="form-group">
                            <label>Brand Image</label>
                            <input type="file" name = "brand_image" class="form-control
                            @error('brand_image') is-invalid @enderror "
                            id="exampleInputEmail" aria-describedby="emailHelp">
                            @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                      </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    </form>

                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
