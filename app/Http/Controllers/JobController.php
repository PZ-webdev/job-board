<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\ApplyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $apply = ApplyJob::where('user_id', Auth::id())->where('job_id', $id)->first();
        $apply ? $applyJob = true : $applyJob = false;

        if($job){
            return view('job', compact('job', 'applyJob'));
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


        $jobs = Job::query()
                    ->where('title', 'LIKE', '%' . $search .'%')
                    // ->orWhere('experience', 'LIKE', '%' . $job_experience .'%')
                    // ->orWhere('job_type', 'LIKE', '%' . $job_type .'%')
                    ->get();

        return view('search-jobs', compact('jobs', 'search'));
    }
    
    /**
     * applyforjob
     *
     * @param  mixed $request
     * @return void
     */
    public function applyforjob(Request $request)
    {
        try {
            $this->validate($request, [
                'cv' => 'required|mimes:pdf|max:2048',
              ]);

            $applyJob = new ApplyJob();
            if ($request->hasFile('cv')) {
                $image = $request->file('cv');
                $name = $image->hashName();
                $destinationPath = public_path('/storage/documents');
                $imagePath = $destinationPath. "/".  $name;
                $image->move($destinationPath, $name);
                $applyJob->cv = $imagePath;
              }
            $applyJob->user_id = Auth::id() == null ? 0 : Auth::id();
            $applyJob->job_id = $request->job_id;
            $applyJob->website = $request->website;
            $applyJob->description = $request->description;
            $applyJob->save();

            return response()->json([
                'success' => 'Ajax request submitted successfully',
                'message' => 'Aplikowanie zakończone pozytywnie'
                ]); 
        } catch (\Throwable $th) {
            return $th;
        }
            
    }
}
