<div class="navbar">
    <a href="{{ route('home') }}" class="brand">{{ config('app.name') }}</a>
    <div class="menu">
        <a href="{{ route('shop') }}" class="menu__item">Shop</a>
        <a href="{{ route('guaranties') }}" class="menu__item">Guaranties</a>
    </div>
    @auth
        <a style="padding-top: 10px" href="{{ route('profile.edit') }}" class="menu__item user">
            <span class="balance">${{ auth()->user()->balance }}</span>
            <span>{{ auth()->user()->name }}</span>
        </a>
    @endauth
</div>
