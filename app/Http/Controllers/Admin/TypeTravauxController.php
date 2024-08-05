<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Travaux;

class TypeTravauxController extends Controller
{
    public function index()
    {
        $travaux = Travaux::all();
        return view('admin.travaux.index', compact('travaux'));
    }

    public function edit($id)
    {
        $travaux = Travaux::findOrFail($id);
        return view('admin.travaux.edit', compact('travaux'));
    }

    public function update(Request $request, $id)
    {
        $travaux = Travaux::findOrFail($id);
        $travaux->update($request->all());
        return redirect()->route('admin.typetravaux')->with('success', 'Travaux mis à jour avec succès');
    }
}
