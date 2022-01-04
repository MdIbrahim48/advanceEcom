@extends('layouts.admin-master')

@section('brands')
    active
@endsection

@section('admin-content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">ShopMama</a>
      <span class="breadcrumb-item active">Brand</span>
    </nav>

    <div class="sl-pagebody">
            <div class="card">
                <div class="card-header">Update Brand</div>
                <div class="card-body">
                  <div class="form-layout">
                    <form action="{{ route('update-brand',$brand->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Brand Name English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="brand_name_en" value="{{$brand->brand_name_en ?? old('brand_name_en') }}" placeholder="Enter Brand Name En">
                                    @error('brand_name_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Brand Name Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="brand_name_bn" value="{{$brand->brand_name_bn ?? old('brand_name_bn') }}" placeholder="Enter Brand Name Bn">
                                    @error('brand_name_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Brand Image: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="brand_image" value="{{ old('brand_image') }}" placeholder="Enter Brand Image">
                                    @error('brand_image')
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

