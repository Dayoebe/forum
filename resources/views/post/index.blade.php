<? 
/**    @var $posts \Illuminate\Pagination\LengthAwarePaginator */
?>
<x-app-layout meta-title="'$category->title' - Category" :meta-description="'Wireless Terminal Forum'" >

<section class="w-full md:w-2/3 flex-col items-center px-3">

    @foreach ($posts as $post)
    <x-post-item :post="$post"></x-post-item>
        
    @endforeach
   {{$posts->onEachSide(1)->links()}}

</section>
 <x-sidebar />

</x-app-layout>