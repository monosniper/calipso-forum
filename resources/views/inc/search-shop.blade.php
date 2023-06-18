<div class="search-box">
    <form method="get" action="{{ route('shop') }}">
        <input type="text" value="{{ request()->q }}" name="q" placeholder="search ...">
        <button><i class="fa fa-search"></i></button>
        <a href="{{ route('shop') }}?#"><button><i class="fa fa-times"></i></button></a>
    </form>
</div>
