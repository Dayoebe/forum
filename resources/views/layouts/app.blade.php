<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle ?: 'Wireless CS' }}</title>
    <meta name="author" content="Wireless Terminal">
    <meta name="description" content="{{ $metaDescription }}">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    </style>

<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<script src="{{ mix('js/app.js') }}" defer></script>


    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
            integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-family-karla">

 
    <!--------- Navbar starts--->
    <nav class="sticky top-0 left-0 right-0 bg-white shadow-lg">
        <div class="max-w-1xl mx-auto px-4">
          <div class="flex justify-between items-center">
                 <!-- Website Logo -->
                 <a href="{{route('home')}}" class="flex items-center py-4 px-2">
                <!-- <img src="wirelesscs.webp" alt="" class="h-8 w-8 mr-2"> -->
                <span class="font-bold text-gray-800 uppercase hover:text-gray-700 text-2xl" href="{{route('home')}}">Wireless Terminal</span>
              </a>
              

              <div class="flex items-center space-x-2 ml-auto border rounded">
                <form method="get" action="{{route('search')}}" class="flex items-center">
                    <input name="q" value="{{request()->get('q')}}" autocomplete type="text" placeholder="Search Anything" class="border border-blue-300 py-2 px-4 rounded">
                    <button class="flex-shrink-0 ml-2">
                        <svg class="w-10 h-10 text-white-400 bg-info hover:bg-blue-500 rounded-full" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M13.707 12.293a1 1 0 0 1-1.414 1.414l-2.024-2.024a4.5 4.5 0 1 1 .707-.707l2.024 2.024zM9.5 14a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9z" clip-rule="evenodd" />
                        </svg>
                    </button>                
                </form>
            </div>
            


            <div class="hidden md:flex items-center space-x-7 ml-auto">
              <a href="{{route('home')}}" class="py-4 px-2 hover:text-blue-500 font-semibold">Home</a>
              <a href="{{route('about-us')}}" class="py-4 px-2 hover:text-blue-500 font-semibold">About</a>
              <a href="{{route('contact-us')}}" class="py-4 px-2 hover:text-blue-500 font-semibold">Contact Us </a>

        


              <div class="relative">
                <button class="dropdown-toggle py-4 px-2 hover:text-blue-500 font-semibold  flex items-center rounded py-4 px-2 mx-2 border-b" aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown()">
                    Category 
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </button>
                <ul class="dropdown-menu absolute hidden bg-white text-gray rounded w-auto p-2" id="category-dropdown">
                    @foreach($categories as $category)
                        <li><a href="{{route('by-category', $category)}}" class="block w-auto hover:bg-blue-200 p-2 space-x-2 ml-auto">{{$category->title}}</a> <hr></li>
                    @endforeach
                </ul>
            </div>
            
            <script>
            function toggleDropdown() {
              var dropdown = document.getElementById("category-dropdown");
              dropdown.classList.toggle("hidden");
            }
            </script>
               
                
                <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                    @foreach($categories as $category)
                        <li><a href="{{route('by-category', $category)}}" class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2">{{$category->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            
            @auth
            <div class="flex sm:items-center sm:ml-6 relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="dropdown-toggle hover:bg-blue-600 hover:text-white flex items-center rounded py-2 px-4 mx-2 border-t" aria-haspopup="true" aria-expanded="false">
                            <div>{{ Auth::user()->name }}</div>
            
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>
            
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
            
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
            
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                  this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
          @else
              <a href="{{route('login')}}"
                 class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2">Sign in</a>
              <a href="{{route('register')}}" class="bg-blue-600 text-white rounded py-2 px-4 mx-2">Sign Up</a>
          @endauth
        </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                    <svg class="mx-2 w-6 h-6 text-gray-500 hover:text-green-500 "
                        x-show="!showMenu"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                </div>
            </div>
        </div>

			<!-- mobile menu -->
			<div class="hidden mobile-menu">
				<ul class="">
					<li><a href="{{route('home')}}" class="block text-sm px-2 py-4 text-white bg-blue-500 font-semibold">Home</a></li>
					<li><a href="{{route('about-us')}}" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300">About</a></li>
                    <li>               @auth
                        <div class="flex md:items-center sm:ml-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="hover:bg-blue-600 hover:text-white flex items-center rounded py-2 px-4 mx-2">
                                        <div>{{ Auth::user()->name }}</div>
          
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
          
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
          
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
          
                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <a href="{{route('login')}}"
                           class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2">Sign in</a>
                        <a href="{{route('register')}}" class="bg-blue-600 text-white rounded py-2 px-4 mx-2">Sign Up</a>
                    @endauth </li>
                    <li><form method="get" action="{{route('search')}}">
                        <input name="q" value="{{request()->get('q')}}"
                               class="block w-full rounded-md border-0 px-3.5 py-2 t0ext-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-blue-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 font-medium"
                               placeholder="Search Anything"/>
                    </form> </li>
				</ul>
			</div>
			<script>
				const btn = document.querySelector("button.mobile-menu-button");
				const menu = document.querySelector(".mobile-menu");

				btn.addEventListener("click", () => {
					menu.classList.toggle("hidden");
				});
			</script>
		</nav>

        





