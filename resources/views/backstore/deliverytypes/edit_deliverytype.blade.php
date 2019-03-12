@extends('backstore.layouts.master')

@section('link')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{url('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{url('admin/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{url('admin/plugins/iCheck/all.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{url('admin/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{url('admin/plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('admin/plugins/select2/select2.min.css')}}">
@endsection

@section('header-title')
    Edit Delivery Type
@endsection

@section('page-title')
    Edit Delivery Type
@endsection

@section('breadcrumb')
    <a href="{{url('backstore/deliverytypes')}}">Delivery Types</a> / Edit Delivery Type
@endsection

@section('main-content')
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
            <h3 class="card-title">Delivery Type Details</h3>

        </div>
        <!-- form start -->
        <form role="form" id="product" name="new-product" method="post" action="{{url('backstore/updateDeliveryType/'.$deliveryType->id)}}">
            @csrf
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="form-group">
                                <div class="card-header">
                                    <h3 class="card-title"> Delivery Type - Title</h3>
                                </div>
                                <div class="card-body pad">
                                    <input type="text" class="form-control" placeholder="Enter ..." name="title" required value="{{$deliveryType->title}}">
                                </div>
                            </div>
                        </div>
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Price
                                </h3>
                            </div>
                            <div class="card-body pad">
                                <div class="row">


                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">₦</span>
                                        </div>
                                        <input type="number" class="form-control" name="fee" required min="0" value="{{$deliveryType->fee}}">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="card card-info">
                            <div class="form-group">
                                <div class="card-header">
                                    <h3 class="card-title">Delivery Type</h3>
                                </div>
                                <div class="card-body pad">
                                    <select class="form-control select2"  data-placeholder="Select..."
                                            style="width: 100%;" name="type" required>
                                        <option>Select...</option>
                                        <option @if($deliveryType->type == 'Day') selected @endif value="Day">Days</option>
                                        <option @if($deliveryType->type == 'Hour') selected @endif value="Hour">Hours</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card card-info">
                            <div class="form-group">
                                <div class="card-header">
                                    <h3 class="card-title">Duration</h3>
                                </div>
                                <div class="card-body pad">
                                    <input type="number" min="0" required  name="duration" class="form-control" value="{{$deliveryType->duration}}">
                                </div>
                            </div>
                        </div>


                        <!-- /.col-->
                    </div>         </div>

                <!-- /.card-body -->
                <!-- /.card-footer-->
                <!-- /.card -->



                <!--/.product image -->


                <div>
                    <button type="submit" class="btn btn-info btn-flat btn-lg">UPDATE</button>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('scripts')
    <!-- CK Editor -->
    <script src="{{url('admin/plugins/ckeditor/ckeditor.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{url('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{url('admin/plugins/select2/select2.full.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{url('admin/plugins/input-mask/jquery.inputmask.js')}}"></script>
    <script src="{{url('admin/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{url('admin/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{url('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap color picker -->
    <script src="{{url('admin/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()


        })
    </script>

@endsection
