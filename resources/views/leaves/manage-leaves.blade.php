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
                            <li class="breadcrumb-item active">Manage Leaves</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Leave Statistics -->
            {{-- <div class="row">
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Today Presents</h6>
                        <h4>12 / 60</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Planned Leaves</h6>
                        <h4>8 <span>Today</span></h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Unplanned Leaves</h6>
                        <h4>0 <span>Today</span></h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-info">
                        <h6>Pending Requests</h6>
                        <h4>12</h4>
                    </div>
                </div>
            </div> --}}
            <!-- /Leave Statistics -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped custom-table mb-0 ">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>No of Days</th>
                                    <th>Reason</th>
                                    <th class="text-center">Status</th>
                                    <th class="">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $leaves)
                                <tr>
                                    <td class="sorting_1">
                                        <h2 class="table-avatar">
                                            <a href="profile" class="avatar"><img style="height: 100%;" alt="" src="{{ $leaves->profile_pic ? asset("storage/$leaves->profile_pic") : asset('assets/img/noimg.png') }}"></a>
                                            <a>	{{ " $leaves->f_name  $leaves->l_name " }}  <span>{{$designation[$leaves->designation_id]}}</span></a>
                                        </h2>
                                    </td>
                                    <td>{{ $leaves->leave_type }}</td>
                                    <td>{{ $leaves->from_date }}</td>
                                    <td>{{ $leaves->to_date }}</td>
                                    <td>{{ $leaves->no_days }}</td>
                                    <td>{{ $leaves->leave_reason_subject }}</td>
                                    {{-- <td class="text-center">
                                        <div class="dropdown action-label">
                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-dot-circle-o text-danger"></i> Declined
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">

                                                <a class="dropdown-item" href="#"><i
                                                        class="fa fa-dot-circle-o text-info"></i> Pending</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#approve_leave"><i
                                                        class="fa fa-dot-circle-o text-success"></i> Approved</a>
                                                <a class="dropdown-item" href="#"><i
                                                        class="fa fa-dot-circle-o text-danger"></i> Declined</a>
                                            </div>
                                        </div>
                                    </td> --}}

                                    <td class="text-center">
                                        <div class="dropdown action-label">
                                            <select id="status_{{ $leaves->id }}"
                                                class="form-select btn btn-white btn-sm btn-rounded "
                                                aria-label="Default select example" >
                                                    <option {{ $leaves->status == "Pending" ? 'selected' : '' }}>Pending</option>
                                                    <option {{ $leaves->status == "Approved By Manager" ? 'selected' : '' }}>Approved By Manager</option>
                                                    @role('hr manager|hr')
                                                    <option {{ $leaves->status == "Approved" ? 'selected' : '' }}>Approved</option>
                                                    @endrole
                                                    <option {{ $leaves->status == "Declined" ? 'selected' : '' }}>Declined</option>
                                            </select>
                                        </div>
                                    </td>

                                    <td>

                                        <a class="" data-toggle="modal" href=""
                                            onclick="update_leave({{ $leaves->id }})">
                                            <i class="fa fa-save m-r-5 btn btn-info btn-sm   btn-flat"></i>
                                        </a>

                                        <a class="" href=""
                                            onclick="event.preventDefault(); delete_leave( {{ $leaves->id }} ,this);">
                                            <i class="fa fa-trash-o m-r-5 btn btn-danger btn-sm delete btn-flat"></i>
                                        </a>

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

    @section('page-level-script')
        <script>
            $('#datatable').dataTable( {
                "order": [],
                // order: [[3, 'desc']]
                // ordering: false,
                // "aaSorting": [],
                // columnDefs: [ { orderable: false, targets: [0] } ]
            } );

            function update_leave(id) {
                let status = document.getElementById(`status_${id}`);

                let status_val = status.value

                let data = {
                    status: status_val,
                    id: id,
                    _token: "{{ csrf_token() }}",
                    _method:"PUT",
                }
                const response = fetch(`manage-leaves/${id}`, {
                        method: "post",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify(data),
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        // console.log(data);

                        toastMixin.fire({
                            showClass: true,
                            icon: 'success',
                            title: data.message,
                        });
                    })

            }

            function delete_leave (id ,ele){

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        let data = {
                            _token: "{{ csrf_token() }}",
                            _method:"delete",
                        }
                        const response = fetch(`manage-leaves/${id}`, {
                            method: "post",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify(data),
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            // console.log(data);
                            ele.closest('tr').style.display = 'none';
                            toastMixin.fire({
                                showClass: true,
                                icon: 'success',
                                title: data.message,
                            });
                        })
                    }
                });
            }
        </script>
    @endsection

</x-layouts.app>
