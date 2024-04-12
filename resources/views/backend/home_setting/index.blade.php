@extends('../layout/' . $layout)

@section('subhead')
    <title>NFL | News Setting</title>
@endsection

@section('subcontent')
@if (session()->has('success'))
<div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
        class="bi bi-check2-circle" viewBox="0 0 16 16">
        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
    </svg>
    &nbsp; {{ session()->get('success') }}
</div>
@endif
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">

        <h2 class="text-lg font-medium mr-auto">News Setting</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <form action="{{route('admin/news/section_heading')}}" method="post">
                @csrf
                    <div id="horizontal-form" class="px-3 flex">
                        @if (!empty($NewsHeading->value))
                        <div class="preview mx-3">
                            <div class="form-inline">
                                <label for="section_heading" class="font-medium form-label sm:w-60">Section Title</label>
                                <input id="section_heading" type="text" class="form-control" placeholder="Section Name" name="section_heading"
                                @if (!empty($NewsHeading->value))
                                value="{{$NewsHeading->value}}"
                                @else
                                value=""
                                @endif>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary w-30">Update Title</button>
                        </div>
                        @endif
                    </div>
            </form>
            <a class="btn btn-primary shadow-md mr-2" href="{{route('news.create')}}">Add News</a>
             <div class="dropdown ml-auto sm:ml-0">
            </div>
        </div>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y box p-5 mt-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto" >
                <div class="sm:flex items-center sm:mr-4">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Field</label>
                    <select id="tabulator-html-filter-field" class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
                        <option value="logo">Name</option>
                        <option value="title">title</option>
                    </select>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Type</label>
                    <select id="tabulator-html-filter-type" class="form-select w-full mt-2 sm:mt-0 sm:w-auto" >
                        <option value="like" selected>like</option>
                        <option value="=">=</option>
                        <option value="<">&lt;</option>
                        <option value="<=">&lt;=</option>
                        <option value=">">></option>
                        <option value=">=">>=</option>
                        <option value="!=">!=</option>
                    </select>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Value</label>
                    <input id="tabulator-html-filter-value" type="text" class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0"  placeholder="Search...">
                </div>
                <div class="mt-2 xl:mt-0">
                    <button id="tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16" >Go</button>
                    <button id="tabulator-html-filter-reset" type="button" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1" >Reset</button>
                </div>
            </form>

        </div>


        <div class="overflow-x-auto scrollbar-hidden">
            <div id="tabulator_homesetting" class="mt-5 table-report table-report--tabulator"></div>
            <input id="section" type="hidden" value="">
        </div>
    </div>
    <!-- END: HTML Table Data -->
@endsection
