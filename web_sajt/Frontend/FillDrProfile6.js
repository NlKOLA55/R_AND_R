
document.addEventListener('DOMContentLoaded', function() {
    async function fetchDoctorData() {

        try {
            const response = await fetch('../getDoctor.php');
            doctor = await response.json();
            return doctor
        } catch (error) {
            console.error('Error fetching doctor:', error);
        }
    }
    var doctor = fetchDoctorData().then(() => {
        console.log(doctor)
        var treatmentsList= [
            {dental_restoration: "Dental restoration"},
            {dental_braces: "Dental braces"},
            {dental_implant: "Dental implant"},
            {dental_extraction: "Dental extraction"}
        ];
        

        var profileImg = document.getElementById('ProfileImg');
        
        var nameDisplay = document.getElementById('nameDisplay');
        var changeName = document.getElementById('ChangeName')
        var lastNameDisplay = document.getElementById('LastNameDisplay')
        var changeLastName = document.getElementById('ChangeLastName')
    
        var changePasswordConteiner = document.getElementById('ChangePasswordConteiner');
        var passwordChange = document.getElementById('passwordChange')
        var passwordConfirm = document.getElementById('passwordConfirm')
        
        var treatmentsConteiner = document.querySelector('#treatmentsConteiner tbody')
        var editTreatments = document.getElementById('editTreatments')
        var treatments =document.getElementById('treatments')
        var length = document.getElementById('length')
        var addBtn = document.getElementById('addBtn')

        var editBtn = document.getElementById('EditBtn');
        var saveBtn = document.getElementById('SaveBtn');
        var cancleBtn = document.getElementById('CancleBtn')
    
        nameDisplay.textContent =`Name: ${doctor.fname}`;
        lastNameDisplay.textContent =`Last Name: ${doctor.lname}`
        if(doctor.img){
            profileImg;
        }

        console.log(doctor.treatments);
        if(doctor.treatments){
            console.log('enterd doctor.treatment')
            doctor.treatments.forEach((treatment) =>{
                const row = document.createElement('tr');

                // Create a cell for each data field
                row.innerHTML = `
                    <td class="treatmentName">${treatment.treatment}</td>
                    <td class="treatmentLenght">${treatment.length}</td>
                    <td>
                        <button class="btn btn-danger btn-sm none" onclick="deleteRow(this)">Delete</button>
                    </td>
                `;
                // Append the row to the table body
                treatmentsConteiner.appendChild(row);

                treatmentsList = treatmentsList.filter(function(x) {
                    // Get the value of the only key in the object
                    return !Object.values(x).includes(treatment.treatment);
                });
            });
            
        }  
        treatmentsList.forEach((variable, index) => {
            for (const key in variable) {
                const option = document.createElement("option");

                option.value = variable[key];
                option.textContent = variable[key];
                treatments.appendChild(option);
                
            }
        });
        console.log(treatmentsList);
        let i = 0;
        document.querySelectorAll('.dayCard').forEach((card) => {
            // Select elements within the card
            var showStart = card.querySelector('#showStart');
            var showEnd = card.querySelector('#showEnd');
            var startSlider = card.querySelector('#StartSlider');
            var endSlider = card.querySelector('#EndSlider');
            
            function procesTime(time){
                var [hours, minutes, seconds] = time.split(":");
                // Remove leading zero from hours
                if (hours.startsWith("0")) {
                    hours = hours.slice(1);
                }
                time =`${hours}:${minutes}`;
                return time;
            }
            function procesValue(time){
                var [hours, minutes, seconds] = time.split(":");
                if (hours.startsWith("0")) {
                    hours = hours.slice(1);
                }
                hours = parseInt(hours, 10);
                var value = hours*2;
                if(!(minutes === "00")){
                    value ++;
                }
                return value;
            }
            function procesValueReverse(value){

                var time = Math.floor(value / 2)
                if(value%2){
                    time = `${time}:30`;
                }else{
                    time=`${time}:00`;
                }
                return time
            }
            showStart.textContent=`Start:${procesTime(doctor.workHours[i].start_time)}`;
            showEnd.textContent=`End:${procesTime(doctor.workHours[i].end_time)}`;
            
            startSlider.value = procesValue(doctor.workHours[i].start_time);
            startSlider.addEventListener('input', () => {
              showStart.textContent = `Start: ${procesValueReverse(startSlider.value)}`;
              if(parseInt(startSlider.value, 10)> parseInt(endSlider.value, 10)){
                showEnd.textContent = showStart.textContent;
                endSlider.value = startSlider.value;
              }
            });

            endSlider.value =  procesValue(doctor.workHours[i].end_time);
            endSlider.addEventListener('input', () => {
              showEnd.textContent = `End: ${procesValueReverse(endSlider.value)}`;
              if( parseInt(endSlider.value, 10) < parseInt(startSlider.value, 10)){
                showStart.textContent = showEnd.textContent;
                startSlider.value = endSlider.value;
              }
            });
            i++;
        });
       



        editBtn.addEventListener('click', function() {
            changeName.style.display = "block";
            changeLastName.style.display = "block";
            changePasswordConteiner.style.display = "block";
            editTreatments.style.display = "block";

            saveBtn.style.display = "block";
            cancleBtn.style.display ="block";
            editBtn.style.display ="none";

            treatmentsConteiner.querySelectorAll('tr').forEach((row)=>{
                var none = row.querySelector('.none');

                none.style.display ="block"
            });



            document.querySelectorAll('.dayCard').forEach((card) => {
                // Select elements within the card
                const startSlider = card.querySelector('#StartSliderConteiner');
                const endSlider = card.querySelector('#EndSliderConteiner');
    
                startSlider.style.display="block";
                endSlider.style.display="block";
            });
        });
        cancleBtn.addEventListener('click', function() {
            location.reload();
        });



        addBtn.addEventListener('click',function(){
            if(length.value && treatments.value){
                const row = document.createElement('tr');
                // Create a cell for each data field
                row.innerHTML = `
                <td class="treatmentName">${treatments.value}</td>
                <td class="treatmentLenght">${length.value}</td>
                <td >
                    <button class="btn btn-danger btn-sm none" onclick="deleteRow(this)">Delete</button>
                </td>
                `;
                treatmentsConteiner.appendChild(row);
                row.querySelector(".none").style.display="block";
                if (treatments.selectedIndex !== -1) { // Ensure there is a selected option
                    treatments.remove(treatments.selectedIndex);
                }
            }else{
                if(!treatments.value){
                    treatments.style.outline = "2px solid red";
                    treatments.addEventListener('click', function(){removeWorning(treatments)});
                }
                if(!length.value){
                    length.style.outline = "2px solid red";
                    length.addEventListener('click', function(){removeWorning(length)});
                }
            }
        });




        // __________________________________________________________________________________//
        saveBtn.addEventListener('click',function(){
            var formData = new FormData();

            //formData.append('profileImg', profileImg.value);

            formData.append('id',doctor.id);

            formData.append('changeName', changeName.value);
            formData.append('changeLastName', changeLastName.value);

            formData.append('passwordChange', passwordChange.value);
            formData.append('passwordConfirm', passwordConfirm.value);
            //""""""""""""""""""""""""""""""""""""""//
            
            treatmentsConteiner.querySelectorAll('tr').forEach((row)=>{
                var treatmentName = row.querySelector('.treatmentName');
                var treatmentLenght = row.querySelector('.treatmentLenght');

                treatmentName = treatmentName.textContent.split(" ");
                treatmentName = treatmentName[0]+"_"+treatmentName[1]
                formData.append(treatmentName,treatmentLenght.textContent);
            });

            document.querySelectorAll('.dayCard').forEach((card) => {

                var showStart = card.querySelector('#showStart');
                showStart = showStart.textContent;
                showStart = precesTime(showStart);

                var showEnd = card.querySelector('#showEnd');
                showEnd = showEnd.textContent;
                showEnd = precesTime(showEnd);

                function precesTime(time){
                    var [text, hours, minutes, seconds] = time.split(":");
                    // Remove leading zero from hours
                    hours = hours.trim();
                    if (hours.length == 1) {
                        hours = '0'+hours;
                    }
                    time =`${hours}:${minutes}:00`;
                    return time;
                }
                var time = [showStart,showEnd];

                var day = card.querySelector('#day');
                formData.append(`${day.textContent}`,time);

            });
            console.log("Form Data Contents:");
            for (let [key, value] of formData.entries()) {
                console.log(`${key}: ${value}`);
            }
            if (validateForm(formData)) {
                // If validation passes, submit the form data via AJAX
                submitForm(formData);
        
            }
            function validateForm(formData) {
                const namePattern = /^[A-Za-z\s]+$/;
                if (!(formData.get('changeName') === '')) {
                    if (!namePattern.test(formData.get('changeName'))) {
                        alert('Name should only contain alphabetic characters.');
                        return false;
                    }
                }
                if (!(formData.get('changeLastName') === '')) {
                    if (!namePattern.test(formData.get('changeLastName'))) {
                        alert('Last Name should only contain alphabetic characters.');
                        return false;
                    }
                }
            
                const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/;
                if (!(formData.get('passwordChange') === '')) {
                    if (!passwordPattern.test(formData.get('passwordChange'))){
                        alert('Password not good (aA1.1234)');
                        return false;
                    }
                    else if(!(formData.get('passwordChange') === formData.get('passwordConfirm'))){
                        alert('Confirm Password');
                        return false;
                    }
                }
                return true;
            }
            function submitForm(formData) {
                console.log(formData)
                fetch('../../Backend/PHP/db_Update_Doctor.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        alert('Changes Saved');
                        location.reload();
                    } else {
                        alert('Form submission failed: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred during form submission.');
                });
            }
        });

    });
});
function deleteRow(button) {
    const row = button.parentElement.parentElement;
    const text =  row.querySelector('.treatmentName').textContent;
    const treatments =document.getElementById('treatments');

    const option = document.createElement("option");
    option.value = text;
    option.textContent = text;
    treatments.appendChild(option);

    row.parentElement.removeChild(row);
};
function removeWorning(x){
    x.style.outline = "none";
}