@extends('../layout/' . $layout)
@section('subhead')
    <title>{{ $general->name ? $general->name : 'NFL' }} | General</title>
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
            <h2 class="font-medium text-base mr-auto">General Setting</h2>
        </div>
        <form action="{{ route('admin/general_post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="horizontal-form" class="p-5">
                <div class="preview">
                    <div class="form-inline">
                        <label for="name" class="font-medium form-label sm:w-60">Name <span
                                class="text-danger">*</span></label>
                        <input id="name" type="text" class="form-control" placeholder="Name" name="name"
                            value="{{ $general->name }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="email" class="font-medium form-label sm:w-60">Email <span
                                class="text-danger">*</span></label>
                        <input id="email" type="text" class="form-control" placeholder="example@gmail.com"
                            name="email" value="{{ $general->email }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class=" form-inline mt-3">
                        <label for="email_color" class="font-medium form-label sm:w-60"> Email Text Color<span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="Emailtext_color" type="color" class="form-control" placeholder="color code"
                                aria-describedby="input-group-1" name="Emailtext_color" style="width: 20rem;"
                                value="{{ $general->email_color }}">
                        </div>
                    </div>


                    <div class="form-inline mt-5">
                        <label for="announcement_bar" class="font-medium form-label sm:w-60">Header Annoucement Bar <span
                                class="text-danger">*</span></label>
                        <input id="announcement_bar" type="text" class="form-control" name="announcement_bar"
                            value="{{ $general->announcement_bar }}" placeholder="Header Annoucement Bar">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('announcement_bar')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline mt-3">
                        <label for="header_announcement_bar_bg_color" class="font-medium form-label sm:w-60"> Header
                            Annoucement Bar Bg-color<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="header_announcement_bar_bg_color" type="color" class="form-control"
                                placeholder="color code for background color" aria-describedby="input-group-1"
                                name="header_announcement_bar_bg_color" style="width: 20rem;"
                                value="{{ $general->header_announcement_bar_bg_color }}">
                        </div>
                    </div>

                    <div class="form-inline mt-3">
                        <label for="header_announcement_bar_text_color" class="font-medium form-label sm:w-60"> Header
                            Annoucement Bar Text-color<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="header_announcement_bar_text_color" type="color" class="form-control"
                                placeholder="color code for text color" aria-describedby="input-group-1"
                                name="header_announcement_bar_text_color" style="width: 20rem;"
                                value="{{ $general->header_announcement_bar_text_color }}">
                        </div>
                    </div>


                    <div class="form-inline mt-5">
                        <label for="homepage_title" class="font-medium form-label sm:w-60">Homepage Banner Title <span
                                class="text-danger">*</span></label>
                        <input id="homepage_title" type="text" class="form-control" name="homepage_title"
                            value="{{ $general->homepage_title }}" placeholder="Homepage banner title">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('homepage_title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="homepage_subtitle" class="font-medium form-label sm:w-60">Homepage Banner
                            Subtitle <span class="text-danger">*</span></label>
                        <input id="homepage_subtitle" type="text" class="form-control" name="homepage_subtitle"
                            value="{{ $general->homepage_subtitle }}" placeholder="Homepage banner subtitle">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('homepage_subtitle')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="logo" class="font-medium form-label sm:w-60">Logo <span
                                class="text-danger">*</span></label>
                        <input id="logo" type="file" class="form-control" placeholder="Website Logo"
                            name="logo">
                        <input id="logo" type="hidden" class="form-control" placeholder="Website Logo"
                            name="current_logo" value="{{ $general->logo }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('logo')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    @if (!empty($general->logo))
                        <div class="form-inline mt-5">
                            <label for="logo" class="font-medium form-label sm:w-60"></label>
                            <img src="{{ asset('storage/images/general/' . $general->logo) }}" alt=""
                                height="50px" width="100px">
                        </div>
                    @else
                        <div class="form-inline mt-5">
                            <label for="logo" class="font-medium form-label sm:w-60"></label>
                            <img alt="Admin Image" class="rounded-full" height="50px" width="100px"
                                src="{{ asset('dist/images/dummy_image.webp') }}">
                        </div>
                    @endif
                    <div class="form-inline mt-5">
                        <label for="favicon" class="font-medium form-label sm:w-60">Favicon <span
                                class="text-danger">*</span></label>
                        <input id="favicon" type="file" class="form-control" placeholder="Favicon" name="favicon">
                        <input id="favicon" type="hidden" class="form-control" placeholder="Favicon"
                            name="current_favicon" value="{{ $general->favicon }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('favicon')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    @if (!empty($general->favicon))
                        <div class="form-inline mt-5">
                            <label for="logo" class="font-medium form-label sm:w-60"></label>
                            <img src="{{ asset('storage/images/general/' . $general->favicon) }}" alt=""
                                height="50px" width="100px">
                        </div>
                    @else
                        <div class="form-inline mt-5">
                            <label for="logo" class="font-medium form-label sm:w-60"></label>
                            <img alt="Admin Image" class="rounded-full" height="50px" width="100px"
                                src="{{ asset('dist/images/dummy_image.webp') }}">
                        </div>
                    @endif
                    <div class="form-inline mt-5">
                        <label for="footer_contact" class="font-medium form-label sm:w-60">Footer contact <span
                                class="text-danger">*</span></label>
                        <input id="footer_contact" type="text" class="form-control" placeholder="Contact"
                            name="footer_contact" value="{{ $general->footer_contact }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('footer_contact')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class=" form-inline mt-3">
                        <label for="button_color" class="font-medium form-label sm:w-60">Footer Contact Color<span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="FooterContact_color" type="color" class="form-control" placeholder="color code"
                                aria-describedby="input-group-1" name="FooterContact_color" style="width: 20rem;"
                                value="{{ $general->footer_contact_color }}">
                        </div>
                    </div>


                    <div class="form-inline mt-5">
                        <label for="footer_contact2" class="font-medium form-label sm:w-60">Other contact</label>
                        <input id="footer_contact2" type="text" class="form-control" placeholder="Other Contact"
                            name="footer_contact2" value="{{ $general->footer_contact2 }}">
                    </div>
                    <div class=" form-inline mt-3">
                        <label for="button_color" class="font-medium form-label sm:w-60">Other Contact Color<span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="otherContact_color" type="color" class="form-control" placeholder="color code"
                                aria-describedby="input-group-1" name="otherContact_color" style="width: 20rem;"
                                value="{{ $general->other_contact_color }}">
                        </div>
                    </div>

                    <div class="form-inline mt-5">
                        <label for="footer_address" class="font-medium form-label sm:w-60">Footer Address <span
                                class="text-danger">*</span></label>
                        <textarea name="footer_address" id="footer_address" cols="20" rows="3" placeholder="Address"
                            class="form-control">{{ $general->footer_address }}</textarea>
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('footer_address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class=" form-inline mt-3">
                        <label for="button_color" class="font-medium form-label sm:w-60">Footer Address Color<span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="Footeraddress_color" type="color" class="form-control" placeholder="color code"
                                aria-describedby="input-group-1" name="Footeraddress_color" style="width: 20rem;"
                                value="{{ $general->footer_add_color }}">
                        </div>
                    </div>


                    <div class="form-inline mt-5">
                        <label for="footer_content_head" class="font-medium form-label sm:w-60">Footer Content Head<span
                                class="text-danger"></span></label>
                        <textarea name="footer_content_head" id="footer_content_head" cols="20" rows="3"
                            placeholder="Content Heading" class="form-control" class="form-control">{{ $general->footer_content_head }}</textarea>
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('footer_content_head')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-inline mt-5">
                        <label for="footer_content" class="font-medium form-label sm:w-60">Footer Content <span
                                class="text-danger">*</span></label>
                        <textarea name="footer_content" id="footer_content" cols="20" rows="3" placeholder="Content"
                            class="form-control">{{ $general->footer_content }}</textarea>
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('footer_content')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class=" form-inline mt-3">
                        <label for="button_color" class="font-medium form-label sm:w-60">Footer Content Color<span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="FooterContent_color" type="color" class="form-control" placeholder="color code"
                                aria-describedby="input-group-1" name="FooterContent_color" style="width: 20rem;"
                                value="{{ $general->footer_content_color }}">
                        </div>
                    </div>



                    <div class="form-inline mt-5">
                        <label for="footer_affliated_text" class="font-medium form-label sm:w-60">Footer Affliated text
                        </label>
                        <input id="footer_affliated_text" type="text" class="form-control"
                            placeholder="For eg  Illinois secretary " name="footer_affliated_text"
                            value="{{ $general->footer_affliated_text }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('footer_affliated_text')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class=" form-inline mt-3">
                        <label for="button_color" class="font-medium form-label sm:w-60">Footer Affliated Color<span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="FooterAffliated_color" type="color" class="form-control"
                                placeholder="color code" aria-describedby="input-group-1" name="FooterAffliated_color"
                                style="width: 20rem;" value="{{ $general->footer_afilated_color }}">
                        </div>
                    </div>


                    <div class="form-inline mt-5">
                        <label for="footer_affliated_link" class="font-medium form-label sm:w-60">Footer Affliated URL
                            <span class="text-danger"></span></label>
                        <input id="footer_affliated_link" type="text" class="form-control"
                            placeholder="For eg   State of Illinois Secretary State's website  link"
                            name="footer_affliated_link" value="{{ $general->footer_affliated_link }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('footer_affliated_link')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="privacy_policy" class="font-medium form-label sm:w-60">Privacy Policy <span
                                class="text-danger">*</span></label>
                        <input id="privacy_policy" type="text" class="form-control" placeholder="Privacy Policy"
                            name="privacy_policy" value="{{ $general->privacy_policy }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('privacy_policy')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline mt-3">
                        <label for="privacy_policy_color" class="font-medium form-label sm:w-60">Privacy Policy Color<span
                                class="text-danger"></span></label>
                        <div class="input-group">
                            <input id="privacy_policy_color" type="color" class="form-control"
                                placeholder="color code for Privacy Policy" aria-describedby="privacy_policy_color"
                                name="privacy_policy_color" style="width: 20rem;"
                                value="{{ $general->privacy_policy_color }}">
                        </div>
                    </div>

                    <div class="form-inline mt-5">
                        <label for="santa_game_store" class="font-medium form-label sm:w-60">Santa Game Store <span
                                class="text-danger">*</span></label>
                        <input id="santa_game_store" type="text" class="form-control" placeholder="Santa Game Store"
                            name="santa_game_store" value="{{ $general->santa_game_store }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('santa_game_store')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline mt-3">
                        <label for="santa_game_store_color" class="font-medium form-label sm:w-60">Santa Game Color<span
                                class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="santa_game_store_color" type="color" class="form-control"
                                placeholder="color code for Santa Game Store" aria-describedby="santa_game_store_color"
                                name="santa_game_store_color" style="width: 20rem;"
                                value="{{ $general->santa_game_store_color }}">
                        </div>
                    </div>

                    <div class="form-inline mt-5">
                        <label for="santa_game_store_link" class="font-medium form-label sm:w-60">Santa Game Store Link
                            <span class="text-danger"></span></label>
                        <input id="santa_game_store_link" type="text" class="form-control"
                            placeholder="Santa Game Store link" name="santa_game_store_link"
                            value="{{ $general->santa_game_store_link }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('santa_game_store_link')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-inline mt-5">
                        <label for="footer_bar" class="font-medium form-label sm:w-60">Copyright <span
                                class="text-danger">*</span></label>
                        <input id="footer_bar" type="text" class="form-control"
                            placeholder="GAMEDAY PICKS, LLC © 2023. All Rights Reserved" name="footer_bar"
                            value="{{ $general->footer_bar }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('footer_bar')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline mt-3 mb-3">
                        <label for="copyright_color" class="font-medium form-label sm:w-60">Copyright Color<span
                                class="text-danger"></span></label>
                        <div class="input-group">
                            <input id="copyright_color" type="color" class="form-control"
                                placeholder="color code for Privacy Policy" aria-describedby="copyright_color"
                                name="copyright_color" style="width: 20rem;" value="{{ $general->copyright_color }}">
                        </div>
                    </div>


                    <hr class="mt-2">

                    <div class="flex flex-col sm:flex-row items-center p-5">
                        <h2 class="font-medium text-base mr-auto">Social Links</h2>
                    </div>

                    <div class="form-inline mt-5">
                        <label for="facebook" class="font-medium form-label sm:w-60">Facebook <span
                                class="text-danger"></span></label>
                        <input id="facebook" type="text" class="form-control"
                            placeholder="https://www.facebook.com/" name="facebook"
                            value="{{ $social_links['Facebook'] }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('facebook')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-inline mt-5">
                        <label for="twitter" class="font-medium form-label sm:w-60">Twitter <span
                                class="text-danger"></span></label>
                        <input id="twitter" type="text" class="form-control" placeholder="https://www.twitter.com/"
                            name="twitter" value="{{ $social_links['Twitter'] }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('twitter')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="instagram" class="font-medium form-label sm:w-60">Instagram <span
                                class="text-danger"></span></label>
                        <input id="instagram" type="text" class="form-control"
                            placeholder="https://www.instagram.com/" name="instagram"
                            value="{{ $social_links['Instagram'] }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('instagram')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="google_plus" class="font-medium form-label sm:w-60">Google Plus <span
                                class="text-danger"></span></label>
                        <input id="google_plus" type="text" class="form-control"
                            placeholder="https://www.google.com/" name="google_plus"
                            value="{{ $social_links['Google'] }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('google_plus')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-inline mt-5">
                        <label for="youtube" class="font-medium form-label sm:w-60">Youtube <span
                                class="text-danger"></span></label>
                        <input id="youtube" type="text" class="form-control" placeholder="https://www.youtube.com/"
                            name="youtube" value="{{ $social_links['Youtube'] }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('youtube')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-inline mt-5">
                        <label for="pinterest" class="font-medium form-label sm:w-60">Pinterest <span
                                class="text-danger"></span></label>
                        <input id="pinterest" type="text" class="form-control"
                            placeholder="https://www.pinterest.com/" name="pinterest"
                            value="{{ $social_links['Pinterest'] }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('pinterest')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-inline mt-5">
                        <label for="linkedin" class="font-medium form-label sm:w-60">Linkedin<span
                                class="text-danger"></span></label>
                        <input id="linkedin" type="text" class="form-control"
                            placeholder="https://www.linkedin.com/" name="linkedin"
                            value="{{ $social_links['Linkedin'] }}">
                    </div>
                    <div class="form-inline">
                        <label for="" class="font-medium form-label sm:w-60"></label>
                        @error('linkedin')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <br><br>
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="btn btn-primary w-24">Update</button>
                    <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection
