@section('title', 'View Report')
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Report
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-center font-bold text-2xl text-gray-800 leading-tight py-8">
                    <h2 class="mb-8">Chart for Application Status for <span id="application"></span> applications</h2>
					<canvas id="PieChart"></canvas>
				</div>
                <div class="text-center font-bold text-xl text-gray-800 leading-tight py-8">
                    <h2 class="mb-8">Chart for Number of Internships (Category) with total of <span id="available"> </span> internships available</h2>
					<canvas id="BarChart"></canvas>
				</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0/dist/chartjs-plugin-datalabels.min.js"></script>
    <script>
        //Pie Chart
        var labels = {{  Js::from($labels) }};
        const reducer = (accumulator, currentValue) => accumulator + currentValue;
        var total = {{ $data }}.reduce(reducer);
        console.log(total);
        var pieChart = new Chart(document.getElementById('PieChart'), {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Dataset Value',
                    data: {{ $data }},
                    backgroundColor:[
                        "#008000", //green
                        "#4b77a9", //blue
                        "#d21243", //red
                        "#5f255f", //purple
                        "#B27200", //yellow
                        "#3b3530", //grey
                    ]
                }]
            },
            options: {
                legend: {
                    position: 'bottom',
                    display: true,
                },
                plugins: {
                    datalabels: {
                        color: '#fff',
                        display: true, 
                        formatter: function (value, ctx) {
                        return ((value * 100) / total).toFixed(1) + '%'; 
                        },
                    },
                },
            },
        });
        //Bar Chart
        var labels2 =  {{ Js::from($labels2) }};
        var data2 =  {{ Js::from($data2) }};
        const data = {
            labels: ['Business','IT','Engineering','Design','Science','Law','Other'],
            datasets: [{
                label: 'Number of Internship',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: data2,
            }]
        };
        const reducer2 = (accumulator2, currentValue2) => accumulator2 + currentValue2;
        var total2 = {{ $data2 }}.reduce(reducer2);

        const barChart = new Chart(
            document.getElementById('BarChart'),{
            type: 'bar',
            data: data,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {if (value % 1 === 0) {return value;}}
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align:'top',
                    }
                }
            }
        });
        document.getElementById('application').textContent = total;
        document.getElementById('available').textContent = total2;
        
    </script>
</x-app-layout>
