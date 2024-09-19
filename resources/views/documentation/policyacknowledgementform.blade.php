<x-layouts.app>
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
            padding-bottom: 60px;
            padding-top: 30px;
        }



        input[type="text"] {
            width: 30%;
            padding: 1px;
            margin: 8px 0;
            border: none;
            outline: none;

        }

        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
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

        .signature-section {
            margin-top: 20px;
        }

        .signature-section input[type="text"],
        .signature-section input[type="date"] {
            width: 30%;
            padding: 1px;
            margin-left: 8px;
            margin-bottom: 10px;
            border: none;
            border-bottom: 1px solid #ccc;
        }

        .signature-section input[type="file"] {
            padding: 1px;
            margin-left: 8px;
            margin-bottom: 10px;
        }

        p {
            padding-left: 20px;
        }
    </style>

    <body>

        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h2> POLICY ACKNOWLEDGEMENT FORM</h2>
                                <form action="{{ url('/documentation/policyacknowledgementform') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="employees_id" id="employees_id"
                                        value="{{ Auth::user()->employee->id }}">
                                    <p>I <b>{{ ucfirst(Auth::user()->employee->f_name) }}
                                            {{ ucfirst(Auth::user()->employee->l_name) }}</b> ,
                                        Employee Code <b>{{ $emp->emp_id }}</b>
                                        , (Designation) <b>{{ $emp->designation_name }}</b>,
                                        (Department) <b>{{ $emp->department_name }}</b>.</p><br>
                                    <p>Acknowledge that I have read, understood and agree to comply with all the
                                        policies and procedure of the company.</p>
                                    <p>As I also understand & agree that <b>{{ $emp->company_name }}</b> reserves
                                        full
                                        right to amend, revise, modify, delete, rescind, supplement or add in the policy
                                        as and when required from time to time in its sole and absolute discretion, by
                                        giving prior notification of 5 working days to the employees. Therefore I am
                                        aware & accept that am expected to read, know and be familiar with the content
                                        or clause of the current, revised or new policy announced or shared by the
                                        company in any written or verbal form.</p>

                                    <div class="signature-section">
                                        <p>Emergency Contact Number:<input type="text" id="emergencycontact"
                                                name="emergencycontact"
                                                value="{{ $policyacknowledgementform->emergencycontact }}" required></p>
                                        <p>Name:<input type="text" id="name" name="name"
                                                value="{{ $policyacknowledgementform->name }}" required></p>
                                        <p>Relation:
                                            <input type="text" id="relation" name="relation"
                                                value="{{ $policyacknowledgementform->relation }}"required>
                                        </p>
                                        <p>Signature:
                                            <input type="file" id="empSign" name="empSign" accept="image/*"
                                                onchange="previewSignature(event)" required>
                                        <div id="signaturePreview" style="display:none;">
                                            <img id="signatureImage" class="signature" src="#" alt="Signature">
                                        </div>
                                        </p>
                                        <p>Date:
                                            <input type="date" id="date" name="date"
                                                value="{{ $policyacknowledgementform->date }}" required>
                                        </p>
                                    </div>
                                    @if (!$policyacknowledgementform->exists || auth()->user()->hasRole("hr manager"))
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
    </script>
</x-layouts.app>
