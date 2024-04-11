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
use Illuminate\Support\Facades\Storage;
use Laravel\Prompts\Note;
use PhpParser\Node\Scalar\String_;
use Throwable;
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
            $nbContes = count($contes);
            return view('conte/voir_contes', compact("contes", "nbContes"));
        } catch (Throwable $error) {
            return redirect()->back()->with('error', 'Problème lors du chargement de la pages :' . $error);
        }
    }

    public function indexConteCaverne(int $idCaverne)
    {
        $motCle = [];
        try {
            $contes = Conte::all()->where('caverne_id', $idCaverne);
            //foreach contes pour chaque contes, recuperer ses mots clés et ajouter dans un tableau
            foreach ($contes as $conte) {
                // $motCle = MotCle::where("id", $conte->motcle()->mot_cle_id);
                $motcleconte = [];
                $motcleconte = $conte->motcles;
                array_push($motCle, $motcleconte);
            }
            //$contes = Conte::with('motcles')->get();
            //dd($contes, $request['idCaverne']);
            $nbContes = count($contes);
            return view('conte/voir_contes', compact("contes", "motCle", "idCaverne", "nbContes"));
        } catch (Throwable $e) {
            return redirect()->back();
        }
    }

    /**
     * Recherche les contes à partir du titre ou des mots clés
     */
    public function rechercheConteCaverne(Request $request)
    {
        try {
            if (!empty($request['idCaverne'])) {
                $contes = DB::table('contes')->where('titre_conte', 'LIKE', "%" . $request['search'] . "%")->get();
            } else {
                $contes = DB::table('contes')->where('titre_conte', 'LIKE', "%" . $request['search'] . "%")->get();
            }

            $motCle = [];

            // foreach ($contes as $conte) {
            //     $motCle = MotCle::where("id", $conte->motcles->mot_cle_id);
            //     $motcleconte = $conte->motcles;
            //     array_push($motCle, $motcleconte);
            // }
            $nbContes = count($contes);
            return view('conte/voir_contes', ['idCaverne' => $request['idCaverne']])->with(["contes" => $contes, "motCle" => $motCle, "nbContes" => $nbContes]);
        } catch (Throwable $e) {
            return redirect()->back();
        }
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
            return redirect()->back()->with('error', 'Problème lors du chargement de la pages :' . $error);
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
            return redirect()->route('conte.index')->with('success', 'Conte a été crée !');
        } catch (Throwable $error) {
            return redirect()->back()->with('error', 'Problème lors du chargement de la pages :' . $error);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Conte $conte)
    {
        // return view('view', compact('conte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conte $conte)
    {
        try {
            $cavs = Caverne::all();
            $allmotcles = MotCle::all();
            $motclecontes = $conte->motcles();
            return view('conte/ajouter_modifier_conte', compact('conte', 'cavs', 'allmotcles', 'motclecontes'));
        } catch (Throwable $error) {
            return redirect()->back()->with('error', 'Problème lors du chargement de la pages :' . $error);
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConteRequest $request, Conte $conte)
    {
        try {
            $conte = conte::find($conte->id);

            // OLD DATA
            $oldTitre = $conte->titre_conte;
            $oldCav = $conte->caverne_id;
            $oldMotCles = $conte->motcles;
            $oldImg = $conte->image_conte;
            $oldIntro = $conte->intro_conte;
            $oldHistoire = $conte->histoire_conte;
            $requestMotCle = $request->motcle;

            // Si le titre_caverne de la requet est différent de l'ancien titre alors tu change le titre, sinon tu remet l'ancien
            if ($request->titre_conte != $oldTitre) {
                $conte->titre_conte = $request->titre_conte;
            } else {
                $conte->titre_conte = $oldTitre;
            }
            // Si la caverne change alors l'id est passé en variable et donc on compare si de la caverne n'est pas égale a l'id de caverne enregister en base alors tu change
            if ($request->cav != $oldCav) {
                $conte->caverne_id = $request->cav;
            } else {
                $conte->caverne_id = $oldCav;
            }

            // si dans la request y'a une image
            if ($request->image) {
                // enregistrement de l'image dans le storage 
                $completPath = $request->image->store(config('imagesconte.path'), 'public');
                // récupération du nom
                $completnameFile = explode("/", $completPath);
                // enregistrement du nom en base
                $conte->image_conte = $completnameFile[2];
                // création du path pour la suppression de l'ancienne image
                $img = "/public/images/contes/" . $oldImg;
                // suppression de l'ancienne image
                Storage::delete($img);
            } else {
                // sinon on garde l'ancienne image
                $conte->image_conte = $oldImg;
            }

            // Si dans la request y'a une intro
            if ($request->intro) {
                // enregistrement de l'intro dans le storage 
                $completPathIntro = $request->intro->store(config('introconte.path'), 'public');
                // récupération du nom
                $introPath = explode("/", $completPathIntro);
                // enregistrement du nom en base
                $conte->intro_conte = $introPath[3];
                // création du path pour la suppression de l'ancienne intro
                $intro = '/public/sounds/contes/intros/' . $oldIntro;
                // suppression de l'ancienne image
                Storage::delete($intro);
            } else {
                // sinon on garde l'ancienne image
                $conte->intro_conte = $oldIntro;
            }

            // Si dans la request y'a une intro
            if ($request->histoire) {
                // enregistrement de l'histoire dans le storage 
                $completPathHistoire = $request->histoire->store(config('histoireconte.path'), 'public');
                // récupération du nom
                $HistoirePath = explode("/", $completPathHistoire);
                // enregistrement du nom en base
                $conte->histoire_conte = $HistoirePath[3];
                // création du path pour la suppression de l'ancienne histoire
                $histoire = '/public/sounds/contes/histoires/' . $oldHistoire;
                // suppression de l'ancienne histoire
                Storage::delete($histoire);
            } else {
                // sinon on garde l'ancienne histoire
                $conte->histoire_conte = $oldHistoire;
            }

            // je detache tous les mots associé au conte
            foreach ($oldMotCles as $oldMotCle) {
                $conte->motcles()->detach($oldMotCle);
            }
            // j'attache les nouveaux mots
            foreach ($requestMotCle as $newMotCle) {
                $conte->motcles()->attach($newMotCle);
            }
            $conte->save();
            return redirect()->route('conte.index')->with('success', 'Modifications enregistrées');
        } catch (Throwable $error) {
            return redirect()->back()->with('error', 'Problème lors du chargement de la pages :' . $error);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conte $conte)
    {
        try {
            $img = "/public/images/contes/" . $conte->image_conte;
            $intro = "/public/sounds/contes/intros/" . $conte->intro_conte;
            $histoire = "/public/sounds/contes/histoires/" . $conte->histoire_conte;
            $motcles = $conte->motcles;
            foreach ($motcles as $motcle) {
                $motcle->contes()->detach($conte);
            }
            Storage::delete($img);
            Storage::delete($intro);
            Storage::delete($histoire);

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
            return $reponse;
        } catch (Throwable $error) {
            $reponse = ReponseApi::ReponseReject($error);
            return json_encode($reponse);
        }
    }
}
