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
                    <h3 class="text-center"> <span class="text-danger">Hi...! </span><strong class="text-warning">{{ Auth::user()->name }} </strong> Update Your Profile </h3>
                    <div class="card-body">
                        <form action="{{ route('update-image') }}" method="post" enctype="multipart/form-data">
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
        </div>
        </div>
    </body>

@endsection
