<?php

namespace App\Http\Controllers;

use App\Models\LivreOr;
use App\Http\Requests\StoreLivreOrRequest;
use App\Http\Requests\UpdateLivreOrRequest;
use Throwable;

class LivreOrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreLivreOrRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LivreOr $livreOr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LivreOr $livreOr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLivreOrRequest $request, $livreOr)
    {
        //
        try {
            $com = LivreOr::find($livreOr);
            $com->is_verified_livreor = true;
            $com->save();
            return redirect()->route('dashboard');
        } catch (Throwable $error) {
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($livreOr)
    {
        //
        try {
            $com = LivreOr::find($livreOr);
            LivreOr::destroy($com->id);
            return redirect()->route('dashboard');
        } catch (Throwable $error) {
            dd($error);
        }
    }
}
