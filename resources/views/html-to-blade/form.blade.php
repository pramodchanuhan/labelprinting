<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
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
    }

    label {
      display: block;
      margin: 10px 0;
    }

    input[type="text"], input[type="number"], select {
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
      border:none;
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
border: 1px solid black;
}

th,
td {
padding: 10px;
text-align: center;
}

th {
color: black;
}

  </style>
  <title>Interview Assessment Form</title>
</head>
<body>

<form method="POST" action="{{ route('form-store') }}">
@csrf
    <h2>Interview Assessment Form</h2>

    <label for="candidateName">Candidate Name:</label>
    <input type="text" id="candidateName" name="candidateName" required>

    <label for="phone">Contact no:</label>
    <input type="text" id="phone" name="phone" required>

    <label for="email">Email Address:</label>
    <input type="text" id="email" name="email" required>

    <label for="source">Source:</label>
    <select id="source" name="source" onchange="handleSourceChange()" required>
    <option value="Hr">HR</option>
    <option value="Walkin">Walkin</option>
    <option value="Reference">Reference</option>
    <option value="Social Site">Social Site</option>
    <option value="other">Others</option>
    </select>

    <div id="referral-textbox">
      <label for="referenceSource">Name of Referral:</label>
      <input type="text" id="referencename" name="referencename">
      <label for="referenceSource">Contact no of Referral:</label>
      <input type="text" id="referencecontact" name="referencecontact">
    </div>

    <div id="others-textbox">
      <label for="otherSource">Other Source:</label>
      <input type="text" id="otherSource" name="otherSource">
    </div>
    
    <label for="education">Qualification:</label>
    <select id="education" name="education" required>
      <option value="SSC">SSC</option>
      <option value="HSC">HSC</option>
      <option value="Undergraduate">Undergraduate</option>
      <option value="Graduate">Graduate</option>
      <option value="Masters">Masters</option>
      <option value="PG">PG</option>
      <option value="Others">Others</option>
    </select>

    <label for="position">Applied Position :</label>
    <input type="text" id="position" name="position" required>

    <label for="experienceType">Experience Type:</label>
    <select id="experienceType" name="experienceType" required>
      <option value="fresher">Fresher</option>
      <option value="experienced">Experienced</option>
    </select>

    <label for="experience">Total Years of Experience:</label>
    <input type="number" id="experience" name="experience" min="0" required>

    <label for="profile">What do you know about the Job Profile?:</label>
    <input type="text" id="jobprofile" name="jobprofile" required>

    <label for="rotationalShifts">Rotational Shifts:  </label>
    <input type="radio" name="rotationalShifts" value="Yes" required> Yes
    <input type="radio" name="rotationalShifts" value="No" required> No
   
   
    <label for="callingPreference">Calling Preference: </label>
    <input type="radio" name="callingPreference" value=" Inbound" required> Inbound
    <input type="radio" name="callingPreference" value=" Outbound" required> Outbound
   
    
    <label for="status">Current Employment Status:</label>
    <input type="text" id="emp_status" name="emp_status" required>

    <label for="emp_name">Current Employer Name:</label>
    <input type="text" id="emp_name" name="emp_name" >

    <label for="currentdesignation">Current Designation:</label>
    <input type="text" id="currentdesignation" name="currentdesignation" >
    
    <label for="currentSalary">Current CTC:</label>
    <input type="number" id="currentSalary" name="currentSalary" min="0" >

    <label for="expectedSalary">Expected CTC:</label>
    <input type="number" id="expectedSalary" name="expectedSalary" min="0" required>

    <label for="references">References:</label>
          <table class="hr-comments-table">
            <tr>
              <th>Name</th>
              <th>Contact Number</th>
            </tr>
            <tr>
              <td><textarea id="reference" name="emp_reference" rows="1"></textarea></td>
              <td><textarea id="reference" name="emp_reference_no"  rows="1"></textarea></td>
            </tr>
            <tr>
              <td><textarea id="reference" name="emp_reference1" rows="1"></textarea></td>
              <td><textarea id="reference" name="emp_reference_no1"  rows="1"></textarea></td>
            </tr>
            <tr>
              <td><textarea id="reference" name="emp_reference2" rows="1"></textarea></td>
              <td><textarea id="reference" name="emp_reference_no2"  rows="1"></textarea></td>
            </tr>
          </table>
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
      var  referralTextbox = document.getElementById('referral-textbox');

      if (sourceSelect.value === 'Reference') {
        referralTextbox.style.display = 'block';
        referralTextbox.setAttribute('required', 'true');

        othersTextbox.style.display = 'none';
        othersTextbox.removeAttribute('required');

      } else if (sourceSelect.value === 'other') {
        othersTextbox.style.display = 'block';
        othersTextbox.setAttribute('required', 'true');

        referralTextbox.style.display = 'none';
        referralTextbox.removeAttribute('required');
      } 
      
      else {
        referralTextbox.style.display = 'none';
        referralTextbox.removeAttribute('required');

        othersTextbox.style.display = 'none';
        othersTextbox.removeAttribute('required');
      }
    }
  
  </script>

</body>
</html>

