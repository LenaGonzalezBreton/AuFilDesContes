<?php

namespace App\Http\Controllers;

use App\Models\Caverne;
use App\Models\MotCle;
use App\Http\Requests\StoreMotCleRequest;
use App\Http\Requests\UpdateMotCleRequest;

class MotCleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $mots_clefs = motcle::all();
            return view('/mot_clef/voir_mots_clefs', compact('mots_clefs'));
        } catch (Throwable $error) {
            return redirect()->back();
        }
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
    public function store(StoreMotCleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MotCle $motCle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MotCle $motCle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMotCleRequest $request, MotCle $motCle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $motCle)
    {
        try {

            MotCle::destroy($motCle);
            return redirect()->back();

        } catch (Throwable $error) {
            return redirect()->back();
        }
    }
}
