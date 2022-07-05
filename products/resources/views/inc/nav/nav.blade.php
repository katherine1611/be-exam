{{-- SIDE NAV (LEFT) --}}
<nav class="p-4 text-text-color min-h-screen bg-white w-20 shadow duration-300 delay-75 relative">
    <div class="overflow-hidden">
        <header class="space-x-2 flex items-center">
            <img src="{{asset('img/shopify.png')}}" alt="Logo" class="shrink-0 max-w-12 max-h-12">
            <h1 class="text-3xl capitalize ">shopify</h1>
        </header>
        {{-- TOGGLE NAV --}}
        <button class="absolute top-6 -right-5 bg-slate-100 rounded-full h-8 w-8 border hover:border-primary duration-300 toggleNav z-100">
            <i class="fa-solid fa-circle-chevron-right text-primary text-lg pointer-events-none"></i>
        </button>
        {{-- NAV LISTS --}}
        <ul class="mt-10 space-y-1 text-nav-color">
            <li class="bg-primary-light rounded text-primary mb-3 px-4">
                <div class="content h-12 flex items-center">
                    <i class="fa-solid fa-chart-column mr-8"></i>
                    <span class="capitalize">dashboard</span>
                    <i class="fa-solid fa-shirt-running"></i>
                    {{-- <i class="fa-solid fa-angle-down flex flex-1 justify-end cursor-pointer"></i> --}}
                </div>
            </li>
            <li class="px-4 rounded">
                <a href="/products/index">
                    <div class="content h-12 flex items-center">
                        <i class="fa-solid fa-shirt mr-8"></i>
                        {{-- <i class="fa-regular fa-shirt mr-8"></i> --}}
                        <span class="capitalize">products</span>
                        <i class="fa-solid fa-angle-down flex flex-1 justify-end cursor-pointer"></i>
                    </div>
                </a>
            </li>
            <li class="px-4 rounded">
                <div class="content h-12 flex items-center">
                    <i class="fas fa-video mr-8"></i>
                    <span class="capitalize">videos</span>
                    <i class="fa-solid fa-angle-down flex flex-1 justify-end cursor-pointer"></i>
                </div>
            </li>
            <div class="pt-7">
                <span class="uppercase text-xs px-2">pages</span>
                <li class="px-4 rounded">
                    <div class="content h-12 flex items-center">
                        <i class="fa-solid fa-cart-arrow-down mr-8"></i>
                        <span class="capitalize">cart</span>
                        <i class="fa-solid fa-angle-down flex flex-1 justify-end cursor-pointer"></i>
    
                    </div>
                </li>
                <li class="px-4 rounded">
                    <div class="content h-12 flex items-center">
                        <i class="fa-solid fa-bell mr-9"></i>
                        <span class="capitalize">alerts</span>
                        <i class="fa-solid fa-angle-down flex flex-1 justify-end cursor-pointer"></i>
                    </div>
                </li>
                <li class="px-4 rounded">
                    <div class="content h-12 flex items-center">
                        <i class="fa-regular fa-credit-card mr-8"></i>
                        <span class="capitalize">payment</span>
                        <i class="fa-solid fa-angle-down flex flex-1 justify-end cursor-pointer"></i>
                    </div>
                </li>
                <li class="px-4 rounded">
                    <div class="content h-12 flex items-center">
                        <i class="fas fa-cog mr-8"></i>
                        <span class="capitalize">settings</span>
                        <i class="fa-solid fa-angle-down flex flex-1 justify-end cursor-pointer"></i>
                    </div>
                </li>
            </div>
            <div class="pt-5">
                <span class="px-2 uppercase text-xs">media</span>
                <li class="px-4 rounded">
                    <div class="content h-12 flex items-center">
                        <i class="fa-regular fa-video mr-8"></i>
                        <span class="capitalize">videos</span>
                        <i class="fa-solid fa-angle-down flex flex-1 justify-end cursor-pointer"></i>
                    </div>
                </li>
                <li class="px-4 rounded">
                    <div class="content h-12 flex items-center">
                        <i class="fa-regular fa-image mr-8"></i>
                        <span class="capitalize">images</span>
                        <i class="fa-solid fa-angle-down flex flex-1 justify-end cursor-pointer"></i>
    
                    </div>
                </li>
                <li class="px-4 rounded">
                    <div class="content h-12 flex items-center">
                        <i class="fab fa-adversal mr-8"></i>
                        <span class="capitalize">ads</span>
                        <i class="fa-solid fa-angle-down flex flex-1 justify-end cursor-pointer"></i>
                    </div>
                </li>
            </div>
        </ul>
    </div>
</nav>