<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Exclusion;
use App\Models\Hotel\Hotel;
use App\Models\Inclusion;
use App\Models\IterationAttribute;
use App\Models\Tip;
use App\Models\Tour;
use App\Models\TourExclusion;
use App\Models\TourFeature;
use App\Models\TourGroup;
use App\Models\TourHighlight;
use App\Models\TourInclusion;
use App\Models\TourIteration;
use App\Models\TourOverview;
use App\Models\TourTip;
use App\Models\TourType;
use App\Models\TravelService\TravelService;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::orderBy('id', 'Desc')->get();

        return view('dashboard.tours.index', compact('tours'));

    }

    public function create()
    {
        $tips = Tip::get();
        $hotels = Hotel::get();
        $services = TravelService::get();
        $cities = City::get();
        $groups = TourGroup::get();
        $types = TourType::get();
        $categories = Category::with(['childrens' => function ($q) {
            $q->where('is_active', 1);
        }])->where('is_active', 1)->parent()->get();
        $inclusions = Inclusion::get();
        $exclusions = Exclusion::get();

        return view('dashboard.tours.create', compact('tips', 'hotels', 'services', 'groups', 'types', 'cities', 'categories', 'inclusions', 'exclusions'));

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
            'tip_info' => 'nullable|array',
            'tip_info.en' => 'required|string',
            'tip_info.zh' => 'nullable|string',
            'tip_info.zh-Hant' => 'nullable|string',
            'meta_title' => 'nullable|array',
            'meta_title.*' => 'nullable|string|max:255',
            'meta_description' => 'nullable|array',
            'meta_description.*' => 'nullable|string',
            'photo' => 'required',
            'price' => 'required|numeric',
            'days' => 'required|numeric',
            'nights' => 'required|numeric',
            'location_from' => 'required|numeric|exists:cities,id',
            'location_to' => 'required|numeric|exists:cities,id',
            'tour_type' => 'required|numeric',
            'tour_group' => 'required|numeric',
            'availability' => 'required|',
            'cancellation' => 'required|',
            'features' => 'required|min:1',
            'highlight_names' => 'required|min:1',
            'tour_tips' => 'required|min:1',

        ], [
            'name.en.required' => 'The English name is required',
            'description.en.required' => 'The English description is required',
            'tip_info.en.required' => 'The English tip info is required',

        ]);
        //        return $request;
        //        try {
        if (! $request->has('publish')) {
            $request->request->add(['publish' => 0]);
        } else {
            $request->request->add(['publish' => 1]);
        }

        if (! $request->has('is_active')) {
            $request->request->add(['is_active' => 0]);
        } else {
            $request->request->add(['is_active' => 1]);
        }
        $values = [];
        $values['days'] = $request->days;
        $values['nights'] = $request->nights;
        $values['location_from'] = $request->location_from;
        $values['location_to'] = $request->location_to;
        $values['tour_type'] = $request->tour_type;
        $values['tour_group'] = $request->tour_group;
        $values['availability'] = $request->availability;
        $values['cancellation'] = $request->cancellation;
        $filename = uploadimage('tours', $request->photo);

        $data = $request->except('photo');
        $data['photo'] = $filename;
        $data = $this->injectTranslations($data, ['name', 'description', 'tip_info', 'meta_title', 'meta_description']);

        $tour = Tour::create($data);
        if ($request->has('services')) {
            $tour->services()->attach($request->services);
        }
        if ($request->has('categories')) {
            $tour->categories()->attach($request->categories);
        }
        foreach ($request->highlight_names as $key => $value) {
            $highlight = new TourHighlight();
            $highlight->tour_id = $tour->id;
            $highlight->name = $value;
            $highlight->values = json_encode($request->highlight_values[$key]);
            $highlight->save();
        }

        $feature = new TourFeature();
        $feature->tour_id = $tour->id;
        $feature->values = json_encode($request->features);
        $feature->save();

        $tip = new TourTip();
        $tip->tour_id = $tour->id;
        $tip->values = json_encode($request->tour_tips);
        $tip->save();

        $Inclusion = new TourInclusion();
        $Inclusion->tour_id = $tour->id;
        $Inclusion->values = json_encode($request->inclusions);
        $Inclusion->save();

        $Exclusion = new TourExclusion();
        $Exclusion->tour_id = $tour->id;
        $Exclusion->values = json_encode($request->exclusions);
        $Exclusion->save();

        $overview = new TourOverview();
        $overview->tour_id = $tour->id;
        $overview->values = json_encode($values);
        $overview->save();

        return redirect()->route('tours.index')->with(['success' => 'Create Successful']);

        //        } catch (\Exception $ex) {
        //
        //            return redirect()->route('tours.index')->with(['error' => 'There is a problem, try later']);
        //        }

    }

    public function edit($id)
    {
        $tour = Tour::find($id);
        $tips = Tip::get();
        $hotels = Hotel::get();
        $services = TravelService::get();
        $groups = TourGroup::get();
        $types = TourType::get();
        $categories = Category::with(['childrens' => function ($q) {
            $q->where('is_active', 1);
        }])->where('is_active', 1)->parent()->get();
        $cities = City::get();
        $inclusions = Inclusion::get();
        $exclusions = Exclusion::get();
        $overviews = json_decode($tour->tour_overviews->translate(app()->getLocale(), true)->values ?? '');

        return view('dashboard.tours.edit', compact('tour', 'hotels', 'services', 'types', 'groups', 'cities', 'tips', 'categories', 'overviews', 'exclusions', 'inclusions', 'overviews'));
    }

    public function update(Request $request, $id)
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
            'tip_info' => 'nullable|array',
            'tip_info.en' => 'required|string',
            'tip_info.zh' => 'nullable|string',
            'tip_info.zh-Hant' => 'nullable|string',
            'meta_title' => 'nullable|array',
            'meta_title.*' => 'nullable|string|max:255',
            'meta_description' => 'nullable|array',
            'meta_description.*' => 'nullable|string',
            'price' => 'required|numeric',
            'days' => 'required|numeric',
            'nights' => 'required|numeric',
            'location_from' => 'required|numeric|exists:cities,id',
            'location_to' => 'required|numeric|exists:cities,id',
            'tour_type' => 'required|numeric',
            'tour_group' => 'required|numeric',
            'availability' => 'required|',
            'cancellation' => 'required|',
            'features' => 'required|min:1',
            'highlight_names' => 'required|min:1',
            'tour_tips' => 'required|min:1',

        ], [
            'name.en.required' => 'The English name is required',
            'description.en.required' => 'The English description is required',
            'tip_info.en.required' => 'The English tip info is required',

        ]);
        //        return $request;
        //        try {

        if (! $request->has('publish')) {
            $request->request->add(['publish' => 0]);
        } else {
            $request->request->add(['publish' => 1]);
        }

        if (! $request->has('is_active')) {
            $request->request->add(['is_active' => 0]);
        } else {
            $request->request->add(['is_active' => 1]);
        }
        $values = [];
        $values['start_date'] = $request->start_date;
        $values['end_date'] = $request->end_date;
        $values['days'] = $request->days;
        $values['nights'] = $request->nights;
        $values['location_from'] = $request->location_from;
        $values['location_to'] = $request->location_to;
        $values['tour_type'] = $request->tour_type;
        $values['tour_group'] = $request->tour_group;
        $values['availability'] = $request->availability;
        $values['cancellation'] = $request->cancellation;

        $tour = Tour::find($id);

        $overview = TourOverview::where('tour_id', $id)->first();
        $overview->values = json_encode($values);
        $overview->save();
        if ($request->has('photo')) {
            $filename = uploadimage('tours', $request->photo);
            $tour->photo = $filename;
        }
        if ($request->has('services')) {
            $tour->services()->sync($request->services);
        }
        if ($request->has('categories')) {
            $tour->categories()->sync($request->categories);
        }

        $data = $request->all();
        $data = $this->injectTranslations($data, ['name', 'description', 'tip_info', 'meta_title', 'meta_description']);
        $tour->fill($data)->save();
        $tourHighlightsIds = $request->input('tour_highlights_id', []);
        $highlightNames = $request->input('highlight_names', []);
        $highlightValues = $request->input('highlight_values', []);
        $tourHighlights = [];
        $tour = Tour::findOrFail($id);
        $tourHighlights = [];
        $tour->tour_highlights()->whereNotIn('id', $tourHighlightsIds)->delete();

        foreach ($highlightNames as $key => $value) {

            if (array_key_exists($key, $tourHighlightsIds)) {
                $highlight = TourHighlight::findOrFail($tourHighlightsIds[$key]);
            } else {
                $highlight = new TourHighlight();
                $highlight->tour_id = $tour->id;
            }

            $highlight->name = $value;

            // Prepare the values for the highlight
            $values = $highlightValues[$key] ?? [];
            $highlight->values = json_encode($values);

            $highlight->save();

            $tourHighlights[] = $highlight;
        }

        $featureValues = $request->input('features', []);
        $tour = Tour::findOrFail($id);
        $tourFeature = $tour->tour_features()->firstOrNew([]);
        $tourFeature->values = json_encode($featureValues);
        $tourFeature->save();

        $tip = TourTip::where('tour_id', $id)->first();
        $tip->values = json_encode($request->tour_tips);
        $tip->save();

        $Inclusion = TourInclusion::where('tour_id', $id)->first();
        $Inclusion->values = json_encode($request->inclusions);
        $Inclusion->save();

        $Exclusion = TourExclusion::where('tour_id', $id)->first();
        $Exclusion->values = json_encode($request->exclusions);
        $Exclusion->save();

        return redirect()->route('tours.index')->with(['success' => 'Update Successful']);

        //        } catch (\Exception $ex) {
        //
        //            return redirect()->route('tours.index')->with(['error' => 'There is a problem, try later']);
        //        }

    }

    public function delete($id)
    {
        try {
            $tour = Tour::findOrFail($id);
            $tour->tour_translations()->delete();
            $tour->galleries()->delete();
            $tour->comments()->delete();
            if ($tour->tour_highlights) {
                foreach ($tour->tour_highlights as $high) {
                    $high->tour_highlights_translations()->delete();
                }
            }

            $tour->tour_highlights()->delete();

            $tour->tour_tips()->delete();

            if ($tour->tour_overviews) {
                $tour->tour_overviews()->tour_overviews_translations()->delete();
            }

            $tour->tour_overviews()->delete();
            if ($tour->tour_features) {
                $tour->tour_features->tour_features_translations()->delete();
            }
            $tour->tour_features()->delete();
            $tour->tour_exclusions()->delete();
            $tour->tour_inclusions()->delete();

            $iterations = $tour->tour_iterations()->get();
            foreach ($iterations as $iteration) {
                foreach ($iteration->iteration_attributes as $tt) {
                    $tt->iteration_attributes_translations()->delete();
                }
                $iteration->iteration_attributes()->delete();

                $iteration->tour_iterations_translations()->delete();

            }
            $tour->delete();

            return redirect()->route('tours.index')->with(['success' => 'Delete Successful']);

        } catch (\Exception $ex) {
            return redirect()->route('tours.index')->with(['error' => 'There is a problem, try later']);
        }
    }

    public function options($id)
    {

        $category = Category::with('childrens')->find($id);
        if ($category) {
            return response()->json([
                'status' => true,
                'categories' => $category->childrens,
                'msg' => 'تم الحفظ بنجاح',
            ]);
        } else {
            return response()->json([
                'status' => false,

                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
        }
    }

    public function iteration($id)
    {
        $iterations = TourIteration::with(['iteration_attributes'])->where('tour_id', $id)->get();

        return view('dashboard.tours.itertion', compact('iterations', 'id'));

    }

    public function iteration_update(Request $request)
    {

        $this->validate($request, [

            'big_title' => 'required|array|min:1',
            'big_content' => 'required|array|min:1',

        ], [

        ]);
        try {

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
            $tour = Tour::findOrFail($request->tour_id);
            $tourHighlights = [];
            $iterations = $tour->tour_iterations()->whereNotIn('id', $iterations_id)->get();
            foreach ($iterations as $iteration) {
                foreach ($iteration->iteration_attributes as $tt) {
                    $tt->iteration_attributes_translations()->delete();
                }
                $iteration->iteration_attributes()->delete();

                $iteration->tour_iterations_translations()->delete();

            }
            $tour->tour_iterations()->whereNotIn('id', $iterations_id)->delete();

            foreach ($big_title as $key => $value) {

                if (array_key_exists($key, $iterations_id)) {
                    $iteration = TourIteration::findOrFail($iterations_id[$key]);
                    if (isset($request->big_image[$key])) {
                        $iteration->photo = uploadimage('iteration', $request->big_image[$key]);
                    }
                    $iteration->title = $request->big_title[$key];
                    $iteration->content = $request->big_content[$key];
                    $iteration->description = $request->big_description[$key];
                    $iteration->save();
                    if (array_key_exists($key, $small_title)) {
                        foreach ($small_title[$key] as $k => $val) {

                            if (array_key_exists($key, $iterations_attributes_ids)) {
                                if (array_key_exists($k, $iterations_attributes_ids[$key])) {

                                    $attrs = IterationAttribute::whereNotIn('id', $iterations_attributes_ids[$key])->where('tour_iteration_id', $iterations_id[$key])->get();
                                    foreach ($attrs as $att) {
                                        $att->iteration_attributes_translations()->delete();
                                        $att->delete();
                                    }

                                    $IterationAttribute = IterationAttribute::where('id', $iterations_attributes_ids[$key][$k])->first();
                                    if (isset($request->small_image[$key][$k])) {
                                        $IterationAttribute->photo = uploadimage('iteration_attributes', $request->small_image[$key][$k]);
                                    }
                                    $IterationAttribute->title = $val;

                                    $IterationAttribute->description = $request->small_description[$key][$k];
                                    $IterationAttribute->save();

                                } else {

                                    $IterationAttribute = new IterationAttribute();
                                    $IterationAttribute->tour_iteration_id = $iterations_id[$key];

                                    if (isset($request->small_image[$key][$k])) {
                                        $IterationAttribute->photo = uploadimage('iteration_attributes', $request->small_image[$key][$k]);
                                    }
                                    $IterationAttribute->title = $small_title[$key][$k];

                                    $IterationAttribute->description = $request->small_description[$key][$k];
                                    $IterationAttribute->save();

                                }
                            } else {

                                $IterationAttribute = new IterationAttribute();
                                $IterationAttribute->tour_iteration_id = $iterations_id[$key];

                                if (isset($request->small_image[$key][$k])) {
                                    $IterationAttribute->photo = uploadimage('iteration_attributes', $request->small_image[$key][$k]);
                                }
                                $IterationAttribute->title = $small_title[$key][$k];

                                $IterationAttribute->description = $request->small_description[$key][$k];
                                $IterationAttribute->save();
                            }
                        }
                    } else {
                        $attrs = IterationAttribute::where('tour_iteration_id', $iterations_id[$key])->get();
                        foreach ($attrs as $att) {
                            $att->iteration_attributes_translations()->delete();
                            $att->delete();
                        }
                    }
                } else {
                    $iteration = new TourIteration();
                    $iteration->tour_id = $tour->id;
                    if (isset($request->big_image[$key])) {
                        $iteration->photo = uploadimage('iteration', $request->big_image[$key]);
                    }
                    $iteration->title = $request->big_title[$key];
                    $iteration->content = $request->big_content[$key];
                    $iteration->description = $request->big_description[$key];
                    $iteration->save();

                    if (array_key_exists($key, $small_title)) {
                        foreach ($small_title[$key] as $k => $val) {

                            $IterationAttribute = new IterationAttribute();
                            $IterationAttribute->tour_iteration_id = $iteration->id;
                            if (isset($request->small_image[$key][$k])) {
                                $IterationAttribute->photo = uploadimage('iteration_attributes', $request->small_image[$key][$k]);
                            }
                            $IterationAttribute->title = $small_title[$key][$k];

                            $IterationAttribute->description = $request->small_description[$key][$k];
                            $IterationAttribute->save();

                        }
                    }

                }

            }

            return redirect()->route('tours.index')->with(['success' => 'Add Iteration Successful']);
        } catch (\Exception $ex) {
            return redirect()->route('tours.index')->with(['error' => 'There is a problem, try later']);
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
