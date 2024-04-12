<!-- BEGIN: Top Bar -->
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Application</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin/dashboard')}}">Dashboard</a></li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Search -->
    <div class="intro-x relative mr-3 sm:mr-6">
        
    </div>
   
    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">


            @if (!empty(Auth::user()->photo))
            <img alt="Admin Image" class="rounded-full"
            src="{{asset('storage/admin_profile_photo/'. Auth::user()->photo) }}">
            @else

            <img alt="Admin Image" class="rounded-full"
            src="{{asset('dist/images/dummy_image.webp')}}">
            @endif


            {{-- <img alt="Rubick Tailwind HTML Admin Template" src="{{ asset('dist/images/' . $fakers[9]['photos'][0]) }}"> --}}
        </div>
        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    {{-- <div class="font-medium">{{ $fakers[0]['users'][0]['name'] }}</div> --}}
                    {{-- <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{ $fakers[0]['jobs'][0] }}</div> --}}

                    <div class="font-medium">{{Auth::user()->name }}</div>
                    <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">{{ Auth::user()->role_as == 0 ? 'Admin' : '' }}</div>

                </li>
                <li><hr class="dropdown-divider border-white/[0.08]"></li>
                <li>
                    <a href="{{route('admin/profile')}}" class="dropdown-item hover:bg-white/5">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile
                    </a>
                </li>
                {{-- <li>
                    <a href="" class="dropdown-item hover:bg-white/5">
                        <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account
                    </a>
                </li> --}}
                <li>
                    <a href="{{route('admin/password')}}" class="dropdown-item hover:bg-white/5">
                        <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password
                    </a>
                </li>
                {{-- <li>
                    <a href="" class="dropdown-item hover:bg-white/5">
                        <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help
                    </a>
                </li> --}}
                <li><hr class="dropdown-divider border-white/[0.08]"></li>
                <li>
                    <a href="{{ route('admin/logout') }}" class="dropdown-item hover:bg-white/5">
                        <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
