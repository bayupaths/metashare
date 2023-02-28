<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\InvitationProcess;
use App\Models\InvitationDesign;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $user = new User();
        $admin = $user->where('status', 1)->count();
        $customer =$user->where('roles', 'CUSTOMER')->count();
        $invitation = InvitationDesign::all()->count();

        return view('pages.su_admin.dashboard.index',[
            'admin' => $admin,
            'customer' => $customer,
            'invitation' => $invitation
        ]);
    }
}
