<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelServiceRequest;
use App\Models\TravelService\TravelService;

class TravelServiceController extends Controller
{
    public function index()
    {
        $travel_services = TravelService::with('translations')->orderBy('id', 'Desc')->get();

        return view('dashboard.travel_service.index', compact('travel_services'));
    }

    public function create()
    {
        return view('dashboard.travel_service.create');
    }

    public function store(TravelServiceRequest $request)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('main_image')) {
                unset($data['main_image']);
                $data['main_image'] = uploadimage('travel_services_images', $request->main_image);
            }
            if ($request->hasFile('icon')) {
                unset($data['icon']);
                $data['icon'] = uploadimage('travel_services_icons', $request->icon);
            }

            $data = $this->injectTranslations($data, ['title', 'description']);

            $service = TravelService::firstOrNew(['status' => $data['status']]);
            $service->fill($data)->save();

            return redirect()->route('travel_service.index')->with(['success' => 'Create Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('travel_service.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $travel_service = TravelService::findOrFail($id);

        return view('dashboard.travel_service.edit', compact('travel_service'));
    }

    public function update(TravelServiceRequest $request, $id)
    {
        try {
            $travel_service = TravelService::findOrFail($id);
            $data = $request->validated();

            if ($request->hasFile('main_image')) {
                unset($data['main_image']);
                $data['main_image'] = uploadimage('travel_services_images', $request->main_image);
            }
            if ($request->hasFile('icon')) {
                unset($data['icon']);
                $data['icon'] = uploadimage('travel_services_icons', $request->icon);
            }

            $data = $this->injectTranslations($data, ['title', 'description']);
            $travel_service->fill($data)->save();

            return redirect()->route('travel_service.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('travel_service.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $travel_service = TravelService::findOrFail($id);
            $travel_service->delete();

            return redirect()->route('travel_service.index')->with(['success' => 'Delete Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('travel_service.index')->with(['error' => 'There is a problem, try later']);
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
