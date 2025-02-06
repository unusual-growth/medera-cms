
@twillBlockTitle('Request Form')
@twillBlockIcon('text')
@twillBlockGroup('app')

<x-twill::input
    type="text"
    name="title"
    label="Title"
    placeholder="Title"
    hint="The title of the request form"
    :translated="true"
/>
<x-twill::input
    type="textarea"
    name="description"
    label="Description"
    placeholder="The description of the request form"
    hint="The title of the request form"
    :translated="true"
/>
