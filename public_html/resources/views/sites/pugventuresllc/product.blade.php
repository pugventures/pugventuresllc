<!-- Stored in resources/views/child.blade.php -->

@extends('sites.pugventuresllc.master')

@section('content')
<div class="row">
    <div class="col-sm">
        <h1>@if(empty($data['product'])) Add New Product @else {{ ucwords($product -> title) }} @endif</h1>
    </div>
</div>

<form>

    <div class="row">
        <div class="col-sm text-right">
            <input type="button" class="btn btn-orange" value="Save Product"/>
        </div>
    </div>

    &nbsp;

    <div class="row">
        <div class="col-sm-8">
            <div class="card card-body">
                <div class='form-group'>
                    <label class='form-control-label'>Title <span class='tx-danger'>*</span></label>
                    <input class="form-control" id="productTitle" type="text" name="title">
                </div>

                <div class='form-group'>
                    <label class='form-control-label'>Description <span class='tx-danger'>*</span></label>
                    <div id="summernote" name="description"></div>
                </div>

                <div class='form-group'>
                    <label class='form-control-label'>SKU <span class='tx-danger'>*</span></label>
                    <input class="form-control" type="text" name="sku">
                </div>
            </div>

            &nbsp;

            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Images</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div id="productimagedropzone" class="dropzone"></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-4">
            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Pricing</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class='form-group'>
                            <label class='form-control-label'>Default Price</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="tx-16 lh-0 op-6 fas fa-dollar-sign"></i></span>
                                <input type="text" class="form-control" name="price">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class='form-group'>
                            <label class='form-control-label'>Compare @ Price</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="tx-16 lh-0 op-6 fas fa-dollar-sign"></i></span>
                                <input type="text" class="form-control" name="comparePrice">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            &nbsp;

            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Ebay Category</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class='form-group'>
                            <button type="button" id="getEbayCategorySuggestionsBtn" class="btn btn-primary btn-block" disabled>Get Category Suggestions</button>
                            
                            <div id="ebayCategorySuggestionsWrapper"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

<script type="text/javascript">

    $('#summernote').summernote({
        height: 200,
        tooltip: false
    });

    Dropzone.options.productimagedropzone = {
        url: "imageupload",
        paramName: "file", // The name that will be used to transfer the files
        maxFilesize: 2, // MB
        accept: function (file, done) {
            //console.log(file);
            done();
        }
    };

    Dropzone.options.variantimagedropzone = {
        url: "imageupload",
        paramName: "file", // The name that will be used to transfer the files
        maxFilesize: 2, // MB
        accept: function (file, done) {
            console.log(file);
            done();
        }
    };

    $("#productTitle").bind('keyup', function () {
        if ($("#productTitle").val().length > 3) {
            $("#getEbayCategorySuggestionsBtn").removeAttr('disabled');
        } else {
            $("#getEbayCategorySuggestionsBtn").attr('disabled', 'true');
        }
    });

    $("#getEbayCategorySuggestionsBtn").bind('click', function () {
        var url = 'http://localhost/dev.pugventuresllc.com/public_html/public/ebay/categorySuggestions';
        var data = {title: $('#productTitle').val()};

        $("#getEbayCategorySuggestionsBtn").attr('disabled', 'true').html("Working...");
        $("#ebayCategorySuggestionsWrapper").html("");

        $.ajax({
            url: url,
            data: data,
            success: function (response) {
                response = $.parseJSON(response);

                for(var i = 0; i < response.categorySuggestions.length; i++) {
                    $("#ebayCategorySuggestionsWrapper").append('<div class="input-group"><label class="rdiobox"><input name="ebayCategory" type="radio" value="' +  + response.categorySuggestions[i].category.categoryId + '"><span>' + response.categorySuggestions[i].category.categoryName + '</span></label></div>');
                    console.log(response.categorySuggestions[i]);
                }
                
                // Reset the button
                $("#getEbayCategorySuggestionsBtn").removeAttr('disabled').html("Get Category Suggestions");
            }
        });
    });
</script>
@endsection