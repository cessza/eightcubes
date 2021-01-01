@extends('layouts.admin_layout.admin_layout')
@section('content')

<!--content wrapper-->
  <div class="content-wrapper">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>150</h3>

                        <p>New Orders</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="order-list.blade.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>44</h3>
                        <p>New Users</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="customer-list.blade.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>107</h3>
                        <p>User Visitors</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-users"></i>
                      </div>
                      <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>16</h3>
                        <p>Critical Stock</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-exclamation-triangle"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
                <div class="card">
                  <div class="card-header border-0">
                    <h3 class="card-title">Top 5 Best Selling Products</h3>
                  </div>
                  <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                      <thead>
                      <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Sales</th>
                        <th>Sold Items</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>
                          <img src="../Items/Flower Pot/1001-6.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                          Flower Pot w/ Base
                        </td>
                        <td>P15.00</td>
                        <td>
                          <small class="text-success mr-1">
                            <i class="fas fa-arrow-up"></i>
                            12%
                          </small>
                        </td>
                        <td>
                          12,000 Sold
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <!--END OF LEFT SIDE-->
              
              <!--START OF RIGHT SIDE-->
              <div class="col-lg-6">
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">Product Schedule</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <form role="form">
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Order ID</label>
                            <input type="text" class="form-control" placeholder="Enter ...">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Order No.</label>
                            <input type="text" class="form-control" placeholder="Enter ..." >
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Schedule</label>
                            <input type="date" class="form-control">
                          </div>
                        </div>
                        <button type="button" class="btn btn-block btn-danger btn-lg btn-sumbit">SUMBIT</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
              <!--END OF RIGHT SIDE-->
            </div>
            <!-- /.row -->
          </div>
          <!--/container fluid-->
        </div>
        <!--/content-->
  </div>
      <!-- /.content wrapper -->
@endsection