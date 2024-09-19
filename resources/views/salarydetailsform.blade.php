<x-layouts.app>
    <style>
        .card-body {
            font-family: 'Poppins';
            font-size: 16px;
        }


        h2 {
            text-align: center;
            padding-bottom: 20px;
        }

        h4 {
            text-align: center;
        }

        label {
            margin: 10px 0;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: none;
            resize: vertical;
        }

        label.radio {
            margin-top: 10px;

        }

        input[type="radio"] {
            margin-right: 5px;
        }

        .referral-textbox,
        .others-textbox {
            display: none;
        }

        table {

            width: 100%;
            margin: auto;
            border-collapse: collapse;
            margin-bottom: 20px;

        }

        table,
        th,
        td {
            border: 1px solid #ccc;
            padding: 5px;
        }

        th {
            text-align: center !important;
            color: black;
        }

        table.hr-comments-table textarea {
            outline: none;
        }

        .form-group input[type="file"] {
            display: block;
            margin-top: 5px;
        }

        table.hr-comments-table input[type="text"] {
            outline: none;
            border: none;
        }

        .form-row {
            display: flex;
            margin-bottom: 10px;
        }

        .form-row label {
            margin-right: 10px;
        }

        .form-row input {
            flex: 1;
            padding: 5px;
            margin-right: 10px;
            border: none;
            outline: none;
        }

        table.salary-table th,
        td {
            text-align: center;
        }

        table.salary-table input[type="number"] {
            text-align: center;
        }
    </style>


    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h3 class="page-title">Interviewer List</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}/index">Dashboard</a></li>
                            <li class="breadcrumb-item">Interviewer List</li>
                            <!-- <li class="breadcrumb-item active">Aptitude Result</li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if (($Assesment_form->cur_round ?? '') >= '0')
                                <form method="POST" action="{{ route('form-store') }}">
                                    <h2>Interview Assessment Form</h2>
                                    <label for="candidateName">Candidate Name:</label>
                                    <input type="text" id="candidateName" name="candidateName"
                                        value="{{ $Assesment_form->candidateName }}" readonly>

                                    <label for="phone">Contact no:</label>
                                    <input type="text" id="phone" name="phone"
                                        value="{{ $Assesment_form->phone }}" readonly>

                                    <label for="email">Email Address:</label>
                                    <input type="text" id="email" name="email"
                                        value="{{ $Assesment_form->email }}" readonly>

                                    <label for="company">Company:</label>
                                    <select class="select" name="company_id" disabled>
                                        <option value="">Select</option>
                                        {{-- @foreach ($company_names as $key => $company_name)
                                        <option value="{{$key}}" {{ $Assesment_form->company_name  == $key ? 'selected' : '' }}>
                                            {{$stage}}</option>
                                    @endforeach --}}

                                    </select>

                                    <label for="source">Source:</label>
                                    <select id="source" name="source" onchange="handleSourceChange()" disabled>
                                        <option value="HR" {{ $Assesment_form->source == 'HR' ? 'selected' : '' }}>
                                            HR
                                        </option>
                                        <option value="Walkin"
                                            {{ $Assesment_form->source == 'Walkin' ? 'selected' : '' }}>
                                            Walkin</option>
                                        <option value="Reference"
                                            {{ $Assesment_form->source == 'Reference' ? 'selected' : '' }}>Reference
                                        </option>
                                        <option value="Social Site"
                                            {{ $Assesment_form->source == 'Social Site' ? 'selected' : '' }}>Social
                                            Site
                                        </option>
                                        <option value="other"
                                            {{ $Assesment_form->source == 'other' ? 'selected' : '' }}>
                                            Others</option>
                                    </select>

                                    @if (($Assesment_form->source ?? '') == 'Reference')
                                        <div id="referral-textbox">
                                            <label for="referenceSource">Name of Referral:</label>
                                            <input type="text" id="referencename" name="referencename"
                                                value="{{ $Assesment_form->referencename }}" readonly>
                                            <label for="referenceSource">Contact no of Referral:</label>
                                            <input type="text" id="referencecontact" name="referencecontact"
                                                value="{{ $Assesment_form->referencecontact }}" readonly>
                                        </div>
                                    @endif
                                    @if (($Assesment_form->source ?? '') == 'other')
                                        <div id="others-textbox">
                                            <label for="otherSource">Other Source:</label>
                                            <input type="text" id="otherSource" name="otherSource"
                                                value="{{ $Assesment_form->otherSource }}" readonly>
                                        </div>
                                    @endif
                                    @if (($Assesment_form->source ?? '') == 'HR')
                                        <div id="hr-textbox">
                                            <label for="HRSource">HR:</label>
                                            <select id="" class="select" name="HRSource">
                                                <option value="0">
                                                    Select</option>
                                                @can('iaf asign hr')
                                                    @foreach ($hrs as $hr)
                                                        <option value="{{ $hr->id }}">
                                                            {{ ucfirst($hr->employee->f_name) . ' ' . ucwords($hr->employee->l_name) }}
                                                        </option>
                                                    @endforeach
                                                @endcan
                                            </select>
                                        </div>
                                    @endif


                                    <label for="education">Qualification:</label>
                                    <select id="education" name="education" disabled>
                                        <option value="SSC"
                                            {{ $Assesment_form->education == 'SSC' ? 'selected' : '' }}>SSC</option>
                                        <option value="HSC"
                                            {{ $Assesment_form->education == 'HSC' ? 'selected' : '' }}>HSC</option>
                                        <option value="Undergraduate"
                                            {{ $Assesment_form->education == 'Undergraduate' ? 'selected' : '' }}>
                                            Undergraduate</option>
                                        <option value="Graduate"
                                            {{ $Assesment_form->education == 'Graduate' ? 'selected' : '' }}>Graduate
                                        </option>
                                        <option value="Masters"
                                            {{ $Assesment_form->education == 'Masters' ? 'selected' : '' }}>Masters
                                        </option>
                                        <option value="PG"
                                            {{ $Assesment_form->education == 'PG' ? 'selected' : '' }}>
                                            PG</option>
                                        <option value="Others"
                                            {{ $Assesment_form->education == 'Others' ? 'selected' : '' }}>Others
                                        </option>
                                    </select>

                                    <label for="position">Applied Position :</label>
                                    <select id="position" name="position" disabled>
                                        <option value="">Select</option>
                                        <option
                                            value="Software Developer"{{ $Assesment_form->position == 'Software Developer' ? 'selected' : '' }}>
                                            Software Developer</option>
                                        <option
                                            value="BDE"{{ $Assesment_form->position == 'BDE' ? 'selected' : '' }}>
                                            BDE
                                        </option>
                                        <option
                                            value="LGE"{{ $Assesment_form->position == 'LGE' ? 'selected' : '' }}>
                                            LGE
                                        </option>
                                    </select>

                                    @if (($Assesment_form->position ?? '') == 'BDE' || ($Assesment_form->position ?? '') == 'LGE')
                                        <div id="position-textbox">
                                            <label for="callingPreference">Calling Preference:
                                                <input type="radio" name="callingPreference" value=" Inbound"
                                                    {{ $Assesment_form->callingPreference == 'Inbound' ? 'checked' : '' }}
                                                    readonly>
                                                Inbound
                                                <input type="radio" name="callingPreference" value=" Outbound"
                                                    {{ $Assesment_form->callingPreference == 'Outbound' ? 'checked' : '' }}
                                                    readonly>
                                                Outbound</label>
                                        </div>
                                    @endif

                                    <label for="experienceType">Experience Type:</label>
                                    <select id="experienceType" name="experienceType" readonly>
                                        <option value="fresher"
                                            {{ $Assesment_form->experienceType == 'Fresher' ? 'selected' : '' }}>
                                            Fresher
                                        </option>
                                        <option value="experienced"
                                            {{ $Assesment_form->experienceType == 'Experienced' ? 'selected' : '' }}>
                                            Experienced</option>
                                    </select>

                                    @if (($Assesment_form->experienceType ?? '') == 'Experienced')
                                        <div id="experience-textbox">
                                            <label for="experience">Total Years of Experience:</label>
                                            <input type="text" id="experience" name="experience"
                                                value="{{ $Assesment_form->experience }}" readonly>

                                            <label for="status">Current/Last Employment Status:</label>
                                            <select id="emp_status" name="emp_status" disabled>
                                                <option value="">Select</option>
                                                <option
                                                    value="Working"{{ $Assesment_form->emp_status == 'Working' ? 'selected' : '' }}>
                                                    Working</option>
                                                <option
                                                    value="Not Working"{{ $Assesment_form->emp_status == 'Not Working' ? 'selected' : '' }}>
                                                    Not Working</option>
                                                <option
                                                    value="On Notice Period"{{ $Assesment_form->emp_status == 'On Notice Period' ? 'selected' : '' }}>
                                                    On Notice Period</option>
                                            </select>


                                            <label for="emp_name">Current/Last Employer Name:</label>
                                            <input type="text" id="emp_name" name="emp_name"
                                                value="{{ $Assesment_form->emp_name }}" readonly>

                                            <label for="currentdesignation">Current/Last Designation:</label>
                                            <input type="text" id="currentdesignation" name="currentdesignation"
                                                value="{{ $Assesment_form->currentdesignation }}" readonly>

                                            <label for="currentSalary">Current/Last CTC:</label>
                                            <input type="number" id="currentSalary" name="currentSalary"
                                                value="{{ $Assesment_form->currentSalary }}" readonly>

                                        </div>
                                    @endif


                                    <label for="expectedSalary">Expected CTC:</label>
                                    <input type="number" id="expectedSalary" name="expectedSalary" min="0"
                                        value="{{ $Assesment_form->expectedSalary }}" readonly>



                                    <label for="rotationalShifts">Rotational Shifts: </label>
                                    <input type="radio" name="rotationalShifts" value="Yes"
                                        {{ ($Assesment_form->rotationalShifts ?? '') == 'Yes' ? 'checked' : '' }}
                                        required> Yes
                                    <input type="radio" name="rotationalShifts" value="No"
                                        {{ ($Assesment_form->rotationalShifts ?? '') == 'No' ? 'checked' : '' }}
                                        required> No
                                    <br>


                                    <label for="references">References:</label>
                                    <table class="hr-comments-table">
                                        <tr>
                                            <th>Name</th>
                                            <th>Contact Number</th>
                                        </tr>
                                        @foreach ($Assesment_form->emp_reference as $key => $value)
                                            <tr>
                                                <td><input type="text" id="reference" name="emp_reference[]"
                                                        value="{{ $key }}"></td>
                                                <td><input type="text" id="reference" name="emp_reference_no[]"
                                                        value="{{ $value }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                    <td><input type="text" id="reference" name="emp_reference1" value="{{ $Assesment_form->emp_reference1 }}"></td>
                                        <td><input type="text" id="reference" name="emp_reference_no1" value="{{ $Assesment_form->emp_reference_no1 }}"></td>
                                        </tr>
                                        <tr>
                                        <td><input type="text" id="reference" name="emp_reference2" value="{{ $Assesment_form->emp_reference2 }}"></td>
                                        <td><input type="text" id="reference" name="emp_reference_no2" value="{{ $Assesment_form->emp_reference_no2 }}"></td>
                                        </tr> --}}
                                    </table>

                                    @if ($Assesment_form->resume)
                                        <div class="form-group">
                                            <label>Download Resume:</label>
                                            <a href="{{ asset($Assesment_form->resume) }}"
                                                download>{{ $Assesment_form->resume }} <i
                                                    class="fa fa-download text-info " aria-hidden="true"></i></a>
                                        </div>
                                    @endif
                                </form>

                            @endif
                            <br><br>

                            @if (($Assesment_form->cur_round ?? '') == 0)
                                <form action="{{ url("iaf-update/$Assesment_form->id") }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <label for="input3">Status:</label>
                                    <div class="dropdown action-label mr-5">
                                        <select id="status_{{ $Assesment_form->id }}" name="status"
                                            class="form-select btn btn-white btn-sm btn-rounded "
                                            aria-label="Default select example"  >
                                            @foreach ($status as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $Assesment_form->status == $key ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <input type="hidden" name="interview_sec" value="all_interview">

                                    <div class="form-group mt-4">
                                        <div>
                                            <button type="submit"
                                                class="btn btn-success waves-effect waves-light">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger waves-effect m-l-5">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>

                                </form>
                                <br> <br>
                            @endif

                            {{-- <form action="{{url('iaf-update')}}" method="POST">
                                @csrf --}}

                            @if (($Assesment_form->cur_round ?? '') >= 1 && auth()->user()->hasAnyRole('ceo|hr|hr manager')   )
                                <form action="{{ url('hrform') }}" method="POST">
                                    @csrf
                                    <!-- <h2>For Office Use Only</h2> -->
                                    <h2> HR Round </h2>

                                    <table class="hr-comments-table">
                                        <tr>

                                            <th>Strengths</th>
                                            <th>Weaknesses</th>
                                        </tr>
                                        <tr>

                                            <td>
                                                <textarea id="strengths" name="strengths" rows="5" required>{{ $Assesment_form->strengths }}</textarea>
                                            </td>
                                            <td>
                                                <textarea id="weaknesses" name="weaknesses" rows="5" required>{{ $Assesment_form->weaknesses }}</textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="text" id="hr_name" name="hr_name"
                                                    value="{{ $Assesment_form->hr_name ? $Assesment_form->hr_name : auth()->user()->name }}"
                                                    placeholder="Name">
                                            </td>
                                            <td>Date :<input type="date" id="inthr_date" name="inthr_date"
                                                    value="{{ $Assesment_form->inthr_date }}" required
                                                    style="border:none;padding-left:10px;"></td>
                                        </tr>
                                    </table>

                                    <input type="hidden" name="iaf_id" id="iaf_id"
                                        value="{{ $Assesment_form->id }}">
                                    @if (($Assesment_form->cur_round ?? '') == 1)
                                        <div class="form-row" style="padding-top:10px;padding-left:10px;">
                                            <label for="input1">Mode of Interview:</label>
                                            <input type="text" value="{{ $Assesment_form->interview_mode }}">
                                            @if (($Assesment_form->interview_mode ?? '') == 'Link')
                                                <label for="input2">Link:</label>
                                                <input type="text" value="{{ $Assesment_form->interview_link }}">
                                            @endif
                                            <label for="input3">Status:</label>
                                            {{-- <input type="text" value="{{ $status[$Assesment_form->status] }}"> --}}

                                            <div class="dropdown action-label mr-5">
                                                <select id="status_{{ $Assesment_form->id }}" name="status"
                                                    class="form-select btn btn-white btn-sm btn-rounded "
                                                    aria-label="Default select example"  >
                                                    @foreach ($status as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ $Assesment_form->status == $key ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-success waves-effect waves-light">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                </form>
                                <br> <br>
                            @endif

                            @if (($Assesment_form->cur_round ?? '') >= 2)
                                <form action="{{ url('interviewerform') }}" method="POST">
                                    @csrf
                                    <!-- <h2>Office Use Form</h2> -->
                                    <h2> Operation Round </h2>

                                    <div class="strengths-weaknesses-container">

                                        <table class="hr-comments-table">
                                            <tr>

                                                <th>Strengths</th>
                                                <th>Weaknesses</th>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <textarea id="ops_strengths" name="ops_strengths" rows="5" required>{{ $Assesment_form->ops_strengths }}</textarea>
                                                </td>
                                                <td>
                                                    <textarea id="ops_weaknesses" name="ops_weaknesses" rows="5" required>{{ $Assesment_form->ops_weaknesses }}</textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text" id="ops_name" name="ops_name"
                                                        value="{{ $Assesment_form->ops_name ? $Assesment_form->ops_name : auth()->user()->name }}"
                                                        placeholder="Name">

                                                </td>
                                                <td>Date :<input type="date" id="ops_date" name="ops_date"
                                                        value="{{ $Assesment_form->ops_date }}"
                                                        style="border:none;padding-left:10px;"></td>
                                            </tr>

                                        </table>
                                    </div>
                                    <br>
                                    <br>

                                    @if ($Assesment_form->position == "BDE" || $Assesment_form->position == "LGE" )

                                        <div class="strengths-weaknesses-container">
                                            <h2> Mock Call </h2>

                                            <table class="hr-comments-table">
                                                <tr>

                                                    <th>Strengths</th>
                                                    <th>Weaknesses</th>
                                                </tr>
                                                <tr>

                                                    <td>
                                                        <textarea id="mock_strengths" name="mock_strengths" rows="5" required>{{ $Assesment_form->mock_strengths }}</textarea>
                                                    </td>
                                                    <td>
                                                        <textarea id="mock_weaknesses" name="mock_weaknesses" rows="5" required>{{ $Assesment_form->mock_weaknesses }}</textarea>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="text" id="mock_name" name="mock_name"
                                                            value="{{ $Assesment_form->mock_name ? $Assesment_form->mock_name : auth()->user()->name }}"
                                                            placeholder="Name">
                                                    </td>
                                                    <td>Date :<input type="date" id="mock_date" name="mock_date"
                                                            value="{{ $Assesment_form->mock_date }}"
                                                            style="border:none;padding-left:10px;"></td>
                                                </tr>
                                            </table>
                                        </div>

                                    @endif

                                    <input type="hidden" name="iaf_id" id="iaf_id"
                                        value="{{ $Assesment_form->id }}">


                                    @if (($Assesment_form->cur_round ?? '') == 2)
                                        <div class="form-row" style="padding-top:10px;padding-left:10px;">
                                            <label for="input1">Mode of Interview:</label>
                                            <input type="text" value="{{ $Assesment_form->interview_mode }}">
                                            @if (($Assesment_form->interview_mode ?? '') == 'Link')
                                                <label for="input2">Link:</label>
                                                <input type="text" value="{{ $Assesment_form->interview_link }}">
                                            @endif
                                            <label for="input3">Status:</label>

                                            <div class="dropdown action-label mr-5">
                                                <select id="status_{{ $Assesment_form->id }}" name="status"
                                                    class="form-select btn btn-white btn-sm btn-rounded "
                                                    aria-label="Default select example"  >
                                                    @foreach ($status as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ $Assesment_form->status == $key ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-success waves-effect waves-light">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    @endif


                                </form>
                                <br>
                                <br>
                            @endif

                            @if (($Assesment_form->cur_round ?? '') >= 3)
                                <form action="{{ url('directorform') }}" method="POST">
                                    @csrf
                                    <h2>Director Round </h2>

                                    <div class="strengths-weaknesses-container">

                                        <table class="hr-comments-table">
                                            <tr>

                                                <th>Strengths</th>
                                                <th>Weaknesses</th>
                                            </tr>
                                            <tr>

                                                <td>
                                                    <textarea id="director_strengths" name="director_strengths" rows="5" required>{{ $Assesment_form->director_strengths }}</textarea>
                                                </td>
                                                <td>
                                                    <textarea id="director_weaknesses" name="director_weaknesses" rows="5" required>{{ $Assesment_form->director_weaknesses }}</textarea>
                                                </td>
                                            </tr>

                                            <tr>
                                                <input type="hidden" name="iaf_id" id="iaf_id"
                                                    value="{{ $Assesment_form->id }}">
                                                <td>
                                                    {{-- <textarea id="director_name" name="director_name" rows="1">Name : {{ $Assesment_form->director_name }}</textarea> --}}
                                                    <input type="text" id="director_name" name="director_name"
                                                        value="{{ $Assesment_form->director_name ? $Assesment_form->director_name : auth()->user()->name }}"
                                                        placeholder="Name">

                                                </td>
                                                <td>Date :<input type="date" id="director_date"
                                                        name="director_date"
                                                        value="{{ $Assesment_form->director_date }}"
                                                        style="border:none;padding-left:10px;"></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <input type="hidden" name="iaf_id" id="iaf_id"
                                        value="{{ $Assesment_form->id }}">

                                    @if (($Assesment_form->cur_round ?? '') == 3)
                                        <div class="form-row" style="padding-top:10px;padding-left:10px;">
                                            <label for="input1">Mode of Interview:</label>
                                            <input type="text" value="{{ $Assesment_form->interview_mode }}">
                                            @if (($Assesment_form->interview_mode ?? '') == 'Link')
                                                <label for="input2">Link:</label>
                                                <input type="text" value="{{ $Assesment_form->interview_link }}">
                                            @endif
                                            <label for="input3">Status:</label>
                                            {{-- <input type="text" id="input3" name="input3"
                                                value="{{ $status[$Assesment_form->status] }}"> --}}
                                            <div class="dropdown action-label mr-5">
                                                <select id="status_{{ $Assesment_form->id }}" name="status"
                                                    class="form-select btn btn-white btn-sm btn-rounded "
                                                    aria-label="Default select example"  >
                                                    @foreach ($status as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ $Assesment_form->status == $key ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        @role('ceo')
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit"
                                                        class="btn btn-success waves-effect waves-light">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-danger waves-effect m-l-5">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        @endrole
                                    @endif


                                </form>
                                <br>
                                <br>
                            @endif

                            @if (($Assesment_form->cur_round ?? '') >= 4)
                                @role(['hr', 'hr manager'])
                                    <form action="{{ url('salarydetailsform') }}" method="POST">
                                        @csrf
                                        <h2>To be filled by HR</h2>
                                        <div class="designation" style="display:flex;">
                                            <label for="designation" style="padding-left:350px;"><b>Hired
                                                    Designation:</b></label>
                                            <input type="text" id="designation" name="designation"
                                                value= "{{ $salaryform->designation ?? '' }}" 
                                                style="border:none;width:30%;height:10%;border-bottom: 1px solid black;">
                                        </div>

                                        <h4 style="padding-top:30px;padding-bottom:10px;">Salary Details</h4>
                                        <table class="salary-table">
                                            <tr>
                                                <td><label for="details"><b>Break-up Details</b></label></td>
                                                <td><label for="amount"><b>Amount</b></label></td>
                                            </tr>
                                            <tr>
                                                <input type="hidden" name="iaf_id" id="iaf_id"
                                                    value="{{ $Assesment_form->id }}">
                                                <td><label for="grossSalary">Gross Salary</label></td>
                                                <td><input type="number" id="grossSalary" name="grossSalary"
                                                        value= "{{ $salaryform->grossSalary ?? '' }}" min="0" 
                                                        style="border:none;"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="providentfund">Provident Fund</label></td>
                                                <td><input type="number" id="providentfund" name="providentfund"
                                                        value= "{{ $salaryform->providentfund ?? '' }}" min="0" 
                                                        style="border:none;"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="esic">ESIC</label></td>
                                                <td><input type="number" id="esic" name="esic" min="0"
                                                        value= "{{ $salaryform->esic ?? '' }}"  style="border:none;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label for="professionaltax">Professional Tax</label></td>
                                                <td><input type="number" id="professionaltax" name="professionaltax"
                                                        value= "{{ $salaryform->professionaltax ?? '' }}" min="0"
                                                         style="border:none;"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="deposit">Deposit (Applicable only for first 11
                                                        months)</label>
                                                </td>
                                                <td><input type="number" id="deposit" name="deposit" min="0"
                                                        value= "{{ $salaryform->deposit ?? '' }}" 
                                                        style="border:none;"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="netSalary">Net Salary:</label></td>
                                                <td><input type="number" id="netSalary" name="netSalary"
                                                        value= "{{ $salaryform->netSalary ?? '' }}" 
                                                        style="border:none;"></td>
                                            </tr>
                                        </table>

                                        <div class="doj" style="padding-top:10px;">
                                            <label for="doj"><b>Date of Joining:</b>
                                                <input type="date" id="doj" name="doj"
                                                    value= "{{ $salaryform->doj ?? '' }}" style="border:none;"></label>
                                        </div>

                                        <input type="hidden" name="iaf_id" id="iaf_id"
                                            value="{{ $Assesment_form->id }}">

                                        @if (($Assesment_form->cur_round ?? '') == 4)
                                            <div class="dropdown action-label mr-5 mb-3">
                                                <label for="input3">Status:</label>
                                                <select id="status_{{ $Assesment_form->id }}" name="status"
                                                    class="form-select btn btn-white btn-sm btn-rounded w-auto"
                                                    aria-label="Default select example"  >
                                                    @foreach ($status as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ $Assesment_form->status == $key ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <input type="hidden" name="interview_sec" value="all_interview">

                                            <div class="form-group">
                                                <div>
                                                    <button type="submit"
                                                        class="btn btn-success waves-effect waves-light">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-danger waves-effect m-l-5">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </form>
                                    <br>
                                    <br>
                                @endrole
                            @endif

                            {{-- @if (($Assesment_form->cur_round ?? '') >= '1')
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger waves-effect m-l-5">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                @endif --}}

                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
