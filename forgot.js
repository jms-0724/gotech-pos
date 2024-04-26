document.addEventListener("DOMContentLoaded", ()=>{

    document.getElementById("forgot").addEventListener("submit", confirmOpen)

    function confirmOpen (e){
        e.preventDefault();
        const msg = document.createElement('p');
        msg.textContent = 'Password does not match'
        msg.id='msg';
        let useName = document.getElementById("use").value;
        let pass1 = document.getElementById("pass1").value;
        let pass2 = document.getElementById("pass2").value;
        const formDiv = document.getElementById("forgot");
        console.log(useName);
        console.log(pass1);
        console.log(pass2);
        console.log(formDiv);

        if(pass1 !== pass2){ 
            formDiv.appendChild(msg);
            return false;
       } else {
        let formData = new FormData();
        formData.append( "useName" , useName);
        formData.append("pass2", pass2);

        fetch('./forgotbackend',{
            method:"POST",
            body:formData,
        })
        .then(response => {
            if (!response.ok){
                throw new Error("Network Repsonse not Working")
            }
            return response.text();
        })
        .then(data => {
            if (data === "success"){
                console.log(data);
                const successModal = new bootstrap.Modal(document.getElementById("success"));
                successModal.show();
                document.getElementById("forgot").reset();
                window.location.href = "./index.php";
            } else {
                console.log(data)
                const failedModal = new bootstrap.Modal(document.getElementById("failed"));
                failedModal.show();
            }
        })
       }


    }
})