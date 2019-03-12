@extends('backstore.layouts.master')
@section('link')
<!-- DataTables -->
<link rel="stylesheet" href="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.css')}}">
@endsection
@section('header-title')
      Shoprite Pickup | BackStore - Delivery Types
@endsection

@section('page-title')
      Delivery Types |

@endsection


@section('main-content')
    @if(\Auth::user()->role_id != 3)
    <div class="row mb-3">
        <div class="col-md-12">
            <a class="btn btn-primary float-right" href="{{url('/backstore/new-deliverytype')}}"> Add New</a>
        </div>
    </div>
    @endif
    <div class="row mt-3">
        <div class="col-md-12">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

            @endif

            @if (session('status'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                    {{ session('status')}}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                    {{ session('error')}}
                </div>
            @endif
        </div>
    </div>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">All Delivery Types</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>S/N</th>
          <th>Delivery</th>
          <th>Type</th>
          <th>Cost (NGN)</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($deliveryTypes))
            @foreach($deliveryTypes as $index => $value)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$value->title}}</td>
                <td>{{$value->duration}} {{$value->type}}</td>
                <td>₦{{$value->fee}}</td>
                <td>
                    @if(\Auth::user()->role_id != 3)
                    <a class="btn btn-primary text-white" href="{{url('backstore/editDeliveryType/'.$value->id)}}"> Edit</a>
                    <a class="btn btn-danger text-white" href="{{url('/backstore/deleteDeliveryType/'.$value->id)}}"> Delete</a>
                   @endif
                </td>
            </tr>

            @endforeach
        @else
            <tr>
                <td colspan="5">No Delivery Types Yet</td>

            </tr>
        @endif


        </tbody>
        <tfoot>
        <tr>
          <th>S/N</th>
          <th>Delivery</th>
          <th>Type</th>
          <th>Cost (NGN)</th>
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
<script src="{{url('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{url('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('admin/plugins/fastclick/fastclick.js')}}"></script>
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
