<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class CompanyController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.companies.index',[
            'companies' => Company::all(),
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        return view('admin.companies.edit', [
            'company' => Company::find($id),

        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'title' => 'required|max:300',
            'description' => 'required|max:2000',
            'content' => 'required|max:7000',
            'work_time' => 'required|max:400',
            'phone' => 'required|max:30',
            'email' => 'required|max:50',
            'instagram' => 'required|max:70',
            'logo' => 'nullable|image',
            'meta_title' => 'required|max:300',
            'meta_description' => 'required|max:300',
            'meta_keywords' => 'required|max:300',
        ]);

        $company = Company::find($id);
        $company->edit($request->all());
        $company->uploadImage($request->file('logo'), 'companies', 'logo');
        $company->uploadPriceList($request->file('price_list'));

        return redirect()->route('companies.index');
    }
}
