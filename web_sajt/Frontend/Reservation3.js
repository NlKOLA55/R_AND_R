document.addEventListener("DOMContentLoaded", function () {
    async function fetchData() {

        try {
            const response = await fetch('../getData.php');
            data = await response.json();
            return data
        } catch (error) {
            console.error('Error fetching doctor:', error);
        }
    }
    async function fetchUser() {
        try {
            const response1 = await fetch('../getUser.php');
            const user = await response1.text();
            return user;
        } catch (error) {
            console.error('Error fetching user:', error);
        }
    }
    fetchData().then(data => {
    fetchUser().then(user => {
        console.log("Doctor data") ;
        console.log(data);
        console.log("user data") ;
        console.log(user);
        var treatmentsList= [
            "Dental restoration",
            "Dental braces",
            "Dental implant",
            "Dental extraction"
        ];
        var FilteredTreatmentsList = treatmentsList;
        var doctor = data;

        //Add options to filter
        const filterTreatments = document.getElementById("treatments");
        const filterDoctor = document.getElementById("doctor");
        data.forEach(doctor => {

            const option = document.createElement("option");

            option.value = doctor.id;
            option.textContent = `${doctor.lname} ${doctor.fname}`;
            
            filterDoctor.appendChild(option);

        });
        //Filter Treatments
        filterTreatments.addEventListener("change",function(){
            const id = filterTreatments.value
            if(id != 0){
                for (let j = 0; j < treatmentsList.length; j++) {
                    let variable = treatmentsList[j];
                    if (variable == id){
                        FilteredTreatmentsList = [];
                        FilteredTreatmentsList.push(variable);
                        break;
                    }
                }
            }else{
                FilteredTreatmentsList = treatmentsList;
            }
            createCalendar(currentMonth, currentYear);
        });

        //Filter Doctors
        filterDoctor.addEventListener("change",function(){
            const id = filterDoctor.value
            if(id != 0){
                for (let j = 0; j < data.length; j++) {
                    let variable = data[j];
                    if (variable.id == id){
                        doctor = [];
                        doctor.push(variable);
                        break;
                    }
                }
            }else{
                doctor = data;
            }
            createCalendar(currentMonth, currentYear);
        });

        const monthYear = document.getElementById("month-year");
        const daysContainer = document.getElementById("days");

        const modal = document.getElementById("modal");
        const modalDate = document.getElementById("modal-date");
        const modalTime = document.getElementById("modal-time");
        const modalDoctor = document.getElementById("modal-doctor");
        const modalTreatmant = document.getElementById("modal-treatmant");
        const treatmantList = document.getElementById('treatmant');
        const dentistList = document.getElementById('dentist');
        const timeList = document.getElementById('time');
        const closeModal = document.getElementsByClassName("close")[0];
        const confirmBtn = document.getElementById('confirmBtn')

        const prevMonthButton = document.getElementById("prev-month");
        const nextMonthButton = document.getElementById("next-month");

        let today = new Date();
        let currentMonth = today.getMonth();
        let currentYear = today.getFullYear();

        // Calculate the last allowed month 
        const maxMonth = (currentMonth + 6) % 12;
        const maxYear = currentYear + Math.floor((currentMonth + 6) / 12);

        const monthNames = [
            "January", "February", "March", "April", "May", "June", 
            "July", "August", "September", "October", "November", "December"
        ];
        //Update Month and Year
        function updateMonthYear() {
            monthYear.textContent = `${monthNames[currentMonth]} ${currentYear}`;
            // Disable navigation buttons if they exceed the allowed range
            prevMonthButton.disabled = (currentMonth === today.getMonth() && currentYear === today.getFullYear());
            nextMonthButton.disabled = (currentMonth === maxMonth && currentYear === maxYear);
        }

        //Create Calendar ----------------------------------------------------------//
        function createCalendar(month, year) {
            const firstDay = new Date(year, month).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            daysContainer.innerHTML = "";

            for (let i = 0; i < firstDay; i++) {
                const blankDay = document.createElement("div");
                daysContainer.appendChild(blankDay);
            }

            for (let i = 1; i <= daysInMonth; i++) {
                const day = document.createElement("div");
                day.textContent = i;


                if (doctor.length == 1 && FilteredTreatmentsList.length == 1){
                    var start = doctor[0].workHours[(firstDay + i -1 -1) % 7].start_time;  
                    var end = doctor[0].workHours[(firstDay + i -1 -1) % 7].end_time;
                    //first -1 is because i=1 and the second -1 is because the calendar starts from Sunday
                        
                    if (start != end) {
                        var exists = doctor[0].treatments.some(function(t) {
                            return t.treatment === FilteredTreatmentsList[0];
                        });
                        
                        // Create pop up --------------------- ------------------------//
                        if(exists){
                            day.classList.add('clickable');
                            day.addEventListener("click", function () {
                                modalFunction(i,firstDay);
                            });
                        }
                    }
                }
                daysContainer.appendChild(day);
               
            }
        }
        //Buttons for Nex and Prev Month
        function goToNextMonth() {
            if (currentMonth < 11) {
                currentMonth++;
            } else {
                currentMonth = 0;
                currentYear++;
            }
            updateMonthYear();
            createCalendar(currentMonth, currentYear);
        }

        function goToPrevMonth() {
            if (currentMonth > 0) {
                currentMonth--;
            } else {
                currentMonth = 11;
                currentYear--;
            }
            updateMonthYear();
            createCalendar(currentMonth, currentYear);
        }

        updateMonthYear();
        createCalendar(currentMonth, currentYear);

        prevMonthButton.addEventListener("click", goToPrevMonth);
        nextMonthButton.addEventListener("click", goToNextMonth);

        closeModal.onclick = function () {
            modal.style.display = "none";
            dentistList.style.display = "none";
            treatmantList.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        function modalFunction(day,firstDay){
            modal.style.display = "block";
            // if(FilteredTreatmentsList.length >1){
            //     FilteredTreatmentsList.forEach(item => {
            //         const option = document.createElement("option");

            //         option.value = item;
            //         option.textContent = item;
                
            //         treatmantList.appendChild(option)
            //     });
            //     modalTreatmant.textContent = `for:`;
            //     treatmantList.style.display = "block";
            // }else{
                modalTreatmant.textContent = `for: ${FilteredTreatmentsList[0]}`;
            //}
            // if(doctor.length >1){
            //     doctor.forEach(item => {
            //         timeList.style.display = "none";

            //         const option = document.createElement("option");
        
            //         option.value = item.id;
            //         option.textContent = `${item.lname} ${item.fname}`;
                    
            //         dentistList.appendChild(option);
            //     });
            //     dentistList.style.display = "block";
            // }else{
                modalDoctor.textContent = `With doctor: ${doctor[0].fname} ${doctor[0].lname}`;
            //}
                start = doctor[0].workHours[(firstDay + day -1 -1) % 7].start_time;
                end = doctor[0].workHours[(firstDay + day -1 -1) % 7].end_time;
                while(start !== end){
                    const option = document.createElement("option");
        
                    option.value = start;

                    var [hours, minutes, seconds]= start.split(":");
                    if (hours.startsWith("0")) {
                        hours = hours.slice(1);
                    }
                    time =`${hours}:${minutes}`;
                    option.textContent = time ;
                    timeList.appendChild(option);

                    hours = parseInt(hours);
                    minutes = parseInt(minutes);
                    
                    minutes += 30;
                    // Adjust hours if minutes exceed 59
                    if (minutes >= 60) {
                        hours += Math.floor(minutes / 60);
                        minutes = minutes % 60;
                    }
                    // Ensure hours, minutes, and seconds are two digits
                    hours = hours.toString().padStart(2, '0');
                    minutes = minutes.toString().padStart(2, '0');
                    
                    start = `${hours}:${minutes}:${seconds}`;
                }
            modalDate.textContent = `Apoitment at: ${day}/${currentMonth+1}/${currentYear}`;
            modalTime.textContent = `Time of Apoitment:`;

            timeList.addEventListener('change',function(){
                var [hours, minutes, seconds]= timeList.value.split(":");
                if (hours.startsWith("0")) {
                    hours = hours.slice(1);
                }
                time =`${hours}:${minutes}`;
                modalTime.textContent =`Time of Apoitment: ${time}`;
            });

            confirmBtn.addEventListener("click",function()
            {if(timeList.value){
                var formData = new FormData();
                let month = (currentMonth+1).toString();
                let strday = day.toString();
                formData.append(`apointment_date`,`${currentYear}/${month.padStart(2, '0')}/${strday.padStart(2, '0')}`); //YYYY-MM-DD
                formData.append(`apointment_time`,timeList.value);
                formData.append(`user_id`,user);
                formData.append(`doctor_id`,doctor[0].id);
                formData.append(`treatments`,FilteredTreatmentsList[0]);

                fetch('../../Backend/PHP/db_Insert_Apointment.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        alert('Form submitted successfully!');
                        form.reset();
                        window.location.href = 'Profile.php';
                    } else {
                        alert('Form submission failed: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred during form submission.');
                });
            }else{
                timeList.style.outline = "2px solid red";
                timeList.addEventListener('click', function(){removeWorning(timeList)});
            }
            });
        }
    });
    });
});
function removeWorning(x){
    x.style.outline = "none";
}