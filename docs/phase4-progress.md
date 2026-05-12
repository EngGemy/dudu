# Phase 4 — Admin Form Tri-locale Wiring Progress

## Tier 1 — DONE
- [x] Tour
- [x] Category
- [x] Event
- [x] Blog
- [x] City

## Tier 2 — DONE
- [x] Hotel
- [x] TravelService
- [x] TourType
- [x] TourGroup
- [x] Tip
- [x] Inclusion
- [x] Exclusion

## Tier 3 — DONE (all nested-JSON, deferred to Tier 4)
- [x] TourOverview — TODO added, nested JSON in TourController
- [x] TourIteration — TODO added, flat array in TourController::iteration_update
- [x] TourHighlight — TODO added, flat array (highlight_names[], highlight_values[][]) in tour form
- [x] TourFeature — TODO added, flat array (features[]) in tour form
- [x] IterationAttribute — TODO added, nested in TourIteration management form
- [x] EventOverview — TODO added, nested JSON in EventController
- [x] EventIteration — TODO added, flat array in EventController::iteration_update
- [x] EventInformation — TODO added, inline list form in InformationController (per-row locale-tabs deferred)
- [x] EventInclusion — TODO added, flat JSON array in EventController
- [x] EventExclusion — TODO added, flat JSON array in EventController
- [x] EventIterationAttribute — TODO added, nested in EventIteration management form

## Tier 4 — DEFERRED (nested form redesign required)
- [ ] TourHighlight — requires dynamic JS row cloning per locale
- [ ] TourFeature — requires dynamic JS row cloning per locale
- [ ] TourIteration + IterationAttribute — requires locale-aware iteration management UI
- [ ] EventIteration + EventIterationAttribute — requires locale-aware iteration management UI
- [ ] EventInformation — requires per-row locale-tabs in inline list form
- [ ] TourOverview / EventOverview — values field is JSON blob; schema may need normalization

## Known issues deferred to future phases
- BlogSubHead.name stores JSON-encoded array. Subheaders are not locale-aware. Admins should manage them in their primary content locale only.
- TourHighlight/TourFeature/TourOverview have translation tables but their nested form structures store JSON in the parent. These need form redesign in Tier 3.
- Tour controller had a bug where `$tour = $tour->update(...)` overwrote the model with a boolean. Fixed in Tier 1 commit.
- get_lang() helper falls back en→null only (no zh→zh-Hant chain). Front-end uses Astrotomic's magic property which respects the global fallback chain configured in config/translatable.php.

## Reference implementation
- Model: app/Models/CommunityPost.php
- Controller: app/Http/Controllers/Admin/CommunityPostController.php (injectCaptionTranslations)
- Form: resources/views/admin/community-posts/form.blade.php
- Tier 1 controller pattern: app/Http/Controllers/Dashboard/Events/EventController.php
- Tier 1 form pattern: resources/views/dashboard/events/{create,edit}.blade.php

## Phase 5 — Pages section — DONE
- [x] About Us — wired title, slug, description
- [x] Questions / FAQ — wired title, slug, description
- [x] Careers — wired title, slug, description, meta_title, meta_description
- [x] Sliders — wired title, slug, description

## Phase 6 — DEFERRED (translation tables needed)
No resources in Phase 5 lacked Translatable trait. All 4 models (AboutUs, Question, Career, Slider) already had translation tables and traits.

## Resume instructions
Next session should continue with any remaining admin CRUD resources not yet wired (e.g., Privacy, Terms, Works, Partner, BlogCategory, etc.) or move to front-end translation verification.
