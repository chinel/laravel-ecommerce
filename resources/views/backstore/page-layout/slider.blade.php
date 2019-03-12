@extends('backstore.layouts.master')
@section('link')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/fileUpload.css')}}">


@endsection
@section('header-title')
    Sliders
@endsection

@section('page-title')
    Sliders
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
            <h3 class="card-title"><?php echo (empty($sliders)) ? "Add" : 'Edit';?> Sliders</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                   @if(empty($sliders))
                    <form action="{{url('/backstore/addSliders')}}" method="post" role="form" enctype="multipart/form-data">
                       @else
                            <form action="{{url('/backstore/updateSliders')}}" method="post" role="form" enctype="multipart/form-data">

                            @endif
                        @csrf
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="col-md-12">

                                    <div class="row">
                                        <div class="col-xs-4">

                                                <p>Big Slider 1 (900 by 360)</p>
                                                <div class="wrap-custom-file" style="width: 300px; height: 181px" >
                                                    <input type="file" name="big_slider1" id="image1" class="imageFile" accept=".gif, .jpg, .png" />
                                                    <label  for="image1" @if(!empty($sliders)) class="file-ok" style="background-image: url({{$sliders->big_slider1Url}});background-size: contain; background-repeat: no-repeat;" @endif>
                                                        <span style="margin-top: 4rem;">Add Slider</span>
                                                        <i class="fa fa-plus-circle"></i>
                                                    </label>
                                                </div>


                                            <div class="row mr-2">
                                                <div class="col-md-12">
                                                    <p>Select a category 1</p>
                                                    <select name="big_slider1CategoryId" class="form-control"
                                                            style="width: 100%;" required id="big_slider1CategoryId">
                                                        <option value="">Select..</option>
                                                        @foreach($categories as $value)
                                                            <option @if(!empty($sliders)) @if($sliders->big_slider1CategoryId == $value['id']) selected @endif @endif value="{{$value['id']}}">{{$value['title']}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-xs-4">

                                                <p>Big Slider 2 (900 by 360)</p>
                                                <div class="wrap-custom-file" style="width: 300px; height: 181px" >
                                                    <input type="file" name="big_slider2" id="image2" class="imageFile" accept=".gif, .jpg, .png" />
                                                    <label  for="image2" @if(!empty($sliders)) class="file-ok" style="background-image: url({{$sliders->big_slider2Url}});background-size: contain; background-repeat: no-repeat;" @endif>
                                                        <span style="margin-top: 4rem;">Add Slider</span>
                                                        <i class="fa fa-plus-circle"></i>
                                                    </label>
                                                </div>


                                            <div class="row mr-2">
                                                <div class="col-md-12">
                                                    <p>Select a category 2</p>
                                                    <select name="big_slider2categoryId" class="form-control"
                                                            style="width: 100%;" required id="big_slider2categoryId">
                                                        <option value="">Select..</option>
                                                        @foreach($categories as $value)
                                                            <option @if(!empty($sliders)) @if($sliders->big_slider2categoryId == $value['id']) selected @endif @endif value="{{$value['id']}}">{{$value['title']}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-4">

                                              <p>Big Slider 3 (900 by 360)</p>
                                              <div class="wrap-custom-file" style="width: 300px; height: 181px" >
                                                  <input type="file" name="big_slider3" id="image3" class="imageFile" accept=".gif, .jpg, .png" />
                                                  <label  for="image3" @if(!empty($sliders)) class="file-ok" style="background-image: url({{$sliders->big_slider3Url}});background-size: contain; background-repeat: no-repeat;" @endif>
                                                      <span style="margin-top: 4rem;">Add Slider</span>
                                                      <i class="fa fa-plus-circle"></i>
                                                  </label>
                                              </div>


                                            <div class="row mr-2">
                                                <div class="col-md-12">
                                                    <p>Select a category 3</p>
                                                    <select name="big_slider3CategoryId" class="form-control"
                                                            style="width: 100%;" required id="big_slider3CategoryId">
                                                        <option value="">Select..</option>
                                                        @foreach($categories as $value)
                                                            <option @if(!empty($sliders)) @if($sliders->big_slider3CategoryId == $value['id']) selected @endif @endif value="{{$value['id']}}">{{$value['title']}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row  mt-5">
                                        <div class="col-xs-4">

                                                <p>Small Slider 1 (300 by 230)</p>
                                                <div class="wrap-custom-file" style="width: 300px; height: 181px" >
                                                    <input type="file" name="small_slider1" id="image4" class="imageFile" accept=".gif, .jpg, .png" />
                                                    <label  for="image4" @if(!empty($sliders)) class="file-ok" style="background-image: url({{$sliders->small_slider1Url}});background-size: auto; background-repeat: no-repeat;" @endif>
                                                        <span style="margin-top: 4rem;">Add Slider</span>
                                                        <i class="fa fa-plus-circle"></i>
                                                    </label>
                                                </div>


                                            <div class="row mr-2">
                                                <div class="col-md-12">
                                                    <p>Select a category 1</p>
                                                    <select name="small_slider1CategoryId" class="form-control"
                                                            style="width: 100%;" required id="small_slider1CategoryId">
                                                        <option value="">Select..</option>
                                                        @foreach($categories as $value)
                                                            <option @if(!empty($sliders)) @if($sliders->small_slider1CategoryId == $value['id']) selected @endif @endif value="{{$value['id']}}">{{$value['title']}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-4">

                                                <p>Small Slider 2 (300 by 230)</p>
                                                <div class="wrap-custom-file" style="width: 300px; height: 181px" >
                                                    <input type="file" name="small_slider2" id="image5" class="imageFile" accept=".gif, .jpg, .png" />
                                                    <label  for="image5" @if(!empty($sliders)) class="file-ok" style="background-image: url({{$sliders->small_slider2Url}});background-size: auto; background-repeat: no-repeat;" @endif>
                                                        <span style="margin-top: 4rem;">Add Slider</span>
                                                        <i class="fa fa-plus-circle"></i>
                                                    </label>
                                                </div>


                                            <div class="row mr-2">
                                                <div class="col-md-12">
                                                    <p>Select a category 2</p>
                                                    <select name="small_slider2CategoryId" class="form-control"
                                                            style="width: 100%;" required id="small_slider2CategoryId">
                                                        <option value="">Select..</option>
                                                        @foreach($categories as $value)
                                                            <option @if(!empty($sliders)) @if($sliders->small_slider2CategoryId == $value['id']) selected @endif @endif value="{{$value['id']}}">{{$value['title']}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-4">

                                              <p>Small Slider 3 (300 by 230)</p>
                                              <div class="wrap-custom-file" style="width: 300px; height: 181px" >
                                                  <input type="file" name="small_slider3" id="image6" class="imageFile" accept=".gif, .jpg, .png" />
                                                  <label  for="image6" @if(!empty($sliders)) class="file-ok" style="background-image: url({{$sliders->small_slider3Url}});background-size: auto; background-repeat: no-repeat;" @endif>
                                                      <span style="margin-top: 4rem;">Add Slider</span>
                                                      <i class="fa fa-plus-circle"></i>
                                                  </label>
                                              </div>


                                            <div class="row mr-2">
                                                <div class="col-md-12">
                                                    <p>Select a category 3</p>
                                                    <select name="small_slider3CategoryId" class="form-control"
                                                            style="width: 100%;" required id="small_slider3CategoryId">
                                                        <option value="">Select..</option>
                                                        @foreach($categories as $value)
                                                            <option @if(!empty($sliders)) @if($sliders->small_slider3CategoryId == $value['id']) selected @endif @endif value="{{$value['id']}}">{{$value['title']}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                @if(\Auth::user()->role_id != 3)
                        <div class="row">
                            <div class="col-md-12">
                                @if(empty($sliders))
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
