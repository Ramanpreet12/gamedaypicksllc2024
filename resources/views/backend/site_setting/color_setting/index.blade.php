@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Color Setting</title>
@endsection

@section('subcontent')
    @if (session()->has('message_success'))
        <div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2-circle"
                viewBox="0 0 16 16">
                <path
                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                <path
                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
            </svg>

            &nbsp; {{ session()->get('message_success') }}
        </div>
    @endif
    <h2 class="intro-y text-lg font-medium mt-10">Color Setting</h2>

    <div class="grid grid-cols-12 gap-6 mt-5 p-5 bg-white">

        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center whitespace-nowrap">#</th>
                        <th class="text-center whitespace-nowrap">Section</th>
                        <th class="text-center whitespace-nowrap">Header Color</th>
                        <th class="text-center whitespace-nowrap">Text Color</th>
                        <th class="text-center whitespace-nowrap">Button Color</th>
                        <th class="text-center whitespace-nowrap">Background Color</th>
                        <th class="text-center whitespace-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <p style="display:none;"> {{ $count = 1 }}</p>

                    @foreach ($color_setting as $color)
                        <tr class="intro-x">
                            <td> {{ $count++ }}</td>
                            <td class="text-center whitespace-nowrap">{{ ucfirst($color['section']) }}</td>
                            <td class="text-center whitespace-nowrap"><span class="showcolor"
                                    style="background-color:{{ $color['header_color'] }}; "></span></td>
                            <td class="text-center whitespace-nowrap"><span class="showcolor"
                                    style="background-color:{{ $color['text_color'] }}; "></span></td>
                            <td class="text-center whitespace-nowrap"><span class="showcolor"
                                    style="background-color:{{ $color['button_color'] }}; "></span></td>
                            <td class="text-center whitespace-nowrap"><span class="showcolor"
                                    style="background-color:{{ $color['bg_color'] }}; "></span></td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ url('admin/edit_color/' . $color['id']) }}">
                                        <i data-feather="edit" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <style type="text/css">
        .showcolor {
            width: 20px;
            height: 20px;
            display: flex;
            border-radius: 50%;
            border: 1px solid #c4c4c4;
        }
    </style>
@endsection
