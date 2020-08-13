@extends('layouts.admin-master')
@section('title', 'Add product')
@section('css')
<link href="{{asset('assets')}}/node_modules/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('assets')}}/node_modules/summernote/dist/summernote-bs4.css" rel="stylesheet" type="text/css" />
<link href="{{asset('assets')}}/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
<style type="text/css">
    @media screen and (min-width: 640px) {
        .divrigth_border::after {
            content: '';
            width: 0;
            height: 100%;
            margin: -1px 0px;
            position: absolute;
            top: 0;
            left: 100%;
            margin-left: 0px;
            border-right: 3px solid #e5e8ec;
        }
    }
    .dropify_image{
            position: absolute;top: -14px!important;left: 12px !important; z-index: 9; background:#fff!important;padding: 3px;
        }
    .dropify-wrapper{
        height: 100px !important;
    }
    .bootstrap-tagsinput{
            width: 100% !important;
            padding: 5px;
        }
    .closeBtn{position: absolute;right: 0;bottom: 10px;}
    form label{font-weight: 600;}

</style>
@endsection

@section('content')

    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Add New product</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
                                <li class="breadcrumb-item active">create</li>
                            </ol>
                        <a href="{{route('product.list')}}" class="btn btn-info btn-sm d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Product List</a>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->

            <div class="card">
                <div class="card-body">
                    <form action="{{route('product.store')}}" data-parsley-validate enctype="multipart/form-data" method="post" id="product">
                        @csrf

                        <div class="form-body">
                            <div class="title_head">
                                Product Information
                            </div>
                            <div class="row">
                                <div class="col-md-9 divrigth_border">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="required" for="title">Product Title</label>
                                                <input type="text" value="{{old('title')}}" name="title" required="" id="title" placeholder = 'Enter title' class="form-control" >
                                                @if ($errors->has('title'))
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $errors->first('title') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                        	<div class="form-group">
                                        		<label class="required" style="background: #fff;padding-bottom:0px;  top:-14px;z-index: 999" >Product Description</label>
	                                           <textarea name="description" class="summernote form-control">{{old('description')}}</textarea>
	                                       </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="required" for="category">Select category</label>
                                                <select required=""  onchange="get_subcategory(this.value)" name="category" id="category" class="form-control custom-select">
                                                   <option value="">Select category</option>
                                                   @foreach($categories as $category)
                                                   <option {{ (old('category') == $category->id ? 'selected' : '' ) }} value="{{$category->id}}">{{$category->name}}</option>
                                                   @endforeach
                                                </select>
                                                @if ($errors->has('category'))
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $errors->first('category') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="required" for="subcategory">Select subcategory</label>
                                                <select onchange="get_subchild_category(this.value)" required name="subcategory" id="subcategory" class="form-control custom-select">
                                                   <option value="">Select first category</option>
                                                </select>
                                                @if ($errors->has('subcategory'))
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $errors->first('subcategory') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="subchildcategory">Select Child Category</label>
                                                <select onchange="getAttributeByCategory(this.value, 'getAttributesByChildcategory')" name="childcategory"  id="subchildcategory" class="form-control custom-select">
                                                   <option value="">Select first sub category</option>
                                                  
                                                </select>
                                                @if ($errors->has('childcategory'))
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $errors->first('childcategory') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="required" for="purchase_price">Purchase Price</label>
                                                <input required type="text" value="{{old('purchase_price')}}"  name="purchase_price" id="purchase_price" placeholder = 'Enter purchase price' class="form-control" >
                                                @if ($errors->has('purchase_price'))
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $errors->first('purchase_price') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="required" for="selling_price">Selling Price</label>
                                                <input required type="text" value="{{old('selling_price')}}"  name="selling_price" id="selling_price" placeholder = 'Enter selling price' class="form-control" >
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="discount">Discount</label>
                                                <input type="text" value="{{old('discount')}}"  name="discount" id="discount" placeholder = 'Enter discount' class="form-control" >
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="checkbox2">
                                                    <input type="checkbox" id="productVariation" name="productVariation" value="1">
                                                    <label for="productVariation">Add Product Variant</label>
                                              </div>      
                                            </div> 
                                            <div id="productVariationField" style="display: none;">
                                                <div id="getAttributesByCategory"></div>
                                                <div id="getAttributesBySubcategory"></div>
                                                <div id="getAttributesByChildcategory"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="col-md-12">
                                                    <!-- Allow attribute checkbox button -->
                                                    <div class="form-group">
                                                        <div class="checkbox2">
                                                            <input type="checkbox" id="checkExtraAttribute" name="extraAttribute" value="1">
                                                            <label for="checkExtraAttribute">Add Additional Features</label>
                                                        </div>
                                                    </div>
                                                    <!--Value fields show & hide by allow checkbox -->
                                                    <div id="ExtraAttribute" style="display: none;">

                                                        <div class="row">
                                                            <div class="col-sm-6 nopadding">
                                                               <div class="form-group">
                                                                    <span>Name</span>
                                                                    <input type="text" class="form-control"  name="name[1]"  placeholder="Enter name">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-sm-5 nopadding">
                                                                <div class="form-group">
                                                                    <span>Value</span>
                                                                    <input type="text" class="form-control"  name="value[1]"  placeholder="Enter value">
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="col-1 nopadding" style="padding-top: 20px">
                                                                <button class="btn btn-success" type="button" onclick="extraAttribute_fields();"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                        <div id="extraAttribute_fields"></div>
                                                        <div class="row justify-content-md-center"><div class="col-md-4"> <span  style="cursor: pointer;" class="btn btn-info" onclick="extraAttribute_fields()"><i class="fa fa-plus"></i> Add More </span></div></div> <hr/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="checkbox2">
                                                    <input type="checkbox" id="checkSeo" name="secheck" value="1">
                                                    <label for="checkSeo">Allow Product SEO</label>
                                              </div>      
                                            </div> 
                                            <div  id="seoField" style="display: none;">  
                                                
                                                <div class="form-group">
                                                    <label class="required" for="meta_title">Meta Title</label>
                                                    <input type="text" value="{{old('meta_title')}}"  name="meta_title" id="meta_title" placeholder = 'Enter meta title'class="form-control" >
                                                </div>
                                                <div class="form-group">
                                                    <label class="required">Meta Keywords( <span style="font-size: 12px;color: #777;font-weight: initial;">Write meta tags Separated by Comma[,]</span> )</label>

                                                     <div class="tags-default">
                                                        <input  type="text" name="meta_keywords[]"  data-role="tagsinput" placeholder="Enter meta keywords" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="meta_description">Meta Description</label>
                                                    <textarea class="form-control" name="meta_description" id="meta_description" rows="2" style="resize: vertical;" placeholder="Enter Meta Description">{{old('meta_description')}}</textarea>
                                                </div>
                                         
                                            </div>
                                        </div>

                                     </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="required" for="stock">Product Stock</label>
                                                <input type="text" value="{{old('stock')}}"  name="stock" id="stock" placeholder = 'Example: 100'class="form-control" >
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="manufacture_date">Manufacture date(Mfd)</label>
                                                <input type="date" value="{{old('manufacture_date')}}" placeholder = 'Enter manufacture date' name="manufacture_date" id="manufacture_date" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="expired_date">Expired date(Exd)</label>
                                                <input type="date" value="{{old('expired_date')}}" placeholder = 'Enter expired date' name="expired_date" id="expired_date" class="form-control" >
                                            </div>
                                        </div>
                                       
                                        <div class="col-md-12" id="brand"></div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                
                                                <div class="checkbox2">
                                                  <input type="checkbox" id="ship_time" value="1"> 
                                                  <label for="ship_time">Allow Estimated Shipping Time</label>
                                                </div>
                                                          
                                            </div> 
                                            <div id="ship_time_display"  style="display: none;">
                                              <div class="form-group">
                                                  <input class="form-control" name="shipping_time" id="ship_time" placeholder="Estimated Shipping Time" value="" type="text">
                                              </div>
                                            </div>
                                        </div>
                                        
                                    	<div class="col-md-12">
                                            <div class="form-group"> 
                                                <label class="dropify_image required">Feature Image</label>
                                                <input type="file" class="dropify" accept="image/*" data-type='image' data-allowed-file-extensions="jpg png gif"  data-max-file-size="2M"  name="feature_image" id="input-file-events">
                                            </div>
                                            @if ($errors->has('feature_image'))
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $errors->first('feature_image') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group"> 
                                                <label class="dropify_image">Gallery Image</label>
                                                <input  type="file" multiple class="dropify" accept="image/*" data-type='image' data-allowed-file-extensions="jpg png gif"  data-max-file-size="2M"  name="gallery_image[]" id="input-file-events">
                                            </div>
                                            @if ($errors->has('gallery_image'))
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $errors->first('gallery_image') }}
                                                </span>
                                            @endif
                                        </div>
                                       
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                
                                                <label class="switch-box" style="top:-12px;">Status</label>
                                                
                                                    <div class="custom-control custom-switch">
                                                      <input name="status" {{ (old('status') == 'on') ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="status">
                                                      <label style="padding: 5px 12px" class="custom-control-label" for="status">Publish/Unpublish</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>

                        
                        </div><hr>
                        <div class="form-actions pull-right">
                            <button type="submit"  name="submit" value="save" class="btn btn-success"> <i class="fa fa-save"></i> Save Product </button>
                            
                            <button type="reset" class="btn waves-effect waves-light btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
               
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->


   
@endsection

@section('js')


   
    <script src="{{asset('assets')}}/node_modules/dropify/dist/js/dropify.min.js"></script>

    <script type="text/javascript">

        @if(old('category'))
            get_subcategory({{old('category')}});
        @endif

      
        function get_subcategory(id=''){
        	//get attribute by category
          	getAttributeByCategory(id, 'getAttributesByCategory');
          	//when main category change reset attribute fields
          	getAttributeByCategory('clear', 'getAttributesBySubcategory');
          	getAttributeByCategory('clear', 'getAttributesByChildcategory');
          	//get brand by subcategory
          	getBrand(id);

            var  url = '{{route("getSubCategory", ":id")}}';
            url = url.replace(':id',id);
            $.ajax({
                url:url,
                method:"get",
                success:function(data){
                    if(data){
                        $("#subcategory").html(data);
                        $("#subcategory").focus();
                        
                    }else{
                        $("#subcategory").html('<option value="">subcategory not found</option>');
                    }
                }
            });
        }        
        @if(old('subcategory'))
            get_subchild_category({{old('subcategory')}});
        @endif
        function get_subchild_category(id=''){
        	//get attribute by sub category 
        	getAttributeByCategory(id, 'getAttributesBySubcategory');
        	//when main category change reset attribute fields
        	getAttributeByCategory('clear', 'getAttributesByChildcategory');
        	//get brand
        	getBrand(id);

            var  url = '{{route("getSubChildCategory", ":id")}}';
            url = url.replace(':id',id);
            $.ajax({
                url:url,
                method:"get",
                success:function(data){
                    if(data){
                        $("#subchildcategory").html(data);
                        $("#subchildcategory").focus();
                    }else{
                        $("#subchildcategory").html('<option value="">Childcategory not found</option>');
                    }
                }
            });
        }  

        // get Attribute by Category 
        function getAttributeByCategory(id, category){

            var  url = '{{route("getAttributeByCategory", ":id")}}';
            url = url.replace(':id',id);
            $.ajax({
                url:url,
                method:"get",
                success:function(data){
                	
                    if(data){
                        $("#"+category).html(data);
                    }else{
                        $("#"+category).html('');
                    }
                }
            });
        }           

        // get Attribute by Category 
        function getBrand(id){

            var  url = '{{route("getBrand", ":id")}}';
            url = url.replace(':id',id);
            $.ajax({
                url:url,
                method:"get",
                success:function(data){
                	
                    if(data){
                        $("#brand").html(data);
                    }else{
                        $("#brand").html('');
                    }
                }
            });
        }       

   
    </script>

    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

    });

    $("#ship_time").change(function() {
	    if(this.checked) { $("#ship_time_display").show(); }
	    else { $("#ship_time_display").hide(); }
	});    

	$("#checkSeo").change(function() {
	    if(this.checked) { $("#seoField").show(); }
	    else { $("#seoField").hide(); }
	});    

    $("#productVariation").change(function() {
        if(this.checked) { $("#productVariationField").show(); }
        else { $("#productVariationField").hide(); }
    });
    </script>

        <script type="text/javascript">


    var extraAttribute = 1;
    //add dynamic attribute value fields by attribute
    function extraAttribute_fields() {

        extraAttribute++;
        var objTo = document.getElementById('extraAttribute_fields')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + extraAttribute);
        var rdiv = 'removeclass' + extraAttribute;
        divtest.innerHTML = '<div class="row"> <div class="col-sm-6 nopadding"> <div class="form-group"><input type="text" class="form-control" name="name['+extraAttribute+']"  placeholder="Enter name"></div></div> <div class="col-sm-5 nopadding"> <div class="form-group"><input type="text" class="form-control" name="value['+extraAttribute+']"  placeholder="Enter value"></div></div> <div class="col-1"><button class="btn btn-danger" type="button" onclick="remove_extraAttribute_fields(' + extraAttribute + ');"><i class="fa fa-times"></i></button></div></div>';

        objTo.appendChild(divtest)
    }
    //remove dynamic extra field
    function remove_extraAttribute_fields(rid) {
        $('.removeclass' + rid).remove();
    }

    //Allow checkbox check/uncheck handle
    $("#checkExtraAttribute").change(function() {

        if(this.checked) {
            $("#ExtraAttribute").show();
        }
        else
        {
            $("#ExtraAttribute").hide();

        }
    });

    </script>
   
   <script src="{{asset('assets')}}/node_modules/summernote/dist/summernote-bs4.min.js"></script>
    <script>
    $(function() {

        $('.summernote').summernote({
            height: 200, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }

    </script>
    <script src="{{asset('assets')}}/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript">
    // Enter form submit preventDefault for tags
    $(document).on('keyup keypress', 'form input[type="text"]', function(e) {
      if(e.keyCode == 13) {
        e.preventDefault();
        return false;
      }
    });
    </script>
 
@endsection

