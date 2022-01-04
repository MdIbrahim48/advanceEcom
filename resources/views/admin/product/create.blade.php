@extends('layouts.admin-master')

@section('products')
    active show-sub
@endsection

@section('add-product')
    active
@endsection

@section('admin-content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">ShopMama</a>
      <span class="breadcrumb-item active">Products</span>
    </nav>

    <div class="sl-pagebody">
            <div class="card">
                <div class="card-header">Add Products</div>
                <div class="card-body">
                  <div class="form-layout">
                    <form action="{{ route('store-product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Brand Name: <span class="tx-danger">*</span></label>
                                    <select name="brand_id" class="form-control select2-show-search" data-placeholder="---Select Brand---">
                                        <option value="" label="Choose one">---Select Brand---</option>
                                        @foreach ($brands as $brand)
                                          <option value="{{ $brand->id }}">{{ ucwords($brand->brand_name_en) }}</option>
                                        @endforeach
                                      </select>
                                      @error('brand_id')
                                          <span class="text text-danger">{{ $message }}</span>
                                      @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                                    <select name="category_id" id="category_id" class="form-control select2-show-search" data-placeholder="---Select Category---">
                                        <option value="" label="Choose one">---Select Category---</option>
                                        @foreach ($categories as $catitem)
                                            <option value="{{ $catitem->id }}">{{ ucwords($catitem->category_name_en) }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Sub Category Name: <span class="tx-danger">*</span></label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control select2-show-search" data-placeholder="---Select SubCategory---">
                                        <option value="" label="Choose one">---Select Sub Category---</option>

                                    </select>
                                    @error('subcategory_id')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Sub Sub Category Name: <span class="tx-danger">*</span></label>
                                    <select name="subsubcategory_id" id="subsubcategory_id" class="form-control select2-show-search" data-placeholder="---Select Sub Sub Category---">
                                        <option value="" label="Choose one">---Select Sub Sub Category---</option>

                                    </select>
                                    @error('subsubcategory_id')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name En: <span class="tx-danger">*</span></label>
                                    <input  name="product_name_en" class="form-control" type="text" value="{{old('product_name_en') }}" placeholder="Enter product_name_en">
                                    @error('product_name_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name Bn: <span class="tx-danger">*</span></label>
                                    <input  name="product_name_bn" class="form-control" type="text" value="{{old('product_name_bn') }}" placeholder="Enter product_name_Bn">
                                    @error('product_name_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input  name="product_code" class="form-control" type="text" value="{{old('product_code') }}" placeholder="Enter product Code">
                                    @error('product_code')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                                    <input  name="product_qty" class="form-control" type="text" value="{{old('product_qty') }}" placeholder="Enter product Quantity">
                                    @error('product_qty')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product tags_en: <span class="tx-danger">*</span></label>
                                    <input  name="product_tags_en" data-role="tagsinput" class="form-control" type="text" value="{{old('product_tags_en') }}" placeholder="Enter product Tags En">
                                    @error('product_tags_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product tags_Bn: <span class="tx-danger">*</span></label>
                                    <input  name="product_tags_bn" data-role="tagsinput" class="form-control" type="text" value="{{old('product_tags_bn') }}" placeholder="Enter product Tags bn">
                                    @error('product_tags_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product size_en: <span class="tx-danger">*</span></label>
                                    <input  name="product_size_en" data-role="tagsinput" class="form-control" type="text" value="{{old('product_size_en') }}" placeholder="Enter product size_en">
                                    @error('product_size_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product size_Bn: <span class="tx-danger">*</span></label>
                                    <input  name="product_size_bn" data-role="tagsinput" class="form-control" type="text" value="{{old('product_size_bn') }}" placeholder="Enter product size_Bn">
                                    @error('product_size_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product color english: <span class="tx-danger">*</span></label>
                                    <input  name="product_color_en" data-role="tagsinput" class="form-control" type="text" value="{{old('product_color_en') }}" placeholder="Enter product color_en">
                                    @error('product_color_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product color_Bn: <span class="tx-danger">*</span></label>
                                    <input  name="product_color_bn" data-role="tagsinput" class="form-control" type="text" value="{{old('product_color_bn') }}" placeholder="Enter product color_Bn">
                                    @error('product_color_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product selling_price: <span class="tx-danger">*</span></label>
                                    <input  name="selling_price" class="form-control" type="text" value="{{old('selling_price') }}" placeholder="Enter product selling_price">
                                    @error('selling_price')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product discount_price: <span class="tx-danger">*</span></label>
                                    <input  name="discount_price" class="form-control" type="text" value="{{old('discount_price') }}" placeholder="Enter product discount_price">
                                    @error('discount_price')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product thumbnail: <span class="tx-danger">*</span></label>
                                    <input  name="product_thumbnail" class="form-control" onchange="mainThambUrl(this)" type="file">
                                    @error('product_thumbnail')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                    <img src="" id="mainThmb" alt="">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Multiple photo: <span class="tx-danger">*</span></label>
                                    <input name="photo_name[]" multiple class="form-control" id="multiImg" type="file">
                                    @error('photo_name')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="row" id="preview_img"></div>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product short_description en: <span class="tx-danger">*</span></label>
                                    <textarea name="short_descp_en" id="summernote" cols="50" rows="5">{{ old('short_descp_en') }}</textarea>
                                    @error('short_descp_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product short_description bn: <span class="tx-danger">*</span></label>
                                    <textarea name="short_descp_bn" id="summernote1" cols="50" rows="5">{{ old('short_descp_bn') }}</textarea>
                                    @error('short_descp_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product long_descriptiion en: <span class="tx-danger">*</span></label>
                                    <textarea name="long_descp_en" id="summernote2" cols="50" rows="5">{{ old('long_descp_en') }}</textarea>
                                    @error('long_descp_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product long_descriptiion Bn: <span class="tx-danger">*</span></label>
                                    <textarea name="long_descp_bn" id="summernote3" cols="50" rows="5">{{ old('long_descp_bn') }}</textarea>
                                    @error('long_descp_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-md-3">
                                <label class="checkbox">
                                    <input type="checkbox" name="hot_deals" value="1"><span> Hot Deals</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-md-3">
                                <label class="checkbox">
                                    <input type="checkbox" name="featured" value="1"><span> featured</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-md-3">
                                <label class="checkbox">
                                    <input type="checkbox" name="speacial_offer" value="1"><span> speacial_offer</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-md-3">
                                <label class="checkbox">
                                    <input type="checkbox" name="speacial_deals" value="1"><span> speacial_deals</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="form-layout-footer ml-3">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div><!-- row -->
                    </form>


                  </div><!-- form-layout -->
                </div>
            </div>
      </div><!-- row -->
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->


  @section('admin_scripts')
    <script>
        $('#category_id').change(function(){
            let category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    type:'GET',
                    url:"{{url('/admin/subcategory/ajax')}}/"+category_id,
                    success:function(e){
                        if (e) {
                            $('#subsubcategory_id').html('');
                            $('#subcategory_id').empty();
                            $('#subcategory_id').append("<option value>Select One</option>");
                            $.each(e,function(key,value){
                                $('#subcategory_id').append('<option value="'+value.id+'">'+value.subcategory_name_en+'</option>')
                            })
                        } else {
                            $('#subcategory_id').empty();
                        }
                    }
                })
            } else {
                $('#subcategory_id').empty();
            }
        });

        $('#subcategory_id').change(function(){
            let subcategory_id = $(this).val();
            if (subcategory_id) {
                $.ajax({
                    type:'GET',
                    url:"{{url('/admin/sub-subcategory/ajax')}}/"+subcategory_id,
                    success:function(e){
                        if (e) {
                            $('#subsubcategory_id').empty();
                            $('#subsubcategory_id').append("<option value>Select One</option>");
                            $.each(e,function(key,value){
                                $('#subsubcategory_id').append('<option value="'+value.id+'">'+value.subsubcategory_name_en+'</option>')
                            })
                        } else {
                            $('#subsubcategory_id').empty();
                        }
                    }
                })
            } else {
                $('#subsubcategory_id').empty();
            }
        })
    </script>

<script>
    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
     });
    });

    </script>

    <script>
      function mainThambUrl(input){
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e){
              $('#mainThmb').attr('src',e.target.result).width(80)
                    .height(80);
          };
          reader.readAsDataURL(input.files[0]);


        }
      }
    </script>

  @endsection

@endsection

