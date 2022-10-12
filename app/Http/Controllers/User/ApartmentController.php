<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();

        // dd($apartments);

        return view("user.apartments.index", compact("apartments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartment = new Apartment();
        return view("user.apartments.create", compact("apartment"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $sentData = $request->all();
        $newApartment = new Apartment();
        $sentData['user_id']= Auth::id();
        $sentData['latitude']= 40.71455;
        $sentData['longitude']= 40.71455;
        // $sentData['is_available']= true;
        $newApartment->create($sentData);

        return redirect()->route('user.apartments.index');

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
        $apartment = Apartment::findOrFail($id);
        return view("user.apartments.show", compact("apartment"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $apartment = Apartment::findOrFail($id);
        return view("user.apartments.edit", compact("apartment"));
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
        $sentData = $request->all();
        $apartment = Apartment::findOrFail($id);
        // $sentData['latitude']= 40.71455;
        // $sentData['longitude']= 40.71455;
        // $sentData['is_available']= true;
        $apartment->update($sentData);

        return redirect()->route('user.apartments.show', compact('apartment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();
        return redirect()->route('user.apartments.index');


    }
}
