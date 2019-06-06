<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create', [
            'services' => Service::pluck('title', 'id')->all(),
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:300',
            'description' => 'required|max:1000',
            'image_0' => 'nullable|image',
            'image_1' => 'nullable|image',
            'image_2' => 'nullable|image',
            'image_3' => 'nullable|image',
            'image_4' => 'nullable|image',
            'image_5' => 'nullable|image',
            'image_6' => 'nullable|image',
            'image_7' => 'nullable|image',
            'content' => 'required',
            'meta_title' => 'required|max:300',
            'meta_description' => 'required|max:300',
            'meta_keywords' => 'required|max:300',
        ]);

        $project = Project::add($request->all());

        for ($number = 0; $number <= 7; $number++)
        {
            $project->uploadImage($request->file('image_' . $number), 'projects', 'image_'. $number);
        }
        $project->setServices($request->get('services'));

        return redirect()->route('projects.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('admin.projects.edit', [
            'project' => $project,
            'services' => Service::pluck('title', 'id')->all(),
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:300',
            'description' => 'required|max:1000',
            'content' => 'required',
            'image_0' => 'nullable|image',
            'image_1' => 'nullable|image',
            'image_2' => 'nullable|image',
            'image_3' => 'nullable|image',
            'image_4' => 'nullable|image',
            'image_5' => 'nullable|image',
            'image_6' => 'nullable|image',
            'image_7' => 'nullable|image',
            'meta_title' => 'required|max:300',
            'meta_description' => 'required|max:300',
            'meta_keywords' => 'required|max:300',
        ]);

        $project = Project::find($id);
        $project->edit($request->all());
        for ($number = 0; $number <= 7; $number++)
        {
            $project->uploadImage($request->file('image_' . $number), 'projects', 'image_'. $number);
        }
        $project->setServices($request->get('services'));

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->remove();

        return redirect()->route('projects.index');
    }
}
