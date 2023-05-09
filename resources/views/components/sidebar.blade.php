<!-- Sidebar Section -->
<aside class="w-full md:w-1/3 flex flex-col items-center px-3">
    <div class="w-full bg-white shadow flex flex-col my-4 p-6">

        <h3 class="hover:bg-indigo-800 hover:text-white text-xl bg-blue-600 text-white text-semibold block py-2 px-3 rounded">All Categories 
            <div class="flex inline-flex">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd"/>
                </svg>
            </div>
        </h3> <hr>
        @foreach($categories as $category)
            <a href="{{route('by-category', $category)}}"
               class="hover:bg-blue-900 hover:text-white text-semibold block py-2 px-3 rounded {{ request('category')?->slug === $category->slug
                ? 'bg-blue-600 text-white' :  ''}}">
                {{$category->title}} ({{$category->total}})
            </a>
        @endforeach
    </div>

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="hover:bg-blue-900 hover:text-white text-xl text-xl bg-gray-500 text-white text-semibold block py-2 px-3 rounded mb-5">
            {{ \App\Models\TextWidget::getTitle('about-us-sidebar') }}
        </p>
        {!! \App\Models\TextWidget::getContent('about-us-sidebar') !!}
        <a href="{{route('about-us')}}"
           class="w-full bg-blue-800  h-auto text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
            Get to know us
        </a>
    </div>
</aside>
