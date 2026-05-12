<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner\Partner;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::query()->orderBy('id', 'Desc')->get();

        return view('dashboard.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerRequest $request)
    {
        try {
            $data = $request->validated();

            unset($data['image']);
            $data['image'] = uploadimage('partner', $request->image);
            Partner::updateOrCreate(
                ['status' => $data['status']],
                $data
            );

            return redirect()->route('partner.index')->with(['success' => 'Create Successful']);

        } catch (\Exception $ex) {

            return redirect()->route('partner.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);

        return view('dashboard.partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartnerRequest $request, $id)
    {
        try {
            $partner = Partner::findOrFail($id);
            $old_image = $partner->image;
            $data = $request->validated();

            if (isset($data['image'])) {
                unset($data['image']);
                $data['image'] = uploadimage('partner', $request->image);
                delete_photo(asset('/assets/images/partner/'.$old_image));
            }

            $partner->update($data);

            return redirect()->route('partner.index')->with(['success' => 'Update Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('partner.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $partner = Partner::findOrFail($id);
            $partner->delete();

            return redirect()->route('partner.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('partner.index')->with(['error' => 'There is a problem, try later']);
        }
    }
}
