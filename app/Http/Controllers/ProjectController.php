<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('pages.projects',[
            'projects' => Project::all()
        ]);
    }

    public function show($slug)
    {
        return view('pages.project', [
            'project' => Project::where('slug', $slug)->firstOrFail()
        ]);
    }
}
