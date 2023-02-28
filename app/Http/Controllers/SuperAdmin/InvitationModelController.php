<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\InvitationDesign;

class InvitationModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        if ($request->categories) {
            $categories = $request->categories;
            $invitations = InvitationDesign::with(['category'])
                ->whereHas(
                    'category',
                    function ($category) use ($categories) {
                        $category->where('slug', $categories);
                    }
                )->get();
        } else {
            $invitations = InvitationDesign::with(['category'])->get();
        }
        return view('pages.su_admin.data.invitation.index', [
            'categories' => $categories,
            'invitations' => $invitations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.su_admin.data.invitation.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:125|unique:invitation_designs,name',
            'price' => 'required|numeric',
            'categories_id' => 'required',
            'cover_one' => 'required|image|max:1024|mimes:jpg,png,jpeg,gif,svg',
            'cover_two' => 'required|image|max:1024|mimes:jpg,png,jpeg,gif,svg'
        ]);

        // rules is validated
        $validated = $validator->validated();
        // check if validation is fails
        if ($validator->fails()) {
            return redirect()->route('invitation.create')->withErrors($validator)->withInput();
        }
        // valid data
        $data = $validated;

        // make unique slug title
        $data['slug'] = Str::slug($validated['name']);

        // make path to view invitation model
        $category = Category::find($request->categories_id);
        $data['code_view'] = 'invitations/' . $category->slug . '/' . $data['slug'] . '/index';
        $data['code_demo'] = 'invitations/' . $category->slug . '/' . $data['slug'] . '/demo';

        // store invitation model to storage
        $data['cover_one'] = $request->file('cover_one')->store('assets/images/models', 'public');
        $data['cover_two'] = $request->file('cover_two')->store('assets/images/models', 'public');

        // elloquent create to model InvitationDesign
        $invitationModel = InvitationDesign::create($data);
        if ($invitationModel) {
            toastr()->success('Invitation Model has been saved successfully!');
            return redirect()->route('invitation.index');
        } else {
            toastr()->error('An error has occurred please try again later.');
            return back();
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
        $categories = Category::all();
        $invitationModel = InvitationDesign::with(['category'])->findOrFail($id);
        return view('pages.su_admin.data.invitation.update', [
            'categories' => $categories,
            'invitationModel' => $invitationModel
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
        $item = InvitationDesign::findOrFail($id);

        // generate validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:125',
            'price' => 'required|numeric',
            'categories_id' => 'required',
            'cover_one' => 'image|max:1024|mimes:jpg,png,jpeg,gif,svg',
            'cover_two' => 'image|max:1024|mimes:jpg,png,jpeg,gif,svg'
        ]);

        // check if validation is fails
        if ($validator->fails()) {
            return redirect()->route('invitation.edit', $item->id)->withErrors($validator)->withInput();
        }

        // rules is validated
        $validated = $validator->validated();

        // store to invitation model
        $data = $validated;
        $data['slug'] = Str::slug($validated['name']);

        // delete cover one image of model invitation
        if ($request->file('cover_one')) {
            if (Storage::disk('public')->exists($item->cover_one)) {
                Storage::disk('public')->delete($item->cover_one);
            }
            $data['cover_one'] = $request->file('cover_one')->store('assets/images/models', 'public');
        }

        // delete cover one image of model invitation
        if ($request->file('cover_two')) {
            if (Storage::disk('public')->exists($item->cover_two)) {
                Storage::disk('public')->delete($item->cover_two);
            }
            $data['cover_two'] = $request->file('cover_two')->store('assets/images/models', 'public');
        }

        // elloquent update to model InvitationDesign
        $item->update($data);
        if ($item) {
            toastr()->success('Invitation Model has been updated successfully!');
            return redirect()->route('invitation.index');
        } else {
            toastr()->error('An error has occurred please try again later.');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = InvitationDesign::findOrFail($id);
        $item->delete();
        toastr()->success('Invitation Model has been deleted successfully!');
        return redirect()->route('invitation.index');
    }
}
