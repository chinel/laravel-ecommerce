@extends('backstore.layouts.master')
@section('link')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/fileUpload.css')}}">


@endsection
@section('header-title')
    Home Section 6
@endsection

@section('page-title')
    Home Section 6
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
            <h3 class="card-title"><?php echo (empty($section2)) ? "Add" : 'Edit';?>  Home Section 6</h3>
            <?php
            function comma_separated_to_array($string_value, $separator = ',')
            {
                //Explode on comma
                $vals     =   explode($separator, $string_value);
                $count    =   count($vals);
                $val      =   array();
                //Trim whitespace
                for($i=0;$i<=$count-1;$i++) {
                    $val[]   .=   $vals[$i];
                }
                return $val;
            }
            ?>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @if(empty($section2))
                        <form action="{{url('/backstore/addSection6')}}" method="post" role="form" enctype="multipart/form-data">

                            @else
                                <form action="{{url('/backstore/updateSection6')}}" method="post" role="form" enctype="multipart/form-data">

                                    @endif
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category 1</label>
                                                <select name="category1" id="category1" class="form-control category" required>
                                                    <option value="">-- Select an Option --</option>
                                                    @foreach($categories as $category)
                                                        <option @if(!empty($section6)) @if($section6->category1_id == $category->id) selected @endif @endif value="{{$category->id}}" >{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Select Products <small>(6 products)</small></label>
                                                <select name="product1List[]" id="select1" class="form-control select2 productList" multiple="multiple" data-placeholder="Select..."
                                                        style="width: 100%;" required>
                                                    @if(!empty($section6))
                                                        <?php  $products = $section6->getCategoryProducts($section6->category1_id);?>
                                                        @foreach($products as $product)
                                                            <option @if (in_array($product->id, comma_separated_to_array($section6->product1List, ","))) selected @endif value="{{$product->id}}">{{$product->title}}</option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Banner (570 by 150)</p>
                                            <div class="wrap-custom-file" style="width: 600px; height: 200px" >
                                                <input type="file" name="banner1" id="image1" class="imageFile" accept=".gif, .jpg, .png" />
                                                <label  for="image1" @if(!empty($section6)) class="file-ok" style="background-image: url({{$section6->banner1Url}});background-size: auto; background-repeat: no-repeat;" @endif>
                                                    <span style="margin-top: 4rem;">Add Banner 1</span>
                                                    <i class="fa fa-plus-circle"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="margin-bottom: 80px;"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category 2</label>
                                                <select name="category2" id="category2" class="form-control category" required>
                                                    <option value="">-- Select an Option --</option>
                                                    @foreach($categories as $category)
                                                        <option @if(!empty($section6)) @if($section6->category2_id == $category->id) selected @endif @endif value="{{$category->id}}" >{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Select Products <small>(6 products)</small></label>
                                                <select name="product2List[]" id="select2" class="form-control select2 productList" multiple="multiple" data-placeholder="Select..."
                                                        style="width: 100%;" required>
                                                    @if(!empty($section6))
                                                        <?php  $products = $section6->getCategoryProducts($section6->category2_id);?>
                                                        @foreach($products as $product)
                                                            <option @if (in_array($product->id, comma_separated_to_array($section6->product2List, ","))) selected @endif value="{{$product->id}}">{{$product->title}}</option>
                                                        @endforeach
                                                    @endif

                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Banner (570 by 150)</p>
                                            <div class="wrap-custom-file" style="width: 600px; height: 200px" >
                                                <input type="file" name="banner2" id="image2" class="imageFile" accept=".gif, .jpg, .png" />
                                                <label  for="image2" @if(!empty($section6)) class="file-ok" style="background-image: url({{$section6->banner2Url}});background-size: auto; background-repeat: no-repeat;" @endif>
                                                    <span style="margin-top: 4rem;">Add Banner 2</span>
                                                    <i class="fa fa-plus-circle"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @if(\Auth::user()->role_id != 3)
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if(empty($section6))
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
            //Initialize Select2 Elements
            $('.select2').select2()


        })

        $('form').on('submit', function(){
            var minimumPdt =6;


            if(($("#select1").select2('data').length > minimumPdt) ||
                ($("#select2").select2('data').length  > minimumPdt)
               ){
                alert("Please select not more than " + minimumPdt + " products under each category");
                return false;
            }

            else if(($("#select1").select2('data').length < minimumPdt)
                || ($("#select2").select2('data').length < minimumPdt)
              ) {
                alert("Please select " + minimumPdt + " products under each category");
                return false;
            }
            else{

                return true;
            }
        })
    </script>
    <script>
        $('.category').change(function () {
            $this =  $(this);
            $value = $this.val();
            $sibling = $this.parent().parent().next().children().find('.productList');



            if($value != ""){

                $.get('/backstore/getCategoryProducts/'+ $value, function (data) {
                    $this.parent().parent().next().children().find('.productList').val(null).trigger('change')

                    $this.parent().parent().next().children().find('.productList').html("");
                    console.log(data);
                    if(data.products.length > 0) {
                        jQuery.each(data.products, function (i, val) {
                            $this.parent().parent().next().children().find('.productList').append("<option value='" + val.id + "'>" + val.title + "</option>");
                            // $('#subcategory').append("<option value='" + val.id + "'>" + val.title + "</option>");

                        });
                    }


                });
            }

        });


    </script>
@endsection
