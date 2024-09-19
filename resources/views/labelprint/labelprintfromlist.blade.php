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
                                                <th>Prefix With</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Local Area</th>
                                                <th>City</th>
                                                <th>District</th>
                                                <th>State</th>
                                                <th>Zip Code</th>
                                                <th>Options</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                <!-- <th>Starting Point</th>
                                                <th>Remark</th>
                                                <th>Amount</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Labelprintfrom as $index => $Labelprint)
                                            <tr>
                                                <!-- Display the index starting from 1 -->
                                                <td>{{ $index + 1 }}</td>
                                                <!-- Print button with trip ID -->
                                                
                                                <!-- Display ticket details -->
                                                <td>{{ $Labelprint->prefix }}</td>
                                                <td>{{ $Labelprint->name }}</td>
                                                <td>{{ $Labelprint->address }}</td>
                                                <td>{{ $Labelprint->local_area }}</td>
                                                <td>{{ $Labelprint->city }}</td>
                                                <td>{{ $Labelprint->district }}</td>
                                                <td>{{ $Labelprint->state }}</td>
                                                <td>{{ $Labelprint->zip_code }}</td>
                                                <td>{{ $Labelprint->options }}</td>
                                                <td>{{ $Labelprint->mobile_no }}</td>
                                                <td>{{ $Labelprint->email }}</td>
                                                <td>
                                                    <a href="{{ url('labelprint/labelprintfromedit/' . $Labelprint->id) }}">
                                                        <span class="fa fa-edit" style="color: #dc3545;" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
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
            });
        });
    </script>


    @endsection

</x-layouts.app>