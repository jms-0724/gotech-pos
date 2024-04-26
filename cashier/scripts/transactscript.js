document.addEventListener('DOMContentLoaded',()=>{
    function display(){
        document.getElementById('searchProduct').value = "";
       fetch('php_transaction/productview.php', {
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
           document.getElementById("viewProducts").innerHTML = data;
       })
       .catch(error => {
           console.error("Fetch error:", error);
       });
   }
   display();

   //Display Searched Values
   function displaySearch(search){
       fetch('php_transaction/productview.php',{
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
           document.getElementById("viewProducts").innerHTML = data;
       })
       .catch(error => {
           console.error("Fetch error:", error);
       })
   }
   //Keyup Event Listener
   document.getElementById('searchProduct').addEventListener('keyup',(event)=>{
       let data = event.target.value;
       if(data){
           displaySearch(data);
       } else{
           display();
       }
   })


document.getElementById('validate').addEventListener("click", () => {
    let checkedBox = document.querySelectorAll(".form-check-input:checked");
    let transactTable = document.getElementById('transact').getElementsByTagName('tbody')[0];
    let totalPurchase = 0; // Initialize total purchase price
    let totalItems = 0; //  Initialize the number of items purchased

    checkedBox.forEach((product) => {
        let product_row = product.closest('tr');
        let productID = product_row.cells[1].textContent;
        let productName = product_row.cells[2].textContent;
        let productType = product_row.cells[3].textContent;
        let price = parseFloat(product_row.cells[5].textContent); // Parsing price as a float here
        let newRow = transactTable.insertRow();
        let cell1 = newRow.insertCell(0);
        let cell2 = newRow.insertCell(1);
        let cell3 = newRow.insertCell(2);
        let cell4 = newRow.insertCell(3);
        let cell5 = newRow.insertCell(4);
        let cell6 = newRow.insertCell(5);
        let cell7 = newRow.insertCell(6);

        cell1.textContent = productID;
        cell2.textContent = productName;
        cell3.textContent = productType;

        let quantity = document.createElement('input');
        quantity.setAttribute('type', 'number');
        quantity.setAttribute('class', 'form-control');
        quantity.setAttribute('min','1');
        quantity.value = '';
        cell4.appendChild(quantity);

        cell5.textContent = price.toFixed(2); 
        
        let totalP = document.createElement('td');
        cell6.appendChild(totalP);  
        let actions = document.createElement('button');
        actions.setAttribute('type','button');
        actions.setAttribute('class','deleteRow','btn','btn-danger');
        actions.textContent = 'Delete';
        cell7.appendChild(actions);

        let deleteButtons = document.getElementsByClassName('deleteRow');

        // Loop through each delete button and attach event listener
        for(let i = 0; i < deleteButtons.length; i++){
            deleteButtons[i].addEventListener('click', function(event){
                // Evenet Delegation
                if(event.target.classList.contains('deleteRow')){
                    // Get the parent row of the clicked button
                    var row = event.target.parentNode.parentNode;
                    // Remove the parent row from its parent element
                    row.parentNode.removeChild(row);
                }
            });
        }
        quantity.addEventListener('input', () => {
            let qty = parseInt(quantity.value); // Parsing quantity as an integer
            let total = qty * price; // Calculating total
            let totalItems = qty;
            setTimeout(()=>{
            totalP.textContent = total.toFixed(2); // Displaying total with 2 decimal places
            // Update total purchase price
            totalPurchase = calculateTotalPurchase(transactTable);
            document.getElementById('totalPurchase').textContent = totalPurchase.toFixed(2);
            },1000)
            //Update total items purchased
             totalItems = calculateTotalItems(transactTable);
             document.getElementById("quantity").textContent = totalItems.toFixed(0);
        });
    });

    $("#viewProds").modal('hide');
});

function calculateTotalPurchase(table) {
    let total = 0;
    for (let row of table.rows) {
        total += parseFloat(row.cells[5].textContent);
    }
    return total;
}
function calculateTotalItems(tabled){
    let totalItems = 0;
    for (let row of tabled.rows){
        totalItems +=parseInt(row.cells[3].querySelector('input').value);
    }
    return totalItems;
}
function displayCust(){
    document.getElementById('searchCust').value = "";
   fetch("php_transaction/customerview.php", {
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
       document.getElementById("showCust").innerHTML = data;
   })
   .catch(error => {
       console.error("Fetch error:", error);
   });
}
displayCust();

//Display Searched Customers
function disp_searched(searchCusts){
    fetch("php_transaction/customerview.php",{
        method: "POST",
        body: new URLSearchParams({
            searchCust:searchCusts
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.text();
    })
    .then(data=>{
        document.getElementById("showCust").innerHTML = data;
    })
    .catch(error => {
        console.error("Fetch error:", error);
    })
}
//Keyup Event Listener
document.getElementById('searchCust').addEventListener('keyup',(event)=>{
    let data = event.target.value;
    if(data){
        disp_searched(data);
    } else{
        displayCust();
    }
})

// Submit Button Customer
document.getElementById('custInfo').addEventListener("submit", (e)=> {
    e.preventDefault()
    $("#addCust").modal('hide');
    $("#confirm_cust").modal('show');
})
document.getElementById('backtoAdd').addEventListener('click',()=>{
    $("#confirm_cust").modal('hide');
    $("#addCust").modal('show');
})
document.getElementById("addcustDB").addEventListener("click",()=>{
   let cFname = document.getElementById("Cfname").value;
   let cLname = document.getElementById("Clname").value;
   let cBrgy = document.getElementById("Cbrgy").value;
   let cMun = document.getElementById('Cmun').value;
   let cProv = document.getElementById("Cprov").value;

    fetch("php_transaction/addcustomer.php",{
        method: 'POST',
        headers: {
            "Content-Type":"application/x-www-form-urlencoded"
        },
        body: new URLSearchParams({
            Cfname:cFname,
            Clname:cLname,
            Cbrgy:cBrgy,
            Cmun:cMun,
            Cprov:cProv
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
                document.getElementById("custInfo").reset();
                $("#confirm_cust").modal('hide');
                display();
            } else {
                console.log(data);
                const failedModal = new bootstrap.Modal(document.getElementById("failed"));
                failedModal.show();
                $("#confirm_cust").modal('hide');
            }
        })
})

});

function placeCustomer(cid){
    fetch('php_transaction/fetchcust.php',{
        method: 'POST',
        headers: {'Content-type':'application/x-www-form-urlencoded'},
        body: new URLSearchParams({
            cid: cid
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("HTTP-Error: " + response.status);
        } 
        return response.text();
    })
    .then(data => {
        console.log(data);
        let tbl_customer = JSON.parse(data);
        document.getElementById("custnum").textContent = tbl_customer.cust_id;
        document.getElementById("custfname").textContent = tbl_customer.cust_fname;
        document.getElementById('custlname').textContent = tbl_customer.cust_lname;
        document.getElementById("custbrgy").textContent = tbl_customer.cust_brgy;
        document.getElementById('custmun').textContent = tbl_customer.cust_municipality;
        document.getElementById('custprov').textContent = tbl_customer.cust_province;
        $("#viewCust").modal('hide');
    })
    .catch(error => {
        console.error('Error:', error);
    });  
   
}