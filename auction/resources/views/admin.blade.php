@extends('layout')

@section('headTitle','Admin Dashboard - ')
@section('pageTitle','Admin Dashboard')

@section('content')
<link rel="stylesheet" href="{{URL::to('css/reports.css')}}">

<div class="chartCard">
    <div class="chartBox">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
    <div class="chartBox">
        <canvas id="myChart1" width="400" height="400"></canvas>
    </div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels:['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [{
                        label: '# of Page visits',
                        data:[12, 19, 23, 15, 42, 33],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Page visits',
                        padding: {
                            top: 10,
                            bottom: 30
                        }
                    }
                },
                legend:{
                    display: true,
                    position: 'bottom'
                },
                scales: {
                }
            }
        });

        const ctx1 = document.getElementById('myChart1').getContext('2d');
        const myChart1 = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels:['January', 'February', 'March', 'April', 'May', 'June'],
                    datasets: [{
                        label: '# of Cash Flows',
                        data:[120000, 190000, 230000, 150000, 420000, 330000],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Cash Flows',
                        padding: {
                            top: 10,
                            bottom: 30
                        }
                    }
                },
                legend:{
                    display: true,
                    position: 'bottom'
                },
                scales: {
                }
            }
        });
        </script>
@endsection