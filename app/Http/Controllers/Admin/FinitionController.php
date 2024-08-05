<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Finition;
class FinitionController extends Controller
{
    public function index(){
        $finitions = Finition::all();
        return view('admin.finition.index',compact('finitions'));
    }
    public function edit($id){
        $finition = Finition::findOrFail($id);
        return view('admin.finition.edit',compact('finition'));

    }
    public function update(Request $request,$id){
        $finition = Finition::findOrFail($id);
        $finition->update($request->all());
        return redirect()->route('admin.finition')->with('success','Finition updated successfully');

    }
}
