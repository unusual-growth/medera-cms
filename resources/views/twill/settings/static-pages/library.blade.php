@twillBlockTitle('Library Meta')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::input
    type="text"
    name="title"
    label="Title"
    placeholder="Title"
    hint="Meta title of the Library page"
    :translated="true"
/>
<x-twill::input
    type="textarea"
    name="description"
    label="Description"
    placeholder="Meta description for the Library page"
    hint="Meta description of the Library page"
    :translated="true"
/>

<x-twill::input
    type="textarea"
    name="hero_description"
    label="Hero Description"
    placeholder="Hero Description"
    :translated="true"
/>

<x-twill::medias
    name="banner-image"
    label="Banner Image"
    :render-for-blocks="false"
/>
