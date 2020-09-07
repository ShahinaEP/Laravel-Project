@extends('layouts.admin_master')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{Auth::user()->name}} <span class ="badge badge-danger"> Active Now</span>
                <b style = "float : right;">Total $users <span class ="badge badge-danger"> {{count($users)}}</span></b> </div>

                <div class="card-body">
                  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created At</th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach ($users as $user)
      <tr>
        <th scope="row">{{$i++}}</th>
        <td>{{$user->name}} {{ $user->name2 }} </td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at ->diffForHumans()}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
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
