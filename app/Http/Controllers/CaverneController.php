<?php

namespace App\Http\Controllers;

use App\Models\Caverne;
use App\Http\Requests\StoreCaverneRequest;
use App\Http\Requests\UpdateCaverneRequest;
use App\Models\Conte;
use App\Providers\ReponseApi;
use Illuminate\Support\Facades\Storage;
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
            $cavernes = caverne::all();
            return view('caverne/voir_cavernes', compact('cavernes'));
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
        try {
            return view('/caverne/ajouter_modifier_caverne');
        } catch (Throwable $error) {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCaverneRequest $request)
    {
        //
        try {
            $completPath = $request->image->store(config('images.path'), 'images');
            $completnameFile = explode("/", $completPath);

            $completPathIntro = $request->intro->store(config('intros.path'), 'intros');
            $introPath = explode("/", $completPathIntro);

            $caverne = Caverne::create([
                'titre_caverne' => $request['titre_caverne'],
                'intro_caverne' => $introPath[1],
                'image_caverne' => $completnameFile[1]
            ]);
            $caverne->save();
            return redirect()->route('caverne.index');
        } catch (Throwable $error) {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($caverne)
    {
        //
        try {
            $cav = Caverne::find($caverne);
            return view('caverne/ajouter_modifier_caverne', compact('cav'));
        } catch (Throwable $error) {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCaverneRequest $request, Caverne $caverne)
    {
        try {
            $cav = Caverne::find($caverne->id);
            $oldTitre = $caverne->titre_caverne;
            $oldImage = $caverne->image_caverne;
            $oldIntro = $caverne->intro_caverne;

            if ($request->titre_caverne != $oldTitre) {
                $cav->titre_caverne = $request->titre_caverne;
            } else {
                $cav->titre_caverne = $oldTitre;
            }

            if ($request->image) {

                $completPath = $request->image->store(config('images.path'), 'images');
                $completnameFile = explode("/", $completPath);
                $cav->image_caverne = $completnameFile[1];
                $img = 'public/images/' . $oldImage;
                Storage::delete($img);
            } else {
                $cav->image_caverne = $oldImage;
            }

            if ($request->intro) {
                $completPathIntro = $request->intro->store(config('intros.path'), 'intros');
                $introPath = explode("/", $completPathIntro);
                $cav->intro_caverne = $introPath[1];
                $intro = 'public/intros/' . $oldIntro;
                Storage::delete($intro);
            } else {
                $cav->intro_caverne = $oldIntro;
            }
            $cav->save();
            return redirect()->route('caverne.index');
        } catch (Throwable $error) {
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caverne $caverne)
    {
        $cav = Caverne::find($caverne->id);

        $img = 'public/images/' . $cav->image_caverne;
        $intro = 'public/intros/' . $cav->intro_caverne;
        $contes = $cav->conte;
        foreach ($contes as $conte) {
            $motcles = $conte->motcles;
            foreach ($motcles as $motcle) {
                $motcle->contes()->detach($conte);
            }
            Conte::destroy($conte->id);
        }
        caverne::destroy($cav->id);
        Storage::delete($img);
        Storage::delete($intro);



        // try {
        // } catch (Throwable $error) {
        // }
    }








    public function caverne()
    {
        $arrcavernes = [];
        $cavernes = Caverne::all();
        foreach ($cavernes as $caverne) {
            $cav = [];
            $cav['id'] = $caverne->id;
            $cav['titre'] = $caverne->titre_caverne;
            $cav['url_intro'] = '\storage\app\public\intros\\' . $caverne->intro_caverne;
            $cav['url_image'] = '\storage\app\public\images\\' . $caverne->image_caverne;
            array_push($arrcavernes, $cav);
        }
        try {
            $reponse = ReponseApi::ReponseAllowed($arrcavernes);
            return json_encode($reponse);
        } catch (Throwable $error) {
            $reponse = ReponseApi::ReponseReject($error);
            return json_encode($reponse);
        }
    }
}
