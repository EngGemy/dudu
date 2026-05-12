# i18n Content Entry Guide

Covers tri-locale content entry (EN / ZH / ZH-Hant) in the admin after Phase 4 wiring is complete.

---

## 1. Priority Order

Enter translations in this order. Items earlier in the list are depended on by items later, so filling them first means you won't have to come back to assign dropdowns.

### Tier A — Taxonomy (enter first)
These are shared across many records. Enter all three locales before touching Tours or Events.

| # | Resource | Why first |
|---|----------|-----------|
| 1 | **Categories** | Used for tour/event/blog filtering and navigation |
| 2 | **Tour Types** | Dropdown on tour form |
| 3 | **Tour Groups** | Dropdown on tour form |
| 4 | **Cities** | Location field on tours and events |
| 5 | **Inclusions** | Assigned to tours; shared across many |
| 6 | **Exclusions** | Same as inclusions |
| 7 | **Tips** | Assigned to tours |

### Tier B — Core Products (highest user-facing impact)

| # | Resource | Notes |
|---|----------|-------|
| 8 | **Tours** | Most complex form — name, summary, meta fields. Fill Tier A first so dropdowns are populated. |
| 9 | **Events** | Same pattern as Tours |

### Tier C — Supporting Content

| # | Resource | Notes |
|---|----------|-------|
| 10 | **Hotels** | Linked from tour detail pages; name + address both need translating |
| 11 | **Blogs** | Content marketing — 6 translated fields including meta |
| 12 | **Travel Services** | Service landing page titles and descriptions |

---

## 2. Recommended Translation Tools

### Primary — DeepL
- Web: https://www.deepl.com/translator
- API: available via `DeepLService` in `app/Services/DeepLService.php` (already integrated)
- Use the Translation Manager at `/en/cp_admins/translations` to auto-fill language files via DeepL

### For Simplified Chinese (ZH)
1. DeepL (best quality for EN → ZH)
2. Google Translate as a cross-check for ambiguous phrasing
3. Have a native speaker review tour/event names — DeepL can produce awkward proper-noun transliterations

### For Traditional Chinese (ZH-Hant)
1. Translate EN → ZH first, then use DeepL or OpenCC to convert ZH → ZH-Hant
2. Do **not** paste Simplified Chinese into the ZH-Hant tab — they are separate locales and the fallback chain does not automatically convert between them
3. Common differences to watch: 旅游 (ZH) → 旅遊 (ZH-Hant), 酒店 (ZH) → 飯店/旅館 (ZH-Hant)

### Meta fields (meta_title / meta_description)
- Translate these separately — do not reuse the tour name verbatim
- ZH meta_title max 30 characters; ZH-Hant same
- DeepL handles SEO-style phrasing well if you give it the EN version

---

## 3. Admin URLs

All URLs assume you are logged in and the locale prefix is `/en/`. Swap `/en/` for `/zh/` or `/zh-Hant/` if you want to test locale-specific admin rendering (the admin stays in EN for data entry).

### Tier A — Taxonomy

| Resource | Index (list + badges) | Create | Edit |
|----------|----------------------|--------|------|
| Categories | `/en/cp_admins/categories` | `/en/cp_admins/categories/create` | `/en/cp_admins/categories/edit/{id}` |
| Tour Types | `/en/cp_admins/tour_type` | `/en/cp_admins/tour_type/create` | `/en/cp_admins/tour_type/edit/{id}` |
| Tour Groups | `/en/cp_admins/tour_group` | `/en/cp_admins/tour_group/create` | `/en/cp_admins/tour_group/edit/{id}` |
| Cities | `/en/cp_admins/cities` | `/en/cp_admins/cities/create` | `/en/cp_admins/cities/edit/{id}` |
| Inclusions | `/en/cp_admins/inclusions` | `/en/cp_admins/inclusions/create` | `/en/cp_admins/inclusions/edit/{id}` |
| Exclusions | `/en/cp_admins/exclusions` | `/en/cp_admins/exclusions/create` | `/en/cp_admins/exclusions/edit/{id}` |
| Tips | `/en/cp_admins/tips` | `/en/cp_admins/tips/create` | `/en/cp_admins/tips/edit/{id}` |

### Tier B — Core Products

| Resource | Index | Create | Edit |
|----------|-------|--------|------|
| Tours | `/en/cp_admins/tours` | `/en/cp_admins/tours/create` | `/en/cp_admins/tours/edit/{id}` |
| Events | `/en/cp_admins/events` | `/en/cp_admins/events/create` | `/en/cp_admins/events/edit/{id}` |

### Tier C — Supporting Content

| Resource | Index | Create | Edit |
|----------|-------|--------|------|
| Hotels | `/en/cp_admins/hotels` | `/en/cp_admins/hotels/create` | `/en/cp_admins/hotels/edit/{id}` |
| Blogs | `/en/cp_admins/blogs` | `/en/cp_admins/blogs/create` | `/en/cp_admins/blogs/edit/{id}` |
| Travel Services | `/en/cp_admins/travel_service` | `/en/cp_admins/travel_service/create` | `/en/cp_admins/travel_service/edit/{id}` |

