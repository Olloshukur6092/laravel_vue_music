<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\SingerServices;
use Illuminate\Http\Request;

class SingerController extends Controller
{

    //this is Services constructor
    protected $singerServices;
    public function __construct(SingerServices $singerServices)
    {
        $this->singerServices = $singerServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $singerData = $this->singerServices->indexService();
        return response()->json([
            'singers' => $singerData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->singerServices->storeService($request->name);

        return response()->json([
            'message' => 'Singer data saved'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singer = $this->singerServices->editSingerService($id);
        return response()->json([
            'singer' => $singer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->singerServices->updateSingerService($request->name, $id);

        return response()->json([
            'message' => 'Updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->singerServices->destroySingerService($id);

        return response()->json([
            'message' => 'Deleted successfully!'
        ]);
    }
}
