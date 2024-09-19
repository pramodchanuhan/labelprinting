<x-layouts.app>


    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h3 class="page-title">Candidates List</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('')}}/index">Dashboard</a></li>
                            <li class="breadcrumb-item">Candidates List</li>
                            <!-- <li class="breadcrumb-item active">Aptitude Result</li> -->
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
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th class="text-center">Status</th>
                                    <th>Actions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach( $Assesment_form as $Assesment_form)
                                <tr>
                                    <td>{{$Assesment_form->id}}</td>
                                    <td>{{$Assesment_form->candidateName}}</td>
                                    <td>{{$Assesment_form->phone}}</td>
                                    <td>{{$Assesment_form->email}}</td>
                                    <td>{{$Assesment_form->position}}</td>
                                    <td class="text-center">
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-dot-circle-o text-danger"></i> Action pending </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Resume selected</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Resume Rejected</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Aptitude Selected</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Aptitude rejected</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> video call selected</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Video call rejected</a>
                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Offered</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>

                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" data-toggle="modal" href="#" data-target="#selectinterviewmode"><i class="fa fa-comment m-r-5 btn btn-info btn-sm btn-flat"></i>Conduct</a>
                                            <a class="dropdown-item" href="{{url('hrform')}}?id={{$Assesment_form->id}}"><i class="fa fa-eye m-r-5 btn btn-warning btn-sm edit btn-flat"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-pencil m-r-5 btn btn-success btn-sm edit btn-flat"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-trash-o m-r-5 btn btn-danger btn-sm delete btn-flat"></i> Delete</a>
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

    </div>
    <!-- /Page Wrapper -->

</x-layouts.app>