---

## 4. Verifying a Translation on the Front-End

### Step 1 — Switch the locale prefix in the URL
The site is locale-prefixed. To view ZH:
```
/en/tours/details/my-tour-slug  →  /zh/tours/details/my-tour-slug
/en/blogs/my-blog-slug          →  /zh/blogs/my-blog-slug
/en/events                      →  /zh/events
```

For Traditional Chinese:
```
/zh-Hant/tours/details/my-tour-slug
```

### Step 2 — Check that the translated content appears
- If no ZH translation exists for a field, Astrotomic falls back to EN automatically (configured in `config/translatable.php`).
- A page rendering in English when you visit `/zh/` is **not necessarily broken** — it means the ZH translation is empty and the fallback is working.
- To confirm your ZH save took effect: visit `/zh/tours/details/{slug}` and check that the tour name shows Chinese characters, not English text.

### Step 3 — Check index/listing pages
- `/zh/tours` — tour cards should show ZH names
- `/zh/events` — event cards should show ZH names
- `/zh/blogs` — blog cards should show ZH title
- `/zh/` (homepage) — tour/event featured sections

### Step 4 — Check meta tags (SEO)
Open DevTools → View Source on the ZH page and search for `<meta name="description"`. Confirm the content attribute shows Chinese text, not English.

### Quick locale-switch bookmarklet
Paste this in your browser console to toggle between locales for the current page:
```javascript
location.href = location.href.replace(/^\/(en|zh|zh-Hant)\//, '/zh/');
```

---

## 5. Common Pitfalls

### 1. Pasting HTML tags into plain-text fields
**Problem**: Copying from a CMS or Word doc and pasting `<strong>`, `&amp;`, `<br>` into a name/title field. The raw HTML renders as text on the front-end.
**Rule**: Plain-text fields (name, title, address, meta_title) — paste plain text only. Rich text goes in description/body fields that have a CKEditor instance.

### 2. Travel Service description — wrong CKEditor tab
**Problem**: The Travel Service form has **three separate CKEditor instances** (one per locale). Clicking the ZH tab visually but typing into the EN CKEditor is a common mistake.
**Rule**: Click the ZH locale tab first, wait for the tab to become active (blue underline), then click inside the editor area below before typing or pasting.

### 3. Saving with the EN tab empty
**Problem**: EN is the required locale. If you accidentally clear the EN tab's field and save, you'll get a validation error and lose unsaved ZH/ZH-Hant content.
**Rule**: Fill ZH → ZH-Hant → EN in that order, or fill EN first and then never clear it. Always submit from the EN tab so you can visually confirm it is populated.

### 4. Using Simplified Chinese in the ZH-Hant tab
**Problem**: Pasting ZH (Simplified) content into the ZH-Hant (Traditional) tab. The text saves but displays Simplified characters to Traditional Chinese users — looks wrong.
**Rule**: Convert ZH → ZH-Hant explicitly before pasting. Use OpenCC or DeepL's ZH→ZH-Hant direction. Never copy-paste between the two tabs directly.

### 5. Slug not updating when you edit the EN name
**Problem**: Slugs are generated on record creation. Editing the EN `name` field later does not automatically regenerate the slug.
**Rule**: The slug field is editable. If you rename a tour/blog/event and want the URL to change, manually update the `slug` field on the EN tab. Warn the team — changing a live slug breaks existing links and any Google-indexed URLs.

### 6. Confusing the badge count (index page)
The locale badge (e.g. `2/3`) shows how many of the three locales have a non-empty translation for the **first** translated field. A badge of `3/3` does not guarantee all translated fields are filled — it only means the first field (usually `name` or `title`) has content in all three locales. Check all tabs when you edit.

### 7. Translation badge shows stale count after save
**Problem**: After saving, the index page badge still shows the old count until you refresh.
**Rule**: Hard-refresh (`Ctrl+Shift+R`) the index page after saving an edit to see the updated badge.

### 8. ZH-Hant fallback behavior
The `get_lang()` helper (used in some older views) only falls back EN → null. It does **not** chain ZH → ZH-Hant. The Astrotomic magic property (used in all Phase 4 views) does respect the full fallback chain in `config/translatable.php`. If you see ZH-Hant pages showing English instead of ZH when ZH-Hant is empty, that view is using `get_lang()` and hasn't been updated yet — file it as a bug.

### 9. Do not enter HTML entities as literal text
**Problem**: DeepL sometimes outputs `&amp;` or `&quot;` as literal strings when translating HTML-adjacent text.
**Rule**: Paste translated text into a plain text editor first, scan for `&`, `<`, `>`. Only `&` appearing in a name like "Smith & Jones" is acceptable in a title field.

### 10. Empty ZH-Hant is acceptable — empty ZH is not
If you only have resources for two locales, always fill EN + ZH. ZH-Hant can remain empty and will fall back to ZH (per the configured fallback chain). Never leave ZH empty and fill only ZH-Hant — the fallback chain does not go ZH-Hant → ZH.
