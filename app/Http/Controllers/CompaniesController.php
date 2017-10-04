<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
          $companies=Company::where('user_id',Auth::user()->id)->get();
          return view('companies.index', compact('companies'));
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
          $this->validate(request(),['name'=>'required','desc'=>'required']);
          $company=Company::create(['name'=>$request->name,'desc'=>$request->desc,'user_id'=>Auth::user()->id]);
          if ($company) {
            return redirect()->route('companies.show', [$company->id])->with('success','Company created successfully');
            }
        }
        return back()->withErrors(['Company could not be created. You need to log first']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        // $company = Company::find($company->id);
        // dd($company->projects);
        // $projects = $company->projects;
        return view('companies.show', compact('company'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::find($company->id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {

       $valid = $request->validate(['name'=>'required','desc'=>'required']);
       $companyUpdate = Company::where('id',$company->id)->update($valid);
       if ($companyUpdate) {
         return redirect()->route('companies.show', ['company'=>$company->id])->with('success','Company updatet successfully');
       }
        return back()->withInputs();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
      $findCompany = Company::find($company->id);
      if ($findCompany->delete()) {
        return redirect()->route('companies.index')->with('success','Company deleted successfully');
      }
       return back()->withInputs()->with('error', 'Company could not be deleted');
    }
}
