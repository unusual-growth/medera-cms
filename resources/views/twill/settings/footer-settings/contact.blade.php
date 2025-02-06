@twillBlockTitle('Footer Contact')
@twillBlockIcon('text')
@twillBlockGroup('app')
<x-twill::wysiwyg
    name="contact-information"
    label="Contact Infrmation"
    :toolbar-options="[ [ 'header' => [1, 2, false] ], 'ordered', 'bullet' ]"
    :edit-source="true"
    :maxlength="250"
    translated=true
/>
