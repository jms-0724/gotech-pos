document.addEventListener("DOMContentLoaded",()=> {
    totalProducts();
    totalSales();
    averageSales();
    countTransactions();
})
function totalProducts(){
    const totalSold = document.getElementById("totalSold");
    let data = {
        dd:1
    }
    fetch('php_dashboard/totalsold.php', {
        method:'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body:JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text(); 
    })
    .then(records=> {
        totalSold.innerHTML = records;
    })
    .catch(err=> {
        console.log(err);
    })
}
function totalSales(){
    const totalsales = document.getElementById("salesTotal");
    let data = {
        dd:1
    }
    fetch('php_dashboard/totalsales.php', {
        method:'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body:JSON.stringify(data),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text(); 
    })
    .then(records=> {
        totalsales.innerHTML = records;
    })
    .catch(err=> {
        console.log(err);
    })
}
function averageSales(){
    const mean = document.getElementById("productAve");
    let data = {
        dd:1
    }
    fetch('php_dashboard/averageprice.php', {
        method:'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body:JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text(); 
    })
    .then(records=> {
        mean.innerHTML = records;
    })
    .catch(err=> {
        console.log(err);
    })
    
}
function countTransactions(){
    const countTrans = document.getElementById("transNum");
    let data = {
        dd:1
    }
    fetch('php_dashboard/totaltransaction.php', {
        method:'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body:JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text(); 
    })
    .then(records=> {
        countTrans.innerHTML = records;
    })
    .catch(err=> {
        console.log(err);
    })
    
}
