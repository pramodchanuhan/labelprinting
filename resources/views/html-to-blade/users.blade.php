<x-layouts.app>


			<!-- Page Wrapper -->
            <div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Users</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('')}}/index">Dashboard</a></li>
									<li class="breadcrumb-item active">Users</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add User</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<!-- Search Filter -->
					<div class="row filter-row">
						<div class="col-sm-6 col-md-3">
							<div class="form-group form-focus">
								<input type="text" class="form-control floating">
								<label class="focus-label">Name</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group form-focus select-focus">
								<select class="select floating">
									<option>Select Company</option>
									<option>Global Technologies</option>
									<option>Delta Infotech</option>
								</select>
								<label class="focus-label">Company</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group form-focus select-focus">
								<select class="select floating">
									<option>Select Roll</option>
									<option>Web Developer</option>
									<option>Web Designer</option>
									<option>Android Developer</option>
									<option>Ios Developer</option>
								</select>
								<label class="focus-label">Role</label>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<a href="#" class="btn btn-success btn-block"> Search </a>
						</div>
                    </div>
					<!-- /Search Filter -->

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
											<th>Company</th>
											<th>Created Date</th>
											<th>Role</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="{{url('')}}/profile" class="avatar"><img src="{{asset('')}}assets/img/profiles/avatar-21.jpg" alt=""></a>
													<a href="{{url('')}}/profile">Daniel Porter <span>Admin</span></a>
												</h2>
											</td>
											<td>danielporter@example.com</td>
											<td>Dreamguy's Technologies</td>
											<td>1 Jan 2013</td>
											<td>
												<span class="badge bg-inverse-danger">Admin</span>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_user"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="{{url('')}}/profile" class="avatar"><img alt="" src="{{asset('')}}assets/img/profiles/avatar-02.jpg"></a>
													<a href="{{url('')}}/profile">John Doe <span>Web Designer</span></a>
												</h2>
											</td>
											<td>johndoe@example.com</td>
											<td>Dreamguy's Technologies</td>
											<td>1 Jan 2013</td>
											<td>
											<span class="badge bg-inverse-success">Employee</span>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_user"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="{{url('')}}/profile" class="avatar"><img alt="" src="{{asset('')}}assets/img/profiles/avatar-09.jpg"></a>
													<a href="{{url('')}}/profile">Richard Miles <span>Admin</span></a>
												</h2>
											</td>
											<td>richardmiles@example.com</td>
											<td>Dreamguy's Technologies</td>
											<td>1 Jan 2013</td>
											<td>
												<span class="badge bg-inverse-success">Employee</span>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_user"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="{{url('')}}/profile" class="avatar"><img alt="" src="{{asset('')}}assets/img/profiles/avatar-10.jpg"></a>
													<a href="{{url('')}}/profile">John Smith <span>Android Developer</span></a>
												</h2>
											</td>
											<td>johnsmith@example.com</td>
											<td>Dreamguy's Technologies</td>
											<td>1 Jan 2013</td>
											<td>
												<span class="badge bg-inverse-success">Employee</span>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_user"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="{{url('')}}/profile" class="avatar"><img alt="" src="{{asset('')}}assets/img/profiles/avatar-05.jpg"></a>
													<a href="{{url('')}}/profile">Mike Litorus <span>IOS Developer</span></a>
												</h2>
											</td>
											<td>mikelitorus@example.com</td>
											<td>Dreamguy's Technologies</td>
											<td>1 Jan 2013</td>
											<td>
												<span class="badge bg-inverse-success">Employee</span>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_user"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="{{url('')}}/profile" class="avatar"><img alt="" src="{{asset('')}}assets/img/profiles/avatar-11.jpg"></a>
													<a href="{{url('')}}/profile">Wilmer Deluna <span>Team Leader</span></a>
												</h2>
											</td>
											<td>wilmerdeluna@example.com</td>
											<td>Dreamguy's Technologies</td>
											<td>1 Jan 2013</td>
											<td>
												<span class="badge bg-inverse-success">Employee</span>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_user"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="table-avatar">
													<a href="{{url('')}}/profile" class="avatar"><img src="{{asset('')}}assets/img/profiles/avatar-19.jpg" alt=""></a>
													<a href="{{url('')}}/profile">Barry Cuda <span>Global Technologies</span></a>
												</h2>
											</td>
											<td>barrycuda@example.com</td>
											<td>Global Technologies</td>
											<td>1 Jan 2013</td>
											<td>
												<span class="badge bg-inverse-info">Client</span>
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_user"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->

				<!-- Add User Modal -->
				<div id="add_user" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add User</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>First Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Last Name</label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Username <span class="text-danger">*</span></label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Email <span class="text-danger">*</span></label>
												<input class="form-control" type="email">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Password</label>
												<input class="form-control" type="password">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Confirm Password</label>
												<input class="form-control" type="password">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Phone </label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Role</label>
												<select class="select">
													<option>Admin</option>
													<option>Client</option>
													<option>Employee</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Company</label>
												<select class="select">
													<option>Global Technologies</option>
													<option>Delta Infotech</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Employee ID <span class="text-danger">*</span></label>
												<input type="text" class="form-control floating">
											</div>
									   </div>
									</div>
									<div class="table-responsive m-t-15">
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
													<td>Employee</td>
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
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
												</tr>
												<tr>
													<td>Holidays</td>
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
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
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
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
												</tr>
												<tr>
													<td>Events</td>
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
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add User Modal -->

				<!-- Edit User Modal -->
				<div id="edit_user" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit User</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>First Name <span class="text-danger">*</span></label>
												<input class="form-control" value="John" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Last Name</label>
												<input class="form-control" value="Doe" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Username <span class="text-danger">*</span></label>
												<input class="form-control" value="johndoe" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Email <span class="text-danger">*</span></label>
												<input class="form-control" value="johndoe@example.com" type="email">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Password</label>
												<input class="form-control" type="password">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Confirm Password</label>
												<input class="form-control" type="password">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Phone </label>
												<input class="form-control" value="9876543210" type="text">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Role</label>
												<select class="select">
													<option>Admin</option>
													<option>Client</option>
													<option selected>Employee</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Company</label>
												<select class="select">
													<option>Global Technologies</option>
													<option>Delta Infotech</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Employee ID <span class="text-danger">*</span></label>
												<input type="text" value="FT-0001" class="form-control floating">
											</div>
									   </div>
									</div>
									<div class="table-responsive m-t-15">
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
													<td>Employee</td>
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
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
												</tr>
												<tr>
													<td>Holidays</td>
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
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
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
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
												</tr>
												<tr>
													<td>Events</td>
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
														<input checked="" type="checkbox">
													</td>
													<td class="text-center">
														<input checked="" type="checkbox">
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit User Modal -->

				<!-- Delete User Modal -->
				<div class="modal custom-modal fade" id="delete_user" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete User</h3>
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
				<!-- /Delete User Modal -->

            </div>
			<!-- /Page Wrapper -->

</x-layouts.app>


