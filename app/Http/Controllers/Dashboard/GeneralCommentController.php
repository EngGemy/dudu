<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralCommentRequest;
use App\Models\GeneralComment\GeneralComment;

class GeneralCommentController extends Controller
{
    public function index()
    {
        $general_comments = GeneralComment::query()->with('translations')->orderBy('id', 'Desc')->get();

        return view('dashboard.general_comments.index', compact('general_comments'));
    }

    public function getComments()
    {
        $general_comments = GeneralComment::query()->orderBy('id', 'Desc')->get();

        return view('front.general_comments', compact('general_comments'));
    }

    public function create()
    {
        return view('dashboard.general_comments.create');
    }

    public function store(GeneralCommentRequest $request)
    {
        try {
            $data = $request->validated();
            unset($data['photo']);
            $data['photo'] = uploadimage('general-comments', $request->photo);
            $data = $this->injectTranslations($data, ['username', 'comment']);
            GeneralComment::create($data);

            return redirect()->route('general_comments.index')->with(['success' => 'Create Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('general_comments.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $general_comment = GeneralComment::findOrFail($id);

        return view('dashboard.general_comments.edit', compact('general_comment'));
    }

    public function update(GeneralCommentRequest $request, $id)
    {
        try {
            $general_comment = GeneralComment::findOrFail($id);
            $old_icon = $general_comment->photo;
            $data = $request->validated();
            if (isset($data['photo'])) {
                unset($data['photo']);
                $data['photo'] = uploadimage('general-comments', $request->photo);
            }

            $data = $this->injectTranslations($data, ['username', 'comment']);
            $general_comment->update($data);

            return redirect()->route('general_comments.index')->with(['success' => 'Update Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('general_comments.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function delete($id)
    {
        try {
            $service = GeneralComment::findOrFail($id);
            $service->delete();

            return redirect()->route('general_comments.index')->with(['success' => 'Delete Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('general_comments.index')->with(['error' => 'There is a problem, try later']);
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
