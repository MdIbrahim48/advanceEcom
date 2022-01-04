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
                    <form action="{{ route('update-data') }}" method="post">
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
                           <button type="submit" class="btn btn-danger">Submit Data</button>
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

