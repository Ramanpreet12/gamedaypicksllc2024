@push('css')
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">
@endpush


<div class="col-sm-4 col-md-3 mb-5">
    <div class="aSidebar">
        <div class="aSidebarCard">
            <h4><span><a href="{{ route('dashboard') }}" style="text-decoration:none;">Dashboard</a></span></h4>
            <ul class="sidebarLink">
                <li><a href="{{ route('teams') }}">Team Pick</a></li>
                <li><a href="{{ route('my_selections') }}">My Selections</a></li>
                <li><a href="{{ route('past_selections') }}">Past Selections</a></li>
                <li><a href="{{ route('userPayment') }}">Payments</a></li>
                <li><a href="{{ route('prizes') }}">Prizes</a></li>
                <li><a href="{{ route('upcomingMatches') }}">Upcoming Matches</a></li>
                <li><a href="{{ route('settings') }}">Settings</a></li>
                <li><a href="{{ route('update-password') }}">Change Password </a></li>
                <li><a href="{{ route('orderlist') }}">Orders</a></li>
                {{-- <li><a href="{{ route('greek-store-orders') }}">Greek Store Orders</a></li> --}}
                {{-- <li class="dropdown"><a href="{{ route('settings') }}" class="dropdown-toggle" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                    </ul>
                </li> --}}

            </ul>


        </div>
    </div>

</div>
