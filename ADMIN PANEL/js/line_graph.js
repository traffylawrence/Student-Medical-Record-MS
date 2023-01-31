var xValues = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov"];
    var yValues = [0,100,170,270,250,290,240,210,280,320,450];

    new Chart("myChart", {
        type: "line",
        data: {
        labels: xValues,
        datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "rgba(0,0,255,1.0)",
        borderColor: "#7B89AD",
        data: yValues
        }]
    },
        options: {
            legend: {display: false},
            scales: {
            yAxes: [{ticks: {min: 0, max:700}}],
        }
    }
});