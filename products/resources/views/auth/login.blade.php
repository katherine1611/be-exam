@extends('layouts.app')

@section('content')
<div class="min-h-screen flex justify-center w-full">
        <div class="container w-full px-10 sm:w-[70%] lg:w-[45%] xl:w-[40%]">
            <div class="mt-28">
            {{-- LOGO --}}
            <header class="my-5 flex items-center justify-center">
                <img src="{{asset('img/shopify.png')}}" alt="" class="h-20 w-20 shrink-0">
                <h1 class="text-[18px] text-primary">Shopify</h1>
            </header>
            <div class="mb-10 mt-10">
                @php if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pass']))
                   {
                      $login_email = $_COOKIE['login_email'];
                      $login_pass  = $_COOKIE['login_pass'];
                      $is_remember = "checked='checked'";
                   }
                   else{
                      $login_email ='';
                      $login_pass = '';
                      $is_remember = "";
                    }
                   @endphp

                <form method="post" action="{{ route('user-login') }}" class="text-text-color">
                    @csrf
                    
                    <div class="block space-y-2">
                        <p class="text-center font-medium text-slate-500">Please fill the form correctly to proceed.</p>
                        <div class="w-14 h-1 bg-slate-400 rounded-full mx-auto"></div>
                    </div>
                    {{-- SESSION MESSAGE --}}
                    @if(session()->get('error'))
                        <div class="alert p-2 bg-red-600 text-white mt-5 mb-2">
                            <i class="fa-solid fa-triangle-exclamation mr-2"></i> 
                            <span>
                                {{ session()->get('error') }}  
                            </span>
                        </div>
                    @endif  
                    {{-- USERNAME / EMAIL --}}
                    <div class="block mt-10">
                        <label for="username" class="capitalize">username</label>
                        <input id="email" type="text" placeholder="youremail@gmail.com" class="w-full auth-input mt-1 @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required autocomplete="email" 
                            autofocus
                        >
                    </div>
                    {{-- USERNAME ERROR --}}
                    @error('email')
                        <span class="invalid-feedback text-red-600 text-xs" role="alert">
                            <span>{{ $message }}</span>
                        </span>
                    @enderror
                    {{-- PASSWORD --}}
                    <div class="block mt-3">
                        <label for="username" class="capitalize">password</label>
                        <div class="relative">
                            <input id="password" type="password" class="w-full auth-input @error('password') is-invalid @enderror" 
                                name="password" 
                                value="{{ old('password') }}" 
                                autocomplete="password" 
                                placeholder="Enter your password" 
                                required
                                autofocus
                            >
                            <span class="absolute w-7 h-7 right-3 top-5 cursor-pointer hide-password">
                                <i class="fa-solid fa-eye-slash pointer-events-none"></i>
                            </span>
                        </div>
                    </div>
                    {{-- PASSWORD ERROR --}}
                    @error('password')
                        <span class="invalid-feedback text-red-600 text-xs" role="alert">
                            <span>{{ $message }}</span>
                        </span>
                    @enderror
                    {{-- REMEMBER ME --}}
                    <div class="mt-3 mb-5 flex items-center">
                        <input type="checkbox" name="rememberme" id="remember" {{$is_remember}}>
                        <label for="username" class="capitalize text-xs ml-1">remember me</label>
                    </div>
                    {{-- SUBMIT --}}
                    <button type="submit" class="bg-primary text-white uppercase rounded-full w-full p-3 text-lg btn-hover">login</button>
                </form>
            </div>
            <p class="mt-5 text-center text-text-color">No account yet ? <a href="{{route('register-user')}}" class="text-primary capitalize">register</a></p>
            </div>
        </div>
</div>

{{-- SCRIPT --}}
<script>
    $(document).ready(function() {

        const hide = $('.hide-password')
        hide.on('click', function(){
            const input = $(this).prev()
            $(this).hasClass('hide-password') ? hidePassword(hide, input) : showPassword(hide, input)
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
    })
</script>

@endsection
