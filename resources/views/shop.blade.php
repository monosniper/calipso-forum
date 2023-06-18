@extends('layouts.main')

@section('title')
    {{ config('app.name') }} - Shop
@endsection

@section('search')
    @include('inc.search-shop')
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap-grid.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container bootstrap snipets">
        <div class="row flow-offset-1">
            @foreach($products as $product)
                @include('inc.product')
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
@endsection
