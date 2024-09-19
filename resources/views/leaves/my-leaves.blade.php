<x-layouts.app>

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Leaves</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/index">Dashboard</a></li>
                            <li class="breadcrumb-item active">My Leaves</li>
                        </ul>

                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i
                                class="fa fa-plus"></i> Add Leave</a>
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

            <!-- Leave Statistics -->
            <div class="row">
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Leaves Alloted</h6>
                        <h4>{{floor($emp_leave->leaves_alloted) ?? 0}}</h4>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Remaining Leave</h6>
                        <h4>{{floor($emp_leave->remaining_leaves) ?? 0}}</h4>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="stats-info">
                        <h6>Paid Leaves</h6>
                        <h4>{{$emp_leave->PL ?? 0}}</h4>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="stats-info">
                        <h6>Sick Leaves</h6>
                        <h4>{{$emp_leave->SL ?? 0}}</h4>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="stats-info">
                        <h6>ALWP</h6>
                        <h4>{{$emp_leave->ALWP ?? 0}}</h4>
                    </div>
                </div>
            </div>
            <!-- /Leave Statistics -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>No of Days</th>
                                    <th>Reason</th>
                                    <th class="text-center">Status</th>
                                    <th>Approved by</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $leaves)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $leaves->leave_type }}</td>
                                        <td>{{ $leaves->from_date }}</td>
                                        <td>{{ $leaves->to_date }}</td>
                                        <td>{{ $leaves->no_days }}</td>
                                        <td>{{ $leaves->leave_reason_subject }}</td>

                                        <td class="text-center">
                                            <div class="action-label">
                                                <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                                    <i
                                                        class="fa fa-dot-circle-o text-{{ $leaves->status == 'Pending' ? 'info' : ( $leaves->status == "Approved By Manager" ? "success" : ($leaves->status == 'Approved' ? 'success' : 'danger')) }}"></i>
                                                    {{ $leaves->status == 'Pending' ? 'Pending' : ( $leaves->status == "Approved By Manager" ? "Approved By Manager" : ($leaves->status == 'Approved' ? 'Approved' : "Declined")) }}
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($leaves->approved_by)
                                                <h2 class="table-avatar">
                                                    {{-- <a href="{{url('')}}/profile" class="avatar avatar-xs"><img
                                                            src="assets/img/profiles/avatar-09.jpg" alt=""></a> --}}
                                                    <a href="#">{{$leaves->approved_by_name}}</a>
                                                </h2>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    {{-- <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i>
                                                        Edit</a> --}}
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#delete_approve"><i
                                                            class="fa fa-trash-o m-r-5"></i>
                                                        Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <!-- /Page Content -->


        <!-- Add Leave Modal -->
        <div id="add_leave" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Leave</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('leaves/my-leaves') }} ">
                            @csrf
                            <input type="hidden" name="employee_id" id="employee_id" value="{{ $emp->id }}">

                            <div class="form-group">
                                <label>Leave Type <span class="text-danger">*</span></label>
                                <select class="select" name="leave_type" onchange="calc_start_date(event,this)">
                                    <option selected disabled>Select Leave Type</option>
                                    <option>ALWP</option>
                                    @php
                                        $days_after_joining = \Carbon\Carbon::createFromFormat(
                                            'Y-m-d',
                                            $emp->joining_date,
                                        )->diffInDays(Carbon\Carbon::now());
                                        $leaves_on_probation = $emp->employee_leave ? $emp->employee_leave->ALWP : 0;
                                        $days_left_for_probation = 180 - $days_after_joining + $leaves_on_probation;
                                    @endphp
                                    <option {{$days_left_for_probation > 0 ? 'disabled' : ''}} >Paid Leave</option>
                                    <option>Sick Leave</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>From <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text" id="datepicker-start" name="from_date" onchange="calc_no_days()">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>To <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text" id="datepicker-end" name="to_date" onchange="calc_no_days()">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Number of days <span class="text-danger">*</span></label>
                                <input class="form-control" readonly  type="text" id="no_days" name="no_days">
                            </div>
                            <div class="form-group">
                                <label>Leave Reason(Subject) <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="leave_reason_subject">
                            </div>
                            <div class="form-group">
                                <label>Leave Reason(Body) <span class="text-danger">*</span></label>
                                <textarea rows="4" class="form-control" name="leave_reason_body"></textarea>
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Leave Modal -->





        <!-- Delete Leave Modal -->
        <div class="modal custom-modal fade" id="delete_approve" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Employee</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal"
                                        class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Leave Modal -->

    </div>
    <!-- /Page Wrapper -->

    @section('page-level-script')
        <script>
            $(".datetimepicker").on("dp.change", function(e) {
                        let pickedDate = $("#datepicker-start").val();
                        console.log(pickedDate);
                        calc_no_days();
                    });

            function calc_no_days() {
                let date1 = document.querySelector("[name=from_date]").value;
                let date2 = document.querySelector("[name=to_date]").value;

                date1 = new Date(date1);
                date2 = new Date(date2);

                // Calculating the time difference of two dates
                let Difference_In_Time = date2.getTime() - date1.getTime();

                // Calculating the no. of days between two dates
                let Difference_In_Days = Math.round(Difference_In_Time / (1000 * 3600 * 24));

                // To display the final no. of days (result)
                // console.log
                //     ("Total number of days between dates:\n" +
                //         date1.toDateString() + " and " +
                //         date2.toDateString() +
                //         " is: " + Difference_In_Days + " days" ,Difference_In_Time);
                document.querySelector('#no_days').value = Difference_In_Days + 1;
            }

            // End date date and time picker
            $('#datepicker-end').datetimepicker({
                useCurrent: false
            });

            // start date picke on chagne event [select minimun date for end date datepicker]
            $("#datepicker-start").on("dp.change", function (e) {
                $('#datepicker-end').data("DateTimePicker").minDate(e.date);
            });
            // Start date picke on chagne event [select maxmimum date for start date datepicker]
            // $("#datepicker-end").on("dp.change", function (e) {
            //     $('#datepicker-start').data("DateTimePicker").maxDate(e.date);
            // });

            function calc_start_date(e, ele) {
                var date = new Date();
                if (ele.value == "Paid Leave") {
                    // adding 10 day
                    date.setDate(date.getDate() + 10);
                }

                $('#datepicker-start').data("DateTimePicker").minDate(date);

            }


        </script>
    @endsection
</x-layouts.app>
