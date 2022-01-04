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
                        <form action="{{ route('update-password') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Old Password <span>*</span></label>
                                <input type="password" class="form-control" id="exampleInputEmail1" name="old_password" placeholder="old password">
                                @error('old_password')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail2">New Password <span>*</span></label>
                                <input type="password" class="form-control" id="exampleInputEmail2" name="new_password" placeholder="new password">
                                @error('new_password')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail3">Confirm Password <span>*</span></label>
                                <input type="password" class="form-control" id="exampleInputEmail3" name="password_confirmation" placeholder="confirm password">
                                @error('password_confirmation')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                               <button type="submit" class="btn btn-danger">Update Password</button>
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
