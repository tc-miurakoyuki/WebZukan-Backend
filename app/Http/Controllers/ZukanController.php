<?php

namespace App\Http\Controllers;

use App\Zukan;
use Illuminate\Http\Request;

class ZukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Zukan::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $zukan = new Zukan;
        $zukan->id = $data['id'];
        $zukan->title = $data['title'];
        $zukan->text = $data['text'];
        $zukan->image = $data['image'];
        $zukan->save();
        return Zukan::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zukan  $zukan
     * @return \Illuminate\Http\Response
     */
    public function show(Zukan $zukan)
    {
        return $zukan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zukan  $zukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zukan $zukan)
    {
        $zukan->id = $request->id;
        $zukan->title = $request->title;
        $zukan->text = $request->text;
        $zukan->image = $request->image;
        return $zukan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zukan  $zukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zukan $zukan)
    {
        $zukan->delete();
    }
}