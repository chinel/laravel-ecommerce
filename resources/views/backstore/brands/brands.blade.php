@extends('backstore.layouts.master')
@section('link')
    <!-- DataTables -->
    <link rel="stylesheet" href="../admin/plugins/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{url('admin/css/fileUpload.css')}}">
@endsection
@section('header-title')
    Brands
@endsection

@section('breadcrumb')
    Brands
@endsection


@section('main-content')
    @if(\Auth::user()->role_id != 3)
    <div class="row mb-3">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary  float-right" data-toggle="modal" data-target="#categoryModal">
                Add a new Brand
            </button>
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
            <h3 class="card-title">All Brands</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Title </th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($brands as $index => $value)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$value->title}}</td>
                        <td>
                            @if(\Auth::user()->role_id != 3)
                            <a class="btn btn-warning text-white" href="{{url('/backstore/edit-brand/'.$value->id)}}"> Edit</a>
                            <a class="btn btn-danger text-white" href="{{url('/backstore/delete-brand/'.$value->id)}}"> Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>S/N</th>
                    <th>Title </th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a new Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/backstore/addBrand')}}" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" required name="title">
                        </div>
                        <div class="form-group">
                            <label>Url Slug<small>(no spaces)</small></label>
                            <input type="text" class="form-control" required name="slug">
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="wrap-custom-file" style="width: 150px; height: 150px">
                                    <input type="file" name="logo" id="image1" class="imageFile" accept=".gif, .jpg, .png" required  />
                                    <label  for="image1">
                                        <span style="margin-top: 2rem;">Select logo</span>
                                        <small>(best size 98 by 26)</small>
                                        <i class="fa fa-plus-circle"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success float-right" value="Add">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
        $('input[class="imageFile"]').each(function(){
            // Refs
            var $file = $(this),
                $label = $file.next('label'),
                $labelText = $label.find('span'),
                labelDefault = $labelText.text();

            // When a new file is selected
            $file.on('change', function(event){
                var fileName = $file.val().split( '\\' ).pop(),
                    tmppath = URL.createObjectURL(event.target.files[0]);
                //Check successfully selection
                if( fileName ){
                    $label
                        .addClass('file-ok')
                        .css('background-image', 'url(' + tmppath + ')')
                        .css('background-size','contain')
                        .css('background-repeat','no-repeat')
                    ;
                    $labelText.text(fileName);
                }else{
                    $label.removeClass('file-ok');
                    $labelText.text(labelDefault);
                }
            });

// End loop of file input elements
        });
    </script>
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
