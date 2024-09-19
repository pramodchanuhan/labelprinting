<x-layouts.app>
    {{-- @extends('components.layouts.app') --}}

    @section('title', 'Profile')

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}/index">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#">
                                            <img alt=""
                                                src="{{ $emp_info->profile_pic ? asset("storage/$emp_info->profile_pic") : asset('assets/img/noimg.png') }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{ "$emp->f_name  $emp->l_name" }}</h3>
                                                <small class="text-muted">{{ $emp->designation_name }}</small>
                                                <h6 class="text-muted">{{ $emp->department_name }}</h6>
                                                <h6 class="text-muted">{{ $emp->company_name }}</h6>
                                                @php
                                                    $days_after_joining = \Carbon\Carbon::createFromFormat(
                                                        'Y-m-d',
                                                        $emp->joining_date,
                                                    )->diffInDays(Carbon\Carbon::now());
                        
                                                @endphp
                                                <h6 class="text-muted">Employement Status : {{ $days_after_joining }}</h6>
                                                <div class="staff-id">Employee ID : {{ $emp->emp_id }}</div>
                                                {{-- <div class="small doj text-muted">Date of Join : 1st Jan 2013</div> --}}
                                                <div class="small doj text-muted">Date of Joining :
                                                    {{ $emp->joining_date }}</div>
                                                {{-- <div class="staff-msg"><a class="btn btn-custom" href="{{url('')}}/chat">Send Message</a></div> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info d-flex flex-column">
                                                <li>
                                                    <div class="title">Phone:</div>
                                                    <div class="text"><a href="">{{ $emp->mobile_no }}</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Work Email:</div>
                                                    <div class="text"><a href="">{{ $emp->email }}</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Personal Email:</div>
                                                    <div class="text"><a
                                                            href="">{{ $emp_info->personal_email }}</a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Birthday:</div>
                                                    <div class="text">{{ date('d-m-Y', strtotime($emp_info->dob)) }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="title">Gender:</div>
                                                    <div class="text">{{ $emp_info->gender }}</div>
                                                </li>
                                                <li>
                                                    <div class="title">Reports to:</div>
                                                    <div class="text">
                                                        <div class="avatar-box">
                                                            {{-- <div class="avatar avatar-xs">
                                                                <img src="{{ asset('') }}assets/img/profiles/avatar-16.jpg"
                                                                    alt="">
                                                            </div> --}}
                                                        </div>
                                                        <a href="{{ url('') }}/profile">
                                                            {{ $emp->reports_to_name }}
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal"
                                        class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card tab-box">
                <div class="row user-tabs">
                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item"><a href="#emp_profile" data-toggle="tab"
                                    class="nav-link active">Profile</a></li>
                            {{-- <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a></li>
									<li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank & Statutory <small class="text-danger">(Admin Only)</small></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-content">

                <!-- Profile Info Tab -->
                <div id="emp_profile" class="pro-overview tab-pane fade show active">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Personal Informations <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#personal_info_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <ul class="personal-info d-flex flex-column">
                                        <li>
                                            <div class="title">Address</div>
                                            <div class="text">{{ $emp_info->permanent_address }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">State</div>
                                            <div class="text">{{ $emp_info->state }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">City</div>
                                            <div class="text">{{ $emp_info->city }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">Passport No.</div>
                                            <div class="text">{{ $emp_info->passport_number }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Passport Exp Date.</div>
                                            <div class="text">{{ $emp_info->passport_valid_to }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Nationality</div>
                                            <div class="text">{{ $emp_info->nationality }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Native Country</div>
                                            <div class="text">{{ $emp_info->native_country }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Religion</div>
                                            <div class="text">{{ $emp_info->religion }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Marital status</div>
                                            <div class="text">{{ $emp_info->marital_status }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Emergency Contact <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#emergency_contact_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <h5 class="section-title">Primary</h5>
                                    <ul class="personal-info d-flex flex-column">
                                        <li>
                                            <div class="title">Name</div>
                                            <div class="text">{{ $emp_info->relation_name }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Relationship</div>
                                            <div class="text">{{ $emp_info->relation }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Phone </div>
                                            <div class="text">{{ $emp_info->relation_phone_no }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Phone 2</div>
                                            <div class="text">{{ $emp_info->relation_phone_no1 }}</div>
                                        </li>
                                    </ul>
                                    <!-- <hr> -->
                                    <!-- <h5 class="section-title">Secondary</h5>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Name</div>
                                            <div class="text">Karen Wills</div>
                                        </li>
                                        <li>
                                            <div class="title">Relationship</div>
                                            <div class="text">Brother</div>
                                        </li>
                                        <li>
                                            <div class="title">Phone </div>
                                            <div class="text">9876543210, 9876543210</div>
                                        </li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Bank , ESIC and PF Information<a href="#"
                                            class="edit-icon" data-toggle="modal" data-target="#bank_info_modal"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    {{-- <h3 class="card-title">Bank information</h3> --}}
                                    <h4 class="section-title">Bank Information</h4>
                                    <ul class="personal-info d-flex flex-column">
                                        <li>
                                            <div class="title">Bank name</div>
                                            <div class="text">{{ $emp_info->bank_name }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Bank account No.</div>
                                            <div class="text">{{ $emp_info->bank_acc_no }}</div>
                                        </li>
                                        <li>
                                            <div class="title">IFSC Code</div>
                                            <div class="text">{{ $emp_info->ifsc_code }}</div>
                                        </li>
                                        <li>
                                            <div class="title">PAN No</div>
                                            <div class="text">{{ $emp_info->pan_number }}</div>
                                        </li>
                                    </ul>
                                    <hr>
                                    <h4 class="section-title">ESIC Information</h4>
                                    <ul class="personal-info d-flex flex-column">
                                        <li>
                                            <div class="title">ESIC / IP Number</div>
                                            <div class="text">{{ $emp_info->esic_no }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Nominee Name</div>
                                            <div class="text">{{ $emp_info->esic_nominee_name }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Relation With Nominee</div>
                                            <div class="text">{{ $emp_info->relation_nominee_name }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Is Nominee residing with you</div>
                                            <div class="text">{{ $emp_info->nominee_residing }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Nominee’s Date Of Birth</div>
                                            <div class="text">{{ $emp_info->nominee_dob }}</div>
                                        </li>
                                        <li>
                                            <div class="title">Nominee’s Aadhar Card Number</div>
                                            <div class="text">{{ $emp_info->nominee_aadhar_no }}</div>
                                        </li>
                                    </ul>
                                    <hr>
                                    <h4 class="section-title">PF Information</h4>
                                    <ul class="personal-info d-flex flex-column">
                                        <li>
                                            <div class="title">PF Number</div>
                                            <div class="text">{{ $emp_info->pf_number }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">My Documents<a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#my_documents"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Documents 1</div>
                                            <div class="text"><input type="file" id="resume" name="resume"
                                                    accept=".pdf,.doc,.docx"></div>
                                        </li>
                                        <li>
                                            <div class="title">Documents 2</div>
                                            <div class="text"><input type="file" id="resume" name="resume"
                                                    accept=".pdf,.doc,.docx"></div>
                                        </li>
                                        <li>
                                            <div class="title">Documents 3</div>
                                            <div class="text"><input type="file" id="resume" name="resume"
                                                    accept=".pdf,.doc,.docx"></div>
                                        </li>
                                        <li>
                                            <div class="title">Documents 4</div>
                                            <div class="text"><input type="file" id="resume" name="resume"
                                                    accept=".pdf,.doc,.docx"></div>
                                        </li>
                                        <li>
                                            <div class="title">Documents 5</div>
                                            <div class="text"><input type="file" id="resume" name="resume"
                                                    accept=".pdf,.doc,.docx"></div>
                                        </li>
                                        <li>
                                            <div class="title">Documents 6</div>
                                            <div class="text"><input type="file" id="resume" name="resume"
                                                    accept=".pdf,.doc,.docx"></div>
                                        </li>
                                        <li>
                                            <div class="title">Documents 7</div>
                                            <div class="text"><input type="file" id="resume" name="resume"
                                                    accept=".pdf,.doc,.docx"></div>
                                        </li>
                                        <li>
                                            <div class="title">Documents 8</div>
                                            <div class="text"><input type="file" id="resume" name="resume"
                                                    accept=".pdf,.doc,.docx"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Education Informations <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#education_info"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            @foreach (json_decode($emp_info->qualification_details) ?? [] as $item)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#"
                                                                class="name">{{ $item->university }}</a>
                                                            <div>{{ $item->degree }} {{ $item->specialization }}</div>
                                                            <span
                                                                class="time">{{ date('Y', strtotime($item->degree_from)) }}
                                                                - {{ date('Y', strtotime($item->degree_to)) }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Experience <a href="#" class="edit-icon"
                                            data-toggle="modal" data-target="#experience_info"><i
                                                class="fa fa-pencil"></i></a></h3>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            {{-- <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a href="#" class="name">Web Designer at Zen
                                                            Corporation</a>
                                                        <span class="time">Jan 2013 - Present (5 years 2
                                                            months)</span>
                                                    </div>
                                                </div>
                                            </li> --}}
                                            @foreach (json_decode($emp_info->last_organization_details) ?? [] as $item)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#"
                                                                class="name">{{ $item->p_o_designation }} at
                                                                {{ $item->organization_name }} </a>
                                                            <span
                                                                class="time">{{ date('M Y', strtotime($item->organization_doj)) }}
                                                                -
                                                                {{ date('M Y', strtotime($item->reliving_date)) }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">My Letters
                                        @role('hr|hr manager')
                                            <a href="#" class="edit-icon" data-toggle="modal"
                                                data-target="#my_letters">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        @endrole
                                    </h3>

                                    <ul class="personal-info">
                                        <li>
                                            @php
                                                $days_left_for_offer_letter = 30 - $days_after_joining;
                                                $offer_letter_text = 'Eligible for offer letter';
                                                if ($days_left_for_offer_letter > 0) {
                                                    $offer_letter_text = "$days_left_for_offer_letter days left";
                                                }
                                            @endphp
                                            <div class="title">Offer letter</div>
                                            @if ($emp_info->offer_letter)
                                                <a href="{{ asset("storage/$emp_info->offer_letter") }}" download> <i
                                                        class="fa fa-download text-info " aria-hidden="true"></i></a>
                                                <a href="{{ asset("storage/$emp_info->offer_letter") }}"
                                                    target="_blank" class="ml-2"> <i class="fa fa-eye text-info "
                                                        aria-hidden="true"></i></a>
                                            @else
                                                <div class="text">{{ $offer_letter_text }}</div>
                                            @endif
                                        </li>
                                        <li>
                                            @php
                                                $days_left_for_appointment_letter = 180 - $days_after_joining;
                                                $appointment_letter_text = 'Eligible for appointment letter';
                                                if ($days_left_for_appointment_letter > 0) {
                                                    $appointment_letter_text = "$days_left_for_appointment_letter days left";
                                                }
                                            @endphp
                                            <div class="title">Appointment letter</div>
                                            @if ($emp_info->appointment_letter)
                                                <a href="{{ asset("storage/$emp_info->appointment_letter") }}"
                                                    download> <i class="fa fa-download text-info "
                                                        aria-hidden="true"></i></a>
                                                <a href="{{ asset("storage/$emp_info->appointment_letter") }}"
                                                    target="_blank" class="ml-2"> <i class="fa fa-eye text-info "
                                                        aria-hidden="true"></i></a>
                                            @else
                                                <div class="text">{{ $appointment_letter_text }}</div>
                                            @endif
                                        <li>
                                            @php
                                                $days_left_for_appraisal = 365 - ($days_after_joining % 365);
                                                $appraisal_text = "$days_left_for_appraisal days left";
                                            @endphp
                                            <div class="title">Next appraisal</div>

                                            <div class="text">{{ $appraisal_text }}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="card profile-box flex-fill">
                                <div class="card-body">
                                    <h3 class="card-title">Forms </h3>

                                    <ul class="personal-info">
                                        <li>
                                            <div class="title">Consent Form</div>
                                            {{-- <a href="{{ asset("storage/$emp_info->offer_letter") }}" download> <i
                                                        class="fa fa-download text-info " aria-hidden="true"></i></a> --}}
                                            <a href="{{ url("documentation/consentform?emp_id=$emp->id") }}"
                                                target="" class="ml-2"> <i class="fa fa-eye text-info "
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <div class="title">Policy Acknowledgement Form</div>
                                            <a href="{{ url("documentation/policyacknowledgementform?emp_id=$emp->id") }}"
                                                target="" class="ml-2"> <i class="fa fa-eye text-info "
                                                    aria-hidden="true"></i></a>
                                        <li>
                                            <div class="title">Employment Clearance Form</div>
                                            <a href="{{ url("documentation/consentform?emp_id=$emp->id") }}"
                                                target="" class="ml-2"> <i class="fa fa-eye text-info"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <div class="title">Employee Joining Form</div>
                                            <a href="{{ url("documentation/employee-joining-form?emp_id=$emp->id") }}"
                                                target="" class="ml-2"> <i class="fa fa-eye text-info "
                                                    aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="tab-content">
                    <!-- Projects Tab -->
                    <div class="tab-pane fade" id="emp_projects">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown"
                                                class="action-icon dropdown-toggle" href="#"><i
                                                    class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="{{ url('') }}/project-view">Office
                                                Management</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">1</span> <span class="text-muted">open tasks,
                                            </span>
                                            <span class="text-xs">9</span> <span class="text-muted">tasks
                                                completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip"
                                                        title="Jeffery Lalor"><img alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Doe"><img
                                                            alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip"
                                                        title="Richard Miles"><img alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Smith"><img
                                                            alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img
                                                            alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span>
                                        </p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip"
                                                role="progressbar" class="progress-bar bg-success"
                                                data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown"
                                                class="action-icon dropdown-toggle" href="#"><i
                                                    class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="{{ url('') }}/project-view">Project
                                                Management</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">2</span> <span class="text-muted">open tasks,
                                            </span>
                                            <span class="text-xs">5</span> <span class="text-muted">tasks
                                                completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip"
                                                        title="Jeffery Lalor"><img alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Doe"><img
                                                            alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip"
                                                        title="Richard Miles"><img alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Smith"><img
                                                            alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img
                                                            alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span>
                                        </p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip"
                                                role="progressbar" class="progress-bar bg-success"
                                                data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown"
                                                class="action-icon dropdown-toggle" href="#"><i
                                                    class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="{{ url('') }}/project-view">Video
                                                Calling App</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">3</span> <span class="text-muted">open tasks,
                                            </span>
                                            <span class="text-xs">3</span> <span class="text-muted">tasks
                                                completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip"
                                                        title="Jeffery Lalor"><img alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Doe"><img
                                                            alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip"
                                                        title="Richard Miles"><img alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Smith"><img
                                                            alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img
                                                            alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span>
                                        </p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip"
                                                role="progressbar" class="progress-bar bg-success"
                                                data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown"
                                                class="action-icon dropdown-toggle" href="#"><i
                                                    class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#"
                                                    class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="{{ url('') }}/project-view">Hospital
                                                Administration</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">12</span> <span class="text-muted">open tasks,
                                            </span>
                                            <span class="text-xs">4</span> <span class="text-muted">tasks
                                                completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip"
                                                        title="Jeffery Lalor"><img alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Doe"><img
                                                            alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip"
                                                        title="Richard Miles"><img alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="John Smith"><img
                                                            alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="Mike Litorus"><img
                                                            alt=""
                                                            src="{{ asset('') }}assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span>
                                        </p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip"
                                                role="progressbar" class="progress-bar bg-success"
                                                data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Projects Tab -->

                    <!-- Bank Statutory Tab -->
                    <div class="tab-pane fade" id="bank_statutory">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"> Basic Salary Information</h3>
                                <form>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Salary basis <span
                                                        class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select salary basis type</option>
                                                    <option>Hourly</option>
                                                    <option>Daily</option>
                                                    <option>Weekly</option>
                                                    <option>Monthly</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Salary amount <small
                                                        class="text-muted">per month</small></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">$</span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="Type your salary amount" value="0.00">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Payment type</label>
                                                <select class="select">
                                                    <option>Select payment type</option>
                                                    <option>Bank transfer</option>
                                                    <option>Check</option>
                                                    <option>Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3 class="card-title"> PF Information</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">PF contribution</label>
                                                <select class="select">
                                                    <option>Select PF contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">PF No. <span
                                                        class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select PF contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Employee PF rate</label>
                                                <select class="select">
                                                    <option>Select PF contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Additional rate <span
                                                        class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select additional rate</option>
                                                    <option>0%</option>
                                                    <option>1%</option>
                                                    <option>2%</option>
                                                    <option>3%</option>
                                                    <option>4%</option>
                                                    <option>5%</option>
                                                    <option>6%</option>
                                                    <option>7%</option>
                                                    <option>8%</option>
                                                    <option>9%</option>
                                                    <option>10%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Total rate</label>
                                                <input type="text" class="form-control" placeholder="N/A"
                                                    value="11%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Employee PF rate</label>
                                                <select class="select">
                                                    <option>Select PF contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Additional rate <span
                                                        class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select additional rate</option>
                                                    <option>0%</option>
                                                    <option>1%</option>
                                                    <option>2%</option>
                                                    <option>3%</option>
                                                    <option>4%</option>
                                                    <option>5%</option>
                                                    <option>6%</option>
                                                    <option>7%</option>
                                                    <option>8%</option>
                                                    <option>9%</option>
                                                    <option>10%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Total rate</label>
                                                <input type="text" class="form-control" placeholder="N/A"
                                                    value="11%">
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <h3 class="card-title"> ESI Information</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">ESI contribution</label>
                                                <select class="select">
                                                    <option>Select ESI contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">ESI No. <span
                                                        class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select ESI contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Employee ESI rate</label>
                                                <select class="select">
                                                    <option>Select ESI contribution</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Additional rate <span
                                                        class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select additional rate</option>
                                                    <option>0%</option>
                                                    <option>1%</option>
                                                    <option>2%</option>
                                                    <option>3%</option>
                                                    <option>4%</option>
                                                    <option>5%</option>
                                                    <option>6%</option>
                                                    <option>7%</option>
                                                    <option>8%</option>
                                                    <option>9%</option>
                                                    <option>10%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Total rate</label>
                                                <input type="text" class="form-control" placeholder="N/A"
                                                    value="11%">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Bank Statutory Tab -->

                </div>
            </div>
            <!-- /Page Content -->

            <!-- Profile Modal -->
            <div id="profile_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Profile Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url("profile/profile-info/$emp_info->emp_info_id") }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap edit-img">
                                            <img class="inline-block" id="profile_pic_l"
                                                src="{{ asset("storage/$emp_info->profile_pic") }}" alt="user">
                                            <div class="fileupload btn">
                                                <label for="profile_pic" class="btn-text">edit</label>
                                                <input class="upload" id="profile_pic" name="profile_pic"
                                                    type="file"
                                                    onchange="document.getElementById('profile_pic_l').src=window.URL.createObjectURL(this.files[0]);">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Birth Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" name="dob"
                                                    type="text" value="{{ $emp_info->dob }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="mobile_no"
                                                value="{{ $emp->mobile_no }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Personal Email</label>
                                            <input type="email" class="form-control" name="personal_email"
                                                value="{{ $emp_info->personal_email }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Username <span class="text-secondary"> (fill
                                                    only if need to change)</span></label>
                                            <input class="form-control" type="text" name="username"
                                                value="{{ old('username') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="select form-control" name="gender">
                                                <option value="male"
                                                    {{ $emp_info->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female"
                                                    {{ $emp_info->gender == 'female' ? 'selected' : '' }}>Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 ">
                                        <label class="col-form-label">Status </label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="status" value="1"
                                                {{ $emp->status == 1 ? 'checked' : '' }} class="custom-control-input"
                                                id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1"></label>
                                        </div>
                                    </div>

                                </div>

                                @role('hr manager')
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">First Name <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="f_name"
                                                    value="{{ $emp->f_name }}">
                                                @error('name')
                                                    <span class="text-red-500"> <strong>{{ $message }}</strong> </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Last Name</label>
                                                <input class="form-control" type="text" name="l_name"
                                                    value="{{ $emp->l_name }}">
                                                @error('l_name')
                                                    <span class="text-red-500"> <strong>{{ $message }}</strong> </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Email <span class="text-secondary"> (fill
                                                        only if need to change)</span></label>
                                                <input class="form-control" type="email" name="email"
                                                    value="{{ old('email') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Department <span
                                                        class="text-danger">*</span></label>
                                                <select id="select_department" class="select" name="department_id"
                                                    onchange="fill_designation_dd(event,this)">
                                                    <option hidden disabled selected>Select Department</option>

                                                    @foreach ($Department as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Designation <span
                                                        class="text-danger">*</span></label>
                                                <select id="select_designation" class="select" name="designation_id"
                                                    onchange="fill_reports_to_dd(event,this)">
                                                    <option hidden disabled selected>Select Department First</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Reports To <span
                                                        class="text-danger"></span></label>
                                                <select id="select_reports_to" class="select" name="reports_to">
                                                    <option hidden disabled selected>Select Designation First</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Employment Status <span
                                                        class="text-danger"></span></label>
                                                <select id="" class="select" name="employment_status">
                                                    <option hidden disabled selected> Select Status</option>
                                                    @foreach ($employment_status as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ $emp->employment_status == $key ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                @endrole

                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Profile Modal -->

            <!-- Personal Info Modal -->
            <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url("profile/personal-info/$emp_info->emp_info_id") }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="permanent_address"
                                                value="{{ $emp_info->permanent_address }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" class="form-control" name="state"
                                                value="{{ $emp_info->state }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city"
                                                value="{{ $emp_info->city }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Passport No</label>
                                            <input type="text" class="form-control" name="passport_number"
                                                value="{{ $emp_info->passport_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Passport Expiry Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text"
                                                    name="passport_valid_to"
                                                    value="{{ $emp_info->passport_valid_to }}">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tel</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nationality <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="nationality"
                                                value="{{ $emp_info->nationality }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Religion</label>
                                            <div>
                                                <input class="form-control" type="text" name="religion"
                                                    value="{{ $emp_info->religion }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Native Country <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="native_country"
                                                value="{{ $emp_info->native_country }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Marital status <span class="text-danger">*</span></label>
                                            <select class="select form-control" name="marital_status">
                                                <option>-</option>
                                                <option {{ $emp_info->marital_status == 'Single' ? 'selected' : '' }}
                                                    value="Single">Single</option>
                                                <option {{ $emp_info->marital_status == 'Married' ? 'selected' : '' }}
                                                    value="Married">Married</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Employment of spouse</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="submit-section">
                                    <button type ="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Personal Info Modal -->


            <!-- Bank Info Modal -->
            <div id="bank_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Bank , ESIC and PF Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url("profile/account-info/$emp_info->emp_info_id") }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bank Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="bank_name"
                                                value="{{ $emp->bank_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bank Account No.<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="bank_acc_no"
                                                value="{{ $emp->bank_acc_no }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>IFSC Code<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="ifsc_code"
                                                value="{{ $emp->ifsc_code }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>PAN No. <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="pan_number"
                                                value="{{ $emp->pan_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>ESIC / IP Number <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="esic_no"
                                                value="{{ $emp->esic_no }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nominee Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="esic_nominee_name"
                                                value="{{ $emp->esic_nominee_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Relation With Nominee <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="relation_nominee_name"
                                                value="{{ $emp->relation_nominee_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Is Nominee residing with you<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="nominee_residing"
                                                value="{{ $emp->nominee_residing }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nominee’s Date Of Birth<span class="text-danger">*</span></label>
                                            <div class="cal-icon"><input class="form-control datetimepicker"
                                                    type="text" name="nominee_dob"
                                                    value="{{ $emp->nominee_dob }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nominee’s Aadhar Card Number <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="nominee_aadhar_no"
                                                value="{{ $emp->nominee_aadhar_no }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>PF Number <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="pf_number"
                                                value="{{ $emp->pf_number }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Bank Info Modal -->


            <!-- Family Info Modal -->
            <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Family Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Family Member <a href="javascript:void(0);"
                                                    class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a
                                                    href="javascript:void(0);" class="delete-icon"><i
                                                        class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Family Info Modal -->

            <!-- Emergency Contact Modal -->
            <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST"
                                action="{{ url("profile/emergency-info/$emp_info->emp_info_id") }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Primary Contact</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        name="relation_name"
                                                        value="{{ $emp_info->relation_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="relation"
                                                        value="{{ $emp_info->relation }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text"
                                                        name="relation_phone_no"
                                                        value="{{ $emp_info->relation_phone_no }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone 2</label>
                                                    <input class="form-control" type="text"
                                                        name="relation_phone_no1"
                                                        value="{{ $emp_info->relation_phone_no1 }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Emergency Contact Modal -->

            <!-- Education Modal -->
            <div id="education_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Education Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url("profile/education-info/$emp_info->emp_info_id") }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-scroll">
                                    <div id="qualification_cards">
                                        @unless (json_decode($emp_info->qualification_details))
                                            <div class="card qualification_card">
                                                <div class="card-body">
                                                    <h3 class="card-title">Education Informations
                                                        <button onclick="delete_qualification_card(event,this)"
                                                            class="delete-icon btn "><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </h3>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <input type="text" id=""
                                                                    name="university[]" value=""
                                                                    class="form-control floating" autocomplete="OFF">
                                                                <label class="focus-label">University/Institute
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <input type="text" id="" name="degree[]"
                                                                    value="" class="form-control floating">
                                                                <label class="focus-label">Degree </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <input type="text" id=""
                                                                    name="specialization[]" value=""
                                                                    class="form-control floating">
                                                                <label class="focus-label">Specialization </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <input type="text" id=""
                                                                    name="percentage[]" value=""
                                                                    class="form-control floating">
                                                                <label class="focus-label">Percentage/Grade </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <div class="cal-icon">
                                                                    <input type="text" id=""
                                                                        name="degree_from[]" value=""
                                                                        class="form-control floating datetimepicker">
                                                                    <label class="focus-label">From </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <div class="cal-icon">
                                                                    <input type="text" id=""
                                                                        name="degree_to[]" value=""
                                                                        class="form-control floating datetimepicker">
                                                                    <label class="focus-label">To </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="custom-file position-relative">
                                                                <label class="custom-file-label"
                                                                    for="upload_aadhar_card">Upload
                                                                    Certificate</label>
                                                                <input class="custom-file-input" type="file"
                                                                    id="upload_aadhar_card" name="upload_certificate[]"
                                                                    value="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endunless
                                        @foreach (json_decode($emp_info->qualification_details) ?? [] as $item)
                                            <div class="card qualification_card">
                                                <div class="card-body">
                                                    <h3 class="card-title">Education Informations
                                                        <button onclick="delete_qualification_card(event,this)"
                                                            class="delete-icon btn "><i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </h3>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <input type="text" id=""
                                                                    name="university[]"
                                                                    value="{{ $item->university }}"
                                                                    class="form-control floating"
                                                                    autocomplete="OFF">
                                                                <label class="focus-label">University/Institute
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <input type="text" id=""
                                                                    name="degree[]" value="{{ $item->degree }}"
                                                                    class="form-control floating">
                                                                <label class="focus-label">Degree </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <input type="text" id=""
                                                                    name="specialization[]"
                                                                    value="{{ $item->specialization }}"
                                                                    class="form-control floating">
                                                                <label class="focus-label">Specialization </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <input type="text" id=""
                                                                    name="percentage[]"
                                                                    value="{{ $item->percentage }}"
                                                                    class="form-control floating">
                                                                <label class="focus-label">Percentage/Grade </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <div class="cal-icon">
                                                                    <input type="text" id=""
                                                                        name="degree_from[]"
                                                                        value="{{ $item->degree_from }}"
                                                                        class="form-control floating datetimepicker">
                                                                    <label class="focus-label">From </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group form-focus focused">
                                                                <div class="cal-icon">
                                                                    <input type="text" id=""
                                                                        name="degree_to[]"
                                                                        value="{{ $item->degree_to }}"
                                                                        class="form-control floating datetimepicker">
                                                                    <label class="focus-label">To </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="custom-file position-relative">
                                                                <label class="custom-file-label"
                                                                    for="upload_aadhar_card">Upload
                                                                    Certificate</label>
                                                                <input class="custom-file-input" type="file"
                                                                    id="upload_aadhar_card"
                                                                    name="upload_certificate[]" value="">
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
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Education Modal -->

            <!-- Experience Modal -->
            <div id="experience_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Experience Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url("profile/experience-info/$emp_info->emp_info_id") }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-scroll" id="experience_cards">
                                    @if (!json_decode($emp_info->last_organization_details))
                                        <div class="card experience_card">
                                            <div class="card-body">
                                                <h3 class="card-title">Experience Informations
                                                    <button onclick="delete_experience_card(event,this)"
                                                        class="delete-icon btn "><i class="fa fa-trash-o"></i>
                                                    </button>
                                                </h3>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <input type="text" name="organization_name[]"
                                                                class="form-control floating" value="">
                                                            <label class="focus-label">Company Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <input type="text" name="p_o_designation[]"
                                                                class="form-control floating" value="">
                                                            <label class="focus-label">Job Position</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <div class="cal-icon">
                                                                <input type="text" name="organization_doj[]"
                                                                    class="form-control floating datetimepicker"
                                                                    value="">
                                                                <label class="focus-label">Period From</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <div class="cal-icon">
                                                                <input type="text" name="reliving_date[]"
                                                                    class="form-control floating datetimepicker"
                                                                    value="">
                                                                <label class="focus-label">Period To</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <input type="text" name="p_o_location[]"
                                                                class="form-control floating" value="">
                                                            <label class="focus-label">Location</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @foreach (json_decode($emp_info->last_organization_details) ?? [] as $item)
                                        <div class="card experience_card">
                                            <div class="card-body">
                                                <h3 class="card-title">Experience Informations
                                                    <button onclick="delete_experience_card(event,this)"
                                                        class="delete-icon btn "><i class="fa fa-trash-o"></i>
                                                    </button>
                                                </h3>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <input type="text" name="organization_name[]"
                                                                class="form-control floating"
                                                                value="{{ $item->organization_name }}">
                                                            <label class="focus-label">Company Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <input type="text" name="p_o_designation[]"
                                                                class="form-control floating"
                                                                value="{{ $item->p_o_designation }}">
                                                            <label class="focus-label">Job Position</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <div class="cal-icon">
                                                                <input type="text" name="organization_doj[]"
                                                                    class="form-control floating datetimepicker"
                                                                    value="{{ $item->organization_doj }}">
                                                                <label class="focus-label">Period From</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <div class="cal-icon">
                                                                <input type="text" name="reliving_date[]"
                                                                    class="form-control floating datetimepicker"
                                                                    value="{{ $item->reliving_date }}">
                                                                <label class="focus-label">Period To</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <input type="text" name="p_o_location[]"
                                                                class="form-control floating"
                                                                value="{{ $item->p_o_location }}">
                                                            <label class="focus-label">Location</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                                <div class="add-more">
                                    <button class="btn btn-info" onclick="add_experience_card(event)"><i
                                            class="fa fa-plus-circle"></i> Add
                                        More</button>
                                </div>

                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Experience Modal -->

            <!-- My Documents Modal -->
            <div id="my_documents" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">My Documents</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Documents</label>
                                            <input type="file" id="resume" name="resume"
                                                accept=".pdf,.doc,.docx">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Documents</label>
                                            <input type="file" id="resume" name="resume"
                                                accept=".pdf,.doc,.docx">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Documents</label>
                                            <input type="file" id="resume" name="resume"
                                                accept=".pdf,.doc,.docx">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Documents</label>
                                            <input type="file" id="resume" name="resume"
                                                accept=".pdf,.doc,.docx">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Documents</label>
                                            <input type="file" id="resume" name="resume"
                                                accept=".pdf,.doc,.docx">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Documents</label>
                                            <input type="file" id="resume" name="resume"
                                                accept=".pdf,.doc,.docx">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Documents</label>
                                            <input type="file" id="resume" name="resume"
                                                accept=".pdf,.doc,.docx">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Documents</label>
                                            <input type="file" id="resume" name="resume"
                                                accept=".pdf,.doc,.docx">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /My Documents Modal -->

            <!-- My letters Modal -->
            <div id="my_letters" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">My Documents</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url("profile/my-letters/$emp_info->emp_info_id") }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Offer letter</label>
                                            <input type="file" id="offer_letter" name="offer_letter"
                                                accept=".pdf,.doc,.docx">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Appointment letter</label>
                                            <input type="file" id="appointment_letter"
                                                name="appointment_letter" accept=".pdf,.doc,.docx">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /My letters Modal -->

        </div>
        <!-- /Page Wrapper -->

        @section('page-level-script')
            <script>
                console.log('hi');

                // for profile_info
                let designation_data = [
                    @foreach ($Designation as $value)
                        // "{{ $value->id }}" :
                        {
                            'id': {{ $value->id }},
                            'department_id': {{ $value->department_id }},
                            'designation_name': "{{ $value->name }}",
                            'role': {{ $value->role }},
                        },
                    @endforeach
                ]

                let employee_data = [
                    @foreach ($employees as $value)
                        // "{{ $value->id }}" :
                        {
                            'id': {{ $value->id }},
                            'user_id': {{ $value->user_id }},
                            'name': "{{ $value->f_name }}",
                            'department_id': {{ $value->department_id }},
                            'designation_id': {{ $value->designation_id }},
                            'reports_to': {{ $value->reports_to ?? 'null' }},
                        },
                    @endforeach
                ]

                function fill_designation_dd(e, ele) {
                    // x=document.getElementById('select_department').select2('data');
                    // x=$('#select_department');
                    let f_designation_data = designation_data.filter(o => o.department_id == ele.value);

                    let select_designation = document.getElementById('select_designation');
                    select_designation.innerHTML = `
                            <option hidden disabled selected>Select Designation </option>
                        `;

                    f_designation_data.forEach((element, index) => {
                        // console.log(element,index);
                        select_designation.innerHTML += `
                                <option value="${element.id}">${element.designation_name}</option>
                            `
                    });

                    // console.log(e.value,ele,x.value,x,ele.value,obj);
                    // console.log(ele.value,f_designation_data,select_designation);

                }

                function fill_reports_to_dd(e, ele) {
                    // x=document.getElementById('select_department').select2('data');
                    // x=$('#select_department');
                    let f_designation_data = designation_data.find(o => o.id == ele.value);
                    f_designation_role = f_designation_data.role;

                    // filter  designation of the department
                    let designation_department_data = designation_data.filter(o => o.department_id == f_designation_data
                        .department_id || o.role == 1);

                    // filter reporting(higher) designation of the department
                    let reports_to_designations_data = designation_department_data.filter(o => o.role < f_designation_role);

                    let reports_to_data = [];
                    reports_to_designations_data.forEach(element => {
                        // reports to employees with same designation which are at higher post
                        reports_to_emps = employee_data.filter(o => o.designation_id == element.id);
                        reports_to_data = reports_to_data.concat(reports_to_emps);
                    });

                    console.log(f_designation_data, f_designation_role, reports_to_designations_data, reports_to_data);


                    let select_reports_to = document.getElementById('select_reports_to');
                    select_reports_to.innerHTML = `
                            <option hidden disabled selected>Select Reports To </option>
                        `;

                    reports_to_data.forEach((element, index) => {
                        reports_to_designations = reports_to_designations_data.find(o => {
                            // console.log(o.id,element.designation_id);
                            return o.id == element.designation_id
                        })
                        // console.log(element,index,reports_to_designations?.designation_name);
                        select_reports_to.innerHTML += `
                                <option value="${element.id}">${element.name} => ${reports_to_designations?.designation_name} </option>
                            `
                    });

                }

                function add_qualification_card(e) {
                    e.preventDefault();
                    qualification_card = document.getElementById('qualification_cards').lastElementChild;
                    qualification_card_clone = qualification_card.cloneNode(true);
                    qualification_card.after(qualification_card_clone);
                    // qualification_card.innerHTML += qualification_card.innerHTML;
                    // qualification_card.insertAdjacentHTML('afterend',qualification_card.innerHTML);
                }

                function delete_qualification_card(e, ele) {
                    e.preventDefault();
                    ele.closest('.qualification_card').remove();
                }

                function add_experience_card(e) {
                    e.preventDefault();
                    experience_card = document.getElementById('experience_cards').lastElementChild;
                    experience_card_clone = experience_card.cloneNode(true);
                    experience_card.after(experience_card_clone);
                }

                function delete_experience_card(e, ele) {
                    e.preventDefault();
                    ele.closest('.experience_card').remove();
                }
            </script>
        @endsection



</x-layouts.app>
