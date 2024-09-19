<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registerfrom;
use App\Models\CompanyInfo;
use App\Models\User;
use App\Notifications\StatusNotification;
use Illuminate\Support\Facades\Auth;
use App\Mail\RegistrationSuccessful;
use Illuminate\Support\Facades\Mail;

class RegisterformController extends Controller
{
    public function index()
    {
        $receiptNo = RegisterFrom::generateReceiptNo();
        return view('shreesairaj/registerfrom',compact('receiptNo'));
    }

    public function registerfrom_store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            // Specify validation rules here
        ]);

        // Create a new instance of the Assesment_form model
        $registerfrom = new registerfrom;
        $registerfrom->receipt_no = RegisterFrom::generateReceiptNo();
        $registerfrom->name = $request->name;
        $registerfrom->mobile = $request->mobile;
        $registerfrom->from_city = $request->from_city;
        $registerfrom->to_city = $request->to_city;
        $registerfrom->journey_date = $request->journey_date;
        $registerfrom->bus_name = $request->bus_name;
        $registerfrom->reporting_time = $request->reporting_time;
        $registerfrom->departure_time = $request->departure_time;
        $registerfrom->seat_no = $request->seat_no;
        $registerfrom->starting_point = $request->starting_point;
        $registerfrom->amount = $request->amount;
        $registerfrom->remark = $request->remark;
      
        // Save the form data
        $registerfrom->save();


        // Redirect to the thank you page with the form ID
        return redirect()->route('shreesairaj.thankyou', ['id' => $registerfrom->id]);
    }

    public function thankyou($id)
    {
        $RegisterFrom = RegisterFrom::findOrFail($id);
        return view('shreesairaj/thankyou',compact('RegisterFrom'));
    }

    public function registerfrom_print($id)
    {
        $RegisterFrom = RegisterFrom::findOrFail($id);
        return view('shreesairaj/registerfrom_print',compact('RegisterFrom'));
    }

    public function registerfromList()
    {
        $registerfrom = registerfrom::all();
        $totalAmount = $registerfrom->sum('amount');
        return view('shreesairaj/registerfromList',compact('registerfrom','totalAmount'));
    }

    public function candidate_list_update(Assesment_form $id, Request $request)
    {
        $formfields = $request->validate([
            'status' => '',
            'stage' => '',
        ]);
        $stage = $formfields['stage'];
        $status = $formfields['status'];

        // dd($id,$formfields);

        $cur_round = 0;
        if ($stage == 1 || $stage == 2) {
            $cur_round = 1;
        } elseif ($stage == 3 || $stage == 4) {
            $cur_round = 2;
            if ($stage == 4 && ($status == 0 || $status == 2)) {
                $formfields['r2_asignedto'] = null;
            }
        } elseif ($stage == 6 && $status == 0) {
            $cur_round = 4;
            $formfields['r3_asignedto'] = null;
        } elseif ($stage == 5 || $stage == 6) {
            $cur_round = 3;
            if ($stage == 6 && ($status == 2)) {
                $formfields['r3_asignedto'] = null;
            }
        }

        $formfields['cur_round'] = $cur_round;
        $id->update($formfields);


        return response()->json(['message' => 'updated successfully']);
    }

    public function candidate_list_delete(Request $request)
    {
        // dd($request);
        Assesment_form::find($request->delete_iaf_in)->delete();
        return back()->with('success', 'record deleted succesfully');
    }

    // public function r1_self_asign(){
    //     $user_id=request()->user_id;
    //     $iaf_id=request()->iaf_id;
    //     $Assesment_form=Assesment_form::find($iaf_id);
    //     $Assesment_form->update(['r1_asignedto'=>$user_id]);

    //     // dd($Assesment_form,$user_id,$iaf_id);

    //     // $this->assigninterviewlist();
    //     return redirect('assigninterviewlist');
    // }

    public function assigninterviewlist()
    {
        $user = auth()->user()->id;
        $asigned_iaf = Assesment_form::where("r1_asignedto", $user)->orWhere("r2_asignedto", $user)->orWhere("r3_asignedto", $user)->latest()->get();
        // $r1_interviewers = User::role(['hr','hr manager'])->get();
        $r1_interviewers = User::find(auth()->user()->id);
        $r2_interviewers = User::permission('iaf interview')->withoutRole('ceo')->with('employee')->get();
        $r3_interviewers = User::role(['ceo'])->with('employee')->get();


        $CompanyInfo = CompanyInfo::find(1);
        $stages = json_decode($CompanyInfo->stage);
        $status = json_decode($CompanyInfo->status);

        // dd($asigned_iaf,$r2_interviewers,$r2_interviewers[0]->employee->designation,$r2_interviewers[0]->employee);
        return view('assigninterviewlist', [
            'asigned_iafs' => $asigned_iaf,
            'r1_interviewers' => $r1_interviewers,
            'r2_interviewers' => $r2_interviewers,
            'r3_interviewers' => $r3_interviewers,
            'stages' => $stages,
            'status' => $status,
        ]);
    }

    public function iaf_update(Assesment_form $id, Request $request)
    {
        // dd($request->all(),$id);
        $formfields = $request->validate([
            'status' => '',
        ]);

        $id->update($formfields);
        if ($request->interview_sec == "all_interview")
            return redirect('CandidateList')->with('success');

        return redirect('assigninterviewlist')->with('success');
    }

    // public function hrform(Request $request)
    // {
    //     $interview_assesment_form = Assesment_form::find($request->id);
    //     $CompanyInfo = CompanyInfo::find(1);
    //     $status = (array)json_decode($CompanyInfo->status);
    //     // dd($status,$interview_assesment_form->emp_reference_no);

    //     return view('hrform', [
    //         'Assesment_form' => $interview_assesment_form,
    //         'status' => $status,
    //     ]);
    // }

    public function hrformstore(Request $request)
    {
        //   dd($request->all(),$request->hr_name);
        $validatedData = $request->validate([
            // Specify validation rules here
        ]);

        $Assesment_form = Assesment_form::find($request->iaf_id);
        $Assesment_form->status = $request->status;
        $Assesment_form->hr_name = $request->hr_name;
        $Assesment_form->strengths = $request->strengths;
        $Assesment_form->weaknesses = $request->weaknesses;
        $Assesment_form->inthr_date = $request->inthr_date;


        if ($request->status == 3) {
            $Assesment_form->r1_asignedto = null;
        }

        $Assesment_form->save();

        // flash()->success('Success',' Record has been created successfully !');

        return redirect('assigninterviewlist')->with('success');
    }


    // public function opsround(Request $request)
    // {
    //     $interview_assesment_form = Assesment_form::find($request->id);
    //     $CompanyInfo = CompanyInfo::find(1);
    //     $status = (array)json_decode($CompanyInfo->status);
    //     return view('interviewerform')->with(['Assesment_form' => $interview_assesment_form, 'status' => $status,]);
    // }

    public function opsround_store(Request $request)
    {

        $validatedData = $request->validate([
            // Specify validation rules here
        ]);

        $Assesment_form = Assesment_form::find($request->iaf_id);
        $Assesment_form->status = $request->status;
        $Assesment_form->ops_name  = $request->ops_name;
        $Assesment_form->ops_strengths = $request->ops_strengths;
        $Assesment_form->ops_weaknesses = $request->ops_weaknesses;
        $Assesment_form->ops_date  = $request->ops_date;
        $Assesment_form->mock_name = $request->mock_name;
        $Assesment_form->mock_strengths = $request->mock_strengths;
        $Assesment_form->mock_weaknesses = $request->mock_weaknesses;
        $Assesment_form->mock_date = $request->mock_date;

        if ($request->status == 3) {
            $Assesment_form->r2_asignedto = null;
        }

        $Assesment_form->save();

        // flash()->success('Success',' Record has been created successfully !');

        return redirect('assigninterviewlist')->with('success');
    }


    // public function directorform(Request $request)
    // {
    //     $interview_assesment_form = Assesment_form::find($request->id);
    //     return view('directorform')->with(['Assesment_form' => $interview_assesment_form]);
    // }

    public function directorform_store(Request $request)
    {

        $validatedData = $request->validate([
            // Specify validation rules here
        ]);

        $Assesment_form = Assesment_form::find($request->iaf_id);
        $Assesment_form->status = $request->status;
        $Assesment_form->director_name = $request->director_name;
        $Assesment_form->director_strengths = $request->director_strengths;
        $Assesment_form->director_weaknesses = $request->director_weaknesses;
        $Assesment_form->director_date = $request->director_date;

        if ($request->status == 3) {
            $Assesment_form->r3_asignedto = null;
        } elseif ($request->status == 1) {
            $Assesment_form->r3_asignedto = null;
            $Assesment_form->cur_round = 4;
            $Assesment_form->stage = 4;
            $Assesment_form->status = 0;
        }

        $Assesment_form->save();

        // flash()->success('Success',' Record has been created successfully !');

        return redirect('assigninterviewlist')->with('success');
    }

    // public function selectinterviewmode()
    // {
    //     return view('selectinterviewmode');

    // }

    public function interview_mode_store(Request $request)
    {

        // dd($request->all());
        // $validatedData = $request->validate([
        //     // Specify validation rules here
        // ]);

        $formfields = [
            'interview_mode' => $request->interview_mode,
            // 'interviewer_name' => $request->interviewer_name ?? '',
            'interview_link' => $request->interview_link ?? '',
            'assignto' => $request->assignto ?? '',
            // 'cur_round'=>$request->cur_round??'0',
        ];


        $Assesment_form = Assesment_form::find($request->iaf_id);

        // $interview_round=$request->cur_round;
        $formfields['cur_round'] = $Assesment_form->cur_round + 1;
        $formfields['stage'] = $formfields['cur_round'];
        $stage = $formfields['cur_round'];
        $formfields['status'] = 0;

        if ($stage == 1) {
            $formfields['r1_asignedto'] = $formfields['assignto'];
        } elseif ($stage == 2) {
            $formfields['r1_asignedto'] = null;
            $formfields['r2_asignedto'] = $formfields['assignto'];
        } elseif ($stage == 3) {
            $formfields['r2_asignedto'] = null;
            $formfields['r3_asignedto'] = $formfields['assignto'];
        } else {
            $formfields['r3_asignedto'] = null;
        }

        $loginUser = Auth::user()->name;
        $emp_info = User::find(auth()->user()->id)->employee->employees_info;
        $assigned_user = User::find($formfields['assignto']);
        // dd($user,$emp_info);
        $title = "Interview Assignment";
        $message = "$loginUser assign to $assigned_user->name for the interview of $Assesment_form->candidateName ";
        $image = $emp_info->profile_pic ?? null;
        $assigned_user->notify(new StatusNotification($title, $message, $image));

        unset($formfields['assignto']);

        // dd($formfields);

        $Assesment_form->update($formfields);

        return back()->with('success', 'Interview mode updated succesfully');
    }
}
