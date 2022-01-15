@extends('layouts.admin-master')

@section('brands')
    active
@endsection

@section('admin-content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">ShopMama</a>
      <span class="breadcrumb-item active">Slider</span>
    </nav>

    <div class="sl-pagebody">
            <div class="card">
                <div class="card-header">Update Slider</div>
                <div class="card-body">
                  <div class="form-layout">
                    <form action="{{ route('update-slider',$slider->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $slider->image }}">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Slider Title En: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="title_en" value="{{$slider->title_en ?? old('title_en') }}" placeholder="Enter Slider Title En">
                                    @error('title_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Slider Title Bn: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="title_bn" value="{{$slider->title_bn ?? old('title_bn') }}" placeholder="Enter Slider Title bn">
                                    @error('title_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Slider Description En: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="description_en" value="{{$slider->description_en ?? old('description_en') }}" placeholder="Enter Slider Description En">
                                    @error('description_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Slider Name Bn: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="description_bn" value="{{$slider->description_bn ?? old('description_bn') }}" placeholder="Enter Slider Description Bn">
                                    @error('description_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="image">
                                    @error('image')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="form-layout-footer ml-3">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </div><!-- row -->
                    </form>


                  </div><!-- form-layout -->
                </div>
            </div>
      </div><!-- row -->
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->
@endsection

