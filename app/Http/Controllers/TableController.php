<?php

namespace App\Http\Controllers;

use App\Http\Requests\Table\TableIndexRequest;
use App\Http\Requests\Table\TableShowRequest;
use App\Http\Requests\Table\TableStoreRequest;
use App\Models\Table;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TableIndexRequest $request): Response
    {
        return Inertia::render('Table/Index' , ['tables' => Table::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableStoreRequest $request)
    {
        $request->store();
    }

    /**
     * Display the specified resource.
     */
    public function show(TableShowRequest $request , Table $table)
    {
        return Inertia::render('Table/Show' , ['table' => $table]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Table $table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        //
    }
}
