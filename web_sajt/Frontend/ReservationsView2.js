document.addEventListener("DOMContentLoaded", function () {
    async function fetchData() {

        try {
            const response = await fetch('../getAllReservation.php');
            data = await response.json();
            return data
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }
    fetchData().then(data => {
        console.log(data);
        data.forEach(apointment => {
                // Create the outer modal div
                const modalDiv = document.createElement('div');
                modalDiv.id = 'modal';
                modalDiv.className = '';

                // Create the modal-content div
                const modalContentDiv = document.createElement('div');
                modalContentDiv.className = 'modal-content';

                // Create the inner content div
                const innerDiv = document.createElement('div');
                innerDiv.className = '';

                // Create and append the paragraphs
                const dateP = document.createElement('p');
                dateP.id = 'modal-date';
                dateP.textContent = `Apoitment at: ${apointment.Apointment_date}`;
                innerDiv.appendChild(dateP);

                var [hours, minutes, seconds] = apointment.Apointment_time.split(":");
                // Remove leading zero from hours
                if (hours.startsWith("0")) {
                    hours = hours.slice(1);
                }
                time =`${hours}:${minutes}`;
                const timeP = document.createElement('p');
                timeP.id = 'modal-time';
                timeP.textContent = `Time of Apoitment: ${time}`;
                innerDiv.appendChild(timeP);

                const doctorP = document.createElement('p');
                doctorP.id = 'modal-doctor';
                doctorP.textContent = `Dentis e-mail: ${apointment.doctor_email}`;
                innerDiv.appendChild(doctorP);

                const patientP = document.createElement('p');
                patientP.id = 'modal-patiant';
                patientP.textContent = `Patiant e-mail: ${apointment.user_email}`;
                innerDiv.appendChild(patientP);

                const treatmentP = document.createElement('p');
                treatmentP.id = 'modal-treatmant';
                treatmentP.textContent = `for:  ${apointment.treatments}`;
                innerDiv.appendChild(treatmentP);

                // Append the inner div to modal-content div
                modalContentDiv.appendChild(innerDiv);

                // Append the modal-content div to modal div
                modalDiv.appendChild(modalContentDiv);

                // Append the modal div to the body or any specific element
                document.body.appendChild(modalDiv);
            
        });
    });
    
});