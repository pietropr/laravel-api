<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company')->get();
        return response()->json($jobs);
    }


    public function show($id)
    {
        //o with puxa os dados da relação
        $current = Job::with('company')->find($id);

        if(!$current) {
            return response()->json(['message', 'Não encontrado']);
        }

        return response()->json($current);
    }

    public function store(Request $request, Job $job)
    {

        $job->fill($request->all());
        if($job->save()) {
            return response()->json($job, 201);
        }
    }

    public function update(Request $request, $id)
    {

        $current = Job::find($id);

        if(!$current) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $current->fill($request->all());
        if($current->save()) {
            return response()->json($current, 201);
        }
    }

    public function destroy($id)
    {
        $job = Job::find($id);

        if(!$job) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $job->delete();
    }
}
