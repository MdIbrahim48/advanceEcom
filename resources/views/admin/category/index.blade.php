@extends('layouts.admin-master')

@section('category')
    active show-sub
@endsection

@section('add-category')
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
            <div class="card-header">Category List</div>
            <div class="card-body">
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-20p">Category Icon</th>
                    <th class="wd-20p">Category En Name</th>
                    <th class="wd-20p">Category Bn Name</th>
                    <th class="wd-20p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                    <tr>
                        <td>
                            <span><i class="{{ $item->category_icon }}"></i></span>
                        </td>
                        <td>{{ $item->category_name_en }}</td>
                        <td>{{ $item->category_name_bn }}</td>
                        <td>
                            <a href="{{ route('category-edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('category-delete',$item->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                <div class="card-header">Add New Category </div>
                <div class="card-body">
                    <form action="{{ route('category-store') }}" method="post">
                        @csrf
                        <div class="form-group">
                        <label class="form-control-label">Category Name English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="category_name_en" value="{{ old('category_name_en') }}" placeholder="Enter Category Name En">
                        @error('category_name_en')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Category Name Bangla: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="category_name_bn" value="{{ old('category_name_bn') }}" placeholder="Enter Category Name Bn">
                            @error('category_name_bn')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Category Icon Class: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="category_icon" value="{{ old('category_icon') }}" placeholder="Enter Category Icon Class">
                            @error('category_icon')
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

