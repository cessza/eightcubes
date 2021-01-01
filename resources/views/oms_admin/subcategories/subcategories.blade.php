@extends('layouts.admin_layout.admin_layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub Categories</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

          @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">
                    {{ Session::get('success_message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                @endif
                
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sub Category List</h3>
                <a href="{{ url('admin/add-edit-subcategory') }}" style="max-width: 150px; float:right; display: inline-block;" class="btn btn-block btn-success">Add Subcategory</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="subcategories" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($subcategories as $subcategory)
                      <tr>
                    <td>{{ $subcategory->id }}</td>
                    <td>{{ $subcategory->category->name }}</td>
                    <td>{{ $subcategory->sub_name }}</td>
                    <td>{{ $subcategory->url }}</td>
                    <td>
                        @if($subcategory->status==1)    
                            <a class="updateSubcategoryStatus" id="subcategory-{{ $subcategory->id }}" subcategory_id="{{ $subcategory->id }}" href="javascript:void(0)"><i class="fa fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                        @else
                            <a class="updateSubcategoryStatus" id="subcategory-{{ $subcategory->id }}" subcategory_id="{{ $subcategory->id }}" href="javascript:void(0)"><i class="fa fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                        @endif 
                    </td>
                    <td>
                      <a href="{{ url('admin/add-edit-subcategory/'.$subcategory->id) }}"><i class="fas fa-edit"></i></a>
                      &nbsp;&nbsp;
                      <a href="javascript:void(0)" class="confirmDelete" record="subcategory" recordid="{{ $subcategory->id }}"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                 </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection