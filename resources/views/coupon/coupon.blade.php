@extends('layouts.admin_master')

@section('admin_content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Coupon
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#home">General</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#menu1">Usage Restrictions</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#menu2">Usage Limits</a>
                    </li>
                  </ul>
            </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane container active" id="home">
                            <form method="POST" action="{{ route('coupon') }}" >
                                @csrf

                                <div class="row form-group">
                                    <div class="col">
                                    <label for="name">Name</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <label for="name">Discount Type</label>
                                        <select name="Discount Type" class="custom-select">
                                            <option value="volvo">Fixed</option>
                                            <option value="fiat">Percentage</option>
                                            {{-- <option value="audi">Audi</option> --}}
                                          </select>
                                    </div>
                                    <div class="col">
                                        <label for="name">Value</label>
                                      <input type="number" class="form-control" placeholder="Value">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <label for="example-date-input">Start Date</label>
                                        <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                    </div>
                                    <div class="col">
                                        <label for="example-date-input">End Date</label>
                                         <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                        </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <label for="name">Code</label>
                                        <input type="text" class="form-control" placeholder="Code">
                                    </div>
                                    <div class="col">
                                        <div><br></div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox md-3">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Enable the coupon</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                                <label class="custom-control-label" for="customControlAutosizing">Allow free shipping</label>
                                              </div>
                                        </div>
                                          <br>
                                        </div>
                                </div>
                                <div class="row form-group">
                                    {{-- <div class="col-offset-md-8"></div> --}}
                                    <div class="col-md-9 offset-md-9">
                                    <a href="menu1" class="btn btn-info" role="button">Next</a></div>
                                    {{-- <a class="btn btn-primary" href="#" role="button">Link</a> --}}
                                    {{--  <div class="col-auto mr-auto">.col-auto .mr-auto</div>  --}}
                                    {{--  <div class="col-offset-md-6">.col-auto</div>  --}}
                                </div>
                            </form>
                     </div>
                     <div class="tab-pane container fade" id="menu1">
                        <form method="POST" action="{{ route('coupon') }}" >
                            @csrf

                            <div class="row form-group">
                                <div class="col">
                                <label>Minimun Spend</label>
                                    <input id="number" type="number" class="form-control" name="name" value="-1" required autocomplete="name" autofocus>
                            </div>
                            <div class="col">
                                <label>Maximun Spend</label>
                                    <input id="number" type="number" class="form-control" name="name" value="-1" required autocomplete="name" autofocus>
                            </div>
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <div><br></div>
                                    <div class="col">
                                        <div class="custom-control custom-checkbox md-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Coupon on product</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-checkbox mr-sm-2">
                                            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                            <label class="custom-control-label" for="customControlAutosizing">Coupon on Categories</label>
                                          </div>
                                    </div>
                                      <br>
                                </div>
                                <div class="col">
                                    <label for="name">Type</label>
                                    <select name="Type" class="custom-select">
                                        <option value="volvo">Product</option>
                                        <option value="fiat">Category</option>
                                        {{-- <option value="audi">Audi</option> --}}
                                      </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                {{-- <div class="col-offset-md-8"></div> --}}
                                <div class="col-md-9 offset-md-9">
                                <a href="menu1" class="btn btn-info" role="button">Next</a></div>
                                {{-- <a class="btn btn-primary" href="#" role="button">Link</a> --}}
                                {{--  <div class="col-auto mr-auto">.col-auto .mr-auto</div>  --}}
                                {{--  <div class="col-offset-md-6">.col-auto</div>  --}}
                            </div>
                        </form>
                 </div>
                 <div class="tab-pane container fade" id="menu2">
                    <form method="POST" action="{{ route('coupon') }}" >
                        @csrf

                        <div class="row form-group">
                            <div class="col">
                                <label for="example-number-input">Uage limit per coupon</label>
                                <input class="form-control" type="integer" value="0" id="example-number-input">
                            </div>
                            <div class="col">
                                <label for="example-number-input">Usage limit per customer</label>
                                 <input class="form-control" type="integer" value="0" id="example-number-input">
                                </div>
                        </div>

                        <div class="row form-group">
                            {{-- <div class="col-offset-md-8"></div> --}}
                            <div class="col-md-9 offset-md-9">
                            <a href="menu1" class="btn btn-info" role="button">Finished</a></div>
                            {{-- <a class="btn btn-primary" href="#" role="button">Link</a> --}}
                            {{--  <div class="col-auto mr-auto">.col-auto .mr-auto</div>  --}}
                            {{--  <div class="col-offset-md-6">.col-auto</div>  --}}
                        </div>
                    </form>
             </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
@endsection
