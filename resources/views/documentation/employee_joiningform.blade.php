<x-layouts.app>
    @section('title', 'employee joining form')
    @section('page-level-style')
        <style>
            h4 {
                text-align: center;
                padding-bottom: 10px;
                padding-top: 20px;
            }

            h5 {
                text-align: center;
                padding-bottom: 10px;
                padding-top: 20px;
            }
        </style>
    @endsection

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Employee Joining Form</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}/index">Dashboard</a></li>
                            <li class="breadcrumb-item active">Joining Form</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul id="validation_errors">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4> TO BE FILLED BY CANDIDATE</h4>
                            <form method="POST" action="{{ url('documentation/employee-joining-store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap edit-img" id="profile_picPreview">
                                            <img class="inline-block"
                                                src="{{ $emp_info->profile_pic ? asset("storage/$emp_info->profile_pic") : asset('assets/img/profiles/noimg.png') }}"
                                                id="profile_picImage" alt="user">
                                            <!-- <input class="upload" id="profile_pic" name="profile_pic" type="file"> -->
                                            <div class="fileupload btn">
                                                <span class="btn-text">edit</span>
                                                <input class="upload" id="profile_pic" name="profile_pic" type="file"
                                                    onchange="previewprofile_pic(event)">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" id="full_name"
                                                        name="full_name" value="{{ $emp_info->full_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date of Joining</label>
                                                    <div class="cal-icon">
                                                        <input class="form-control datetimepicker" type="text"
                                                            id="doj" name="doj" value="{{ $emp_info->doj }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Birth Date</label>
                                                    <div class="cal-icon">
                                                        <input class="form-control datetimepicker" type="text"
                                                            id="dob" name="dob" value="{{ $emp_info->dob }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <input type="text" class="form-control" id="mobile_no"
                                                        name="mobile_no" value="{{ $emp_info->mobile_no }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Gender</label><br>
                                                <div class="custom-file position-relative">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="male" name="gender"
                                                            class="form-check-input" value="male"
                                                            {{ $emp_info->gender == 'male' ? 'checked' : '' }}>
                                                        <label for="male" class="form-check-label">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="female" name="gender"
                                                            class="form-check-input" value="female"
                                                            {{ $emp_info->gender == 'female' ? 'checked' : '' }}>
                                                        <label for="female" class="form-check-label">Female</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Permanent Address (as per address proof)</label>
                                            <input type="text" class="form-control" id="permanent_address"
                                                name="permanent_address" value="{{ $emp_info->permanent_address }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Current Address (as per address proof)</label>
                                            <input type="text" class="form-control" id="current_address"
                                                name="current_address" value="{{ $emp_info->current_address }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Current Address Proof Document</label>
                                        <div class="custom-file position-relative">
                                            <label class="custom-file-label" for="current_address_document">Choose
                                                File</label>
                                            <input class="custom-file-input" type="file"
                                                id="current_address_document" name="current_address_document">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Nationality</label>
                                            <input type="text" class="form-control" id="nationality"
                                                name="nationality" value="{{ $emp_info->nationality }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>State </label>
                                            <input type="text" class="form-control" id="state" name="state"
                                                value="{{ $emp_info->state }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>City </label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                value="{{ $emp_info->city }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Religion </label>
                                            <input type="text" class="form-control" id="religion"
                                                name="religion" value="{{ $emp_info->religion }}">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email ID</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $emp_info->email }}">
                                </div>
                        </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Personal Email ID</label>
                                            <input type="email" class="form-control" id="personal_email"
                                                name="personal_email" value="{{ $emp_info->personal_email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Marital status <span class="text-danger">*</span></label>
                                            <select class="select form-control" id="marital_status"
                                                name="marital_status">
                                                <option>Select</option>
                                                <option value="Single"
                                                    {{ $emp_info->marital_status == 'Single' ? 'selected' : '' }}>
                                                    Single</option>
                                                <option value="Married"
                                                    {{ $emp_info->marital_status == 'Married' ? 'selected' : '' }}>
                                                    Married</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Physically Challenged</label>
                                            <input type="text" class="form-control" id="physically_challenged"
                                                name="physically_challenged"
                                                value="{{ $emp_info->physically_challenged }}">
                                        </div>
                                    </div>
                                </div>

                                <h4> EMERGENCY CONTACT DETAILS</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="relation_name"
                                                name="relation_name" value="{{ $emp_info->relation_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Relation</label>
                                            <input type="text" class="form-control" id="relation"
                                                name="relation" value="{{ $emp_info->relation }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number </label>
                                            <input type="text" class="form-control" id="relation_phone_no"
                                                name="relation_phone_no" value="{{ $emp_info->relation_phone_no }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number 2</label>
                                            <input type="text" class="form-control" id="relation_phone_no1"
                                                name="relation_phone_no1"
                                                value="{{ $emp_info->relation_phone_no1 }}">
                                        </div>
                                    </div>
                                </div>

                                <h4> AADHAR CARD DETAIL’S</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Aadhar Card Number</label>
                                            <input type="text" class="form-control" id="aadhar_number"
                                                name="aadhar_number" value="{{ $emp_info->aadhar_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Aadhar Card Name</label>
                                            <input type="text" class="form-control" id="aadhar_name"
                                                name="aadhar_name" value="{{ $emp_info->aadhar_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="" for="">Upload Aadhar Card</label>
                                        <div class="custom-file position-relative">
                                            <label class="custom-file-label" for="upload_aadhar_card">Choose
                                                File</label>
                                            <input class="custom-file-input" type="file" id="upload_aadhar_card"
                                                name="upload_aadhar_card">
                                        </div>
                                    </div>
                                </div>

                                <h4>PAN CARD DETAIL’S</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Pan Number</label>
                                            <input type="text" class="form-control" id="pan_number"
                                                name="pan_number" value="{{ $emp_info->pan_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Pan Name</label>
                                            <input type="text" class="form-control" id="pan_name"
                                                name="pan_name" value="{{ $emp_info->pan_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Upload Pan card</label>
                                        <div class="custom-file position-relative">
                                            <label class="custom-file-label" for="upload_pan_card">Choose File</label>
                                            <input class="custom-file-input" type="file" id="upload_pan_card"
                                                name="upload_pan_card">
                                        </div>
                                    </div>
                                </div>

                                <h4>QUALIFICATION DETAIL’S</h4>
                                <div class="form-scroll">
                                    <div id="qualification_cards">
                                        @unless ($emp_info->qualification_details)
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="card-title">
                                                        <button onclick="delete_qualification_card(event,this)"
                                                            class="delete-icon btn "><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Degree</label>
                                                                <input type="text" class="form-control" id="degree"
                                                                    name="degree[]" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>University/Institute </label>
                                                                <input type="text" class="form-control"
                                                                    id="university" name="university[]" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>From</label>
                                                                <div class="cal-icon">
                                                                    <input class="form-control datetimepicker"
                                                                        type="text" id="degree_from"
                                                                        name="degree_from[]" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>To</label>
                                                                <div class="cal-icon">
                                                                    <input class="form-control datetimepicker"
                                                                        type="text" id="degree_to" name="degree_to[]"
                                                                        value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Percentage/Grade</label>
                                                                <input type="text" class="form-control"
                                                                    id="percentage" name="percentage[]" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Specialization</label>
                                                                <input type="text" class="form-control"
                                                                    id="specialization" name="specialization[]"
                                                                    value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Upload Certificate</label>
                                                            <div class="custom-file position-relative">
                                                                <label class="custom-file-label"
                                                                    for="upload_certificate">Choose File</label>
                                                                <input class="form-control" type="file"
                                                                    id="upload_certificate" name="upload_certificate[]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endunless
                                        @foreach ($emp_info->qualification_details ?? [] as $item)
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="card-title">
                                                        <button onclick="delete_qualification_card(event,this)"
                                                            class="delete-icon btn "><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </h3>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Degree</label>
                                                                <input type="text" class="form-control"
                                                                    id="degree" name="degree[]"
                                                                    value="{{ $item['degree'] ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>University/Institute </label>
                                                                <input type="text" class="form-control"
                                                                    id="university" name="university[]"
                                                                    value="{{ $item['university'] ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>From</label>
                                                                <div class="cal-icon">
                                                                    <input class="form-control datetimepicker"
                                                                        type="text" id="degree_from"
                                                                        name="degree_from[]"
                                                                        value="{{ $item['degree_from'] ?? '' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>To</label>
                                                                <div class="cal-icon">
                                                                    <input class="form-control datetimepicker"
                                                                        type="text" id="degree_to"
                                                                        name="degree_to[]"
                                                                        value="{{ $item['degree_to'] ?? '' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Percentage/Grade</label>
                                                                <input type="text" class="form-control"
                                                                    id="percentage" name="percentage[]"
                                                                    value="{{ $item['percentage'] ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Specialization</label>
                                                                <input type="text" class="form-control"
                                                                    id="specialization" name="specialization[]"
                                                                    value="{{ $item['specialization'] ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Upload Certificate</label>
                                                            <div class="custom-file position-relative">
                                                                <label class="custom-file-label"
                                                                    for="upload_certificate">Choose File</label>
                                                                <input class="form-control" type="file"
                                                                    id="upload_certificate"
                                                                    name="upload_certificate[]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="add-more">
                                        <button class="btn btn-info" onclick="add_qualification_card(event)"><i
                                                class="fa fa-plus-circle"></i> Add
                                            More</button>
                                    </div>
                                </div>

                                <h4>CANDIDATE TYPE</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CANDIDATE TYPE</label>
                                            <select class="select form-control" id="candidate_type"
                                                name="candidate_type">
                                                <option value="Selecte Candidate Type"
                                                    {{ $emp_info->candidate_type == 'Selecte Candidate Type' ? 'selected' : '' }}>
                                                    Selecte Candidate Type</option>
                                                <option value="Fresher Candidate"
                                                    {{ $emp_info->candidate_type == 'Fresher Candidate' ? 'selected' : '' }}>
                                                    Fresher Candidate</option>
                                                <option value="Experienced Candidate"
                                                    {{ $emp_info->candidate_type == 'Experienced Candidate' ? 'selected' : '' }}>
                                                    Experienced Candidate</option>
                                                <option value="International Employee"
                                                    {{ $emp_info->candidate_type == 'International Employee' ? 'selected' : '' }}>
                                                    International Employee</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <h4>PASSPORT DETALI’S (mandatory for international employees)</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Passport Number</label>
                                            <input type="text" class="form-control" id="passport_number"
                                                name="passport_number" value="{{ $emp_info->passport_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Passport Valid From</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text"
                                                    id="passport_valid_from" name="passport_valid_from"
                                                    value="{{ $emp_info->passport_valid_from }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Passport Valid To</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text"
                                                    id="passport_valid_to" name="passport_valid_to"
                                                    value="{{ $emp_info->passport_valid_to }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Visa Number</label>
                                            <input type="text" class="form-control" id="visa_number"
                                                name="visa_number" value="{{ $emp_info->visa_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Visa Valid From</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text"
                                                    id="visa_valid_from" name="visa_valid_from"
                                                    value="{{ $emp_info->visa_valid_from }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Visa Valid To</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text"
                                                    id="visa_valid_to" name="visa_valid_to"
                                                    value="{{ $emp_info->visa_valid_to }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Native Country</label>
                                            <input type="text" class="form-control" id="native_country"
                                                name="native_country" value="{{ $emp_info->native_country }}">
                                        </div>
                                    </div>
                                </div>

                                <h4> PREVIOUS ORGANIZATION DETAIL’S(for experienced candidates) </h4>

                                <div class="form-scroll">
                                    <div id="last_organization_card">
                                        @if (!$emp_info->last_organization_details)
                                            <div class="card">
                                                <div class="card-body">

                                                    <h5 class="card-title"> Last Organization Detail’s
                                                        <button onclick="delete_last_organization_card(event,this)"
                                                            class="delete-icon btn"><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Organization Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="organization_name" name="organization_name[]"
                                                                    value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Designation</label>
                                                                <input type="text" class="form-control"
                                                                    id="" name="p_o_designation[]"
                                                                    value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Location</label>
                                                                <input type="text" class="form-control"
                                                                    id="organization_name" name="p_o_location[]"
                                                                    value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>DOJ</label>
                                                                <div class="cal-icon">
                                                                    <input class="form-control datetimepicker"
                                                                        type="text" id="organization_doj"
                                                                        name="organization_doj[]" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Reliving Date</label>
                                                                <div class="cal-icon">
                                                                    <input class="form-control datetimepicker"
                                                                        type="text" id="reliving_date"
                                                                        name="reliving_date[]" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Reason of Leaving </label>
                                                                <input type="text" class="form-control"
                                                                    id="reason_of_leaving" name="reason_of_leaving[]"
                                                                    value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Reporting Manager Name</label>

                                                                <input type="text" class="form-control"
                                                                    id="reporting_manager_name"
                                                                    name="reporting_manager_name[]" value="">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Reporting Manager Number</label>

                                                                <input type="text" class="form-control"
                                                                    id="reporting_manager_no"
                                                                    name="reporting_manager_no[]" value="">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Reporting Manager Email ID</label>
                                                                <input type="email" class="form-control"
                                                                    id="reporting_manager_email"
                                                                    name="reporting_manager_email[]" value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>HR Name</label>

                                                                <input type="text" class="form-control"
                                                                    id="p_o_hr_name" name="p_o_hr_name[]"
                                                                    value="">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>HR Number</label>

                                                                <input type="text" class="form-control"
                                                                    id="reporting_hr_no" name="reporting_hr_no[]"
                                                                    value="">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>HR Email ID</label>
                                                                <input type="email" class="form-control"
                                                                    id="reporting_hr_email"
                                                                    name="reporting_hr_email[]" value="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="" for="">Experience
                                                                Letter</label>
                                                            <div class="custom-file position-relative">
                                                                <label class="custom-file-label"
                                                                    for="upload_experience_letter">Choose File</label>
                                                                <input class="custom-file-input" type="file"
                                                                    id="upload_experience_letter"
                                                                    name="upload_experience_letter[]">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @foreach ($emp_info->last_organization_details ?? [] as $item)
                                            <div class="card">
                                                <div class="card-body">

                                                    <h5 class="card-title"> Last Organization Detail’s
                                                        <button onclick="delete_last_organization_card(event,this)"
                                                            class="delete-icon btn"><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Organization Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="organization_name" name="organization_name[]"
                                                                    value="{{ $item->organization_name ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Designation</label>
                                                                <input type="text" class="form-control"
                                                                    id="" name="p_o_designation[]"
                                                                    value="{{ $item->p_o_designation ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Location</label>
                                                                <input type="text" class="form-control"
                                                                    id="organization_name" name="p_o_location[]"
                                                                    value="{{ $item->p_o_location ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>DOJ</label>
                                                                <div class="cal-icon">
                                                                    <input class="form-control datetimepicker"
                                                                        type="text" id="organization_doj"
                                                                        name="organization_doj[]"
                                                                        value="{{ $item->organization_doj ?? '' }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Reliving Date</label>
                                                                <div class="cal-icon">
                                                                    <input class="form-control datetimepicker"
                                                                        type="text" id="reliving_date"
                                                                        name="reliving_date[]"
                                                                        value="{{ $item->reliving_date ?? '' }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Reason of Leaving </label>
                                                                <input type="text" class="form-control"
                                                                    id="reason_of_leaving" name="reason_of_leaving[]"
                                                                    value="{{ $item->reason_of_leaving ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Reporting Manager Name</label>

                                                                <input type="text" class="form-control"
                                                                    id="reporting_manager_name"
                                                                    name="reporting_manager_name[]"
                                                                    value="{{ $item->reporting_manager_name ?? '' }}">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Reporting Manager Number</label>

                                                                <input type="text" class="form-control"
                                                                    id="reporting_manager_no"
                                                                    name="reporting_manager_no[]"
                                                                    value="{{ $item->reporting_manager_no ?? '' }}">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Reporting Manager Email ID</label>
                                                                <input type="email" class="form-control"
                                                                    id="reporting_manager_email"
                                                                    name="reporting_manager_email[]"
                                                                    value="{{ $item->reporting_manager_email ?? '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>HR Name</label>

                                                                <input type="text" class="form-control"
                                                                    id="p_o_hr_name" name="p_o_hr_name[]"
                                                                    value="{{ $item->p_o_hr_name ?? '' }}">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>HR Number</label>

                                                                <input type="text" class="form-control"
                                                                    id="reporting_hr_no" name="reporting_hr_no[]"
                                                                    value="{{ $item->reporting_hr_no ?? '' }}">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>HR Email ID</label>
                                                                <input type="email" class="form-control"
                                                                    id="reporting_hr_email"
                                                                    name="reporting_hr_email[]"
                                                                    value="{{ $item->reporting_hr_email ?? '' }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="" for="">Experience
                                                                Letter</label>
                                                            <div class="custom-file position-relative">
                                                                <label class="custom-file-label"
                                                                    for="upload_experience_letter">Choose File</label>
                                                                <input class="custom-file-input" type="file"
                                                                    id="upload_experience_letter"
                                                                    name="upload_experience_letter[]">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="add-more">
                                        <button class="btn btn-info" onclick="add_last_organization_card(event)"><i
                                                class="fa fa-plus-circle"></i> Add
                                            More</button>
                                    </div>
                                </div><br>

                                <h4>PF DETAIL’S</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>PF Number (experienced candidate)</label>
                                            <input type="text" class="form-control" id="pf-number"
                                                name="pf_number" value="{{ $emp_info->pf_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>UAN Number (experienced candidate)</label>
                                            <input type="text" class="form-control" id="uan-number"
                                                name="uan_number" value="{{ $emp_info->uan_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Father’s Name</label>
                                            <input type="text" class="form-control" id="father_name"
                                                name="father_name" value="{{ $emp_info->father_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Spouse’s Name </label>
                                            <input type="text" class="form-control" id="spouse_name"
                                                name="spouse_name" value="{{ $emp_info->spouse_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nominee</label>
                                            <input type="text" class="form-control" id="nominee_name"
                                                name="nominee_name" value="{{ $emp_info->nominee_name }}">
                                        </div>
                                    </div>
                                </div>

                                <h4>BANK ACCOUNT DETAIL’S</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <input type="text" class="form-control" id="bank_name"
                                                name="bank_name" value="{{ $emp_info->bank_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input type="text" class="form-control" id="bank_acc_no"
                                                name="bank_acc_no" value="{{ $emp_info->bank_acc_no }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>IFSC Code</label>
                                            <input type="text" class="form-control" id="ifsc_code"
                                                name="ifsc_code" value="{{ $emp_info->ifsc_code }}">
                                        </div>
                                    </div>

                                </div>

                                <h4>ESIC DETAIL’S</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ESIC / IP Number</label>
                                            <input type="text" class="form-control" id="esic_no" name="esic_no"
                                                value="{{ $emp_info->esic_no }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nominee Name</label>
                                            <input type="text" class="form-control" id="esic_nominee_name"
                                                name="esic_nominee_name" value="{{ $emp_info->esic_nominee_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Relation With Nominee</label>
                                            <input type="text" class="form-control" id="relation_nominee_name"
                                                name="relation_nominee_name"
                                                value="{{ $emp_info->relation_nominee_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Is Nominee residing with you</label>
                                            <input type="text" class="form-control" id="nominee_residing"
                                                name="nominee_residing" value="{{ $emp_info->nominee_residing }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nominee’s Date Of Birth</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text"
                                                    id="nominee_dob" name="nominee_dob"
                                                    value="{{ $emp_info->nominee_dob }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nominee’s Aadhar Card Number</label>
                                            <input type="text" class="form-control" id="nominee_aadhar_no"
                                                name="nominee_aadhar_no" value="{{ $emp_info->nominee_aadhar_no }}">
                                        </div>
                                    </div>
                                </div>

                                @role(['hr', 'hr manager'])

                                <h4>TO BE FILLED BY HR</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Emp Code</label>
                                            <input type="text" class="form-control" id="emp_code"
                                                name="emp_code" value="{{ $emp_info->emp_code }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Shift</label>
                                            <input type="text" class="form-control" id="emp_shift"
                                                name="emp_shift" value="{{ $emp_info->emp_shift }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>DOJ</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text"
                                                    id="joining_date" name="joining_date"
                                                    value="{{ $emp_info->joining_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department</label>
                                            <input type="text" class="form-control" id="department_id"
                                                name="department_id" value="{{ $emp_info->department_id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" id="designation_id"
                                                name="designation_id" value="{{ $emp_info->designation_id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Probation Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text"
                                                    id="probation_date" name="probation_date"
                                                    value="{{ $emp_info->probation_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Evaluation Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text"
                                                    id="evaluation_date" name="evaluation_date"
                                                    value="{{ $emp_info->evaluation_date }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Employee Type</label>
                                            <select class="select form-control" name="employee_type">
                                                <option>Select</option>
                                                <option value="Permanent"
                                                    {{ $emp_info->employee_type == 'Permanent' ? 'selected' : '' }}>
                                                    Permanent</option>
                                                <option value="Part time"
                                                    {{ $emp_info->employee_type == 'Part time' ? 'selected' : '' }}>
                                                    Part time</option>
                                                <option value="Fresher"
                                                    {{ $emp_info->employee_type == 'Fresher' ? 'selected' : '' }}>
                                                    Fresher</option>
                                                <option value="Experienced"
                                                    {{ $emp_info->employee_type == 'Experienced' ? 'selected' : '' }}>
                                                    Experienced</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <h4>DOCUMENTS SUBMITTED</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Selection Letter</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="selection_letter" value="1" id="selection_letter"
                                                    {{ $emp_info->selection_letter == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="yesSelectionLetter">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="selection_letter" value="0" id="selection_letter"
                                                        {{ $emp_info->selection_letter == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="noSelectionLetter">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>10th Certificate</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="certificate_10th" value="1" id="certificate_10th"
                                                    {{ $emp_info->certificate_10th == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="yes10thCertificate">Yes</label>

                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="certificate_10th" value="0" id="certificate_10th"
                                                        {{ $emp_info->certificate_10th == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="no10thCertificate">No</label>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>12th Certificate</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="certificate_12th" value="1" id="certificate_12th"
                                                    {{ $emp_info->certificate_12th == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="yes12thCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="certificate_12th" value="0" id="certificate_12th"
                                                        {{ $emp_info->certificate_12th == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="no12thCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Diploma Certificate</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="diploma_certificate" value="1"
                                                    id="diploma_certificate"
                                                    {{ $emp_info->diploma_certificate == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="yesDiplomaCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="diploma_certificate" value="0"
                                                        id="diploma_certificate"
                                                        {{ $emp_info->diploma_certificate == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="noDiplomaCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Graduation Certificate Certificate</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="graduation_certificate" value="1"
                                                    id="graduation_certificate"
                                                    {{ $emp_info->graduation_certificate == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="yesgraduationCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="graduation_certificate" value="0"
                                                        id="graduation_certificate"
                                                        {{ $emp_info->graduation_certificate == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="nograduationCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Post-Graduation Certificate</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="post_certificate" value="1" id="post_certificate"
                                                    {{ $emp_info->post_certificate == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="yespostCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="post_certificate" value="0" id="post_certificate"
                                                        {{ $emp_info->post_certificate == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="nopostCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Aadhar Card</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="aadhar_card"
                                                    value="1" id="aadhar_card"
                                                    {{ $emp_info->aadhar_card == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="yesDiplomaCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio" name="aadhar_card"
                                                        value="0" id="aadhar_card"
                                                        {{ $emp_info->aadhar_card == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="noDiplomaCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>PAN Card</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pan_card"
                                                    value="1" id="pan_card"
                                                    {{ $emp_info->pan_card == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="yesDiplomaCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio" name="pan_card"
                                                        value="0" id="pan_card"
                                                        {{ $emp_info->pan_card == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="noDiplomaCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Permanent Address Proof</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="pre_address_proof" value="1" id="pre_address_proof"
                                                    {{ $emp_info->pre_address_proof == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="yesDiplomaCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="pre_address_proof" value="0"
                                                        id="pre_address_proof"
                                                        {{ $emp_info->pre_address_proof == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="noDiplomaCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Current Address Proof</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="curr_address_proof" value="1" id="curr_address_proof"
                                                    {{ $emp_info->curr_address_proof == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="yesDiplomaCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="curr_address_proof" value="0"
                                                        id="curr_address_proof"
                                                        {{ $emp_info->curr_address_proof == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="noDiplomaCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Passport(Mandatory for international employees)</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="passport"
                                                    value="1" id="passport"
                                                    {{ $emp_info->passport == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="yesDiplomaCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio" name="passport"
                                                        value="0" id="passport"
                                                        {{ $emp_info->passport == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="noDiplomaCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Driving License(Optional)</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="driving_license" value="1" id="driving_license"
                                                    {{ $emp_info->driving_license == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="yesDiplomaCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="driving_license" value="0" id="driving_license"
                                                        {{ $emp_info->driving_license == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="noDiplomaCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Voter ID(Optional)</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="voter_id"
                                                    value="1" id="voter_id"
                                                    {{ $emp_info->voter_id == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="yesDiplomaCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio" name="voter_id"
                                                        value="0" id="voter_id"
                                                        {{ $emp_info->voter_id == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="noDiplomaCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Repeat the above structure for other documents -->

                                </div>


                                <h4>Only for Experienced Candidate</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Offer Letter</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="has_offer_letter" value="1" id="has_offer_letter"
                                                    {{ $emp_info->has_offer_letter == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="yesSelectionLetter">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="has_offer_letter" value="0"
                                                        id="has_offer_letter"  {{ $emp_info->has_offer_letter == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="noSelectionLetter">No</label>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Experience Letter</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="experience_letter" value="1"
                                                    id="experience_letter" {{ $emp_info->has_offer_letter == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="yes10thCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="experience_letter" value="0"
                                                        id="experience_letter" {{ $emp_info->has_offer_letter == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="no10thCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Relining Letter</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="relinige_letter" value="1" id="relinige_letter" {{ $emp_info->relinige_letter == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="yes12thCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="relinige_letter" value="0"
                                                        id="relinige_letter" {{ $emp_info->relinige_letter == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="no12thCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Bank Statements</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="bank_statement" value="1" id="bank_statement" {{ $emp_info->bank_statement == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="yesDiplomaCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="bank_statement" value="0" id="bank_statement" {{ $emp_info->bank_statement == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="noDiplomaCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Salary Slips(Last 3 Months)</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="salary_slips"
                                                    value="1" id="salary_slips" {{ $emp_info->salary_slips == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="yesgraduationCertificate">Yes</label>
                                                <span style="margin-left: 30px;">
                                                    <input class="form-check-input" type="radio"
                                                        name="salary_slips" value="0" id="salary_slips" {{ $emp_info->salary_slips == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="nograduationCertificate">No</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <h4>PF DETAIL’S</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>PF Number</label>
                                            <input type="text" class="form-control" name="new_pf_number" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>UAN Number</label>
                                            <input type="text" class="form-control" name="new_uan_number" value="">
                                        </div>
                                    </div>
                                </div> -->

                                <h4>SALARY DETAIL’S</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Monthly Gross</label>
                                            <input type="text" class="form-control" name="monthly_gross"
                                             value="{{ $emp_info->monthly_gross }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Monthly Net</label>
                                            <input type="text" class="form-control" name="monthly_net"
                                            value="{{ $emp_info->monthly_net }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Annual CTC</label>
                                            <input type="text" class="form-control" name="annual_ctc"
                                            value="{{ $emp_info->annual_ctc }}">
                                        </div>
                                    </div>
                                </div>

                                <h4>APPRAISAL CYCLE DETAIL’S</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Appraisal Month</label>
                                            <input type="text" class="form-control" name="appraisal_month"
                                            value="{{ $emp_info->appraisal_month }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>1st Appraisal Year</label>
                                            <input type="text" class="form-control" name="appraisal_year"
                                            value="{{ $emp_info->appraisal_year }}">
                                        </div>
                                    </div>
                                </div><br><br>

                                @endrole
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Declaration: - </label><Br>
                                            <p>I hereby declare that the information provided here is legal and valid
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <h4></h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Candidate Name</label>
                                            <input type="text" class="form-control" name="candidate_name"
                                            value="{{ $emp_info->candidate_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Candidate Sign</label>
                                        <div class="custom-file position-relative">
                                            <label class="custom-file-label" for="candidate_sign">Choose
                                                File</label>
                                            <input type="file" class="form-control" id="candidate_sign"
                                                name="candidate_sign">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>HR Name</label>
                                            <input type="text" class="form-control" name="hr_name"
                                            value="{{ $emp_info->hr_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>HR Sign</label>
                                        <div class="custom-file position-relative">
                                            <label class="custom-file-label" for="hr_sign">Choose File</label>
                                            <input class="form-control" type="file" id="hr_sign"
                                                name="hr_sign">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text"
                                                    id="date" name="date"  value="{{ $emp_info->date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Company Stamp</label>
                                        <div class="custom-file position-relative">
                                            <label class="custom-file-label" for="company_stamp">Choose File</label>
                                            <input class="form-control" type="file" id="company_stamp"
                                                name="company_stamp">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="" name="emp_info_id"
                                    value="{{ $emp_info->id }}">

                                @if (!$emp_info->exists || auth()->user()->hasRole("hr manager"))
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @section('page-level-script')
            <script>
                function add_qualification_card(e) {
                    e.preventDefault();
                    // qualification_cards=document.getElementById('qualification_cards');
                    // qualification_card=document.getElementById('qualification_cards').firstElementChild.innerHTML;
                    qualification_card = document.getElementById('qualification_cards').lastElementChild;

                    qualification_card_clone = qualification_card.cloneNode(true);
                    // qualification_cards.innerHTML+=qualification_card;
                    // qualification_cards.appendChild(qualification_card_clone);
                    qualification_card.after(qualification_card_clone);
                }

                function delete_qualification_card(e, ele) {
                    e.preventDefault();
                    ele.closest('.card').remove();
                }

                function add_last_organization_card(e) {
                    e.preventDefault();
                    last_organization_card = document.getElementById('last_organization_card');
                    last_organization_card.innerHTML += `
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title"> Last Organization Detail’s
                                <button onclick="delete_last_organization_card(event,this)" class="delete-icon btn"><i class="fa fa-trash-o"></i>
                                </button>
                            </h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Organization Name</label>
                                        <input type="text" class="form-control" id="organization_name" name="organization_name[]" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" class="form-control" id="" name="p_o_designation[]" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" class="form-control" id="organization_name" name="p_o_location[]" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>DOJ</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" id="organization_doj" name="organization_doj[]" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Reliving Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" id="reliving_date" name="reliving_date[]" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Reason of Leaving </label>
                                        <input type="text" class="form-control" id="reason_of_leaving" name="reason_of_leaving[]" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Reporting Manager Name</label>

                                        <input type="text" class="form-control" id="reporting_manager_name" name="reporting_manager_name[]" value="">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Reporting Manager Number</label>

                                        <input type="text" class="form-control" id="reporting_manager_no" name="reporting_manager_no[]" value="">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Reporting Manager Email ID</label>
                                        <input type="email" class="form-control" id="reporting_manager_email" name="reporting_manager_email[]" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>HR Name</label>

                                        <input type="text" class="form-control" id="p_o_hr_name" name="p_o_hr_name[]" value="">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>HR Number</label>

                                        <input type="text" class="form-control" id="reporting_hr_no" name="reporting_hr_no[]" value="">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>HR Email ID</label>
                                        <input type="email" class="form-control" id="reporting_hr_email" name="reporting_hr_email[]" value="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="" for="">Experience Letter</label>
                                    <div class="custom-file position-relative">
                                        <label class="custom-file-label" for="upload_experience_letter">Choose File</label>
                                        <input class="custom-file-input" type="file" id="upload_experience_letter" name="upload_experience_letter[]" >
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                `
                }

                function delete_last_organization_card(e, ele) {
                    e.preventDefault();
                    ele.closest('.card').remove();
                }

                $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });

                $('.datetimepicker').datetimepicker({
                    format: 'YYYY-MM-DD'
                    // format: 'DD/MM/YYYY',
                    // format: 'DD-MM-YYYY',
                });

                function previewprofile_pic(event) {
                    var file = event.target.files[0];
                    var profile_picPreview = document.getElementById('profile_picPreview');
                    var profile_picImage = document.getElementById('profile_picImage');

                    if (file) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            profile_picImage.src = reader.result;
                            profile_picPreview.style.display = 'block';
                        }
                        reader.readAsDataURL(file);
                    }
                }
            </script>
        @endsection
</x-layouts.app>
