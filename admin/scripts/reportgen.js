document.addEventListener("DOMContentLoaded", ()=> {
    function display(){
        document.getElementById("search").value = "";

        fetch('php_report/viewsales.php', {
            method: 'POST',
        })
        .then(response => {
            if (!response.ok){
                throw new Error("Network Response Not Okay")
            }
            return response.text();
        })
        .then(data=> {
            document.getElementById("salesBody").innerHTML = data;
        })
        .catch(error=> {
            console.error('Fetch Error :', error);
        })
    }
    display();

    // Search Function
    function displaySearch(search){
        fetch('php_report/viewsales.php',{
            method: 'POST',
            body: new URLSearchParams({
                search:search
            })
        })
        .then(response => {
            if (!response.ok){
                throw new Error("Network Response Not Okay")
            }
            return response.text();
        })
        .then(data=> {
            document.getElementById("salesBody").innerHTML = data;
        })
        .catch(error=> {
            console.error('Fetch Error :', error);
        })
    }
    document.getElementById("filterSales").addEventListener('input',(event)=> {

    })
    // Real Time Search Functionality
    document.getElementById("search").addEventListener('keyup', (event)=> {
        let data = event.target.value;
        if(data) {
            displaySearch(data);
        } else {
            display();
        }
    })
    function displayTrans(){
        document.getElementById("searchTrans").value = "";

        fetch('php_report/viewtrans.php', {
            method: 'POST',
        })
        .then(response => {
            if (!response.ok){
                throw new Error("Network Response Not Okay")
            }
            return response.text();
        })
        .then(data=> {
            document.getElementById("transBody").innerHTML = data;
        })
        .catch(error=> {
            console.error('Fetch Error :', error);
        })
    }
    displayTrans();
    function displaySearchTrans(search){
        fetch('php_report/viewtrans.php',{
            method: 'POST',
            body: new URLSearchParams({
                search:search
            })
        })
        .then(response => {
            if (!response.ok){
                throw new Error("Network Response Not Okay")
            }
            return response.text();
        })
        .then(data=> {
            document.getElementById("transBody").innerHTML = data;
        })
        .catch(error=> {
            console.error('Fetch Error :', error);
        })
    }
    // Real Time Search Functionality
    document.getElementById("searchTrans").addEventListener('keyup', (event)=> {
        let data = event.target.value;
        if(data) {
            displaySearchTrans(data);
        } else {
            displayTrans();
        }
    })
})