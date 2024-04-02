<?php

namespace App\Http\Controllers;

use App\Models\Caverne;
use App\Models\MotCle;
use App\Http\Requests\StoreMotCleRequest;
use App\Http\Requests\UpdateMotCleRequest;
use Throwable;

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
        dd('Creating a new resource');
    }

    /**
     * Store a newly created resource in storage.
     *  Determine if the given profile can be updated by the user.
     */
    public function store(StoreMotCleRequest $request)
    {
        $test = $request->input('nom_motclef');
        $motcle = MotCle::create([
            'nom_motcle' => $request->input('nom_motclef')
        ]);
        $motcle->save();
        return redirect()->route('motcle.index');
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
    public function edit($id)
    {
        $motClef = MotCle::find($id);
        return view('/mot_clef/ajouter_modifier_mot_clef', compact('motClef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMotCleRequest $request)
    {
        //        dd('tests');
        //        $motClef = MotCle::find($id);
        //        $motClef->nom_motcle = $request->input('nom_motclef');
        //        dd($motClef->nom_motcle);
        return redirect()->route('motcle.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($motCle)
    {
        try {

            MotCle::destroy($motCle);
            return redirect()->back();
        } catch (Throwable $error) {
            return redirect()->back();
        }
    }
}
