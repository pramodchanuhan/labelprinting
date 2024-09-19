<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Poppins';
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            max-width: 600px;
            margin: auto;
        }

        h2 {
            text-align: center;
            padding-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0;
        }

        table.hr-comments-table textarea {
            outline: none;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            width: 90%;
            padding: 8px;
            margin: 5px 0;
            border: none;
            resize: vertical;
        }

        label.radio {
            display: block;
            margin-top: 10px;

        }

        input[type="radio"] {
            margin-right: 5px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .referral-textbox,
        .others-textbox {
            display: none;
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


        .form-group input[type="file"] {
            display: block;
            margin-top: 5px;
        }

        table.hr-comments-table input[type="text"],
        input[type="tel"] {
            outline: none;
            border: none;
        }

        .logo-container {
            display: flex;
            justify-content:center ;
            align-items: center;
            background-color: none;
            /* max-width: 100%; */
            overflow: hidden;
        }

        .logo-container img {
            max-height: 160px;
            max-width: 33.33%;
            /* height: auto; */
        }
    </style>
    <title>Interview Assessment Form</title>
</head>

<body>

    <form id="assesmentform" method="POST" action="{{ route('form-store') }}" enctype="multipart/form-data">
        @csrf
        <div class="logo-container">
            <img src="assets/img/EXR Logo.svg" alt="">
            <img src="assets/img/ECSS Logo.svg" alt="" height="90px">
            <img src="assets/img/ECS Logo.svg" alt="" height="100px">
        </div>

        <h2>Interview Assessment Form</h2>

        <label for="candidateName">Candidate Name:</label>
        <input type="text" id="candidateName" name="candidateName" required>

        <label for="phone">Contact no:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="email">Email Address:</label>
        <input type="text" id="email" name="email" required>

        <label for="company">Company:</label>
        <select class="select" name="company_id">
            <option value="">Select</option>
            @foreach ($Company as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>

        <label for="source">Source:</label>
        <select id="source" name="source" onchange="handleSourceChange()" required>
            <option value="">Select</option>
            <option value="Hr">HR</option>
            <option value="Walkin">Walkin</option>
            <option value="Reference">Reference</option>
            <option value="Social Site">Social Site</option>
            <option value="other">Others</option>
        </select>

        <div id="referral-textbox" style="display:none;">
            <label for="referenceSource">Name of Referral:</label>
            <input type="text" id="referencename" name="referencename">
            <label for="referenceSource">Contact no of Referral:</label>
            <input type="text" id="referencecontact" name="referencecontact">
        </div>

        <div id="others-textbox" style="display:none;">
            <label for="otherSource">Other Source:</label>
            <input type="text" id="otherSource" name="otherSource">
        </div>

        <div id="hr-textbox" style="display:none;">
            <label for="HRSource">HR:</label>
            <select id="" class="select" name="HRSource">
                <option value="0">
                    Select</option>
                @can('iaf asign hr')
                    @foreach ($hrs as $hr)
                        <option value="{{ $hr->id }}">
                            {{ ucfirst($hr->employee->f_name) . ' ' . ucwords($hr->employee->l_name) }}</option>
                    @endforeach
                @endcan
            </select>
        </div>


        <label for="education">Qualification:</label>
        <select id="education" name="education" required>
            <option value="">Select</option>
            <option value="SSC">SSC</option>
            <option value="HSC">HSC</option>
            <option value="Undergraduate">Undergraduate</option>
            <option value="Graduate">Graduate</option>
            <option value="Masters">Masters</option>
            <option value="PG">PG</option>
            <option value="Others">Others</option>
        </select>

        <label for="position">Applied Position :</label>
        <select id="position" name="position" onchange="handleposition()" required>
            <option value="">Select</option>
            <option value="Software Developer">Software Developer</option>
            <option value="HR Manager">HR Manager</option>
            <option value="Lead Generation Executive">Lead Generation Executive</option>
            <option value="SEO Executive">SEO Executive</option>
            <option value="Email marketing executive">Email marketing executive </option>
            <option value="BDE">BDE</option>
            <option value="Digital Marketing Executive">Digital Marketing Executive</option>
            <option value="HR Recruiter">HR Recruiter</option>
            <option value="LGE">LGE</option>
        </select>

        <div id="position-textbox" style="display:none;">
            <label for="callingPreference">Calling Preference:
                <input type="checkbox" name="callingPreference" value=" Inbound"> Inbound
                <input type="checkbox" name="callingPreference" value=" Outbound"> Outbound</label><br>
        </div>

        <label for="experienceType">Experience Type:</label>
        <select id="experienceType" name="experienceType" onchange="handleExperienceType()" required>
            <option value="">Select</option>
            <option value="Fresher">Fresher</option>
            <option value="Experienced">Experienced</option>
        </select>

        <div id="experience-textbox" style="display:none;">
            <label for="experience">Total Years of Experience:</label>
            <input type="text" id="experience" name="experience" min="0">

            <label for="status">Current/Last Employment Status:</label>
            <select id="emp_status" name="emp_status">
                <option value="">Select</option>
                <option value="Working">Working</option>
                <option value="Not Working">Not Working</option>
                <option value="On Notice Period">On Notice Period</option>
            </select>


            <label for="emp_name">Current/Last Employer Name:</label>
            <input type="text" id="emp_name" name="emp_name">

            <label for="currentdesignation">Current/Last Designation:</label>
            <input type="text" id="currentdesignation" name="currentdesignation">

            <label for="currentSalary">Current/Last CTC:</label>
            <input type="number" id="currentSalary" name="currentSalary" min="0">

        </div>

        <label for="expectedSalary">Expected CTC:</label>
        <input type="number" id="expectedSalary" name="expectedSalary" min="0" required>


        {{-- <label for="profile">What do you know about the Job Profile?:</label>
        <input type="text" id="jobprofile" name="jobprofile" required> --}}

        <label for="rotationalShifts">Rotational Shifts:
            <input type="radio" name="rotationalShifts" value="Yes" required> Yes
            <input type="radio" name="rotationalShifts" value="No" required> No </label><br>



        <label for="references">References:</label>
        <table class="hr-comments-table">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Contact Number</th>
            </tr>
            <tr>
                <td><input type="text" id="reference" name="emp_reference[]"></td>
                <td><input type="tel" id="reference" name="emp_reference_no[]"></td>
            </tr>
            <tr>
                <td><input type="text" id="reference" name="emp_reference[]"></td>
                <td><input type="tel" id="reference" name="emp_reference_no[]"></td>
            </tr>
            <tr>
                <td><input type="text" id="reference" name="emp_reference[]"></td>
                <td><input type="tel" id="reference" name="emp_reference_no[]"></td>
            </tr>
        </table>

        <div class="form-group">
            <label for="resume">Upload Resume:</label>
            {{-- <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required> --}}
            <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx">
        </div>
        <br><br>
        <div class="form-group" style="text-align: center;">
            <div>
                <button type="submit" class="btn btn-success waves-effect waves-light">
                    Submit
                </button>
                <!-- <button type="reset" class="btn btn-danger waves-effect m-l-5">
           Cancel
         </button> -->
            </div>
        </div>
    </form>


    <script>
        function handleSourceChange() {
            var sourceSelect = document.getElementById('source');
            var othersTextbox = document.getElementById('others-textbox');
            var referralTextbox = document.getElementById('referral-textbox');
            var hrTextbox = document.getElementById('hr-textbox');

            if (sourceSelect.value === 'Reference') {
                referralTextbox.style.display = 'block';
                referralTextbox.setAttribute('required', 'true');

                othersTextbox.style.display = 'none';
                othersTextbox.removeAttribute('required');

                hrTextbox.style.display = 'none';
                hrTextbox.removeAttribute('required');

            } else if (sourceSelect.value === 'other') {
                othersTextbox.style.display = 'block';
                othersTextbox.setAttribute('required', 'true');

                referralTextbox.style.display = 'none';
                referralTextbox.removeAttribute('required');

                hrTextbox.style.display = 'none';
                hrTextbox.removeAttribute('required');

            } else if (sourceSelect.value === 'Hr') {
                hrTextbox.style.display = 'block';
                hrTextbox.setAttribute('required', 'true');

                referralTextbox.style.display = 'none';
                referralTextbox.removeAttribute('required');

                othersTextbox.style.display = 'none';
                othersTextbox.removeAttribute('required');

            } else {
                hrTextbox.style.display = 'none';
                hrTextbox.removeAttribute('required');

                referralTextbox.style.display = 'none';
                referralTextbox.removeAttribute('required');

                othersTextbox.style.display = 'none';
                othersTextbox.removeAttribute('required');
            }
        }

        function handleExperienceType() {
            var experienceType = document.getElementById('experienceType');
            var experiencetextbox = document.getElementById('experience-textbox');
            var referralTextbox = document.getElementById('referral-textbox');

            if (experienceType.value === 'Experienced') {
                experiencetextbox.style.display = 'block';
                experiencetextbox.setAttribute('required', 'true');
            } else {
                experiencetextbox.style.display = 'none';
            }
        }

        function handleposition() {
            var position = document.getElementById('position');
            var positiontextbox = document.getElementById('position-textbox');

            if (position.value == 'BDE' || position.value == 'LGE') {
                positiontextbox.style.display = 'block';
                positiontextbox.setAttribute('required', 'true');
            } else {
                positiontextbox.style.display = 'none';
            }
        }
    </script>
    <script>
        document.getElementById('assessmentForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let formData = new FormData(this);


            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }
        });
    </script>
</body>

</html>
