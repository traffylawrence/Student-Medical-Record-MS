var xValues = ["1st Year", "2nd Year", "3rd Year", "4th Year"];
var yValues = [55, 49, 44, 24];
var barColors = [
  "#FF4646",
  "#2D7538",
  "#5180C7",
  "#f5c71a",
];

new Chart("myChart2", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
   options: {
      legend: {
        display: true,
        position: 'left',
        maxWidth: 70,
      }
   }
});