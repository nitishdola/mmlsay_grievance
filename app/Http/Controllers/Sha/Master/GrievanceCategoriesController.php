<?php

namespace App\Http\Controllers\Sha\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\GrievanceCategory;
use Redirect, Crypt;

class GrievanceCategoriesController extends Controller
{
    public function create() {
        return view('sha.master.grievance_categories.create');
    }

    public function save(Request $request) {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $data = [];
        $data['name'] = $request->name;

        GrievanceCategory::create($data);

        toastr()->success('Category added successfully');

        return Redirect::route('sha.master.grievance_category.index')->with(['message' => 'Category added successfully.', 'alert-class' => 'alert-success']);
    }

    public function index() {
        $results = GrievanceCategory::whereNull('deleted_at')->get();
        return view('sha.master.grievance_categories.index', compact('results'));
    }

    public function edit($id) {
        $grievance_category = GrievanceCategory::find(Crypt::decrypt($id)); //dd($grievance_category);
        return view('sha.master.grievance_categories.edit', compact('grievance_category'));
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $grievance_category = GrievanceCategory::find(Crypt::decrypt($id));
        $grievance_category->name = $request->name;
        $grievance_category->save();

        toastr()->success('Category updated successfully');

        return Redirect::route('sha.master.grievance_category.index')->with(['message' => 'Category updated successfully.', 'alert-class' => 'alert-success']);

    }

    public function delete($id) {
        $grievance_category = GrievanceCategory::find(Crypt::decrypt($id)); //dd($grievance_category);
        if ($grievance_category) {
            $grievance_category->delete();
        }

        toastr()->warning('Category deleted successfully');


        return Redirect::route('sha.master.grievance_category.index')->with(['message' => 'Category deleted successfully.', 'alert-class' => 'alert-warning']);
    }
}
