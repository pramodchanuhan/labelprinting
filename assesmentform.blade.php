<x-layouts.app>
    @section('page-level-style')
    <style>
        h4 {
            text-align: center;
            padding-bottom: 10px;
            padding-top: 20px;
        }

        h5 {
            text-align: center;
            padding-bottom: 10px;
            padding-top: 20px;
        }

        .custom-file .form-check-inline {
            margin-right: 40px;
            /* Adjust spacing between radio button groups */
        }

        .custom-file .form-check-label {
            margin-left: 5px;
            /* Adjust spacing between radio button and label */
        }

        table {

            width: 100%;
            margin: auto;
            border-collapse: collapse;
            margin-bottom: 20px;

        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th {
            padding: 10px;
            text-align: center;
            color: black;
        }

        table.hr-comments-table input[type="text"],
        table.hr-comments-table input[type="number"],
        input[type="tel"] {
            padding: 10px;
            outline: none;
            border: none;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    @endsection

    <!-- Page Wrapper -->
    <div class="main-wrapper">
        <div class="content container-fluid">
            <div class="card mb-0">
                <div class="card-body center-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Form to be filled by candidate</h4><br>
                            <form id="assesmentform" method="POST" action="{{ route('form-store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Last Name<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="last_name" name="last_name" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>First Name<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="full_name" name="full_name" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Middle Name<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nanihal Surname<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="nanihal_surname" name="nanihal_surname" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Candidate Mobile No<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="" required pattern="\d{10}" maxlength="10" minlength="10" oninvalid="this.setCustomValidity('Please enter exactly 10 digits')" oninput="this.setCustomValidity('')">
                                                </div>
                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Candidate Email<span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="email" name="email" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Date of Birth<span class="text-danger">*</span></label>
                                                    <div class="cal-icon">
                                                        <input class="form-control" id="dob" name="dob" required readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Age<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="age" name="age" value="" required readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Time <span class="text-danger">*</span></label>
                                                    <input type="time" class="form-control" onchange="onTimeChange()" id="timeInput" name="time_place" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Place <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="place" name="place" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Height<span class="text-danger">*</span></label>
                                                    <select class="form-control" id="heigth" name="heigth" required>
                                                        <option value="" disabled selected>Select Height</option>
                                                        <option value="4.5">4.5 </option>
                                                        <option value="4.6">4.6 </option>
                                                        <option value="4.7">4.7 </option>
                                                        <option value="4.8">4.8 </option>
                                                        <option value="4.9">4.9 </option>
                                                        <option value="4.9">4.10 </option>
                                                        <option value="4.9">4.11 </option>
                                                        <option value="5.0">5.0 </option>
                                                        <option value="5.1">5.1 </option>
                                                        <option value="5.2">5.2 </option>
                                                        <option value="5.3">5.3 </option>
                                                        <option value="5.4">5.4 </option>
                                                        <option value="5.5">5.5 </option>
                                                        <option value="5.6">5.6 </option>
                                                        <option value="5.7">5.7 </option>
                                                        <option value="5.8">5.8 </option>
                                                        <option value="5.9">5.9 </option>
                                                        <option value="5.9">5.10 </option>
                                                        <option value="5.9">5.11 </option>
                                                        <option value="6.0">6.0 </option>
                                                        <option value="6.1">6.1 </option>
                                                        <option value="6.2">6.2 </option>
                                                        <option value="6.3">6.3 </option>
                                                        <option value="6.4">6.4 </option>
                                                        <option value="6.5">6.5 </option>
                                                        <option value="6.6">6.6 </option>
                                                        <option value="6.7">6.7 </option>
                                                        <option value="6.8">6.8 </option>
                                                        <option value="6.9">6.9 </option>
                                                        <option value="6.9">6.10 </option>
                                                        <option value="6.9">6.11 </option>
                                                        <option value="7.0">7.0 </option>
                                                        <option value="7.1">7.1 </option>
                                                        <option value="7.2">7.2 </option>
                                                        <option value="7.3">7.3 </option>
                                                        <option value="7.4">7.4 </option>
                                                        <option value="7.5">7.5 </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Manglik<span class="text-danger">*</span></label>
                                                    <select class="form-control" id="manglik" name="manglik" required>
                                                        <option value="" disabled selected>Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Handicapped<span class="text-danger">*</span></label>
                                                    <select class="form-control" id="handicapped" name="handicapped" required>
                                                        <option value="" disabled selected>Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div><br>
                                            </div><br>

                                            <div class="col-md-8">
                                                <label>Category<span class="text-danger">*</span></label><br>
                                                <div class="custom-file position-relative">
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="fresh" name="category" class="form-check-input" value="Fresh">
                                                        <label for="fresh" class="form-check-label">Fresh</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="divorced" name="category" class="form-check-input" value="Divorced">
                                                        <label for="divorced" class="form-check-label">Divorced</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="widow" name="category" class="form-check-input" value="Widow/Vidhur">
                                                        <label for="widow" class="form-check-label">Widow/Vidhur</label>
                                                    </div>
                                                </div><br>
                                            </div><br>

                                            <div class="row">
                                                <div id="additional-fields" class="col-md-12" style="display: none;">
                                                    <div class="col-md-6 float-left">
                                                        <div class="form-group">
                                                            <label>Male Children</label>
                                                            <input type="number" class="form-control" id="vidhur_widow" name="vidhur_widow" min="0">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 float-left">
                                                        <div class="form-group">
                                                            <label>Female Children</label>
                                                            <input type="number" class="form-control" id="no_children" name="no_children" min="0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Occupation<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="occupation" name="occupation" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Place of Occupation.<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="place_occupation" name="place_occupation" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Education<span class="text-danger">*</span></label>
                                                    <select class="form-control" id="education" name="education" required>
                                                        <option value="" disabled selected>Select</option>
                                                        <option value="SSC">SSC</option>
                                                        <option value="HSC">HSC</option>
                                                        <option value="Undergraduate">Undergraduate</option>
                                                        <option value="Graduate">Graduate</option>
                                                        <option value="Masters">Masters</option>
                                                        <option value="PG">PG</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="degree" name="degree">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Working AT<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="working_at" name="working_at" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Name of Parent/Guardian<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="name_perrent" name="name_perrent" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile No.<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="mobile_nor" name="mobile_nor" required pattern="\d{10}" maxlength="10" minlength="10" oninvalid="this.setCustomValidity('Please enter exactly 10 digits')" oninput="this.setCustomValidity('')">
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Permanent Address (as per address proof)<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="permanent_address" name="permanent_address" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address to contact <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="current_address" name="current_address" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile No.<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="mobile_current_address" name="mobile_current_address" required pattern="\d{10}" maxlength="10" minlength="10" oninvalid="this.setCustomValidity('Please enter exactly 10 digits')" oninput="this.setCustomValidity('')">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Parent Occupation<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="parent_occupation" name="parent_occupation" required>
                                                </div>
                                            </div>

                                        </div><br>

                                        <label for="Brothers">Brothers<span class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Married</label>
                                                        <input type="number" class="form-control" id="name_bs" name="name_bs" min="0" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Unmarried</label>
                                                        <input type="number" class="form-control" id="married_yn" name="married_yn" min="0" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="Sisters">Sisters<span class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Married</label>
                                                        <input type="number" class="form-control" id="name_bs1" name="name_bs1" min="0" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Unmarried</label>
                                                        <input type="number" class="form-control" id="married_yn1" name="married_yn1" min="0" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>

                                        <!-- <label for="references">Brothers & Sisters:</label>
                                        <table class="hr-comments-table">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Married </th>
                                                <th scope="col">Unmarried</th>
                                            </tr>
                                            <tr>
                                                <td><input type="text" id="reference" value="Brothers" readonly></td>
                                                <td><input type="number" id="reference" name="name_bs" min="0"></td>
                                                <td><input type="number" id="reference" name="married_yn" min="0"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" id="reference" value="Sisters" readonly></td>
                                                <td><input type="number" id="reference" name="name_bs1" min="0"></td>
                                                <td><input type="number" id="reference" name="married_yn1" min="0"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" id="reference" name="name_bs2"></td>
                                                <td><input type="text" id="reference" name="married_yn2"></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" id="reference" name="name_bs3"></td>
                                                <td><input type="text" id="reference" name="married_yn3"></td>
                                            </tr> 
                                        </table><br> -->

                                        <label><span class="text-danger">Is payment screen shot, Biodata and photo soft copy ready?</span></label><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="resume">Upload Payment Screenshot :<span class="text-danger">*</span></label>
                                                    {{-- <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required> --}}
                                                    <input type="file" id="payment_screenshot" name="payment_screenshot" required>
                                                </div><br>


                                                <div class="form-group">
                                                    <label for="resume">Upload Biodata:<span class="text-danger">*</span></label>
                                                    {{-- <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required> --}}
                                                    <input type="file" id="biodata" name="biodata" required>
                                                </div><br>

                                                <div class="form-group">
                                                    <label for="resume">Upload Photo:<span class="text-danger">*</span></label>
                                                    {{-- <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required> --}}
                                                    <input type="file" id="photo" name="photo" required>
                                                </div>
                                            </div><br>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <img src="assets/img/paymentnew.png" alt="" height="300px" width="300px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="submit-section">
                                            <button class="btn btn-primary submit-btn">Submit</button>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radioButtons = document.querySelectorAll('input[name="category"]');
            const additionalFields = document.getElementById('additional-fields');

            radioButtons.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'Divorced' || this.value === 'Widow/Vidhur') {
                        additionalFields.style.display = 'block';
                    } else {
                        additionalFields.style.display = 'none';
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize the datepicker
            $("#dob").datepicker({
                dateFormat: "yy-mm-dd",
                changeYear: true,
                changeMonth: true,
                yearRange: "-100:1996",
                maxDate: new Date(1996, 11, 31),
                onSelect: function(dateText, inst) {
                    if (new Date(dateText) > new Date(1996, 11, 31)) {
                        $("#dobError").show();
                        $("#age").val('');
                    } else {
                        $("#dobError").hide();
                        calculateAge(dateText);
                    }
                }
            });

            function calculateAge(dob) {
                var today = new Date();
                var birthDate = new Date(dob);
                var age = today.getFullYear() - birthDate.getFullYear();
                var monthDifference = today.getMonth() - birthDate.getMonth();
                if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                $("#age").val(age);
            }
        });
    </script>
    <script>
        var inputEle = document.getElementById('timeInput');


        function onTimeChange() {
            var timeSplit = inputEle.value.split(':'),
                hours,
                minutes,
                meridian;
            hours = timeSplit[0];
            minutes = timeSplit[1];
            if (hours > 12) {
                meridian = 'PM';
                hours -= 12;
            } else if (hours < 12) {
                meridian = 'AM';
                if (hours == 0) {
                    hours = 12;
                }
            } else {
                meridian = 'PM';
            }
            // alert(hours + ':' + minutes + ' ' + meridian);
        }
    </script>

</x-layouts.app>