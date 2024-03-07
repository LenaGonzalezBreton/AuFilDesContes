<?php

namespace App\Http\Controllers;

use App\Models\AppVersion;
use App\Http\Requests\StoreAppVersionRequest;
use App\Http\Requests\UpdateAppVersionRequest;
use App\Providers\ReponseApi;
use Throwable;

class AppVersionController extends Controller
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
    public function store(StoreAppVersionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AppVersion $appVersion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppVersion $appVersion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppVersionRequest $request, AppVersion $appVersion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppVersion $appVersion)
    {
        //
    }

    public function AppConf()
    {
        try {
            $reponse = ReponseApi::ReponseAllowed(AppVersion::all()->first());
            return json_encode($reponse);
        } catch (Throwable $error) {
            $reponse = ReponseApi::ReponseReject($error);
            return json_encode($reponse);
        }
    }

    public function DeployRelease(string $appVersion)
    {
        try {
            $AppConf = AppVersion::all()->first();
            $AppConf->version = $request['titre_caverne'];
            $cav->intro_caverne = $request['intro_caverne'];
            $cav->image_caverne = $request['image_caverne'];
            $caverne->save();
            $reponse = ReponseApi::ReponseAllowed('');
            return json_encode($reponse);
        } catch (Throwable $error) {
            $reponse = ReponseApi::ReponseReject($error);
            return json_encode($reponse);
        }
    }
}
