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
                                    <form id="" method="POST" action="{{ route('labelprint.labelprintfrom-update', $Labelprintfrom->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <input type="hidden" name="id" value="{{ $Labelprintfrom->id }}">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="Prefix With">Prefix With.</label>
                                                            <select name="prefix" id="prefix" class="form-control">
                                                                <option value="Shri" {{ $Labelprintfrom->prefix == 'Shri' ? 'selected' : '' }}>Shri</option>
                                                                <option value="Ms" {{ $Labelprintfrom->prefix == 'Ms' ? 'selected' : '' }}>Ms</option>
                                                                <option value="Miss" {{ $Labelprintfrom->prefix == 'Miss' ? 'selected' : '' }}>Miss</option>
                                                                <option value="Mrs" {{ $Labelprintfrom->prefix == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                                                <option value="Mr" {{ $Labelprintfrom->prefix == 'Mr' ? 'selected' : '' }}>Mr</option>
                                                                <option value="Master" {{ $Labelprintfrom->prefix == 'Master' ? 'selected' : '' }}>Master</option>
                                                                <option value="Rev" {{ $Labelprintfrom->prefix == 'Rev' ? 'selected' : '' }}>Reverend (Rev)</option>
                                                                <option value="Dr" {{ $Labelprintfrom->prefix == 'Dr' ? 'selected' : '' }}>Doctor (Dr)</option>
                                                                <option value="Atty" {{ $Labelprintfrom->prefix == 'Atty' ? 'selected' : '' }}>Attorney (Atty)</option>
                                                                <option value="Hon" {{ $Labelprintfrom->prefix == 'Hon' ? 'selected' : '' }}>Honorable (Hon)</option>
                                                                <option value="Prof" {{ $Labelprintfrom->prefix == 'Prof' ? 'selected' : '' }}>Professor (Prof)</option>
                                                                <option value="Pres" {{ $Labelprintfrom->prefix == 'Pres' ? 'selected' : '' }}>President (Pres)</option>
                                                                <option value="VP" {{ $Labelprintfrom->prefix == 'VP' ? 'selected' : '' }}>Vice President (VP)</option>
                                                                <option value="Gov" {{ $Labelprintfrom->prefix == 'Gov' ? 'selected' : '' }}>Governor (Gov)</option>
                                                                <option value="Ofc" {{ $Labelprintfrom->prefix == 'Ofc' ? 'selected' : '' }}>Officer (Ofc)</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" id="name" name="name" value="{{ old('name') ?? $Labelprintfrom->name }}" class="form-control @error('name') is-invalid @enderror">
                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Address">Address</label>
                                                            <input type="text" id="address" name="address" value="{{ old('address') ?? $Labelprintfrom->address }}" class="form-control @error('address') is-invalid @enderror">
                                                            @error('address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Local Area">Local Area</label>
                                                            <input type="text" id="local_area" name="local_area" value="{{ old('local_area') ?? $Labelprintfrom->local_area }}" class="form-control @error('local_area') is-invalid @enderror">
                                                            @error('local_area')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="City">City</label>
                                                            <input type="text" id="city" name="city" value="{{ old('city') ?? $Labelprintfrom->city }}" class="form-control @error('city') is-invalid @enderror">
                                                            @error('city')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="District">District</label>
                                                            <input type="text"  id="district" name="district" value="{{ old('district') ?? $Labelprintfrom->district }}" class="form-control @error('district') is-invalid @enderror">
                                                            @error('district')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="State">State</label>
                                                            <input type="text"  id="state" name="state" value="{{ old('state') ?? $Labelprintfrom->state }}" class="form-control @error('state') is-invalid @enderror">
                                                            @error('state')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Zip Code">Zip Code</label>
                                                            <input type="text"  id="zip_code" name="zip_code" value="{{ old('zip_code') ?? $Labelprintfrom->zip_code }}" class="form-control @error('zip_code') is-invalid @enderror">
                                                            @error('zip_code')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div><br>
                                                    <div class="col-md-12"><br>
                                                        <h3>Wish Us</h3>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="Date of Birth">Date of Birth</label>
                                                                    <input type="date"  id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') ?? $Labelprintfrom->date_of_birth }}" class="form-control @error('date_of_birth') is-invalid @enderror">
                                                                    @error('date_of_birth')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="Partner Name">Partner Name</label>
                                                                    <input type="text"  id="partner_name" name="partner_name" value="{{ old('partner_name') ?? $Labelprintfrom->partner_name }}" class="form-control @error('partner_name') is-invalid @enderror">
                                                                    @error('partner_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="Anniversary">Anniversary</label>
                                                                    <input type="date" id="anniversary" name="anniversary" value="{{ old('anniversary') ?? $Labelprintfrom->anniversary }}" class="form-control @error('anniversary') is-invalid @enderror">
                                                                    @error('anniversary')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="Partner's DOB">Partner's DOB</label>
                                                                    <input type="date"  id="partner_dob" name="partner_dob" value="{{ old('partner_dob') ?? $Labelprintfrom->partner_dob }}" class="form-control @error('partner_dob') is-invalid @enderror">
                                                                    @error('partner_dob')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br><br><br>
                                                    @php
                                                    // Convert the stored options string into an array
                                                    $selectedOptions = $Labelprintfrom->options ? json_decode($Labelprintfrom->options) : [];
                                                    @endphp

                                                    <div class="col-md-12 checkbox-group">
                                                        <br>
                                                        <label>
                                                            <input type="checkbox" name="options[]" value="VIP" {{ in_array('VIP', $selectedOptions) ? 'checked' : '' }}> VIP
                                                        </label>

                                                        <label>
                                                            <input type="checkbox" name="options[]" value="VVIP" {{ in_array('VVIP', $selectedOptions) ? 'checked' : '' }}> VVIP
                                                        </label>

                                                        <label>
                                                            <input type="checkbox" name="options[]" value="PATRIKA" {{ in_array('PATRIKA', $selectedOptions) ? 'checked' : '' }}> PATRIKA
                                                        </label>

                                                        <label>
                                                            <input type="checkbox" name="options[]" value="MANDIR" {{ in_array('MANDIR', $selectedOptions) ? 'checked' : '' }}> MANDIR
                                                        </label>

                                                        <label>
                                                            <input type="checkbox" name="options[]" value="NEWS" {{ in_array('NEWS', $selectedOptions) ? 'checked' : '' }}> NEWS
                                                        </label>

                                                        <label>
                                                            <input type="checkbox" name="options[]" value="GURU DHARAN" {{ in_array('GURU DHARAN', $selectedOptions) ? 'checked' : '' }}> GURU DHARAN
                                                        </label>

                                                        <label>
                                                            <input type="checkbox" name="options[]" value="KHATRIAGACH" {{ in_array('KHATRIAGACH', $selectedOptions) ? 'checked' : '' }}> KHATRIAGACH
                                                        </label>
                                                        <br>
                                                    </div>

                                                    <br><br><br>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="contact_person">Contact Person</label>
                                                            <input type="text"  id="contact_person" name="contact_person" value="{{ old('contact_person') ?? $Labelprintfrom->contact_person }}" class="form-control @error('contact_person') is-invalid @enderror">
                                                            @error('contact_person')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="std_code">STD Code</label>
                                                            <input type="text"  id="std_code" name="std_code" value="{{ old('std_code') ?? $Labelprintfrom->std_code }}" class="form-control @error('std_code') is-invalid @enderror">
                                                            @error('std_code')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Office">Office</label>
                                                            <input type="text" id="office" name="office" value="{{ old('office') ?? $Labelprintfrom->office }}" class="form-control @error('office') is-invalid @enderror">
                                                            @error('office')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Office">Offices</label>
                                                            <input type="text" id="office2" name="office2" value="{{ old('office2') ?? $Labelprintfrom->office2 }}" class="form-control @error('office2') is-invalid @enderror">
                                                            @error('office2')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Resident">Resident</label>
                                                            <input type="text"  id="resident" name="resident" value="{{ old('resident') ?? $Labelprintfrom->resident }}" class="form-control @error('resident') is-invalid @enderror">
                                                            @error('resident')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Fax">Fax</label>
                                                            <input type="text" id="fax" name="fax" value="{{ old('fax') ?? $Labelprintfrom->fax }}" class="form-control @error('fax') is-invalid @enderror">
                                                            @error('fax')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Mobile No">Mobile No</label>
                                                            <input type="number"  name="mobile_no" id="mobile_no" value="{{ old('mobile_no') ?? $Labelprintfrom->mobile_no }}" class="form-control @error('mobile_no') is-invalid @enderror">
                                                            @error('mobile_no')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="Mobile No">Mobile No 2</label>
                                                            <input type="number"  name="mobile_no2" id="mobile_no2" value="{{ old('mobile_no2') ?? $Labelprintfrom->mobile_no2 }}" class="form-control @error('mobile_no2') is-invalid @enderror">
                                                            @error('mobile_no2')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Mobile No">E-mail</label>
                                                            <input type="email" name="email" id="email" value="{{ old('email') ?? $Labelprintfrom->email }}" class="form-control @error('email') is-invalid @enderror">
                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
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