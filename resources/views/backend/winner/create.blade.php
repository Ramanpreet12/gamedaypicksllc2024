@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Update Profile </title>
@endsection

@section('subcontent')
    @if (session()->has('success'))
        <div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-circle"
                viewBox="0 0 16 16">
                <path
                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                <path
                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
            </svg>
            &nbsp; {{ session()->get('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger-soft show flex items-center mb-2 alert_messages" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-alert-octagon w-6 h-6 mr-2">
                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
            {{ session('error') }}
        </div>
    @endif



    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Assign Prize To Winner</h2>
        <a href="{{ route('winner.index') }}"><button class="btn btn-primary">Back</button></a>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5">
                <div class="relative flex items-center p-5">


                    <div class="w-52 mx-auto">
                        <div
                            class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                @if (!empty($get_winning_user->photo))
                                    <img class="rounded-md" alt="User Image"
                                        src="{{ asset('storage/images/user_images/' . $get_winning_user->photo) }}">
                                @else
                                    <img class="rounded-md" alt="User Image"
                                        src="{{ asset('dist/images/dummy_image.webp') }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
            <!-- BEGIN: Display Information -->
            <div class="intro-y box lg:mt-5">

                <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">User Information</h2>
                </div>
                <form action="{{ url('admin/winner/assigned_prize/' . $get_winning_user->user_id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="p-5">
                        <div class="flex flex-col-reverse xl:flex-row flex-col">
                            <div class="flex-1 mt-6 xl:mt-0">
                                <div class="grid grid-cols-12 gap-x-5">
                                    <div class="col-span-12 2xl:col-span-6">
                                        <div class="grid grid-cols-12 gap-6">
                                            <div class="w-full col-span-6">
                                                <input type="hidden" value="{{$get_winning_user->season_id}}" name="season_id">
                                                <label for="season_name" class="form-label">Season</label>
                                                <input id="season_name" name="email" type="text" class="form-control"
                                                    placeholder="Season Name" value="{{ $get_winning_user->season_name }}"
                                                    readonly>
                                            </div>

                                            <div class="w-full col-span-6">
                                                <input type="hidden" name="total_points"
                                                    value="{{ $get_winning_user->total_points }}">
                                                <label for="points" class="form-label">Win Points <span
                                                        class="text-danger">*</span></label>
                                                <input id="points" name="phone_number" type="text"
                                                    class="form-control" placeholder="Win Points"
                                                    value="{{ $get_winning_user->total_points }}" readonly>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-span-12 2xl:col-span-6 mt-4">

                                        <div class="grid grid-cols-12 gap-6">
                                            <div class="w-full col-span-6">
                                                <label for="user_name" class="form-label"> Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="hidden" value="{{ $get_winning_user->user_id }}" name="user_id">
                                            <input id="name" name="name" type="text" class="form-control"
                                                placeholder="User name" value="{{ $get_winning_user->name }}" readonly>
                                            </div>

                                            <div class="w-full col-span-6">
                                                <label for="user_email" class="form-label"> Email <span
                                                    class="text-danger">*</span></label>
                                            <input type="hidden" value="{{ $get_winning_user->email }}"
                                                name="user_email">
                                            <input id="email" name="email" type="email" class="form-control"
                                                placeholder="User email" value="{{ $get_winning_user->email }}" readonly>
                                            </div>
                                        </div>


                                        <div class="mt-3">
                                            <input type="hidden" name="total_points"
                                                value="{{ $get_winning_user->total_points }}">
                                            <label for="points" class="form-label">Assign Prizes <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" id="prize" name="prize_id">

                                                <option value="">select</option>
                                                @forelse ($get_prizes as $prize)
                                                    <option value="{{ $prize->id }}">{{ $prize->name }}</option>
                                                @empty
                                                    <option value="">No prize</option>
                                                @endforelse

                                            </select>
                                        </div>

                                        @error('prize_id')
                                            <p class="text-danger py-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary w-30 mt-5">Assign Prize</button>
                    </div>
                </form>
            </div>
            <!-- END: Display Information -->
        </div>
    </div>
@endsection
