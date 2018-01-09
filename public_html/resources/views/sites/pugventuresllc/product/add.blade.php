<!-- Stored in resources/views/child.blade.php -->

@extends('sites.pugventuresllc.master')

@section('content')

<form action="{{ url('/product/submit') }}" method="POST">
    {{ csrf_field() }}

    <div class="row">
        <div class="col-sm-6">
            <h1>Add New Product</h1>
        </div>


        <div class="col-sm-6 text-right">
            <input type="submit" class="btn btn-orange" value="Save Product"/>
        </div>
    </div>

    &nbsp;

    @if ($errors->any())
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-sm-8">
            <div class="card card-body">
                <div class='form-group'>
                    <label class='form-control-label'>Title <span class='tx-danger'>*</span></label>
                    <input class="form-control" id="productTitle" type="text" name="title">
                    <span id="title-characters-wrapper"><span id="title-characters-left">80</span> character(s) left</span>
                </div>

                <div class='form-group'>
                    <label class='form-control-label'>Description <span class='tx-danger'>*</span></label>
                    <div id="summernote" name="description"></div>
                </div>

                <div class='form-group'>
                    <label class='form-control-label'>UPC <span class='tx-danger'>*</span></label>
                    <input class="form-control" type="text" name="upc">
                </div>

                <div class='form-group'>
                    <label class='form-control-label'>Purchase URL <span class='tx-danger'>*</span></label>
                    <input class="form-control" type="text" name="purchase_url">
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
                            <label class='form-control-label'>Item Cost <span class='tx-danger'>*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="tx-16 lh-0 op-6 fas fa-dollar-sign"></i></span>
                                <input type="text" id="itemCost" class="form-control" name="itemCost">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class='form-group'>
                            <label class='form-control-label'>Shipping</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="tx-16 lh-0 op-6 fas fa-dollar-sign"></i></span>
                                <input type="text" id="shippingCost" class="form-control" name="shippingCost">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class='form-group'>
                            <label class='form-control-label'>Dropship Fee</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="tx-16 lh-0 op-6 fas fa-dollar-sign"></i></span>
                                <input type="text" id="dropshipCost" class="form-control" name="dropshipCost">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class='form-group'>
                            <label class='form-control-label'>Calculate Total & Profit</label>
                            <div class="input-group">
                                <button id="calculateCostBtn" type="button" class="btn btn-primary btn-block">Calculate</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div id="price-wrapper">
                            <table class="table">
                                <tbody>
                                    <tr><td><strong>Listing Total</strong></td><td style="text-align: right">$<span id="priceListingTotal">0.00</span></td></tr>
                                    <tr><td><strong>Ebay Fees</strong></td><td style="text-align: right">$<span id="priceEbayFees">0.00</span></td></tr>
                                    <tr><td><strong>Paypal Fees</strong></td><td style="text-align: right">$<span id="pricePaypalFees">0.00</span></td></tr>
                                    <tr><td>&nbsp;</td><td><hr/></td></tr>
                                    <tr><td><strong>Profit</strong></td><td style="text-align: right">$<span id="priceProfit">0.00</span></td></tr>
                                </tbody>
                            </table>
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

            &nbsp;

            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Variations</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#variationModal">Create Variation</button>
                    </div>
                </div>
            </div>

            &nbsp;

            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h5>Size & Weight</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12"><label class='form-control-label'>Dimensions</label></div>
                    <div class="col-sm-4">
                        <div class='form-group'>
                            <input class="form-control" type="text" name="length" placeholder="length">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class='form-group'>
                            <input class="form-control" type="text" name="width" placeholder="width">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class='form-group'>
                            <input class="form-control" type="text" name="depth" placeholder="depth">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12"><label class='form-control-label'>Weight</label></div>
                    <div class="col-sm-4">
                        <div class='form-group'>
                            <input class="form-control" type="text" name="lbs" placeholder="lbs">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class='form-group'>
                            <input class="form-control" type="text" name="ozs" placeholder="oz">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="variationModal" tabindex="-1" role="dialog" aria-labelledby="variationModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Variation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class='form-group'>
                                    <label class='form-control-label'>Variation Price</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="tx-16 lh-0 op-6 fas fa-dollar-sign"></i></span>
                                        <input type="text" class="form-control" name="variation_price">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    &nbsp;

                    <div class="card card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Variation Attributes</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div id="variationAttributesWrapper" class="accordion" role="tablist" aria-multiselectable="true">

                                    @foreach($variationAttributes as $attribute)
                                    <div class="card">
                                        <div class="card-header" role="tab" id="tab_{{ strtolower($attribute->name) }}">
                                            <h6 class="mg-b-0">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{ strtolower($attribute->name) }}"
                                                   aria-expanded="false" aria-controls="collapse_{{ strtolower($attribute->name) }}" class="tx-gray-800 transition collapsed">
                                                    {{ $attribute->name }}
                                                </a>
                                            </h6>
                                        </div><!-- card-header -->

                                        <div id="collapse_{{ strtolower($attribute->name) }}" class="collapse" role="tabpanel" aria-labelledby="tab_{{ strtolower($attribute->name) }}">
                                            <div class="card-block">
                                                @foreach($attribute->variationAttributeOptions as $option)
                                                <button type="button" class="variationAttributeOptionBtn btn btn-default" data-option-id="{{ $option->id }}">{{ $option->name }}</button>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>

                    &nbsp;

                    <div class="card card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Variation Images</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div id="variationimagedropzone" class="dropzone"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Variation</button>
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
            done();
        }
    };

    Dropzone.options.variationimagedropzone = {
        url: "imageupload",
        paramName: "file", // The name that will be used to transfer the files
        maxFilesize: 2, // MB
        accept: function (file, done) {
            done();
        }
    };

    $("#productTitle").bind('keyup', function () {
        var maxLength = 80;
        var length = $("#productTitle").val().length;
        $('#title-characters-left').text(maxLength - length);

        if (length > 3) {
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
        $('#itemAspectsWrapper').html('<button type="button" class="btn btn-warning btn-block" disabled>Working...</button>');
        $('#ebayCategoryItemAspectsWrapper').hide();

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

    $(".variationAttributeOptionBtn").bind('click', function () {
        if ($(this).hasClass("btn-default")) {
            // Turn Off
            $(this).removeClass("btn-default");
            $(this).addClass("btn-success");
        } else {
            // Turn On
            $(this).addClass("btn-default");
            $(this).removeClass("btn-success");
        }
    });

    $('#calculateCostBtn').bind('click', function () {
        var itemCost = parseFloat($('#itemCost').val());
        var shippingCost = parseFloat($('#shippingCost').val());
        var dropshipCost = parseFloat($('#dropshipCost').val());
        
        var listingTotal = itemCost + shippingCost + dropshipCost;
        var ebayFees = listingTotal * 0.08; // 8% of total
        var paypalFees = (listingTotal * 0.03) + 0.30; // 3% + 0.30
        var profit = listingTotal - ebayFees - paypalFees;
        
        $('#priceListingTotal').text(listingTotal.toFixed(2));
        $('#priceEbayFees').text(ebayFees.toFixed(2));
        $('#pricePaypalFees').text(paypalFees.toFixed(2));
        $('#priceProfit').text(profit.toFixed(2));
    });

    function getEbayCategorySuggestions(response) {
        for (var i = 0; i < response.categorySuggestions.length; i++) {
            var categoryId = response.categorySuggestions[i].category.categoryId;
            var categoryName = response.categorySuggestions[i].category.categoryName;
            var categoryAncestors = response.categorySuggestions[i].categoryTreeNodeAncestors;
            var categoryAncestorString = '';

            for (var j = 0; j < categoryAncestors.length; j++) {                 // Title Examples: 
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