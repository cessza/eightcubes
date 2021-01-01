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
    
        <form name="subcategoryForm" id="SubcategoryForm" @if(empty($subcategorydata['id'])) action="{{ url('admin/add-edit-subcategory') }}" @else action="{{ url('admin/add-edit-subcategory',$subcategorydata['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
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
                        <label for="sub_name">SubCategory Name</label>
                        <input type="text" class="form-control" id="sub_name" name="sub_name" placeholder="Enter Subcategory" @if(!empty($subcategorydata['sub_name'])) value="{{ $subcategorydata['sub_name'] }}" @else value="{{ old('sub_name') }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="sub_image">SubCategory Image</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="sub_image" name="sub_image">
                            <label class="custom-file-label" for="sub_image">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="sub_image">Upload</span>
                        </div>
                        </div>
                            @if(!empty($subcategorydata['sub_image']))
                                <div>
                                    <img style="width:80px; margin-top: 5px;" src="{{ asset('images/subcategory_images/'.$subcategorydata['sub_image']) }}">
                                    &nbsp;
                                    <a class="confirmDelete" href="javascript:void(0)" record="subcategory-image" recordid="{{$subcategorydata['id']}}">Delete Image</a>
                                </div>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="description">SubCategory Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter ..."> @if(!empty($subcategorydata['description'])){{ $subcategorydata['description'] }}@else{{ old('description') }}@endif</textarea>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" id="category_id" class="form-control select2" style="width: 100%;">
                        <option value="">Select</option>
                    @foreach($getCategories as $category)
                    <option value="{{$category->id}}" @if(!empty($subcategorydata['category_id']) && $subcategorydata['category_id']==$category->id) selected @endif >{{$category->name}}</option>
                    @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input name="url" id="url" type="text" class="form-control" id="url" placeholder="Enter URL"  @if(!empty($subcategorydata['url'])) value="{{ $subcategorydata['url'] }}" @else value="{{ old('url') }}" @endif>
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