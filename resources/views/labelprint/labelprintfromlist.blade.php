<x-layouts.app>
    @section('title', 'All Interviews')

    @section('page-level-style')

    @endsection

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
                                <div class="col-12">
                                    <h3 class="page-title">All List</h3>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('') }}/index">Dashboard</a></li>
                                        <li class="breadcrumb-item">All List</li>
                                        <!-- <li class="breadcrumb-item active">Aptitude Result</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /Page Header -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped custom-table" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Prefix</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Local Area</th>
                                                <th>City</th>
                                                <th>District</th>
                                                <th>State</th>
                                                <th>Zip Code</th>
                                                <th>Date of Birth</th>
                                                <th>Partner Name</th>
                                                <th>Anniversary</th>
                                                <th>Partner DOB</th>
                                                <th>Options</th>
                                                <th>Contact Person</th>
                                                <th>STD Code</th>
                                                <th>Office</th>
                                                <th>Office 2</th>
                                                <th>Resident</th>
                                                <th>Fax</th>
                                                <th>Mobile No</th>
                                                <th>Mobile No 2</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>

                                        <tfoot>
                                            <tr>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- /Page Wrapper -->

    <!-- Interview mode Modal -->


    @section('page-level-script')

    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script> -->
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
              
                scrollX: true,
                processing: true,
                serverSide: true,
                stateSave: false,
                ajax: '{{ route("labelprint.labelprintfromlist") }}',
                columns: [{
                        data: 'index',
                        name: 'index'
                    },
                    {
                        data: 'prefix',
                        name: 'prefix'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'local_area',
                        name: 'local_area'
                    },
                    {
                        data: 'city',
                        name: 'city'
                    },
                    {
                        data: 'district',
                        name: 'district'
                    },
                    {
                        data: 'state',
                        name: 'state'
                    },
                    {
                        data: 'zip_code',
                        name: 'zip_code'
                    },
                    {
                        data: 'date_of_birth',
                        name: 'date_of_birth'
                    },
                    {
                        data: 'partner_name',
                        name: 'partner_name'
                    },
                    {
                        data: 'anniversary',
                        name: 'anniversary'
                    },
                    {
                        data: 'partner_dob',
                        name: 'partner_dob'
                    },
                    {
                        data: 'options',
                        name: 'options'
                    },
                    {
                        data: 'contact_person',
                        name: 'contact_person'
                    },
                    {
                        data: 'std_code',
                        name: 'std_code'
                    },
                    {
                        data: 'office',
                        name: 'office'
                    },
                    {
                        data: 'office2',
                        name: 'office2'
                    },
                    {
                        data: 'resident',
                        name: 'resident'
                    },
                    {
                        data: 'fax',
                        name: 'fax'
                    },
                    {
                        data: 'mobile_no',
                        name: 'mobile_no'
                    },
                    {
                        data: 'mobile_no2',
                        name: 'mobile_no2'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'action',
                        name: 'action',
                    }
                ]

            });
        });
    </script>


    @endsection

</x-layouts.app>