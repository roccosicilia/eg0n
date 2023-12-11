// CWE stats
const barChart_cwestats = document.getElementById("barChart_cwestats").getContext('2d');
barChart_cwestats.height = 100;

new Chart(barChart_cwestats, {
    type: 'bar',
    data: {
        defaultFontFamily: 'Poppins',
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "XXX", "TEST"],
        datasets: [
            {
                label: "My First dataset",
                data: [65, 59, 80, 81, 56, 55, 99, 10],
                borderColor: 'rgba(26, 51, 213, 1)',
                borderWidth: "0",
                backgroundColor: 'rgba(26, 51, 213, 1)'
            }
        ]
    },
    options: {
        legend: false, 
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes: [{
                // Change here
                barPercentage: 0.5
            }]
        }
    }
});
(jQuery);
