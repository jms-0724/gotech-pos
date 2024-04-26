document.addEventListener('DOMContentLoaded', () => {


    //Variable for Form
    const form = document.getElementById('login');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let uname = document.getElementById('uname').value;
        let pword = document.getElementById('pword').value;

        fetch('login.php', {
            method: 'POST',
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: new URLSearchParams({
                uname: uname,
                pword: pword
            })
        })
        .then(response => response.text()) // assuming the response is plain text
        .then(result => {
            if (result === "admin") {
                window.location.href = "admin/admin.php";
            } else if (result === "cashier") {
                window.location.href = "cashier/cashier.php";
            } else {
                const failedModal = new bootstrap.Modal(document.getElementById("incorrect"));
                failedModal.show();
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
