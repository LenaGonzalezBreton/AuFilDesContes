<?php

namespace App\Http\Controllers;

use App\Models\Caverne;
use App\Http\Requests\StoreCaverneRequest;
use App\Http\Requests\UpdateCaverneRequest;
use App\Providers\ReponseApi;
use Throwable;

class CaverneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $reponse = ReponseApi::ReponseAllowed(Caverne::all());
            return json_encode($reponse);
        } catch (Throwable $error) {
            $reponse = ReponseApi::ReponseReject($error);
            return json_encode($reponse);
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
    public function store(StoreCaverneRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        try {
            $reponse = ReponseApi::ReponseAllowed(Caverne::find($id));
            return json_encode($reponse);
        } catch (Throwable $error) {
            $reponse = ReponseApi::ReponseReject($error);
            return json_encode($reponse);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caverne $caverne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCaverneRequest $request, Caverne $caverne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caverne $caverne)
    {
        //
    }
}
