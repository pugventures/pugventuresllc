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
        <div class="col-sm-8">
            <div class="card card-body">
                <div class='form-group'>
                    <label class='form-control-label'>Title <span class='tx-danger'>*</span></label>
                    <input class="form-control" type="text" name="title">
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
</script>
@endsection