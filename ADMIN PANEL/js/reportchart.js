//line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
  type: 'line',
  data: {
    labels: ["Jan", "Febr", "Mar", "Apr", "May", "Jun", "Jul","Aug","Sep","Oct"],
    datasets: [{
      label: "",
      data: [300, 50, 1000, 0, 100, 255, 800, 250, 900, 690],
      backgroundColor: [
        'rgba(0, 0, 0, .0)',
      ],
      borderColor: [
        'rgba(123, 173, 137, 100)',
      ],
      borderWidth: 1
    },
   

    
    ]
  },
  options: {
    responsive: true
  }
  
});