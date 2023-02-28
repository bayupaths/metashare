<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::where('roles', 'CUSTOMER')->get();
        return view('pages.su_admin.data.customer.index', [
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.su_admin.data.customer.create');
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
            'name' => 'required|string|max:50|min:3',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|numeric',
            'address' => 'required|string|max:125|min:5',
            'password' => 'required|string|min:8',
            'photos' => 'image|max:1024|mimes:jpg,png,jpeg,gif,svg'
        ]);

        if ($validator->fails()) {
            return redirect()->route('customer.create')->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $data = $validated;

        if ($request->file('photos')) {
            $data['photos'] = $request->file('photos')->store('assets/images/profiles', 'public');
        }

        $data['password'] = bcrypt($validated['password']);
        $user = User::create($data);
        if ($user) {
            toastr()->success('Data customer has been saved successfully!');
            return redirect()->route('customer.index');
        } else {
            return redirect()->route('customer.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('pages.su_admin.data.customer.update', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = User::findOrFail($id);
        $uniqueEmail = $item->email != $request->email ? '|unique:users,email' : '';

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50|min:3',
            'email' => 'required|email' . $uniqueEmail,
            'phone_number' => 'required|numeric',
            'address' => 'required|string|max:125|min:5',
            'password' => 'confirmed|min:8',
            'photos' => 'image|max:1024|mimes:jpg,png,jpeg,gif,svg'
        ]);

        if ($validator->fails()) {
            return redirect()->route('customer.edit', $item->id)->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $data = $validated;

        if ($request->file('photos')) {
            if (Storage::disk('public')->exists($item->photos)) {
                Storage::disk('public')->delete($item->photos);
            }
            $data['photos'] = $request->file('photos')->store('assets/images/profiles', 'public');
        }

        if ($request->password) {
            $data['password'] = bcrypt($validated['password']);
        }

        $item->update($data);
        toastr()->success('Data customer has been updated successfully!');
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();
        toastr()->success('Data customer has been deleted successfully!');
        return redirect()->route('customer.index');
    }
}
