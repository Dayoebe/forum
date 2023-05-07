<?php

namespace App\Providers;

use App\Models\Post;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Latest post
        $latestPost = Post::where('active', '=', 1)
            ->whereDate('published_at', '<', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get(['id', 'title']);
            
        // Share latest post data to all views
        View::share('latestPost', $latestPost);
    
        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('wirelesscs.com')
                    ->url('https://wirelesscs.com/contact', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-globe-alt')
                    ->group('Owner')
                    ->sort(3),
            ]);
        });
    }
}    