<!-- Text Header --
<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-12">
        <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="{{route('home')}}">
            Wireless Terminal
        </a>
        <p class="text-lg text-gray-600">
            {{ \App\Models\TextWidget::getTitle('header') }}
        </p>
    </div>
</header>

<!-- Topic Nav --
<nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
    <div class="block sm:hidden">
        <a
            href="#"
            class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
            @click="open = !open"
        >
            Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
        </a>
    </div>
    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div
            class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-between text-sm font-bold uppercase mt-0 px-6 py-2">
            <div>
                <a href="{{route('home')}}" class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2">Home</a>
                @foreach($categories as $category)
                    <a href="{{route('by-category', $category)}}"
                       class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2">{{$category->title}}</a>
                @endforeach
                <a href="{{route('about-us')}}" class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2">About us</a>
            </div> 

            <div class="flex items-center">
                <form method="get" action="{{route('search')}}">
                    <input name="q" value="{{request()->get('q')}}"
                           class="block w-full rounded-md border-0 px-3.5 py-2 t0ext-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-blue-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 font-medium"
                           placeholder="Type an hit enter to search anything"/>
                </form>
                @auth
                    <div class="flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="hover:bg-blue-600 hover:text-white flex items-center rounded py-2 px-4 mx-2">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication --
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <a href="{{route('login')}}"
                       class="hover:bg-blue-600 hover:text-white rounded py-2 px-4 mx-2">Sign in</a>
                    <a href="{{route('register')}}" class="bg-blue-600 text-white rounded py-2 px-4 mx-2">Sign Up</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
-->

<div class="container mx-auto py-6">

    {{ $slot }}

</div>

