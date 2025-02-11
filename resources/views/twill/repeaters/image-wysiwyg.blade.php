@twillRepeaterTitle('Slides')
@twillRepeaterTrigger('Add Slide')
@twillRepeaterGroup('app')

@php
$wysiwygOptions = [
    ['header' => [4, 5, 6, false]],
    'bold',
    'italic',
    'underline',
    'hr',
    'link',
    'clean',
];
@endphp
{{-- !!TODO put inside a column --}}
<x-twill::wysiwyg
    name="content"
    :translated="true"
    label="Content"
    :toolbar-options="$wysiwygOptions"
    placeholder="<h4>Title</h4><p>Lorem ipsum dolor sit amet. </p>"
/>

<x-twill::medias
    name="image"
    label="Image"
    :max="1"
/>

