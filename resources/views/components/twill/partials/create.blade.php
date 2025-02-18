@php
    $titleFormKey = $titleFormKey ?? 'title';
    $titleFormLabel = $titleFormLabel ?? 'Title';
    // dd(get_defined_vars());
@endphp
<x-twill::input
    :name="$titleFormKey"
    :label="$titleFormKey === 'title' && $titleFormLabel === 'Title' ? twillTrans('twill::lang.modal.title-field') : $titleFormLabel"
    :translated="$translateTitle ?? false"
    :required="true"
/>
{{-- @dd($slug); --}}
@if ($permalink ?? true)
    <x-twill::input
        name="slug"
        :label="twillTrans('twill::lang.modal.permalink-field')"
        :translated="true"
        ref="permalink"
        :prefix="$permalinkPrefix ?? ''"
    />
@endif

