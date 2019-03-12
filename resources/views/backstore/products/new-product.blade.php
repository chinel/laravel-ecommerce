@extends('backstore.layouts.master')

@section('link')
    <!-- bootstrap wysihtml5 - text editor -->
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
    <link rel="stylesheet" href="{{url('admin/css/fileUpload.css')}}">
    <link rel="stylesheet" href="{{url('admin/css/custom.css')}}">

@endsection

@section('header-title')
    New Product
@endsection

@section('page-title')
    New Product
@endsection

@section('breadcrumb')
    <a href="/backstore/products">Products</a> / New Product
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

    <form role="form" id="product" name="new-product" method="post" enctype="multipart/form-data" action="{{url('/backstore/addproduct')}}">
        @csrf
          <div class="row">
              <div class="col-8">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Product Details</h3>

                          <!-- <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                              <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                              <i class="fa fa-times"></i></button>
                          </div> -->
                      </div>
                      <!-- form start -->

                      <div class="card-body">

                          <div class="form-group">
                              <div class="card card-info">
                                  <label><div class="card-header"><h3 class="card-title">
                                              Product Name
                                          </h3> </div></label>
                                  <div class="card-body pad">
                                      <input type="text" class="form-control" placeholder="Enter product name ..." name="title" required>
                                  </div>
                              </div>
                          </div>

                          <div class="card card-info">

                              <div class="card-header">
                                  <h3 class="card-title">
                                      Product Details - Overview
                                  </h3>
                                  <!-- tools box -->
                                  <!-- <div class="card-tools">
                                    <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
                                            title="Collapse">
                                      <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip"
                                            title="Remove">
                                      <i class="fa fa-times"></i></button>
                                  </div> -->
                                  <!-- /. tools -->
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body pad">
                                  <div class="mb-3">
                     <textarea class="textarea form-control" placeholder="Place some text here"
                               style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="overview" required id="pdtOverview"></textarea>
                                  </div>
                              </div>
                          </div>
                          <div class="card card-info">

                              <div class="card-header">
                                  <h3 class="card-title">
                                      Product Details - Full Description
                                  </h3>
                                  <!-- tools box -->
                                  <!-- <div class="card-tools">
                                    <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
                                            title="Collapse">
                                      <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool btn-sm" data-widget="remove" data-toggle="tooltip"
                                            title="Remove">
                                      <i class="fa fa-times"></i></button>
                                  </div> -->
                                  <!-- /. tools -->
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body pad">
                                  <div class="mb-3">
                     <textarea class="textarea form-control" placeholder="Place some text here"
                               style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description" required id="pdtDescription"></textarea>
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

                                      <div class="form-group col-md-6">
                                          <label for="">Price Type</label>
                                          <select name="price_type" id="priceType" class="form-control" required>
                                              <option value="">-- Select price type --</option>
                                              <option value="fixed">Fixed</option>
                                              <option value="flexible">Flexible</option>
                                          </select>
                                      </div>
                                      <div class="form-group col-md-6" id="sellingPrice">

                                      </div>
                                  </div>

                              </div>

                          </div>
                          <div class="card card-info">
                              <div class="card-header">
                                  <h3 class="card-title">
                                      Brand
                                  </h3>
                              </div>
                              <div class="card-body pad">
                                  <div class="row">

                                      <div class="form-group col-md-6">
                                          <label for="">Brand</label>
                                          <select name="brand" class="form-control"
                                                  style="width: 100%;">
                                              <option value="">Select..</option>
                                              @foreach($brands as $brand)
                                                  <option value="{{$brand['id']}}">{{$brand['title']}}</option>
                                              @endforeach

                                          </select>
                                      </div>

                                  </div>

                              </div>

                          </div>

                          <div class="card card-info">
                              <div class="card-header">
                                  <h3 class="card-title">
                                      Product Variations
                                  </h3>
                              </div>
                              <div class="card-body pad">
                                  <div id="variationWrapper">
                                      <div class="row mt-4" style="border: 1px solid #b7b5b5;padding: 20px; margin-bottom: 20px;">
                                          <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Name</label>
                                                  <input type="text" name="type[]" class="form-control" placeholder="Eg Size">
                                              </div>

                                          </div>
                                          <div class="col-md-6">
                                              <label for="">Sub Types(comma separated)</label>
                                              <input type="text" name="subtypes[]" class="form-control" placeholder="Eg Large,Small,Medium">
                                          </div>
                                      </div>



                                  </div>
                                  <div class="row">
                                      <a  class="btn btn-outline-primary btn-sm" id="addTypes"><i class="fa fa-plus "></i> Add Another</a>

                                  </div>
                              </div>

                          </div>
                      </div>
                      <!-- /.col-->

                  </div>
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer-->
              <!-- /.card -->

              <div class="col-md-4">
                  <div class="card card-info">
                      <div class="form-group">
                          <div class="card-header">
                              <h3 class="card-title">Product Category  </h3>
                          </div>
                          <div class="card-body pad">
                              <select name="category" class="form-control"
                                      style="width: 100%;" required id="categoryList">
                                  <option value="">Select..</option>
                                  @foreach($categories as $value)
                                      <option value="{{$value['id']}}">{{$value['title']}}</option>
                                  @endforeach

                              </select>
                          </div>
                      </div>
                  </div>


                  <div class="card card-info">
                      <div class="form-group">
                          <div class="card-header">
                              <h3 class="card-title">Product Sub Category  </h3>
                          </div>
                          <div class="card-body pad">
                              <select name="subcategory" class="form-control"
                                      style="width: 100%;" required id="subcategory">

                              </select>
                          </div>
                      </div>
                  </div>





                  <div class="card card-info">
                      <div class="form-group">
                          <div class="card-header">
                              <h3 class="card-title">Product Cover Image</h3>
                          </div>
                          <div class="card-body pad">
                              <div class="col-xs-12">
                                  <div class="wrap-custom-file">
                                      <input type="file" name="cover_image" id="image4" class="imageFile" accept=".gif, .jpg, .png" required />
                                      <label  for="image4">
                                          <span>Select Cover Image</span>
                                          <i class="fa fa-plus-circle"></i>
                                      </label>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>

                  <div class="card card-info">
                      <div class="form-group">
                          <div class="card-header">
                              <h3 class="card-title">Other Image</h3>
                          </div>
                          <div class="card-body pad">
                              <div class="row">
                                  <div class="col-xs-12">
                                      <div class="wrap-custom-file">
                                          <input type="file" name="other_image1" id="image1" class="imageFile" accept=".gif, .jpg, .png" />
                                          <label  for="image1">
                                              <span>Select Image One</span>
                                              <i class="fa fa-plus-circle"></i>
                                          </label>
                                      </div>
                                  </div>
                                  <div class="col-xs-12">
                                      <div class="wrap-custom-file">
                                          <input type="file" name="other_image2" id="image2" class="imageFile" accept=".gif, .jpg, .png" />
                                          <label  for="image2">
                                              <span>Select Image Two</span>
                                              <i class="fa fa-plus-circle"></i>
                                          </label>
                                      </div>
                                  </div>
                                  <div class="col-xs-12">
                                      <div class="wrap-custom-file">
                                          <input type="file" name="other_image3" id="image3" class="imageFile" accept=".gif, .jpg, .png" />
                                          <label  for="image3">
                                              <span>Select Image Three</span>
                                              <i class="fa fa-plus-circle"></i>
                                          </label>
                                      </div>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
                  <div>
                      <button type="submit" class="btn btn-info btn-flat btn-lg">Publish</button>
                  </div>
              </div>
          </div>
 </form>

