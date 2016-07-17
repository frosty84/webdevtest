$(document).ready(function() {
    var dialog;
    // check cookie
    var visited = $.cookie("visited")

    function sendForm(formData, dialog) {
        $.ajax({
            type: "POST",
            url: 'formSubmit.php',
            data: formData,
            success: function (data) {
                alert(data);
                $( "#dialog-form" ).dialog('close');
            },
            dataType: 'json'
        }).fail(function(response) {
            alert('Error: ' + response.responseText);
            $( "#dialog-form" ).dialog('close');
        });
    }

    $.ajax({
        url:'formFields.php',
        type:'get',
        dataType:'json',
        success:function(data) {
            for (var el in data){
                var field = data[el];
                var row = $("<div>").attr({ class: 'row' });
                var cleft = $("<div>").attr({ class: 'col-sm-6 col-padding' });
                var cright = $("<div>").attr({ class: 'col-sm-6 col-padding' });
                var label = $("<label/>").attr({ class: 'form-label' }).text(field.label);
                var field = $('<input/>').attr({ type: 'text', id: field.name, name: field.name, class: 'form-text' })

                cleft.append(label).appendTo(row);
                cright.append(field).appendTo(row);
                $( "#dialog-form-form fieldset" ).append(row);
            }
        }
    });

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

    form = dialog.find( "form" ).on( "submit", function( event ) {
        event.preventDefault();

        var form = $( this );
        var formData = {};
        $("form :input[type=text]").each(function(){
            formData[$(this).attr('name')] = $(this).val();
        });

        sendForm(formData, dialog);
    });

    //if (visited == null) {
    if (true) {
        //$('.newsletter_layer').show();
        dialog.dialog( "open" );
    }

    // set cookie
    $.cookie('visited', 'yes', { expires: 1, path: '/' });
});
