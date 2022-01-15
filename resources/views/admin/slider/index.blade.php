@extends('layouts.admin-master')

@section('sliders')
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
            <div class="card-header">Slider List</div>
            <div class="card-body">
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-20p">Slider Image</th>
                    <th class="wd-20p">Slider Title En</th>
                    <th class="wd-20p">Slider Description En</th>
                    <th class="wd-20p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $item)
                    <tr>
                        <td>
                            <img src="{{ asset($item->image)}}" alt="" style="width: 80px">
                        </td>
                        <td>
                            @if ($item->title_en == null)
                                <span class="badge badge-pill badge-success">No Title Found</span>
                            @else
                               {{ $item->title_en}}
                            @endif
                        </td>
                        <td>
                            @if ($item->description_en == null)
                                <span class="badge badge-pill badge-success">No Description En Found</span>
                            @else
                               {{ $item->description_en}}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('slider-edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('slider-delete',$item->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            @if ($item->status == 1)
                                <a href="{{ route('slider-active',$item->id) }}" title_en="inactive" class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"></i></a>
                            @else
                                <a href="{{ route('slider-inactive',$item->id) }}" title_en="active now data" class="btn btn-primary btn-sm"><i class="fa fa-arrow-up"></i></a>
                            @endif
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
                <div class="card-header">Add New Slider </div>
                <div class="card-body">
                    <form action="{{ route('slider-store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Slider Title En: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="title_en" value="{{ old('title_en') }}" placeholder="Enter Slider En">
                            @error('title_en')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Slider Title Bn: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="title_bn" value="{{ old('title_bn') }}" placeholder="Enter Slider Bn">
                            @error('title_bn')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Slider Description En: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="description_en" value="{{ old('description_en') }}" placeholder="Enter Slider description_en">
                            @error('description_en')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Slider Description Bn: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="description_bn" value="{{ old('description_bn') }}" placeholder="Enter Slider description_bn">
                            @error('description_bn')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="file" name="image">
                            @error('image')
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

