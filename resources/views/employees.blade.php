<x-layouts.app>

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

        <section class="content">
                <div class="card">
                    <div class="card-body">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}/index">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ url('') }}/empcreate" class="btn add-btn" ><i class="fa fa-plus"></i> Add Employee</a>   
                        <div class="view-icons">
                            <a href="{{ url('') }}/employees" class="grid-view btn btn-link active"><i
                                    class="fa fa-th"></i></a>
                            <a href="{{ url('') }}/employees" class="list-view btn btn-link"><i
                                    class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            <!-- <div class="row filter-row">
      <div class="col-sm-6 col-md-3">
       <div class="form-group form-focus">
        <input type="text" class="form-control floating">
        <label class="focus-label">Employee ID</label>
       </div>
      </div>
      <div class="col-sm-6 col-md-3">
       <div class="form-group form-focus">
        <input type="text" class="form-control floating">
        <label class="focus-label">Employee Name</label>
       </div>
      </div>
      <div class="col-sm-6 col-md-3">
       <div class="form-group form-focus select-focus">
        <select class="select floating">
         <option>Select Designation</option>
         <option>Web Developer</option>
         <option>Web Designer</option>
         <option>Android Developer</option>
         <option>Ios Developer</option>
        </select>
        <label class="focus-label">Designation</label>
       </div>
      </div>
      <div class="col-sm-6 col-md-3">
       <a href="#" class="btn btn-success btn-block"> Search </a>
      </div>
                    </div> -->
            <!-- Search Filter -->

            <!-- <div class="row staff-grid-row">
                @foreach ($employees as $employee)
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="@role('hr manager') {{url("/profile?emp_id=$employee->id")}} @endrole" class="avatar bg-white">
                                    @php
                                        $profile_pic='';
                                        if ($employee->employees_info) {
                                            $profile_pic = $employee->employees_info->profile_pic;
                                        }
                                    @endphp
                                    <img style="height: 100%;" src="{{ $profile_pic ? asset("storage/$profile_pic") :  asset('assets/img/user.jpg')  }}" alt="user"></a>
                            </div>
                            {{-- <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div> --}}
                            <h4 class="user-name m-t-10 mb-0 text-ellipsis">{{ ucfirst($employee->f_name) }}
                                    {{ ucwords($employee->l_name) }}</h4>
                            <div class="small text-muted">{{ $employee->designation_name }}</div>
                        </div>
                    </div>
                @endforeach
            </div> -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i=1;  ?>
                                @foreach ($User as $Users)
                                <tr>
                                    <td><?php if($i >0) { echo $i++;}?></td>
                                    <td>{{ $Users->name }}</td>
                                    <td>{{ $Users->l_name }}</td>
                                    <td>{{ $Users->username }}</td>
                                    <td>{{ $Users->email }}</td>
                                    <td>{{ $Users->mobile_no }}</td>
                                    <td>{{ $Users->role_name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- /Page Content -->


            <!-- Add Employee Modal -->
            <div id="add_employee" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('employees-store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">First Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="f_name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <span class="text-red-500"> <strong>{{ $message }}</strong> </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Last Name</label>
                                            <input class="form-control" type="text" name="l_name"
                                                value="{{ old('l_name') }}">
                                            @error('l_name')
                                                <span class="text-red-500"> <strong>{{ $message }}</strong> </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Username <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="username"
                                                value="{{ old('username') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Email <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Create Password</label>
                                            <input class="form-control" type="password" name="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Confirm Password</label>
                                            <input class="form-control" type="password" name="password_confirmation">
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6">
											<div class="form-group">
												<label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
												<input type="text" class="form-control">
											</div>
										</div> --}}
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Joining Date <span
                                                    class="text-danger">*</span></label>
                                            <div class="cal-icon"><input id="datepicker"
                                                    class="form-control datetimepicker" type=""
                                                    name="joining_date"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Phone </label>
                                            <input class="form-control" type="tel" name="mobile_no"
                                                value="{{ old('mobile_no') }}">
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Company</label>
                                            <select class="select" name="company_id" onchange="fill_employee_id(event,this)" >
                                                <option hidden disabled selected>Select Company</option>

                                                @foreach ($Company as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
                                                {{-- @foreach ($Designation as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach --}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Reports To <span
                                                    class="text-danger"></span></label>
                                            <select id="select_reports_to" class="select" name="reports_to">
                                                <option hidden disabled selected>Select Designation First</option>
                                                {{-- @foreach ($Designation as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach --}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Employee ID </label>
                                            <input class="form-control" name="emp_id" id="emp_id" value="Select Company First" placeholder="Employee ID"
                                                type="text">
                                        </div>
                                    </div> -->

                                </div>
                                {{-- <div class="table-responsive m-t-15">
										<table class="table table-striped custom-table">
											<thead>
												<tr>
													<th>Module Permission</th>
													<th class="text-center">Read</th>
													<th class="text-center">Write</th>
													<th class="text-center">Create</th>
													<th class="text-center">Delete</th>
													<th class="text-center">Import</th>
													<th class="text-center">Export</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Holidays</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
												</tr>
												<tr>
													<td>Leaves</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
												</tr>
												<tr>
													<td>Clients</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
												</tr>
												<tr>
													<td>Projects</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
												</tr>
												<tr>
													<td>Tasks</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
												</tr>
												<tr>
													<td>Chats</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
												</tr>
												<tr>
													<td>Assets</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
												</tr>
												<tr>
													<td>Timing Sheets</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
													<td class="text-center">
														<input type="checkbox">
													</td>
												</tr>
											</tbody>
										</table>
									</div> --}}
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                            {{-- @foreach ($errors->all() as $message)
                                    {{$message}}
                                @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Employee Modal -->

            <!-- Edit Employee Modal -->
            <!-- /Edit Employee Modal -->

            <!-- Delete Employee Modal -->
            <div class="modal custom-modal fade" id="delete_employee" role="dialog">
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
            <!-- /Delete Employee Modal -->

        </div>
        <!-- /Page Wrapper -->

        @section('page-level-script')
        <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
    <script>
    document.getElementById('mobile_no').addEventListener('input', function() {
        var mobileInput = this;
        var errorSpan = document.getElementById('mobileError');

        if (mobileInput.validity.patternMismatch || mobileInput.value.length !== 10) {
            errorSpan.style.display = 'inline';
        } else {
            errorSpan.style.display = 'none';
        }
    });
</script>
            <script>

                $('.datetimepicker').datetimepicker({
                    format: 'YYYY-MM-DD'
                    // format: 'DD/MM/YYYY',
                    // format: 'DD-MM-YYYY',
                });

                let employees_in_comp = @json($employees_in_comp);

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

                console.log(designation_data, employee_data, employees_in_comp);

                function fill_employee_id(e,ele){
                    selected_company=employees_in_comp.find(o => o.company_id==ele.value);
                    nxt_emp_id=selected_company.nxt_emp_id;
                    document.getElementById('emp_id').value=nxt_emp_id;

                    // console.log(ele.value,nxt_emp_id,selected_company);

                }

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

                    let designation_department_data = designation_data.filter(o => o.department_id == f_designation_data
                        .department_id);

                    let reports_to_designations_data = designation_department_data.filter(o => o.role < f_designation_role);

                    let reports_to_data = [];
                    reports_to_designations_data.forEach(element => {
                        // reports to employees with designation of the loop
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

                // $(#select_department).on('change',function(e){
                //     console.log(e,e.value);
                // })

                @if ($errors->all())
                    console.log(@json($errors->all()));
                    window.onload = function() {
                        document.getElementById('add_employee_btn').click();
                    }
                    // window.onload = function() {
                    //     console.log('huu');
                    // }
                @endif

                // $(document).ready(function(){
                //     setTimeout(() => {

                //         // $('#datepicker').datepicker({
                //         // format: 'yyyy-mm-dd'
                //         // });
                //     }, 3000);
                // })
            </script>

        @endsection


</x-layouts.app>
