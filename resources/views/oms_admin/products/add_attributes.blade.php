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
        @if(Session::has('error_message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                {{ Session::get('error_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
        @endif
    
        <form name="addAttributeForm" id="addAttributeForm" method="post" action="{{ url('admin/add-attributes/'.$productdata['id']) }}">@csrf
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
                        <label for="product_name">Product Name: </label> &nbsp;{{ $productdata['product_name'] }}
                    </div>
                    <div class="form-group">
                        <label for="product_code">Product Code: </label> &nbsp;{{ $productdata['product_code'] }}
                    </div>
                    <div class="form-group">
                        <label for="product_color">Product Color: </label> &nbsp;{{ $productdata['product_color'] }}
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                                <img style="width:120px; margin-top: 5px;" src="{{ asset('images/product_images/'.$productdata['main_image']) }}">
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="form-group">
                        <div class="field_wrapper">
                            <div>
                                <input id="size" name="size[]" type="text" value="" placeholder="Size" style="width: 120px;" required=""/>
                                <input id="att_code" name="att_code[]" type="text" value="" placeholder="Code" style="width: 120px;" required=""/>
                                <input id="color" name="color[]" type="text" value="" placeholder="Color" style="width: 120px;" required=""/>
                                <input id="bundle_price" name="bundle_price[]" type="number" value="" placeholder="Bundle Price" style="width: 120px" required=""/>
                                <input id="stock" name="stock[]" type="number" value="" placeholder="Stock" style="width: 120px;" required=""/>
                                <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <form name="addAttributeForm" id="addAttributeForm" method="post" action="{{ url('admin/add-attributes/'.$productdata['id']) }}">@csrf
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Add Attributes</button>
                </div>
            </form>
            </div>
            <!-- /.card -->
        </form>

        <form name="editAttributeForm" id="editAttributeForm" method="post" action="{{ url('admin/edit-attributes/'.$productdata['id']) }}">@csrf
          <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Add Product Attributes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="products" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Size</th>
                      <th>Code</th>
                      <th>Color</th>
                      <th>Bundle Price</th>
                      <th>Stocks</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($productdata['attributes'] as $attribute)
                        <input style="display: none;" type="text" name="attrId[]" value="{{ $attribute['id'] }}">
                        <tr>
                      <td>{{ $attribute['id'] }}</td>
                      <td>{{ $attribute['size'] }}</td>
                      <td>{{ $attribute['att_code'] }}</td>
                      <td>{{ $attribute['color'] }}</td>
                      <td>{{ $attribute['bundle_price'] }} </td>
                      <td>
                        <input type="number" name="stock[]" value="{{ $attribute['stock'] }}" required="">
                      </td>
                      <td>
                        @if($attribute['status']==1)    
                            <a class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" href="javascript:void(0)"><i class="fa fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                        @else
                            <a class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" href="javascript:void(0)"><i class="fa fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                        @endif 
                        &nbsp;&nbsp;
                      <a title="Delete Attribute" href="javascript:void(0)" class="confirmDelete" record="attribute" recordid="{{ $attribute['id'] }}"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                  </table>
                </div>
            <!-- /.card-body -->

                  <div class="card-footer">
                      <button type="submit" class="btn btn-success">Update Attributes</button>
                  </div>
          </div>
            <!-- /.card -->
        </form>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection