<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvitationDesign;

class AboutController extends Controller
{
    public function index()
    {
        $specials = InvitationDesign::with(['category'])
            ->whereHas('category', function ($category) {
                $category->where('slug', 'special');
            })->get();
        return view('pages.marketplace.home', [
            'specials' => $specials
        ]);
    }
}
