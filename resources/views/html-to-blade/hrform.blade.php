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
                            <form method="POST" action="{{ route('form-store') }}" enctype="multipart/form-data">
                                @csrf
                                <h2>Interview Assessment Form</h2>

                                <label for="candidateName">Candidate Name:</label>
                                <input type="text" id="candidateName" name="candidateName" value="{{ $Assesment_form->candidateName }}" required>

                                <label for="phone">Contact no:</label>
                                <input type="text" id="phone" name="phone" value="{{ $Assesment_form->phone }}" required>

                                <label for="email">Email Address:</label>
                                <input type="text" id="email" name="email" value="{{ $Assesment_form->email }}" required>

                                <label for="source">Source:</label>
                                <select id="source" name="source" onchange="handleSourceChange()" required>
                                    <option value="HR" {{ $Assesment_form->source == 'HR' ? 'selected' : '' }}>HR
                                    </option>
                                    <option value="Walkin" {{ $Assesment_form->source == 'Walkin' ? 'selected' : '' }}>
                                        Walkin</option>
                                    <option value="Reference" {{ $Assesment_form->source == 'Reference' ? 'selected' : '' }}>Reference
                                    </option>
                                    <option value="Social Site" {{ $Assesment_form->source == 'Social Site' ? 'selected' : '' }}>Social Site
                                    </option>
                                    <option value="other" {{ $Assesment_form->source == 'other' ? 'selected' : '' }}>
                                        Others</option>
                                </select>

                                <div id="referral-textbox">
                                    <label for="referenceSource">Name of Referral:</label>
                                    <input type="text" id="referencename" name="referencename" value="{{ $Assesment_form->referencename }}">
                                    <label for="referenceSource">Contact no of Referral:</label>
                                    <input type="text" id="referencecontact" name="referencecontact" value="{{ $Assesment_form->referencecontact }}">
                                </div>

                                <div id="others-textbox">
                                    <label for="otherSource">Other Source:</label>
                                    <input type="text" id="otherSource" name="otherSource" value="{{ $Assesment_form->otherSource }}">
                                </div>

                                <label for="education">Qualification:</label>
                                <select id="education" name="education" required>
                                    <option value="SSC" {{ $Assesment_form->education == 'SSC' ? 'selected' : '' }}>
                                        SSC</option>
                                    <option value="HSC" {{ $Assesment_form->education == 'HSC' ? 'selected' : '' }}>
                                        HSC</option>
                                    <option value="Undergraduate"
                                        {{ $Assesment_form->education == 'Undergraduate' ? 'selected' : '' }}>
                                        Undergraduate</option>
                                    <option value="Graduate" {{ $Assesment_form->education == 'Graduate' ? 'selected' : '' }}>Graduate
                                    </option>
                                    <option value="Masters" {{ $Assesment_form->education == 'Masters' ? 'selected' : '' }}>Masters
                                    </option>
                                    <option value="PG" {{ $Assesment_form->education == 'PG' ? 'selected' : '' }}>
                                        PG</option>
                                    <option value="Others" {{ $Assesment_form->education == 'Others' ? 'selected' : '' }}>Others</option>
                                </select>

                                <label for="position">Applied Position :</label>
                                <input type="text" id="position" name="position" value="{{ $Assesment_form->position }}" required>

                                <label for="experienceType">Experience Type:</label>
                                <select id="experienceType" name="experienceType" required>
                                    <option value="fresher" {{ $Assesment_form->experienceType == 'fresher' ? 'selected' : '' }}>Fresher
                                    </option>
                                    <option value="experienced" {{ $Assesment_form->experienceType == 'experienced' ? 'selected' : '' }}>
                                        Experienced</option>
                                </select>

                                <label for="experience">Total Years of Experience:</label>
                                <input type="number" id="experience" name="experience" min="0" value="{{ $Assesment_form->experience }}" required>

                                <label for="profile">What do you know about the Job Profile?:</label>
                                <input type="text" id="jobprofile" name="jobprofile" value="{{ $Assesment_form->jobprofile }}" required>

                                <label for="rotationalShifts">Rotational Shifts: </label>
                                <input type="radio" name="rotationalShifts" value="Yes"
                                    {{ ($Assesment_form->rotationalShifts ?? '') == 'Yes' ? 'checked' : '' }} required>
                                Yes
                                <input type="radio" name="rotationalShifts" value="No"
                                    {{ ($Assesment_form->rotationalShifts ?? '') == 'No' ? 'checked' : '' }} required>
                                No

                                <br>
                                <label for="callingPreference">Calling Preference: </label>
                                <input type="radio" name="callingPreference" value=" Inbound" {{ $Assesment_form->callingPreference == 'Inbound' ? 'checked' : '' }} required>
                                Inbound
                                <input type="radio" name="callingPreference" value=" Outbound"
                                    {{ $Assesment_form->callingPreference == 'Outbound' ? 'checked' : '' }} required>
                                Outbound

                                <br>
                                <label for="status">Current Employment Status:</label>
                                <input type="text" id="emp_status" name="emp_status" value="{{ $Assesment_form->emp_status }}" required>

                                <label for="emp_name">Current Employer Name:</label>
                                <input type="text" id="emp_name" name="emp_name" value="{{ $Assesment_form->emp_name }}">

                                <label for="currentdesignation">Current Designation:</label>
                                <input type="text" id="currentdesignation" name="currentdesignation" value="{{ $Assesment_form->currentdesignation }}">

                                <label for="currentSalary">Current CTC:</label>
                                <input type="number" id="currentSalary" name="currentSalary" min="0" value="{{ $Assesment_form->currentSalary }}">

                                <label for="expectedSalary">Expected CTC:</label>
                                <input type="number" id="expectedSalary" name="expectedSalary" min="0" value="{{ $Assesment_form->expectedSalary }}" required>

                                <label for="references">References:</label>
                                <table class="hr-comments-table">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Contact Number</th>
                                    </tr>
                                    @foreach ($Assesment_form->emp_reference as $key => $value)
                                        <tr>
                                            <td><input type="text" id="reference" name="emp_reference"
                                                    value="{{ $key }}"></td>
                                            <td><input type="text" id="reference" name="emp_reference_no"
                                                    value="{{ $value }}"></td>
                                        </tr>
                                    @endforeach
                                    {{-- <tr>
                                     <td><input type="text" id="reference" name="emp_reference1"  value="{{ $Assesment_form->emp_reference1 }}"></td>

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
                            <br><br>

                            <br>
                            <form action="{{ url('/hrform') }}" method="POST">
                                @csrf
                                <h2>HR Round</h2>
                                <!-- <h5> HR Round </h5> -->

                                <div class="form-row" style="padding-top:10px;padding-left:10px;">
                                    <label for="input1">Mode of Interview:</label>
                                    <input type="text" value="{{ $Assesment_form->interview_mode }}">
                                    @if (($Assesment_form->interview_mode ?? '') == 'Link')
                                    <label for="input2">Link:</label>
                                    <input type="text" value="{{ $Assesment_form->interview_link }}">
                                    @endif
                                    <label for="input3">Status:</label>
                                    <input type="text" value="{{ $status[$Assesment_form->status] }}">
                                </div>

                                <table class="hr-comments-table">
                                    <tr>
                                        <th>Strengths</th>
                                        <th>Weaknesses</th>
                                    </tr>
                                    <tr>

                                        <td>
                                            <textarea id="strengths" name="strengths" rows="5" required> {{ $Assesment_form->strengths }} </textarea>
                                        </td>
                                        <td>
                                            <textarea id="weaknesses" name="weaknesses" rows="5" required> {{ $Assesment_form->weaknesses }} </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <input type="hidden" name="iaf_id" id="iaf_id" value="{{ $Assesment_form->id }}">
                                        <td>
                                            <textarea id="hr_name" name="hr_name" rows="1"> Name: {{ $Assesment_form->hr_name }}   </textarea>
                                        </td>
                                        <td> Date :<input type="date" id="inthr_date" name="inthr_date"
                                                value="{{ $Assesment_form->inthr_date }}" required
                                                style="border:none;padding-left:10px;"></td>
                                    </tr>
                                </table>
                                <br>
                                <br>

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
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layouts.app>
