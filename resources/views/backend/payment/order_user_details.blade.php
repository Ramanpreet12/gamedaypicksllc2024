@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Order Details</title>
@endsection

@section('subcontent')
    <div class=" flex justify-between">
        <div>
            <h2 class="intro-y  px-5 text-lg font-medium mt-10 ">
                Order details
            </h2>
        </div>
        <div>
            <h2 class="intro-y  px-5 text-lg font-medium mt-10 ">
                Order ID : #{{ $order->id }}
            </h2>
        </div>
        <h2 class="intro-y  px-5 text-lg font-medium mt-10 ">
            Order Created At : {{ $order->order_created_date }}
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        {{-- <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <button class="button text-white bg-theme-1 shadow-md mr-2">Add New User</button>
        <div class="dropdown relative">
            <button class="dropdown-toggle button px-2 box text-gray-700">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
            </button>
            <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                <div class="dropdown-box__content box p-2">
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="users" class="w-4 h-4 mr-2"></i> Add Group </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="message-circle" class="w-4 h-4 mr-2"></i> Send Message </a>
                </div>
            </div>
        </div>
        <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700">
                <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
            </div>
        </div>
    </div> --}}
        <!-- BEGIN: Users Layout -->
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
            <div class="box">
                <div class="flex items-start px-5 pt-5">
                    <div class="w-full flex flex-col lg:flex-row items-center">
                        <div class="w-16 h-16 image-fit">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> --}}
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-md"
                                src="{{ asset('dist/images/customer.png') }}">
                        </div>
                        <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">Customer Details</a>
                            {{-- <div class="text-gray-600 text-xs">DevOps Engineer</div> --}}
                        </div>
                    </div>
                    {{-- <div class="absolute right-0 top-0 dropdown relative">
                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                        </div>
                    </div>
                </div> --}}
                </div>
                <div class="text-center lg:text-left p-5">
                    {{-- <div>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div> --}}
                    <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i
                            data-feather="mail" class="w-3 h-3 mr-2"></i> {{ $getUser->email }} </div>
                    <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i
                            data-feather="user" class="w-3 h-3 mr-2"></i> {{ $getUser->name }} </div>
                    <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i
                            data-feather="phone" class="w-3 h-3 mr-2"></i> {{ $getUser->phone_number }}</div>
                </div>
                {{-- <div class="text-center lg:text-right p-5 border-t border-gray-200">
                <button class="button button--sm text-white bg-theme-1 mr-2">Message</button>
                <button class="button button--sm text-gray-700 border border-gray-300">Profile</button>
            </div> --}}
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
            <div class="box">
                <div class="flex items-start px-5 pt-5">
                    <div class="w-full flex flex-col lg:flex-row items-center">
                        <div class="w-16 h-16 image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-md"
                                src="{{ asset('dist/images/location.png') }}">
                        </div>
                        <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">Location Details</a>
                            {{-- <div class="text-gray-600 text-xs">Software Engineer</div> --}}
                        </div>
                    </div>
                    {{-- <div class="absolute right-0 top-0 dropdown relative">
                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                        </div>
                    </div>
                </div> --}}
                </div>
                <div class="text-center lg:text-left p-5">
                    {{-- <div>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div> --}}
                    <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i
                            data-feather="map-pin" class="w-3 h-3 mr-2"></i> Raman, 12 Wilson Street, Tyrrell, Australia
                    </div>
                    <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i
                            data-feather="instagram" class="w-3 h-3 mr-2"></i> Brad Pitt </div>
                    <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i data-feather=""
                            class="w-3 h-3 mr-2"></i> </div>
                </div>
                {{-- <div class="text-center lg:text-right p-5 border-t border-gray-200">
                <button class="button button--sm text-white bg-theme-1 mr-2">Message</button>
                <button class="button button--sm text-gray-700 border border-gray-300">Profile</button>
            </div> --}}
            </div>
        </div>
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
            <div class="box">
                <div class="flex items-start px-5 pt-5">
                    <div class="w-full flex flex-col lg:flex-row items-center">
                        <div class="w-16 h-16 image-fit">
                            <img alt="" class="rounded-md" src="{{ asset('dist/images/payment.png') }}">
                        </div>
                        <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">Payment Details</a>
                            {{-- <div class="text-gray-600 text-xs">DevOps Engineer</div> --}}
                        </div>
                    </div>
                    {{-- <div class="absolute right-0 top-0 dropdown relative">
                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                        </div>
                    </div>
                </div> --}}
                </div>
                <div class="text-center lg:text-left p-5">
                    {{-- <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div> --}}
                    <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i
                            data-feather="hash" class="w-3 h-3 mr-2"></i>Transaction ID: TQB9NTS6EX97W </div>
                    <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i
                            data-feather="hash" class="w-3 h-3 mr-2"></i> Reference Number: 406800503295</div>
                    <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i
                            data-feather="credit-card" class="w-3 h-3 mr-2"></i> Payment Method: Card</div>
                </div>
                {{-- <div class="text-center lg:text-right p-5 border-t border-gray-200">
                <button class="button button--sm text-white bg-theme-1 mr-2">Message</button>
                <button class="button button--sm text-gray-700 border border-gray-300">Profile</button>
            </div> --}}
            </div>
        </div>
        {{-- <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
        <div class="box">
            <div class="flex items-start px-5 pt-5">
                <div class="w-full flex flex-col lg:flex-row items-center">
                    <div class="w-16 h-16 image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="dist/images/profile-3.jpg">
                    </div>
                    <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Johnny Depp</a>
                        <div class="text-gray-600 text-xs">Backend Engineer</div>
                    </div>
                </div>
                <div class="absolute right-0 top-0 dropdown relative">
                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center lg:text-left p-5">
                <div>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i data-feather="mail" class="w-3 h-3 mr-2"></i> johnnydepp@left4code.com </div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i data-feather="instagram" class="w-3 h-3 mr-2"></i> Johnny Depp </div>
            </div>
            <div class="text-center lg:text-right p-5 border-t border-gray-200">
                <button class="button button--sm text-white bg-theme-1 mr-2">Message</button>
                <button class="button button--sm text-gray-700 border border-gray-300">Profile</button>
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
        <div class="box">
            <div class="flex items-start px-5 pt-5">
                <div class="w-full flex flex-col lg:flex-row items-center">
                    <div class="w-16 h-16 image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="dist/images/profile-11.jpg">
                    </div>
                    <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Morgan Freeman</a>
                        <div class="text-gray-600 text-xs">Frontend Engineer</div>
                    </div>
                </div>
                <div class="absolute right-0 top-0 dropdown relative">
                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center lg:text-left p-5">
                <div>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i data-feather="mail" class="w-3 h-3 mr-2"></i> morganfreeman@left4code.com </div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i data-feather="instagram" class="w-3 h-3 mr-2"></i> Morgan Freeman </div>
            </div>
            <div class="text-center lg:text-right p-5 border-t border-gray-200">
                <button class="button button--sm text-white bg-theme-1 mr-2">Message</button>
                <button class="button button--sm text-gray-700 border border-gray-300">Profile</button>
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
        <div class="box">
            <div class="flex items-start px-5 pt-5">
                <div class="w-full flex flex-col lg:flex-row items-center">
                    <div class="w-16 h-16 image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="dist/images/profile-15.jpg">
                    </div>
                    <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Leonardo DiCaprio</a>
                        <div class="text-gray-600 text-xs">Frontend Engineer</div>
                    </div>
                </div>
                <div class="absolute right-0 top-0 dropdown relative">
                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center lg:text-left p-5">
                <div>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i data-feather="mail" class="w-3 h-3 mr-2"></i> leonardodicaprio@left4code.com </div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i data-feather="instagram" class="w-3 h-3 mr-2"></i> Leonardo DiCaprio </div>
            </div>
            <div class="text-center lg:text-right p-5 border-t border-gray-200">
                <button class="button button--sm text-white bg-theme-1 mr-2">Message</button>
                <button class="button button--sm text-gray-700 border border-gray-300">Profile</button>
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
        <div class="box">
            <div class="flex items-start px-5 pt-5">
                <div class="w-full flex flex-col lg:flex-row items-center">
                    <div class="w-16 h-16 image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="dist/images/profile-9.jpg">
                    </div>
                    <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Al Pacino</a>
                        <div class="text-gray-600 text-xs">Frontend Engineer</div>
                    </div>
                </div>
                <div class="absolute right-0 top-0 dropdown relative">
                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center lg:text-left p-5">
                <div>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i data-feather="mail" class="w-3 h-3 mr-2"></i> alpacino@left4code.com </div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i data-feather="instagram" class="w-3 h-3 mr-2"></i> Al Pacino </div>
            </div>
            <div class="text-center lg:text-right p-5 border-t border-gray-200">
                <button class="button button--sm text-white bg-theme-1 mr-2">Message</button>
                <button class="button button--sm text-gray-700 border border-gray-300">Profile</button>
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
        <div class="box">
            <div class="flex items-start px-5 pt-5">
                <div class="w-full flex flex-col lg:flex-row items-center">
                    <div class="w-16 h-16 image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="dist/images/profile-1.jpg">
                    </div>
                    <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Sylvester Stallone</a>
                        <div class="text-gray-600 text-xs">Frontend Engineer</div>
                    </div>
                </div>
                <div class="absolute right-0 top-0 dropdown relative">
                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center lg:text-left p-5">
                <div>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomi</div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i data-feather="mail" class="w-3 h-3 mr-2"></i> sylvesterstallone@left4code.com </div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i data-feather="instagram" class="w-3 h-3 mr-2"></i> Sylvester Stallone </div>
            </div>
            <div class="text-center lg:text-right p-5 border-t border-gray-200">
                <button class="button button--sm text-white bg-theme-1 mr-2">Message</button>
                <button class="button button--sm text-gray-700 border border-gray-300">Profile</button>
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
        <div class="box">
            <div class="flex items-start px-5 pt-5">
                <div class="w-full flex flex-col lg:flex-row items-center">
                    <div class="w-16 h-16 image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="dist/images/profile-6.jpg">
                    </div>
                    <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium">Brad Pitt</a>
                        <div class="text-gray-600 text-xs">Software Engineer</div>
                    </div>
                </div>
                <div class="absolute right-0 top-0 dropdown relative">
                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center lg:text-left p-5">
                <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i data-feather="mail" class="w-3 h-3 mr-2"></i> bradpitt@left4code.com </div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i data-feather="instagram" class="w-3 h-3 mr-2"></i> Brad Pitt </div>
            </div>
            <div class="text-center lg:text-right p-5 border-t border-gray-200">
                <button class="button button--sm text-white bg-theme-1 mr-2">Message</button>
                <button class="button button--sm text-gray-700 border border-gray-300">Profile</button>
            </div>
        </div>
    </div> --}}
        <!-- END: Users Layout -->

    </div>

    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
            <!-- BEGIN: Daily Sales -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Daily Sales
                    </h2>

                </div>
                {{-- <div class="p-5">
                                <div class="relative flex items-center">
                                    <div class="w-12 h-12 flex-none image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-14.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <a href="" class="font-medium">John Travolta</a>
                                        <div class="text-gray-600 mr-5 sm:mr-5">Bootstrap 4 HTML Admin Template</div>
                                    </div>
                                    <div class="font-medium text-gray-700">+$19</div>
                                </div>
                                <div class="relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <a href="" class="font-medium">Angelina Jolie</a>
                                        <div class="text-gray-600 mr-5 sm:mr-5">Tailwind HTML Admin Template</div>
                                    </div>
                                    <div class="font-medium text-gray-700">+$25</div>
                                </div>
                                <div class="relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/profile-7.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <a href="" class="font-medium">Johnny Depp</a>
                                        <div class="text-gray-600 mr-5 sm:mr-5">Vuejs HTML Admin Template</div>
                                    </div>
                                    <div class="font-medium text-gray-700">+$21</div>
                                </div>
                            </div> --}}

                <table class="table table-report -mt-2" id="payment_table">
                    <thead class="bg-primary text-white">
                        <tr>
                            {{-- <th class="text-center">Order Id</th> --}}
                            <th class="text-center ">Product</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Size</th>
                            {{-- <th class="text-center">Tax</th> --}}
                            {{-- <th class="text-center">Total Amount</th> --}}
                            {{-- <th class="text-center">Status</th> --}}

                        </tr>
                    </thead>

                    <tbody>

                        @if ($getOrderItems->isNotEmpty())
                            @foreach ($getOrderItems as $item)
                                <tr class="intro-x">
                                    <td class="text-center">
                                        <div class="flex">
                                            <div class="w-16 h-16 image-fit">

                                                @if ($item->store_type == 'shop')
                                                <a target="_blank" href="{{ url('admin/products/shop/'.$item->product_id.'/edit') }}">
                                                @endif
                                                @if ($item->store_type == 'greek-store')
                                                <a target="_blank" href="{{ url('admin/products/greek-store/'.$item->product_id.'/edit') }}">
                                                @endif


                                                <img alt="" class="rounded-md"
                                                    src="{{ asset('storage/images/products/' . $item->product_image) }}"></a>
                                            </div>
                                            <span>{{ $item->product_title }}</span>
                                        </div>
                                        
                                    </td>
                                    <td class="text-center">{{ $item->product_qty }}</td>
                                    <td class="text-center">${{ $item->product_price }}</td>
                                    <td class="text-center">{{ $item->product_size }}</td>

                                    
                                </tr>
                            @endforeach
                        @endif


                    </tbody>
                </table>
            </div>
        </div>

        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">

            <div class="box p-5 mt-5">
                <div class="flex">
                    <div class="mr-auto">Subtotal</div>
                    <div>${{ $order->subtotal_amount }}</div>
                </div>
                {{-- <div class="flex mt-4">
                    <div class="mr-auto">Discount</div>
                    <div class="text-theme-6">-$20</div>
                </div> --}}
                <div class="flex mt-4">
                    <div class="mr-auto">Tax</div>
                    <div>{{ $order->tax }}</div>
                </div>
                <div class="flex mt-4 pt-4 border-t border-gray-200">
                    <div class="mr-auto font-medium text-base">Total Amount</div>
                    <div class="font-medium text-base">${{ $order->total_amount }}</div>
                </div>
            </div>

        </div>
        <!-- END: Profile Menu -->
    </div>
@endsection



@section('script')
    <script>
        $(function() {
            $('#user_table').DataTable({
                scrollX: true,
            });
        });
    </script>
@endsection
