@extends('layouts.app')

@section('content')

<div class="min-h-screen flex justify-center w-full relative">
    @if ($message = Session::get('success'))
        <div class="absolute right-10 top-10 bg-green-600 p-3 text-slate-100 rounded alert duration-300 delay-100">
            <i class="fa-solid fa-circle-check mr-2"></i> 
            <span>Your record has been successfully created!</span> 
        </div>
    @endif


    <div class="container w-full px-10 pb-10 sm:w-[70%] lg:w-[45%] xl:w-[40%]">
        <div class="mt-10">
        <header class="my-5 flex items-center justify-center">
            <img src="{{asset('img/shopify.png')}}" alt="" class="h-20 w-20 shrink-0">
            <h1 class="text-[18px] text-primary">Shopify</h1>
        </header>
        {{-- INPUT FIELDS --}}
        <div class="mb-10 mt-10">
            <form class="text-text-color" method="POST" action="{{ route('register-store') }}">
                @csrf
                <div class="block space-y-2">
                    <p class="text-center font-medium text-slate-500">Please fill the form correctly to proceed.</p>
                    <div class="w-14 h-1 bg-slate-400 rounded-full mx-auto"></div>
                </div>
                {{-- NAME --}}
                <div class="block mt-14">
                    <label for="username" class="capitalize">name</label>
                    <input id="name" type="text" placeholder="Name" class="w-full auth-input mt-1 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    {{-- NAME ERROR --}}
                    @error('name')
                        <span class="invalid-feedback text-red-600 text-xs" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- EMAIL --}}
                <div class="block mt-3">
                    <label for="username" class="capitalize">email</label>
                    <input id="email" type="email" placeholder="youremail@gmail.com" class="w-full auth-input mt-1 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    {{-- EMAIL ERROR --}}
                    @error('email')
                        <span class="invalid-feedback text-red-600 text-xs" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- PASSWORD --}}
                <div class="block mt-3">
                    <label for="username" class="capitalize">password</label>
                    <div class="relative">
                        <input id="password" type="password" class="w-full auth-input mt-1 @error('password') is-invalid @enderror" placeholder="Create your password" name="password" required autocomplete="new-password">
                        <span class="absolute w-7 h-7 right-3 top-5 cursor-pointer hide-password">
                            <i class="fa-solid fa-eye-slash pointer-events-none"></i>
                        </span>
                    </div>
                {{-- PASSWORD ERROR --}}
                    @error('password')
                        <span class="invalid-feedback text-red-600 text-xs" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- CONFIRM PASSWORD --}}
                <div class="block mt-3">
                    <label for="username" class="capitalize">confirm password</label>
                    <div class="relative">
                        <input id="password-confirm" type="password" class="w-full auth-input mt-1" placeholder="Validate your password" name="password_confirmation" required autocomplete="new-password">
                        <span class="absolute w-7 h-7 right-3 top-5 cursor-pointer hide-password">
                            <i class="fa-solid fa-eye-slash pointer-events-none"></i>
                        </span>
                    </div>
                </div>
                {{-- SUBMIT --}}
                <button type="submit" class="mt-7 bg-primary text-white uppercase rounded-full w-full p-3 text-lg">register</button>
            </form>
        </div>
        <p class="mt-5 text-center text-text-color">Already have an account? <a href="/login" class="text-primary capitalize">login</a></p>
        </div>
    </div>
</div>

{{-- SCRIPT --}}
<script>
    $(document).ready(function() {

        const hide = $('.hide-password')

        hide.on('click', function(){
            const input = $(this).prev()
            $(this).hasClass('hide-password') ? hidePassword($(this), input) : showPassword($(this), input)
        })
        function showPassword(target, input){
            target.addClass('hide-password')
            target.html('<i class="fa-solid fa-eye-slash pointer-events-none"></i>')
            input.attr('type', 'password')
        }
        function hidePassword(target, input){
            target.html('<i class="fa-solid fa-eye pointer-events-none"></i>')
            target.removeClass('hide-password')
            input.attr('type', 'text')
        }

        setTimeout(() => {
            const alertMessage = $(".alert")
            alertMessage.hasClass('opacity-0') ? alertMessage.removeClass('opacity-0') : alertMessage.addClass('opacity-0')
            console.log(alertMessage)
        }, 1000)

    })
</script>

@endsection
