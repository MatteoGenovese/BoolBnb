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

    // Create validations
    // FIXME gestire le validazioni dell'address con l'api.
    protected $validationRules = 
    [
        'title' => 'required|min:10|max:100',
        'description' => 'required|min:10|max:1000',
        'bathroom_no' => 'required|integer|min:1|max:10',
        'bed_no' => 'required|integer|min:1|max:10',
        'room_no' => 'required|integer|min:1|max:20',
        'square_meters' => 'required|integer|min:30|max:1000',
        'address' => 'required|min:3|max:255',
        'file_name' => 'required|max:5120|mimes:jpeg,jpg,png',
        'services' => 'required|min:1|exists:services,id',
    ];


    // Edit validations
    protected $updateValidationRules = [
        'title' => 'required|min:10|max:100',
        'description' => 'required|min:10|max:1000',
        'bathroom_no' => 'required|integer|min:1|max:10',
        'bed_no' => 'required|integer|min:1|max:10',
        'room_no' => 'required|integer|min:1|max:20',
        'square_meters' => 'required|integer|min:30|max:1000',
        'address' => 'required|min:3|max:255',
        'file_name' => 'max:5120|mimes:jpeg,jpg,png',
        'services' => 'required|min:1|exists:services,id',
    ];

    // Validation messages
    protected $validationMessages = [
        'title.required' => 'Il titolo è richiesto.',
        'title.min' => 'Il titolo deve essere di almeno 10 caratteri',
        'title.max' => 'Il titolo può avere massimo 100 caratteri.',

        'description.required' => 'La descrizione è richiesta.',
        'description.min' => 'La descrizione deve essere di almeno 10 caratteri.',
        'description.max' => 'La descrizione può avere massimo 1000 caratteri.',

        'bathroom_no.required' => 'Il numero di bagni è richiesto.',
        'bathroom_no.min' => 'L\'abitazione dovrà avere almeno un bagno.',
        'bathroom_no.max' => 'L\'abitazione può avere massimo 10 bagni.',
        'bathroom_no.integer' => 'Il numero di bagni può essere espresso solo in numeri interi.',

        'bed_no.required' => 'Il numero di letti è richiesto.',
        'bed_no.min' => 'L\'abitazione dovrà avere almeno un letto.',
        'bed_no.max' => 'L\'abitazione può avere massimo 10 letti.',
        'bed_no.integer' => 'Il numero di letti può essere espresso solo in numeri interi.',

        'room_no.required' => 'Il numero di stanze è richiesto.',
        'room_no.min' => 'L\'abitazione dovrà avere almeno una stanza.',
        'room_no.max' => 'L\'abitazione può avere massimo 10 stanze.',
        'room_no.integer' => 'Il numero di stanze può essere espresso solo in numeri interi.',

        'square_meters.required' => 'I metri quadrati dell\'abitazione sono richiesti',
        'square_meters.min' => 'L\'abitazione dovrà essere di almeno 30 metri quadrati.',
        'square_meters.max' => 'L\'abitazione può essere massimo 1000 metri quadrati.',
        'square_meters.integer' => 'I metri quadrati possono essere espressi solo in numeri interi.',

        'file_name.required' => 'La foto dell\'abitazione è richiesta.',        
        'file_name.max' => 'La foto può pesare massimo 5MB',        
        'file_name.mimes' => 'Le estensioni dei file può essere solo: jpeg, jpg o png.',        

        'services.required' => 'La selezione dei servizi è richiesta.',
        'services.min' => 'L\'abitazione dovrò avere almeno un servizio.',
        'services.exists' => 'Il servizio deve esistere.',
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

        $validatedData = $request->validate($this->validationRules, $this->validationMessages);

        $newApartment = new Apartment();
        $sentData['user_id']= Auth::id();
        $sentData['latitude']= 40.71455;
        $sentData['longitude']= 40.71455;

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
            return view("user.apartments.show", compact("apartment"));
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
        $validatedData = $request->validate($this->updateValidationRules, $this->validationMessages);

        if(!isset($sentData["is_available"])) {
            $sentData["is_available"] = false;
        } else {
            $sentData["is_available"] = true;
        }

        $apartment = Apartment::findOrFail($id);
        // $sentData['latitude']= 40.71455;
        // $sentData['longitude']= 40.71455;

        if($request->services) {
            $apartment->services()->sync($request->services);
        } else {
            $apartment->services()->detach();
        }

        $apartment->update($sentData);
        
        $photo = Photo::where("apartment_id", $id)->first();
        
        if(is_null($request->file_name)) {
            $sentData["file_name"] = $photo->file_name;
        } else {
            $sentData["file_name"] = Storage::put("uploads/" . Auth::user()->name . "/photo", $request->file_name);
        }

        $photo->fill($sentData);
        
        $photo->save();

        return redirect()->route('user.apartments.show', compact('apartment', "photo"));
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
    public function goToSponsorship($id)
    {
        $apartment = Apartment::findOrFail($id);
        $sponsorships = Sponsorship::all();
        return view("user.apartments.assignSponsor", compact('apartment','sponsorships'));
    }

            /**
     * Assign a sponsor to apartment.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignSponsorship(Request $request)
    {

        //La creo
        $sentData = $request->all();

        dd($sentData);
        // $post = Post::findOrFail($id);

        // $post->fill($sentData);
        // $post->save();

        // $post->tags()->sync($sentData['tags']);
        // return redirect()->route('admin.posts.index',compact('post'));



        //cerco dentro la pivot se per l'id di un appartamento ho un expiration date maggiore di oggi


        //se esiste aggiungo la duration

        //altrimenti expiration date è uguale a now()+ duration


        return view("user.apartments.index");


    }
}
