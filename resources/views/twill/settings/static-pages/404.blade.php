@twillBlockTitle('404 Meta')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::input
    type="text"
    name="title"
    label="Title"
    placeholder="Title"
    hint="Meta title of the Success page"
    :translated="true"
/>
<x-twill::input
    type="textarea"
    name="description"
    label="Description"
    placeholder="Meta description for the Success page"
    hint="Meta description of the Success page"
    :translated="true"
/>
{{--
<x-twill::input
    type="text"
    name="h1"
    label="Heading"
    placeholder="Success"
    hint="H1 heading of the Success page"
    :translated="true"
/>

<x-twill::input
    type="textarea"
    name="text"
    label="Text"
    placeholder="Text"
    hint="Text of the Success page"
    :translated="true"
/> --}}
