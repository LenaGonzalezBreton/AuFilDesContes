<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Conte;
use App\Http\Requests\StoreConteRequest;
use App\Http\Requests\UpdateConteRequest;
use App\Models\Caverne;
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
    public function index()
    {
        try {
            $contes = conte::all();
            return view('conte/voir_contes', compact("contes"));
        } catch (Throwable $error) {
            return redirect()->back();
        }

        // $motCle = [];
        // try {
        //     $contes = Conte::all()->where('caverne_id', $idCaverne);
        //     //foreach contes pour chaque contes, recuperer ses mots clés et ajouter dans un tableau
        //     foreach ($contes as $conte) {
        //         // $motCle = MotCle::where("id", $conte->motcle()->mot_cle_id);
        //         $motcleconte = [];
        //         $motcleconte = $conte->motcles;
        //         array_push($motCle, $motcleconte);
        //     }
        //     //$contes = Conte::with('motcles')->get();
        //     //dd($contes, $request['idCaverne']);
        //     return view('conte/voir_contes', compact("contes", "motCle", "idCaverne"));
        // } catch (Throwable $e) {
        //     return redirect()->back();
        // }
    }
    /**
     * Recherche les contes à partir du titre ou des mots clés
     */
    public function rechercheConteCaverne(Request $request)
    {
        $motCle = [];
        // try {
        $contes = Conte::where('caverne_id', $request['idCaverne'])->where('titre_conte', 'LIKE', "%" . $request['search'] . "%")->get();
        // $contes = Conte::all()->where('caverne_id', $request['idCaverne']);
        // $newconte = $contes->where('titre_caverne', $request['search']);
        // dd($contes);
        foreach ($contes as $conte) {
            // $motCle = MotCle::where("id", $conte->motcle()->mot_cle_id);
            $motcleconte = [];
            $motcleconte = $conte->motcles;
            array_push($motCle, $motcleconte);
        }
        // dd($contes, $motCle);
        // return view('conte/voir_contes', compact("contes", "motCle"));
        return view('conte/voir_contes', ['idCaverne' => $request['idCaverne']])->with(["contes" => $contes, "motCle" => $motCle]);
        // } catch(Throwable $e) {
        // return redirect()->back();
        // }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $cavs = Caverne::all();
            $allmotcles = MotCle::all();
            return view('conte/ajouter_modifier_conte', compact('cavs', 'allmotcles'));
        } catch (Throwable $error) {
            dd($error);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConteRequest $request)
    {
        //
        try {
            $completPath = $request->image->store(config('imagesconte.path'), 'public');
            $completnameFile = explode("/", $completPath);

            $completPathIntro = $request->intro->store(config('introconte.path'), 'public');
            $introPath = explode("/", $completPathIntro);

            $completPathHistoire = $request->histoire->store(config('histoireconte.path'), 'public');
            $HistoirePath = explode("/", $completPathHistoire);

            $idCav = $request->cav;

            $conte = conte::create([
                'titre_conte' => $request->titre_conte,
                'intro_conte' => $introPath[3],
                'image_conte' => $completnameFile[2],
                'histoire_conte' => $HistoirePath[3],
                'caverne_id' => $idCav,
            ]);

            $conte->save();
            $con = conte::find($conte->id);
            foreach ($request->motcle as $mot) {
                $con->motcles()->attach($mot);
            }
            return redirect()->route('conte.index');
        } catch (Throwable $error) {
            dd($error);
        }
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
        $cavs = Caverne::all();
        $allmotcles = MotCle::all();
        $motclecontes = $conte->motcles();
        return view('conte/ajouter_modifier_conte', compact('conte', 'cavs', 'allmotcles', 'motclecontes'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConteRequest $request, Conte $conte)
    {
        try {
            $conte = conte::find($conte->id);
            $oldTitre = $conte->titre_conte;
            $oldCav = $conte->cav;
            $oldMotCles = $conte->motcles();
            dd($oldMotCles);
            $oldImg = $conte->image_conte;
            $oldIntro = $conte->intro_conte;
            $oldHistoire = $conte->histoire_conte;


            dd($oldMotCles);
            return redirect()->route('caverne.index');
        } catch (Throwable $error) {
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conte $conte)
    {
        try {
            $motcles = $conte->motcles;
            foreach ($motcles as $motcle) {
                $motcle->contes()->detach($conte);
            }
            Conte::destroy($conte->id);
        } catch (Throwable $e) {
            //retourner une alerte 
            dd($e);
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
