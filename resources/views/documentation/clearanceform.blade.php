<x-layouts.app>

    @section('title', 'clearance-form')
    @section('page-level-style')
        <style>
            .card-body {
                font-family: 'Poppins';
                font-size: 16px;
            }

            .container {
                max-width: 500px;
                margin: 50px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h2 {
                text-align: center;
                padding-top: 30px;
            }

            h3 {
                text-align: center;
                padding-bottom: 40px;
                padding-top: 30px;
            }


            table input[type="text"],
            input[type="date"] {
                width: 100%;
                padding: 10px;
                margin: 8px 0;
                border: none;
                outline: none;

            }


            .submit-btn {
                padding-top: 20px;
                background-color: #4caf50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                margin-top: 10px;
            }

            .submit-btn:hover {
                background-color: #45a049;
            }



            table {
                width: 100%;
                border-collapse: collapse;
                border: 1px solid #ccc;
                padding: 5px;
                margin-bottom: 50px;
            }

            th,
            td {
                border: 1px solid #ccc;
                padding: 5px;
            }

            table.ops-table th {
                text-align: center;
            }

            .ops-table input[type="text"] {
                width: 30%;
                padding: 1px;
                margin-left: 8px;
                margin-bottom: 10px;
                border: none;
                border-bottom: 1px solid #ccc;
            }

            p {
                padding-left: 20px;
            }
        </style>
    @endsection

    <body>

        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h2>Employment Clearance Form</h2>
                                <h3>To be filled by candidate</h3>
                                <form action="" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Employee Name <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="text"id="name" name="name">
                                                @error('name')
                                                    <span class="text-red-500"> <strong>{{ $message }}</strong> </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Employee ID<span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="text" id="name"
                                                    name="emp_id">
                                                @error('emp_id')
                                                    <span class="text-red-500"> <strong>{{ $message }}</strong> </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Personal Email ID <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="email" name="personal_email"
                                                    value="{{ old('email') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Mobile Number <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="tel" name="mobile"
                                                    value="{{ old('mobile_no') }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label"> Date of Joining<span
                                                        class="text-danger">*</span></label>
                                                <div class="cal-icon"><input id="datepicker"
                                                        class="form-control datetimepicker" type=""
                                                        name="doj"></div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Date of Leaving <span
                                                        class="text-danger">*</span></label>
                                                <div class="cal-icon"><input id="datepicker"
                                                        class="form-control datetimepicker" type=""
                                                        name="leave_date"></div>
                                            </div>
                                        </div>



                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Employment Type <span
                                                        class="text-danger">*</span></label>
                                                <select class="select" name="employement_type">
                                                    <option hidden disabled selected>Select Type</option>
                                                    <option value="Full Time">Full Time</option>
                                                    <option value="Part Time">Part Time</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Department <span
                                                        class="text-danger">*</span></label>
                                                <select id="select_department" class="select" name="department"
                                                    onchange="fill_designation_dd(event,this)">
                                                    <option hidden disabled selected>Select Department</option>

                                                    @foreach ($Department as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Designation <span
                                                        class="text-danger">*</span></label>
                                                <select id="select_designation" class="select" name="designation"
                                                    onchange="fill_reports_to_dd(event,this)">
                                                    <option hidden disabled selected>Select Department </option>
                                                    @foreach ($Designation as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Reporting Manager Name <span
                                                        class="text-danger"></span></label>
                                                <select id="select_reports_to" class="select" name="reporting_manager">
                                                    <option hidden disabled selected>Select Reporting Manager </option>
                                                    {{-- @foreach ($Designation as $item)
                                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                                        @endforeach --}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- <table class="leave-table">

                                        <tr>

                                            <td><label for="name">Employee Name</label></td>
                                            <td><input type="text" id="name" name="name" required
                                                    style="border:none;"></td>
                                        </tr>
                                        <tr>

                                            <td><label for="name">Employee ID</label></td>
                                            <td><input type="text" id="name" name="emp_id" required
                                                    style="border:none;"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="dept">Department</label></td>
                                            <td><input type="text" id="dept" name="department" required
                                                    style="border:none;"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="Designation">Designation</label></td>
                                            <td><input type="text" id="Designation" name="designation" required
                                                    style="border:none;"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="date">Date of Joining</label></td>
                                            <td><input type="date" id="date" name="doj" required
                                                    style="border:none;"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="date">Date of Leaving</label></td>
                                            <td><input type="date" id="date" name="leave_date" required
                                                    style="border:none;"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="leave_type">Employment Type</label></td>
                                            <td><input type="checkbox" id="leave_type" name="employement_type">
                                                <label for="full_time">Full Time</label><br>
                                                <input type="checkbox" id="leave_type" name="employement_type">
                                                <label for="part_time">Part Time</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="email">Personal Email ID</label></td>
                                            <td><input type="text" id="email" name="personal_email" required
                                                    style="border:none;"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="mobile">Mobile Number</label></td>
                                            <td><input type="text" id="mobile" name="mobile" required
                                                    style="border:none;"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="manager">Reporting Manager Name</label></td>
                                            <td><input type="text" id="reporting_manager" name="reporting_manager"
                                                    required style="border:none;"></td>
                                        </tr>
                                    </table> --}}

                                    <h3>To be filled by concerned person</h3>
                                    <table class="ops-table">
                                        <tr>
                                            <th><label for="name">Operation Department</label></th>
                                        </tr>
                                        <tr>
                                            <td><br>
                                                <p style="text-align:center">Reporting Manager</p>
                                                <br>
                                                <p><input type="checkbox" id="datafiles_saved" name="datafiles_saved">
                                                    <label for="datafiles_saved">All the data files are
                                                        saved</label><br>
                                                    <input type="checkbox" id="handover" name="handover">
                                                    <label for="handover">Handover completed</label>
                                                </p>
                                                <p>Handover given to:<input type="text" id="handover_name"
                                                        name="handover_name" required></p>

                                                <p>Sign: <input type="file" id="handover_sign"
                                                        name="handover_sign" accept="image/*"
                                                        onchange="previewSignature(event)" required>
                                                <div id="signaturePreview" style="display:none;">
                                                    <img id="signatureImage" class="signature" src="#"
                                                        alt="Signature">
                                                </div>
                                                </p>

                                                <p>Remarks if any:<input type="text" id="remarks" name="remarks"
                                                        required></p>
                                                <p>Name and Sign of Reporting Manager:<input type="text"
                                                        id="reporting_manager" name="reporting_manager" required> </p>
                                                <p> <input type="file" id="manager_sign" name="manager_sign"
                                                        accept="image/*" onchange="previewManagerSignature(event)"
                                                        required>
                                                <div id="signatureManagerPreview" style="display:none;">
                                                    <img id="signatureManagerImage" class="signature" src="#"
                                                        alt="Signature">
                                                </div>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>


                                    <table class="ops-table">
                                        <tr>
                                            <th><label for="name">IT Department</label></th>
                                        </tr>
                                        <tr>
                                            <td><br>
                                                <p style="text-align:center">IT Manager</p>
                                                <br>
                                                <p><input type="checkbox" id="deactivate_biometric"
                                                        name="deactivate_biometric">
                                                    <label for="deactivate_biometric">Bio-metric access
                                                        deactivated.</label>
                                                </p>
                                                <p> <input type="checkbox" id="deactivate_mail"
                                                        name="deactivate_mail">
                                                    <label for="deactivate_mail">Official mail-id deactivated.</label>
                                                </p>
                                                <p>Mention ID:<input type="text" id="mail_id" name="mail_id"
                                                        required></p>
                                                <p><input type="checkbox" id="deactivate_server"
                                                        name="deactivate_server">
                                                    <label for="deactivate_server"> Server Access Deactivated</label>
                                                </p>
                                                <p> <input type="checkbox" id="deactivate_skype"
                                                        name="deactivate_skype">
                                                    <label for="deactivate_skype">Official Skype ID deactivated.
                                                    </label>
                                                </p>
                                                <p>Mention ID:<input type="text" id="skype_id" name="skype_id"
                                                        required></p>
                                                <p> <input type="checkbox" id="deactivate_linked"
                                                        name="deactivate_linked">
                                                    <label for="deactivate_linked">Official Linked-In ID deactivated.
                                                    </label>
                                                </p>
                                                <p>Mention ID:<input type="text" id="linked_id" name="linked_id"
                                                        required></p>

                                                <p>Remarks if any:<input type="text" id="it_remarks"
                                                        name="it_remarks" required></p>
                                                <p>Name and Sign :<input type="text" id="it_name" name="it_name"
                                                        required>
                                                </p>
                                                <p> <input type="file" id="manager_sign" name="manager_sign"
                                                        accept="image/*" onchange="previewITSignature(event)"
                                                        required>
                                                <div id="signatureITPreview" style="display:none;">
                                                    <img id="signatureITImage" class="signature" src="#"
                                                        alt="Signature">
                                                </div>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>


                                    <table class="ops-table">
                                        <tr>
                                            <th><label for="name">Accounts Department</label></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><br>Remarks if any:<input type="text" id="acc_remarks"
                                                        name="acc_remarks" required></p>
                                                <p>Name and Sign :<input type="text" id="acc_name"
                                                        name="acc_name" required>
                                                </p>
                                                <p> <input type="file" id="manager_sign" name="manager_sign"
                                                        accept="image/*" onchange="previewAccSignature(event)"
                                                        required>
                                                <div id="signatureAccPreview" style="display:none;">
                                                    <img id="signatureAccImage" class="signature" src="#"
                                                        alt="Signature">
                                                </div>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="ops-table">
                                        <tr>
                                            <th><label for="name">HR Department</label></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><br><input type="checkbox" id="i-card_submitted"
                                                        name="i-card_submitted">
                                                    <label for="i-card_submitted"> I-card submitted.</label>
                                                </p>
                                                <p>Remarks if any:<input type="text" id="hr_remarks"
                                                        name="acc_remarks" required></p>
                                                <p>Name and Sign :<input type="text" id="hr_name" name="hr_name"
                                                        required>
                                                </p>
                                                <p> <input type="file" id="manager_sign" name="manager_sign"
                                                        accept="image/*" onchange="previewHrSignature(event)"
                                                        required>
                                                <div id="signatureHrPreview" style="display:none;">
                                                    <img id="signatureHrImage" class="signature" src="#"
                                                        alt="Signature">
                                                </div>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                    @if (!$emp_info->exists || auth()->user()->hasRole("hr manager"))
                                    <button type="submit" class="submit-btn">Submit</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    <script>
        function previewSignature(event) {
            var file = event.target.files[0];
            var signaturePreview = document.getElementById('signaturePreview');
            var signatureImage = document.getElementById('signatureImage');

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    signatureImage.src = reader.result;
                    signaturePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }

        function previewManagerSignature(event) {
            var file = event.target.files[0];
            var signatureManagerPreview = document.getElementById('signatureManagerPreview');
            var signatureManagerImage = document.getElementById('signatureManagerImage');

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    signatureManagerImage.src = reader.result;
                    signatureManagerPreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }

        function previewITSignature(event) {
            var file = event.target.files[0];
            var signatureITPreview = document.getElementById('signatureITPreview');
            var signatureITImage = document.getElementById('signatureITImage');

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    signatureITImage.src = reader.result;
                    signatureITPreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }

        function previewAccSignature(event) {
            var file = event.target.files[0];
            var signatureAccPreview = document.getElementById('signatureAccPreview');
            var signatureAccImage = document.getElementById('signatureAccImage');

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    signatureAccImage.src = reader.result;
                    signatureAccPreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }

        function previewHrSignature(event) {
            var file = event.target.files[0];
            var signatureHrPreview = document.getElementById('signatureHrPreview');
            var signatureHrImage = document.getElementById('signatureHrImage');

            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    signatureHrImage.src = reader.result;
                    signatureHrPreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }
    </script>

</x-layouts.app>
