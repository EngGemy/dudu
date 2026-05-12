<?php

namespace App\Http\Controllers\Dashboard\Events;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Event;
use App\Models\EventExclusion;
use App\Models\EventInclusion;
use App\Models\EventIteration;
use App\Models\EventIterationAttribute;
use App\Models\EventOverview;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('id', 'Desc')->get();

        return view('dashboard.events.index', compact('events'));

    }

    public function create()
    {

        $cities = City::get();

        return view('dashboard.events.create', compact('cities'));

    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'nullable|array',
            'name.en' => 'required|string|max:255',
            'name.zh' => 'nullable|string|max:255',
            'name.zh-Hant' => 'nullable|string|max:255',
            'description' => 'nullable|array',
            'description.en' => 'required|string',
            'description.zh' => 'nullable|string',
            'description.zh-Hant' => 'nullable|string',
            'meta_title' => 'nullable|array',
            'meta_title.*' => 'nullable|string|max:255',
            'meta_description' => 'nullable|array',
            'meta_description.*' => 'nullable|string',
            'start_date' => 'required',
            'end_date' => 'required',
            'photo' => 'required',
            'locations' => 'required|',
            'cancellation' => 'required|',

        ], [
            'name.en.required' => 'The English name is required',
            'description.en.required' => 'The English description is required',

        ]);
        //        return $request;
        //        try {
        if (! $request->has('is_active')) {
            $request->request->add(['is_active' => 0]);
        } else {
            $request->request->add(['is_active' => 1]);
        }
        $values = [];
        $values['start_date'] = $request->start_date;
        $values['end_date'] = $request->end_date;
        $values['phone'] = $request->phone;
        $values['website'] = $request->website;
        $values['email'] = $request->email;
        $values['statues'] = $request->statues;
        $values['locations'] = $request->has('locations') ? json_encode($request->locations) : json_encode([]);
        $values['cancellation'] = $request->cancellation;
        $filename = uploadimage('events', $request->photo);

        $data = $request->except('photo');
        $data['photo'] = $filename;
        $data = $this->injectTranslations($data, ['name', 'description', 'meta_title', 'meta_description']);

        $event = Event::create($data);

        $Inclusion = new EventInclusion();
        $Inclusion->event_id = $event->id;
        $Inclusion->values = json_encode($request->inclusions);
        $Inclusion->save();

        $Exclusion = new EventExclusion();
        $Exclusion->event_id = $event->id;
        $Exclusion->values = json_encode($request->exclusions);
        $Exclusion->save();

        $overview = new EventOverview();
        $overview->event_id = $event->id;
        $overview->values = json_encode($values);
        $overview->save();

        return redirect()->route('events.index')->with(['success' => 'Create Successful']);

        //        } catch (\Exception $ex) {
        //
        //            return redirect()->route('events.index')->with(['error' => 'There is a problem, try later']);
        //        }

    }

    public function edit($id)
    {
        $event = Event::find($id);

        //        return json_decode($tour->tour_tips->values);
        //      return  array(json_decode($tour->tour_tips->values));

        $cities = City::get();

        $overviews = $event->event_overviews
            ? json_decode($event->event_overviews->translate(app()->getLocale(), true)->values ?? '')
            : null;

        return view('dashboard.events.edit', compact('event', 'cities', 'overviews'));
    }

    public function update(Request $request, $id)
    {
        //        return $request;

        $this->validate($request, [
            'name' => 'nullable|array',
            'name.en' => 'required|string|max:255',
            'name.zh' => 'nullable|string|max:255',
            'name.zh-Hant' => 'nullable|string|max:255',
            'description' => 'nullable|array',
            'description.en' => 'required|string',
            'description.zh' => 'nullable|string',
            'description.zh-Hant' => 'nullable|string',
            'meta_title' => 'nullable|array',
            'meta_title.*' => 'nullable|string|max:255',
            'meta_description' => 'nullable|array',
            'meta_description.*' => 'nullable|string',
            'locations' => 'required|',
            'cancellation' => 'required|',

        ], [
            'name.en.required' => 'The English name is required',
            'description.en.required' => 'The English description is required',

        ]);
        //        return $request;
        //        try {
        if (! $request->has('is_active')) {
            $request->request->add(['is_active' => 0]);
        } else {
            $request->request->add(['is_active' => 1]);
        }
        $values = [];
        $values['start_date'] = $request->start_date;
        $values['end_date'] = $request->end_date;
        $values['phone'] = $request->phone;
        $values['website'] = $request->website;
        $values['email'] = $request->email;
        $values['statues'] = $request->statues;
        $values['locations'] = $request->has('locations') ? json_encode($request->locations) : json_encode([]);

        $values['cancellation'] = $request->cancellation;

        $event = Event::find($id);

        $overview = EventOverview::where('event_id', $id)->first();
        $overview->values = json_encode($values);
        $overview->save();
        if ($request->has('photo')) {
            $filename = uploadimage('events', $request->photo);
            $event->photo = $filename;
        }

        $data = $request->except('photo');
        $data = $this->injectTranslations($data, ['name', 'description', 'meta_title', 'meta_description']);
        $event->fill($data)->save();

        $Inclusion = EventInclusion::where('event_id', $id)->first();
        $Inclusion->values = json_encode($request->inclusions);
        $Inclusion->save();

        $Exclusion = EventExclusion::where('event_id', $id)->first();
        $Exclusion->values = json_encode($request->exclusions);
        $Exclusion->save();

        return redirect()->route('events.index')->with(['success' => 'Update Successful']);

        //        } catch (\Exception $ex) {
        //
        //            return redirect()->route('events.index')->with(['error' => 'There is a problem, try later']);
        //        }

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

    public function delete($id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->event_translations()->delete();
            $event->galleries()->delete();
            if ($event->event_exclusions) {
                $event->event_exclusions->event_exclusions_translations()->delete();
            }
            $event->event_exclusions()->delete();
            if ($event->event_inclusions) {
                $event->event_inclusions->event_inclusions_translations()->delete();

            }
            $event->event_inclusions()->delete();
            if ($event->event_overviews) {
                $event->event_overviews->event_overviews_translations()->delete();

            }
            $event->event_overviews()->delete();

            $iterations = $event->event_iterations()->get();
            foreach ($iterations as $iteration) {
                foreach ($iteration->event_iteration_attributes as $tt) {
                    $tt->event_iteration_attributes_translations()->delete();
                }
                $iteration->event_iteration_attributes()->delete();

                $iteration->event_iterations_translations()->delete();

            }
            $event->delete();

            return redirect()->route('events.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('events.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function iteration($id)
    {
        $iterations = EventIteration::with(['event_iteration_attributes'])->where('event_id', $id)->get();

        return view('dashboard.events.itertion', compact('iterations', 'id'));

    }

    public function iteration_update(Request $request)
    {

        $this->validate($request, [

            'big_title' => 'required|array|min:1',
            'big_content' => 'required|array|min:1',

        ], [

        ]);
        //        try {

        if ($request->has('iterations_attributes_id')) {
            $iterations_attributes_ids = $request->iterations_attributes_id;
        } else {
            $iterations_attributes_ids = [];

        }

        $iterations_id = $request->input('iterations_id', []);
        $big_title = $request->big_title;
        $small_title = $request->input('small_title', []);
        $highlightValues = $request->input('big_description', []);
        $tourHighlights = [];
        $event = Event::findOrFail($request->event_id);
        $tourHighlights = [];
        $iterations = $event->event_iterations()->whereNotIn('id', $iterations_id)->get();
        foreach ($iterations as $iteration) {
            foreach ($iteration->event_iteration_attributes as $tt) {
                $tt->event_iteration_attributes_translations()->delete();
            }
            $iteration->event_iteration_attributes()->delete();

            $iteration->event_iterations_translations()->delete();

        }
        $event->event_iterations()->whereNotIn('id', $iterations_id)->delete();

        foreach ($big_title as $key => $value) {

            if (array_key_exists($key, $iterations_id)) {
                $iteration = EventIteration::findOrFail($iterations_id[$key]);
                if (isset($request->big_image[$key])) {
                    $iteration->photo = uploadimage('event_iteration', $request->big_image[$key]);
                }
                $iteration->title = $request->big_title[$key];
                $iteration->content = $request->big_content[$key];
                $iteration->description = $request->big_description[$key];
                $iteration->save();
                if (array_key_exists($key, $small_title)) {
                    foreach ($small_title[$key] as $k => $val) {

                        if (array_key_exists($key, $iterations_attributes_ids)) {
                            if (array_key_exists($k, $iterations_attributes_ids[$key])) {

                                $attrs = EventIterationAttribute::whereNotIn('id', $iterations_attributes_ids[$key])->where('event_iteration_id', $iterations_id[$key])->get();
                                foreach ($attrs as $att) {
                                    $att->event_iteration_attributes_translations()->delete();
                                    $att->delete();
                                }

                                $IterationAttribute = EventIterationAttribute::where('id', $iterations_attributes_ids[$key][$k])->first();
                                if (isset($request->small_image[$key][$k])) {
                                    $IterationAttribute->photo = uploadimage('event_iteration_attributes', $request->small_image[$key][$k]);
                                }
                                $IterationAttribute->title = $val;

                                $IterationAttribute->description = $request->small_description[$key][$k];
                                $IterationAttribute->save();

                            } else {

                                $IterationAttribute = new EventIterationAttribute();
                                $IterationAttribute->event_iteration_id = $iterations_id[$key];

                                if (isset($request->small_image[$key][$k])) {
                                    $IterationAttribute->photo = uploadimage('event_iteration_attributes', $request->small_image[$key][$k]);
                                }
                                $IterationAttribute->title = $small_title[$key][$k];

                                $IterationAttribute->description = $request->small_description[$key][$k];
                                $IterationAttribute->save();

                            }
                        } else {

                            $IterationAttribute = new EventIterationAttribute();
                            $IterationAttribute->event_iteration_id = $iterations_id[$key];

                            if (isset($request->small_image[$key][$k])) {
                                $IterationAttribute->photo = uploadimage('event_iteration_attributes', $request->small_image[$key][$k]);
                            }
                            $IterationAttribute->title = $small_title[$key][$k];

                            $IterationAttribute->description = $request->small_description[$key][$k];
                            $IterationAttribute->save();
                        }
                    }
                } else {
                    $attrs = EventIterationAttribute::where('event_iteration_id', $iterations_id[$key])->get();
                    foreach ($attrs as $att) {
                        $att->event_iteration_attributes_translations()->delete();
                        $att->delete();
                    }
                }
            } else {
                $iteration = new EventIteration();
                $iteration->event_id = $event->id;
                if (isset($request->big_image[$key])) {
                    $iteration->photo = uploadimage('event_iteration', $request->big_image[$key]);
                }
                $iteration->title = $request->big_title[$key];
                $iteration->content = $request->big_content[$key];
                $iteration->description = $request->big_description[$key];
                $iteration->save();

                if (array_key_exists($key, $small_title)) {
                    foreach ($small_title[$key] as $k => $val) {

                        $IterationAttribute = new EventIterationAttribute();
                        $IterationAttribute->event_iteration_id = $iteration->id;
                        if (isset($request->small_image[$key][$k])) {
                            $IterationAttribute->photo = uploadimage('event_iteration_attributes', $request->small_image[$key][$k]);
                        }
                        $IterationAttribute->title = $small_title[$key][$k];

                        $IterationAttribute->description = $request->small_description[$key][$k];
                        $IterationAttribute->save();

                    }
                }

            }

        }

        return redirect()->route('events.index')->with(['success' => 'Add Iteration Successful']);
        //        } catch (\Exception $ex) {
        //            return redirect()->route('events.index')->with(['error' => 'There is a problem, try later']);
        //        }
    }
}
