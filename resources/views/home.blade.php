<x-app-layout meta-title="Wireless Terminal"
              meta-description="Welcome to Wireless Terminal! We are a community of technology enthusiasts and professionals dedicated to sharing knowledge, insights, and experiences related to a broad range of technology topics. Join us today and be a part of our growing community of tech enthusiasts!">
    <div class="container max-w-9xl mx-auto py-3">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <!-- Latest Post -->
            <div class="col-span-2">
                <h2 class="text-lg pl-4 sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 hover:text-yellow-500 mb-3">
                    Latest Post
                </h2>

                @if ($latestPost)
                    <x-post-item :post="$latestPost"/>
                @endif
            </div>

            <!-- Popular 3 post -->
            <div>
                <h2 class="text-lg pl-4 sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 hover:text-yellow-500 mb-3">
                    Popular Posts
                </h2>
                @foreach($popularPosts as $post)
                    <div class="grid grid-cols-4 gap-2 mb-4 hover:border hover:bg-blue-100 w-auto h-auto">
                        <a href="{{route('view', $post)}}" class="pt-1">
                            <img src="{{$post->getThumbnail()}}" alt="{{$post->title}}"/>
                        </a>
                        <div class="col-span-3">
                            <a href="{{route('view', $post)}}">
                                <h3 class="text-sm uppercase whitespace-nowrap truncate">{{$post->title}}</h3>
                            </a>
                            <div class="flex gap-4">
                                @foreach($post->categories as $category)
                                    <a href="{{route('by-category', $category)}}" class="hover:text-red-500 text-blue-700 text-sm font-bold uppercase border-indigo-500 pb-2">
                                        {{$category->title}}
                                    </a>
                                @endforeach
                            </div>
                            <div class="text-xs">
                                {{$post->shortBody(10)}}
                            </div>
                            <a href="{{route('view', $post)}}" class="text-xs hover:bg-blue-700 hover:text-white uppercase text-gray-800 hover:text-black">Continue
                                Reading <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Recommended posts -->
        <div class="mb-8">
            <h2 class="text-lg pl-4 sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 hover:text-yellow-500 mb-3">
                Recommended Posts
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    @foreach($recommendedPosts as $post)
                    <x-post-item :post="$post" :show-author="false"/>
                    @endforeach
            </div>
        </div>

<!-- News -->
<div class="container mx-auto shadow">
    <div class="card">
        @auth
        <?php
        $apikey = '4e25dfce191e50e8267092a457c14994';
        $category = 'technology';
        $country = '';
        $url = "https://gnews.io/api/v4/top-headlines?category=$category&lang=en&country=$country&max=100&apikey=$apikey";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);
        $articles = $data['articles'];
        ?>

        @foreach ($articles as $article)
        <div class="card-body">
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 md:pr-4">
                    @if (isset($article['image']) && !empty($article['image']))
                    <img src="{{ $article['image'] }}" class="h-64 w-full object-cover rounded-md" alt="News Image">
                    @endif
                </div>
                <div class="w-full md:w-1/2 mt-4 md:mt-0 hover:bg-blue-100 hover:border">
                    <h2 class="text-3xl font-bold hover:bg-gray-100 p-2 rounded-md"><strong>{{ $article['title'] }}</strong></h2>
                    <h5 class="text-primary">{{ $article['description'] }}</h5>
                    <p>{{ $article['content'] }}</p>
                    <hr class="my-4 border-t-2 border-gray-300">
                    <strong class="text-blue-600 hover:text-red-500"><a href="{{ $article['url'] }}" target="_blank">{{ $article['source']['name'] }}</a></strong><br>
                    <em class="text-green-500">{{ $article['publishedAt'] }}</em><br>
                </div>
            </div>
            <hr class="my-4 border-t-2 border-gray-300">
        </div>
        @endforeach

        @else
        <p><!--- You need to be authenticated to view this content. --> </p>
        @endauth
    </div>
</div>
<!----
    
    
//    <?php
//use GeoIp2\Database\Reader;

// Check if user is authenticated
// if (isset($_SESSION['user_id'])) {
    // Load GeoIP2 database
//    $databaseFile = '/path/to/GeoLite2-Country.mmdb'; // Replace with your actual database file path
//    $reader = new Reader($databaseFile);

    // Get user's IP address
//    $userIp = $_SERVER['REMOTE_ADDR'];

    // Get user's country code
//    try {
//        $record = $reader->country($userIp);
//        $country = $record->country->isoCode;
//    } catch (Exception $e) {
//        $country = '';
//    }

//    $apikey = '4e25dfce191e50e8267092a457c14994';
//    $category = 'technology';
//    $url = "https://gnews.io/api/v4/top-headlines?category=$category&lang=en&country=$country&max=100&apikey=$apikey";

    // Make API request
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    $data = json_decode(curl_exec($ch), true);
//    curl_close($ch);

//    $articles = $data['articles'];

//    foreach ($articles as $article) {
        // Display article
//    }
//} else {
//    echo "<p>You need to be authenticated to view this content.</p>";
//}
// ?>

    
    ---->
  






















        <!-- Latest Categories -->

        @foreach($categories as $category)
            <div>
                <h2 class="text-lg pl-4 sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 hover:text-yellow-500 mb-3">
                    Category "{{$category->title}}"
                    <a href="{{route('by-category', $category)}}">
                        <i class="fas fa-arrow-right hover:text-red-500"></i>
                    </a>
                </h2>

                <div class="mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        @foreach($category->publishedPosts()->limit(3)->get() as $post)
                            <x-post-item :post="$post" :show-author="false"/>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>
