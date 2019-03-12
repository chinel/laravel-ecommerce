@extends('backstore.layouts.master')
@section('link')
<!-- DataTables -->
<link rel="stylesheet" href="../admin/plugins/datatables/dataTables.bootstrap4.min.css">
@endsection
@section('header-title')
      Shoprite Pickup | BackStore - Products
@endsection

@section('page-title')
      Product Variations
@endsection


@section('main-content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">All Products</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>S/N</th>
          <th>Product Name</th>
          <th>Category</th>
          <th>Stock</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>1</td>
          <td>18" Nexus Fan</td>
          <td>Electronics</td>
          <td>4</td>
          <td><a class="btn btn-primary text-white" href="/backstore/edit-product"> Edit</a> <a class="btn btn-danger text-white" target="_blank"> Delete</a></td>
        </tr>

        </tbody>
        <tfoot>
        <tr>
          <th>S/N</th>
          <th>Product Name</th>
          <th>Category</th>
          <th>Stock</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
@section('scripts')
<!-- DataTables -->
<script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../admin/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- SlimScroll -->
<script src="../admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../admin/plugins/fastclick/fastclick.js"></script>
  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>
@endsection
