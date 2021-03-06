@extends('layouts.app')
@section('title'){{$job->title}} - @endsection
@section('content')
    
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{$job->title}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--/ bradcam_area  -->
    
    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="img/svg_icon/1.svg" alt="">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="#"><h4>{{$job->title}}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> {{$job->place}}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{$job->job_type_array[$job->job_type]}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                            <p>{{$job->description}}</p>
                        </div>
                        {{-- <div class="single_wrap">
                            <h4>Responsibility</h4>
                            <ul>
                                <li>The applicants should have experience in the following areas.
                                </li>
                                <li>Have sound knowledge of commercial activities.</li>
                                <li>Leadership, analytical, and problem-solving abilities.</li>
                                <li>Should have vast knowledge in IAS/ IFRS, Company Act, Income Tax, VAT.</li>
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Qualifications</h4>
                            <ul>
                                <li>The applicants should have experience in the following areas.
                                </li>
                                <li>Have sound knowledge of commercial activities.</li>
                                <li>Leadership, analytical, and problem-solving abilities.</li>
                                <li>Should have vast knowledge in IAS/ IFRS, Company Act, Income Tax, VAT.</li>
                            </ul>
                        </div>
                        <div class="single_wrap">
                            <h4>Benefits</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing.</p>
                        </div> --}}
                    </div>
                    @if($applyJob == false)
                        <div class="apply_job_form white-bg">
                            <h4>Apply for the job</h4>
                            <div id="message" style="color: red;"></div>
                            <form enctype="multipart/form-data" id="form" method="POST">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="job_id" id="job_id" value="{{$job->id}}">
                                <div class="row">
                                   @guest
                                    <div class="col-md-6">
                                        <div class="input_field">
                                            <input type="text" placeholder="Your name" id="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input_field">
                                            <input type="text" placeholder="Email" id="email" name="email">
                                        </div>
                                    </div>
                                   @endguest
                                    <div class="col-md-12">
                                        <div class="input_field">
                                            <input type="text" placeholder="Website/Portfolio link" id="website" name="website">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                            </button>
                                            </div>
                                            <div class="custom-file">
                                                
                                                <input type="file" class="custom-file-input" id="cv" name="cv"/>
                                                <label class="custom-file-label" for="inputGroupFile03">Upload CV</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input_field">
                                            <textarea name="description" id="description" cols="30" rows="10" placeholder="Coverletter" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="submit_btn">
                                            <button class="boxed-btn3 w-100" type="submit" id="ApplyBtn">Apply Now</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="apply_job_form white-bg">
                            <h4 style="text-center">Ju?? z??o??y??e?? swoje CV !</h4>
                        </div>
                    @endif

                    
                </div>
                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Job Summery</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Published on: <span>{{\Carbon\Carbon::parse($job->created_at)->format('d M, Y')}}</span></li>
                                <li>Experience: <span>{{$job->job_experience_array[$job->experience]}}</span></li>
                                <li>Salary: <span>{{$job->salary}}</span></li>
                                <li>Location: <span>{{$job->place}}</span></li>
                                <li>Job Type: <span> {{$job->job_type_array[$job->job_type]}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="share_wrap d-flex">
                        <span>Share at:</span>
                        <ul>
                            <li><a href="#"> <i class="fa fa-facebook"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-google-plus"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-twitter"></i></a> </li>
                            <li><a href="#"> <i class="fa fa-envelope"></i></a> </li>
                        </ul>
                    </div>
                    <div class="job_location_wrap">
                        <div class="job_lok_inner">
                            <div id="map" style="height: 200px;"></div>
                            
                            {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script> --}}
                            
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    
    $('#form').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
       
        // Validation MUST HAVE HERE @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $.ajax({
            method: 'POST',
            url: "{{ route('applyforjob') }}",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                console.log(data);
                $('#message').text(data.message);
            },
            error: function(e){
                console.error("Error: " + e);
            }
        });

    });
</script>
@endsection