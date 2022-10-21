<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $apartments = Apartment :: with('user', 'category')->paginate(50);

        $apartments = Apartment::with('services', 'photos', 'user')->get();

        return response()->json([
            'response' => true,
            "results" =>  $apartments,
        ]);
    }

    public function filteredIndex(Request $request, $latitude, $longitude) {

        function degreesToRadians($degrees) {
            return $degrees * pi() / 180;
        };
        function distanceInKmBetweenEarthCoordinates($lat1, $lon1, $lat2, $lon2) {
            $earthRadiusKm = 6371;

            $dLat = degreesToRadians($lat2 - $lat1);
            $dLon = degreesToRadians($lon2 - $lon1);

            $lat1 = degreesToRadians($lat1);
            $lat2 = degreesToRadians($lat2);

            $a = sin($dLat / 2) * sin($dLat / 2) +
                sin($dLon / 2) * sin($dLon / 2) * cos($lat1) * cos($lat2);
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
            return $earthRadiusKm * $c;
        }

        function checkServicesInApartment($servicesIdList, $servicesPerApartment) {

            $exactMatchCount = 0;
            $apartmentServicesIds = [];

            for ($i=0; $i < count($servicesPerApartment) ; $i++) {
                $apartmentServicesIds[] = $servicesPerApartment[$i]->id;
            }
            foreach ($servicesIdList as $serviceId) {
                if(in_array($serviceId, $apartmentServicesIds)) {
                    $exactMatchCount++;
                }
            }
            if($exactMatchCount == count($servicesIdList)) {
                return true;
            } else return false;
        }

        
        if($request->has("services")) {
            $servicesIds = explode("-", $request->services);
        } else {
            $servicesIds = [];
        }

        if($request->has("bedNo")) {
            $minBedNo = $request->bedNo;
        }else{
            $minBedNo = 0;
        }

        if($request->has("roomNo")) {
            $minRoomNo = $request->roomNo;
        }else{
            $minRoomNo = 0;
        }

        if($request->has("range")) {
            $rangeInMeters = intval($request->range);
        }else{
            $rangeInMeters = 20;
        }



        $apartments = Apartment::with("services", "photos", "user")->get();

        $filteredApartmentsWithServices = [];
        $filteredApartmentsWithoutServices = [];

        foreach($apartments as $apartment) {
            $lat = $apartment->latitude;
            $lon = $apartment->longitude;
            if(count($servicesIds) > 0) {
                if(distanceInKmBetweenEarthCoordinates($latitude, $longitude, $lat, $lon) < $rangeInMeters &&
                $apartment->bed_no >= $minBedNo && $apartment->room_no >= $minRoomNo && $apartment->is_available &&
                checkServicesInApartment($servicesIds, $apartment->services)) {

                    $filteredApartmentsWithServices[] = $apartment;
                };
            } elseif (distanceInKmBetweenEarthCoordinates($latitude, $longitude, $lat, $lon) < $rangeInMeters &&
                $apartment->bed_no >= $minBedNo && $apartment->is_available && $apartment->room_no >= $minRoomNo) {
                $filteredApartmentsWithoutServices[] = $apartment;
            };
        };

        if(count($servicesIds) > 0) {
            return response()->json([
                'response' => true,
                "results" =>  $filteredApartmentsWithServices,
            ]);
        } else {
            if($filteredApartmentsWithoutServices) {
                return response()->json([
                    'response' => true,
                    "results" =>  $filteredApartmentsWithoutServices,
                ]);
            }  else return response('', 204);
        };


        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::with('services', 'photos','user')->find($id);

        if ($apartment) {
            return response()->json([
                'response' => true,
                "results" => [
                    'data' => $apartment,
                ]
            ]);
        }
        else return response('', 404);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
