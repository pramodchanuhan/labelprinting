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
                                                <th>Action</th>
                                                <th>Receipt No</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th>Journey Date</th>
                                                <th>Bus Name</th>
                                                <th>Reporting Time</th>
                                                <th>Departure Time</th>
                                                <th>Seat No</th>
                                                <th>Starting Point</th>
                                                <th>Remark</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($registerfrom as $index => $ticket)
                                            <tr>
                                                <!-- Display the index starting from 1 -->
                                                <td>{{ $index + 1 }}</td>
                                                <!-- Print button with trip ID -->
                                                <td>
                                                    <a href="{{ url('/shreesairaj/registerfrom_print/' . $ticket->id) }}">
                                                        <span class="fa fa-print" style="color: #dc3545;" aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                                <!-- Display ticket details -->
                                                <td>{{ $ticket->receipt_no }}</td>
                                                <td>{{ $ticket->name }}</td>
                                                <td>{{ $ticket->mobile }}</td>
                                                <td>{{ $ticket->from_city }}</td>
                                                <td>{{ $ticket->to_city }}</td>
                                                <td>{{ $ticket->journey_date }}</td>
                                                <td>{{ $ticket->bus_name }}</td>
                                                <td>{{ $ticket->reporting_time }}</td>
                                                <td>{{ $ticket->departure_time }}</td>
                                                <td>{{ $ticket->seat_no }}</td>
                                                <td>{{ $ticket->starting_point }}</td>
                                                <td>{{ $ticket->remark }}</td>
                                                <td>{{ $ticket->amount }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <td colspan="14" style="text-align: right;"><strong>Total Amount:</strong></td>
                                                <td><strong>{{ $totalAmount }}</strong></td>
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