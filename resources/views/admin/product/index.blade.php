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
       <div class="col-md-12">
        <div class="card pd-20 pd-sm-40">
            <div class="card-header">Product List</div>
            <div class="card-body">
            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-20p">Thumbnail</th>
                    <th class="wd-20p">Product En Name</th>
                    <th class="wd-20p">Selling Price</th>
                    <th class="wd-20p">Product Quantity</th>
                    <th class="wd-20p">Selling Discount</th>
                    <th class="wd-20p">Status</th>
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
                        <td>{{ $item->selling_price }}</td>
                        <td>{{ $item->product_qty }}</td>
                        <td>
                            @if ($item->discount_price == null)
                                <span class="badge badge-pill badge-danger">No</span>
                            @else
                                @php
                                    $amount = $item->selling_price - $item->discount_price;
                                    $discount = ($amount / $item->selling_price) * 100
                                @endphp
                                <span class="badge badge-pill badge-primary">{{ round($discount) }}%</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->status == '1')
                                <span class="badge badge-pill badge-success">Active</span>
                            @else
                                <span class="badge badge-pill badge-danger">InActive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('product-edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('product-edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('product-delete',$item->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            @if ($item->status == 1)
                                <a href="{{ route('product-active',$item->id) }}" title="inactive" class="btn btn-danger btn-sm"><i class="fa fa-arrow-down"></i></a>
                            @else
                                <a href="{{ route('product-inactive',$item->id) }}" title="active now data" class="btn btn-primary btn-sm"><i class="fa fa-arrow-up"></i></a>
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

      </div><!-- row -->
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->
@endsection

