@extends('layouts.admin-master')

@section('products')
    active show-sub
@endsection

@section('all-product')
    active
@endsection

@section('admin-content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">ShopMama</a>
      <span class="breadcrumb-item active">Product Update</span>
    </nav>

    <div class="sl-pagebody">
            <div class="card">
                <div class="card-header">Update Products</div>
                <div class="card-body">
                  <div class="form-layout">
                    <form action="{{ route('product-update',$product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Brand Name: <span class="tx-danger">*</span></label>
                                    <select name="brand_id" class="form-control select2-show-search" data-placeholder="---Select Brand---">
                                        <option value="" label="Choose one">---Select Brand---</option>
                                        @foreach ($brands as $brand)
                                          <option value="{{ $brand->id }}" {{$brand->id == $product->brand_id ? 'selected':''}}>{{ ucwords($brand->brand_name_en) }}</option>
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
                                            <option value="{{ $catitem->id }}" {{$catitem->id == $product->category_id ? 'selected':''}}>{{ ucwords($catitem->category_name_en) }}</option>
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
                                    <input  name="product_name_en" class="form-control" type="text" value="{{$product->product_name_en ?? old('product_name_en') }}" placeholder="Enter product_name_en">
                                    @error('product_name_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name Bn: <span class="tx-danger">*</span></label>
                                    <input  name="product_name_bn" class="form-control" type="text" value="{{$product->product_name_bn ?? old('product_name_bn') }}" placeholder="Enter product_name_Bn">
                                    @error('product_name_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                    <input  name="product_code" class="form-control" type="text" value="{{$product->product_code ?? old('product_code') }}" placeholder="Enter product Code">
                                    @error('product_code')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                                    <input  name="product_qty" class="form-control" type="text" value="{{$product->product_qty ??old('product_qty') }}" placeholder="Enter product Quantity">
                                    @error('product_qty')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product tags_en: <span class="tx-danger">*</span></label>
                                    <input  name="product_tags_en" data-role="tagsinput" class="form-control" type="text" value="{{$product->product_tags_en ?? old('product_tags_en') }}" placeholder="Enter product Tags En">
                                    @error('product_tags_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product tags_Bn: <span class="tx-danger">*</span></label>
                                    <input  name="product_tags_bn" data-role="tagsinput" class="form-control" type="text" value="{{$product->product_tags_bn ?? old('product_tags_bn') }}" placeholder="Enter product Tags bn">
                                    @error('product_tags_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product size_en: <span class="tx-danger">*</span></label>
                                    <input  name="product_size_en" data-role="tagsinput" class="form-control" type="text" value="{{$product->product_size_en ?? old('product_size_en') }}" placeholder="Enter product size_en">
                                    @error('product_size_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product size_Bn: <span class="tx-danger">*</span></label>
                                    <input  name="product_size_bn" data-role="tagsinput" class="form-control" type="text" value="{{$product->product_size_bn ?? old('product_size_bn') }}" placeholder="Enter product size_Bn">
                                    @error('product_size_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product color english: <span class="tx-danger">*</span></label>
                                    <input  name="product_color_en" data-role="tagsinput" class="form-control" type="text" value="{{$product->product_color_en ?? old('product_color_en') }}" placeholder="Enter product color_en">
                                    @error('product_color_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product color_Bn: <span class="tx-danger">*</span></label>
                                    <input  name="product_color_bn" data-role="tagsinput" class="form-control" type="text" value="{{$product->product_color_bn ?? old('product_color_bn') }}" placeholder="Enter product color_Bn">
                                    @error('product_color_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product selling_price: <span class="tx-danger">*</span></label>
                                    <input  name="selling_price" class="form-control" type="text" value="{{$product->selling_price ?? old('selling_price') }}" placeholder="Enter product selling_price">
                                    @error('selling_price')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product discount_price: <span class="tx-danger">*</span></label>
                                    <input  name="discount_price" class="form-control" type="text" value="{{$product->discount_price ?? old('discount_price') }}" placeholder="Enter product discount_price">
                                    @error('discount_price')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                          {{--   <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product thumbnail: <span class="tx-danger">*</span></label>
                                    <input  name="product_thumbnail" class="form-control" onchange="mainThambUrl(this)" type="file">
                                    @error('product_thumbnail')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                    <img src="" id="mainThmb" alt="">
                                </div>
                            </div><!-- col-4 -->

                            {{-- <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Multiple photo: <span class="tx-danger">*</span></label>
                                    <input name="photo_name[]" multiple class="form-control" id="multiImg" type="file">
                                    @error('photo_name')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="row" id="preview_img"></div>
                                </div>
                            </div><!-- col-4 --> --}}

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product short_description en: <span class="tx-danger">*</span></label>
                                    <textarea name="short_descp_en" id="summernote" cols="50" rows="5">{{$product->short_descp_en ?? old('short_descp_en') }}</textarea>
                                    @error('short_descp_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product short_description bn: <span class="tx-danger">*</span></label>
                                    <textarea name="short_descp_bn" id="summernote1" cols="50" rows="5">{{$product->short_descp_bn ?? old('short_descp_bn') }}</textarea>
                                    @error('short_descp_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product long_descriptiion en: <span class="tx-danger">*</span></label>
                                    <textarea name="long_descp_en" id="summernote2" cols="50" rows="5">{{$product->long_descp_en ?? old('long_descp_en') }}</textarea>
                                    @error('long_descp_en')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Product long_descriptiion Bn: <span class="tx-danger">*</span></label>
                                    <textarea name="long_descp_bn" id="summernote3" cols="50" rows="5">{{$product->long_descp_bn ?? old('long_descp_bn') }}</textarea>
                                    @error('long_descp_bn')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-md-3">
                                <label class="checkbox">
                                    <input type="checkbox" name="hot_deals" {{ $product->hot_deals == 1 ? 'checked':'' }} value="1"><span> Hot Deals</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-md-3">
                                <label class="checkbox">
                                    <input type="checkbox" name="featured" {{ $product->featured == 1 ? 'checked':'' }} value="1"><span> featured</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-md-3">
                                <label class="checkbox">
                                    <input type="checkbox" name="speacial_offer" {{ $product->speacial_offer == 1 ? 'checked':'' }} value="1"><span> speacial_offer</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="col-md-3">
                                <label class="checkbox">
                                    <input type="checkbox" name="speacial_deals" {{ $product->speacial_deals == 1 ? 'checked':'' }} value="1"><span> speacial_deals</span>
                                </label>
                            </div><!-- col-4 -->

                            <div class="form-layout-footer ml-3">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </div><!-- row -->
                    </form>

                    <form action="{{ route('update-product-thumbnail') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="old_img" value="{{ $product->product_thumbnail }}">
                        <div class="row row-sm" style="margin-top: 30px">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control" for="">Change Image</label>
                                                    <input type="file" class="form-control" name="product_thumbnail" id="">
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info">Update Thumbnail</button>
                        </div>
                    </form>

                    <form action="{{ route('update-product-multiimage') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm" style="margin-top: 30px">
                            @foreach ($multiImages as $multiImg)
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset($multiImg->photo_name) }}" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ route('product-multi-img-delete',$multiImg->id) }}" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </h5>
                                            <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control" for="">Change Image</label>
                                                    <input type="file" class="form-control" name="multiimg[{{ $multiImg->id }}]" id="">
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info">Update Multi Image</button>
                        </div>
                    </form>
                    <form action="{{ route('add-product-multiimage') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="row row-sm" style="margin-top: 30px">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control" for="">Add Multi Image</label>
                                                    <input name="photo_name[]" multiple class="form-control" id="multiImg" type="file">
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info">Add Multi Image</button>
                        </div>
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

