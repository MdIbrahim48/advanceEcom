@extends('layouts.admin-master')

@section('brands')
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
            <div class="card-header">Brand List</div>
            <div class="card-body">
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-20p">Brand Image</th>
                    <th class="wd-20p">Brand En Name</th>
                    <th class="wd-20p">Brand Bn Name</th>
                    <th class="wd-20p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $item)
                    <tr>
                        <td>
                            <img src="{{ asset($item->brand_image) }}" alt="" style="width: 80px">
                        </td>
                        <td>{{ $item->brand_name_en }}</td>
                        <td>{{ $item->brand_name_bn }}</td>
                        <td>
                            <a href="{{ url('admin/brand-edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('brand-delete',$item->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                <div class="card-header">Add New Brand </div>
                <div class="card-body">
                    <form action="{{ route('brand-store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                        <label class="form-control-label">Brand Name English: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="brand_name_en" value="{{ old('brand_name_en') }}" placeholder="Enter Brand Name En">
                        @error('brand_name_en')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Brand Name Bangla: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="brand_name_bn" value="{{ old('brand_name_bn') }}" placeholder="Enter Brand Name Bn">
                            @error('brand_name_bn')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Brand Image: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" name="brand_image" value="{{ old('brand_image') }}" placeholder="Enter Brand Image">
                            @error('brand_image')
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

