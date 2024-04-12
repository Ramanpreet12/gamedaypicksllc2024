//$(".alert_messages").fadeOut(4000);
// global loader

setTimeout(function () {
    $(".alert_messages").fadeOut();
}, 3000);

// // Toggle dropdown menu when dropdown arrow is clicked
// document.querySelector('.shop-arrow').addEventListener('click', function() {
//     this.classList.toggle('clicked');
//   });

// product price used in both pony and shop
$(".size-button").on("click", function () {
    var size_id = $(this).data("size_id");
    var product_id = $(this).data("product_id");
    var quantity = $(this).data("quantity");

    $.ajax({
        type: "POST",
        url: "/get-product-price",
        data: { size_id: size_id, product_id: product_id, quantity: quantity },
        success: function (response) {

            $("#price-heading").text("$" + response.product.product_price);
            $("#product_price").val(response.product.product_price);
            $("#product_variation_id").val(response.product.id);
            if (response.product.product_quantity == 0) {
                $(".qty-counter").html("<b>Out of stock</b>");
                $(".cart-btn").prop("disabled", true);
                $(".buy-btn").prop("disabled", true);
                $(".cart-btn , .buy-btn").css({
                    cursor: "not-allowed",
                    "background-color": "#da9a29c9",
                });
            } else if (response.product.product_quantity == 1) {
                $(".qty-counter").html(
                    "<span class='text-danger'><b>Only " +
                        response.product.product_quantity +
                        " is left in stock- order soon</b></span>"
                );
                $(".cart-btn").prop("disabled", false);
                $(".buy-btn").prop("disabled", false);
                $(".cart-btn , .buy-btn").css({
                    cursor: "pointer",
                    "background-color": "#DA9A29",
                });
            } else if (

                response.product.product_quantity <= 10
            ) {
                $(".qty-counter").html(
                    "<span class='text-danger'><b>Only " +
                        response.product.product_quantity +
                        " are left in stock</b></span>"
                );
                $(".cart-btn").prop("disabled", false);
                $(".buy-btn").prop("disabled", false);
                $(".cart-btn , .buy-btn").css({
                    cursor: "pointer",
                    "background-color": "#DA9A29",
                });
            } else {
                $(".qty-counter").html('<span class="text-success"><b>In stock</b><span>');
                $(".cart-btn").prop("disabled", false);
                $(".buy-btn").prop("disabled", false);
                $(".cart-btn , .buy-btn").css({
                    cursor: "pointer",
                    "background-color": "#DA9A29",
                });
            }
        },

        error: function (error) {
            console.log(error);
        },
    });
});

