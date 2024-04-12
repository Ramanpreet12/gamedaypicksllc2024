@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Update Password</title>
@endsection

@section('subcontent')
    @if (session()->has('success'))
        <div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
            </svg>
            &nbsp; {{ session()->get('success') }}
        </div>
    @endif
    @if (session('message_error'))
            <div class="alert alert-danger-soft show flex items-center mb-2 alert_messages" role="alert">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        {{session('message_error')}}
            </div>
    @endif


    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Change Password</h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5">
                <div class="relative flex items-center p-5">
                    <div class="w-12 h-12 image-fit">
                        @if (!empty(Auth::user()->photo) && Storage::exists('storage/admin_profile_photo/'. Auth::user()->photo))
                            <img alt="Admin Image" class="rounded-full"
                                src="{{ asset('storage/admin_profile_photo/' . Auth::user()->photo) }}">
                        @else
                            <img alt="Admin Image" class="rounded-full"
                                src="{{ asset('dist/images/dummy_image.webp') }}">
                        @endif

                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                        <div class="text-slate-500">{{ Auth::user()->role_as == 0 ? 'Admin' : '' }}</div>
                    </div>
                </div>
                <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400">
                    <a class="flex items-center text-primary font-medium" href="{{ route('admin/profile') }}">
                        <i data-feather="activity" class="w-4 h-4 mr-2"></i> Personal Information
                    </a>

                    <a class="flex items-center mt-5" href="">
                        <i data-feather="lock" class="w-4 h-4 mr-2"></i> Change Password
                    </a>

                </div>

            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            <!-- BEGIN: Change Password -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Change Password</h2>
                </div>
                <form action="{{ route('admin/update_password') }}" method="POST" id="admin_password_form">
                    @csrf
                    <div class="p-5">
                        <div>
                            <label for="change-password-form-1" class="form-label">Current Password <span
                                    class="text-danger">*</span></label>
                            <input id="change-password-form-1" name="current_password" type="password" class="form-control"
                                placeholder="Enter old password">
                        </div>
                        @error('current_password')<p class="text-danger">{{$message}}</p> @enderror
                        <div class="mt-3">
                            <label for="change-password-form-2" class="form-label">New Password <span
                                    class="text-danger">*</span></label>
                            <input name="new_password" id="new_password" type="password" class="form-control"
                                placeholder="Enter new password">
                        </div>
                        @error('new_password')<p class="text-danger">{{$message}}</p> @enderror
                        <div class="mt-3">
                            <label for="change-password-form-3" class="form-label">Confirm New Password <span
                                    class="text-danger">*</span></label>
                            <input  name="confirm_password" id="confirm_password" type="password" class="form-control"
                                placeholder="Re-enter the password">
                                <span id="check_password_match"></span>
                        </div>
                        @error('confirm_password')<p class="text-danger">{{$message}}</p> @enderror
                        <button type="submit" class="btn btn-primary mt-4">Change Password</button>
                    </div>
                </form>
            </div>
            <!-- END: Change Password -->
        </div>
    </div>
@endsection
