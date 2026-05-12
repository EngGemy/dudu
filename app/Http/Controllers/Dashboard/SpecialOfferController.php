<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialOfferRequest;
use App\Models\SpecialOffer\SpecialOffer;

class SpecialOfferController extends Controller
{
    public function index()
    {
        $special_offers = SpecialOffer::query()->with('translations')->orderBy('id', 'Desc')->get();

        return view('dashboard.special_offer.index', compact('special_offers'));
    }

    public function create()
    {
        return view('dashboard.special_offer.create');
    }

    public function store(SpecialOfferRequest $request)
    {
        try {
            $data = $request->validated();
            unset($data['image']);
            $data['image'] = uploadimage('special_offer', $request->image);
            $data = $this->injectTranslations($data, ['title', 'slug', 'description']);
            SpecialOffer::updateOrCreate(
                ['status' => $data['status']],
                $data
            );

            return redirect()->route('special_offer.index')->with(['success' => 'Create Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('special_offer.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $special_offer = SpecialOffer::findOrFail($id);

        return view('dashboard.special_offer.edit', compact('special_offer'));
    }

    public function update(SpecialOfferRequest $request, $id)
    {
        try {
            $special_offer = SpecialOffer::findOrFail($id);
            $old_image = $special_offer->image;
            $data = $request->validated();

            if (isset($data['image'])) {
                unset($data['image']);
                $data['image'] = uploadimage('special_offer', $request->image);
                delete_photo(asset('/assets/images/special_offer/'.$old_image));
            }

            $data = $this->injectTranslations($data, ['title', 'slug', 'description']);
            $special_offer->update($data);

            return redirect()->route('special_offer.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('special_offer.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $special_offer = SpecialOffer::findOrFail($id);
            $special_offer->delete();

            return redirect()->route('special_offer.index')->with(['success' => 'Delete Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('special_offer.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    private function injectTranslations(array $data, array $fields): array
    {
        foreach ($fields as $field) {
            $values = $data[$field] ?? [];
            unset($data[$field]);
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
