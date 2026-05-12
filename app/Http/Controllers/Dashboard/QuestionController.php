<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::query()->with('translations')->orderBy('id', 'Desc')->get();

        return view('dashboard.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        try {
            $data = $request->validated();
            $data = $this->injectTranslations($data, ['title', 'slug', 'description']);
            Question::create($data);

            return redirect()->route('questions.index')->with(['success' => 'Create Successful']);

        } catch (\Exception $ex) {

            return redirect()->route('questions.index')->with(['error' => 'There is a problem, try later']);
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
        $question = Question::findOrFail($id);

        return view('dashboard.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionRequest $request, $id)
    {
        try {
            $question = Question::findOrFail($id);
            $data = $request->validated();

            $data = $this->injectTranslations($data, ['title', 'slug', 'description']);
            $question->fill($data)->save();

            return redirect()->route('questions.index')->with(['success' => 'Update Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('questions.index')->with(['error' => 'There is a problem, try later']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        try {
            $question = Question::findOrFail($id);
            $question->delete();

            return redirect()->route('questions.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('questions.index')->with(['error' => 'There is a problem, try later']);
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
