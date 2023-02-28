<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InvitationProcess;

class DataAdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.data.admin.index', [
            'admins' =>  $admins = User::where('roles', 'ADMIN')
                ->orderBy('name')
                ->get()
        ]);
    }

    public function show($id)
    {
        $admin = User::findOrFail($id);
        $processing = InvitationProcess::with([
            'transaction_detail.model_invitation', 'transaction_detail.transaction.user', 'user'
        ])->whereHas('user', function ($user) use ($admin) {
            $user->where('users_id', $admin->id);
        })->get();

        return view('pages.admin.data.admin.show', [
            'admin' => $admin,
            'processing' => $processing
        ]);
    }
}
