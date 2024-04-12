@extends('../layout/' . $layout)

@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | Winner</title>
@endsection

@section('subcontent')
    <div class="intro-y box mt-5">
        @if (session()->has('success'))
            <div class="alert alert-success show flex items-center mb-2 alert_messages" role="alert">
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
        @if (session('message_error'))
            <div class="alert alert-danger-soft show flex items-center mb-2 alert_messages" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-alert-octagon w-6 h-6 mr-2">
                    <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                {{ session('message_error') }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">Edit Assigned Prize </h2>
            <a href="{{route('winner.index')}}"><button class="btn btn-primary">Back</button></a>
        </div>

        <form action="{{ route('winner.update', $get_prize_assigned_to_user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div id="horizontal-form" class="p-5">
                <div class="preview  mr-5">

                    <input type="hidden" value="{{$get_prize_assigned_to_user->season_id}}" name="season_id">
                    <div class="form-inline mt-5">
                        <label for="name" class="font-medium form-label sm:w-60">User Name <span class="text-danger">*</span></label>
                        <input type="hidden" value="{{$get_prize_assigned_to_user->user_id}}" name="user_id" >
                        <input id="name" name="" type="text" class="form-control" placeholder="Winner User Name"  value="{{$get_prize_assigned_to_user->user->name}}" readonly>
                    </div>
                    <div class="form-inline mt-5">
                        <label for="name" class="font-medium form-label sm:w-60">User Email <span class="text-danger">*</span></label>
                        <input id="name" name="" type="text" class="form-control" placeholder="Enter Team name"  value="{{$get_prize_assigned_to_user->user->email}}" readonly>
                    </div>
                    <div class="form-inline mt-5">
                        <input type="hidden"  name="total_points" value="{{$get_prize_assigned_to_user->total_points}}" >
                        <label for="points" class="font-medium form-label sm:w-60">Points <span class="text-danger">*</span></label>
                        <input id="points" type="text" class="form-control" placeholder="Enter the points for the prize" name="" value="{{$get_prize_assigned_to_user->total_points}}" readonly>
                    </div>

                    <div class="form-inline mt-5">
                        <label for="name" class="font-medium form-label sm:w-60">Assigned Prize</label>
                        <input id="name" name="" type="text" class="form-control" placeholder="Assigned Prize"  value="{{$get_prize_assigned_to_user->prize->name}}" readonly>
                    </div>


                    <div class="form-inline mt-5">
                        <label for="image" class="font-medium form-label sm:w-60">Image</label>

                    </div>

                    @if (!empty($get_prize_assigned_to_user->prize->image))
                    <div class="form-inline">
                        <label for="image" class="font-medium form-label sm:w-60"></label>
                        <img src="{{asset('storage/images/prize/'.$get_prize_assigned_to_user->prize->image)}}" class="img-fluid" alt="" height="50px"  width="100px">
                    </div>
                    @else
                            <div class="form-inline mt-5">
                                <label for="image" class="font-medium form-label sm:w-60"></label>
                                <img src="{{asset('dist/images/no-image.png')}}" alt="" class="img-fluid" height="50px"  width="100px">
                            </div>

                    @endif


                    <div class="form-inline mt-5 mt-2">
                        <label for="prize" class="font-medium form-label sm:w-60">Edit Assigend Prizes</label>
                        <select class="form-control" id="prize" name="prize_id">

                            <option value="">select</option>
                            @forelse ($get_prizes as $prize)
                            <option value="{{$prize->id}}" {{$get_prize_assigned_to_user->prize->id == $prize->id ? 'selected' : '' }}>{{$prize->name}}</option>
                            @empty
                            <option value="">No prize</option>
                            @endforelse

                        </select>

                    </div>

                    <div class="form-inline mt-5">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('prize_id')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <br><br>
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-34">Assign Prize</button>
                    <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
