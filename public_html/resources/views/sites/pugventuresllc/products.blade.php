<!-- Stored in resources/views/child.blade.php -->

@extends('sites.pugventuresllc.master')

@section('title', 'Products - Pug Ventures, LLC')

@section('content')
<div class="row">
    <div class="col-sm">
        <a href="{{ url('/products/add') }}"><button class="btn btn-success"><i class="fas fa-plus"></i>&nbsp; Add Product</button></a>
    </div>
</div>
<div class="row">
    <div class="col-sm">
        {{ $products->links() }}

        <table class="table table-hover">
            <thead>
            <th>Product</th>
            <th>Price</th>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr class="table-hover-clickable" data-product-id="{{ $product->id }}">
                    <td>
                        <div class="row">
                            <div class="col-sm-1">
                                <img src="{{ URL::asset('img/contact-1.jpg') }}" class="wd-48 rounded-circle" alt="{{ ucwords($product->title) }}">
                            </div>
                            <div class="col-sm">
                                <div><strong>{{ ucwords($product->title) }}</strong></div>
                                <div class="product-hud">
                                    <strong>SKU:</strong> {{ $product->sku }} &nbsp;
                                    <strong>Type:</strong> {{ ucwords($product->type->type) }} &nbsp;
                                    <strong>Brand:</strong> {{ ucwords($product->brand->brand) }} &nbsp;
                                    <strong>Vendor:</strong> {{ ucwords($product->vendor->name) }} &nbsp;
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{ "$" . $product->price }}
                    </td>
                </tr>
                @endforeach
        </table>

    </div>
</div>

<script type="text/javascript">

    $('.table-hover-clickable').bind('click', function(){
        window.location.href='product/' + $(this).data('product-id');
    });

</script>
@endsection