//  get product price for greek store
$(".greek-size-button").on("click", function () {
    // Example dates for comparison
    var startDateString = "2024-02-01"; // Start date
    var endDateString = "2024-08-15"; // End date

    // Convert the date strings to Date objects
    var startDate = new Date(startDateString);
    var endDate = new Date(endDateString);

    // Get the month and date components of the current date
    var today = new Date();
    var currentMonth = today.getMonth() + 1; // Note: JavaScript months are zero-based (0 = January)
    var currentDate = today.getDate();

    // Get the month and date components of the start and end dates
    var startMonth = startDate.getMonth() + 1;
    var startDateOfMonth = startDate.getDate();
    var endMonth = endDate.getMonth() + 1;
    var endDateOfMonth = endDate.getDate();

    // Compare the current date with the start and end dates
    if (
        (currentMonth > startMonth ||
            (currentMonth === startMonth && currentDate >= startDateOfMonth)) &&
        (currentMonth < endMonth ||
            (currentMonth === endMonth && currentDate <= endDateOfMonth))
    ) {
        console.log("Current date is within the specified range.");
    } else {
        $(".cart-btn").prop("disabled", true);
        $(".buy-btn").prop("disabled", true);
        $(".cart-btn , .buy-btn").css({
            cursor: "not-allowed",
            "background-color": "#da9a29c9",
        });
    }

    var size_id = $(this).data("size_id");
    var product_id = $(this).data("product_id");
    var quantity = $(this).data("quantity");

    $.ajax({
        type: "POST",
        url: "/get-greek-product-price",
        data: { size_id: size_id, product_id: product_id, quantity: quantity },
        success: function (response) {

            $("#price-heading").text("$" + response.product.product_price);
            $("#product_price").val(response.product.product_price);
            $("#product_variation_id").val(response.product.id);
            if (response.product.product_quantity == 0) {
                $(".qty-counter").html("<b>Out of stock</b>");
                $(".cart-btn").prop("disabled", true);
                $(".buy-btn").prop("disabled", true);
                $(".cart-btn , .buy-btn").css({
                    cursor: "not-allowed",
                    "background-color": "#da9a29c9",
                });
            } else if (response.product.product_quantity == 1) {
                $(".qty-counter").html(
                    "<span class='text-danger'><b>Only " +
                        response.product.product_quantity +
                        " is left in stock- order soon</b></span>"
                );
                $(".cart-btn").prop("disabled", false);
                $(".buy-btn").prop("disabled", false);
                $(".cart-btn , .buy-btn").css({
                    cursor: "pointer",
                    "background-color": "#DA9A29",
                });
            } else if (

                response.product.product_quantity <= 10
            ) {
                $(".qty-counter").html(
                    "<span class='text-danger'><b>Only " +
                        response.product.product_quantity +
                        " are left in stock</b></span>"
                );
                $(".cart-btn").prop("disabled", false);
                $(".buy-btn").prop("disabled", false);
                $(".cart-btn , .buy-btn").css({
                    cursor: "pointer",
                    "background-color": "#DA9A29",
                });
            } else {
                $(".qty-counter").html('<span class="text-success"><b>In stock</b><span>');
                $(".cart-btn").prop("disabled", false);
                $(".buy-btn").prop("disabled", false);
                $(".cart-btn , .buy-btn").css({
                    cursor: "pointer",
                    "background-color": "#DA9A29",
                });
            }
        },
        error: function (error) {
            console.log(error);
        },
    });
});

$(document).on("click", ".confirmDelete", function () {
    var module = $(this).attr("module");

    var module_id = $(this).attr("module_id");
    var base_url = window.location.origin;
    // var route =  window.location.href=base_url+'/admin/'+module+'/delete/'+module_id;

    // alert(module_id);
    // console.log('module :' +module , 'id:'+ module_id , 'route will be : '+'http://127.0.0.1:8000/admin' + module+'/delete/'+module_id);
    // // var route = window.location.href=module+'/delete/'+module_id;

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#1E40AF",
        cancelButtonColor: "#DC2626",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire("Deleted!", "Record has been deleted.", "success");
            window.location.href =
                base_url + "/admin/" + module + "/delete/" + module_id;
            //   window.location.href='http://127.0.0.1:8000/admin/'+module+'/delete/'+module_id;
        }
    });
});

$("#uploding_product_name").on("keyup", function () {
    var uploding_product_name = $("#uploding_product_name").val();
    var url = uploding_product_name.replace(/\s+/g, "-").toLowerCase();
    $("#product_url").val(url);
    // console.log(url);
});

$("#age_group").change(function (event) {
    // alert("You have Selected  :: "+$(this).val());
    // alert('tet');
    if ($(this).val() == 1) {
        $("#reserve_btn").text("Reserve");
    }

    if ($(this).val() == 2) {
        $("#reserve_btn").text("Reserve");
    }

    if ($(this).val() == 3) {
        $("#reserve_btn").text("Add to cart");
    }
});

// jersey add to cart

//validate admin password page
// $('#jersey_form').validate({

//     rules: {
//       jersey_id: { required: true },
//       name: { required: true, },
//       user_email: { required: true, },
//       age_group: { required: true, },
//       jersey_number: { required: true, },
//     },
//     messages: {
//         jersey_id: { required: "Jersey is required", },
//         name: { required: "Your name is required", },
//         user_email: { required: "Your Email is required", },
//         age_group: { required: "Please select the age group", },
//         jersey_number: { required: "Jersey number is required. Please select number from 0-99 or 00", },
//     }

//   });

//   $('#reserve_btn').on('keyup', function () {
//     var user_email = $(this).attr('user_email');
//          var jersey_id = $(this).attr('jersey_id');
//          var name = $('#name').val();
//          var jersey_number = $('#jersey_number').val();
//          var age_group = $('#age_group').val();

