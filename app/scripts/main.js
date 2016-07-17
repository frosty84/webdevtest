$(document).ready(function() {
    var dialog, form,

    // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
        emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
        name = $( "#name" ),
        email = $( "#email" ),
        password = $( "#password" ),
        allFields = $( [] ).add( name ).add( email ).add( password ),
        tips = $( ".validateTips" );

    // check cookie
    var visited = $.cookie("visited")

    function updateTips( t ) {
        tips
            .text( t )
            .addClass( "ui-state-highlight" );
        setTimeout(function() {
            tips.removeClass( "ui-state-highlight", 1500 );
        }, 500 );
    }

    function checkLength( o, n, min, max ) {
        if ( o.val().length > max || o.val().length < min ) {
            o.addClass( "ui-state-error" );
            updateTips( "Length of " + n + " must be between " +
                min + " and " + max + "." );
            return false;
        } else {
            return true;
        }
    }

    function checkRegexp( o, regexp, n ) {
        if ( !( regexp.test( o.val() ) ) ) {
            o.addClass( "ui-state-error" );
            updateTips( n );
            return false;
        } else {
            return true;
        }
    }

    function sendForm() {
        var valid = true;
        allFields.removeClass( "ui-state-error" );

        valid = valid && checkLength( name, "username", 3, 16 );
        valid = valid && checkLength( email, "email", 6, 80 );
        valid = valid && checkLength( password, "password", 5, 16 );

        valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
        valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
        valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );

        if ( valid ) {
            /*$( "#users tbody" ).append( "<tr>" +
                "<td>" + name.val() + "</td>" +
                "<td>" + email.val() + "</td>" +
                "<td>" + password.val() + "</td>" +
                "</tr>" );*/
            alert("TEST["+name.val()+"]["+email.val()+"]")
            dialog.dialog( "close" );
        }
        return valid;
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
        close: function() {
            form[ 0 ].reset();
            allFields.removeClass( "ui-state-error" );
        }
    });

    form = dialog.find( "form" ).on( "submit", function( event ) {
        event.preventDefault();
        sendForm();
    });

    //if (visited == null) {
    if (true) {
        //$('.newsletter_layer').show();
        dialog.dialog( "open" );
    }

    // set cookie
    $.cookie('visited', 'yes', { expires: 1, path: '/' });
});
