<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function projects(Request $request) {
        if (auth()->user()){
            $projects = Project::where('user_id', auth()->user()->id)->get();
        } else {
            $projects = [];
            return redirect('/xxx-m2.wsr.ru/login');
        }
        return view('project/projects', [
            'projects' => $projects
        ]);
    }

    public function create_projects(Request $request) {
        $modules = Module::where('user_id', auth()->user()->id)->get();
        
        return view('project/create', [
            'modules' => $modules
        ]);
    }

    public function store_project(Request $request) {
        $project = Project::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'login_from_wifi' => $request->login,
            'password_from_wifi' => $request->password,
            'path' => ''
        ]);

        return redirect('/xxx-m2.wsr.ru');
    }


    public function delete(Request $request, $id) {
        $file = Project::find($id);
        if (auth()->user()){
            $file ->delete();
            return redirect('/xxx-m2.wsr.ru/modules');
        }
    }

    public function show_all_projects(Request $request) {
        if (!$request->bearerToken()){
            return response()->json([
            'code' => 401,
            'message' => 'Authorization error',
            'error' => 'AUTH_TOKEN_INCORRECT',
            'errors' =>  []
            ], 401);
        }

        $user = User::where('token', $request->bearerToken())->first();
        if ($user) {
            $projects = Project::where('user_id', $user->id)->get();

            return response()->json([
                'data' => $projects
            ], 200);
        } else {
            return response()->json([
                'code' => 403,
                'message' => 'Authorization error',
                'error' => 'AUTH_TOKEN_INCORRECT',
                'errors' =>  []
                ], 403);
        }
    } 
}
