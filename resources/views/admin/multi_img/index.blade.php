@extends('layouts.admin_master')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
                <div class="card-deck" >
                @foreach($images as $multi_img)
                    <div class="col-md-4 mt-5">
                        <div class="card">
                                <img class="card-img-top" src="{{ asset($multi_img->image)}}">
                                <div class="card-body">
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Multiple Image
                </div>
                <div class="card-body">

                <form action = "{{route('store.image')}}" method ="POST" enctype="multipart/form-data">
                @csrf
                      <div class="form-group">
                            <label>Multiple Image</label>
                            <input type="file" name = "image[]" class="form-control
                            @error('image') is-invalid @enderror "
                            id="exampleInputEmail" aria-describedby="emailHelp" Multiple>
                            @error('image')
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
