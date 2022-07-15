<style>
    /* ----- CSS ----- */
    #popup {
        display: inline-block;
        opacity: 0;
        position: fixed;
        top: 20%;
        left: 50%;
        /* top: 0;
        left: 0; */
        /* width: 100%; */
        height: 100%;
        z-index:99;
        padding: 1em;
        transform: translateX(-50%);
        background: #fff;
        border: 1px solid #888;
        box-shadow: 1px 1px .5em 0 rgba(0, 0, 0, .5);
        transition: opacity .3s ease-in-out;
    }

    #popup.hidden {
        display: none;
    }

    #popup.fade-in {
        opacity: 1;
    }
</style>
<section class="banner-section-nine"
    style="background-image: url(@if (!empty($banner_image)) {{ $banner_image_url }} @endif)">
    <div class="auto-container">
        <div class="cotnent-box">
            <div class="title-box wow fadeInUp" data-wow-delay='300ms'>
                <h3>{!! $title !!}</h3>
                <div class="text">{{ $sub_title }}</div>
            </div>
            <div id="popup" class="hidden">
                <div class="img">
                    {{-- <img src="quit.png" alt='quit' class='x' id='x' />    --}}
                    <img src="popup.png" />
                </div>
            </div>
            <!-- Job Search Form -->
            {{-- <div class="job-search-form wow">
                <form method="get" action="{{ route('job.search') }}">
                    <div class="row">
                        <!-- Form Group -->
                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <label>{{ __("What job are you looking for") }}?</label>
                            <span class="icon flaticon-search-1"></span>
                            <input type="text" name="field_name" placeholder="{{ __("Job title...") }}">
                        </div>

                        <!-- Form Group -->
                        @if ($location_style == 'autocomplete')
                            @php
                                $location_name = "";
                                $list_json = [];
                                $location_id = request()->get('location');
                                $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json, &$location_name, $location_id) {
                                    foreach ($locations as $location) {
                                        $translate = $location->translateOrOrigin(app()->getLocale());
                                        if ($location_id == $location->id) {
                                            $location_name = $translate->name;
                                        }
                                        $list_json[] = [
                                            'id'    => $location->id,
                                            'title' => $prefix.' '.$translate->name,
                                        ];
                                        $traverse($location->children, $prefix.'-');
                                    }
                                };
                                $traverse($list_locations);
                            @endphp
                            <div class="form-group col-lg-3 col-md-12 col-sm-12 location smart-search">
                                <label>{{ __("Where") }}?</label>
                                <input type="text" class="smart-search-location parent_text form-control" placeholder="{{__("All City")}}" value="{{ $location_name }}" data-onLoad="{{__("Loading...")}}"
                                       data-default="{{ json_encode($list_json) }}">
                                <input type="hidden" class="child_id" name="location" value="{{ $location_id }}">
                                <span class="icon flaticon-map-locator"></span>
                            </div>
                        @else
                            <div class="form-group col-lg-3 col-md-12 col-sm-12 location bc-select-has-delete">
                                <label>{{ __("Where") }}?</label>
                                <span class="icon flaticon-map-locator"></span>
                                <select class="chosen-select" name="location">
                                    <option value="">{{ __("All City") }}</option>
                                    @php
                                        $traverse = function ($locations, $prefix = '') use (&$traverse) {
                                            foreach ($locations as $location) {
                                                $translate = $location->translateOrOrigin(app()->getLocale());
                                                printf("<option value='%s'>%s</option>", $location->id, $prefix . ' ' . $translate->name);
                                                $traverse($location->children, $prefix . '-');
                                            }
                                        };
                                        $traverse($list_locations);
                                    @endphp
                                </select>
                            </div>
                        @endif
                        <!-- Form Group -->
                        <div class="form-group col-lg-3 col-md-12 col-sm-12 category">
                            <label>{{ __("Categories") }}</label>
                            <span class="icon flaticon-briefcase"></span>
                            <select class="chosen-select">
                                <option value="">{{ __('All Categories')}}</option>
                                @foreach ($list_categories as $cat)
                                    @php
                                        $translate = $cat->translateOrOrigin(app()->getLocale());
                                    @endphp
                                    <option value="{{ $cat->id }}" @if ($cat->id == request()->get('category')) selected @endif  >{{ $translate->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Form Group -->
                        <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
                            <button type="submit" class="theme-btn btn-style-two">{{ __("Find Jobs") }}</button>
                        </div>
                    </div>
                </form>
            </div> --}}
            <!-- Job Search Form -->

            <!-- Fun Fact Section -->
            @if (!empty($list_counter))
                <div class="fun-fact-section">
                    <div class="row">
                        <!--Column-->
                        @foreach ($list_counter as $counter)
                            <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                                <div class="count-box"><span class="count-text" data-speed="3000"
                                        data-stop="{{ $counter['title'] }}">0</span></div>
                                <h4 class="counter-title">{{ $counter['sub_title'] }}</h4>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <!-- Fun Fact Section -->
        </div>
    </div>
</section>
<script type='text/javascript'>
    /* ----- JavaScript ----- */
    window.onload = function() {
        /* Cache the popup. */
        var popup = document.getElementById("popup");

        /* Show the popup. */
        popup.classList.remove("hidden");

        /* Fade the popup in */
        setTimeout(() => popup.classList.add("fade-in"));

        /* Close the popup when a city is selected. */
        document.getElementById("popup").onclick = function() {
            /* Fade the popup out */
            popup.classList.remove("fade-in");

            /* Hide the popup. */
            setTimeout(() => popup.classList.add("hidden"), 300);
            window.location.href = "job";
        };
    };
</script>
