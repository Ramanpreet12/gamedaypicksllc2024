<nav class="navbar navbar-expand-lg navbarDesktop" style="background-color:{{ $colorSection['header']['bg_color'] }};">

    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('home') }}">

            @if (!empty($general->logo))
                <img src="{{ asset('storage/images/general/' . $general->logo) }}" alt="logo" height="50px"
                    width="100px">
            @else
                <img src="{{ asset('front/img/football picks.png') }}" alt="logo" class="img-fluid">
            @endif

        </a>

        @if (Auth::guest())
            <div class="loginbtn">

                <a href="{{ url('login') }}" class="btn btn-primary"
                    style="color:{{ $colorSection['header']['text_color'] }};" type="submit">log in </a>

            </div>
        @else
            <div class="loginbtn userDropdown dropdown">

                <a href="" class="dropdown-toggle"
                    style="color:{{ $colorSection['header']['text_color'] }}; text-decoration: none;" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">

                    {{ Auth::user()->name }} &nbsp;<i class="fa-solid fa-user"></i>

                </a>

                <ul class="dropdown-menu">



                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>

                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>

                </ul>

            </div>
        @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto me-auto  mb-2 mb-lg-0 main-menu">



                @foreach ($mainMenus as $menuMenu)
                    <li class="nav-item  dropdown">

                        @php  $check_submenu = get_main_menus($menuMenu->id)  @endphp

                        <a @if ($check_submenu != '') class="nav-link {{ $check_submenu }}"  @else class="nav-link" @endif
                            @if ($menuMenu->url) href="<?php echo url($menuMenu->url); ?>" @else href="javascript:void(0)" @endif
                            role="button" data-bs-toggle="" aria-expanded="false"
                            style="color:{{ $colorSection['header']['text_color'] }}">

                            {{ $menuMenu->title }}<span class="navHoverEffect"> </span></a>



                        @if ($check_submenu != '')
                            <div class="dropdown-menu megaMenu" x-placement="bottom-start"
                                style="position: absolute; background-color:{{ $colorSection['navbar']['bg_color'] }};">

                                <div class="container">

                                    <div class="row">

                                        <ul class="navbar-nav dropList">

                                            @foreach ($subMenus as $subMenu)
                                                @if ($subMenu->parent_id == $menuMenu->id)
                                                    <li class="nav-item"> <a class="dropdown-item"
                                                            href="{{ $subMenu->url }}">{{ $subMenu->title }}</a></li>
                                                @endif
                                            @endforeach

                                        </ul>

                                    </div>

                                </div>

                            </div>
                        @endif

                    </li>
                @endforeach

                <li class="nav-item"><a type="button" href="javascript:void(0)" class="nav-link" data-bs-toggle="modal"
                        data-bs-target="#addReviewModal"
                        style="color:{{ $colorSection['header']['text_color'] }}">Reviews <span class="navHoverEffect">
                        </span></a></li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                      @if(Auth::user())
                        @if(Auth::user()->age == 'NULL' && Auth::user()->role_as == 1)
                        href="{{ route('shop') }}"
                        @elseif(Auth::user()->age <= config('app.youth_age_limit') && Auth::user()->role_as == 0) 
                        href="{{ route('pony-express-flag-football-shop') }}"
                        @else
                        href="{{ route('shop') }}"
                         @endif
                    @else
                    href="{{ route('shop') }}"
                    @endif
                        style="color:{{ $colorSection['header']['text_color'] }}" id="navbarDropdown">Shop <span
                            class="navHoverEffect">
                        </span></a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('greek-store') }}">Greek store</a></li>

                    </ul>
                </li>


                <li class="nav-item"><a
                        @if (Auth::user()) href="{{ url('cart') }}"   @else href="{{ route('login') }}" @endif
                        class="nav-link" style="color:{{ $colorSection['header']['text_color'] }}"> <i
                            class="fas fa-shopping-cart fa-xs cart_icon" style="font-size:15px"></i> <span
                            class="navHoverEffect"> </span></a></li>
            </ul>
        </div>

    </div>

</nav>



<!-- mobile navbar  ------------------mobile navbar--------------------------mobile navbar-------------------------------------------------->

<nav class="navbar navbar-expand-lg navbarMobile" style="background-color:{{ $colorSection['header']['bg_color'] }};">

    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('home') }}">

            @if (!empty($general->logo))
                <img src="{{ asset('storage/images/general/' . $general->logo) }}" alt="logo" height="50px"
                    width="100px">
            @else
                <img src="{{ asset('front/img/football picks.png') }}" alt="logo" class="img-fluid">
            @endif

        </a>

        @if (Auth::guest())
            <div class="loginbtn">

                <a href="{{ url('login') }}" class="btn btn-primary"
                    style="color:{{ $colorSection['header']['text_color'] }};" type="submit">log in </a>

            </div>
        @else
            <div class="loginbtn userDropdown dropdown">

                <a href="" class="dropdown-toggle"
                    style="color:{{ $colorSection['header']['text_color'] }}; text-decoration: none;" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">

                    {{ Auth::user()->name }} &nbsp;<i class="fa-solid fa-user"></i>

                </a>

                <ul class="dropdown-menu">

                    <br>

                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>

                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>

                </ul>

            </div>
        @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto me-auto  mb-2 mb-lg-0 main-menu">



                @foreach ($mainMenus as $mobile_menuMenu)
                    <li class="nav-item dropdown">

                        @php  $mobile_check_submenu = get_main_menus($mobile_menuMenu->id)  @endphp

                        <a class="nav-link"
                            @if ($mobile_menuMenu->url) href="<?php echo url($mobile_menuMenu->url); ?>" @else href="javascript:void(0)" @endif
                            style="color:{{ $colorSection['header']['text_color'] }}">

                            {{ $mobile_menuMenu->title }}<span class="navHoverEffect"> </span></a>









                        @if ($mobile_check_submenu != '')
                            <span type="button" class="dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">

                                <span class="visually-hidden">Dropdown</span>

                            </span>

                            <div class="dropdown-menu megaMenu" x-placement="bottom-start"
                                style="position: absolute; background-color:{{ $colorSection['navbar']['bg_color'] }};">

                                <div class="container">

                                    <div class="row">

                                        <ul class="navbar-nav dropList">

                                            @foreach ($subMenus as $subMenu)
                                                @if ($subMenu->parent_id == $mobile_menuMenu->id)
                                                    <li class="nav-item"> <a class="dropdown-item"
                                                            href="{{ $subMenu->url }}">{{ $subMenu->title }}</a></li>
                                                @endif
                                            @endforeach

                                        </ul>

                                    </div>

                                </div>

                            </div>
                        @endif





                    </li>
                @endforeach



                <li class="nav-item"><a type="button" href="javascript:void(0)" class="nav-link"
                        data-bs-toggle="modal" data-bs-target="#addReviewModal"
                        style="color:{{ $colorSection['header']['text_color'] }}">Reviews <span
                            class="navHoverEffect">

                        </span></a></li>



            </ul>



        </div>

    </div>

</nav>



<style type="text/css">
    .navbar .navbar-collapse .navbar-nav .dropdown .dropdown-menu a {

        background-color: <?php echo $colorSection['navbar']['bg_color']; ?>;

        color: <?php echo $colorSection['navbar']['text_color']; ?>;

    }



    .btn-primary:before {

        background-color: <?php echo $colorSection['header']['button_color']; ?>;

    }



    .btn-primary:after {

        background-color: <?php echo $colorSection['header']['button_color']; ?>;

    }



    /* for jquery validation errror messages on reviews form  */

    .error {

        color: red;

    }



    .btn-selected-team {
        background-color: #ffb301af;
    }

    .btn-selected-team:before {
        background-color: #ffb301af;
    }

    .btn-selected-team:after {
        background-color: #ffb301af;
    }


    .btn-selected-team {
        background-color: #ffb301af;
    }

    .btn-selected-team:before {
        background-color: #ffb301af;
    }

    .btn-selected-team:after {
        background-color: #ffb301af;
    }
</style>









<!-- Modal -->

<div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="addReviewModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            @if (session()->has('reviews_success'))
                <div class="alert alert-success">

                    {{ session()->get('reviews_success') }}

                </div>
            @endif

            <div class="modal-header">



                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body text-center">

                <h1 class="modal-title fs-5 mb-3" id="addReviewModalLabel">WRITE A REVIEW</h1>

                <div class="title-description mb-5 fs-10">We'd love to hear more from our visitors. Your feedback will

                    help us to undestand what we do well and where we can improve.</div>

                <form method="post" action="{{ route('reviews') }}" id="reviewForm">

                    @csrf

                    <div class="mb-3">

                        <div class="row">

                            <div class="col-6">

                                <input type="text" class="form-control" id="recipient-name"
                                    placeholder="User name" name="username" value="{{ old('username') }}">

                                @error('username')
                                    <p class="text-danger text-xs"> {{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-6">

                                <input type="email" class="form-control" id="recipient-email"
                                    placeholder="Email address" name="email" value="{{ old('email') }}">

                                @error('email')
                                    <p class="text-danger text-xs"> {{ $message }}</p>
                                @enderror

                            </div>

                        </div>



                    </div>

                    <div class="mb-3">

                        <textarea class="form-control" id="message-text" placeholder="Comments" name="comment">{{ old('comment') }}</textarea>

                        @error('comment')
                            <p class="text-danger text-xs"> {{ $message }}</p>
                        @enderror

                    </div>



                    <div class="ratingStars my-4">

                        <div class="ratingWrapper">

                            <input type="hidden" name="rating" id="rating">

                            @for ($i = 1; $i <= 5; $i++)
                                <i id="rating-{{ $i }}"
                                    class="fa-solid fa-star {{ $i >= 0 ? 'text-secondary' : 'text-warning' }} icon-click"></i>
                            @endfor

                            @error('rating')
                                <p class="text-danger text-xs"> {{ $message }}</p>
                            @enderror

                            <p id="rating_empty_msg" style="color:red"></p>



                        </div>

                    </div>



                    <div class="modrenButton mb-4">

                        <button type="submit" class="btn btn-primary" name="submit">Send Review</button>

                    </div>

                </form>





            </div>

            <!-- <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <button type="button" class="btn btn-primary">Save changes</button>

      </div> -->

        </div>

    </div>

</div>



<!-- Modal -->

<div class="modal fade" id="reviews_success_modal" tabindex="-1" aria-labelledby="selectTeamLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel"></h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body" id="teamSelectedMsg">

                <div id="reviews_success_modal_Form">

                    <div class="successPage">

                        <i class="fa-solid fa-check"></i>

                        <h2 id="modal_success_heading"></h2>

                        <p>We've received your request ,</p>

                        <p> if you have any query please <a href="{{ route('contact') }}">contact us</a> </p>



                    </div>

                </div>

            </div>

            <div class="modal-footer justify-content-center">

                <button type="button" class="btn btn-secondary pr-4" data-bs-dismiss="modal">Close</button>

                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}

            </div>

        </div>

    </div>

</div>
