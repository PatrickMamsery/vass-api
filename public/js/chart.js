const ctx = document.getElementById('salesChart');

new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
      label: 'Sales in TZS',
      data: [12, 19, 3, 5, 2, 3, 1, 2, 3, 4, 5, 6],
      borderColor:'purple',
      borderWidth: 1
    }]
  },
  
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});