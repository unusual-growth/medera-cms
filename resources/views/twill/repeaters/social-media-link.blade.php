@twillRepeaterTitle('Social Media Link')
@twillRepeaterTrigger('Add Link')
@twillRepeaterGroup('app')
 
<x-twill::input
    name="title"
    label="Title"
    :required="true"
/>
<x-twill::input
    name="url"
    label="Url"
    :required="true"
/>

<x-twill::medias
    name="social-media-icon"
    label="Icon Light"
    field-note="12px x 12px"
    :required="true"
/>

<x-twill::medias
    name="social-media-icon-dark"
    label="Icon Dark"
    field-note="12px x 12px"
    :required="true"
/>