<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Photo;
use App\Models\Service;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{

    protected $validationRules = [
        'title' => 'required|min:10|max:100',
        'description' => 'required|min:10|max:1000',
        'bathroom_no' => 'required|integer|min:1|max:10',
        'bed_no' => 'required|integer|min:1|max:10',
        'room_no' => 'required|integer|min:1|max:20',
        'square_meters' => 'required|integer|min:1|max:500',
        'address' => 'required|min:3|max:255',
        'file_name' => 'required|max:1024|mimes:jpeg,jpg,png',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $apartments = Apartment::where('user_id', Auth::id())->get();
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
        $services = Service::all();
        return view("user.apartments.create", compact("apartment",'services'));
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

        $validatedData = $request->validate($this->validationRules);

        $newApartment = new Apartment();
        $sentData['user_id']= Auth::id();
        $sentData['latitude']= 40.71455;
        $sentData['longitude']= 40.71455;
        $sentData['is_available']= true;

        $newApartment->fill($sentData);
        $newApartment->save();
        if($request->services) {
            $newApartment->services()->sync($sentData['services']);
        }

        $photo =  new Photo();
        $sentData['file_name'] = Storage::put("uploads/" . Auth::user()->name . "/photo", $request->file_name);
        $sentData['apartment_id'] =  $newApartment->id;
        $sentData['is_cover_photo'] =  true;

        $photo->fill($sentData);
        $photo->save();

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
        if (Auth::id() != $apartment->user_id) abort(401);
        else{
            $photo = $apartment->photos;
            // dd($apartment, $photo);
            return view("user.apartments.show", compact("apartment", 'photo'));
        }
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
        $services = Service::all();
        if (Auth::id() != $apartment->user_id) abort(401);
        else{
            return view("user.apartments.edit", compact("apartment", "services"));
        }
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

        $validatedData = $request->validate($this->validationRules);

        $apartment = Apartment::findOrFail($id);
        // $sentData['latitude']= 40.71455;
        // $sentData['longitude']= 40.71455;
        // $sentData['is_available']= true;

        if($request->services) {
            $apartment->services()->sync($request->services);
        } else {
            $apartment->services()->detach();
        }
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


        /**
     * Assign a sponsor to apartment.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignSponsorship($id)
    {

        $apartment = new Apartment();
        $sponsorships = Sponsorship::all();

        return view("user.apartments.assignSponsor", compact("apartment",'sponsorships'));
    }
}
