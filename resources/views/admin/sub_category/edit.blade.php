@extends('layouts.admin-master')

@section('categorys')
    active
@endsection

@section('admin-content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">ShopMama</a>
      <span class="breadcrumb-item active">SubCategory</span>
    </nav>

    <div class="sl-pagebody">
            <div class="card">
                <div class="card-header">Update SubCategory</div>
                <div class="card-body">
                  <div class="form-layout">
                    <form action="{{ route('update-subcategory',$subCategory->id) }}" method="post">
                        @csrf
                         <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name<span class="tx-danger">*</span></label>
                                    <select name="category_id" class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
                                        <option label="Choose one">---Select Category---</option>
                                        @foreach ($categories as $catitem)
                                          <option @if ($catitem->id == $subCategory->category_id) selected @endif value="{{ $catitem->id }}">{{ ucwords($catitem->category_name_en) }}</option>
                                        @endforeach
                                        @error('category_id')
                                              <span class="text text-danger">{{ $message }}</span>
                                          @enderror
                                      </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">SubCategory Name English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="subcategory_name_en" value="{{$subCategory->subcategory_name_en ?? old('subcategory_name_en') }}" placeholder="Enter SubCategory Name En">
                                    @error('subcategory_name_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">SubCategory Name Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="subcategory_name_bn" value="{{$subCategory->subcategory_name_bn ?? old('subcategory_name_bn') }}" placeholder="Enter SubCategory Name Bn">
                                    @error('subcategory_name_bn')
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

