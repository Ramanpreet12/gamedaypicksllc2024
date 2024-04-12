@extends('front.layout.user_layout.user_app')
@section('content')
    <section id="personalInfoBoard"
        style="background-image:url({{ asset('front/img/football-2-bg.jpg') }});color:{{ $colorSection['leaderboard']['text_color'] }};">
        <div class="container-fluid text-center">
            <div class="row">

                <div class="col-sm-12">
                    <div class="personalleaderBoard">
                        <br>
                        <div class="loader d-none">
                            <img height="100px" width="100px" src="{{ asset('front/img/orange_circles.gif') }}"
                                alt="loader">
                        </div>
                    </div>
                </div>
                @include('front.layout.user_layout.user_sidebar')
                <div class="col-sm-8 col-md-9">
                 <div class="personal_details_div px-4">
                    @if (session()->has('success'))
                        <div class="alert alert-success show flex items-center mb-2" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-check2-circle" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                <path
                                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                            </svg>
                            &nbsp; {{ session()->get('success') }}
                        </div>
                    @endif

                    @if (session('pass_message_error'))
                        <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2">
                                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                </polygon>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                            {{ session('pass_message_error') }}
                        </div>
                    @endif

                    {{-- <h2 style="color:{{ $colorSection['leaderboard']['header_color'] }};">
                        Personal Details
                    </h2> --}}
                    <div class="row">
                        <div class="ml-3 col-md-12">
                            <div class="text-center">
                                <div class="flex" id="">
                                    <h2 class="my-4">Update Password </h2>

                                    {{-- <div class="row"> --}}
                                    <form id="updatePasswordForm" action="" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-sm-8 col-md-6 mb-3 text-start">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="name" name="name"
                                                        readonly placeholder="John" value="{{ Auth::user()->email }}" style="background:#e0e0e0">
                                                    @error('name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="current_password" class="form-label">Current
                                                        Password</label>
                                                    <input type="text" class="form-control" id="current_password"
                                                        name="current_password" placeholder="Enter Old Password"
                                                        value="{{ old('current_password') }}">
                                                    @error('current_password')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="new_password" class="form-label">New Password</label>
                                                    <input type="text" class="form-control" id="new_password"
                                                        name="new_password" placeholder="Enter New Password"
                                                        value="{{ old('new_password') }}">
                                                    @error('new_password')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="confirm_password" class="form-label">Confirm Password
                                                    </label>
                                                    <input type="text" class="form-control" name="confirm_password"
                                                        placeholder="Re-enter Password" id="confirm_password">
                                                    @error('confirm_password')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>




                                            </div>

                                            <div class="col-sm-4 col-md-6 mb-3">
                                                <div class="">
                                                    <div class="personal-Img">
                                                        @if (Auth::user()->photo)
                                                            <img src="{{ asset('storage/images/user_images/' . Auth::user()->photo) }}"
                                                                class="img-fluid borderImg border" alt="" >
                                                        @else
                                                            <img src="{{ asset('dist/images/dummy_image.webp') }}"
                                                                class="img-fluid borderImg border" alt="">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="personalInfoButton">
                                            <div class="row g-5 justify-content-center">
                                                <div class="col-auto">
                                          <button type="submit" name="submit" class="btn btn-primary  ">Update</button>
                                          </div>
                                          <div class="col-auto">
                                          <button type="reset"  class="btn btn-default">reset</button>
                                          </div>
                                          </div>
                                         </div>

                                    </form>
                                    {{-- </div> --}}
                                    {{-- <div class="row">
                                    <h2>kdflkkg</h2>
                                </div> --}}


                                </div>
                            </div>
                        </div>
                                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="password_success_modal" tabindex="-1" aria-labelledby="selectTeamLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="teamSelectedMsg">
                    <div id="reviews_success_modal_Form">
                        <div class="flex items-center mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#00A300"
                                class="bi bi-check2-circle" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                <path
                                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                            </svg>
                            &nbsp; <span id="pass_success_msg" style="font-size:17px; color:#00A300"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pr-4" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- failure password change  -->
    <div class="modal fade" id="password_fail_modal" tabindex="-1" aria-labelledby="selectTeamLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="teamSelectedMsg">
                <div id="reviews_success_modal_Form">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FF0000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>

                        &nbsp; <span id="pass_fail_msg" style="font-size:17px; color:#FF0000"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary pr-4" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script>
        $("#updatePasswordForm").submit(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                data: $("#updatePasswordForm").serialize(),
                url: 'update-password',
                success: function(data) {
                    //console.log(data);
                    if (data.status == true) {
                        $("#password_success_modal").modal("show");
                     $("#password_success_modal #pass_success_msg").html("Password updated successfully .");
                     $('#updatePasswordForm')[0].reset();
                    } else {
                        $("#password_success_modal").modal("hide");
                        $("#password_fail_modal").modal("show");
                        $("#password_fail_modal #pass_fail_msg").html(data.message);
                        $('#updatePasswordForm')[0].reset();
                    }

                },
                error:function (data){
                        $.each(data.responseJSON.errors,function(field_name,error){
                            $(document).find('[name='+field_name+']').after('<br><span class="text-strong text-danger mb-2">' +error+ '</span>')
                        })
                    }
            });
            return false;
        });
    </script>
@endsection
