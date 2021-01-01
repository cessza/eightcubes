@extends('layouts.admin_layout.admin_layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger" style="margin-top: 10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                {{ Session::get('success_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
        @endif
    
        <form name="productForm" id="ProductForm" @if(empty($productdata['id'])) action="{{ url('admin/add-edit-product') }}" @else action="{{ url('admin/add-edit-product',$productdata['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>SubCategory</label>
                    <select name="subcategory_id" id="subcategory_id" class="form-control select2" style="width: 100%;">
                        <option value="">Select</option>
                        @foreach($subcategories as $category)
                            <optgroup label="{{ $category['name'] }}"></optgroup>
                            @foreach($category['subcategories'] as $category)
                            <option value="{{ $category['id'] }}" @if(!empty(@old('category_id')) && $category['id']==@old('category_id')) selected="" @elseif(!empty($productdata['category_id']) && $productdata['category_id']==$category['id']) selected="" @endif>&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;{{ $category['sub_name']}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product" @if(!empty($productdata['product_name'])) value="{{ $productdata['product_name'] }}" @else value="{{ old('product_name') }}" @endif>
                    </div>

                    <div class="form-group">
                        <label for="main_image">Product Image</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="main_image" name="main_image">
                            <label class="custom-file-label" for="">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                        </div>
                        @if(!empty($productdata['main_image']))
                            <div>
                                <img style="width:80px; margin-top: 5px;" src="{{ asset('images/product_images/'.$productdata['main_image']) }}">
                                &nbsp;
                                <a class="confirmDelete" href="javascript:void(0)" record="product-image" recordid="{{$productdata['id']}}"> Delete Image</a>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter ...">@if(!empty($productdata['description'])){{ $productdata['description'] }}@else{{ old('description') }}@endif</textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input name="url" id="url" type="text" class="form-control" id="url" placeholder="Enter URL"  @if(!empty($productdata['url'])) value="{{ $productdata['url'] }}" @else value="{{ old('url') }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="is_featured">Featured Item</label>
                        <input type="checkbox" name="is_featured" id="is_featured" value="Yes" @if(!empty($productdata['is_featured']) && $productdata['is_featured']=="Yes") checked="" @endif>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_code">Product Code</label>
                        <input name="product_code" id="product_code" type="text" class="form-control" id="product_code" placeholder="Enter Product Code"  @if(!empty($productdata['product_code'])) value="{{ $productdata['product_code'] }}" @else value="{{ old('product_code') }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="product_color">Product Color</label>
                        <input name="product_color" id="product_color" type="text" class="form-control" id="product_color" placeholder="Enter Product Color"  @if(!empty($productdata['product_color'])) value="{{ $productdata['product_color'] }}" @else value="{{ old('product_color') }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input name="product_price" id="product_price" type="text" class="form-control" id="product_price" placeholder="Enter Product Price"  @if(!empty($productdata['product_price'])) value="{{ $productdata['product_price'] }}" @else value="{{ old('product_price') }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="product_bundle">Bundle Price</label>
                        <input name="product_bundle" id="product_bundle" type="text" class="form-control" id="product_bundle" placeholder="Enter Bundle Price"  @if(!empty($productdata['product_bundle'])) value="{{ $productdata['product_bundle'] }}" @else value="{{ old('product_bundle') }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="product_packing">Product Packing</label>
                        <input name="product_packing" id="product_packing" type="text" class="form-control" id="product_packing" placeholder="Enter Product Packing"  @if(!empty($productdata['product_packing'])) value="{{ $productdata['product_packing'] }}" @else value="{{ old('product_packing') }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="product_weight">Product Weight</label>
                        <input name="product_weight" id="product_weight" type="text" class="form-control" id="product_weight" placeholder="Enter Product Weight"  @if(!empty($productdata['product_weight'])) value="{{ $productdata['product_weight'] }}" @else value="{{ old('product_weight') }}" @endif>
                    </div>
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    </div>
            </div>
            <!-- /.card -->
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection