@extends('layouts.admin-master')

@section('admin-content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Shop</a>
      <span class="breadcrumb-item active">Profile</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
            <div class="col-md-4">
                @include('admin.profile.inc.sidebar')
            </div>
            <div class="col-md-8 mt-1">
                <div class="card">
                  <div class="card-body">
                      <form action="{{ route('admin-update-password') }}" method="post">
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
      </div><!-- row -->
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->
@endsection

