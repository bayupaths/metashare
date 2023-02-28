<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvitationDesign;

class HomeController extends Controller
{
    /**
        * Create a new controller instance.
        *
        * @return void
    */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
