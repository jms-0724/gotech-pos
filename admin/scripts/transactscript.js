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
        newRow.setAttribute('class','product_rows');
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
        actions.setAttribute('class','deleteRow','btn btn-danger',);
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

    checkedBox.forEach(checkBox => {
        checkBox.checked = false;
    })

    $("#viewProds").modal('hide');
});
// Calculates total purchase
function calculateTotalPurchase(table) {
    let total = 0;
    for (let row of table.rows) {
        total += parseFloat(row.cells[5].textContent);
    }
    return total;
}
// Function to calculate toal items
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
                displayCust();
            } else {
                console.log(data);
                const failedModal = new bootstrap.Modal(document.getElementById("failed"));
                failedModal.show();
                $("#confirm_cust").modal('hide');
            }
        })
})


function fetchTransactTable(e){
    e.preventDefault();

    let listPurchased = document.querySelectorAll(".product_rows");
    let arrayData = [];
    let cust_id = document.getElementById('custnum').textContent;
    let total_purchase = document.getElementById('totalPurchase').textContent;
    let cashgiven = document.getElementById('paid').value;
    let change = document.getElementById('change');
    let changeCompute = parseInt(cashgiven) - parseInt(total_purchase);
    let totalQuantity = document.getElementById('quantity').textContent;
    change.textContent = changeCompute;

    listPurchased.forEach(row => {
        let cell1 = row.getElementsByTagName("td")[0].textContent;
        let cell2 = row.getElementsByTagName("td")[1].textContent;
        let num = row.querySelectorAll("input");
        let cell5 = row.getElementsByTagName("td")[4].textContent;
        let cell6 = row.getElementsByTagName("td")[5].textContent;
        let quantityarray = [];
        num.forEach(input => {
            let cell4 = input.value;
            quantityarray.push(cell4);
        })
        let cell4value = quantityarray[0];
        console.log(cell4value);
        let dataList = {
            prod_id : cell1,
            prod_name:cell2,
            quantity:cell4value,
            total_cost:cell6,
            price_item:cell5
        }

        console.log(dataList);
        arrayData.push(dataList);
        console.log(arrayData);
    })
    let sendtoDB = {
        cust_id:cust_id,
        total_purchase:total_purchase,
        totalQuantity:totalQuantity,
        cashgiven:cashgiven,
        change:changeCompute,
        product_info:arrayData
    }
    
    fetch('php_transaction/transactsave.php', {
        method:'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(sendtoDB)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.text();
    })
    .then(data=> {
        if(data === "success"){
            // alert(data);
            $("#sukli").modal('show');
            $("#confirm_pay").modal('hide');
            window.open("php_report/receipt.php","_blank");
        } else {
            // alert(data);
            const failedModal = new bootstrap.Modal(document.getElementById("failed"));
            failedModal.show();
        }
    })
    .catch(err=> {
        console.error(err);
    })
}

function validatePay() {
    let cust_id = document.getElementById('custnum').textContent;
    let total_purchase = document.getElementById('totalPurchase').textContent;

    if (cust_id === "" || total_purchase === ""){
        alert("No Input");
    } else {
        const payModal = new bootstrap.Modal(document.getElementById("payModal"));
        payModal.show();
    }
}
document.getElementById("payCust").addEventListener('click',validatePay);

// document.getElementById("payment").addEventListener("submit", fetchTransactTable);
document.getElementById("payment").addEventListener("submit", (e)=>{
    e.preventDefault();
    $("#payModal").modal('hide');
    $("#confirm_pay").modal('show');
    
});
document.getElementById("backtoPayment").addEventListener("click", ()=>{
    $("#payModal").modal('show');
    $("#confirm_pay").modal('hide');
});

document.getElementById("addpaymentDB").addEventListener("click", fetchTransactTable);


document.getElementById("clearTable").addEventListener("click", ()=> {
    let tbody = document.querySelector(".transBody");
    while(tbody.firstChild){
        tbody.removeChild(tbody.firstChild);
    }
    document.getElementById("quantity").textContent = "";
    document.getElementById("totalPurchase  ").textContent = "";
    document.getElementById("custnum").textContent = "";
    document.getElementById("custfname").textContent = "";
    document.getElementById("custlname").textContent = "";
    document.getElementById("custbrgy").textContent = "";
    document.getElementById("custmun").textContent = "";
    document.getElementById("custprov").textContent = "";



})
// document.getElementById("clearTable").addEventListener("click", ()=> {
//     document.getElementById("table-trans").innerHTML = "";
// })
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