$(document).ready(function () {
    $('#resetButton').on('click', function (event) {
        event.preventDefault();
        $("#selected-star").find('option:selected').removeAttr("selected");
        $("#selected-hotels").find('option:selected').removeAttr("selected");
        $('#selected-star, #selected-hotels').trigger('refresh');
		$('#selected-star-styler .jq-selectbox__select-text').empty().text('Choose...');
        return false;
    });
	$('body:last > br').remove();

    $('#orderForm').submit(function (event) {
        event.preventDefault();
        sendAjaxForm('#orderForm');
        return false;
    });

    $('#testimonialsForm').submit(function (event) {
        event.preventDefault();
        sendAjaxForm('#testimonialsForm');
        return false;
    });

    $('#tourForm').submit(function (event) {
        event.preventDefault();
        sendAjaxForm('#tourForm');
        return false;
    });

    $('#hotelForm').submit(function (event) {
        event.preventDefault();
        sendAjaxForm('#hotelForm');
        return false;
    });
});

window.submitForm = function (id) {
    //id = this.attr('id');
    alert(id);
    event.preventDefault();
    //sendAjaxForm('#' + id);
    return false;
}

function echo(str) {
    console.log(str);
}

function sendAjaxForm(formId) {
    $('#inifiniteLoader').show();
    $('.successJ, .errorJ').empty();
    var data = $(formId).serialize();
    var mode = $(formId + " input[name='mode']").val();

    $.ajax({
        type: 'POST',
        data: {
            data: data,
            modeJ: mode
        },
        dataType: 'json',
        success: function (result) {
            if (result.status == true) {
                $('.successJ').empty().append(result.message);
                $(formId).trigger('reset');
            } else {
                $('.errorJ').empty().append(result.message);
            }
            $('#inifiniteLoader').hide();
        }
    });
}