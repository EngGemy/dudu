@php
    $locales = $locales ?? ['en', 'zh', 'zh-Hant'];
    $field = $field ?? 'name';
    $label = $label ?? ucfirst(str_replace('_', ' ', $field));
    $type = $type ?? 'textarea';
    $rows = $rows ?? 3;
    $maxlength = $maxlength ?? null;
    $placeholder = $placeholder ?? '';
    $required = $required ?? false;

    // Build a map of existing translations by locale
    $values = [];
    if (isset($translations) && is_iterable($translations)) {
        foreach ($translations as $translation) {
            $values[$translation->locale] = $translation->{$field} ?? '';
        }
    }
@endphp

<div class="form-group">
    <label>{{ $label }}</label>
    <ul class="nav nav-tabs locale-tabs-nav" role="tablist" style="margin-bottom: 8px;">
        @foreach($locales as $index => $locale)
            <li class="nav-item">
                <a class="nav-link {{ $index === 0 ? 'active' : '' }}"
                   id="tab-{{ $field }}-{{ $locale }}"
                   data-toggle="tab"
                   href="#pane-{{ $field }}-{{ $locale }}"
                   role="tab"
                   aria-controls="pane-{{ $field }}-{{ $locale }}"
                   aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                    {{ strtoupper($locale) }}
                </a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content locale-tabs-content">
        @foreach($locales as $index => $locale)
            <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                 id="pane-{{ $field }}-{{ $locale }}"
                 role="tabpanel"
                 aria-labelledby="tab-{{ $field }}-{{ $locale }}">
                @if($type === 'textarea')
                    <textarea name="{{ $field }}[{{ $locale }}]"
                              id="{{ $field }}_{{ $locale }}"
                              class="form-control"
                              rows="{{ $rows }}"
                              @if($maxlength) maxlength="{{ $maxlength }}" @endif
                              @if($placeholder) placeholder="{{ $placeholder }} ({{ strtoupper($locale) }})" @endif
                              @if($required && $index === 0) required @endif
                    >{{ old($field . '.' . $locale, $values[$locale] ?? '') }}</textarea>
                @else
                    <input type="text"
                           name="{{ $field }}[{{ $locale }}]"
                           id="{{ $field }}_{{ $locale }}"
                           class="form-control"
                           value="{{ old($field . '.' . $locale, $values[$locale] ?? '') }}"
                           @if($maxlength) maxlength="{{ $maxlength }}" @endif
                           @if($placeholder) placeholder="{{ $placeholder }} ({{ strtoupper($locale) }})" @endif
                           @if($required && $index === 0) required @endif
                    >
                @endif
            </div>
        @endforeach
    </div>
</div>