</div>
@endsection

@section('scripts')
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
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
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'pdtOverview',{
        removeButtons: 'Image'
    } );

    CKEDITOR.replace( 'pdtDescription',{
        removeButtons: 'Image'
    } );
</script>

<script>
    $(document).ready(function () {

        $('#categoryList').change(function () {

            $this = $(this);
            $value = $this.val();
            if($value != ""){
                $('#subcategory').html("<option value=''>Please wait...</option>");
                $.get('/backstore/subCategories/'+ $value, function (data) {

                    $('#subcategory').html("");

                     console.log(data);
                     if(data.subcategories.length > 0) {
                         jQuery.each(data.subcategories, function (i, val) {

                             $('#subcategory').append("<option value='" + val.id + "'>" + val.title + "</option>");

                         });
                     }else{
                         $('#subcategory').html("<option value=''>No Categories added yet</option>");
                     }


                });
            }else{
                $('#subcategory').html("<option value=''></option>");
            }
        })


       $('#priceType').change(function () {
         $this = $(this);
         $priceTypeValue =  $this.val();
         if($priceTypeValue == 'fixed'){
             $('#sellingPrice').html('' +
                 '<label for="">Selling Price</label>\n' +
                 '                   <div class="input-group">\n' +
                 '\n' +
                 '                       <div class="input-group-prepend">\n' +
                 '                           <span class="input-group-text">₦</span>\n' +
                 '                       </div>\n' +
                 '                       <input type="number" min="0" class="form-control" name="selling_price" required>\n' +
                 '\n' +
                 '                   </div>');
         }else{
             $('#sellingPrice').html('');
         }
       });


        $('#addTypes').click(function () {
            $('#variationWrapper').append('' +
                '<div class="row mt-4">\n' +
                '                                          <div class="col-md-11" style="border: 1px solid #b7b5b5;padding: 20px; margin-bottom: 20px;">\n' +
                '                                              <div class="row">\n' +
                '                                                  <div class="col-md-6">\n' +
                '                                                      <div class="form-group">\n' +
                '                                                          <label>Name</label>\n' +
                '                                                          <input type="text" name="type[]" class="form-control" placeholder="Eg Size">\n' +
                '                                                      </div>\n' +
                '\n' +
                '                                                  </div>\n' +
                '                                                  <div class="col-md-6">\n' +
                '                                                      <label for="">Sub Types(comma separated)</label>\n' +
                '                                                      <input type="text" name="subtypes[]" class="form-control" placeholder="Eg Large,Small,Medium">\n' +
                '                                                  </div>\n' +
                '                                              </div>\n' +
                '                                          </div>\n' +
                '                                          <div class="col-md-1">\n' +
                '                                              <a onclick="removeType(this)" class="col-md-2" id="removeBtn"><i class="fa fa-remove"></i></a>\n' +
                '\n' +
                '                                          </div>\n' +
                '                                      </div>');
        });
    });
</script>

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
                    .css('background-image', 'url(' + tmppath + ')');
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
  function removeType(element) {
      element.parentNode.parentNode.remove();
  }
</script>

@endsection
