<div class="col-xs-6 col-md-4">
    <div class="product tumbnail thumbnail-3"><a href="{{ route('product', $product->id) }}"><img src="{{ $product->getImageUrl() }}" alt="{{ $product->title }}"></a>
        <div class="caption">
            <h6 class="product__title"><a href="{{ route('product', $product->id) }}">{{ $product->title }}</a></h6><span class="price">
            </span><span class="price sale">${{ $product->price }}</span>
        </div>
    </div>
</div>