//     //  alert(password);
//     if (user_email != '' || jersey_id != '' || name != '' || jersey_number != '' || age_group != '' ) {
//       if (password != confirm_password) {
//         $('#check_password_match').html('Confirm password is not matched with password !').css("color", "red");
//       } else {
//         $('#check_password_match').html('Confirm password is matched').css("color", "green");
//       }
//     }
//     else {
//       $('#check_password_match').html('');
//     }

//   });

$("#reserve_btn").click(function () {
    var email = $(this).attr("email");
    var jersey_id = $(this).attr("jersey_id");

    var name = $("#name").val();
    var jersey_name = $("#jersey_name").val();
    var jersey_price = $("#jersey_price").val();

    var jersey_number = $("#jersey_number").val();
    var age_group = $("#age_group").val();
    var gender = $('input[name="gender"]:checked').val();
    var size = $('input[name="size"]:checked').val();
    var jersey_image = $("#jersey_image").val();
    var price = $("#price").val();
    var zipcode = $("#zipcode").val();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "POST",
        // url: '/check_user',
        url: "/reserve-jersey",
        data: {
            email: email,
            jersey_id: jersey_id,
            name: name,
            jersey_name: jersey_name,
            jersey_number: jersey_number,
            jersey_price: jersey_price,
            age_group: age_group,
            gender: gender,
            size: size,
            jersey_image: jersey_image,
            price: price,
            zipcode: zipcode,
        },
        success: function (resp) {
            console.log("success", resp);
            //    console.log('out of stock ' +resp.message);
            if (resp.message == "reserved") {
                Swal.fire({
                    title: "Jersey Reserved",
                    html:
                        "You have reserved the jersey number <span style='color:#3085d6'>" +
                        resp.jersey_number +
                        "</span>  for <span style='color:#3085d6'>30 days </span>",
                    icon: "success",
                    // showCancelButton: true,
                });
                // setTimeout(() => {
                //     location
                //         .reload();
                // }, 5000);
            }

            if (resp.message == "out_of_stock") {
                Swal.fire({
                    title: "Out of stock",
                    html:
                        "The jersey number <span style='color:#f27474'> " +
                        resp.jersey_number +
                        " </span> is out of stock",
                    icon: "error",
                });
            }

            if (resp.message == "already_reserved") {
                Swal.fire({
                    title: "Already Reserved",
                    html:
                        "The jersey number <span style='color:#f27474'> " +
                        resp.jersey_number +
                        " </span> is already reserved. Try another group",
                    icon: "error",
                });
            }

            if (resp.message == "out_of_stock_for_10_to_13") {
                Swal.fire({
                    title: "Not Available",
                    html:
                        "The jersey number <span style='color:#f27474'> " +
                        resp.jersey_number +
                        " </span> is not available",
                    icon: "error",
                });
            }

            if (resp.message == "out_of_stock_for_14_to_17") {
                Swal.fire({
                    title: "Not Available",
                    html:
                        "The jersey number <span style='color:#f27474'> " +
                        resp.jersey_number +
                        " </span> is not available",
                    icon: "error",
                });
            }

            if (resp.message == "out_of_stock_for_above_17") {
                Swal.fire({
                    title: "Not Available",
                    html:
                        "The jersey number <span style='color:#f27474'> " +
                        resp.jersey_number +
                        " </span> is not available",
                    icon: "error",
                });
            }

            $("#jersey_form")[0].reset();
        },

        error: function (request, status, error) {
            $("#email_error_msg").html(request.responseJSON.errors.email);
            $('[name="name"]')
                .next("span")
                .html(request.responseJSON.errors.name);
            // $('[name="jersey_number"]').next('span').html(request.responseJSON.errors.jersey_number);
            $("#jersey_number_error_msg").html(
                request.responseJSON.errors.jersey_number
            );
            $('[name="age_group"]')
                .next("span")
                .html(request.responseJSON.errors.age_group);
            $("input[type=radio][name=size]")
                .next("span")
                .html(request.responseJSON.errors.size);
            //   var test =   $('[name="gender"]').next('span').html(request.responseJSON.errors.gender);
            $("#gender_error_msg").html(request.responseJSON.errors.gender);
            $("#size_error_msg").html(request.responseJSON.errors.size);

            $('[name="name"]').keyup(function () {
                $('[name="name"]').next("span").html("");
            });

            $("#jersey_number_error_msg").keyup(function () {
                $("#jersey_number_error_msg").text("");
            });

            $('[name="age_group"]').change(function () {
                $('[name="age_group"]').next("span").html("");
            });

            $("input[name='gender']").on("click", function () {
                $("#gender_error_msg").text("");
            });
            $("input[name='size']").on("click", function () {
                $("#size_error_msg").text("");
            });
        },
    });
});

