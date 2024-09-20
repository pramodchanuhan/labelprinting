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
                buttons: [{
                        extend: 'copy',
                        text: 'Copy'
                    },
                    {
                        extend: 'csv',
                        text: 'CSV'
                    },
                    {
                        extend: 'excel',
                        text: 'Excel'
                    },
                    // {
                    //     extend: 'pdf',
                    //     text: 'PDF'
                    // },
                    // {
                    //     extend: 'print',
                    //     text: 'Print',
                    //     customize: function(win) {
                    //         // Ensure the printed table has full width and displays all data
                    //         $(win.document.body).css('font-size', '10pt').prepend('<h3>All Data Print</h3>');

                    //         $(win.document.body).find('table').addClass('display').css('font-size', 'inherit').css('width', '100%');
                    //     },
                    //     exportOptions: {
                    //         modifier: {
                    //             page: 'all' // Ensures all data is printed, not just visible rows
                    //         }
                    //     },
                    //     autoPrint: false // Prevent automatic print trigger, so we can manipulate scroll
                    // }
                ],
                scrollX: true, // For horizontal scrolling
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

            // Handle print button action
            $('.buttons-print').on('click', function() {
                // Temporarily disable scrolling and re-draw the table to show all data
                var scrollEnabled = table.settings()[0].oScroll.sX || table.settings()[0].oScroll.sY;
                if (scrollEnabled) {
                    table.settings()[0].oScroll.sX = ''; // Disable horizontal scroll
                    table.settings()[0].oScroll.sY = ''; // Disable vertical scroll
                    table.draw(); // Re-draw table without scroll
                }

                // Trigger the print function manually
                table.button('.buttons-print').trigger();

                // Re-enable scrolling after a small delay (after printing)
                setTimeout(function() {
                    if (scrollEnabled) {
                        table.settings()[0].oScroll.sX = '100%'; // Re-enable horizontal scroll
                        table.settings()[0].oScroll.sY = '200px'; // Re-enable vertical scroll
                        table.draw(); // Re-draw table with scroll
                    }
                }, 1000); // 1 second delay to ensure print completes
            });
        });
    </script>


    @endsection

</x-layouts.app>