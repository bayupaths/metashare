<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\InvitationDesign;

class DataInvitationModelController extends Controller
{
    public function index(Request $request, $slug = null)
    {
        $categories = Category::all();
        if ($slug) {
            $slug = $slug;
            $invitations = InvitationDesign::with(['category'])
                ->whereHas(
                    'category',
                    function ($category) use ($slug) {
                        $category->where('slug', $slug);
                    }
                )->get();
        } else {
            $invitations = InvitationDesign::with(['category'])->get();
        }
        return view('pages.admin.invitation-model', [
            'categories' => $categories,
            'invitations' => $invitations
        ]);
    }
}
