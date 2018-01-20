<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class JobsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
    public function index()
    {
        $jobs = Job::with('company')->get();
        return response()->json($jobs);
    }

    public function show($id)
    {
        $job = Job::with('company')->find($id);

        if(!$job){
            return response()->json([
                'message' => 'Not Found',
            ], 404);
        }

        return response()->json($job);
    }

    public function store(Request $request)
    {
        return response()->json($request->all());
        $job = new Job();
        $job->fill($request->all());
        $job->save();

    }

    public function update(Request $request, $id)
    {
        $job = Job::find($id);

        if(!$job) {
            return response()->json([
                'message'   => 'Job not found',
            ], 404);
        }

        $job->fill($request->all());
        $job->save();

        return response()->json($job);
    }

    public function destroy($id)
    {
        $job = Job::find($id);
        if(!$job){
            return response()->json([
                'message'   => 'Job not found',
            ]);
        }
        $job->delete();
        return response()->json([
            'message'   => 'Job deleted',
        ]);
    }
}
