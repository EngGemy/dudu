<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()->with('translations')->orderBy('id', 'Desc')->get();

        return view('dashboard.services.index', compact('services'));
    }

    public function create()
    {
        return view('dashboard.services.create');
    }

    public function store(ServiceRequest $request)
    {
        try {
            $data = $request->validated();
            unset($data['icon']);
            $data['icon'] = uploadimage('services', $request->icon);
            $data = $this->injectTranslations($data, ['title', 'slug', 'description', 'meta_title', 'meta_description']);
            Service::create($data);

            return redirect()->route('services.index')->with(['success' => 'Create Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('services.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $service = Service::findOrFail($id);

        return view('dashboard.services.edit', compact('service'));
    }

    public function update(ServiceRequest $request, $id)
    {
        try {
            $service = Service::findOrFail($id);
            $data = $request->validated();
            if (isset($data['icon'])) {
                unset($data['icon']);
                $data['icon'] = uploadimage('services', $request->icon);
            }

            $data = $this->injectTranslations($data, ['title', 'slug', 'description', 'meta_title', 'meta_description']);
            $service->update($data);

            return redirect()->route('services.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('services.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();

            return redirect()->route('services.index')->with(['success' => 'Delete Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('services.index')->with(['error' => 'There is a problem, try later']);
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
