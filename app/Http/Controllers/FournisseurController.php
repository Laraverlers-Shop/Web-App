<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index()
    {
        return view('fournisseurs.index');
    }

    public function create()
    {
        return view('fournisseurs.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return view('fournisseurs.show');
    }

    public function edit(string $id)
    {
        return view('fournisseurs.form.edit');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
