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
        $appVersion = AppVersion::all()->first();
        $v = [];
        $v['version'] = $appVersion->version;

        try {
            $reponse = ReponseApi::ReponseAllowed($v);
            return json_encode($reponse);
        } catch (Throwable $error) {
            $reponse = ReponseApi::ReponseReject($error);
            return json_encode($reponse);
        }
    }

    public function DeployRelease(string $newVersion)
    {
        try {
            $appConf = AppVersion::all()->first();
            $appConf->version = $newVersion;
            $appConf->save();
            $reponse = ReponseApi::ReponseAllowed('');
        } catch (Throwable $error) {
            $reponse = ReponseApi::ReponseReject($error);
        }
        return json_encode($reponse);
    }
}
