document.addEventListener('DOMContentLoaded', ()=> {
  const data = {
      labels: ['PC Parts', 'Peripherals', 'Consoles', 'Printers', 'PC SET'],
      datasets: [{
          label:'Sales',
          backgroundColor: 'rgb(54, 162, 235)',
          borderColor: 'rgb(54, 162, 235)',
          data: [10, 20, 15, 25, 30],
      }]
  }
  
  const bargraph = document.getElementById("barChart").getContext('2d');
  
  let chart = new Chart(bargraph, {
      type: 'bar',
      data: data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
  })
})

