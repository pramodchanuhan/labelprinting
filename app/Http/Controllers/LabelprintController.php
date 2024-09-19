<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registerfrom;
use App\Models\Labelprintfrom;
use App\Models\User;
use App\Notifications\StatusNotification;
use Illuminate\Support\Facades\Auth;
use App\Mail\RegistrationSuccessful;
use Illuminate\Support\Facades\Mail;

class LabelprintController extends Controller
{
    public function index()
    {
        return view('labelprint/labelprintfrom');
    }


    public function edit($id)
    {
        $Labelprintfrom = Labelprintfrom::findOrFail($id);
        return view('labelprint/labelprintfromedit',compact('Labelprintfrom'));
    }

    
    public function labelprintfrom_list()
    {
        $Labelprintfrom = Labelprintfrom::all();
        return view('labelprint/labelprintfromlist',compact('Labelprintfrom'));
    }

    public function labelprintfrom_store(Request $request)
    {
        //dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            
    
        ]);

        // Create a new instance of the LabelPrintForm model (Assuming 'LabelPrintForm' is the model for 'labelprintfrom' table)
        $labelprintfrom = new Labelprintfrom;
        $labelprintfrom->prefix = $request->prefix;
        $labelprintfrom->name = $request->name;
        $labelprintfrom->address = $request->address;
        $labelprintfrom->local_area = $request->local_area;
        $labelprintfrom->city = $request->city;
        $labelprintfrom->district = $request->district;
        $labelprintfrom->state = $request->state;
        $labelprintfrom->zip_code = $request->zip_code;
        $labelprintfrom->date_of_birth = $request->date_of_birth;
        $labelprintfrom->partner_name = $request->partner_name;
        $labelprintfrom->anniversary = $request->anniversary;
        $labelprintfrom->partner_dob = $request->partner_dob;
    
        // Join the array of selected options into a string, separated by commas
        // $labelprintfrom->options = $request->has('options') ? implode(',', $request->options) : null;
        $labelprintfrom->options = $request->has('options') ? json_encode($request->options) : null;

    
        $labelprintfrom->contact_person = $request->contact_person;
        $labelprintfrom->std_code = $request->std_code;
        $labelprintfrom->office = $request->office;
        $labelprintfrom->office2 = $request->office2;
        $labelprintfrom->resident = $request->resident;
        $labelprintfrom->fax = $request->fax;
        $labelprintfrom->mobile_no = $request->mobile_no;
        $labelprintfrom->mobile_no2 = $request->mobile_no2;
        $labelprintfrom->email = $request->email;

        // Save the form data to the database
        $labelprintfrom->save();

        // Redirect to a thank-you page or back with success message
        return back()->with('success', 'Form has been successfully submitted!');
    }


    public function labelprintfrom_update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
    
        ]);

        // Create a new instance of the LabelPrintForm model (Assuming 'LabelPrintForm' is the model for 'labelprintfrom' table)
      
        $labelprintfrom = Labelprintfrom::findOrFail($id);
        $labelprintfrom->id = $request->id;
        $labelprintfrom->prefix = $request->prefix;
        $labelprintfrom->name = $request->name;
        $labelprintfrom->address = $request->address;
        $labelprintfrom->local_area = $request->local_area;
        $labelprintfrom->city = $request->city;
        $labelprintfrom->district = $request->district;
        $labelprintfrom->state = $request->state;
        $labelprintfrom->zip_code = $request->zip_code;
        $labelprintfrom->date_of_birth = $request->date_of_birth;
        $labelprintfrom->partner_name = $request->partner_name;
        $labelprintfrom->anniversary = $request->anniversary;
        $labelprintfrom->partner_dob = $request->partner_dob;
    
        // Join the array of selected options into a string, separated by commas
        $labelprintfrom->options = $request->has('options') ? implode(',', $request->options) : null;
    
        $labelprintfrom->contact_person = $request->contact_person;
        $labelprintfrom->std_code = $request->std_code;
        $labelprintfrom->office = $request->office;
        $labelprintfrom->office2 = $request->office2;
        $labelprintfrom->resident = $request->resident;
        $labelprintfrom->fax = $request->fax;
        $labelprintfrom->mobile_no = $request->mobile_no;
        $labelprintfrom->mobile_no2 = $request->mobile_no2;
        $labelprintfrom->email = $request->email;

        // Save the form data to the database
        $labelprintfrom->save();

        // Redirect to a thank-you page or back with success message
        return back()->with('success', 'Form has been successfully Updated!');
    }


    public function thankyou($id)
    {
        $RegisterFrom = RegisterFrom::findOrFail($id);
        return view('shreesairaj/thankyou', compact('RegisterFrom'));
    }

    public function registerfrom_print($id)
    {
        $RegisterFrom = RegisterFrom::findOrFail($id);
        return view('shreesairaj/registerfrom_print', compact('RegisterFrom'));
    }

    public function registerfromList()
    {
        $registerfrom = registerfrom::all();
        $totalAmount = $registerfrom->sum('amount');
        return view('shreesairaj/registerfromList', compact('registerfrom', 'totalAmount'));
    }
}
