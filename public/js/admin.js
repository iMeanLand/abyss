$(document).ready(function ($) {

    // $('#show-users-form').submit(function (e) {
    //     e.preventDefault();
    //     $.ajax({
    //         type: "GET",
    //         url: "admin/user-info",
    //         error: function () {
    //             console.log('fail');
    //             alert('Error');
    //         },
    //         success: function (data) { // What to do if we succeed
    //             $('#my_super_users').empty().html(data);
    //         },
    //
    //     });
    //
    // });

    // $("#delete-form").submit(function() {
    //     confirm("Do you want to delete this item?");
    // });

    $('.hide-sidebar').click(function () {
       if ($('.admin-sidebar').hasClass('hidden')) {
           $('.admin-sidebar').removeClass('hidden');
           $('.admin-container').removeClass('flat');
       } else {
           $('.admin-sidebar').addClass('hidden');
           $('.admin-container').addClass('flat');
       }
    });

    $('.show-sidebar').click(function () {
        $('.admin-sidebar').removeClass('hidden');
        $('.admin-container').removeClass('flat');
    });


$('.dropdown-caret').click(function () {
    if ($('.admin-dropdown-menu').hasClass('hidden')) {
    $('.admin-dropdown-menu').removeClass('hidden');
    } else {
        $('.admin-dropdown-menu').addClass('hidden');
    }
})


});