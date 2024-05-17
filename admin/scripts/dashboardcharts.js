
document.addEventListener('DOMContentLoaded', ()=> {
  const data = {
      labels: ['PC Parts', 'Peripherals', 'Consoles', 'Printers', 'PC SET'],
      datasets: [{
          label:'Sales',
          backgroundColor: 'rgb(54, 162, 235)',
          borderColor: 'rgb(54, 162, 235)',
          data: [3, 6, 0, 0, 0],
      }]
  };
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
  });

  const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
  const data2 = {
  labels: labels,
  datasets: [{
    label: 'Sales',
    data: [0, 0, 0, 5, 7, 0, 0],
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
  }]
};

const config2 = {
  type: 'line',
  data: data2,
};

const linegraph = document.getElementById("lineChart").getContext('2d');
new Chart(linegraph, config2);


})


