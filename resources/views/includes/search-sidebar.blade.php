<div class="col-lg-3">
    <div class="job_filter white-bg">
        <div class="form_inner white-bg">
            <h3>Filter</h3>
            <form action="{{route('search-job')}}" method="POST" role="search">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single_field">
                            <input type="text" placeholder="Search keyword" name="search_text" value="{{ old('search_text') }}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single_field">
                            <select class="wide" name="job_experience" value="{{ old('job_experience') }}">
                                <option value="">Experience</option>
                                <option value="0">Junior</option>
                                <option value="1">Mid</option>
                                <option value="2">Senior</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single_field">
                            <select class="wide" name="job_type" value="{{ old('job_type') }}">
                                <option value="">Job type</option>
                                <option value="0">Full time</option>
                                <option value="1">Part time</option>
                            </select>
                        </div>
                    </div>
                   
                </div>
        </div>
        <div class="reset_btn">
            <button  class="boxed-btn3 w-100" type="submit">Search</button>
        </div>
    </form>
    </div>
</div>