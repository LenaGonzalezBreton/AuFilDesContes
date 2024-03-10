<?php

namespace App\Http\Controllers;

use App\Models\Conte;
use App\Http\Requests\StoreConteRequest;
use App\Http\Requests\UpdateConteRequest;
use App\Providers\ReponseApi;
use Laravel\Prompts\Note;
use PhpParser\Node\Scalar\String_;
use PHPUnit\Event\Code\Throwable;
use Ramsey\Uuid\Type\Integer;

class ConteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $reponse = ReponseApi::ReponseAllowed(Conte::all());
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
    public function store(StoreConteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Conte $conte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conte $conte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConteRequest $request, Conte $conte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conte $conte)
    {
        //
    }

    public function eval(string $id, string $note)
    {
        try {
            $conte = Conte::find($id);

            $note_conte = $conte->note_conte;
            $nombre_note_conte = $conte->nombre_note_conte;

            $conte->note_conte = $note_conte + $note;
            $conte->nombre_note_conte = $nombre_note_conte + 1;

            $conte->save();
            $reponse = ReponseApi::ReponseAllowed($conte);
        } catch (Throwable $error) {
            $reponse = ReponseApi::ReponseReject($error);
        }
        return json_encode($reponse);
    }
}
