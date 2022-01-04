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
                      <form action="{{ route('admin-update-image') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <label for="exampleInputEmail1">Image <span>*</span></label>
                              <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">
                              <input type="file" class="form-control" id="exampleInputEmail1" name="image">
                              @error('image')
                                  <span class="text text-danger">{{ $message }}</span>
                              @enderror
                          </div>

                          <div class="form-group">
                             <button type="submit" class="btn btn-danger">Upload</button>
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

