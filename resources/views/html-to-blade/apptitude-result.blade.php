<x-layouts.app>


			<!-- Page Wrapper -->
            <div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col-12">
								<h3 class="page-title">Aptitude Result</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('')}}/index">Dashboard</a></li>
									<li class="breadcrumb-item">Jobs</li>
									<li class="breadcrumb-item active">Aptitude Result</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table mb-0 datatable">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Job Title</th>
											<th>Department</th>
											<th>Category Wise Mark</th>
											<th>Total Mark</th>
											<th class="text-center">Status</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>
												<h2 class="table-avatar">
													<a href="{{url('')}}/profile" class="avatar"><img alt="" src="{{asset('')}}assets/img/profiles/avatar-02.jpg"></a>
													<a href="{{url('')}}/profile">John Doe <span>Web Designer</span></a>
												</h2>
											</td>
											<td><a href="{{url('')}}/job-details">Web Developer</a></td>
											<td>Development</td>
											<td>html - <b>1</b><br>Level1 - <b>0</b><br></td>
											<td class="text-center">1</td>
											<td class="text-center">
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-danger"></i> Action pending								</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Resume selected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i>  Resume Rejected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i>  Aptitude Selected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i>  Aptitude rejected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i>  video call selected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i>  Video call rejected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i>  Offered</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>
												<h2 class="table-avatar">
													<a href="{{url('')}}/profile" class="avatar"><img alt="" src="{{asset('')}}assets/img/profiles/avatar-09.jpg"></a>
													<a href="{{url('')}}/profile">Richard Miles <span>Web Developer</span></a>
												</h2>
											</td>
											<td><a href="{{url('')}}/job-details">Web Designer</a></td>
											<td>Designing</td>
											<td>html - <b>1</b><br>Level1 - <b>0</b><br></td>
											<td class="text-center">1</td>
											<td class="text-center">
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-danger"></i> Action pending								</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Resume selected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i>  Resume Rejected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i>  Aptitude Selected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i>  Aptitude rejected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i>  video call selected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i>  Video call rejected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i>  Offered</a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>
												<h2 class="table-avatar">
													<a href="{{url('')}}/profile" class="avatar"><img alt="" src="{{asset('')}}assets/img/profiles/avatar-10.jpg"></a>
													<a href="{{url('')}}/profile">John Smith <span>Android Developer</span></a>
												</h2>
											</td>
											<td><a href="{{url('')}}/job-details">Android Developer</a></td>
											<td>Android</td>
											<td>html - <b>1</b><br>Level1 - <b>0</b><br></td>
											<td class="text-center">1</td>
											<td class="text-center">
												<div class="dropdown action-label">
													<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
													<i class="fa fa-dot-circle-o text-danger"></i> Action pending								</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Resume selected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i>  Resume Rejected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i>  Aptitude Selected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i>  Aptitude rejected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i>  video call selected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i>  Video call rejected</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i>  Offered</a>
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

            </div>
			<!-- /Page Wrapper -->

</x-layouts.app>
