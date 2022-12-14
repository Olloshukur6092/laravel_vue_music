<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\SongsServices;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    protected $songsServices;
    public function __construct(SongsServices $songsServices)
    {
        $this->songsServices = $songsServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $song = $this->songsServices->songsIndexService();
        return response()->json([
            'song' => $song
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
        // dd($request);
        $this->songsServices->songsStoreService($request->song_name, $request->song_title, $request->song_desc, $request->singerId, $request->langId, $request->genreId, $request->file('songImg'), $request->songMp3, $request->songDate);
        return response()->json([
            'message' => 'Songs saved'
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
        $song = $this->songsServices->editSongsService($id);
        return response()->json([
            'song' => $song, 
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
        $this->songsServices->updateSongsService($id, $request->songName, $request->songTitle, $request->songDesc, $request->singerId, $request->songLangId, $request->songGenreId, $request->songDate);

        return response()->json([
            'message' => 'Updated successfully',
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
        $this->songsServices->destroySongService($id);
        return response()->json([
            'message' => 'Deleted Successfully',
        ]);
    }
}
