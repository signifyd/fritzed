$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({container: 'body'});

    $('.remove-user').click(function () {
        return window.confirm('Do you really want to delete this user?');
    });

    $('.remove-file').click(function () {
        return window.confirm('Do you really want to delete this file?');
    });

    $('.select-all-admins').click(function () {
        $('.select-admin').prop('checked', true);
    });

    $('.unselect-all-admins').click(function () {
        $('.select-admin').prop('checked', false);
    });

    $('.clickable-row').click(function() {
        var anchor = $(this).find('td:first a');
        if(anchor && anchor.length >= 1) {
            window.location = anchor[0].href;
        }
    });

    $('.fritzed-reset').submit(function () {
        return window.confirm('Are you sure you want to reset Fritzed\'s database?\nAll users, forum posts and uploads will be removed.');
    });
});