//$('.alert_messages').fadeIn().delay(10000).fadeOut();

$("#admin_profile_form").validate({
    rules: {
        name: { required: true },
        phone_number: { required: true },
    },
    messages: {
        name: { required: "Name is required" },
        phone_number: { required: "Phone number is required" },
    },
});

//validate admin password page
$("#admin_password_form").validate({
    rules: {
        current_password: { required: true },
        new_password: { required: true },
        confirm_password: { required: true },
    },
    messages: {
        current_password: { required: "Current Password is required" },
        new_password: { required: "New  Password is required" },
        confirm_password: { required: "Confirm Password is required" },
    },
});

//password and confirm password matching
$("#confirm_password").on("keyup", function () {
    var password = $("#new_password").val();
    var confirm_password = $(this).val();
    //  alert(password);
    if (confirm_password != "") {
        if (password != confirm_password) {
            $("#check_password_match")
                .html("Confirm password is not matched with password !")
                .css("color", "red");
        } else {
            $("#check_password_match")
                .html("Confirm password is matched")
                .css("color", "green");
        }
    } else {
        $("#check_password_match").html("");
    }
});

//sweet alert

$(".show_sweetalert").click(function (event) {
    var form = $(this).closest("form");
    //  var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
    });
});

//sweet alert for confirm make team win

$(".winBtn").click(function (event) {
    var form = $(this).closest("form");
    event.preventDefault();
    swal({
        title: "Are you sure to make this team win?",
        text: "You won't be able to revert this!",
        icon: "warning",
        buttons: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        // confirmButtonText: 'Yes, delete it!',
        // reverseButtons: true
    }).then((result) => {
        if (result) {
            form.submit();
        }
    });
});

//front register form validation
$("#register_form").validate({
    rules: {
        fname: { required: true },
        birthday: { required: true },
        email: { required: true, email: true },
        password: { required: true },
        password_confirmation: { required: true },
        phone: { required: true },
        address: { required: true },
        city: { required: true },
        zipcode: { required: true },
        id_proof: { required: true },
        country: { required: true },
        id_proof_number: { required: true },
    },
    messages: {
        fname: { required: "Name is required" },
        birthday: { required: "Date of birth is required" },
        email: { required: "Email is required" },
        password: { required: "Password is required" },
        password_confirmation: {
            required: "Password Confirmation is required",
        },
        phone: { required: "Phone is required" },
        address: { required: "Address is required" },
        city: { required: "City is required" },
        zipcode: { required: "Zipcode is required" },
        country: { required: "Country is required" },
        id_proof: { required: "ID Proof is required" },
        id_proof_number: { required: "ID Proof Number is required" },
    },
});

//front js
// banner carousel js from footer file
$(document).ready(function () {
    $(".owl-carousel").owlCarousel();
    submitForm("men");
    $(".tablinks").click(function () {
        $(".tablinks").removeClass("active");
        $(this).addClass("active");
    });
});

$(".owl-heroSlider").owlCarousel({
    loop: true,
    items: 1,
    margin: 0,
    dots: false,
    autoplay: true,
    nav: true,
    dots: false,
});

$(".owl-testimonial").owlCarousel({
    loop: true,
    items: 1,
    margin: 30,
    dots: false,
    autoplay: true,
    nav: true,
    dots: false,
    responsive: {
        300: {
            items: 1,
        },
        600: {
            items: 2,
        },
        992: {
            items: 3,
        },
    },
});

$(".owl-videoslider").owlCarousel({
    loop: true,
    margin: 20,
    dots: false,
    autoplay: true,
    nav: false,
    responsive: {
        300: {
            items: 1,
        },
        600: {
            items: 2,
        },
        992: {
            items: 3,
        },
    },
});

// video player js
const video = document.getElementById("video");
const circlePlayButton = document.getElementById("circle-play-b");

function togglePlay() {
    if (video.paused || video.ended) {
        video.play();
    } else {
        video.pause();
    }
}

