<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\InvitationProcess;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = User::where('roles', '!=', 'CUSTOMER')->get();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '
                        <div class="flex">
                            <a href="' . route('admin.show', $item->uuid) . '" class="btn btn-sm btn-primary mr-1">
                                <i data-feather="search" class="feather-14" data-toggle="tooltip" title="Detail" data-placement="top"></i>
                            </a>
                            <a href="' . route('admin.edit', $item->uuid) . '" class="btn btn-sm btn-success mr-1">
                                <i data-feather="edit" class="feather-14" data-toggle="tooltip" title="Edit" data-placement="top"></i>
                            </a>
                            <a admin="' . $item->uuid . '" class="btn btn-sm btn-danger delete-admin">
                                <i data-feather="trash-2" class="feather-14" data-toggle="tooltip" title="Hapus" data-placement="top"></i>
                            </a>
                            </form>
                        </div>
                    ';
                })
                ->editColumn('email', function ($item) {
                    return '<a href="mailto:' . $item->email . '" target="_blank" rel="noopener noreferrer">' . $item->email . '</a>';
                })
                ->editColumn('status', function ($item) {
                    return $item->status == 1 ? 'Aktif' : 'Tidak Aktif';
                })
                ->editColumn('created_at', function ($item) {
                    return Carbon::parse($item->created_at)->format('d F Y H:i:s') ?? '-';
                })
                ->editColumn('updated_at', function ($item) {
                    return Carbon::parse($item->updated_at)->format('d F Y H:i:s') ?? '-';
                })
                ->rawColumns(['action', 'email', 'status', 'created_at'])
                ->make();
        }
        return view('pages.su_admin.data.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.su_admin.data.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string|max:100',
            'password' => 'required|string|min:8',
            'roles' => 'required|in:ADMIN,SUPER_ADMIN'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.create')->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $data = $validated;
        $data['password'] = bcrypt($validated['password']);
        $user = User::create($data);
        if ($user) {
            toastr()->success('Data Admin has been saved successfully!');
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $admin = User::where(['uuid' => $uuid])->firstOrFail();
        $processing = InvitationProcess::with([
            'transaction_detail.invitation_design', 'transaction_detail.transaction.user', 'user'
        ])->whereHas('user', function ($user) use ($admin) {
            $user->where('users_id', $admin->id);
        })->get();

        return view('pages.su_admin.data.admin.show', [
            'admin' => $admin,
            'processing' => $processing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $admin = User::where(['uuid' => $uuid])->firstOrFail();
        return view('pages.su_admin.data.admin.update', [
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $admin = User::where(['uuid' => $uuid])->firstOrFail();
        $uniqueEmail = $admin->email != $request->email ? '|unique:users,email' : '';

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'phone_number' => 'required|string|max:15',
            'email' =>  'required|email' . $uniqueEmail,
            'address' => 'required|string|max:100',
            'password' => 'confirmed|min:8',
            'roles' => 'required|in:ADMIN,SUPER_ADMIN'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.edit', $admin->uuid)->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $data = $validated;
        $data['password'] = bcrypt($validated['password']);

        $admin->update($data);
        toastr()->success('Data Admin has been updated successfully!');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $admin = User::where(['uuid' => $uuid])->firstOrFail();
        $admin->delete();
        // toastr()->success('Data Admin has been deleted successfully!');
        // return redirect()->route('admin.index');
    }
}
