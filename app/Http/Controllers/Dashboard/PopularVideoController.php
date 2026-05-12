<?php

namespace App\Http\Controllers\Dashboard;

use App\Enum\PopularVideoStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\PopularVideoRequest;
use App\Models\PopularVideo\PopularVideo;

class PopularVideoController extends Controller
{
    public function index()
    {
        $popular_videos = PopularVideo::query()->with('translations')->orderBy('id', 'Desc')->get();

        return view('dashboard.popular_videos.index', compact('popular_videos'));
    }

    public function create()
    {
        return view('dashboard.popular_videos.create');
    }

    public function store(PopularVideoRequest $request)
    {
        try {
            $data = $request->validated();
            if (isset($data['status']) && $data['status'] === 'on') {
                $data['status'] = PopularVideoStatus::ACTIVE->value;
            } else {
                $data['status'] = PopularVideoStatus::INACTIVE->value;
            }

            $data = $this->injectTranslations($data, ['title']);
            PopularVideo::create($data);

            return redirect()->route('popular_video.index')->with(['success' => 'Create Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('popular_video.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $popular_video = PopularVideo::findOrFail($id);

        return view('dashboard.popular_videos.edit', compact('popular_video'));
    }

    public function update(PopularVideoRequest $request, $id)
    {
        try {
            $popular_video = PopularVideo::findOrFail($id);
            $data = $request->validated();
            if (isset($data['status']) && $data['status'] === 'on') {
                $data['status'] = PopularVideoStatus::ACTIVE->value;
            } else {
                $data['status'] = PopularVideoStatus::INACTIVE->value;
            }

            $data = $this->injectTranslations($data, ['title']);
            $popular_video->update($data);

            return redirect()->route('popular_video.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('popular_video.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $popular_video = PopularVideo::findOrFail($id);
            $popular_video->delete();

            return redirect()->route('popular_video.index')->with(['success' => 'Delete Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('popular_video.index')->with(['error' => 'There is a problem, try later']);
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