<footer class="bg-gray-900 mx-auto text-white">
    <div class="container mx-auto px-4 py-8 flex flex-wrap">
      <div class="w-full md:w-1/2 lg:w-1/4 mb-4 px-2">
        <h2 class="text-sm font-semibold text-gray-400 tracking-wider uppercase border-b mb-4">About Us</h2>
        <p class="text-gray-400 leading-6">
          {!! \App\Models\TextWidget::getContent('about-us-sidebar') !!}
          <a href="{{route('about-us')}}" class="text-sm font-semibold text-gray-400 tracking-wider uppercase border-b mt-4 mb-4">Follow Us</a>
          <ul class="flex flex-wrap list-none mt-4">
            <li class="mr-6 mb-2">
              <a href="#" class="text-gray-400 hover:text-gray-300 transition duration-300 ease-in-out"><i class="fab fa-facebook-square fa-2x"></i></a>
            </li>
            <li class="mr-6 mb-2">
                <a href="#" class="text-gray-400 hover:text-gray-300 transition duration-300 ease-in-out"><i class="fab fa-twitter-square fa-2x"></i></a>
              </li>
              <li class="mr-6 mb-2">
                <a href="#" class="text-gray-400 hover:text-gray-300 transition duration-300 ease-in-out"><i class="fab fa-youtube-square fa-2x"></i></a>
              </li>
              <li class="mr-6 mb-2">
                <a href="https://github.com/Dayoebe" class="text-gray-400 hover:text-gray-300 transition duration-300 ease-in-out"><i class="fab fa-github-square fa-2x"></i></a>
              </li>
              <li class="mr-6 mb-2">
                <a href="https://stackoverflow.com/users/18967430/adedayo-oyetoke" class="text-gray-400 hover:text-gray-300 transition duration-300 ease-in-out"><i class="fab fa-stack-overflow fa-2x"></i></a>
              </li>
              <li class="mr-6 mb-2">
                <a href="#" class="text-gray-400 hover:text-gray-300 transition duration-300 ease-in-out"><i class="fab fa-pinterest-square fa-2x"></i></a>
              </li>
              <li class="mr-6 mb-2">
                <a href="#" class="text-gray-400 hover:text-gray-300 transition duration-300 ease-in-out"><i class="fab fa-instagram-square fa-2x"></i></a>
              </li>
              <li class="mr-6 mb-2">
                <a href="#" class="text-gray-400 hover:text-gray-300 transition duration-300 ease-in-out"> <i class="fab fa-google fa-2x"></i></a>
              </li>
              <li class="mr-6 mb-2">
                <a href="#" class="text-gray-400 hover:text-gray-300 transition duration-300 ease-in-out"> <i class="fab fa-whatsapp fa-2x"></i></a>
              </li>
          </ul>  
        </p> 
      </div> 
  
      <div class="w-full md:w-1/2 lg:w-1/4 mb-4 px-2">
        <h2 class="text-sm font-semibold text-gray-400 tracking-wider uppercase border-b mb-4">Popular Posts</h2>
        <ul>
                @foreach ($latestPost as $post)
                <li><a href="{{route('home', $post) }}" class="block w-auto hover:bg-gray-800 p-2 space-x-2 ml-auto border-b">{{ $post->title }}</a></li>
            @endforeach
        </ul>
      </div>
  
      <div class="w-full md:w-1/2 lg:w-1/4 mb-4 px-2">
        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase border-b mb-4">Categories</h3>
        <ul class="mt-4 space-y-4">
            @foreach($categories as $category)
            <li><a href="{{route('by-category', $category)}}" class="block w-auto hover:bg-gray-800 p-2 space-x-2 ml-auto">{{$category->title}}</a> <hr></li>
        @endforeach
        </ul>
      </div>
  
      <div class="w-full md:w-1/2 lg:w-1/4 mb-4 px-2">
        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase border-b mb-4">Subscribe to our newsletter</h3>
        <form method="POST" action="{{ route('subscribe') }}" class="mt-4 sm:flex pb-4 mb-2">
            @csrf
            <div class="">
                <label for="email" class="block text-gray-700 font-bold mb-1">Email address</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your Email" class="bg-white form-input text-indigo-600 rounded-md shadow-sm block w-full @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-7">
                <button type="submit" class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Subscribe</button>
            </div>
        </form>
        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase border-b border-t mb-4 py-3">Contact</h3>
        <ul class="mt-4 space-y-4">
            <li><a href="mailto:mail@wirelesscs.com" class="block w-auto hover:bg-gray-800 p-2 space-x-2 ml-auto"> Advertise </a> <hr></li>
            <li><a href="mailto:mail@wirelesscs.com" class="block w-auto hover:bg-gray-800 p-2 space-x-2 ml-auto"> mail@wirelesscs.com </a> <hr></li>
            <li><a href="tel:+2349030036438" class="block w-auto hover:bg-gray-800 p-2 space-x-2 ml-auto"> 2349030036438 </a> <hr></li>
        </ul>  
    </div>
    </div>
  </footer>
   


  <footer class="bg-gray-800 text-gray-300 py-2">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <div class="flex flex-wrap justify-center md:justify-end space-x-2 mt-4 pb-2 md:mt-0">
          <a href="{{route('home')}}" class="hover:text-white pr-2 hover:bg-gray-900 border-r">Home</a>
          <a href="{{route('by-category', $category)}}" class="hover:text-white pr-2 hover:bg-gray-900 border-r">Category</a>
          <a href="{{route('about-us')}}" class="hover:text-white pr-2 hover:bg-gray-900 border-r">About</a>
          <a href="{{route('contact-us')}}" class="hover:text-white pr-2 hover:bg-gray-900 border-r">Contact</a>
          <a href="{{route('privacy-policy')}}" class="hover:text-white pr-2 hover:bg-gray-900 border-r">Privacy Policy</a>
          <a href="{{route('terms-condition')}}" class="hover:text-white pr-2 hover:bg-gray-900 border-r">Terms and Condition</a>
          <a href="{{route('content-guideline')}}" class="hover:text-white pr-2 hover:bg-gray-900">Content Guideline</a>
        </div> <hr>
        <div class="text-center md:text-left pb-2">
          <a href="{{route('home')}}" class="uppercase py-2 hover:text-white pr-2 hover:bg-gray-900">&copy; wirelesscs.com</a>
          <p class="text-lg text-gray-600">{{ \App\Models\TextWidget::getTitle('header') }}</p>
        </div>
      <div class="text-sm md:text-base pb-2 flex flex-inline">
        <p class="pr-3" ><i class="far fa-calendar-alt"></i> <?php echo(date('D d - M, Y')); ?></p>
        <p><i class="far fa-clock"></i> <?php date_default_timezone_set("Africa/Lagos"); echo(strftime('%H:%M %p %Z %z')); ?></p>
      </div><hr>
    </div>
  </footer>
  
  

@livewireScripts
</body>
</html>
