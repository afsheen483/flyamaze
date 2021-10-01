<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\TicketModel;
use App\Models\LeadModel;
use App\Models\VisaLeadModel;
use App\Models\HotelLeadModel;
use App\Models\SiteScenesModel;
use Auth;
class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data =  DB::select("SELECT
        l.client_id,
        l.id,
        l.updated_at,
        c.first_name,
        c.last_name,
        c.email,
        c.remarks,
        c.phone_num,
        c.phone_num_1,
        c.address,
        c.city,
        c.entry_date,
        c.response_status
    FROM
        lead l
    JOIN contact c ON
        c.id = l.client_id
    WHERE
        l.is_deleted = 0");
        return view('Leads.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $lead_data = new LeadModel();
        $data = LeadModel::find($id);
        return view('Leads.froms',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TicketModel::create([
            'passenger_type' =>$request->passenger_type,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'passport' => $request->passport,
            'airline' => $request->airline,
            'business' => $request->business,
            'pnr' => $request->pnr,
            'base_fare' => $request->base_fare,
            'tax' => $request->tax,
            'margin' => $request->margin,
            'sale_price' => $request->sale_price,
            'total' => $request->total,
            'client_comment' => $request->client_comment,
            'created_by' => Auth::user()->id,
        ]);
        VisaLeadModel::create([
            'visa_id' => $request->visa_id,
            'lead_id'=> $request->lead_id,
            'psf' => $request->visa_psf,
            'sale_price' => $request->visa_sale_price,
            'comments' => $request->visa_comments,
            'created_by' => Auth::user()->id,
        ]);
        TransportModel::create([
        'transport_id' => $request->transport_id,
        'lead_id' =>$request->lead_id,
        'psf' => $request->transport_psf,
        'sale_price' => $request->transport_sale_price,
        'days' => $request->transport_days,
        'created_by' =>Auth::user()->id,
        ]);
        HotelLeadModel::create([
        'lead_id' => $request->lead_id,
        'hotel_name' => $request->hotel_name,
        'days' => $request->hotel_days,
        'rate' => $request->hotel_rate,
        'amount' => $request->hotel_amount,
        'package' => $request->package,
        ]);
        SiteScenesModel::create([
            'lead_id' => $request->lead_id,
            'amount' => $request->sit_amount,
            'description' => $request->site_description,
        ]);
        return redirect()->back();
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
}