circlePlayButton.addEventListener("click", togglePlay);
video.addEventListener("playing", function () {
    circlePlayButton.style.opacity = 0;
});
video.addEventListener("pause", function () {
    circlePlayButton.style.opacity = 1;
});

//Pick the team from fixture page
$(".team_name").click(function () {
    let season_id = $(this).attr("season_id");
    let fixture_id = $(this).attr("fixture_id");
    let team_id = $(this).attr("team_id");
    let teamName = $(this).attr("teamName");
    let fixture_date = $(this).attr("fixture_date");
    let fixture_time = $(this).attr("fixture_time");
    let week = $(this).attr("week");

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "POST",
        // url: '/check_user',
        url: "/fixture_team_pick",
        data: {
            season_id: season_id,
            fixture_id: fixture_id,
            team_id: team_id,
            week: week,
        },
        success: function (resp) {
            if (resp.message == "login") {
                let login_url = "{{ route('login') }}";
                location.href = login_url;
                $("#selectTeam #teamSelectedMsg").html(
                    '<p style="color:red"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"> <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"> </polygon> <line x1="12" y1="8" x2="12" y2="12"></line> <line x1="12" y1="16" x2="12.01" y2="16"></line>  </svg> <span> Please <a href="' +
                        login_url +
                        '" style="color:red">login</a> first to continue . </span></p>'
                );
            }
            if (resp.message == "subscribe") {
                $("#login_msg_div").hide();
                let payment_url = "{{ route('payment') }}";
                location.href = payment_url;
                $("#selectTeam #teamSelectedMsg").html(
                    '<p style="color:red"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"> <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"> </polygon> <line x1="12" y1="8" x2="12" y2="12"></line> <line x1="12" y1="16" x2="12.01" y2="16"></line>  </svg> <span> Please <a href="' +
                        payment_url +
                        '" style="color:red">subscribe</a> to pick the teams . It will cost you $100 . </span></p>'
                );
            }
            if (resp.message == "update") {
                $("#selectTeam #teamSelectedMsg").html(
                    'You have selected <span style="color:#06083B">' +
                        teamName +
                        '</span> for the week  <span style="color:#06083B"> ' +
                        week +
                        ' </span> on <span style="color:#06083B">' +
                        fixture_date +
                        '</span> at <span style="color:#06083B">' +
                        fixture_time +
                        "</span>"
                );
            }
            if (resp.message == "added") {
                $("#selectTeam #teamSelectedMsg").html(
                    'You have selected <span style="color:#06083B;">' +
                        teamName +
                        '</span> for the week <span style="color:#06083B"> ' +
                        week +
                        ' </span> on <span style="color:#06083B">' +
                        fixture_date +
                        '</span> at <span style="color:#06083B">' +
                        fixture_time +
                        "</span>"
                );
            }
            if (resp.message == "Time_id_over") {
                $("#selectTeam #teamSelectedMsg").html(
                    '<p style="color:red"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"> <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"> </polygon> <line x1="12" y1="8" x2="12" y2="12"></line> <line x1="12" y1="16" x2="12.01" y2="16"></line>  </svg> <span> Your time is over to pick the team  as you can pick the team till Thursaday 12:00 am . You will receive loss for this week  </span></p>'
                );
            }
        },
    });
});

//update user  password form in user dashboard
$("#updatePasswordForm").submit(function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        data: $("#updatePasswordForm").serialize(),
        url: "update-password",
        success: function (data) {
            //console.log(data);
            if (data.status == true) {
                $("#password_success_modal").modal("show");
                $("#password_success_modal #pass_success_msg").html(
                    "Password updated successfully ."
                );
                $("#updatePasswordForm")[0].reset();
            } else {
                $("#password_success_modal").modal("hide");
                $("#password_fail_modal").modal("show");
                $("#password_fail_modal #pass_fail_msg").html(data.message);
                $("#updatePasswordForm")[0].reset();
            }
        },
    });
    return false;
});

// front contact form validation
$("#contactForm").validate({
    rules: {
        name: { required: true },
        email: { required: true, email: true },
        subject: { required: true },
        message: { required: true },
    },
    messages: {
        name: { required: "Name is required" },
        email: { required: "Email is required" },
        subject: { required: "Subject is required" },
        message: { required: "Message is required" },
    },
});



// global loader
