@extends('layouts.app')
@section('content')

<div class="bg-bg-color min-h-screen ">
   <div class="flex h-full w-full">
    @include('inc.nav.nav')
    {{-- MAIN CONTENT DAHSBOARD (RIGHT) --}}
    <main class="py-4 px-7 w-full text-nav-color">
        <header class="h-12 bg-white rounded flex items-center w-full py-1 px-6">
            <div class="flex flex-1 items-center">
                <i class="fa-solid fa-magnifying-glass mr-3"></i>
                <input type="search" placeholder="Search . . ." class="w-full pr-10 outline-none">
            </div>
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
        {{-- CARDS --}}
        @include('inc.dashboard-cards')
        {{-- MAIN CONTENT CHARTS --}}
        <div class="grid gap-5 grid-cols-1 lg:grid-cols-2 mt-5">
            @include('inc.dashboard-chart')
            @include('inc.dashboard-pie')
            @include('inc.dashboard-table')
            @include('inc.dashboard-stats') 
         </div>

        
    </main>
   </div>
</div>

<script>

    $(document).ready(function() {
        const toggleNav = $('.toggleNav')
        const nav = $('nav')

        toggleNav.on('click', () => {
            toggleNav.hasClass('toggle') ? removeToggle(toggleNav) : toggle(toggleNav)
        })

        function removeToggle(e){
            e.removeClass('toggle')
            nav.addClass('w-20')
            nav.removeClass('w-64')
            e.html('<i class="fa-solid fa-circle-chevron-right text-primary text-lg pointer-events-none"></i>')
            console.log('on')
        }
        function toggle(e){
            e.addClass('toggle')
            nav.removeClass('w-20')
            nav.addClass('w-64')
            e.html('<i class="fa-solid fa-circle-chevron-left text-primary text-lg pointer-events-none"></i>')
            console.log('off')
        }
    })

</script>
@endsection
