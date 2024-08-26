document.addEventListener('DOMContentLoaded', function() {
    // Fetch Users data
    fetch('../../Backend/PHP/db_Select_Users.php')
        .then(response => response.json())
        .then(data => {
            const usersTableBody = document.querySelector('#Users_table tbody');
            data.forEach(user => {
                const row = document.createElement('tr');

                // Create a cell for each data field
                row.innerHTML = `
                    <td>${user.id}</td>
                    <td>${user.fname}</td>
                    <td>${user.lname}</td>
                    <td>${user.email}</td>
                    <td>${user.phone}</td>
                    <td>${user.gender}</td>
                    <td>${user.birthDate}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="deleteUser(${user.id}, this)">Delete</button>
                    </td>
                `;

                // Append the row to the table body
                usersTableBody.appendChild(row);
            });
        })
    .catch(error => console.error('Error fetching users:', error));

    // Fetch Doctors data
    fetch('../../Backend/PHP/db_Select_Doctors.php')
        .then(response => response.json())
        .then(data => {
            console.log(data)
            const doctorsTableBody = document.querySelector('#Doctors_table tbody');
            data.forEach(doctor => {
                const row = document.createElement('tr');

                // Add doctor data similarly as done for users
                row.innerHTML = `
                    <td>${doctor.id}</td>
                    <td>${doctor.fname}</td>
                    <td>${doctor.lname}</td>
                    <td>${doctor.email}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="deleteDoctor(${doctor.id}, this)">Delete</button>
                    </td>
                `;

                // Append the row to the table body
                doctorsTableBody.appendChild(row);
            });
        })
    .catch(error => console.error('Error fetching doctors:', error));
});

// Function to delete a user
function deleteUser(userId, button) {
    if (confirm('Are you sure you want to delete this user?')) {
        fetch(`../../Backend/PHP/db_Delete_User.php`, {
            method: 'DELETE',
            body: new URLSearchParams({ id: userId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const row = button.parentElement.parentElement;
                row.parentElement.removeChild(row);
                alert(data.message);
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deleting the user.');
        });
    }
}
function deleteDoctor(DoctorId, button) {
    if (confirm('Are you sure you want to delete this Doctor?')) {
        fetch(`../../Backend/PHP/db_Delete_Doctor.php?`, {
            method: 'DELETE',
            body: new URLSearchParams({ id: DoctorId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const row = button.parentElement.parentElement;
                row.parentElement.removeChild(row);
                alert(data.message);
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.log(error)
            console.error('Error:', error);
            alert('An error occurred while deleting the user.');
        });
    }
}