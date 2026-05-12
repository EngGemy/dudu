<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use App\Models\Hotel\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('translations')->orderBy('id', 'Desc')->get();

        return view('dashboard.hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('dashboard.hotels.create');
    }

    public function store(HotelRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            unset($data['photo']);
            $data['photo'] = uploadimage('hotels', $request->photo);
        }
        $data = $this->injectTranslations($data, ['name', 'address']);
        Hotel::create($data);

        return redirect()->route('hotels.index')->with(['success' => 'Create Successful']);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $hotel = Hotel::findOrFail($id);

        return view('dashboard.hotels.edit', compact('hotel'));
    }

    public function update(HotelRequest $request, $id)
    {
        try {
            $hotel = Hotel::findOrFail($id);
            $data = $request->validated();
            if ($request->hasFile('photo')) {
                $old_photo = $hotel->getRawOriginal('photo');
                unset($data['photo']);
                $data['photo'] = uploadimage('hotels', $request->photo);
                delete_photo(asset('/assets/images/hotels/'.$old_photo));
            }
            $data = $this->injectTranslations($data, ['name', 'address']);
            $hotel->fill($data)->save();

            return redirect()->route('hotels.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('hotels.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $hotel = Hotel::findOrFail($id);
            $hotel->delete();

            return redirect()->route('hotels.index')->with(['success' => 'Delete Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('hotels.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    private function injectTranslations(array $data, array $fields): array
    {
        foreach ($fields as $field) {
            $values = $data[$field] ?? [];
            unset($data[$field]);
            if (! is_array($values)) {
                continue;
            }
            foreach ($values as $locale => $value) {
                if (! isset($data[$locale])) {
                    $data[$locale] = [];
                }
                $data[$locale][$field] = $value;
            }
        }

        return $data;
    }
}
