<header class="h-12 bg-white rounded flex items-center py-1 px-6 shadow justify-between">
    <form action="{{route('product-search')}}" method="GET">
        @csrf
        <div class="flex flex-1 items-center">
            <i class="fa-solid fa-magnifying-glass mr-3"></i>
            <input type="search" name="search" placeholder="Search . . ." class="w-full pr-10 outline-none">
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 mr-2">Search</button>
        </div>
    </form>
    <div class="flex items-center">
        <div class="w-6 h-6 shrink-0 mr-2">
            <img src="{{asset('img/philippines.png')}}" alt="Your Country" class="w-full h-full object-cover">
        </div>
        <i class="fa-regular fa-moon text-xl mr-1 -rotate-12"></i>
        <i class="fa-regular fa-heart mr-2 text-xl"></i>
        <img src="{{asset('img/profile.png')}}" alt="Your Country" class="w-6 h-6 object-cover">
        {{-- LOGOUT --}}
        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
        class="p-1 rounded-lg text-xs hover:text-slate-800"
        >
        {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</header>