@extends('backstore.layouts.master')
@section('link')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/fileUpload.css')}}">


@endsection
@section('header-title')
    Edit Category
@endsection

@section('page-title')
    BackStore | Edit Category
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
            <h3 class="card-title">Edit Category</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
           <div class="row">
               <div class="col-md-12">
                   <form action="{{url('/backstore/updateCategory/'.$category->id)}}" method="post" role="form" enctype="multipart/form-data">
                       @csrf
                       <div class="row">
                           <div class="col-xs-6">
                               <div class="form-group">
                                   <label>Title</label>
                                   <input type="text" class="form-control" required name="title" value="{{$category->title}}">
                               </div>
                               <div class="form-group">
                                   <label>Url Slug<small>(no spaces)</small></label>
                                   <input type="text" class="form-control" required name="slug" value="{{$category->slug}}">
                               </div>
                               <div class="form-group">
                                   <label>Add Sub Categories</label>
                                   <select name="subcategories[]" class="form-control select2" multiple="multiple" data-placeholder="Select..."
                                           style="width: 100%;" required>
                                       @foreach($subcategories as $availableSubCategory)
                                           <option value="{{$availableSubCategory['id']}}" @if (in_array($availableSubCategory['id'], $category->getSubCategoryIds($category->id))) selected @endif>{{$availableSubCategory['title']}}</option>
                                       @endforeach
                                   </select>

                               </div>
                           </div>
                           <div class="col-xs-6">
                               <div class="col-md-12">
                                   <div class="row">
                                       <div class="col-md-6">
                                           <label style="display: block;"><small>Best Size (15 By 23)</small></label>
                                           <div class="wrap-custom-file" style="width: 169px; height: 181px">
                                               <input type="file" name="white_icon" id="image1" class="imageFile" accept=".gif, .jpg, .png"  class="file-ok" style="background-image: url({{$category->white_iconUrl}})"/>
                                               <label id="grayBack" for="image1"  class="file-ok" style="background-image: url({{$category->white_iconUrl}});background-size: auto; background-repeat: no-repeat;">
                                                   <span style="margin-top: 2rem;">Select white icon</span>
                                                   <i class="fa fa-plus-circle"></i>
                                               </label>
                                           </div>
                                       </div>
                                       <div class="col-md-6">
                                           <label style="display: block;"><small>Best Size (15 By 23)</small></label>
                                           <div class="wrap-custom-file" style="width: 169px; height: 181px" >
                                               <input type="file" name="black_icon" id="image2" class="imageFile" accept=".gif, .jpg, .png" class="file-ok" />
                                               <label  for="image2"  class="file-ok" style="background-image: url({{$category->black_iconUrl}});background-size: auto; background-repeat: no-repeat;">
                                                   <span style="margin-top: 2rem;">Select black icon</span>
                                                   <i class="fa fa-plus-circle"></i>
                                               </label>
                                           </div>
                                       </div>

                                   </div>
                                   <div class="row">
                                       <label for=""><small>Best Size (1170 By 385)</small></label>
                                       <div class="col-md-12">
                                           <div class="wrap-custom-file" style="width: 380px; height: 181px" >
                                               <input type="file" name="banner" id="image3" class="imageFile" accept=".gif, .jpg, .png" class="file-ok" style="background-image: url({{$category->bannerUrl}})"/>
                                               <label  for="image3"  class="file-ok" style="background-image: url({{$category->bannerUrl}});background-size: auto; background-repeat: no-repeat;">
                                                   <span style="margin-top: 4rem;">Select banner</span>
                                                   <i class="fa fa-plus-circle"></i>
                                               </label>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <div class="row">
                           <div class="col-md-12">
                               <input type="submit" class="btn btn-success float-right" value="Update">
                           </div>
                       </div>
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
