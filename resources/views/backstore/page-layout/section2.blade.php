@extends('backstore.layouts.master')
@section('link')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/fileUpload.css')}}">


@endsection
@section('header-title')
    Home Section 2
@endsection

@section('page-title')
    Home Section 2
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
            <h3 class="card-title"><?php echo (empty($section2)) ? "Add" : 'Edit';?>  Home Section 2</h3>
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
                        <form action="{{url('/backstore/addSection2')}}" method="post" role="form" enctype="multipart/form-data">

                        @else
                        <form action="{{url('/backstore/updateSection2')}}" method="post" role="form" enctype="multipart/form-data">

                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" id="category" class="form-control" required>
                                        <option value="">-- Select an Option --</option>
                                        @foreach($categories as $category)
                                            <option @if(!empty($section2)) @if($section2->category_id == $category->id) selected @endif @endif value="{{$category->id}}" >{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Select Brands <small>(6 brands)</small></label>
                                    <select name="brandlist[]" id="select1" class="form-control select2" multiple="multiple" data-placeholder="Select..."
                                            style="width: 100%;" required>
                                        @if(!empty($section2))
                                         <?php  $brands = $section2->getCategoryBrands($section2->category_id);?>
                                            @foreach($brands as $brand)
                                                 <option @if (in_array($brand->id, comma_separated_to_array($section2->brandlist, ","))) selected @endif value="{{$brand->id}}">{{$brand->title}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Sub Categories</label>
                                    <select name="subcategory1" class="form-control subcategory"
                                            style="width: 100%;" required>
                                        <option value="">-- Select a subcategory --</option>
                                        @if(!empty($section2))
                                            <?php $subcategories = $section2->getCategorySubCategories($section2->category_id);?>
                                            @foreach($subcategories as $subcategory)
                                                    <option @if($section2->subcategory1 == $subcategory->id) selected @endif value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                                            @endforeach

                                         @endif

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Products <small> (4 products)</small></label>
                                    <select name="subcategory1_childlist[]" id="select2" class="form-control select2 subcategoryList" multiple="multiple" data-placeholder="Select..."
                                            style="width: 100%;" required>
                                        @if(!empty($section2))
                                            <?php $products = $section2->getSubCategoryProducts($section2->subcategory1);?>
                                            @foreach($products as $product)
                                                <option @if (in_array($product->id, comma_separated_to_array($section2->subcategory1_childlist, ","))) selected @endif value="{{$product->id}}">{{$product->title}}</option>
                                            @endforeach

                                        @endif

                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Sub Categories</label>
                                    <select name="subcategory2" class="form-control subcategory"
                                            style="width: 100%;" required>
                                        <option value="">-- Select a subcategory --</option>

                                        @if(!empty($section2))
                                            <?php $subcategories = $section2->getCategorySubCategories($section2->category_id);?>
                                            @foreach($subcategories as $subcategory)
                                                <option @if($section2->subcategory2 == $subcategory->id) selected @endif value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                                            @endforeach

                                        @endif

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Products<small> (4 products)</small></label>
                                    <select name="subcategory2_childlist[]" id="select3" class="form-control select2 subcategoryList" multiple="multiple" data-placeholder="Select..."
                                            style="width: 100%;" required>
                                        @if(!empty($section2))
                                            <?php $products = $section2->getSubCategoryProducts($section2->subcategory2);?>
                                            @foreach($products as $product)
                                                <option @if (in_array($product->id, comma_separated_to_array($section2->subcategory2_childlist, ","))) selected @endif value="{{$product->id}}">{{$product->title}}</option>
                                            @endforeach

                                        @endif

                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Sub Categories</label>
                                    <select name="subcategory3" class="form-control subcategory"
                                            style="width: 100%;" required>
                                        <option value="">-- Select a subcategory --</option>
                                        @if(!empty($section2))
                                            <?php $subcategories = $section2->getCategorySubCategories($section2->category_id);?>
                                            @foreach($subcategories as $subcategory)
                                                <option @if($section2->subcategory3 == $subcategory->id) selected @endif value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                                            @endforeach

                                        @endif

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Products<small> (4 products)</small></label>
                                    <select name="subcategory3_childlist[]" id="select4" class="form-control select2 subcategoryList" multiple="multiple" data-placeholder="Select..."
                                            style="width: 100%;" required>
                                        @if(!empty($section2))
                                            <?php $products = $section2->getSubCategoryProducts($section2->subcategory3);?>
                                            @foreach($products as $product)
                                                <option @if (in_array($product->id, comma_separated_to_array($section2->subcategory3_childlist, ","))) selected @endif value="{{$product->id}}">{{$product->title}}</option>
                                            @endforeach

                                        @endif

                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Sub Categories</label>
                                    <select name="subcategory4" class="form-control subcategory"
                                            style="width: 100%;" required>
                                        <option value="">-- Select a subcategory --</option>
                                        @if(!empty($section2))
                                            <?php $subcategories = $section2->getCategorySubCategories($section2->category_id);?>
                                            @foreach($subcategories as $subcategory)
                                                <option @if($section2->subcategory4 == $subcategory->id) selected @endif value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                                            @endforeach

                                        @endif

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Products<small> (4 products)</small></label>
                                    <select name="subcategory4_childlist[]" id="select5" class="form-control select2 subcategoryList" multiple="multiple" data-placeholder="Select..."
                                            style="width: 100%;" required>
                                        @if(!empty($section2))
                                            <?php $products = $section2->getSubCategoryProducts($section2->subcategory4);?>
                                            @foreach($products as $product)
                                                <option @if (in_array($product->id, comma_separated_to_array($section2->subcategory4_childlist, ","))) selected @endif value="{{$product->id}}">{{$product->title}}</option>
                                            @endforeach

                                        @endif

                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Sub Categories</label>
                                    <select name="subcategory5" class="form-control subcategory"
                                            style="width: 100%;" required>
                                        <option value="">-- Select a subcategory --</option>
                                        @if(!empty($section2))
                                            <?php $subcategories = $section2->getCategorySubCategories($section2->category_id);?>
                                            @foreach($subcategories as $subcategory)
                                                <option @if($section2->subcategory5 == $subcategory->id) selected @endif value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                                            @endforeach

                                        @endif
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Products<small> (4 products)</small></label>
                                    <select name="subcategory5_childlist[]" id="select6" class="form-control select2 subcategoryList" multiple="multiple" data-placeholder="Select..."
                                            style="width: 100%;" required>
                                        @if(!empty($section2))
                                            <?php $products = $section2->getSubCategoryProducts($section2->subcategory5);?>
                                            @foreach($products as $product)
                                                <option @if (in_array($product->id, comma_separated_to_array($section2->subcategory5_childlist, ","))) selected @endif value="{{$product->id}}">{{$product->title}}</option>
                                            @endforeach

                                        @endif

                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <p>Banner (470 by 500)</p>
                                <div class="wrap-custom-file" style="width: 600px; height: 300px" >
                                    <input type="file" name="banner" id="image1" class="imageFile" accept=".gif, .jpg, .png" />
                                    <label  for="image1" @if(!empty($section2)) class="file-ok" style="background-image: url({{$section2->bannerUrl}});background-size: auto; background-repeat: no-repeat;" @endif>
                                        <span style="margin-top: 4rem;">Add Banner</span>
                                        <i class="fa fa-plus-circle"></i>
                                    </label>
                                </div>
                            </div>
                        </div>


                            @if(\Auth::user()->role_id != 3)
                        <div class="row">
                            <div class="col-md-12">
                                @if(empty($section2))
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
            var minimumPdt = 4;
            var minimumBrands = 6;

            if(($("#select2").select2('data').length > minimumPdt) ||
                ($("#select3").select2('data').length  > minimumPdt) ||
                ($("#select4").select2('data').length > minimumPdt) ||
                ($("#select5").select2('data').length > minimumPdt) ||
                ($("#select6").select2('data').length > minimumPdt)){
                alert("Please select not more than " + minimumPdt + " products under each category");
                return false;
            }

            else if(($("#select2").select2('data').length < minimumPdt) || ($("#select3").select2('data').length < minimumPdt) || ($("#select4").select2('data').length < minimumPdt) || ($("#select5").select2('data').length < minimumPdt) || ($("#select6").select2('data').length < minimumPdt)) {
                alert("Please select " + minimumPdt + " products under each category");
                return false;
            }
            else if(($("#select1").select2('data').length > minimumBrands)){
                alert("Please select not more than " +  minimumBrands + " brands under each category");
                return false;
            }

            else if(($("#select1").select2('data').length < minimumBrands)) {
                alert("Please select " + minimumBrands + " brands under each category");
                return false;
            }



            else{

                return true;
            }
        })
    </script>
    <script>
        $('.subcategory').change(function () {
            $this =  $(this);
            $value = $this.val();
            $sibling = $this.parent().parent().next().children().find('.subcategoryList');


            if($value != ""){

                $.get('/backstore/getSubCategoryProducts/'+ $value, function (data) {
                    $this.parent().parent().next().children().find('.subcategoryList').val(null).trigger('change')

                    $this.parent().parent().next().children().find('.subcategoryList').html("");
                    console.log(data);
                    if(data.products.length > 0) {
                        jQuery.each(data.products, function (i, val) {
                            $this.parent().parent().next().children().find('.subcategoryList').append("<option value='" + val.id + "'>" + val.title + "</option>");
                            // $('#subcategory').append("<option value='" + val.id + "'>" + val.title + "</option>");

                        });
                    }


                });
            }

        });

        $('#category').change(function () {
           $this = $(this);
           $value = $this.val();

           if ($value != ""){
               $.get('/backstore/getCategoryDetails/'+ $value, function (data) {
                   $('.select2').val(null).trigger('change');

                   $('#select1').html("");
                   $('.subcategory').html('<option value="">-- Select a subcategory --</option>');

                   console.log(data);
                   if(data.brands.length > 0) {
                       jQuery.each(data.brands, function (i, val) {
                           $('#select1').append("<option value='" + val.id + "'>" + val.title + "</option>");
                           // $('#subcategory').append("<option value='" + val.id + "'>" + val.title + "</option>");

                       });
                   }

                   if(data.subcategories.length > 0) {
                       jQuery.each(data.subcategories, function (i, val) {
                           $('.subcategory').append("<option value='" + val.id + "'>" + val.title + "</option>");
                           // $('#subcategory').append("<option value='" + val.id + "'>" + val.title + "</option>");

                       });
                   }




               });
           }
        });
    </script>
@endsection
