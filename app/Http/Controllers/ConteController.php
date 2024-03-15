<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conte;
use App\Http\Requests\StoreConteRequest;
use App\Http\Requests\UpdateConteRequest;
use App\Models\MotCle;
use App\Providers\ReponseApi;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Laravel\Prompts\Note;
use PhpParser\Node\Scalar\String_;
use PHPUnit\Event\Code\Throwable;
use Ramsey\Uuid\Type\Integer;

use function PHPSTORM_META\map;

class ConteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $motCle = [];
        try {
            $contes = Conte::all()->where('caverne_id', $request['idCaverne']);
            //foreach contes pour chaque contes, recuperer ses mots clés et ajouter dans un tableau
            foreach ($contes as $conte) {
                // $motCle = MotCle::where("id", $conte->motcle()->mot_cle_id);
                $motcleconte = [];
                $motcleconte = $conte->motcles;
                array_push($motCle, $motcleconte);
            }
            $contes = Conte::with('motcles')->get();
            return view('conte/voir_contes', compact("contes", "motCle"));
        } catch (Throwable $e) {
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
    public function store(StoreConteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Conte $conte)
    {
        return view('view', compact('conte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conte $conte)
    {
        return view('', compact('conte'));
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
        try {
            Conte::destroy($conte);
            return redirect()->route('');
        } catch (Throwable $e) {
            //retourner une alerte 
            return redirect()->back();
        }
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

    public function conte()
    {
        $arrcontes = [];
        $contes = Conte::all();
        foreach ($contes as $conte) {
            $con = [];
            $con['id'] = $conte->id;
            $con['id_caverne'] = $conte->caverne_id;
            $con['titre'] = $conte->titre_conte;
            $con['url_intro'] = $conte->intro_conte;
            $con['url_image'] = $conte->image_conte;
            $con['url_audio'] = $conte->histoire_conte;
            $con['nombre_lecture'] = $conte->nombre_lecture_conte;
            $con['nombre_note'] = $conte->nombre_note_conte;
            $con['note'] = $conte->note_conte;
            $con['mots_cle'] = [];

            $motclecontearr = [];
            $motclecontes = $conte->motcles;
            foreach ($motclecontes as $motcle) {
                $nom_motcle = $motcle->nom_motcle;
                array_push($motclecontearr, $nom_motcle);
            }
            array_push($con['mots_cle'], $motclecontearr);
            array_push($arrcontes, $con);
        }
        $contes = Conte::with('motcles')->get();

        try {
            $reponse = ReponseApi::ReponseAllowed($arrcontes);
            return json_encode($reponse);
        } catch (Throwable $error) {
            $reponse = ReponseApi::ReponseReject($error);
            return json_encode($reponse);
        }
    }
}
