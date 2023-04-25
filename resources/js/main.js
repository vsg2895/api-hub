$(document).ready(function () {

    $(document).on('click', '.message_close', function () {
        $(this).closest('.custom-alert').remove();
    })

    $(document).on('click', '.copy', function () {
        let copyText = $(this).parent().find('strong')
        navigator.clipboard.writeText(copyText.text());
        $('.copy').text('Copy Text');
        $(this).text('Copied');
        $(this).append('<i class="material-icons opacity-10">check</i>');
    })

    $('.delete-client').click(function () {
        var action = $('#client_delete_form').attr('action');
        var last_part = action.substring(action.lastIndexOf('/') + 1)
        action = action.replace(/[a-zA-Z0-9]*$/, $(this).attr('data-id'));
        $('#client_delete_form').attr('action', action);
    })

})

