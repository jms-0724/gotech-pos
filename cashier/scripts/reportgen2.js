document.addEventListener("DOMContentLoaded", ()=> {
    
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