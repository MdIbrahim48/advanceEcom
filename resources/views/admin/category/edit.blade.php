@extends('layouts.admin-master')

@section('categorys')
    active
@endsection

@section('admin-content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">ShopMama</a>
      <span class="breadcrumb-item active">Category</span>
    </nav>

    <div class="sl-pagebody">
            <div class="card">
                <div class="card-header">Update category</div>
                <div class="card-body">
                  <div class="form-layout">
                    <form action="{{ route('update-category',$category->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $category->category_image }}">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_name_en" value="{{$category->category_name_en ?? old('category_name_en') }}" placeholder="Enter category Name En">
                                    @error('category_name_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_name_bn" value="{{$category->category_name_bn ?? old('category_name_bn') }}" placeholder="Enter category Name Bn">
                                    @error('category_name_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">category Icon Class: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="category_icon" value="{{$category->category_icon ?? old('category_icon') }}" placeholder="Enter category Icon">
                                    @error('category_icon')
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

