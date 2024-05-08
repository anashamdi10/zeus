@foreach( $products as $product)

<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
    <div class="product-item bg-light mb-4">
        <div class="product-img position-relative overflow-hidden">
            <img class="img-fluid w-100" src="{{ asset('uploads/products/' . $product->image['full']) }}" />

        </div>
        <div class="text-center py-4">
            <a class="h6 text-decoration-none text-truncate fw-bolder" href="{{route('info_product', $product->id) }}">{{$product->name_en}}</a>
        </div>
    </div>
</div>
@endforeach