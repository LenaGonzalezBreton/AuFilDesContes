<?php

namespace App\Http\Controllers;

use App\Models\Caverne;
use App\Http\Requests\StoreCaverneRequest;
use App\Http\Requests\UpdateCaverneRequest;
use App\Models\Conte;
use App\Providers\ReponseApi;
use Illuminate\Support\Facades\Redirect;
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
            return view('voir_cavernes', compact('cavernes'));
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
            return view('ajouter_modifier_caverne');
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
            $caverne = Caverne::create([
                'titre_caverne' => $request['titre_caverne'],
                'intro_caverne' => $request['intro_caverne'],
                'image_caverne' => $request['image_caverne']
            ]);
            $caverne->save();
            return redirect()->back();
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
    public function edit(Caverne $caverne)
    {
        //
        try {
            $cav = Caverne::find($caverne);
            return view('voir_cavernes', compact('cav'));
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
            $cav = Caverne::find($caverne);
            $cav->titre_caverne = $request['titre_caverne'];
            $cav->intro_caverne = $request['intro_caverne'];
            $cav->image_caverne = $request['image_caverne'];
            $caverne->save();
            return redirect()->back();
        } catch (Throwable $error) {
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caverne $caverne)
    {
        try {
            Caverne::destroy($caverne);
            return redirect()->back();
        } catch (Throwable $error) {
            return redirect()->back();
        }
    }

    public function caverne()
    {
        $arrcavernes = [];
        $cavernes = Caverne::all();
        foreach ($cavernes as $caverne) {
            $cav = [];
            $cav['id'] = $caverne->id;
            $cav['titre'] = $caverne->titre_caverne;
            $cav['url_intro'] = $caverne->intro_caverne;
            $cav['url_image'] = $caverne->image_caverne;


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
