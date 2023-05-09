<x-app-layout meta-title="Content Guideline - Wireless Terminal">
    <div class="container mx-auto py-6">
        <div class="flex flex-wrap">
            <!-- Post Section -->
            <section class="w-full md:w-2/3 px-3">
                <article class="flex flex-col shadow my-4">
                    @if($widget && $widget->image)
                        <img src="/storage/{{ $widget->image }}">
                    @endif
                    <div class="bg-white flex flex-col justify-start p-6">
                        <h1 class="text-5xl font-bold text-indigo-600 hover:text-indigo-700 pb-6">
                            {{$widget ? $widget->title : ''}}
                        </h1>
                        <div class="text-lg font-semibold text-gray-700 hover:text-blue-800 leading-loose">
                            {!! $widget ? $widget->content : '' !!}
                        </div>
                    </div>
                </article>
            </section>

            <!-- Sidebar Section -->
           
           
           
           
           
            <x-sidebar />

        </div>
    </div>
</x-app-layout>