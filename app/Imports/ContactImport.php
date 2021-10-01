<?php

namespace App\Imports;

use App\Models\ContactModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use DB;
use Auth;
class ContactImport implements ToModel , WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
   
    public function model(array $row)
    {
        //dd($row[1]);
    //    if ($row[0] === NULL && $row[1] === NULL && $row[2] === NULL && $row[3] === NULL && $row[4] === NULL && $row[5] === NULL) {
    //        return null;
    //    }
   
        if(Auth::user()->hasrole('admin'))
        {
        if ($row[0] != NULL && $row[1] != NULL && $row[2] != NULL && $row[3] != NULL && $row[4] != NULL && $row[5] != NULL) {
            return new ContactModel([
                'first_name' => $row[0],
                'last_name'  => $row[1],
                'phone_num' => $row[2],
                'email' => $row[3],
                'address' => $row[4],
                'city' => $row[5]
            ]);
        }if ($row[0] !== NULL) {
            return new ContactModel([
              
                'phone_num' => $row[0]
                
            
            ]);
        
            
        }
    }
    if (Auth::user()->hasrole('caller')) {
       
            if ($row[0] != NULL && $row[1] != NULL && $row[2] != NULL && $row[3] != NULL && $row[4] != NULL && $row[5] != NULL) {
                return new ContactModel([
                    'first_name' => $row[0],
                    'last_name'  => $row[1],
                    'phone_num' => $row[2],
                    'email' => $row[3],
                    'address' => $row[4],
                    'city' => $row[5],
                    'caller_id' => Auth::user()->id
                ]);
            }if ($row[0] !== NULL) {
                return new ContactModel([
                  
                    'phone_num' => $row[0],
                    'caller_id' => Auth::user()->id
                    
                
                ]);
            
                
            }
        }
        if (Auth::user()->hasrole('manager')) {
       
            if ($row[0] != NULL && $row[1] != NULL && $row[2] != NULL && $row[3] != NULL && $row[4] != NULL && $row[5] != NULL) {
                return new ContactModel([
                    'first_name' => $row[0],
                    'last_name'  => $row[1],
                    'phone_num' => $row[2],
                    'email' => $row[3],
                    'address' => $row[4],
                    'city' => $row[5],
                    'manager_id' => Auth::user()->id
                ]);
            }if ($row[0] !== NULL) {
                return new ContactModel([
                  
                    'phone_num' => $row[0],
                    'manager_id' => Auth::user()->id
                    
                
                ]);
            
                
            }
        }
    
   
    
    }
}
