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
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">

      <div class="row row-sm">
       <div class="col-md-8">
        <div class="card pd-20 pd-sm-40">
            <div class="card-header">Product List</div>
            <div class="card-body">
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-20p">Thumbnail</th>
                    <th class="wd-20p">Product En Name</th>
                    <th class="wd-20p">Product Bn Name</th>
                    <th class="wd-20p">Product Quantity</th>
                    <th class="wd-20p">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                    <tr>
                        <td>
                            <img src="{{ asset($item->product_thumbnail) }}" width="70px" alt="">
                        </td>
                        <td>{{ $item->product_name_en }}</td>
                        <td>{{ $item->product_name_bn }}</td>
                        <td>{{ $item->product_qty }}</td>
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

      </div><!-- row -->
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->
@endsection

