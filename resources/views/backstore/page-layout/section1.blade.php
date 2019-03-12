@extends('backstore.layouts.master')
@section('link')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/fileUpload.css')}}">


@endsection
@section('header-title')
    Home Section 1
@endsection

@section('page-title')
    Home Section 1
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
            <h3 class="card-title"><?php echo (empty($section1)) ? "Add" : 'Edit';?>  Home Section 1</h3>
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
                    <form action="{{url('/backstore/addSection1')}}" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" required name="title" @if(!empty($section1)) value="{{$section1->title}}" @endif>
                                </div>


                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select a Category</label>
                                    <select name="subcategory1" class="form-control subcategory"
                                            style="width: 100%;" required>
                                        <option value="">-- Select a category --</option>
                                        @foreach($categories as $availableCategory)
                                            <option @if(!empty($section1)) @if($section1->category1 == $availableCategory->id ) selected @endif @endif value="{{$availableCategory->id}}" >{{$availableCategory->title}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Products <small>(4 products)</small></label>
                                    @if(!empty($section1))

                                      <?php $products1 = $section1->getProductsWithCategory($section1->category1);?>

                                          <select name="subcategory1_childlist[]" class="form-control select1 subcategoryList" multiple="multiple" data-placeholder="Select..."
                                                  style="width: 100%;" required>
                                          @foreach($products1 as $value1)
                                                  <option @if (in_array($value1->id, comma_separated_to_array($section1->productlist1, ","))) selected @endif value="{{$value1->id}}">{{$value1->title}}</option>
                                           @endforeach
                                          </select>

                                        @else
                                        <select name="subcategory1_childlist[]" class="form-control select1 subcategoryList" multiple="multiple" data-placeholder="Select..."
                                                style="width: 100%;" required>
                                        </select>
                                    @endif


                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select a Category</label>
                                    <select name="subcategory2" class="form-control subcategory"
                                            style="width: 100%;" required>
                                        <option value="">-- Select a category --</option>
                                        @foreach($categories as $availableCategory)
                                            <option  @if(!empty($section1)) @if($section1->category2 == $availableCategory->id ) selected @endif @endif value="{{$availableCategory->id}}" >{{$availableCategory->title}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Products <small>(4 products)</small></label>

                                    @if(!empty($section1))

                                        <?php $products2 = $section1->getProductsWithCategory($section1->category2);?>

                                            <select name="subcategory2_childlist[]" class="form-control select2A subcategoryList" multiple="multiple" data-placeholder="Select..."
                                                    style="width: 100%;" required>
                                            @foreach($products2 as $value1)
                                                <option @if (in_array($value1->id, comma_separated_to_array($section1->productlist2, ","))) selected @endif value="{{$value1->id}}">{{$value1->title}}</option>
                                            @endforeach
                                        </select>

                                    @else
                                        <select name="subcategory2_childlist[]" class="form-control select2A subcategoryList" multiple="multiple" data-placeholder="Select..."
                                                style="width: 100%;" required>

                                        </select>
                                    @endif


                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select a Category</label>
                                    <select name="subcategory3" class="form-control subcategory"
                                            style="width: 100%;" required>
                                        <option value="">-- Select a category --</option>
                                        @foreach($categories as $availableCategory)
                                            <option  @if(!empty($section1)) @if($section1->category3 == $availableCategory->id ) selected @endif @endif value="{{$availableCategory->id}}" >{{$availableCategory->title}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Products <small>(4 products)</small></label>
                                    @if(!empty($section1))

                                        <?php $products3 = $section1->getProductsWithCategory($section1->category3);?>

                                            <select name="subcategory3_childlist[]" class="form-control select3 subcategoryList" multiple="multiple" data-placeholder="Select..."
                                                    style="width: 100%;" required>
                                            @foreach($products3 as $value1)
                                                <option @if (in_array($value1->id, comma_separated_to_array($section1->productlist3, ","))) selected @endif value="{{$value1->id}}">{{$value1->title}}</option>
                                            @endforeach
                                        </select>

                                    @else
                                        <select name="subcategory3_childlist[]" class="form-control select3 subcategoryList" multiple="multiple" data-placeholder="Select..."
                                                style="width: 100%;" required>

                                        </select>
                                    @endif


                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select a Category</label>
                                    <select name="subcategory4" class="form-control subcategory"
                                            style="width: 100%;" required>
                                        <option value="">-- Select a category --</option>
                                        @foreach($categories as $availableCategory)
                                            <option  @if(!empty($section1)) @if($section1->category4 == $availableCategory->id ) selected @endif @endif value="{{$availableCategory->id}}">{{$availableCategory->title}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Products <small>(4 products)</small></label>
                                    @if(!empty($section1))

                                        <?php $products4 = $section1->getProductsWithCategory($section1->category4);?>

                                            <select name="subcategory4_childlist[]" class="form-control select4 subcategoryList" multiple="multiple" data-placeholder="Select..."
                                                    style="width: 100%;" required>
                                            @foreach($products4 as $value1)
                                                <option @if (in_array($value1->id, comma_separated_to_array($section1->productlist4, ","))) selected @endif value="{{$value1->id}}">{{$value1->title}}</option>
                                            @endforeach
                                        </select>

                                    @else
                                        <select name="subcategory4_childlist[]" class="form-control select4 subcategoryList" multiple="multiple" data-placeholder="Select..."
                                                style="width: 100%;" required>

                                        </select>
                                    @endif


                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select a Category</label>
                                    <select name="subcategory5" class="form-control subcategory"
                                            style="width: 100%;" required>
                                        <option value="">-- Select a category --</option>
                                        @foreach($categories as $availableCategory)
                                            <option  @if(!empty($section1)) @if($section1->category5 == $availableCategory->id ) selected @endif @endif value="{{$availableCategory->id}}" >{{$availableCategory->title}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Products <small>(4 products)</small></label>
                                    @if(!empty($section1))

                                        <?php $products5 = $section1->getProductsWithCategory($section1->category5);?>

                                            <select name="subcategory5_childlist[]" class="form-control select5 subcategoryList" multiple="multiple" data-placeholder="Select..."
                                                    style="width: 100%;" required>
                                            @foreach($products5 as $value1)
                                                <option @if (in_array($value1->id, comma_separated_to_array($section1->productlist5, ","))) selected @endif value="{{$value1->id}}">{{$value1->title}}</option>
                                            @endforeach
                                        </select>

                                    @else
                                        <select name="subcategory5_childlist[]" class="form-control select5 subcategoryList" multiple="multiple" data-placeholder="Select..."
                                                style="width: 100%;" required>

                                        </select>
                                    @endif


                                </div>
                            </div>
                        </div>

                        @if(\Auth::user()->role_id != 3)
                        <div class="row">
                            <div class="col-md-12">
                                @if(empty($section1))
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
        $(function () {
            //Initialize Select2 Elements
            $('.select1, .select2A, .select3, .select4, .select5').select2();


        })
    </script>
    <script>
        $('.subcategory').change(function () {
            $this =  $(this);
            $value = $this.val();
            $sibling = $this.parent().parent().next().children().find('.subcategoryList');

            if ($value != ""){
                $this.parent().parent().next().children().find('.subcategoryList').html("<option value='cool'>Please wait ...</option>");
            }

            if($value != ""){

                $.get('/backstore/getCategoryProducts/'+ $value, function (data) {
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
        $('form').on('submit', function(){
            var minimum = 4;

            if(($(".select1").select2('data').length > minimum) ||
                ($(".select2A").select2('data').length  > minimum) ||
                ($(".select3").select2('data').length > minimum) ||
                ($(".select4").select2('data').length > minimum) ||
                ($(".select5").select2('data').length > minimum)){
                alert('Please select not more than 4 products under each category');
                return false;
            }

            else if(($(".select1").select2('data').length < minimum) || ($(".select2A").select2('data').length < minimum) || ($(".select3").select2('data').length < minimum) || ($(".select4").select2('data').length < minimum) || ($(".select5").select2('data').length < minimum)) {
                alert('Please select 4 products under each category');
                return false;
            }else{

                return true;
            }
        })
    </script>
@endsection
