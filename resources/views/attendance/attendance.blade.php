
<x-layouts.app>

    @section('title', 'attendance')
    @section('page-level-style')
    @endsection

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Attendance</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active">Attendance</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">Employee Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating">
                            <option>-</option>
                            <option>Jan</option>
                            <option>Feb</option>
                            <option>Mar</option>
                            <option>Apr</option>
                            <option>May</option>
                            <option>Jun</option>
                            <option>Jul</option>
                            <option>Aug</option>
                            <option>Sep</option>
                            <option>Oct</option>
                            <option>Nov</option>
                            <option>Dec</option>
                        </select>
                        <label class="focus-label">Select Month</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating">
                            <option>-</option>
                            <option>2019</option>
                            <option>2018</option>
                            <option>2017</option>
                            <option>2016</option>
                            <option>2015</option>
                        </select>
                        <label class="focus-label">Select Year</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="#" class="btn btn-success btn-block"> Search </a>
                </div>
            </div>
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    @for ($i=1 ; $i <= Carbon\Carbon::now()->month($month)->year($year)->daysInMonth; $i++)
                                    <th>{{$i}}</th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dd(\Carbon\Carbon::create('2024-04-13 9:59:00')->diffInSeconds('10:00:00',false),\Carbon\Carbon::create('10:00:00'),now()->minute(35)) --}}
                                @foreach ($attendance as $emp_attendance)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile" class="avatar"><img style="height: 100%;" alt="" src="{{ $emp_attendance->profile_pic ? asset("storage/$emp_attendance->profile_pic") : asset('assets/img/noimg.png') }}"></a>
                                                <a>	{{ " $emp_attendance->f_name  $emp_attendance->l_name " }}  <span>{{$designation[$emp_attendance->designation_id]}}</span></a>
                                            </h2>
                                        </td>
                                        @for ($i=1 ; $i <= Carbon\Carbon::now()->month($month)->year($year)->daysInMonth; $i++)
                                            <td>
                                            @php
                                                if ($emp_attendance->{"d$i"} && $emp_attendance->{"d$i"} != "on leave" ) {
                                                    $punch_in = Carbon\Carbon::create($emp_attendance->{"d$i"}->attendance[0]->{"Punch In"});
                                                    $reporting_time = Carbon\Carbon::create($emp_attendance->{"d$i"}->attendance[0]->{"Punch In"})->hour(10)->minute(00);

                                                    $current_attendance = $emp_attendance->{"d$i"};
                                                    $curr_attendance= $current_attendance->attendance;

                                                    $date=isset($curr_attendance[0]) ? Carbon\Carbon::create($curr_attendance[0]->{'Punch In'})->toFormattedDateString() : "--";
                                                    $f_punch_in=isset($curr_attendance[0]) ? Carbon\Carbon::create($curr_attendance[0]->{'Punch In'})->toDayDateTimeString() : "--";
                                                    $l_punch_out=isset($curr_attendance[count($curr_attendance)-1]->{"Punch Out"}) ?  \Carbon\Carbon::create($curr_attendance[count($curr_attendance)-1]->{"Punch Out"})->toDayDateTimeString() : "--";
                                                    $working=isset($current_attendance) ? Carbon\CarbonInterval::seconds($current_attendance->working)->cascade()->forHumans($short = true) : "00";
                                                    $break=isset($current_attendance) ? ($current_attendance->break ? Carbon\CarbonInterval::seconds($current_attendance->break)->cascade()->forHumans($short = true) : "0s" ) : "00";
                                                    $overtime=isset($current_attendance) ? ($current_attendance->working >28800 ? Carbon\CarbonInterval::seconds($current_attendance->working - 28800)->cascade()->forHumans($short = true) : "0s" ) : "00";
                                                }
                                            @endphp
                                            {{-- @dd($att_info) --}}
                                            @if ($emp_attendance->{"d$i"} == null)
                                                <i class="fa fa-close text-danger"></i>
                                            @elseif ($emp_attendance->{"d$i"} == 'on leave')
                                                <i class="far fa-calendar-times"></i>
                                            @elseif ($punch_in->diffInSeconds($reporting_time,false) < 0 && $emp_attendance->{"d$i"}->working < 27000 )
                                                <div class="half-day" style="cursor: pointer" onclick='attendance_info(@json($current_attendance),"{{$date}}","{{$f_punch_in}}","{{$l_punch_out}}","{{$working}}","{{$break}}","{{$overtime}}")'>
                                                    <span class="first-off"><i class="fa fa-close text-danger"></i></span>
                                                    <span class="first-off"><i class="fa fa-close text-danger"></i></span>
                                                </div>
                                            @elseif ($punch_in->diffInSeconds($reporting_time,false) < 0)
                                                <div class="half-day">
                                                    <span class="first-off"><i class="fa fa-close text-danger"></i></span>
                                                    <span class="first-off"><a href="javascript:void(0);" data-toggle="modal" onclick='attendance_info(@json($current_attendance),"{{$date}}","{{$f_punch_in}}","{{$l_punch_out}}","{{$working}}","{{$break}}","{{$overtime}}")'><i class="fa fa-check text-success"></i></a></span>
                                                </div>
                                            @elseif ($emp_attendance->{"d$i"}->working < 27000)
                                                <div class="half-day">
                                                    <span class="first-off"><a href="javascript:void(0);" data-toggle="modal" onclick='attendance_info(@json($current_attendance),"{{$date}}","{{$f_punch_in}}","{{$l_punch_out}}","{{$working}}","{{$break}}","{{$overtime}}")'><i class="fa fa-check text-success"></i></a></span>
                                                    <span class="first-off"><i class="fa fa-close text-danger"></i></span>
                                                </div>
                                            @else
                                                <a href="javascript:void(0);" data-toggle="modal" onclick='attendance_info(@json($current_attendance),"{{$date}}","{{$f_punch_in}}","{{$l_punch_out}}","{{$working}}","{{$break}}","{{$overtime}}")'><i class="fa fa-check text-success"></i></a>
                                            @endif
                                            </td>
                                        @endfor
                                @endforeach
                                {{-- <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a class="avatar avatar-xs" href="profile"><img alt="" src="{{ URL::to('assets/img/profiles/avatar-09.jpg') }}"></a>
                                            <a href="profile">Richard Miles</a>
                                        </h2>
                                    </td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><i class="fa fa-close text-danger"></i> </td>
                                    <td><i class="fa fa-close text-danger"></i> </td>
                                    <td><i class="fa fa-close text-danger"></i> </td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><i class="fa fa-close text-danger"></i> </td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><i class="fa fa-close text-danger"></i> </td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><i class="fa fa-close text-danger"></i> </td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info"><i class="fa fa-check text-success"></i></a></td>
                                </tr> --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        <!-- Attendance Modal -->
        <div class="modal custom-modal fade" id="attendance_info" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Attendance Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card punch-status">
                                    <div class="card-body">
                                        <h5 class="card-title">Timesheet <small class="text-muted" id="att_date">11 Mar 2019</small></h5>
                                        <div class="punch-det">
                                            <h6>Punch In at</h6>
                                            <p id="f_punch_in">Wed, 11th Mar 2019 10.00 AM</p>
                                        </div>
                                        <div class="punch-info">
                                            <div class="punch-hours">
                                                <span id="working_time">3.45 hrs</span>
                                            </div>
                                        </div>
                                        <div class="punch-det">
                                            <h6>Punch Out at</h6>
                                            <p id="l_punch_out">Wed, 20th Feb 2019 9.00 PM</p>
                                        </div>
                                        <div class="statistics">
                                            <div class="row">
                                                <div class="col-md-6 col-6 text-center">
                                                    <div class="stats-box">
                                                        <p>Break</p>
                                                        <h6 id="break_time">1.21 hrs</h6>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-6 text-center">
                                                    <div class="stats-box">
                                                        <p>Overtime</p>
                                                        <h6 id="overtime">3 hrs</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card recent-activity">
                                    <div class="card-body">
                                        <h5 class="card-title">Activity</h5>
                                        <ul class="res-activity-list" id="att_activity">
                                            <li>
                                                <p class="mb-0">Punch In at</p>
                                                <p class="res-activity-time">
                                                    <i class="fa fa-clock-o"></i>
                                                    10.00 AM.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Punch Out at</p>
                                                <p class="res-activity-time">
                                                    <i class="fa fa-clock-o"></i>
                                                    11.00 AM.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Punch In at</p>
                                                <p class="res-activity-time">
                                                    <i class="fa fa-clock-o"></i>
                                                    11.15 AM.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Punch Out at</p>
                                                <p class="res-activity-time">
                                                    <i class="fa fa-clock-o"></i>
                                                    1.30 PM.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Punch In at</p>
                                                <p class="res-activity-time">
                                                    <i class="fa fa-clock-o"></i>
                                                    2.00 PM.
                                                </p>
                                            </li>
                                            <li>
                                                <p class="mb-0">Punch Out at</p>
                                                <p class="res-activity-time">
                                                    <i class="fa fa-clock-o"></i>
                                                    7.30 PM.
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Attendance Modal -->

    </div>
    <!-- Page Wrapper -->
    @section('page-level-script')
        <script>
            function attendance_info( att_info,att_date,f_punch_in,l_punch_out,working_time,break_time,overtime ) {
                console.log(att_info,att_info.attendance,att_date,f_punch_in,l_punch_out,working_time,break_time,overtime);

                document.querySelector('#att_date').innerHTML = att_date;
                document.querySelector('#f_punch_in').innerText = f_punch_in;
                document.querySelector('#l_punch_out').innerText = l_punch_out;
                document.querySelector('#working_time').innerText = working_time;
                document.querySelector('#break_time').innerText = break_time;
                document.querySelector('#overtime').innerText = overtime;

                document.querySelector('#att_activity').innerText ='';
                att_info.attendance.forEach((object) => {
                    // console.log(object);

                    for (const key in object) {
                        if (Object.hasOwnProperty.call(object, key)) {
                            document.querySelector('#att_activity').innerHTML += `
                            <li>
                                <p class="mb-0">${key} at</p>
                                <p class="res-activity-time">
                                    <i class="fa fa-clock-o"></i>
                                    ${object[key]}
                                </p>
                            </li>`;
                        }
                    }
                });

                $("#attendance_info").modal()
            }
        </script>
    @endsection

</x-layouts.app>

