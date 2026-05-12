<?php

namespace App\Http\Controllers;

use App\Models\Nationality\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    public function index()
    {
        $nationalities = Nationality::orderBy('id', 'Desc')->get();

        return view('dashboard.nationalities.index', compact('nationalities'));

    }

    public function create()
    {

        return view('dashboard.nationalities.create');

    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'title' => 'required|string',

        ], [
            'title.required' => 'The Name is required',

        ]);
        try {

            $city = new Nationality();
            $city->title = $request->title;
            $city->save();

            return redirect()->route('nationalities.index')->with(['success' => 'Create Successful']);

        } catch (\Exception $ex) {

            return redirect()->route('nationalities.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    public function edit($id)
    {
        $nationality = Nationality::find($id);

        return view('dashboard.nationalities.edit', compact('nationality'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'name' => 'sometimes|string',

        ], [
            'name.required' => 'The Name is required',
        ]);
        try {
            $nationality = Nationality::findOrFail($id);

            $nationality->title = $request->title;

            $nationality->save();

            return redirect()->route('nationalities.index')->with(['success' => 'Update Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('nationalities.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $nationality = Nationality::findOrFail($id);
            $nationality->delete();

            return redirect()->route('nationalities.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('nationalities.index')->with(['error' => 'There is a problem, try later']);
        }
    }
}
