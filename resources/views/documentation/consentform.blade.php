<x-layouts.app>
    @section('title', 'consent-form')
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
                padding-bottom: 60px;
                padding-top: 30px;
            }


            label {
                font-weight: bold;
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
    @endsection

    <body>

        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h2> Consent Form</h2>
                                <form action="{{ url('/documentation/consentform') }} " method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <p>I, Mr./Ms./Mrs.

                                        <input type="hidden" name="employee_id" id="employee_id"
                                            value="{{ Auth::user()->employee->id }}">
                                        <input type="text" id="name" name="name"
                                            value="{{ $consentform->name }}" style="border-bottom:1px solid #ccc;">
                                        (relation)
                                        <input type="text" id="relation" name="relation"
                                            value="{{ $consentform->relation }}"
                                            style="border-bottom:1px solid #ccc;">of
                                        <b>{{ ucfirst(Auth::user()->employee->f_name) }}
                                            {{ ucfirst(Auth::user()->employee->l_name) }}</b>
                                        understand that mentioning my contact number on
                                        <b>{{ ucfirst(Auth::user()->employee->f_name) }}
                                            {{ ucfirst(Auth::user()->employee->l_name) }}</b> ID card is for
                                        his/her safety.
                                    </p><br>
                                    <p>Hence, I allow the company <b>Excelsior Research Pvt. Ltd.</b> to mention my
                                        contact
                                        number as an emergency contact number on his/her ID card.</p>
                                    <p>The contact number to be mentioned on the ID card is <input type="text"
                                            id="contactNumber" name="contactNumber"
                                            value="{{ $consentform->contactNumber }}"
                                            style="border-bottom:1px solid #ccc;">.</p>

                                    <div class="signature-section">
                                        <p>Name:<input type="text" id="name" name="name"
                                                value="{{ $consentform->name }}"required></p>
                                        <p>Sign:<input type="file" id="sign" name="sign" accept="image/*"
                                                onchange="previewSignature(event)" required>
                                        <div id="signaturePreview" style="display:none;">
                                            <img id="signatureImage" class="signature" src="#" alt="Signature">
                                        </div>
                                        </p>
                                        <p>Employee Name:
                                            <b>{{ ucfirst(Auth::user()->employee->f_name) }}
                                                {{ ucfirst(Auth::user()->employee->l_name) }}</b>
                                        </p>
                                        <p>Sign:
                                            <input type="file"id="employeeSign" name="employeeSign" accept="image/*"
                                                onchange="previewEmpSignature(event)" required>
                                        <div id="signatureEmpPreview" style="display:none;">
                                            <img id="signatureEmpImage" class="signature" src="#"
                                                alt="Signature">
                                        </div>
                                        </p>

                                        <p>Date:
                                            <input type="date" id="date" name="date"
                                                value="{{ $consentform->date }}" required>
                                        </p>
                                    </div>
                                    @if (!$consentform->exists || auth()->user()->hasRole("hr manager"))
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
    @section('page-level-script')
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

            function previewEmpSignature(event) {
                var file = event.target.files[0];
                var signatureEmpPreview = document.getElementById('signatureEmpPreview');
                var signatureEmpImage = document.getElementById('signatureEmpImage');

                if (file) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        signatureEmpImage.src = reader.result;
                        signatureEmpPreview.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                }
            }
        </script>
    @endsection
</x-layouts.app>
