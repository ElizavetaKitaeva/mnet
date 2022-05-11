<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;700;800;900&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
    <title>MLNetwork</title>
    <script src="speedtest.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
    <script>
        var s=new Speedtest();
        s.onupdate=function(data){
            I("ip").textContent=data.clientIp;
            I("dlText").textContent=(data.testState==1&&data.dlStatus==0)?"...":data.dlStatus;
            I("ulText").textContent=(data.testState==3&&data.ulStatus==0)?"...":data.ulStatus;
            I("pingText").textContent=data.pingStatus;
            I("jitText").textContent=data.jitterStatus;
        }
        s.onend=function(aborted){
            I("startStopBtn").className="";
            if(aborted){
                initUI();
            }
        }

        function startStop(){
            if(s.getState()==3){
                s.abort();
                document.getElementById('testArea').style.display = 'none'
            }else{
                s.start();
                I("startStopBtn").className="running";
                var a = null;
                document.getElementById('testArea').style.display = ''
                    var chart1ctx = document.getElementById('chart1Area').getContext('2d')
                    var chart2ctx = document.getElementById('chart2Area').getContext('2d')
                    var dlDataset = {
                        label: 'Скачать',
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: 'rgba(75,192,192,0.4)',
                        borderColor: 'rgba(75,192,192,1)',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: 'rgba(75,192,192,1)',
                        pointBackgroundColor: '#fff',
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: 'rgba(75,192,192,1)',
                        pointHoverBorderColor: 'rgba(220,220,220,1)',
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [0],
                        spanGaps: false
                    }
                    var ulDataset = {
                        label: 'Загрузить',
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: 'rgba(192,192,75,0.4)',
                        borderColor: 'rgba(192,192,75,1)',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: 'rgba(192,192,75,1)',
                        pointBackgroundColor: '#fff',
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: 'rgba(192,192,75,1)',
                        pointHoverBorderColor: 'rgba(220,220,220,1)',
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [0],
                        spanGaps: false
                    }
                    var pingDataset = {
                        label: 'Пинг',
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: 'rgba(75,220,75,0.4)',
                        borderColor: 'rgba(75,220,75,1)',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: 'rgba(75,220,75,1)',
                        pointBackgroundColor: '#fff',
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: 'rgba(75,220,75,1)',
                        pointHoverBorderColor: 'rgba(220,220,220,1)',
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [],
                        spanGaps: false
                    }
                    var jitterDataset = {
                        label: 'Джиттер',
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: 'rgba(220,75,75,0.4)',
                        borderColor: 'rgba(220,75,75,1)',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: 'rgba(220,75,75,1)',
                        pointBackgroundColor: '#fff',
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: 'rgba(220,75,75,1)',
                        pointHoverBorderColor: 'rgba(220,220,220,1)',
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [],
                        spanGaps: false
                    }

                    var chart1Options = {
                        type: 'line',
                        data: {
                            datasets: [dlDataset, ulDataset]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                position: 'bottom'
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: false
                                    },
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: 'Speed',
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    }
                    var chart2Options = {
                        type: 'line',
                        data: {
                            datasets: [pingDataset, jitterDataset]
                        },
                        options: {
                            responsive: true,
                            legend: {
                                position: 'bottom'
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    scaleLabel: {
                                        display: false
                                    },
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    scaleLabel: 'Latency',
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    }

                    var chart1 = new Chart(chart1ctx, chart1Options)
                    var chart2 = new Chart(chart2ctx, chart2Options)

                    a=new Speedtest();
                    a.onupdate = function (data) {
                        var status = data.testState
                        if (status === 1 && Number(data.dlStatus) > 0) {
                            for(var i=~~(20*Number(data.dlProgress));i<20;i++) chart1.data.datasets[0].data[i]=(Number(data.dlStatus))
                            chart1.data.labels[chart1.data.datasets[0].data.length - 1] = ''
                            chart1.update()
                        }
                        if (status === 3 && Number(data.ulStatus) > 0) {
                            for(var i=~~(20*Number(data.ulProgress));i<20;i++) chart1.data.datasets[1].data[i]=(Number(data.ulStatus))
                            chart1.data.labels[chart1.data.datasets[1].data.length - 1] = ''
                            chart1.update()
                        }
                        if (status === 2 && Number(data.pingStatus) > 0) {
                            chart2.data.datasets[0].data.push(Number(data.pingStatus))
                            chart2.data.datasets[1].data.push(Number(data.jitterStatus))
                            chart2.data.labels[chart2.data.datasets[0].data.length - 1] = ''
                            chart2.data.labels[chart2.data.datasets[1].data.length - 1] = ''
                            chart2.update()
                        }
                        ip.textContent = data.clientIp
                    }
                    a.start();
            }
        }

        function initUI(){
            I("dlText").textContent="";
            I("ulText").textContent="";
            I("pingText").textContent="";
            I("jitText").textContent="";
            I("ip").textContent="";
        }

        function I(id){return document.getElementById(id);}
    </script>
    <script type="text/javascript">
        initUI();
    </script>
        <script src="js/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            const mMenuBtn = $(".m-menu-button");
            const mMenu = $(".m-menu");

            mMenuBtn.on("click", function(){
                mMenu.toggleClass("active");
                $("body").toggleClass("no-scroll");
            });
        });
    </script>
</head>

<body>
    <header class="header">
        <div class="container formLogo">        
            <div class="logo">
                <p class="logoTextML">MLNetwork</p>
                <img class="logoImageML" src="img/loading-48.gif" alt="logo">
            </div>
            <div class="m-menu">
            <nav class="navigation">
                <a href="main.php" class="link">Главная</a>
                <a href="example-singleServer-pretty.php" class="link">Анализ сети</a>
                <a href="documentation.php" class="link">Документация</a>
                <a href="app.php" class="link">Приложение</a>
                <a href="signin.php" class="link">Вход</a> 
            </nav>
       </div>
    <div class="mobile-buttons">
        <button class="m-menu-button">
            <span class="menu-line"></span>
            <span class="menu-line"></span>
            <span class="menu-line"></span>
        </button>
    </div>
    </header>