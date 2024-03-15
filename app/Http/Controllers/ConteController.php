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

            $newconte = Conte::find($id);
            $arrconte = [];
            $arrconte['nombre_note'] = $newconte->nombre_note_conte;
            $arrconte['note'] = $newconte->note_conte;


            $reponse = ReponseApi::ReponseAllowed($arrconte);
        } catch (Throwable $error) {
            $reponse = ReponseApi::ReponseReject($error);
        }
        return json_encode($reponse);
    }

    public function conte()
    {
        $arrcontes = [];
        $contes = Conte::all();
        foreach ($contes as $conte) {
            $con = [];
            $con['id'] = $conte->id;
            $con['id_cavenre'] = $conte->caverne_id;
            $con['titre'] = $conte->titre_conte;
            $con['url_intro'] = $conte->intro_conte;
            $con['url_image'] = $conte->image_conte;
            $con['url_audio'] = $conte->histoire_conte;
            $con['nombre_lecture'] = $conte->nombre_lecture_conte;
            $con['nombre_note'] = $conte->nombre_note_conte;
            $con['note'] = $conte->note_conte;
            $con['nombre_note'] = $conte->nombre_note_conte;
            $con['motcle'] = [];
            foreach ($conte->motcles as $motcle) {
                $mot = [];
                $mot['titre'] = $motcle->nom_motcle;
                array_push($con['motcle'], $mot);
            }
            array_push($arrcontes, $con);
        }

        try {
            $reponse = ReponseApi::ReponseAllowed($arrcontes);
            return json_encode($reponse);
        } catch (Throwable $error) {
            $reponse = ReponseApi::ReponseReject($error);
            return json_encode($reponse);
        }
    }
}
