@extends('layouts.app')

@section('content')

@include('inc.alert.delete')

<div class="bg-bg-color min-h-screen">
   <div class="flex h-full w-full">

    @include('inc.nav.nav-products')
    
    {{-- MAIN CONTENT DAHSBOARD (RIGHT) --}}
    <main class="py-4 px-7 w-full text-nav-color flex flex-col">
        {{-- HEADER --}}
        @include('inc.header.header')

        {{-- MAIN CONTENT TABLE --}}
        <div class="bg-white my-5 py-7 px-10 flex flex-col flex-1 rounded border border-slate-200">
           
           <header class="flex justify-between">
               <div class="block">
                   <h1 class="font-medium capitalize">products</h1>
                   <p class="text-[15px] text-slate-300">Lorem ipsum dolor sit.</p>
               </div>
               <div class="cta flex">
                    @if(session()->get('success'))
                        <div class="alert bg-green-600 text-white h-10 py-2 px-5 rounded-lg capitalize hover:text-white mr-1 border border-slate-200">
                            <i class="fa-solid fa-check mr-2"></i></i> 
                            {{ session()->get('success') }}  
                        </div>
                    @endif
                    @if(session()->get('error'))
                        <div class="alert bg-red-600 text-white h-10 py-2 px-5 rounded-lg capitalize hover:text-white mr-1 border border-slate-200">
                            <i class="fa-solid fa-check mr-2"></i></i> 
                            {{ session()->get('error') }}  
                        </div>
                    @endif
                    <a href="{{route('product-filter-category')}}">
                        <button class="bg-white text-slate-600 h-10 py-2 px-5 rounded-lg shadow capitalize hover:text-white hover-bg mr-1 border border-slate-200"><i class="fa-solid fa-filter mr-1"></i> Filter Category</button>
                    </a>
                    <a href="{{route('product-create')}}">
                        <button class="bg-primary text-white h-10 py-2 px-5 rounded-lg shadow capitalize hover-bg">Create</button>
                    </a>
               </div>
           </header>

           {{-- TABLE --}}
           <div class="mt-3 w-full flex flex-wrap overflow-y-auto overflow-x-auto">
            <a href="{{route('product-index')}}">
                <button class=" text-slate-600 border border-slate-400 px-4 my-1 hover:text-white hover-bg">All</button>
            </a>   
                <table class="w-full">
                   <thead class="text-left text-[15px] capitalize bg-[#F3F6F9] text-gray-700">
                       <tr>
                           <th class="py-4 px-10">no.</th>
                           <th class="py-4 px-10">name</th>
                           <th class="py-4 px-10">category</th>
                           <th class="py-4 px-10">description</th>
                           <th class="py-4 px-10">date</th>
                           <th class="py-4 px-10">action</th>
                       </tr>
                   </thead>
                   @if(isset($products))
                   <tbody>
                       @php $i=1; @endphp
                        @if(count($products) > 0)
                            @foreach($products as $p){
                            <tr>
                                <td class="td-padding">{{$i++}}</td>
                                <td class="td-padding">{{$p->name}}</td>
                                <td class="td-padding capitalize">{{$p->category}}</td>
                                <td class="td-padding w-[300px] overflow-y-auto"> {{$p->description}}</td>
                                <td class="td-padding">{{$p->dateandtime}}</td>
                                <td class="td-padding text-white flex items-center">
                                    <a href="/product/edit/{{$p->id}}" class="py-2 px-3 rounded-lg shadow mr-1 bg-green-600 hover-bg">
                                        <i class="fa-solid fa-pen pointer-events-none"></i>
                                    </a>
                                  
                                        <button id="{{$p->id}}" class="delete-btn py-2 px-3 rounded-lg shadow bg-red-600 hover-bg">
                                            <i class="fa-solid fa-trash pointer-events-none"></i>
                                        </button>
                                </td>
                            </tr>
                            }
                            @endforeach
                        @else
                            <tr>
                                <td class="td-padding">No record found.</td>
                            </tr>
                        @endif
                   </tbody>
                   @else 
                   <tbody>
                        @php $i=1; @endphp
                        @if(count($products) > 0)
                            @foreach($products as $p){
                            <tr>
                                <td class="td-padding">{{$i++}}</td>
                                <td class="td-padding">{{$p->name}}</td>
                                <td class="td-padding capitalize">{{$p->category}}</td>
                                <td class="td-padding w-[300px] overflow-y-auto"> {{$p->description}}</td>
                                <td class="td-padding">{{$p->dateandtime}}</td>
                                <td class="td-padding text-white flex items-center">
                                    <a href="#" class="py-2 px-3 rounded-lg shadow mr-1 bg-green-600 hover-bg">
                                        <i class="fa-solid fa-pen pointer-events-none"></i>
                                    </a>
                                    <a id="{{$p->id}}" href="#" class="delete-btn py-2 px-3 rounded-lg shadow bg-red-600 hover-bg">
                                        <i class="fa-solid fa-trash pointer-events-none"></i>
                                    </a>
                                </td>
                            </tr>
                            }
                            @endforeach
                        @else
                        <tr>
                            <td class="td-padding">No record found.</td>
                        </tr>
                    @endif
                    </tbody>
                   @endif
               </table>
           </div>

        </div>

        {{-- PAGINATION --}}
        <div class="h-10 flex justify-start">
            <div class="paginate-block">
                {{ $products->links('pagination::simple-default') }}
            </div>
        </div>
    </main>
   </div>
</div>

<script>

    $(document).ready(function() {
        const toggleNav = $('.toggleNav')
        const nav = $('nav')

        const deleteModal = $(".alert-modal")
        const deleteBtn = $(".delete-btn")

        const closeModal = $(".close-modal")

        const confirmBtn = $(".confirm-btn")
        const cancelBtn = $(".cancel-btn")

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

        deleteBtn.on('click', function(e){
            const target = e.target
            let id = target.getAttribute('id')
            confirmBtn.attr('id', id)
            deleteModal.hasClass('scale-0') ? deleteModal.removeClass('scale-0') : deleteModal.addClass('scale-0') 
        })
        closeModal.on('click', function(){
            deleteModal.hasClass('scale-0') ? deleteModal.removeClass('scale-0') : deleteModal.addClass('scale-0') 
        })
        confirmBtn.on('click', function(){
            const confirm = $(this).attr('id')
            $(this).attr('href', `/product/delete/${confirm}`)
        })
        cancelBtn.on('click', function(){
            deleteModal.hasClass('scale-0') ? deleteModal.removeClass('scale-0') : deleteModal.addClass('scale-0') 
        })

        setTimeout(() => {
        const alert = $(".alert")
        if(alert.hasClass('hidden')){
            alert.removeClass('hidden')
        }
        else{
            alert.addClass('hidden')
        }
        }, 1000)
        
    })

</script>

@endsection