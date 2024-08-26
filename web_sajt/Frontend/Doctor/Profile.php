<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Napravi Akaunt</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>

    p{
      width: auto;
    }
    .profileImg{
      width: 150px;
      height: 150px;
    }
    .dayCard{
      padding: 10px;
    }
    .none{
      display: none;
    }
  </style>
</head>
<body>
    <?php
    include 'DoctorNav.php';
    include '../../Backend/WorkDay.php';
    include '../../Backend/MandatoryObject.php';
    ?>
  <div style="margin-left:30px ;"> 
    <div class=" row " style="margin: 5px ;">
      <div class="col-4 row">
        <div class="profileImg col-3">
          <img src="https://via.placeholder.com/150" class="d-block w-100 profile-img" alt="..." id="ProfileImg">
        </div>

        <div class="col-8">
          <label id="nameDisplay">Name: </label><br>
          <input  type="text" class="form-control none" id="ChangeName" name="fname" placeholder="Change Name">
          <label id="LastNameDisplay">Last Name: </label><br>
          <input  type="text" class="form-control none" id="ChangeLastName" name="lname" placeholder="Change Last Name">
        </div>

        <div class="col-11 none" id="ChangePasswordConteiner">
          <label>Change password </label>
          <input type="password" class="form-control" id="passwordChange" name="passwordChange" placeholder="">
          <label>Confirm Change </label>
          <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="">
        </div>
      </div>

      <div class="col-3">
        <table class="table table-striped" id="treatmentsConteiner">
          <thead>
          <tr>
              <th>Treatments</th>
              <th>lenght</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <!-- User data will be added here -->
          </tbody>
        </table>
      </div>
      <div class="col-5 none" id="editTreatments">
        <label for="length ">Treatments:</label>
        <select class="" id="treatments">
          <option value="" disabled selected>Select treatment</option>

        </select>
        <label for="treatments">Appointment length:</label>
        <select class="" id="length">
          <option value="" disabled selected>Select duration</option>
          <option value="00:30:00">30min</option>
          <option value="01:00:00">1h</option>
          <option value="01:30:00">1h 30m</option>
          <option value="02:00:00">2h</option>
        </select>
        <button class="addBtn" id="addBtn">Add treatment</button>
      </div>
    </div>

    <div>
      <button class="EditBtn" id="EditBtn">Edit Profile</button>
    </div>
    <div>
      <button class="CancleBtn none" id="CancleBtn">Cancel Changes</button>
    </div>
    <div>
      <button class="SaveBtn none" id="SaveBtn">Save Changes</button>
    </div>
    <hr>

    <div class="dayCard row" id="MondayCard">
      <div class="col-1" id="day">Monday</div>
      <div class="col-1">
        <p id="showStart">Start: 07:00</p>
      </div>
      <div class="range-slider col-4 none" id="StartSliderConteiner">
        <input id="StartSlider" type="range" class="form-range" min="0" max="48" step="1" multiple>
      </div>
      <div class="col-1">
        <p id="showEnd">End: 17:00</p>
      </div>
      <div class="range-slider col-4 none" id="EndSliderConteiner">
        <input id="EndSlider" type="range" class="form-range" min="0" max="48" step="1" multiple>
      </div>
    </div>
    <hr>
    <div class="dayCard row" id="dayCard">
      <div class="col-1" id="day">Tuesday</div>
      <div class="col-1">
        <p id="showStart">Start: 07:00</p>
      </div>
      <div class="range-slider col-4 none" id="StartSliderConteiner">
        <input id="StartSlider" type="range" class="form-range" min="0" max="48" step="1" multiple>
      </div>
      <div class="col-1">
        <p id="showEnd">End: 17:00</p>
      </div>
      <div class="range-slider col-4 none" id="EndSliderConteiner">
        <input id="EndSlider" type="range" class="form-range"  min="0" max="48" step="1" multiple>
      </div>
    </div>
    <hr>

    <div class="dayCard row" id="dayCard">
      <div class="col-1" id="day">Wednesday</div>
      <div class="col-1">
        <p id="showStart">Start: 07:00</p>
      </div>
      <div class="range-slider col-4 none" id="StartSliderConteiner">
        <input id="StartSlider" type="range" class="form-range" min="0" max="48" step="1" multiple>
      </div>
      <div class="col-1">
        <p id="showEnd">End: 17:00</p>
      </div>
      <div class="range-slider col-4 none" id="EndSliderConteiner">
        <input id="EndSlider" type="range" class="form-range" min="0" max="48" step="1" multiple>
      </div>
    </div>

    <hr>
    <div class="dayCard row" id="dayCard">
      <div class="col-1" id="day">Thursday</div>
      <div class="col-1">
        <p id="showStart">Start: 07:00</p>
      </div>
      <div class="range-slider col-4 none" id="StartSliderConteiner">
        <input id="StartSlider" type="range" class="form-range" min="0" max="48" step="1" multiple>
      </div>
      <div class="col-1">
        <p id="showEnd">End: 17:00</p>
      </div>
      <div class="range-slider col-4 none" id="EndSliderConteiner">
        <input id="EndSlider" type="range" class="form-range"min="0" max="48" step="1" multiple>
      </div>
    </div>
    <hr>
    <div class="dayCard row" id="dayCard">
      <div class="col-1" id="day">Friday</div>
      <div class="col-1">
        <p id="showStart">Start: 07:00</p>
      </div>
      <div  class="range-slider col-4 none" id="StartSliderConteiner">
        <input id="StartSlider" type="range" class="form-range" min="0" max="48" step="1" multiple>
      </div>
      <div class="col-1">
        <p id="showEnd">End: 17:00</p>
      </div>
      <div class="range-slider col-4 none" id="EndSliderConteiner">
        <input id="EndSlider" type="range" class="form-range" min="0" max="48" step="1" multiple>
      </div>
    </div>
    <hr>
    <div class="dayCard row" id="dayCard">
      <div class="col-1" id="day">Saturday</div>
      <div class="col-1">
        <p id="showStart">Start: 07:00</p>
      </div>
      <div class="range-slider col-4 none" id="StartSliderConteiner">
        <input id="StartSlider" type="range" class="form-range" min="0" max="48" step="1" multiple>
      </div>
      <div class="col-1">
        <p id="showEnd">End: 17:00</p>
      </div>
      <div class="range-slider col-4 none" id="EndSliderConteiner">
        <input id="EndSlider" type="range" class="form-range" min="0" max="48" step="1" multiple>
      </div>
    </div>
    <hr>
    <div class="dayCard row" id="dayCard">
      <div class="col-1 " id="day">Sunday</div>
      <div class="col-1">
        <p id="showStart">Start: 07:00</p>
      </div>
      <div  class="range-slider col-4 none" id="StartSliderConteiner">
        <input id="StartSlider" type="range" class="form-range" min="0" max="48" step="1" multiple>
      </div>
      <div class="col-1">
        <p id="showEnd">End: 17:00</p>
      </div>
      <div class="range-slider col-4 none" id="EndSliderConteiner">
        <input id="EndSlider" type="range" class="form-range" min="0" max="48" step="1" multiple>
      </div>
    </div>

  </div> 

  <script src="../FillDrProfile6.js"></script>
</body>