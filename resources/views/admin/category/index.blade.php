@extends('layouts.admin_master')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Category
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
                        <th scope="col">Added</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- @php($i=1) -->
                        @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->User->name}} {{$category->User->name2}}</td>
                            <!-- <td>{{$category->name}}</td> -->


                            <td>
                                    @if($category->created_at == NULL)
                                        <span>No time set</span>
                                    @else
                                    <!-- {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}} -->
                                    {{$category->created_at->diffForHumans()}}
                                    @endif
                            </td>
                            <td>
                                <a href ="{{url('Category/Edit/')}}/{{$category->id}}" class ="btn btn-primary">Edit</a>
                                <a href ="{{url('softdelete/Category/'.$category->id)}} " class ="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                     {{$categories->links()}}
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
                <div class="card-header">Add Category
                </div>
                <div class="card-body">

                <form action = "{{route('store.category')}}" method ="POST">
                @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Add Category</label>
                      <input type="text" name = "category_name" class="form-control
                      @error('category_name') is-invalid @enderror "
                      id="exampleInputEmail1" aria-describedby="emailHelp"
                      placeholder = "Enter Category" >
                      @error('category_name')
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Trash List
                </div>
                <div class="card-body">
                <!-- @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                 @endif -->
                  <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Name</th>
                        <th scope="col">Added</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- @php($i=1) -->
                        @foreach($trashCategory as $category)
                        <tr>
                            <th scope="row">{{$trashCategory->firstItem()+$loop->index}}</th>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->User->name}} {{$category->User->name2}}</td>
                            <!-- <td>{{$category->name}}</td> -->


                            <td>
                                    @if($category->created_at == NULL)
                                        <span>No time set</span>
                                    @else
                                    <!-- {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}} -->
                                    {{$category->created_at->diffForHumans()}}
                                    @endif
                            </td>
                            <td>
                                <a href ="{{url('Category/Restore/'.$category->id)}}" class ="btn btn-primary">Restore</a>
                                <a href ="{{url('Pdelete/Category/'.$category->id)}} " class ="btn btn-danger">Per-Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                     {{$trashCategory->links()}}
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} -->
                </div>
            </div>
        </div>
        <div class = "col-md-4">
        </div>
    </div>
</div>
@endsection
