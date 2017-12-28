<!-- Stored in resources/views/child.blade.php -->

@extends('sites.pugventuresllc.master')

@section('content')
<div class="row">
    <div class="col-sm">
        <h1>{{ ucwords($product -> title) }}</h1>
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
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card card-body">
                <p class="card-text">...</p>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">

    $('#summernote').summernote({
        height: 200,
        tooltip: false
    })

</script>
@endsection