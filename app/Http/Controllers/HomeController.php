<?php

namespace App\Http\Controllers;

use App\Models\Page\Page;
use App\Components\Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::query()->where('url', '=', '')->firstOr(function() {
            return new Page();
        });

        echo $page->name;
    }
}