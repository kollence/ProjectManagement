<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\User;
use App\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         if (Auth::check()) {
           $projects=Project::where('user_id',Auth::user()->id)->get();
           return view('projects.index', compact('projects'));
         }
         return view('auth.login');
     }
    //  add user
    public function addUser(Request $request)
    {                                        $id = $request->input('project_id');
                                             $email = $request->input('email');
       $project = Project::find($id);

       if (Auth::user()->id == $project->user_id) {
         $user = User::where('email', $email)->first();
           $userOfProject = ProjectUser::where('user_id', $user->id)
                                       ->where('project_id',$project->id)
                                       ->first();
          if($userOfProject){
            return redirect()->back()->with('success', 'user already member of project');
          }

           if ($user && $project) {
             $project->users()->attach($user->id);
             return redirect()->back()->with('success', 'successfully added user to project');
           }
       }
       return redirect()->back()->with('errors', 'email is wrong');
    }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create( $company_id = null )
     {
         if(!$company_id){
            $companies = Company::where('user_id', Auth::user()->id)->get();
         }else {
           $companies= null;
         }

         return view('projects.create', ['company_id'=>$company_id, 'companies'=>$companies]);
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
           $project=Project::create([
                                      'name'=>$request->name,
                                      'desc'=>$request->desc,
                                      'user_id'=>Auth::user()->id,
                                      'company_id'=>$request->company_id
                                    ]);
           if ($project) {
             return redirect()->route('projects.show', [$project->id])->with('success','Project created successfully');
             }
         }
         return back()->withErrors(['Project could not be created. You need to log first']);
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Project  $project
      * @return \Illuminate\Http\Response
      */
     public function show(Project $project)
     {
         // $project = Project::find($project->id);
         // dd($project->projects);
         // $projects = $project->projects;
         $comments = $project->comments;
         return view('projects.show', compact('project', 'comments'));

     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Project  $project
      * @return \Illuminate\Http\Response
      */
     public function edit(Project $project)
     {
         $project = Project::find($project->id);
         return view('projects.edit', compact('project'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Project  $project
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Project $project)
     {

        $valid = $request->validate(['name'=>'required','desc'=>'required']);
        $projectUpdate = Project::where('id',$project->id)->update($valid);
        if ($projectUpdate) {
          return redirect()->route('projects.show', ['project'=>$project->id])->with('success','Project updatet successfully');
        }
         return back()->withInputs();
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Project  $project
      * @return \Illuminate\Http\Response
      */
     public function destroy(Project $project)
     {
       $findProject = Project::find($project->id);
       if ($findProject->delete()) {
         return redirect()->route('projects.index')->with('success','Project deleted successfully');
       }
        return back()->withInputs()->with('error', 'Project could not be deleted');
     }
}
