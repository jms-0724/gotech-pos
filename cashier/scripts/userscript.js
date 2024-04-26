document.addEventListener('DOMContentLoaded',()=>{
    //Display for Search
    function display(){
         document.getElementById('searchUsers').value = "";
        fetch('php_manageusers/displayusers.php', {
            method: 'POST',
        })
        //Ensure response is ok
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.text();
        })
        .then(data => {
            document.getElementById("usersTable").innerHTML = data;
        })
        .catch(error => {
            console.error("Fetch error:", error);
        });
    }
    display();
    //Display Searched Values
    function displaySearch(search){
        fetch('php_manageusers/displayusers.php',{
            method: "POST",
            body: new URLSearchParams({
                search:search
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.text();
        })
        .then(data=>{
            document.getElementById("usersTable").innerHTML = data;
        })
        .catch(error => {
            console.error("Fetch error:", error);
        })
    }
    //Keyup Event Listener
    document.getElementById('searchUsers').addEventListener('keyup',(event)=>{
        let data = event.target.value;
        if(data){
            displaySearch(data);
        } else{
            display();
        }
    })
    /*Add User*/
    document.getElementById("add_form_user").addEventListener("submit", function(e) {
        e.preventDefault();
        $("#confirm_user").modal("show")
        $("#addUsers").modal("hide"); 
        // document.getElementById("confirm_user").classList.add("show");
       // document.getElementById("addUsers").classList.remove("show");

    });
    document.getElementById("backtoAdd").addEventListener("click", function() {
        $("#confirm_user").modal('hide');
        $("#addUsers").modal("show");

    });
    //Add to database
    document.getElementById("addDB").addEventListener("click", ()=>{
        let adduname = document.getElementById("adduname").value;
        let addpword = document.getElementById("addpword").value;
        let add_level = document.getElementById("add_level").value;
        let fname = document.getElementById("fname").value;
        let lname = document.getElementById("lname").value;
        //Fetch API
        fetch("php_manageusers/addusers.php",{
            method:"POST",
            headers: {"Content-Type":"application/x-www-form-urlencoded"},
            body: new URLSearchParams({
                adduname: adduname, 
                addpword : addpword,
                add_level: add_level,
                fname:  fname,
                lname:  lname
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.text();
        })
        .then(data=>{
            if (data = "success"){
                const successAlertModal = new bootstrap.Modal(document.getElementById("success"));
                successAlertModal.show();
                $("#confirm_user").modal("hide");
                display();
            } else {
                const failedAlert = new bootstrap.Modal(document.getElementById("failed"));
                failedAlert.show();
                $("#confirm_user").modal("hide");
            }
        })
    })
    //Confirm Update
    document.getElementById("up_form").addEventListener("submit",(e)=>{
    e.preventDefault()
    $("#confirm_upd").modal("show")
    $("#upd_Users").modal("hide"); 
    /* const confirmUpModal  = new bootstrap.Modal(document.getElementById("confirm_upd"));
    confirmUpModal.show();
    const updateUser = new bootstrap.Modal(document.getElementById("upd_Users"));
    updateUser.hide() */
    })
    document.getElementById("backtoUp").addEventListener("click",()=>{
    const updateModal  = new bootstrap.Modal(document.getElementById("upd_Users"));
    updateModal.show();
    $("#confirm_upd").modal('hide');
})
    document.getElementById("updDB").addEventListener("click",()=>{
        let uID = document.getElementById('uID').textContent;
        let up_uname = document.getElementById("up_uname").value;
        let up_pword = document.getElementById("up_pword").value;
        let up_level = document.getElementById("up_level").value;
        let up_fname = document.getElementById("up_fname").value;
        let up_lname = document.getElementById("up_lname").value;


        fetch("php_manageusers/update2.php",{
            method: 'POST',
            headers: {
                "Content-Type":"application/x-www-form-urlencoded"
            },
            body: new URLSearchParams({
                uid:uID,
                up_uname:up_uname,
                up_pword:up_pword,
                up_level:up_level,
                up_fname:up_fname,
                up_lname:up_lname
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.text();
        })
        .then(data=>{
                if(data == "success"){
                    console.log(data);
                    const successModal = new bootstrap.Modal(document.getElementById("success"));
                    successModal.show();
                    document.getElementById("up_form").reset();
                    $("#confirm_upd").modal('hide');
                    display();
                } else {
                    console.log(data);
                    const failedModal = new bootstrap.Modal(document.getElementById("failed"));
                    failedModal.show();
                    $("#confirm_upd").modal('hide');
                }
            })
    })

});
   //Update
   function editUser(uid){
    fetch('php_manageusers/updateUsers.php',{
        method: 'POST',
        headers: {'Content-type':'application/x-www-form-urlencoded'},
        body: new URLSearchParams({
            uid: uid
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("HTTP-Error: " + response.status);
        } 
        return response.text();
    })
    .then(data => {
        let tbl_user = JSON.parse(data);
        document.getElementById("uID").textContent = tbl_user.uid;
        document.getElementById("up_uname").value = tbl_user.username;
        document.getElementById("up_pword").value = tbl_user.password;
        document.getElementById("up_level").value = tbl_user.ulevel;
        document.getElementById("up_fname").value = tbl_user.fname;
        document.getElementById("up_lname").value = tbl_user.lname;
        const editModal = new bootstrap.Modal(document.getElementById("upd_Users"));
        editModal.show();
    })
    .catch(error => {
        console.error('Error:', error);
    });  
   
}



    