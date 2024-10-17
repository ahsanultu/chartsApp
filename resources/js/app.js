import './bootstrap';
import Alpine from "alpinejs";
import Chart from 'chart.js/auto';
import ApexCharts from 'apexcharts';

window.Alpine = Alpine;
Alpine.start();

// Function to render ApexCharts
// Function to render a custom ApexCharts bar chart
function renderBrowserUsage() {
    var options = {
        chart: {
            type: 'bar',
            height: 200,
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: true,
                borderRadius: 5,
                barHeight: '60%',
            }
        },
        dataLabels: {
            enabled: false
        },
        series: [{
            name: 'Users',
            data: [121799, 50799, 25567, 5789]
        }],
        xaxis: {
            categories: ['Chrome', 'Safari', 'Firefox', 'Edge'],
            max: 150000,
            labels: {
                formatter: function(value) {
                    if (value >= 1000) {
                        return value / 1000 + 'k';
                    }
                    return value;
                }
            }
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return value.toLocaleString() + ' users';
                }
            }
        },
        fill: {
            colors: ['#6D3AFF', '#9291A5', '#9291A5', '#9291A5']
        },
        legend: {
            show: false
        }
    };

    var browserUsageChart = new ApexCharts(document.querySelector("#browserUsageChart"), options);
    browserUsageChart.render();
}


function renderApexChart() {
    var options = {
        chart: {
            type: 'bar',
            stacked: true,
            height: 250,
            horizontal: true
        },
        series: [{
            name: 'Male',
            data: [ 3.3, 12.7, 15.2, 25.3, 33.5 ]
        }, {
            name: 'Female',
            data: [ 2.5, 10.1, 13.4, 22.8, 30.2 ]
        }],
        xaxis: {
            categories: ['18-24', '25-34', '35-44', '45-64', '65+']
        },
        tooltip: {
            shared: true,
            intersect: false
        },
        plotOptions: {
            bar: {
                horizontal: true,
                borderRadius: 10,
                barHeight: '80%',
            }
        },
        dataLabels: {
            enabled: false
        },
        colors: ['#4A3AFF', '#C893FD'],
        legend: {
            position: 'top',
            horizontalAlign: 'center'
        }
    };

    var chart = new ApexCharts(document.querySelector("#horizontalBarChart"), options);
    chart.render();
}


// Function to render Chart.js
function renderChartJS() {
    const data = [
        { date: "MON", uv: 4000, pv: 2400, av: 3200, bv: 1800 },
        { date: "TUE", uv: 3000, pv: 1398, av: 2700, bv: 1200 },
        { date: "WED", uv: 2000, pv: 2800, av: 2400, bv: 1600 },
        { date: "THU", uv: 2780, pv: 3908, av: 2100, bv: 1700 },
        { date: "FRI", uv: 1890, pv: 4800, av: 2700, bv: 1900 },
        { date: "SAT", uv: 2390, pv: 3800, av: 2300, bv: 2000 },
        { date: "SUN", uv: 3490, pv: 4300, av: 3100, bv: 2200 },
    ];

    // Extract labels and data
    const labels = data.map(item => item.date);
    const uvData = data.map(item => item.uv);
    const pvData = data.map(item => item.pv);
    const avData = data.map(item => item.av);
    const bvData = data.map(item => item.bv);

    const ctx = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Smartphones',
                    data: pvData,
                    backgroundColor: '#962DFF',
                    borderRadius: 10,
                },
                {
                    label: 'Headphones',
                    data: uvData,
                    backgroundColor: '#4A3AFF',
                    borderRadius: 10,
                },
                {
                    label: 'Cameras',
                    data: avData,
                    backgroundColor: '#E0C6FD',
                    borderRadius: 10,
                },
                {
                    label: 'Wearables',
                    data: bvData,
                    backgroundColor: '#93AAFD',
                    borderRadius: 10,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    stacked: false,
                },
                y: {
                    beginAtZero: true,
                }
            },
            plugins: {
                legend: {
                    display: true,
                }
            }
        }
    });

    return barChart;
}

// Wait for the DOM to fully load
window.addEventListener('DOMContentLoaded', () => {
    renderChartJS();
    renderApexChart();
    renderBrowserUsage();
});
