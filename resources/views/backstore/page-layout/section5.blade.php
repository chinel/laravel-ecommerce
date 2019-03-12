@extends('backstore.layouts.master')
@section('link')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/fileUpload.css')}}">


@endsection
@section('header-title')
    Section 5
@endsection

@section('page-title')
    Section 5
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
        </div>
    </div>
    <div class="card">

        <div class="card-header">
            <h3 class="card-title"><?php echo (empty($section5)) ? "Add" : 'Edit';?> Section 5</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @if(!empty($section5))
                        <form action="{{url('/backstore/updateSection5')}}" method="post" role="form" enctype="multipart/form-data">

                        @else
                                <form action="{{url('/backstore/addSection5')}}" method="post" role="form" enctype="multipart/form-data">

                                @endif
                        @csrf
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p>Best Size (570 by 400)</p>
                                            <div class="wrap-custom-file" style="width: 470px; height: 300px" >
                                                <input type="file" name="banner1" id="image3" class="imageFile" accept=".gif, .jpg, .png" />
                                                <label  for="image3" @if(!empty($section5)) class="file-ok" style="background-image: url({{$section5->banner1Url}});background-size: auto; background-repeat: no-repeat;" @endif>
                                                    <span style="margin-top: 4rem;">Add Banner 1</span>
                                                    <i class="fa fa-plus-circle"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>Select a category 1</p>
                                            <select name="banner1CategoryId" class="form-control"
                                                    style="width: 100%;" required id="categoryId">
                                                <option value="">Select..</option>
                                                @foreach($categories as $value)
                                                    <option @if(!empty($section5)) @if($section5->banner1CategoryId == $value['id']) selected @endif @endif value="{{$value['id']}}">{{$value['title']}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p>Best Size (570 by 400)</p>
                                            <div class="wrap-custom-file" style="width: 470px; height: 300px" >
                                                <input type="file" name="banner2" id="image2" class="imageFile" accept=".gif, .jpg, .png" />
                                                <label  for="image2" @if(!empty($section5)) class="file-ok" style="background-image: url({{$section5->banner2Url}});background-size: auto; background-repeat: no-repeat;" @endif>
                                                    <span style="margin-top: 4rem;">Add Banner 2</span>
                                                    <i class="fa fa-plus-circle"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>Select a category 2</p>
                                            <select name="banner2CategoryId" class="form-control"
                                                    style="width: 100%;" required id="categoryId">
                                                <option value="">Select..</option>
                                                @foreach($categories as $value)
                                                    <option @if(!empty($section5)) @if($section5->banner2CategoryId == $value['id']) selected @endif @endif value="{{$value['id']}}">{{$value['title']}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    @if(\Auth::user()->role_id != 3)
                        <div class="row mt-4">
                            <div class="col-md-12">
                                @if(empty($section5))
                                    <input type="submit" class="btn btn-success float-right" value="Add">
                                @else
                                    <input type="submit" class="btn btn-success float-right" value="Update">
                                @endif
                            </div>
                        </div>
                          @endif
                    </form>
                </div>
            </div>
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
    <script src="{{url('admin/plugins/select2/select2.full.min.js')}}"></script>
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
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()


        })
    </script>
@endsection
