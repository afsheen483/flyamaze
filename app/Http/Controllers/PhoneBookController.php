<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ContactImport;
use App\Models\ContactModel;
use Auth;
use DB;
use App\Models\VisaModel;
use App\Models\CallerLogModel;
use App\Models\LeadModel;
use App\Models\LeadLogModel;

class PhoneBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        if (Auth::user()->hasRole('caller')) {
            $data =  DB::select("SELECT
            c.*,
            CONCAT(r.first_name,' ',r.last_name) AS manager_name,
           CONCAT(rs.first_name,' ',rs.last_name) AS caller_name
        FROM
            contact c
       LEFT JOIN users r ON
            r.id = c.manager_id
        LEFT JOIN users rs ON
            rs.id = c.caller_id
        WHERE
            c.is_deleted = 0 AND
            c.caller_id = '".$id."'
            ORDER BY c.id DESC");

            return view('phone_book.index',compact('data'));
        }
        if (Auth::user()->hasRole('Manager')) {
            $data =  DB::select("SELECT
            c.*,
            CONCAT(r.first_name,' ',r.last_name) AS manager_name,
           CONCAT(rs.first_name,' ',rs.last_name) AS caller_name
        FROM
            contact c
       LEFT JOIN users r ON
            r.id = c.manager_id
       LEFT JOIN users rs ON
            rs.id = c.caller_id
        WHERE
            c.is_deleted = 0 AND
            c.manager_id = '".$id."'
            ORDER BY c.id DESC");

            return view('phone_book.index',compact('data'));
        }
        if (Auth::user()->hasRole('admin')) {
            $data =  DB::select("SELECT
            c.*,
           CONCAT(r.first_name,' ',r.last_name) AS manager_name,
           CONCAT(rs.first_name,' ',rs.last_name) AS caller_name
        FROM
            contact c
       LEFT JOIN users r ON
            r.id = c.manager_id
       LEFT JOIN users rs ON
            rs.id = c.caller_id
        WHERE
            c.is_deleted = 0
            ORDER BY c.id DESC");

            return view('phone_book.index',compact('data'));
        }
      
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data = new ContactModel();
        if ($id > 0) {
           $data = ContactModel::find($id);
           return view('phone_book.forms',compact('data'));
        }else{
            return view('phone_book.forms',compact('data'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('Y-m-d');
        ContactModel::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'phone_num' => $request->phone_num,
        'email'=> $request->email,
        'phone_num_1' => $request->phone_num_1,
        'address' => $request->address,
        'city' => $request->city,
        'entry_date' => $date,
        'manager_id' => $request->manager_id,
        'caller_id' => $request->caller_id,
        'status' => $request->status,
        'response_status' => $request->response_status,
        'remarks' => $request->remarks,
        'created_by' => Auth::user()->id,
        ]);
        return redirect('phone_book');
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
        $date = date("Y-m-d H:i:s");
        ContactModel::where('id','=',$id)->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email'=> $request->email,
        'phone_num' => $request->phone_num,
        'phone_num_1' => $request->phone_num_1,
        'address' => $request->address,
        'city' => $request->city,
        'entry_date' => $date,
        'status' => $request->status,
        'response_status' => $request->response_status,
        'remarks' => $request->remarks,
        'updated_by' => Auth::user()->id,
        'updated_at' => $date,
        ]);
        return redirect('phone_book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ContactModel::where('id','=',$id)->update([
            'is_deleted' => 1
        ]);
        if ($delete) {
            return 1;
        }
    }
    public function ChangeResponseStatus($id){
       $data =  ContactModel::find($id);
       $caller_data = DB::select("SELECT
       c.first_name,
       c.last_name,
         l.*,
       c.updated_at
   FROM
       caller_log l
   JOIN contact c ON
       c.id = l.contact_id
   WHERE
       c.is_deleted = 0 AND l.contact_id = '".$id."'");
    
        return view('phone_book.responce_status',compact('data','caller_data'));
    }
    public function fileImport(Request $request) 
    {
        //config(['excel.import.startRow' => 0]);

        Excel::import(new ContactImport, $request->file('file')->store('temp'));
        return back();
    }
    public function StoreResponseStatus(Request $request,$id)
    {
        $date = date("Y-m-d H:i:s");
        ContactModel::where('id','=',$id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email'=> $request->email,
            'phone_num' => $request->phone_num,
            'address' => $request->address,
            'remarks' => $request->dep_remarks,
            'updated_by' => Auth::user()->id,
            'updated_at' => $date,
            
        ]);
        if ($request->visa == 'visa') {
            VisaModel::create([
                'status' => $request->response_status,
                'country'=> $request->country,
                'category'=> $request->category,
                'created_by'=>Auth::user()->id,
            ]);
        }
        // if($request->response_status == '6'){
        //     LeadModel::create([
        //         'client_id' => $id,
        //         'created_by' => Auth::user()->id,
        //     ]);
        // }
        CallerLogModel::create([
            'contact_id' => $id,
            'caller_name' => Auth::user()->first_name." ".Auth::user()->last_name,
            'remarks' => $request->dep_remarks,
            'response_status' => $request->response_status,
            'created_by'=>Auth::user()->id,
            'visa_info' => $request->country." ".$request->category,
            'ticket_info' => "Arrival Date: ".$request->arrival_date."\n"."Departure Date: ".$request->departure_date."\n"."Sector: ".$request->state,
        ]);
       return redirect()->back();
        // if ($request->transport == 'transport') {
        //     # code...
        // }
        // if ($request->) {
        //     # code...
        // }
    }
    public function DeleteNullValues()
    {
        DB::delete("DELETE FROM contact WHERE first_name IS NULL AND last_name IS NULL AND email IS NULL AND phone_num = '' AND phone_num_1 IS NULL AND address IS NULL AND city IS NULL AND entry_date IS NULL AND manager_id IS NULL AND caller_id IS NOT NULL
        ");
    }
   public function AssignManager(Request $request)
   {
      $item_id_array = explode(",",$request->item_id);
      $manager_id = $request->manager_id;
      $caller_id = $request->caller_id;
      //dd($item_id_array);
      if ($caller_id != '' || $caller_id != NULL) {
        foreach ($item_id_array as $item) {
            ContactModel::where('id','=',$item)->update([
                'manager_id' => $request->manager_id,
                'caller_id' => $request->caller_id,
            ]);
        }
      }
      if ($manager_id != '' || $manager_id != NULL) {
        foreach ($item_id_array as $item) {
            ContactModel::where('id','=',$item)->update([
                'manager_id' => $request->manager_id,
            ]);
        }
      }
    
      return redirect('/phone_book');
   }
   public function ContactView($filter)
   {
       if ($filter == 'assigned_contact') {
         $data = DB::select("SELECT
         c.*,
         CONCAT(r.first_name,' ',r.last_name) AS manager_name,
        CONCAT(rs.first_name,' ',rs.last_name) AS caller_name
     FROM
         contact c
    LEFT JOIN users r ON
         r.id = c.manager_id
     LEFT JOIN users rs ON
         rs.id = c.caller_id
     WHERE
         c.is_deleted = 0 AND
         c.caller_id IS NOT NULL OR c.manager_id IS NOT NULL
         ORDER BY c.id DESC");
        return view('phone_book.index',compact('data'));

       }
       if ($filter == 'unassigned_contact') {
        $data = DB::select("SELECT
        c.*,
        CONCAT(r.first_name,' ',r.last_name) AS manager_name,
       CONCAT(rs.first_name,' ',rs.last_name) AS caller_name
    FROM
        contact c
   LEFT JOIN users r ON
        r.id = c.manager_id
    LEFT JOIN users rs ON
        rs.id = c.caller_id
    WHERE
        c.is_deleted = 0 AND
    c.caller_id IS  NULL AND c.manager_id IS  NULL
        ORDER BY c.id DESC");
       return view('phone_book.index',compact('data'));

      }
   }
}
