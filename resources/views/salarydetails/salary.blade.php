<x-layouts.app>

			<!-- Page Wrapper -->
            <div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Employee Salary</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Salary</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
							</div>
                            <div class="col-auto float-right ml-auto">
								{{-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i>Check Promotions List</a> --}}
								<a href="{{ url('salarydetails/salary?filter=eligible_for_appraisal') }}" class="btn btn-success btn-block">View Appraisal List</a>

                            </div>
						</div>
					</div>
					<!-- /Page Header -->



					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Employee</th>
											<th>Employee ID</th>
											<th>Email</th>
											<th>Join Date</th>
											{{-- <th>Designation</th> --}}
											<th>Salary</th>
											{{-- <th>Payslip</th> --}}
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach ($employeesalaries as $employeesalary)

                                        <tr>
                                            {{-- <td>
												<h2 class="table-avatar">
													<a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
													<a href="profile.html">{{ $employeesalary->f_name }} {{ $employeesalary->l_name }} <span>{{ $employeesalary->designation_id }}</span></a>
												</h2>
											</td> --}}
                                            <td class="sorting_1">
                                                <h2 class="table-avatar">
                                                    <a href="profile" class="avatar"><img style="height: 100%;" alt="" src="{{ $employeesalary->profile_pic ? asset("storage/$employeesalary->profile_pic") : asset('assets/img/noimg.png') }}"></a>
                                                    <a>	{{ " $employeesalary->f_name  $employeesalary->l_name " }}  <span>{{$designation[$employeesalary->designation_id]}}</span></a>
                                                </h2>

                                            </td>
											<td>{{ $employeesalary->employee_id }}</td>
											<td>{{ $employeesalary->work_email }}</td>
											<td>{{ $employeesalary->joining_date }}</td>
                                            <td>{{ $employeesalary->netSalary }}</td>
                                            <td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary" data-employee-id="{{ $employeesalary->id }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <ai class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</ai>
                                                    </div>
												</div>
											</td>
                                        </tr>

                                        @endforeach

                                        {{-- <tr>
											<td>
												<h2 class="table-avatar">
													<a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>

                                                    <a href="profile.html">John Doe <span>Web Designer</span></a>
												</h2>
											</td>
											<td>FT-0001</td>
											<td>johndoe@example.com</td>
											<td>1 Jan 2013</td>
											<td>
												<div class="dropdown">
													<a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Web Designer </a>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">Software Engineer</a>
														<a class="dropdown-item" href="#">Software Tester</a>
														<a class="dropdown-item" href="#">Frontend Developer</a>
														<a class="dropdown-item" href="#">UI/UX Developer</a>
													</div>
												</div>
											</td>
											<td>$59698</td>
											<td><a class="btn btn-sm btn-primary" href="salary-view.html">Generate Slip</a></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr> --}}
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->

				<!-- Add Salary Modal -->
				<div id="add_salary" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Employee Salary</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ url('salarydetails/salary-store') }}" method="POST">
									@csrf
                                    <div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Select Employee</label>
												<select class="select" name="employeeId" class="form-control" required>
                                                    <option value="">Select Employee</option>
                                                    @foreach($employees As $employee)
													<option value="{{ $employee->id }}">{{ $employee->f_name }} {{ $employee->l_name }}</option>
													{{-- <option>Richard Miles</option> --}}
                                                    @endforeach
												</select>
											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-sm-6">
											{{-- <h4 class="text-primary">Earnings</h4> --}}
											<div class="form-group">
                                                <label>Gross Salary</label>
                                                <input class="form-control" type="text" name="grossSalary" placeholder="Gross Salary">
                                            </div>
											<div class="form-group">
												<label>Provident Fund</label>
												<input class="form-control" type="text" name="providentfund" placeholder="Provident Fund">
											</div>
											<div class="form-group">
												<label>ESIC</label>
												<input class="form-control" type="text" name="esic" placeholder="ESIC">
											</div>
											{{-- <div class="form-group">
												<label>Others</label>
												<input class="form-control" type="text">
											</div>
											<div class="add-more">
												<a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
											</div> --}}
										</div>
										<div class="col-sm-6">
                                            <div class="form-group">
												<label>Professional Tax</label>
												<input class="form-control" type="text" name="professionaltax" placeholder="Professional Tax">
											</div>
											<div class="form-group">
												<label>Deposit (Applicable only for first 11 months)</label>
												<input class="form-control" type="text" name="deposit" placeholder="Deposit (Applicable only for first 11 months)">
											</div>
											<div class="form-group">
												<label>Net Salary</label>
												<input class="form-control" type="text" name="netSalary" placeholder="Net Salary">
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
				<!-- /Add Salary Modal -->

				<!-- Edit Salary Modal -->
				<div id="edit_salary" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-md" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Employee Salary</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ url('salarydetails/salary-update') }}" method="POST" enctype="multipart/form-data">
									@csrf
                                    @method('PUT')
                                    <input type="hidden" name="employee_id" id="employee_id" value="">
									{{-- <div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Select Employee</label>
												<select class="select" name="employeeId" class="form-control" required>
                                                    <option value="">Select Employee</option>
                                                    @foreach($employees As $employee)
													<option value="{{ $employee->id}}">{{ $employee->f_name}} {{ $employee->l_name}}</option>
                                                    @endforeach
												</select>
											</div>
										</div>
									</div> --}}
									<div class="row">
										<div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gross Salary</label>
                                                <input class="form-control" type="text" name="grossSalary" value="" required>
                                            </div>
											<div class="form-group">
												<label>Provident Fund</label>
												<input class="form-control" type="text" name="providentfund" value="">
											</div>
											<div class="form-group">
												<label>ESIC</label>
												<input class="form-control" type="text" name="esic" value="">
											</div>
                                            {{-- <div class="form-group">
												<p>if this edit is update or appraisal:</p>
                                                <div class="d-flex">
                                                    <input type="radio" name="ifAppraisal" value="Yes">
                                                    <label for="yes">Appraisal</label><br>
                                                    <input type="radio" name="ifAppraisal" value="No" checked>
                                                    <label for="no">Update</label><br>
                                                </div>
											</div> --}}
                                            <div class="form-group">
                                                <label>if this edit is update or appraisal:</label><br>
                                                <div class="custom-file position-relative">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="ifAppraisal" class="form-check-input" value="Yes">
                                                        <label class="form-check-label">Appraisal</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="ifAppraisal" class="form-check-input" value="No" checked="">
                                                        <label class="form-check-label">Update</label>
                                                    </div>
                                                </div>
                                            </div>
										</div>
										<div class="col-sm-6">
                                            <div class="form-group">
												<label>Professional Tax</label>
												<input class="form-control" type="text" name="professionaltax" value="">
											</div>
											<div class="form-group">
												<label>Deposit</label>
												<input class="form-control" type="text" name="deposit" value="">
											</div>
											<div class="form-group">
												<label>Net Salary:</label>
												<input class="form-control" type="text" name="netSalary" value="" required>
											</div>
										</div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Upload Documents</label>
                                                <input class="form-control" type="file" name="documents" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Comment</label>
                                                <textarea class="form-control" type="text" name="comment" value=""></textarea>
                                            </div>
                                        </div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Salary Modal -->

				<!-- Delete Salary Modal -->
				<div class="modal custom-modal fade" id="delete_salary" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Salary</h3>
									<p>Are you sure want to delete?</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Delete Salary Modal -->

            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="assets/js/jquery-3.5.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>

		<!-- Select2 JS -->
		<script src="assets/js/select2.min.js"></script>

		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

		<!-- Datatable JS -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap4.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
        <script>
            $('#edit_salary').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var employeeId = button.data('employee-id');
                var modal = $(this);
                modal.find('.modal-body #employee_id').val(employeeId);
            });
        </script>

</x-layouts.app>
