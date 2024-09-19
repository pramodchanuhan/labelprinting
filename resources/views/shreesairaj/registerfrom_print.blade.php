<x-layouts.app>
    @section('title', 'All Interviews')

    @section('page-level-style')

    @endsection

    <head>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');

            body {
                background-color: #ffffff;
                /* White color */
                font-family: 'Arial', sans-serif;
                line-height: -3.5;
            }

            h5 {
                text-align: center;
                color: #ff4500;
                /* Orange color */
                font-family: 'Arial Black', cursive;
                /* Stylish font */
                text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
                /* Text shadow */
                display: inline-block;
                padding-bottom: 5px;
            }


            p {
                text-align: center;
                color: #333;
            }

            .form-group label {
                font-weight: bold;
                color: #333;
            }

            .form-control {
                border-radius: 5px;
                border: 1px solid #ced4da;
            }

            .submit-btn {
                width: 10%;
                border-radius: 5px;
                font-size: 1.2rem;
                background-color: #ff4500;
                /* Orange color */
                border: none;
                color: #fff;
            }

            .submit-btn:hover {
                background-color: #ff7043;
                /* Lighter orange on hover */
            }

            .header-text {
                margin-bottom: 5px;
                text-align: center;

            }

            .note {
                text-align: center;
                margin-top: 10px;
                font-size: 0.9rem;
                color: #ff4500;
                /* Orange color */
            }

            hr {
                display: block;
                margin-top: 0.5em;
                margin-bottom: 0.5em;
                margin-left: auto;
                margin-right: auto;
                border-style: inset;
                border-width: 1px;
                border-color: #ff4500;
                /* Orange color */
            }
        </style>
        <style>
            @media print {

                .no-print,
                .header,
                .sidebar {
                    display: none;
                }

                body {
                    width: 210mm; /* A4 width */
                    height: 297mm; /* A4 height */
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    line-height: -3.5;
                }

                .row {
                    display: flex;
                }

                .col-md-6 {
                    width: 50%;
                }

                .client-copy,
                .office-copy {
                    border: 1px;
                    box-sizing: border-box;
                    height: 100%; 
                }

                .client-copy {
                    border-right: none;
                    float: left;
                    width: 50%; /* Adjust to fit half of the page */
                }

                .office-copy {
                    border-left: none;
                    float: left;
                    width: 50%; /* Adjust to fit half of the page */
                }

                /* Additional styling to adjust margins, font sizes, etc. for print */
                .form-group {
                    margin-bottom: 10px;
                }

                label {
                    font-size: 12px;
                    margin-bottom: 5px;
                }

                .form-control {
                    font-size: 12px;
                }

                h4 {
                    margin: 0;
                    padding: 0;
                    text-align: center;
                    margin-top: 0;
                    margin-bottom: 10px;
                    font-size: 14px;
                }

                @page {
                    size: A4;
                    margin: 0;
                }

                /* Remove extra margins and padding */
                body,
                .page-wrapper,
                .content,
                .card-body {
                    margin: 0;
                    padding: 0;
                }

                /* Adjust the overall layout for better fit on the A4 page */
                .row {
                    margin: 0;
                }

                .col-md-6,
                .col-md-3,
                .col-md-4,
                .col-md-5 {
                    padding-left: 0;
                    padding-right: 0;
                }

                p {
                    margin: 0;
                    padding: 0;
                    font-size: 10px;
                }
            }
        </style>
    </head>

    <body>
        <div class="page-wrapper">
            <!-- Page Content -->
            <div class="content container-fluid">
                <section class="content">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form>
                                        @csrf

                                        <div class="row">
                                            <!-- Client Copy -->
                                            <div class="col-md-6 client-copy">
                                                <div class="header-text">
                                                    <h5>SHREE SAIRAJ TOURS & TRAVELS</h5><br>
                                                    <p>Pune-Nagar Road Perane Phata, Opp. PDCC Bank. Tal. Haveli Dist. Pune</p>
                                                    <p>Office no: 9175318473, 9175806094, 9851056262</p>
                                                    <hr>
                                                </div>
                                                <h5>Office Copy</h5>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="receipt_no">Receipt No :{{ $RegisterFrom->receipt_no }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name">Name:{{ $RegisterFrom->name }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="mobile">Mobile :{{ $RegisterFrom->mobile }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="from_city">From :{{ $RegisterFrom->from_city }} </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="to_city">To :{{ $RegisterFrom->to_city }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="journey_date">Journey Date:{{ $RegisterFrom->journey_date }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="bus_name">Bus Name :{{ $RegisterFrom->bus_name }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="reporting_time">Reporting Time :{{ $RegisterFrom->reporting_time }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="departure_time">Departure Time :{{ $RegisterFrom->departure_time }} </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="seat_no">Seat No: {{ $RegisterFrom->seat_no }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="starting_point">Starting Point :{{ $RegisterFrom->starting_point }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="amount">Amount :{{ $RegisterFrom->amount }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Office Copy -->
                                            <div class="col-md-6 office-copy">
                                                <div class="header-text">
                                                    <h5>SHREE SAIRAJ TOURS & TRAVELS</h5><br>
                                                    <p>Pune-Nagar Road Perane Phata, Opp. PDCC Bank. Tal. Haveli Dist. Pune</p>
                                                    <p>Office no: 9175318473, 9175806094, 9851056262</p>
                                                    <hr>
                                                </div>
                                                <h5>Client Copy</h5>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="receipt_no">Receipt No :{{ $RegisterFrom->receipt_no }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name">Name:{{ $RegisterFrom->name }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="mobile">Mobile :{{ $RegisterFrom->mobile }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="from_city">From :{{ $RegisterFrom->from_city }} </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="to_city">To :{{ $RegisterFrom->to_city }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="journey_date">Journey Date:{{ $RegisterFrom->journey_date }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="bus_name">Bus Name :{{ $RegisterFrom->bus_name }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="reporting_time">Reporting Time :{{ $RegisterFrom->reporting_time }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="departure_time">Departure Time :{{ $RegisterFrom->departure_time }} </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="seat_no">Seat No: {{ $RegisterFrom->seat_no }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="starting_point">Starting Point :{{ $RegisterFrom->starting_point }}</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="amount">Amount :{{ $RegisterFrom->amount }}</label>
                                                                </div>
                                                            </div>
                                                            <p class="note">Note: If the vehicle bus is late to come to your pick-up point due to traffic problems, please don't complain to the agent. Thanks for your cooperation.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="submit-section">
                                            <!-- <button class="btn btn-primary submit-btn no-print">Submit</button> -->
                                            <button class="btn btn-primary submit-btn no-print" onclick="window.print()">Print</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('journey_date').setAttribute('min', today);
            });
        </script>

        <script>
            document.getElementById('mobile').addEventListener('input', function() {
                var mobileInput = this;
                var errorSpan = document.getElementById('mobileError');

                if (mobileInput.validity.patternMismatch || mobileInput.value.length !== 10) {
                    errorSpan.style.display = 'inline';
                } else {
                    errorSpan.style.display = 'none';
                }
            });
        </script>
    </body>


    @section('page-level-script')


    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>

    @endsection

</x-layouts.app>