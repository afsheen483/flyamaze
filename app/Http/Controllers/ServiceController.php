<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\VisaModel;
use App\Models\TransportModel;
use App\Models\HotelModel;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return view('admin.services.visa');
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
        VisaModel::create([
            'country' => $request->Country,
            'category' => $request->Category,
            'amount' => $request->Amount,
            'created_by' => Auth::user()->id,
        ]);
        return view('admin.services.visa');
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

    public function getVisa()
    {
        $data = DB::select("SELECT * FROM visa");
        return view('admin.services.visa',compact('data'));
    }
    public function createVisa($id)
    {
        $data = new VisaModel();
        if ($id > 0) {
            $data = VisaModel::find($id);
            return view('admin.services.create_visa',compact('data'));
        }else{
            return view('admin.services.create_visa',compact('data'));

        }
        
    }

    public function getTransport()
    {
         $data = DB::select("SELECT * FROM transports");
         return view('admin.services.transport',compact('data') );
    }
    public function createTransport($id)
    {
        $data = new TransportModel();
        if($id > 0){
            $data = TransportModel::find($id);
            return view('admin.services.create_transport',compact('data'));
        }else{
            return view('admin.services.create_transport',compact('data'));
        }
    }
    public function storeTransport(Request $request)
    {
        TransportModel::create([
            'vehicle' => $request->Vehicle,
            'rate_per_hour' => $request->RatePerHour,
            'created_by' => Auth::user()->id,
        ]);
        return redirect('transport');
    }

    public function getHotel()
    {
        $data = DB::select("SELECT * FROM hotel");
        return view('admin.services.hotel', compact('data'));
    }
    public function createHotel($id)
    {
        $data = new HotelModel();
        if($id > 0){
            $data = HotelModel::find($id);
            return view('admin.services.create_hotel', compact('data'));
        }else{
            return view('admin.services.create_hotel', compact('data'));
        }
    }

    public function storeHotel(Request $request)
    {
        HotelModel::create([
            'hotel_name' => $request->HotelName,
            'rate_per_day' => $request->RatePerDay,
            'created_by' => Auth::user()->id,
        ]);
        return redirect('hotel');
    }

}
