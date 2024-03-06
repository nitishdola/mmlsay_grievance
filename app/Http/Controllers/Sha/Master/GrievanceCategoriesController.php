<?php

namespace App\Http\Controllers\Sha\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\GrievanceCategory;
use Redirect;

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

        return Redirect::route('admin.master.grievance_category.index')->with(['message' => 'Category added successfully.', 'alert-class' => 'alert-success']);
    }

    public function index() {
        return view('sha.master.grievance_categories.index');
    }
}
