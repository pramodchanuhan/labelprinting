<x-layouts.app>

    @section('title', 'attendance-employee')
    @section('page-level-style')
    <style>

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
                        <h3 class="page-title">Attendance</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active">Attendance</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-6">
                    <div class="card punch-status">
                        <div class="card-body">
                            <h5 class="card-title">Timesheet <small class="text-muted">{{now()->toFormattedDateString()}}</small></h5>
                            <div class="punch-det">
                                <h6>Punch In at</h6>
                                <p>{{ isset($curr_attendance[0]) ? Carbon\Carbon::create($curr_attendance[0]->{'Punch In'})->toDayDateTimeString() : "--"}}</p>
                            </div>
                            <div class="punch-info">
                                <div class="punch-hours">
                                    {{-- <span>3.45 hrs</span> --}}
                                    <span>{{isset($current_attendance) ? Carbon\CarbonInterval::seconds($current_attendance->working)->cascade()->forHumans($short = true) : "00"}}</span>
                                </div>
                            </div>
                            <div class="punch-btn-section">
                                <button type="button" id="punch-btn" onclick="punch_in_out(event,this)" class="btn {{$emp->status ? 'btn-primary' : 'btn-info'}} punch-btn">Punch {{$emp->status ? 'Out' : 'In'}}</button>
                                </div>

                            <div class="statistics">
                                <div class="row">
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box">
                                            <p>Break</p>
                                            {{-- <h6>1.21 hrs</h6> --}}
                                            <h6>{{isset($current_attendance) ? ($current_attendance->break ? Carbon\CarbonInterval::seconds($current_attendance->break)->cascade()->forHumans($short = true) : "0s" ) : "00"}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 text-center">
                                        <div class="stats-box">
                                            <p>Overtime</p>
                                            {{-- <h6>3 hrs</h6> --}}
                                            <h6>{{isset($current_attendance) ? ($current_attendance->working >28800 ? Carbon\CarbonInterval::seconds($current_attendance->working - 28800)->cascade()->forHumans($short = true) : "0s" ) : "00"}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="card att-statistics">
                        <div class="card-body">
                            <h5 class="card-title">Statistics</h5>
                            <div class="stats-list">
                                <div class="stats-info">
                                    <p>Today <strong>3.45 <small>/ 8 hrs</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>This Week <strong>28 <small>/ 40 hrs</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>This Month <strong>90 <small>/ 160 hrs</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>Remaining <strong>90 <small>/ 160 hrs</small></strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="stats-info">
                                    <p>Overtime <strong>4</strong></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-6">
                    <div class="card recent-activity">
                        <div class="card-body">
                            <h5 class="card-title">Today Activity</h5>
                            <ul class="res-activity-list">
                                {{-- <li>
                                    <p class="mb-0">Punch In at</p>
                                    <p class="res-activity-time">
                                        <i class="fa fa-clock-o"></i>
                                        10.00 AM.
                                    </p>
                                </li> --}}
                                @foreach ($curr_attendance as $items)
                                    @foreach ($items as $key=>$value )
                                    <li>
                                        <p class="mb-0">{{$key}} at</p>
                                        <p class="res-activity-time">
                                            <i class="fa fa-clock-o"></i>
                                            {{\Carbon\Carbon::create($value)->toTimeString()}}
                                        </p>
                                    </li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Filter -->
            <div class="row filter-row">
                <div class="col-sm-3">
                    <div class="form-group form-focus">
                        <div class="cal-icon">
                            <input type="text" class="form-control floating datetimepicker">
                        </div>
                        <label class="focus-label">Date</label>
                    </div>
                </div>
                <div class="col-sm-3">
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
                <div class="col-sm-3">
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
                <div class="col-sm-3">
                    <a href="#" class="btn btn-success btn-block"> Search </a>
                </div>
            </div>
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    {{-- <th>No</th> --}}
                                    <th>Date </th>
                                    <th>Punch In</th>
                                    <th>Punch Out</th>
                                    <th>Production</th>
                                    <th>Break</th>
                                    <th>Overtime</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                                    <td>1</td>
                                    <td>19 Feb 2019</td>
                                    <td>10 AM</td>
                                    <td>7 PM</td>
                                    <td>9 hrs</td>
                                    <td>1 hrs</td>
                                    <td>0</td>
                                </tr> --}}
                                {{-- @dd($attendance->d13->attendance[0]->{"Punch In"},count($attendance->d13->attendance),now("+05:30")) --}}
                                @for ($i=1 ; $i <= Carbon\Carbon::now()->daysInMonth; $i++)
                                <tr>
                                    @php
                                        // if ($attendance->{"d$i"} == null || $i == now("+05:30")->day) {
                                        if ($attendance->{"d$i"} == null || $attendance->{"d$i"} == "on leave") {
                                            continue;
                                        }
                                    @endphp
                                    {{-- <td>{{$i}}</td> --}}
                                    <td>{{"$i-$attendance->month_year"}}</td>
                                    <td>{{\Carbon\Carbon::create($attendance->{"d$i"}->attendance[0]->{"Punch In"})->toTimeString() }}</td>
                                    <td>{{ isset($attendance->{"d$i"}->attendance[count($attendance->{"d$i"}->attendance)-1]->{"Punch Out"}) ?  \Carbon\Carbon::create($attendance->{"d$i"}->attendance[count($attendance->{"d$i"}->attendance)-1]->{"Punch Out"})->toTimeString() : "--" }}</td>
                                    <td>{{Carbon\CarbonInterval::seconds($attendance->{"d$i"}->working + $attendance->{"d$i"}->break)->cascade()->forHumans($short = true) }}</td>
                                    <td>{{Carbon\CarbonInterval::seconds($attendance->{"d$i"}->break)->cascade()->forHumans($short = true) }}</td>
                                    <td>{{($attendance->{"d$i"}->working >28800 ? Carbon\CarbonInterval::seconds($attendance->{"d$i"}->working - 28800)->forHumans($short = true) : "0s" )}}</td>
                                </tr>
                                @endfor

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->

        </div>
        <!-- /Page Content -->

        <form action="{{ url('attendance/mark') }}" id="mark_attendance"
            method="POST">
            @csrf
            <input type="hidden" id="mark_attendance_in" name="mark_attendance_in"
                value="">
        </form>

    </div>
    <!-- /Page Wrapper -->

    @section('page-level-script')
    <script>

        function punch_in_out(e,ele){
            // console.log(e,ele,ele.innerText,ele.classList);
            mark_attendance = document.getElementById('mark_attendance');
            mark_attendance_in = document.getElementById('mark_attendance_in');

            if(ele.innerText == "Punch In"){
                ele.classList.remove('btn-info');
                ele.classList.add('btn-primary');
                ele.innerText= "Punch Out";
                mark_attendance_in.value = 'Punch In';

            }
            else{
                ele.classList.remove('btn-primary');
                ele.classList.add('btn-info');
                ele.innerText= "Punch In";
                mark_attendance_in.value = 'Punch Out';
            }

            mark_attendance.submit();

        }

    </script>
    @endsection

</x-layouts.app>
