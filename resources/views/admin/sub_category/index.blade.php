@extends('layouts.admin-master')

@section('category')
    active show-sub
@endsection

@section('sub-category')
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
            <div class="card-header">SubCategory List</div>
            <div class="card-body">
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-20p">Category Name</th>
                    <th class="wd-20p">SubCategory En Name</th>
                    <th class="wd-20p">SubCategory Bn Name</th>
                    <th class="wd-20p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sub_categories as $item)
                    <tr>
                        <td>{{ $item->category->category_name_en }}</td>
                        <td>{{ $item->subcategory_name_en }}</td>
                        <td>{{ $item->subcategory_name_bn }}</td>
                        <td>
                            <a href="{{ route('sub-category-edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('sub-category-delete',$item->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                <div class="card-header">Add New SubCategory </div>
                <div class="card-body">
                    <form action="{{ route('subcategory-store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Category name: <span class="tx-danger">*</span></label>
                                <select name="category_id" class="form-control select2-show-search" data-placeholder="---Select Category---">
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
                            <label class="form-control-label">SubCategory Name English: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="subcategory_name_en" value="{{ old('subcategory_name_en') }}" placeholder="Enter SubCategory Name En">
                            @error('subcategory_name_en')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">SubCategory Name Bangla: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="subcategory_name_bn" value="{{ old('subcategory_name_bn') }}" placeholder="Enter SubCategory Name Bn">
                            @error('subcategory_name_bn')
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
@endsection

