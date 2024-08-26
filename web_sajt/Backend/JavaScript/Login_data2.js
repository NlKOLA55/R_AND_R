document.addEventListener('DOMContentLoaded', function() {
    // Fetch Users data
    fetch('../../Backend/PHP/db_Select_ULogin.php')
        .then(response => response.json())
        .then(data => {
            const usersTableBody = document.querySelector('#Users_table tbody');
            console.log(data)
            data.forEach(user => {
                const row = document.createElement('tr');

                // Create a cell for each data field
                row.innerHTML = `
                    <td>${user.email}</td>
                    <td>${user.login_date}</td>
                    <td>${user.login_time}</td>
                `;

                // Append the row to the table body
                usersTableBody.appendChild(row);
            });
        })
    .catch(error => console.error('Error fetching users:', error));

    // Fetch Doctors data
    fetch('../../Backend/PHP/db_Select_DLogin.php')
        .then(response => response.json())
        .then(data => {
            console.log(data)
            const doctorsTableBody = document.querySelector('#Doctors_table tbody');
            data.forEach(doctor => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td>${doctor.email}</td>
                    <td>${doctor.login_date}</td>
                    <td>${doctor.login_time}</td>
                `;

                doctorsTableBody.appendChild(row);
            });
        })
    .catch(error => console.error('Error fetching doctors:', error));

        // Fetch Admin data
        fetch('../../Backend/PHP/db_Select_ALogin.php')
        .then(response => response.json())
        .then(data => {
            console.log(data)
            const adminsTableBody = document.querySelector('#Admin_table tbody');
            data.forEach(admin => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td>${admin.email}</td>
                    <td>${admin.login_date}</td>
                    <td>${admin.login_time}</td>
                `;

                adminsTableBody.appendChild(row);
            });
        })
    .catch(error => console.error('Error fetching Admins:', error));
});