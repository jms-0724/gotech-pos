document.addEventListener('DOMContentLoaded',()=>{
    //Display for Search
    function display(){
         document.getElementById('searchProds').value = "";
        fetch('php_inventory/searchinventory.php', {
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
            document.getElementById("products").innerHTML = data;
        })
        .catch(error => {
            console.error("Fetch error:", error);
        });
    }
    display();

    //Display Searched Values
    function displaySearch(search){
        fetch('php_inventory/searchinventory.php',{
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
            document.getElementById("products").innerHTML = data;
        })
        .catch(error => {
            console.error("Fetch error:", error);
        })
    }
    //Keyup Event Listener
    document.getElementById('searchProds').addEventListener('keyup',(event)=>{
        let data = event.target.value;
        if(data){
            displaySearch(data);
        } else{
            display();
        }
    })
    // Add Products Click to Confirmation
    document.getElementById("add_inv").addEventListener('submit', (e)=>{
        e.preventDefault();
        const confirmModal = new bootstrap.Modal(document.getElementById('confirm_prods'));
        confirmModal.show();
        $("#addProducts").modal("hide");
    })
    document.getElementById("backtoAdd").addEventListener("click",()=>{
        const addInvmodal = new bootstrap.Modal(document.getElementById('addProducts'));
        addInvmodal.show();
        $("#confirm_prods").modal("hide");
    })
    document.getElementById("addinvDB").addEventListener("click", ()=>{
        // const addprod_id = document.getElementById("addprod_id").value;
        const addprod_name = document.getElementById("addprod_name").value;
        const addprod_type = document.getElementById("addprod_type").value;
        const addprod_quantity = document.getElementById("addprod_quantity").value;
        const addprod_price = document.getElementById("addprod_price").value;
        const addprod_photo = document.getElementById("addprod_photo").files[0];
        //Form Data 
        let formData = new FormData();
        // formData.append("addprod_id",addprod_id);
        formData.append("addprod_name",addprod_name);
        formData.append("addprod_type",addprod_type);
        formData.append("addprod_quantity",addprod_quantity);
        formData.append("addprod_price", addprod_price);
        formData.append("addprod_photo",addprod_photo);
        //Fetch API
        fetch("php_inventory/addinventory.php",{
            method: "POST",
            body: formData
        })
        .then(response => {
            if (!response.ok){
                throw new Error("Network Repsonse not Working")
            }
            return response.text();
        })
        .then(data=>{
            if(data == "success"){
                
                const successModal = new bootstrap.Modal(document.getElementById("success"));
                successModal.show();
                document.getElementById("add_inv").reset();
                $("#confirm_prods").modal("hide");
                display();
                dynamicOption();
                dynamicOption2();
            } else {
                console.log(data);
                const failedModal = new bootstrap.Modal(document.getElementById("failed"));
                failedModal.show();
                $("#confirm_prods").modal("hide");
            }
        })
    })
    document.getElementById("upd_inv").addEventListener('submit',(e)=>{
        e.preventDefault();
        const confirmModal = new bootstrap.Modal(document.getElementById("confirm_inv"));
        confirmModal.show();
        $("#updProducts").modal('hide');
    })
    document.getElementById("backtoUp").addEventListener('click',()=>{
        // const backModal = new bootstrap.Modal(document.getElementById("upProducts"));
        // backModal.show();
        $("#updProducts").modal('show');
        $("#confirm_inv").modal('hide');
    })

    document.getElementById('upd_items').addEventListener('submit',(e)=> {
        e.preventDefault();
        const confirmModal = new bootstrap.Modal(document.getElementById("confirm_item"));
        confirmModal.show();
        $("#addItems").modal('hide');
    })
    
    document.getElementById('backtoItems').addEventListener('submit',()=> {
        $("#addItems").modal('show');
        $("#confirm_item").modal('hide');
    })
    document.getElementById('upd_price').addEventListener('submit', (e)=>{
        e.preventDefault()
        const confirmPrice = new bootstrap.Modal(document.getElementById('confirm_price'));
        confirmPrice.show();
        $("#updPrice").modal('hide');
    })
    document.getElementById('backtoPrice').addEventListener('click', ()=>{
        $("#updPrice").modal('show');
        $("#confirm_price").modal('hide');
    })  

    document.getElementById('remove_form').addEventListener('submit', (e)=> {
        e.preventDefault();
        $("#confirm_remove").modal("show");
        $("#removeItems").modal("hide");
    })

    document.getElementById('backtoRemove').addEventListener('click', ()=> {
        
        $("#confirm_remove").modal("hide");
        $("#removeItems").modal("show");
    })

    //Update with Fetch
    document.getElementById("updDB").addEventListener('click',function(){
        
        const pid = document.getElementById('pID').textContent;
        const updprod_quantity = document.getElementById("updprod_quantity").value;
        const updprod_price = document.getElementById("updprod_price").value;
        
        let formData = new FormData();
        formData.append("pid",pid);
        formData.append("updprod_name",updprod_name);
        // formData.append("updprod_type",updprod_type);
        formData.append("updprod_quantity",updprod_quantity);
        formData.append("updprod_price", updprod_price);
        // formData.append("updprod_photo",updprod_photo);

        fetch('php_inventory/updateprice.php',{
            method: 'POST',
            body:formData
        })
        .then(response => {
            if (!response.ok){
                throw new Error("Network Repsonse not Working")
            }
            return response.text();
        })
        .then(data =>{
            if(data == "success"){
                console.log(data);
                const successModal = new bootstrap.Modal(document.getElementById("success"));
                successModal.show();
                document.getElementById("add_inv").reset();
                $("#confirm_inv").modal("hide");
                display();
            } else {
                console.log(data);
                const failedModal = new bootstrap.Modal(document.getElementById("failed"));
                failedModal.show();
                $("#confirm_inv").modal("hide");
            }
        })
    })

    document.getElementById("updItem").addEventListener('click',function(){
        const updprod_name = document.getElementById('items').value;
        const updprod_quantity = document.getElementById("updprod_quantity").value;
        // const updprod_price = document.getElementById("updprod_price").value;
        
        let formData = new FormData();
        //formData.append("pid",pid);
        formData.append("updprod_name",updprod_name);
        // formData.append("updprod_type",updprod_type);
        formData.append("updprod_quantity",updprod_quantity);
        //formData.append("updprod_price", updprod_price);
        // formData.append("updprod_photo",updprod_photo);
        console.log(formData);
        fetch('php_inventory/updateitem.php',{
            method: 'POST',
            body:formData
            
        })
        .then(response => {
            if (!response.ok){
                throw new Error("Network Repsonse not Working")
            }
            return response.text();
        })
        .then(data =>{
            if(data == "success"){
                console.log(data);
                const successModal = new bootstrap.Modal(document.getElementById("success"));
                successModal.show();
                document.getElementById("upd_items").reset();
                $("#confirm_item").modal("hide");
                display();
                dynamicOption();
            } else {
                console.log(data);
                const failedModal = new bootstrap.Modal(document.getElementById("failed"));
                failedModal.show();
                $("#confirm_item").modal("hide");
            }
        })
    })

    document.getElementById("DBminus").addEventListener('click',function(){
        const updprod_name = document.getElementById('itemstoRemove').value;
        const updprod_quantity = document.getElementById("remove_quantity").value;
        // const updprod_price = document.getElementById("updprod_price").value;
        
        let formData = new FormData();
        //formData.append("pid",pid);
        formData.append("updprod_name",updprod_name);
        // formData.append("updprod_type",updprod_type);
        formData.append("updprod_quantity",updprod_quantity);
        //formData.append("updprod_price", updprod_price);
        // formData.append("updprod_photo",updprod_photo);
        console.log(formData);
        fetch('php_inventory/removeitems.php',{
            method: 'POST',
            body:formData
            
        })
        .then(response => {
            if (!response.ok){
                throw new Error("Network Repsonse not Working")
            }
            return response.text();
        })
        .then(data =>{
            if(data == "success"){
                console.log(data);
                const successModal = new bootstrap.Modal(document.getElementById("success"));
                successModal.show();
                document.getElementById("remove_form").reset();
                $("#confirm_remove").modal("hide");
                display();
                
            } else {
                console.log(data);
                const failedModal = new bootstrap.Modal(document.getElementById("failed"));
                failedModal.show();
                $("#confirm_remove").modal("hide");
            }
        })

    })
    // Send data to update price
    document.getElementById("DBPrice").addEventListener('click',function(){
        const pid = document.getElementById('pID').textContent;
        const updprod_name = document.getElementById('items').value;
        const updprod_price = document.getElementById("updatePrice").value;
        
        let formData = new FormData();
        formData.append("pid",pid);
        formData.append("updprod_name",updprod_name);
        formData.append("updprod_price", updprod_price);
        fetch('php_inventory/updateprice.php',{
            method: 'POST',
            body:formData
            
        })
        .then(response => {
            if (!response.ok){
                throw new Error("Network Repsonse not Working")
            }
            return response.text();
        })
        .then(data =>{
            if(data == "success"){
                console.log(data);
                const successModal = new bootstrap.Modal(document.getElementById("success"));
                successModal.show();
                document.getElementById("upd_items").reset();
                $("#confirm_price").modal("hide");
                display();
            } else {
                console.log(data);
                const failedModal = new bootstrap.Modal(document.getElementById("failed"));
                failedModal.show();
                $("#confirm_price").modal("hide");
            }
        })
    })
    // Dynamic Option
    function dynamicOption(){
        fetch('php_inventory/items.php', {
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
            document.getElementById("items").innerHTML = data;
        })
        .catch(error => {
            console.error("Fetch error:", error);
        });
    }
    dynamicOption();
        function dynamicOption2(){
        fetch('php_inventory/items.php', {
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
            document.getElementById("itemstoRemove").innerHTML = data;
        })
        .catch(error => {
            console.error("Fetch error:", error);
        });
    }
    dynamicOption2();

})
   //Update
   function editPrice(prod_id){
    fetch('php_inventory/fetchedit.php',{
        method: 'POST',
        headers: {'Content-type':'application/x-www-form-urlencoded'},
        body: new URLSearchParams({
            pid: prod_id
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("HTTP-Error: " + response.status);
        } 
        return response.text();
    })
    .then(data => {
        let tbl_inventory = JSON.parse(data);
        document.getElementById("prID").textContent = tbl_inventory.prod_id;
        document.getElementById("prod_name").value = tbl_inventory.prod_name;
        // document.getElementById("updprod_type").value = tbl_inventory.prod_type;
        //document.getElementById("updprod_quantity").value = tbl_inventory.prod_quantity;
        document.getElementById("updatePrice").value =  tbl_inventory.prod_price;
        
        const editModaled = new bootstrap.Modal(document.getElementById("updPrice"));
        editModaled.show();
    })
    .catch(error => {
        console.error('Error:', error);
    });  
   
}
function editProducts(prod_id){
    fetch('php_inventory/fetchedit.php',{
        method: 'POST',
        headers: {'Content-type':'application/x-www-form-urlencoded'},
        body: new URLSearchParams({
            pid: prod_id
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("HTTP-Error: " + response.status);
        } 
        return response.text();
    })
    .then(data => {
        let tbl_inventory = JSON.parse(data);
        document.getElementById("pID").textContent = tbl_inventory.prod_id;
        document.getElementById("updprod_name").value = tbl_inventory.prod_name;
        document.getElementById("updprod_type").value = tbl_inventory.prod_type;
        
        const editModaled = new bootstrap.Modal(document.getElementById("updProducts"));
        editModaled.show();
    })
    .catch(error => {
        console.error('Error:', error);
    });  
   
}