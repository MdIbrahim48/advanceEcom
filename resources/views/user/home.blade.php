@extends('layouts.frontend-master')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Profile</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <body>
        <div class="container">
            <div class="sign-in-page">
            <div class="row">
                <div class="col-md-4">
                    @include('user.inc.sidebar')
                </div>
                <div class="col-md-8 mt-1">
                  <div class="card">
                    <h3 class="text-center"> <span class="text-danger">Hi...! </span><strong class="text-warning">{{ Auth::user()->name }}</strong>Update Your Profile </h3>
                    <div class="card-body">
                        <form action="{{ route('update.profile') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ Auth::user()->name ?? old('name') }}">
                                @error('name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail2">Email <span>*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail2" name="email" value="{{ Auth::user()->email ?? old('email') }}">
                                @error('email')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail3">Phone <span>*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail3" name="phone" value="{{ Auth::user()->phone ?? old('phone') }}">
                                @error('phone')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                               <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </body>

@endsection
