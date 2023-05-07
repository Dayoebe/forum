<?php

namespace App\Http\Controllers;

use App\Models\TextWidget;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function about(): View
    {
        $widget = TextWidget::query()
            ->where('key', '=', 'about-page')
            ->where('active', '=', 1)
            ->first();

        return view('about', compact('widget'));
    }
    public function contact(): View
    {
        $widget = TextWidget::query()
            ->where('key', '=', 'contact-us')
            ->where('active', '=', 1)
            ->first();

        return view('contact', compact('widget'));
    }
    public function privacy(): View
    {
        $widget = TextWidget::query()
            ->where('key', '=', 'privacy-policy')
            ->where('active', '=', 1)
            ->first();

        return view('privacy', compact('widget'));
    }
    public function terms(): View
    {
        $widget = TextWidget::query()
            ->where('key', '=', 'terms-conditions')
            ->where('active', '=', 1)
            ->first();

        return view('terms', compact('widget'));
    }

    public function content(): View
    {
        $widget = TextWidget::query()
            ->where('key', '=', 'content-guideline')
            ->where('active', '=', 1)
            ->first();

        return view('content', compact('widget'));
    }
    
}



