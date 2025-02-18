
$(document).ready(function () {
    let heroValidator = new ValidateForm($('.create-request'), null, validationMsg, true);
    $('.create-request button.custom-submit').on('click', function (e) {
        e.preventDefault();
        let $form = $(this).closest('form');
        if (heroValidator.validate(heroValidator.phones)) {
            $form.find('.loading-container').addClass('show');

            //AJAX CALL FOR FORM SUBMIT ZOHO
            let value = $(this).closest('form').serializeArray();
            var data = {};
            $(value).each(function (index, obj) {
                data[obj.name] = obj.value;
            });
            data = JSON.stringify(data);
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
                    // console.log(response);
                    if (response.code == 'SUCCESS') {
                        $form.find('.loading-container').addClass('success');
                        setTimeout(function () {
                            window.location.href = "/success?for=" + response.redirect_url;
                        }, 2000);
                        return true;
                    }
                    //if request if made successfully then the response represent the data

                    $("#result").empty().append(response);
                }
            });
        }
    });

});




