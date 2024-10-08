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
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Route;
use PDF;

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

    
    public function list(Request $request)
    {

        if ($request->ajax()) {
        $query = Labelprintfrom::select(['id','prefix',
       'name',
       'address',
       'local_area',
       'city',
       'district',
       'state',
       'zip_code',
       'date_of_birth',
       'partner_name',
       'anniversary',
       'partner_dob',
       'options',
       'contact_person',
       'std_code',
       'office',
       'office2',
       'resident',
       'fax',
       'mobile_no',
       'mobile_no2',
       'email']);
        return DataTables::of($query)
        ->addColumn('index', function ($query) {
            static $index = 1;
            return $index++;
        })
        ->addColumn('action', function ($query) {
            return '
                <a href="' . route('labelprint.edit', $query->id) . '" class="btn btn-primary btn-sm">Edit</a>
                <form action="' . route('labelprint.destroy', $query->id) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure?\');">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            ';
        })
        ->filter(function ($query) {
            if (request()->has('search.value')) {
                $searchValue = request()->input('search.value');
                $query->where(function ($query) use ($searchValue) {
                    $query->where('name', 'like', "%" . $searchValue . "%")
                    ->orWhere('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('address', 'like', '%' . $searchValue . '%')
                    ->orWhere('local_area', 'like', '%' . $searchValue . '%')
                    ->orWhere('city', 'like', '%' . $searchValue . '%')
                    ->orWhere('district', 'like', '%' . $searchValue . '%')
                    ->orWhere('state', 'like', '%' . $searchValue . '%')
                    ->orWhere('zip_code', 'like', '%' . $searchValue . '%')
                    ->orWhere('date_of_birth', 'like', '%' . $searchValue . '%')
                    ->orWhere('partner_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('anniversary', 'like', '%' . $searchValue . '%')
                    ->orWhere('partner_dob', 'like', '%' . $searchValue . '%')
                    ->orWhere('options', 'like', '%' . $searchValue . '%')
                    ->orWhere('contact_person', 'like', '%' . $searchValue . '%')
                    ->orWhere('std_code', 'like', '%' . $searchValue . '%')
                    ->orWhere('office', 'like', '%' . $searchValue . '%')
                    ->orWhere('office2', 'like', '%' . $searchValue . '%')
                    ->orWhere('resident', 'like', '%' . $searchValue . '%')
                    ->orWhere('fax', 'like', '%' . $searchValue . '%')
                    ->orWhere('mobile_no', 'like', '%' . $searchValue . '%')
                    ->orWhere('mobile_no2', 'like', '%' . $searchValue . '%')
                    ->orWhere('email', 'like', '%' . $searchValue . '%');
                });
            }
        })
        ->make(true);
    }
        return view('labelprint/labelprintfromlist');
    }

    public function labelprintfrom_store(Request $request)
    {   
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'address' => 'required|max:255',
            'local_area' => 'required|min:3',
            'city' => 'required|min:3',
            'district' => 'required|min:3',
            'state' => 'required|min:3',
            'zip_code' => 'required|min:3',
            'date_of_birth' => 'required|date',
            'partner_name' => 'required|min:3', 
            'anniversary' => 'required|date',   
            'partner_dob' => 'required|date',
            'contact_person' => 'required|min:3',   
            'std_code' => 'required|numeric|digits:6',  // Assuming standard code is 6 digits
            'office' => 'required|min:3',   
            'office2' => 'required|min:3',
            'resident' => 'required|min:3',
            'fax' => 'required|numeric|digits:6',  // Assuming fax is 6 digits
            'mobile_no' => 'required|numeric|digits:10', // Assuming mobile no is between 10 to 15 digits
            'mobile_no2' => 'required|numeric|digits:10', // Same for mobile_no2
            'email' => 'required|email',
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
        return redirect()->route('labelprint.labelprintfromlist')->with('success', 'Form has been successfully submitted!');

    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'address' => 'required|max:255',
            'local_area' => 'required|min:3',
            'city' => 'required|min:3',
            'district' => 'required|min:3',
            'state' => 'required|min:3',
            'zip_code' => 'required|min:3',
            'date_of_birth' => 'required|date',
            'partner_name' => 'required|min:3', 
            'anniversary' => 'required|date',   
            'partner_dob' => 'required|date',
            'contact_person' => 'required|min:3',   
            'std_code' => 'required|numeric|digits:6',  // Assuming standard code is 6 digits
            'office' => 'required|min:3',   
            'office2' => 'required|min:3',
            'resident' => 'required|min:3',
            'fax' => 'required|numeric|digits:6',  // Assuming fax is 6 digits
            'mobile_no' => 'required|numeric|digits:10', // Assuming mobile no is between 10 to 15 digits
            'mobile_no2' => 'required|numeric|digits:10', // Same for mobile_no2
            'email' => 'required|email',
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
        return redirect()->route('labelprint.labelprintfromlist')->with('success', 'Form has been successfully Updated!');
    }

    public function delete(Request $request, $id){

        Labelprintfrom::find($id)->delete();
        return redirect()->route('labelprint.labelprintfromlist')->with('success', 'Form has been successfully Deleted!');
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
    public function print(){
    $LabelprintingData = Labelprintfrom::all();
    $pdf = PDF::loadView('pdf.labelprint', ['LabelprintingData' => $LabelprintingData]);
    return $pdf->stream('labelprinting.pdf');
    }
}
