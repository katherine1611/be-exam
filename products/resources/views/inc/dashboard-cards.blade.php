<div class="mt-5 w-full">
    <h1>Directives</h1>
    <div class="flex items-center w-full">
        <div class="w-full h-20 flex mt-2 text-black overflow-x-auto space-x-2">
            {{-- CARD --}}
            <a href="/products/index">
                <div class="bg-white rounded-xl shadow-lg flex flex-col flex-1 py-3 px-6 card">
                    <div class="flex items-center justify-around">
                        <div class="block">
                            <span class="mr-5">Products</span>
                            <h1 class="text-2xl font-bold">10</h1>
                        </div>
                        <div class="h-10 w-10">
                            <img src="{{asset('img/cards/product.png')}}" alt="Product" class="w-full h-full shrink-0 object-cover">
                        </div>
                    </div>
                </div>
            </a>
            {{-- CARD --}}
            <div class="bg-white rounded-xl shadow-lg flex flex-col flex-1 py-3 px-6 card">
                <div class="flex items-center justify-between">
                    <div class="block">
                        <span class="mr-5">Cart</span>
                        <h1 class="text-2xl font-bold">12</h1>
                    </div>
                    <div class="h-10 w-10">
                        <img src="{{asset('img/cards/cart.png')}}" alt="Product" class="w-full h-full shrink-0 object-cover">
                    </div>
                </div>
            </div>
            {{-- CARD --}}
            <div class="bg-white rounded-xl shadow-lg flex flex-col flex-1 py-3 px-6 card">
                <div class="flex items-center justify-between">
                    <div class="block">
                        <span class="mr-5">Payment</span>
                        <h1 class="text-2xl font-bold">3</h1>
                    </div>
                    <div class="h-10 w-10">
                        <img src="{{asset('img/cards/payment.png')}}" alt="Product" class="w-full h-full shrink-0 object-cover">
                    </div>
                </div>
                
            </div>
            {{-- CARD --}}
            <div class="bg-white rounded-xl shadow-lg flex flex-col flex-1 py-3 px-6 card">
                <div class="flex items-center justify-between">
                    <div class="block">
                        <span class="mr-5">Inventory</span>
                        <h1 class="text-2xl font-bold">30</h1>
                    </div>
                    <div class="h-10 w-10">
                        <img src="{{asset('img/cards/inventory.png')}}" alt="Product" class="w-full h-full shrink-0 object-cover">
                    </div>
                </div>
            </div>
            {{-- CARD --}}
            <div class="bg-white rounded-xl shadow-lg flex flex-col flex-1 py-3 px-6 card">
                <div class="flex items-center justify-between">
                    <div class="block">
                        <span class="mr-5">Profile</span> <br>
                        <button class="bg-card-color py-1 px-4 rounded text-white text-[14px]">Show Updates</button>
                    </div>
                    <div class="h-10 w-10">
                        <img src="{{asset('img/profile.png')}}" alt="Product" class="w-full h-full shrink-0 object-cover">
                    </div>
                </div>
            </div>
            
        </div>
      
    </div>
</div>