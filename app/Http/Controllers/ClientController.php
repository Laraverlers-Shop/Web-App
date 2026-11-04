<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index');
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return view('clients.show');
    }

    public function edit(string $id)
    {
        return view('clients.form.edit');
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
