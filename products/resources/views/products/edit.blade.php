@extends('layouts.app')

@section('content')
    <div class="min-h-screen w-full">
        <div class="container w-full mx-auto">
            <a href="{{route('product-index')}}" class="p-5">
                <button class="border text-slate-400 rounded-lg py-2 px-3 flex flex-1 justify-start hover-bg hover:text-white">Back</button>
            </a>
            @if(session()->get('success'))
                <div class="alert bg-green-500 my-4 text-white p-2">
                    <i class="fa-solid fa-circle-check mr-2"></i>
                    {{ session()->get('success') }}  
                </div>
            @endif
            @if(session()->get('error'))
                <div class="alert bg-red-500 my-4 text-white p-2">
                    <i class="fa-solid fa-triangle-exclamation mr-2"></i>
                    {{ session()->get('error') }}  
                </div>
            @endif
            <h1 class="text-center font-bold text-3xl mt-5">EDIT PRODUCT</h1>
            <div class="w-full h-full flex items-center justify-center rounded mt-10 font-bold text-[17px]">
                <div class="w-full md:w-[600px] px-10">
                {{-- STEPS INDICATOR --}}
                <div class="steps mb-10 flex justify-center items-center w-full">
                    <div class="flex justify-center items-center">
                        <div id="indicator-one" class="w-10 h-10 text-slate-500 border rounded-full flex justify-center items-center duration-500">
                            1
                        </div>
                        <div id="loader-one" class="h-[2px] bg-slate-300 w-[160px] duration-500"></div>
                    </div>
                    <div class="flex justify-center items-center">
                        <div id="indicator-two" class="w-10 h-10 text-slate-500 border rounded-full flex justify-center items-center duration-500">
                            2
                        </div>
                        <div id="loader-two" class="h-[2px] bg-slate-300 w-[160px]"></div>
                    </div>
                    <div class="flex justify-center items-center">
                        <div id="indicator-three" class="w-10 h-10 text-slate-500 border rounded-full flex justify-center items-center duration-500">
                            3
                        </div>
                    </div>
                    
                </div>
                {{-- FORM --}}
                <form method="POST" action="/product/update/{{$product->id}}" enctype="multipart/form-data" class="">
                    @csrf
                    <div class="h-[600px] overflow-hidden">
                        {{-- STEP-1 --}}
                        <div id="step-one" class="h-[600px] mb-10 font-medium duration-500">
                            <div class="w-full bg-slate-200 p-2 text-center text-slate-600 duration-500" id="warning">Step 1 : About Product.</div>
                            <div class="block mt-4">
                                <span class="text-text-color text-[15px]">Name</span>
                                <input value="{{$product->name}}" name="product_name" id="product-name" type="text" placeholder="Product Name" class="input-one w-full h-14 px-3 border rounded placeholder:font-medium placeholder:text-[15px] outline-none focus:border-gray-400 @error('product_name') is-invalid @enderror"" required> 
                                <span class="text-red-500">
                                    @error('product_name')@enderror
                                </span>
                            </div>
                            <div class="block mt-2">
                                <span class="text-text-color text-[15px]">Category</span>
                                <select  id="{{$product->category}}" value="{{$product->category}}" name="product_category" class="w-full h-14 px-3 border rounded placeholder:font-medium placeholder:text-[15px] outline-none focus:border-gray-400">
                                    @foreach($category as $c)
                                    <option value="{{$c->category}}">{{$c->category}}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <div class="block mt-2">
                                <span class="text-text-color text-[15px]">Description</span>
                                <input value="{{$product->description}}" name="product_description" id="product-description" type="text" placeholder="Product Description" class="input-two w-full h-14 px-3 border rounded placeholder:font-medium placeholder:text-[15px] outline-none focus:border-gray-400 @error('product_name') is-invalid @enderror" required>
                                <span class="text-red-500">
                                    @error('product_description')@enderror
                                </span>
                            </div>
                            {{-- BUTTON NEXT --}}
                            <div class="mt-4 flex">
                                <button type="button" id="next-one" class="h-14 w-full p-2 rounded bg-primary text-white font-bold text-lg">Next</button>
                            </div>
                        </div>
                        {{-- STEP 2 --}}
                        <div id="step-two" class="h-[600px] font-medium duration-500 text-slate-600">
                            <div class="w-full bg-slate-200 p-2 text-center">Step 2 : Product Images.</div>
                            
                            <div class="block mt-4">
                                <span class="text-text-color text-[15px]">Add new image file.</span>
                                <div class="w-full h-14 px-5 flex items-center border rounded placeholder:font-medium placeholder:text-[15px] outline-none focus:border-gray-400">
                                    <input name="product_image[]" accept="image/*" type="file" placeholder="Product Name" class="@error('product_image') is-invalid @enderror" multiple required>
                                </div>
                            </div>
                            {{-- IMAGE CONTAINER --}}
                            <div class="mt-5">
                                <span class="text-text-color text-[15px]">Scroll to view other images.</span>
                                <div class="h-[300px] border grid grid-cols-2 gap-2 overflow-y-auto">
                                    @foreach($productImages as $image)
                                        <div class="h-[100px] border relative">
                                            <img id="{{$image->id}}" src="{{asset('img/product/'.$image->url)}}"  class="w-full h-full object-contain">
                                            <a href="/product/image/delete/{{$image->id}}" class="absolute top-0 left-0 h-10 w-10 bg-red-400 text-white flex items-center justify-center cursor-pointer peer">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                            <div class="h-10 opacity-0 peer-hover:opacity-100 bg-[rgba(0,0,0,.2)] flex items-center text-center absolute top-[50px] px-5 duration-500">Delete image</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            {{-- BUTTONS --}}
                            <div class="mt-4 flex">
                                <button type="button" id="previous-one" class="h-14 w-full p-2 rounded bg-[rgba(0,0,0,.2)] text-slate-600 font-bold text-lg mr-2">Previous</button>
                                <button type="button" id="next-two" class="h-14 w-full p-2 rounded bg-primary text-white font-bold text-lg">Next</button>
                            </div>
                        </div>
                        {{-- STEP 3 --}}
                        <div id="step-three" class="font-medium duration-500 text-slate-600">
                            <div class="w-full bg-slate-200 p-2 text-center" id="warning-time">Step 3 : Date and Time Picker.</div>
                            <div class="block mt-4">
                                <span class="text-text-color text-[15px]">Date and Time.</span>
                                <div class="w-full h-14 px-5 flex items-center justify-between border rounded placeholder:font-medium placeholder:text-[15px] outline-none focus:border-gray-400">
                                    <span>
                                        <strong>Current : </strong>
                                        <span>
                                            {{$product->dateandtime}}
                                        </span>
                                    </span>
                                    <input type="date" id="date" value="{{$product->dateandtime}}" name="product_date_time" type="date" class="@error('product_date_time') is-invalid @enderror" required>
                                    <span class="text-red-500">
                                        @error('product_date_time')@enderror
                                    </span>
                                </div>
                            </div>
                            {{-- BUTTONS --}}
                            <div class="mt-4 flex">
                                <button type="button" id="previous-two" class="h-14 w-full p-2 rounded bg-[rgba(0,0,0,.2)] text-slate-600 font-bold text-lg mr-2">Previous</button>
                                <button type="submit" id="submit" class="h-14 w-full p-2 rounded bg-primary text-white font-bold text-lg">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#next-one').click(function(){

                const input = $('.input-one')
                const input2 = $('.input-two')
                const warning = $('#warning')

                if(!(input.val().length > 0) || !(input2.val().length > 0)){
                    warning.text('Please fill all the fields to proceed.')
                    warning.addClass('bg-red-500')
                    warning.addClass('text-white')
                    warning.removeClass('bg-slate-200')
                    warning.removeClass('text-slate-600')

                    return
                }
                
                const stepOne = $('#step-one')
                const stepTwo = $('#step-two')

                const indicatorOne = $('#indicator-one')
                const loader = $('#loader-one')

                stepOne.addClass('hidden')
                indicatorOne.addClass('bg-primary text-white')
                loader.removeClass('bg-slate-300')
                loader.addClass('bg-primary')
                
            })
            $('#next-two').click(function(){
                const step = $('#step-two')
                const stepThree = $('#step-three')

                const indicator = $('#indicator-two')
                const loader = $('#loader-two')

                step.addClass('hidden')
                indicator.addClass('bg-primary text-white')
                loader.removeClass('bg-slate-300')
                loader.addClass('bg-primary')
            })
            $('#previous-one').click(function(){
                const stepOne = $('#step-one')

                const indicatorOne = $('#indicator-one')
                const loader = $('#loader-one')

                stepOne.removeClass('hidden')
                indicatorOne.removeClass('bg-primary text-white')
                loader.addClass('bg-slate-300')
                loader.removeClass('bg-primary')
            })
            $('#previous-two').click(function(){
                const step = $('#step-two')
                const stepThree = $('#step-three')

                const indicator = $('#indicator-two')
                const loader = $('#loader-two')

                step.removeClass('hidden')
                indicator.removeClass('bg-primary text-white')
                loader.addClass('bg-slate-300')
                loader.removeClass('bg-primary')
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