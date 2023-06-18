<div class="search-box">
    <form method="get" action="{{ route('posts') }}">
        <select name="where" id="where">
            <option {{ request()->where === 'any' ? 'selected' : '' }} value="any">Everything</option>
            <option {{ request()->where === 'title' ? 'selected' : '' }} value="title">Titles</option>
            <option {{ request()->where === 'description' ? 'selected' : '' }} value="description">Descriptions</option>
        </select>
        <input type="text" value="{{ request()->q }}" name="q" placeholder="search ...">
        <button><i class="fa fa-search"></i></button>
        <a href="{{ route('posts') }}?#"><button><i class="fa fa-times"></i></button></a>
    </form>
</div>
