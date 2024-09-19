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
            }

            h1,
            h2 {
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

            h2 {
                border-bottom: 0px solid #ff4500;
                /* Underline */
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
                margin-bottom: 20px;
                text-align: center;

            }

            .note {
                text-align: center;
                margin-top: 20px;
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
        /* Hide non-essential elements */
        .no-print,
        .header,
        .sidebar {
            display: none;
        }

        /* Make the content take up the full width */
        .content.container-fluid {
            width: 100%;
            padding: 0;
            margin: 0;
        }

        /* Set the page size to A4 with specific margins */
        @page {
            size: A4 portrait;
            margin: 10mm;
        }

        /* Ensure the card and its content fit the page */
        .card {
            margin: 0;
            padding: 0;
            box-shadow: none;
            border: none;
        }

        /* Adjust text alignment and margins for a cleaner print */
        .header-text {
            text-align: center;
            margin: 0;
        }

        .header-text p{
            margin: 0px 0;
        }

        .form-group {
            margin-bottom: 5px;
            width: 100%; /* Make each form-group full width */
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
        .col-md-5
        {
            padding-left: 0;
            padding-right: 0;
        }

        .col-md-6{
            width: 25%; 
            padding: 2px;/* Make each column take the full width */
        }
        .col-md-3{
            width: 20%; 
            padding: 2px;/* Make each column take the full width */
        }
        .col-md-4{
            width: 30%; 
            padding: 2px;/* Make each column take the full width */
        }
        .col-md-5{
            width: 50%;
            padding: 2px; /* Make each column take the full width */
        }
      

        /* Reduce the size of the note text */
        .note {
            font-size: 10pt;
        }

        /* Reduce margins for better fit */
        .submit-section {
            margin-top: 10px;
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
                                    <div class="header-text">
                                        <h1>SHREE SAIRAJ</h1><br />
                                        <h2>TOURS & TRAVELS</h2>
                                        <hr>
                                        <p>Pune-Nagar Road Perane Phata,<br> Opp. PDCC Bank. Tal. Haveli Dist. Pune</p>
                                        <p>Office no: 9175318473, 9175806094, 9851056262</p>
                                        <hr>
                                    </div>
                                    <form id="" method="POST" action="{{ route('shreesairaj.registerfrom-store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="receipt_no">Receipt No.</label>
                                                            <input type="text" class="form-control" id="receipt_no" name="receipt_no" value="{{ $receiptNo }}" readonly required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="name" name="name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="mobile">Mobile</label>
                                                            <input type="text" class="form-control" id="mobile" name="mobile" required
                                                                pattern="\d{10}" maxlength="10" minlength="10">
                                                            <span id="mobileError" style="color: red; display: none;">Please enter exactly 10 digits</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="from_city">From</label>
                                                            <input type="text" class="form-control" id="from_city" name="from_city" value="Pune" readonly required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="to_city">To</label>
                                                            <input type="text" class="form-control" id="to_city" name="to_city" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="journey_date">Journey Date</label>
                                                            <input type="date" class="form-control" id="journey_date" name="journey_date" min="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="bus_name">Bus Name</label>
                                                            <input type="text" class="form-control" id="bus_name" name="bus_name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="reporting_time">Reporting Time</label>
                                                            <input type="time" class="form-control" id="reporting_time" name="reporting_time" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="departure_time">Departure Time</label>
                                                            <input type="time" class="form-control" id="departure_time" name="departure_time" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="seat_no">Seat No.</label>
                                                            <input type="text" class="form-control" id="seat_no" name="seat_no" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="starting_point">Starting Point</label>
                                                            <input type="text" class="form-control" id="starting_point" name="starting_point" value="Perne Phata" readonly required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="amount">Amount</label>
                                                            <input type="number" class="form-control" id="amount" name="amount" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Remark">Remark</label>
                                                            <input type="text" class="form-control" name="remark" id="remark" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="submit-section">
                                            <button class="btn btn-primary submit-btn no-print">Submit</button>
                                            <!-- <button class="btn btn-primary submit-btn no-print" onclick="window.print()">Submit</button> -->
                                        </div>
                                    </form>
                                    <p class="note">Note: If the vehicle bus is late to come to your pick-up point due to traffic problems, please don't complain to the agent. Thanks for your cooperation.</p>
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