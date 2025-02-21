import { data } from "jquery";

$(document).ready(function () {
    $('.create-request').each(function (index) {
        window.forms[$(this).attr('id')] = new ValidateForm($(this), null, validationMsg, true);

    });
    $('.create-request button.custom-submit').on('click', function (e) {
        console.log('submit');
        let $form = $(this).closest('form');
        let validator = window.forms[$form.attr('id')];
        e.preventDefault();
        if (validator.validate(validator.phones)) {
            $form.find('.loading-container').addClass('show');
            //AJAX CALL FOR FORM SUBMIT ZOHO
            let data = prepareFormData($form);
            submitForm(data);

        }
    });

});

function prepareFormData($form) {
    let value = $form.serializeArray();
    let data = {};
    $(value).each(function (index, obj) {
        data[obj.name] = obj.value;
    });
    return JSON.stringify(data);
}

async function submitForm(data) {
    $.ajax({
        type: "POST",
        url: '/submit-request',
        datatype: "application/json",
        contentType: "application/json",
        beforeSend: function (request) {
            request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
        },
        data: data,
        success: function (response) {
            if (response.code == 'SUCCESS') {
                setTimeout(function () {
                    window.location =  response.redirect_url;
                }, 2000);
                return true;
            }
        }
    });
}




