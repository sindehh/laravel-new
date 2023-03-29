<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CustomerController extends Controller
{
    public function index()
    {
        $data = DB::table("customers")->get();
        return view('customer.index',['customers'=>$data]);
    } 

    public function addCustomer(){
        return view('customer.add');
    }

    public function saveCustomer(Request $req){
        //dd($req);
        $validated=$req->validate([
            "lastName"=>['required','min:4'],
            "firstName"=>['required','min:4'],
            "email"=>['required','min:4'],
            "contactNumber"=>['required','min:4'],
            "address"=>['required','min:4'],
           
        ]);

        //dd($validated);
        $data=Customer::create($validated);

        return redirect("/")->with('success', 'A record has been added!');
    
    }

    public function edit($id){
       $data=Customer::findOrFail($id);
       return view('customer.edit',['customer'=>$data]);
       return redirect('/')-> with('success', 'A record has been edited successfully!');
    }

    public function updateCustomer(Request $req){
        $req->validate([
            "lastName"=>['required','min:3'],
            "firstName"=>['required','min:4'],
            "email"=>['required','min:4'],
            "contactNumber"=>['required','min:4'],
            "address"=>['required','min:4'],
        ]);
            $data=Customer::find($req->id);
            $data->lastName=$req->lastName;
            $data->firstName=$req->firstName;
            $data->email=$req->email;
            $data->contactNumber=$req->contactNumber;
            $data->address=$req->address;

            $data->save();
            return redirect('/')-> with('success', 'A record has been edited successfully!');


        

    }
   
}
