@extends('frontend.layouts.master')


@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .img i {
            top: 15%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
        }

        .img:hover {
            opacity: 1;
        }

        .fa-youtube:hover {
            color: red;
        }

        .fa-youtube {
            color: #CA2128;
        }

        .fa-play-circle {
            color: red;
        }

        .icn {
            margin-left: -7%;
            color: green;
        }

        .bcsayeed {
            font-size: 24px;
            border: 10px solid black;
            padding: 1rem 0.5rem;
            min-height: 3em;
            resize: both;
            border-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='100' height='100' viewBox='0 0 100 100' fill='none' xmlns='http://www.w3.org/2000/svg'%3E %3Cstyle%3Epath%7Banimation:stroke 5s infinite linear%3B%7D%40keyframes stroke%7Bto%7Bstroke-dashoffset:776%3B%7D%7D%3C/style%3E%3ClinearGradient id='g' x1='0%25' y1='0%25' x2='0%25' y2='100%25'%3E%3Cstop offset='0%25' stop-color='%232d3561' /%3E%3Cstop offset='25%25' stop-color='%23c05c7e' /%3E%3Cstop offset='50%25' stop-color='%23f3826f' /%3E%3Cstop offset='100%25' stop-color='%23ffb961' /%3E%3C/linearGradient%3E %3Cpath d='M1.5 1.5 l97 0l0 97l-97 0 l0 -97' stroke-linecap='square' stroke='url(%23g)' stroke-width='3' stroke-dasharray='388'/%3E %3C/svg%3E") 1;
        }

    </style>

    <!-- Content -->

    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url({{ asset('images/banner/banner2.jpg') }});">
            <div class="container">
                <div class="page-banner-entry">
                    <br />
                    <br />

                </div>
            </div>
        </div>
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Courses Details</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- inner page banner END -->
        <?php
        $courses = App\Models\Course::all();
        ?>


        <?php
        $course_categories = App\Models\CourseCategory::all();
        $main_categories = App\Models\MainCategory::all();
        ?>

        <div class="content-block">
            <!-- About Us -->
            <div class="section-area section-sp1">
                <div class="container">
                    <div class="row d-flex flex-row-reverse">
                        <div class="col-lg-3 col-md-4 col-sm-12 m-b30">
                            <div class="course-detail-bx">

                                @if ($course->video_type == 0)

                                    <div class="preview-video-box">
                                        <a class="venobox" data-autoplay="true" data-vbtype="video"
                                            href="{{ $course->preview_id }}" data-gall="myGallery">
                                            <img src="{{ asset("storage/courses/$course->course_image") }}" alt=""
                                                class="img-fluid">
                                            <div class="img">
                                                <i class="fab fa-youtube fa-4x"></i>
                                            </div>
                                        </a>
                                        @if (count($course->sections) > 0)
                                            @foreach ($course->sections as $section)
                                                @if (count($section->lessons) > 0)
                                                    @foreach ($section->lessons as $lesson)
                                                        @if ($lesson->preview == 1)
                                                            <a class="venobox" data-autoplay="true"
                                                                data-vbtype="video" href="{{ $lesson->youtube_url }}"
                                                                data-gall="myGallery"></a>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                @else
                                    <div class="preview-video-box">
                                        <a class="video-play" data-video-id="{{ $course->preview_id }}"
                                            data-channel="vimeo">

                                            <img src="{{ asset("storage/courses/$course->course_image") }}" alt=""
                                                class="img-fluid">
                                            <div class="img">
                                                <i class="fab fa-youtube fa-4x"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endif


                                {{-- <button class="video-play" data-video-id="o-Mh4UB7Kgc">Youtube Video</button>
          <button class="video-play" data-video-id="595181733" data-channel="vimeo">Vimeo Video</button> --}}
                                @if ($enrolled)
                                    <div class="course-price">

                                        <a href="/home/course_details/view/{{ $course->id }}/{{ $course->elearning_slug }}"
                                            class="btn">Already Enrolled</a>

                                    </div>
                                @else
                                    <div class="course-price">
                                        <input type="hidden" name="price" id="price" value="{{ $course->sale_price }}">
                                        <del>{{ $course->regular_price }}???</del>
                                        <h4 class="price">{{ $course->sale_price }}???</h4>
                                    </div>
                                    <div class="course-buy-now text-center">
                                    </div>
                                    <br>
                                    <div class="course-buy-now text-center">

                                        <form class="hidden" action="{{ route('buy-now') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
                                            <div class="bcsayeed">
                                                <h4><img src="{{ asset('alarm.gif') }}"
                                                        style="height: 50px; width:50px;" />
                                                    <br>
                                                    &nbsp;<strong class="text-danger" id="demo"></strong>
                                                </h4>
                                                <h5> left at this Price</h5>
                                            </div>
                                            <br>
                                            <table class="table">
                                                <thead id="couponCalculationField">

                                                </thead>
                                            </table>
                                            <br>
                                            <button class="btn">Buy Now</button>
                                        </form>
                                    </div>
                                    <br>
                                    <div class="course-buy-now text-center">
                                        <form class="hidden" action="{{ route('add-carts') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">

                                            <button class="btn">Add to Cart</button>
                                        </form>
                                    </div>
                                    @if (Session::has('coupon'))
                                    @else
                                        <div class="input-group mt-1" id="couponDiv">
                                            <input type="text" class="form-control" placeholder="Your coupon..."
                                                id="coupon_name" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-upper" type="submit"
                                                    onclick="voucherApply()">Apply</button>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                <div class="teacher-bx">
                                    <div class="teacher-info">
                                        <!--  <div class="teacher-thumb">
                                              <img src="{{ asset('images/testimonials/pic1.jpg') }}" alt=""/>
                                            </div>-->
                                        <!--<div class="teacher-name">
                                              <h5>Hinata Hyuga</h5>
                                              <span>Science Teacher</span>
                                            </div>-->
                                    </div>
                                </div>
                                <div class="cours-more-info">
                                    <div class="review">
                                        <span>Review</span>
                                        <ul class="cours-star">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span style="color: red"
                                                    class="fa fa-star{{ $i <= $avgRating ? '' : '-empty' }}"></span>
                                            @endfor
                                            <span>({{ count($courseReview) }})</span>
                                            <h4>5/{{ $avgRating }}</h4>

                                        </ul>

                                    </div>
                                    <div class="price categories">
                                        <span>Categories</span>
                                        <h5 class="text-primary">{{ $course->course_category->mcategory_title }}</h5>
                                    </div>
                                </div>
                                <div class="course-info-list scroll-page">
                                    <ul class="navbar">
                                        <li><a class="nav-link" href="#overview"><i
                                                    class="ti-zip"></i>Overview</a></li>
                                        <li><a class="nav-link" href="#curriculum"><i
                                                    class="ti-bookmark-alt"></i>Curriculum</a></li>

                                        <li><a class="nav-link" href="#instructor"><i
                                                    class="ti-user"></i>Instructor</a></li>
                                        <li><a class="nav-link" href="#reviews"><i
                                                    class="ti-comments"></i>Reviews</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-8 col-sm-12">
                            <div class="courses-post">
                                <div class="ttr-post-media media-effect">
                                    <a href="#"><img
                                            src="{{ asset('storage/courses/banners/' . $course->course_details->banner_image) }}"
                                            alt="image" height="600" width="1000"></a>
                                </div>
                                <div class="ttr-post-info">
                                    <div class="ttr-post-title ">
                                        <h2 class="post-title">{{ $course->course_title }}</h2>
                                    </div>
                                    <div class="ttr-post-text">
                                        {!! $course->course_details->short_description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="courese-overview" id="overview">
                                <h4>Overview</h4>
                                <div class="row">
                                    <div class="col-md-12 col-lg-4">
                                        <ul class="course-features">
                                            <!--  <li><i class="ti-book"></i> <span class="label">Lectures</span> <span class="value">8</span></li>-->
                                            <li><i class="ti-help-alt"></i> <span class="label">Quizzes</span>
                                                <span class="value">{{ $course->course_details->quiz }}</span>
                                            </li>
                                            <!--  <li><i class="ti-time"></i> <span class="label">Duration</span> <span class="value">60 hours</span></li>-->
                                            <li><i class="ti-stats-up"></i> <span class="label">Skill
                                                    level</span> <span
                                                    class="value">{{ $course->course_details->skill }}</span>
                                            </li>
                                            <li><i class="ti-smallcap"></i> <span class="label">Language</span>
                                                <span
                                                    class="value">{{ $course->course_details->language }}</span>
                                            </li>
                                            <!--  <li><i class="ti-user"></i> <span class="label">Students</span> <span class="value">32</span></li>-->
                                            <!--  <li><i class="ti-check-box"></i> <span class="label">Assessments</span> <span class="value">Yes</span></li>-->
                                            <li><i class="ti-time"></i> <span class="label">Duration</span>
                                                <span class="value">
                                                    <strong>
                                                        @php
                                                            $total_duration = $data;
                                                            $H = floor($total_duration / 3600);
                                                            $i = ($total_duration / 60) % 60;
                                                            $s = $total_duration % 60;
                                                            if ($H == null) {
                                                                echo sprintf('%02d:%02d H', $i, $s);
                                                            } else {
                                                                echo sprintf('%02d:%02d:%02d H', $H, $i, $s);
                                                            }
                                                        @endphp
                                                    </strong>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-lg-8">
                                        <h5 class="m-b5">Course Description</h5>
                                        {!! $course->course_details->course_description !!}
                                        <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                                        <h5 class="m-b5">Certification</h5>
                                        <p>{{ $course->course_details->certification }}</p>
                                        <div class="ttr-divider bg-gray"><i class="icon-dot c-square"></i></div>
                                        <h5 class="m-b5">Learning Outcomes</h5>
                                        <ul class="list-checked primary">
                                            {!! $course->course_details->learning_outcomes !!}

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="m-b30" id="curriculum">
                                <h4>Curriculum</h4>

                                <section id="accordion-hover">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card collapse-icon">

                                                <div class="card-body">
                                                    @if (count($course->sections) > 0)
                                                        @foreach ($course->sections as $section)
                                                            <div class="accordion"
                                                                id="accordionExample{{ $section->id }}"
                                                                data-toggle-hover="true">
                                                                <div class="collapse-default">

                                                                    <div class="card">
                                                                        <div class="card-header"
                                                                            id="heading{{ $section->id }}"
                                                                            data-toggle="collapse" role="button"
                                                                            data-target="#collapse{{ $section->id }}"
                                                                            aria-expanded="true"
                                                                            aria-controls="collapse{{ $section->id }}">
                                                                            <h6 class="curriculum-list"
                                                                                style="color:#ca2128; text-transform:uppercase;">
                                                                                {{ $section->section_name }}
                                                                                <p class="pull-right"><i
                                                                                        class="ti-time"></i>
                                                                                    <span class="value">
                                                                                        @php
                                                                                            $section_sum = App\Models\Lesson::where('section_id', $section->id)->sum('duration');
                                                                                            $total_ = $section_sum;
                                                                                            $Hours = floor($total_ / 3600);
                                                                                            $Minuites = ($total_ / 60) % 60;
                                                                                            $Seconds = $total_ % 60;
                                                                                            echo sprintf('%02d:%02d:%02d Hours', $Hours, $Minuites, $Seconds);
                                                                                        @endphp
                                                                                    </span>
                                                                                </p>

                                                                            </h6>
                                                                        </div>

                                                                        <div id="collapse{{ $section->id }}"
                                                                            class="collapse show"
                                                                            aria-labelledby="heading{{ $section->id }}"
                                                                            data-parent="#accordionExample{{ $section->id }}">
                                                                            <div class="card-body">
                                                                                <ul>
                                                                                    @if (count($section->lessons) > 0)
                                                                                        @foreach ($section->lessons as $lesson)
                                                                                            @if ($lesson->youtube_url)
                                                                                                <?php
                                                                                                $video_url = $lesson->youtube_url;
                                                                                                $api_key = 'AIzaSyCTmNKu-BRSEPoU_4lpG6NYnLo_MS5vc2w';
                                                                                                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $match);
                                                                                                $video_url = $match[1];
                                                                                                $api_url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id=' . $video_url . '&key=' . $api_key;
                                                                                                $data = json_decode(file_get_contents($api_url));
                                                                                                $time = $data->items[0]->contentDetails->duration;
                                                                                                ?>
                                                                                            @endif
                                                                                            <div
                                                                                                class="curriculum-list-box">
                                                                                                <div
                                                                                                    class="row">

                                                                                                    <div
                                                                                                        class="col-sm-8">


                                                                                                        <strong><i
                                                                                                                class="fas fa-play-circle"></i>
                                                                                                            {{ $lesson->lesson_title }}</strong>

                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-sm-2">

                                                                                                        @if ($lesson->youtube_url)
                                                                                                            <i
                                                                                                                class="far fa-clock"></i>
                                                                                                            @php
                                                                                                                $timeFormat = new DateTime('1970-01-01');
                                                                                                                $timeFormat->add(new DateInterval($time));
                                                                                                                if (strlen($time) > 8) {
                                                                                                                    echo $timeFormat->format('H:i:s');
                                                                                                                } else {
                                                                                                                    echo $timeFormat->format('H:i:s');
                                                                                                                }
                                                                                                            @endphp
                                                                                                        @endif
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-sm-2">
                                                                                                        @if ($lesson->preview == 1)
                                                                                                            @if ($lesson->video_type == 'Youtube')
                                                                                                                <a class="venobox"
                                                                                                                    data-autoplay="true"
                                                                                                                    data-vbtype="video"
                                                                                                                    href="{{ $lesson->youtube_url }}"
                                                                                                                    data-gall="Gallery23">
                                                                                                                    <strong><i
                                                                                                                            class="fas fa-play-circle fa-2x icn pull-right"
                                                                                                                            title="Play"></i></strong>
                                                                                                                </a>
                                                                                                            @else
                                                                                                                <a class="video-play1"
                                                                                                                    data-video-id="{{ $lesson->vimeo_id }}"
                                                                                                                    data-channel="vimeo">
                                                                                                                    <strong><i
                                                                                                                            class="fas fa-play-circle fa-2x icn pull-right"
                                                                                                                            title="Play"></i></strong>
                                                                                                                </a>
                                                                                                            @endif
                                                                                                        @else
                                                                                                            <i class="fas fa-lock pull-right"
                                                                                                                title="Lock"></i>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col">


                                                                                                        <span><strong></strong></span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @endif



                                                                                </ul>


                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>


                            </div>
                            <div class="" id="instructor">
                                <h4>Instructor</h4>

                                @foreach ($trainer as $item)
                                    <div class="instructor-bx">
                                        <div class="instructor-author">
                                            <img src="{{ asset($item->image) }}" alt="">
                                        </div>
                                        <div class="instructor-info">
                                            <h6>{{ $item->name }}</h6>
                                            <span>{{ $item->designation }}</span>
                                            <ul class="list-inline m-tb10">
                                                <li><a href="{{ $item->facebook_profile }}"
                                                        class="btn sharp-sm facebook"><i class="fab fa-facebook"></i></a>
                                                </li>
                                                <li><a href="{{ $item->linkdin_profile }}"
                                                        class="btn sharp-sm linkedin"><i class="fab fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                            <p class="m-b0">{!! $item->biography !!}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>




                            <div class="" id="reviews">
                                <h4>Reviews</h4>

                                <div class="review-bx">
                                    <div class="product-add-review">
                                        <h4 class="title">Write your own review</h4>
                                        <div class="review-table">
                                            <div class="table-responsive">
                                                <form role="form" class="cnt-form"
                                                    action="{{ route('store.review') }}" method="post">
                                                    <table class="table">
                                                        @csrf
                                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                        <thead>
                                                            <tr>
                                                                <th class="cell-label">&nbsp;</th>
                                                                <th><i class="fa fa-star" style="color: red"></i></th>
                                                                <th><i class="fa fa-star" style="color: red"></i>
                                                                    <i class="fa fa-star" style="color: red"></i>
                                                                </th>
                                                                <th><i class="fa fa-star" style="color: red"></i>
                                                                    <i class="fa fa-star" style="color: red"></i>
                                                                    <i class="fa fa-star" style="color: red"></i>
                                                                </th>
                                                                <th><i class="fa fa-star" style="color: red"></i>
                                                                    <i class="fa fa-star" style="color: red"></i>
                                                                    <i class="fa fa-star" style="color: red"></i>
                                                                    <i class="fa fa-star" style="color: red"></i>
                                                                </th>
                                                                <th><i class="fa fa-star" style="color: red"></i>
                                                                    <i class="fa fa-star" style="color: red"></i>
                                                                    <i class="fa fa-star" style="color: red"></i>
                                                                    <i class="fa fa-star" style="color: red"></i>
                                                                    <i class="fa fa-star" style="color: red"></i>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="cell-label">Rating</td>
                                                                <td><input type="radio" name="rating"
                                                                        class="radio" value="1"></td>
                                                                <td><input type="radio" name="rating"
                                                                        class="radio" value="2"></td>
                                                                <td><input type="radio" name="rating"
                                                                        class="radio" value="3"></td>
                                                                <td><input type="radio" name="rating"
                                                                        class="radio" value="4"></td>
                                                                <td><input type="radio" name="rating"
                                                                        class="radio" value="5"></td>
                                                            </tr>
                                                            @error('rating')
                                                                <span class="text text-danger">{{ $message }}</span>
                                                            @enderror

                                                        </tbody>
                                                    </table><!-- /.table .table-bordered -->
                                            </div><!-- /.table-responsive -->
                                        </div><!-- /.review-table -->

                                        <div class="review-form">
                                            <div class="form-container">


                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputReview">Review <span
                                                                    class="astk">*</span></label>
                                                            <textarea class="form-control txt txt-review"
                                                                id="exampleInputReview" name="comment" rows="4"
                                                                placeholder=""></textarea>
                                                            @error('comment')
                                                                <span class="text text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div><!-- /.form-group -->
                                                    </div>
                                                </div><!-- /.row -->

                                                <div class="action text-right">
                                                    <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                </div><!-- /.action -->

                                                </form><!-- /.cnt-form -->
                                                @foreach ($courseReview as $review)
                                                    <div class="product-reviews">
                                                        <h5 class="title">{{ $review->user->name }}</h5>

                                                        <div class="reviews">
                                                            <div class="review">
                                                                <div class="review-title">
                                                                    <span class="summary">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            <span style="color: red"
                                                                                class="fa fa-star{{ $i <= $review->rating ? '' : '-empty' }}"></span>
                                                                        @endfor
                                                                    </span>
                                                                    <span class="date"><i
                                                                            class="fa fa-calendar"></i><span>
                                                                            {{ $review->created_at->diffForHumans() }}</span></span>
                                                                </div>
                                                                <div class="text">"{{ $review->comment }}"
                                                                </div>
                                                            </div>
                                                        </div><!-- /.reviews -->
                                                    </div><!-- /.product-reviews -->
                                                @endforeach
                                            </div><!-- /.form-container -->
                                        </div><!-- /.review-form -->

                                    </div><!-- /.product-add-review -->


                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>






        <!-- contact area END -->

    </div>
    <!-- Content END-->

    {{-- <script>$(document.frmTransaction.submit());</script>
<script>
  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * 59,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script> --}}

    {{-- <script type="text/javascript">
  var total_seconds = 60 * 60;
  var minutes = parseInt(total_seconds/60);
  var seconds = parseInt(total_seconds%60);
  function countDownTimer(){
    if(seconds < 10){
      seconds= "0"+ seconds ;
    }if(minutes < 10){
      minutes= "0"+ minutes ;
    }
  document.getElementById("quiz-time-left").innerHTML
    = "Time Left :"+minutes+"minutes"+seconds+"seconds";
    if(total_seconds <= 0){
      setTimeout("document.quiz.submit()",1);
    }else{
      total_seconds = total_seconds -1 ;
      minutes = parseInt(total_seconds/60);
            seconds = parseInt(total_seconds%60);
            setTimeout("countDownTimer()",1000);
    }
  }
setTimeout("countDownTimer()",1000);
function finishpage(){
alert("unload event detected!");
document.quiz.submit();
}

window.onbeforeunload= function() {
setTimeout('document.quiz.submit()',1);
}
</script>

<script>
  if (localStorage.getItem("total_seconds")) {
 var total_seconds = localStorage.getItem("total_seconds");
} else {
 var total_seconds = 60 * 60;
}
var minutes = parseInt(total_seconds / 60);
var seconds = parseInt(total_seconds % 60);

function countDownTimer() {
 if (seconds < 10) {
    seconds = "0" + seconds;
 }
 if (minutes < 10) {
    minutes = "0" + minutes;
 }
 document.getElementById("quiz-time-left").innerHTML = "" + minutes + ":" + seconds + "";
 if (total_seconds <= 0) {
    setTimeout("document.quiz.submit()", 1);
 } else {
    total_seconds = total_seconds - 1;
    minutes = parseInt(total_seconds / 60);
    seconds = parseInt(total_seconds % 60);
    localStorage.setItem("total_seconds", total_seconds)
    setTimeout("countDownTimer()", 1000);

 }

}

var myHour = new Date();
myHour.setHours(myDate.getHours() + 1); //one hour from now
data.push(myHour);
localStorage.setItem('storedData', JSON.stringify(data))

function checkExpiration (){
    //check if past expiration date
        var values = JSON.parse(localStorage.getItem('storedData'));
    //check "my hour" index here
    if (values[1] < new Date()) {
        localStorage.removeItem("storedData")
    }
}

// function myFunction() {
//     var myinterval = 15*60*1000; // 15 min interval
//     setInterval(function(){ checkExpiration(); }, myinterval );
// }

// myFunction();
</script> --}}
    @foreach ($timer as $item)
        <input type="hidden" id="time" value="{{ $item->time }}">
    @endforeach

    @push('scripts')
        <script>
            function voucherApply() {

                var coupon_name = $('#coupon_name').val();
                var price = $('#price').val();
                var course_id = $('#course_id').val();
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        course_id: course_id,
                        price: price,
                        coupon_name: coupon_name
                    },
                    url: "{{ url('/voucher-code') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {


                        //  start message
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-bottom',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                type: 'success',
                                title: data.success
                            })
                        } else {
                            $('#coupon_name').val('');
                            Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                        }
                        //  end message

                        cart();
                        miniCart();
                    }
                });
            }



            function voucherCalculation() {

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: "{{ url('/voucher-calculation') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        if (data.total) {
                            $('#couponCalculationField').html(`
                            <tr>
                                <th>
                                    <div>
                                        Subtotal <span>${data.total}</span>
                                    </div>
                                    <div>
                                        Coupon <span>$500</span>
                                    </div>
                                    <div>
                                        Discount <span>$500</span>
                                    </div>
                                </th>
                            </tr>
                                                    `);
                        } else {
                            $('#couponCalculationField').html(`
                            <tr>
                                <th>
                                    <div>
                                        Subtotal <span> $ ${data.total}</span>
                                    </div>
                                    <div>
                                        Coupon <span> ${data.coupon_name}</span>
                                    </div>
                                    <div>
                                        Discount Amount<span> $${data.discount_amount}</span>
                                    </div>
                                    <div>
                                        Total Amount<span> $${data.total_amount}</span>
                                    </div>

                                </th>
                            </tr>
                            `);

                        }
                    }
                });
            }
            voucherCalculation();
        </script>



        <script type="text/javascript">
            // Set the date we're counting down to

            $(document).ready(function() {
                var t = $('#time').val();

                var countDownDate = new Date(t).getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Output the result in an element with id="demo"
                    document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                        minutes + "m " + seconds + "s ";

                    // If the count down is over, write some text
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("demo").innerHTML = "EXPIRED";
                    }
                }, 1000);


            });
        </script>
    @endpush






@endsection
