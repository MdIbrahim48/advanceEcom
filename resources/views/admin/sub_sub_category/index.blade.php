@extends('layouts.admin-master')

@section('category')
    active show-sub
@endsection

@section('sub-sub-category')
    active
@endsection

@section('admin-content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
       <div class="col-md-8">
        <div class="card pd-20 pd-sm-40">
            <div class="card-header">Sub SubCategory List</div>
            <div class="card-body">
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-20p">Category Name</th>
                    <th class="wd-20p">Sub Category Name</th>
                    <th class="wd-20p">Sub SubCategory En Name</th>
                    <th class="wd-20p">Sub SubCategory Bn Name</th>
                    <th class="wd-20p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($subsubCategory as $item)
                    <tr>
                        <td>{{ $item->category->category_name_en }}</td>
                        <td>{{ $item->subcategory->subcategory_name_en }}</td>
                        <td>{{ $item->subsubcategory_name_en }}</td>
                        <td>{{ $item->subsubcategory_name_bn }}</td>
                        <td>
                            <a href="{{ route('sub-sub-category-edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('sub-sub-category-delete',$item->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div><!-- table-wrapper -->
          </div><!-- card -->
        </div>
       </div>
       <div class="col-md-4">
            <div class="card">
                <div class="card-header">Add New Sub SubCategory </div>
                <div class="card-body">
                    <form action="{{ route('sub-subcategory-store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Category name: <span class="tx-danger">*</span></label>
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

                        <div class="form-group">
                            <label class="form-control-label">SubCategory name: <span class="tx-danger">*</span></label>
                                <select name="subcategory_id" id="subcategory_id" class="form-control select2-show-search" data-placeholder="---Select Category---">
                                  <option value="">---Select SubCategory---</option>

                                </select>
                                @error('subcategory_id')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Sub SubCategory Name English: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="subsubcategory_name_en" value="{{ old('subsubcategory_name_en') }}" placeholder="Enter Sub-SubCategory Name En">
                            @error('subsubcategory_name_en')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Sub SubCategory Name Bangla: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="subsubcategory_name_bn" value="{{ old('subsubcategory_name_bn') }}" placeholder="Enter Sub-SubCategory Name Bn">
                            @error('subsubcategory_name_bn')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>
       </div>
      </div><!-- row -->
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->

  {{-- <script src="{{ asset('backend/lib/jquery/jquery.js') }}"></script> --}}
  @section('admin_scripts')
    <script>
        $('#category_id').change(function(){
            let category_id = $(this).val();
            console.log(category_id);
            if (category_id) {
                $.ajax({
                    type:'GET',
                    url:"{{url('/admin/subcategory/ajax')}}/"+category_id,
                    success:function(e){
                        if (e) {
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
        })
    </script>
  @endsection


@endsection

