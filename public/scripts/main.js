$(document).ready(function() {

    // contact jQuery dialog
    var dialog;
    // check cookie
    var visited = $.cookie("visited")

    /**
     * Submit contact form with ajax
     * @param formData
     * @param dialog
     */
    function sendForm(formData, dialog) {
        $.ajax({
            type: "POST",
            url: 'formSubmit.php',
            data: formData,
            success: function (data) {
                $( "#dialog-form" ).dialog('close');
            },
            dataType: 'json'
        }).fail(function(response) {
            alert('Error: ' + response.responseText);
            $( "#dialog-form" ).dialog('close');
        });
    }

    /**
     * Get list of fields with ajax
     */
    $.ajax({
        url:'formFields.php',
        type:'get',
        dataType:'json',
        success:function(data) {
            for (var el in data){
                var field = data[el];
                var row     = $("<div>").attr({ class: 'row' });
                var cempty   = $("<div>").attr({ class: 'col-sm-3 col-padding' });
                var cleft   = $("<div>").attr({ class: 'col-sm-4 text-right col-padding' });
                var cright  = $("<div>").attr({ class: 'col-sm-5 col-padding' });
                var cright_inner = $("<div>").attr({ class: 'pull-right' });

                var label = $("<label/>").attr({ class: 'form-label' }).text(field.label);
                var field = $('<input/>').attr({ type: 'text', id: field.name, name: field.name, class: 'form-text', required: true, maxtength: 100})

                cempty.appendTo(row);
                cleft.append(label).appendTo(row);
                cright_inner.append(field);
                cright_inner.append(field).appendTo(row);
                $( "#contact-submit-row" ).before(row);
            }
        }
    });

    /**
     * Init jQuery dialog
     * @type {*|jQuery}
     */
    dialog = $( "#dialog-form" ).dialog({
        autoOpen: false,
        height: 'auto',
        width: 750,
        modal: true,
        dialogClass: 'no-title',
        //Close dialog onClick (anywhere)
        open: function () {
            $('#info-row').bind('click', function() {
                $( "#dialog-form" ).dialog('close');
            })
        },
        close: function() {
        }
    });

    /**
     * Prepare data for fubmit
     */
    $('#dialog-form-form').validate({
        rules: {
            name: "required",
            surname: "required",
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: "Correct email is required"
        },
        submitHandler: function(form, event) {
            event.preventDefault();
            var formData = {};
            $("form :input[type=text]").each(function(){
                formData[$(this).attr('name')] = $(this).val();
            });

            sendForm(formData, dialog);
        }
    });

    // Check first time visit
    //if (visited == null) {
    if (true) {
        dialog.dialog( "open" );
    }

    // set cookie
    $.cookie('visited', 'yes', { expires: 1, path: '/' });
});
