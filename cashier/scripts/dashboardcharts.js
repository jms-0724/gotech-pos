document.addEventListener('DOMContentLoaded', () => {
  // Data for the bar chart
  const barChartData = {
    labels: ['PC Parts', 'Peripherals', 'Consoles', 'Printers', 'PC SET'],
    datasets: [{
      label: 'Sales',
      backgroundColor: 'rgb(54, 162, 235)',
      borderColor: 'rgb(54, 162, 235)',
      data: [3, 6, 0, 0, 0],
    }]
  };

  // Get the context for the bar chart
  const barChartContext = document.getElementById("barChart").getContext('2d');

  // Create the bar chart
  new Chart(barChartContext, {
    type: 'bar',
    data: barChartData,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  });

  // Labels for the line chart
  const lineChartLabels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];

  // Data for the line chart
  const lineChartData = {
    labels: lineChartLabels,
    datasets: [{
      label: 'Sales',
      data: [0, 0, 0, 5, 7, 0, 0],
      fill: false,
      borderColor: 'rgb(75, 192, 192)',
      tension: 0.1
    }]
  };

  // Configuration for the line chart
  const lineChartConfig = {
    type: 'line',
    data: lineChartData,
  };

  // Get the context for the line chart
  const lineChartContext = document.getElementById("lineChart").getContext('2d');

  // Create the line chart
  new Chart(lineChartContext, lineChartConfig);
});
