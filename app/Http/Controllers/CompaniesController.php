<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return response()->json($companies);
    }

    public function show($id)
    {
        $current['company'] = Company::find($id);
        $current['jobs'] = Job::where('company_id', '=', $id)->get();

        if(!$current) {
            return response()->json(['message', 'Dado nao encontrado']);
        }

        return response()->json($current);
    }


    public function store(Request $request, Company $company)
    {

        $request['senha'] = bcrypt($request->senha);
        $company->fill($request->all());
        if($company->save()) {
            return response()->json($company, 201);
        }

    }

    public function update(Request $request, $id)
    {

        $current = Company::find($id);

        if(!$current) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $request['senha'] = bcrypt($request->senha);
        $current->fill($request->all());
        if($current->save()) {
            return response()->json($current, 201);
        }
    }

    //
    public function destroy($id)
    {
        $companie = Company::find($id);

        if(!$companie) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $companie->delete();
    }
}
                                                                          //
