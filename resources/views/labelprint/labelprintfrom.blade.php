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

            .checkbox-group label {
                margin-right: 30px;
                /* Adds space between the checkboxes */
                display: inline-block;
                /* Ensures each label is treated as a block for spacing */
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
                                        <h1>Address / Communication Information</h1><br />
                                        <hr>
                                    </div>
                                    <form id="" method="POST" action="{{ route('labelprint.labelprintfrom-store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="Prefix With">Prefix With.</label>
                                                            <select name="prefix" id="prefix" class="form-control">
                                                                <option value="Shri"> Shri </option>
                                                                <option value="Ms"> Ms </option>
                                                                <option value="Miss"> Miss </option>
                                                                <option value="Mrs"> Mrs </option>
                                                                <option value="Mr"> Mr </option>
                                                                <option value="Master"> Master </option>
                                                                <option value="Rev"> Reverend (Rev) </option>
                                                                <option value="Dr"> Doctor (Dr) </option>
                                                                <option value="Atty"> Attorney (Atty) </option>
                                                                <option value="Hon"> Honorable (Hon) </option>
                                                                <option value="Prof"> Professor (Prof) </option>
                                                                <option value="Pres"> President (Pres) </option>
                                                                <option value="VP"> Vice President (VP) </option>
                                                                <option value="Gov"> Governor (Gov) </option>
                                                                <option value="Ofc"> Officer (Ofc) </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="name" name="name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Address">Address</label>
                                                            <input type="text" class="form-control" id="address" name="address" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Local Area">Local Area</label>
                                                            <input type="text" class="form-control" id="local_area" name="local_area" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="City">City</label>
                                                            <input type="text" class="form-control" id="city" name="city" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="District">District</label>
                                                            <input type="text" class="form-control" id="district" name="district" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="State">State</label>
                                                            <input type="text" class="form-control" id="state" name="state" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Zip Code">Zip Code</label>
                                                            <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                                                        </div>
                                                    </div><br>
                                                    <div class="col-md-12"><br>
                                                        <h3>Wish Us</h3>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="Date of Birth">Date of Birth</label>
                                                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="Partner Name">Partner Name</label>
                                                                    <input type="text" class="form-control" id="partner_name" name="partner_name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="Anniversary">Anniversary</label>
                                                                    <input type="date" class="form-control" id="anniversary" name="anniversary" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="Partner's DOB">Partner's DOB</label>
                                                                    <input type="date" class="form-control" id="partner_dob" name="partner_dob" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br><br><br>
                                                    <div class="col-md-12 checkbox-group">
                                                        <br>
                                                        <label>
                                                            <input type="checkbox" name="options[]" value="VIP"> VIP
                                                        </label>

                                                        <label>
                                                            <input type="checkbox" name="options[]" value="VVIP"> VVIP
                                                        </label>

                                                        <label>
                                                            <input type="checkbox" name="options[]" value="PATRIKA"> PATRIKA
                                                        </label>

                                                        <label>
                                                            <input type="checkbox" name="options[]" value="MANDIR"> MANDIR
                                                        </label>

                                                        <label>
                                                            <input type="checkbox" name="options[]" value="NEWS"> NEWS
                                                        </label>

                                                        <label>
                                                            <input type="checkbox" name="options[]" value="GURU DHARAN"> GURU DHARAN
                                                        </label>

                                                        <label>
                                                            <input type="checkbox" name="options[]" value="KHATRIAGACH"> KHATRIAGACH
                                                        </label>
                                                        <br>
                                                    </div><br><br><br>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="contact_person">Contact Person</label>
                                                            <input type="text" class="form-control" id="contact_person" name="contact_person" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="std_code">STD Code</label>
                                                            <input type="text" class="form-control" id="std_code" name="std_code" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Office">Office</label>
                                                            <input type="text" class="form-control" id="office" name="office" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Office">Offices</label>
                                                            <input type="text" class="form-control" id="office2" name="office2" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Resident">Resident</label>
                                                            <input type="text" class="form-control" id="resident" name="resident" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Fax">Fax</label>
                                                            <input type="text" class="form-control" id="fax" name="fax" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Mobile No">Mobile No</label>
                                                            <input type="number" class="form-control" name="mobile_no" id=mobile_no" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Mobile No">Mobile No 2</label>
                                                            <input type="number" class="form-control" name="mobile_no2" id="mobile_no2" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Mobile No">e-mail</label>
                                                            <input type="email" class="form-control" name="email" id="email" value="">
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