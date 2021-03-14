<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::paginate(8);
        $count = Job::count();

        return view('jobs', compact('count', 'jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
    
        if($job){
            return view('job', compact('job'));
        }

        // when the job does't exist return 404
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * Search job with user options
     *
     * @param  mixed $request
     * @return void
     */
    public function search(Request $request)
    {
      
        $search = $request->search_text;
        $job_type = $request->job_type;
        $job_experience = $request->job_experience;

        // dd($search);


        $jobs = Job::query()
                    ->where('title', 'LIKE', '%' . $search .'%')
                    // ->orWhere('experience', 'LIKE', '%' . $job_experience .'%')
                    // ->orWhere('job_type', 'LIKE', '%' . $job_type .'%')
                    ->get();

                    
        return view('search-jobs', compact('jobs', 'search'));
    }
}
