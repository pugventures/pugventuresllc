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

                <div class='form-group'>
                    <label class='form-control-label'>UPC <span class='tx-danger'>*</span></label>
                    <input class="form-control" type="text" name="upc">
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

            &nbsp;

            <div id="ebayCategoryItemAspectsWrapper" class="card card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Ebay Category Item Aspects</h5>
                    </div>
                </div>

                <div class="row">
                    <div id="itemAspectsWrapper" class="col-sm-12"></div>
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
                getEbayCategorySuggestions($.parseJSON(response));

                // Bind click event to the newly created category suggestions
                $(".ebayCategoryRadio").bind('click', function () {
                    getEbayCategoryItemAspects($(this).val());
                });

                // Reset the button
                $("#getEbayCategorySuggestionsBtn").removeAttr('disabled').html("Get Category Suggestions");
            }
        });
    });

    function getEbayCategorySuggestions(response) {
        for (var i = 0; i < response.categorySuggestions.length; i++) {
            var categoryId = response.categorySuggestions[i].category.categoryId;
            var categoryName = response.categorySuggestions[i].category.categoryName;
            var categoryAncestors = response.categorySuggestions[i].categoryTreeNodeAncestors;
            var categoryAncestorString = '';

            for (var j = 0; j < categoryAncestors.length; j++) {
                // Title Examples: 
                // Blue Ceramic Cylinder Pottery Vase, Indigo, Hand Painted, Fair Trade, New
                // Elegant Moments Lingerie, Bra w/ Silver Lace Cups, Matching Garters, G-String
                categoryAncestorString = categoryAncestorString + categoryAncestors[j].categoryName + "</a> > ";
            }

            var categoryBreadcrumb = categoryAncestorString + "<strong>" + categoryName + "</strong>";
            var item = '<div class="input-group"><label class="rdiobox"><input class="ebayCategoryRadio" name="ebayCategory" type="radio" value="' + +categoryId + '"><span>' + categoryBreadcrumb + '</span></label></div>';

            $("#ebayCategorySuggestionsWrapper").append(item);
        }
    }

    function getEbayCategoryItemAspects(categoryId) {
        $('#itemAspectsWrapper').html('<button type="button" class="btn btn-warning btn-block" disabled>Working...</button>');
        $('#ebayCategoryItemAspectsWrapper').show();

        var url = 'http://localhost/dev.pugventuresllc.com/public_html/public/ebay/categoryItemAspects';
        var data = {categoryId: categoryId};

        $.ajax({
            url: url,
            data: data,
            success: function (response) {
                response = $.parseJSON(response);
                console.log(response);

                var itemAspectsHtml = "<div class='card card-body'>";

                for (var i = 0; i < response.aspects.length; i++) {
                    itemAspectsHtml = itemAspectsHtml + "<div class='form-group'><label class='form-control-label'>" + response.aspects[i].localizedAspectName + setRequired(response.aspects[i]) + "</label>" + setInput(response.aspects[i]) + "</div>";
                }

                itemAspectsHtml = itemAspectsHtml + "</div>";

                $('#itemAspectsWrapper').html(itemAspectsHtml);
            }
        });
    }

    function setRequired(aspect) {
        if (aspect.aspectConstraint.aspectRequired) {
            return " <span class='tx-danger'>*</span>";
        } else {
            return '';
        }
    }

    function setInput(aspect) {
        var fieldName = aspect.localizedAspectName.replace(/\//g, "_").replace(/ /g, "_").toLowerCase();

        if (aspect.aspectValues) {
            var selections = '<select class="form-control select2"><option>&nbsp;</option>';

            for (var i = 0; i < aspect.aspectValues.length; i++) {
                var aspectValue = aspect.aspectValues[i].localizedValue.replace(/\//g, "_").replace(/ /g, "_").replace(/'/g, "").toLowerCase();

                selections = selections + "<option value='" + aspectValue + "'>" + aspect.aspectValues[i].localizedValue + "</option>";
            }

            return selections + "</select>";
        } else {
            return "<input class='form-control' type='text' name='[categoryAspect][" + fieldName + "]'>";
        }
    }
</script>
@endsection