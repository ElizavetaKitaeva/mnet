<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;700;800;900&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
<title>Замер скорости MLNetwork</title>

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
<style>
	html,body{
		border:none;
		color:#ffffff;
	}
	main{
        margin-top: 50px;
		text-align:center;
		font-family: 'Inter';
	}
	#startStopBtn{
		display:inline-block;
		margin:0 auto;
		color:#6060AA;
		background-color:rgba(0,0,0,0);
		border:0.15em solid #6060FF;
		border-radius: 1em;
		transition:all 0.3s;
		box-sizing:border-box;
		width:8em; height:3em;
		line-height:2.7em;
		cursor:pointer;
		box-shadow: 0 0 0 rgba(0,0,0,0.1), inset 0 0 0 rgba(0,0,0,0.1);
	}
	#startStopBtn:hover{
		box-shadow: 0 0 2em rgba(0,0,0,0.1), inset 0 0 1em rgba(0,0,0,0.1);
	}
	#startStopBtn.running{
		background-color:#FF3030;
		border-color:#FF6060;
		color:#FFFFFF;
	}
	#startStopBtn:before{
		content:"Start";
	}
	#startStopBtn.running:before{
		content:"Abort";
	}
	#test{
		margin-top:2em;
		margin-bottom:12em;
	}
	div.testArea{
		display:inline-block;
		width:14em;
		height:9em;
		position:relative;
		box-sizing:border-box;
		margin-top:10px;
	}
	div.testName{
		position:absolute;
		top:0.1em; left:0;
		width:100%;
		font-size:1.4em;
		z-index:9;
	}
	div.meterText{
		position:absolute;
		bottom:1.5em; left:0;
		width:100%;
		font-size:2.5em;
		z-index:9;
	}
	#dlText{
		color:#6060AA;
	}
	#ulText{
		color:#309030;
	}
	#pingText,#jitText{
		color:#AA6060;
	}
	div.meterText:empty:before{
		color:#505050 !important;
		content:"0.00";
	}
	div.unit{
		position:absolute;
		bottom:2em; left:0;
		width:100%;
		z-index:9;
	}
	div.testGroup{
		display:inline-block;
	}
	@media all and (max-width:65em){
		body{
			font-size:1.5vw;
		}
	}
	@media all and (max-width:40em){
	body{
		font-size:0.8em;
	}
	div.testGroup{
		display:block;
		margin: 0 auto;
	}
	}
	#startBtn {
        text-decoration: none;
    }

    #ip {
        margin: 0.8em 0;
        font-size: 1.2em;
    }
    #chart1Area,
    #chart2Area {
        width: 100%;
        max-width: 40em;
        height: 25em;
        display: block;
        margin: 0 auto;
    }

    .footer {
    width: 100%;
    height: 530px;
    background: #01131F;
    padding-top: 40px;
    }

    .footer_container {
        width: 1000px;
        margin: auto;
    }

    .footer_container_card{
        display: flex;
        justify-content: space-between;
    }

    .policy {
        text-align: center;
    }

    .title_app_footer, .title_user_footer, .title_our_footer, .title_ourapp_footer, .title_feedback_footer {
        font-style: normal;
        font-weight: 300;
        font-size: 15px;
        line-height: 29px;
    }

    .text_app_footer, .text_user_footer, .text_our_footer, .text_ourapp_footer, .text_feedback_footer {
        font-style: normal;
        font-weight: 200;
        font-size: 15px;
        line-height: 29px;
        cursor: pointer;
    }

    .policy_footer {
        font-style: normal;
        font-weight: 200;
        font-size: 15px;
        line-height: 29px;
        cursor: pointer;
        margin-right: 40px;
    }

    .text_app_footer:hover {
        color: #46B9FF;
    }

    .text_user_footer:hover {
        color: #46B9FF;
    }

    .text_our_footer:hover {
        color: #46B9FF;
    }

    .text_ourapp_footer:hover {
        color: #46B9FF;
    }

    .text_feedback_footer:hover {
        color: #46B9FF;
    }

    .policy_footer:hover {
        color: #46B9FF;
    }


    .footer_card {
        margin-right: 50px;
    }

    .logoTextMLFooter {
        font-weight: 500;
        font-size: 25px;
        line-height: 48px;
        color: #FFFFFF;
        text-shadow: 0px 4px 4px #54F7FB; 
    }

    .footer_end {
        font-size: 13px;
        font-weight: 200;
        text-align: center;
    }

    .mobile-buttons{
    display: none;
}
.m-menu-button{
    padding: 5px;
    background-color: #fff;
    border: none;
    cursor: pointer;
    outline: none;
}
.menu-line {
    display: block;
    flex-basis: 16px;
    height: 2px;
    width: 16px;
    background-color: #000;
    margin-top: 3px;
    margin-bottom: 3px;
    border-radius: 40px;
}

@media (max-width: 1400px) {
    .container {
        max-width: 1200px;
    }
}

@media (max-width: 1280px) {
    .container {
        max-width: 1100px;
    }    

    .link {
        margin-left: 40px;
    }

}

@media (max-width: 1100px) {
    .container {
        max-width: 800px;
    }

    .link {
        margin-left: 10px;
    }
    

    .footer_container {
        max-width: 600px;
    }
}

@media (max-width: 820px) {
    .container {
        max-width: 600px;
    }

    .link {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .m-menu {
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        position: fixed;
        left: 0;
        top: 100px;
        right: 0;
        bottom: 0;
        height: calc(100% - 68px);
        background: #46B9FF;
        z-index: 999999;
    }
    .m-menu.active {
        display: flex;
    }
    .navigation {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: 0;
        align-items: center;
    }

    .mobile-buttons {
        display: block;
        margin-left: auto;
    }

    .footer_container_card{
        display: block;
    }



    .footer {
        width: 100%;
        height: 100%;
        background: #01131F;
        padding-top: 40px;
        color: #ffffff;
    }

}

@media (max-width: 660px) {
    .container {
        max-width: 400px;
    }

    .link {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .m-menu {
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        position: fixed;
        left: 0;
        top: 100px;
        right: 0;
        bottom: 0;
        height: calc(100% - 68px);
        background: #46B9FF;
        z-index: 999999;
    }
    .m-menu.active {
        display: flex;
    }
    .navigation {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: 0;
        align-items: center;
    }

    .graphics {
        display: block;
    }

    .contacts_information {
        display: block;
    }

    .mobile-buttons {
        display: block;
        margin-left: auto;
    }

    .footer_container_card{
        flex-direction: column;
        justify-content: center;
        display: flex;
        align-items: center;
    }

    .footer {
        width: 100%;
        height: 100%;
        background: #01131F;
        padding-top: 40px;
        color: #ffffff;
    }

    .desc {
        border: 1px solid #ffffff;
        padding: 10px;
        width: auto;
        height: auto;
    }
    

}

@media (max-width: 450px) {
    .container {
        max-width: 300px;
        margin-top: 20px;
    }

    .logo {
        display: none;
    }

    .link {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .m-menu {
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        position: fixed;
        left: 0;
        top: 100px;
        right: 0;
        bottom: 0;
        height: calc(100% - 68px);
        background: #46B9FF;
        z-index: 999999;
    }
    .m-menu.active {
        display: flex;
    }
    .navigation {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: 0;
        align-items: center;
    }

    .mobile-buttons {
        display: block;
        margin-left: auto;
    }

    .footer_container {
        max-width: 155px;
    }

    .InputClass {
        background: none;
        border: 1px solid #FFFFFF;
        box-shadow: 0px 4px 8px 2px #7EFDFF;
        border-radius: 15px;
        width: 300px;
        height: 40px;
        padding: 10px;
        font-weight: 300;
        font-size: 14px;
        line-height: 19px;
        color: #FFFFFF;
        margin-bottom: 15px;
    }

    .graphics {
        display: block;
    }

    .contacts_information {
        display: block;
    }

    .desc {
        border: 1px solid #ffffff;
        padding: 10px;
        width: auto;
        height: auto;
    }


    .SingInForm {
        width: auto;
        height: 305px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 120px;
    }

    .footer_container_card{
        flex-direction: column;
        justify-content: center;
        display: flex;
    }

    .footer {
        width: 100%;
        height: 100%;
        background: #01131F;
        padding-top: 40px;
        color: #ffffff;
    }
}

</style>

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

    <div class="container" style="margin-top: 30px;">
    <script type="text/javascript">
            var nVer = navigator.appVersion;
            var nAgt = navigator.userAgent;
            var browserName  = navigator.appName;
            var fullVersion  = ''+parseFloat(navigator.appVersion); 
            var majorVersion = parseInt(navigator.appVersion,10);
            var nameOffset,verOffset,ix;

            var a;
            if (navigator.userAgent.search(/Safari/) > 0) {a = 'Safari'};
            if (navigator.userAgent.search(/Firefox/) > 0) {a = 'MozillaFirefox'};
            if (navigator.userAgent.search(/MSIE/) > 0 || navigator.userAgent.search(/NET CLR /) > 0) {a = 'Internet Explorer'};
            if (navigator.userAgent.search(/Chrome/) > 0) {a = 'Google Chrome'};
            if (navigator.userAgent.search(/YaBrowser/) > 0) {a = 'Яндекс браузер'};
            if (navigator.userAgent.search(/OPR/) > 0) {a = 'Opera'};
            if (navigator.userAgent.search(/Konqueror/) > 0) {a = 'Konqueror'};
            if (navigator.userAgent.search(/Iceweasel/) > 0) {a = 'Debian Iceweasel'};
            if (navigator.userAgent.search(/SeaMonkey/) > 0) {a = 'SeaMonkey'};
            if (navigator.userAgent.search(/Edg/) > 0) {a = 'Microsoft Edge'};

            // In Opera 15+, the true version is after "OPR/" 
            if ((verOffset=nAgt.indexOf("OPR/"))!=-1) {
                browserName = "Opera";
                fullVersion = nAgt.substring(verOffset+4);
            } else if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
                browserName = "Opera";
                fullVersion = nAgt.substring(verOffset+6);
                if ((verOffset=nAgt.indexOf("Version"))!=-1) 
                    fullVersion = nAgt.substring(verOffset+8);
            } else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
                browserName = "Microsoft Internet Explorer";
                fullVersion = nAgt.substring(verOffset+5);
            } else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
                browserName = "Chrome";
                fullVersion = nAgt.substring(verOffset+7);
            } else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
                browserName = "Safari";
                fullVersion = nAgt.substring(verOffset+7);
                if ((verOffset=nAgt.indexOf("Version"))!=-1) 
                    fullVersion = nAgt.substring(verOffset+8);
            } else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
                browserName = "Firefox";
                fullVersion = nAgt.substring(verOffset+8);
            } else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < 
                (verOffset=nAgt.lastIndexOf('/')) ) {
                browserName = nAgt.substring(nameOffset,verOffset);
                fullVersion = nAgt.substring(verOffset+1);
                if (browserName.toLowerCase()==browserName.toUpperCase()) {
                    browserName = navigator.appName;
                }
            }
            if ((ix=fullVersion.indexOf(";"))!=-1)
            fullVersion=fullVersion.substring(0,ix);
            if ((ix=fullVersion.indexOf(" "))!=-1)
            fullVersion=fullVersion.substring(0,ix);

            majorVersion = parseInt(''+fullVersion,10);
            if (isNaN(majorVersion)) {
                fullVersion  = ''+parseFloat(navigator.appVersion); 
                majorVersion = parseInt(navigator.appVersion,10);
            }
            

            document.write(''
            +'Браузер: '+ a +'<br>' + '<br>'
            +'Полная версия: '+fullVersion+'<br>' + '<br>'
            +'Основная версия: '+majorVersion+'<br>' + '<br>'
            )

            var OSName="Unknown OS";
            if (navigator.appVersion.indexOf("Win")!=-1) OSName="Windows";
            if (navigator.appVersion.indexOf("Mac")!=-1) OSName="MacOS";
            if (navigator.appVersion.indexOf("X11")!=-1) OSName="UNIX";
            if (navigator.appVersion.indexOf("Linux")!=-1) OSName="Linux";
            
            document.write('Операционная система: '+ OSName +'<br>' + '<br>');

            //document.write('Кличество ядер процессора: '+ navigator.hardwareConcurrency +'<br>' + '<br>');
            document.write('Разрядность ОС: '+ navigator.platform +'<br>' + '<br>');
        </script>

        <script type="application/javascript">
            function getIP(json) {
                document.write("IP адрес: ", json.ip);
            }
        </script>
    <script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"></script>
    
    </div>

    <main class="main">
        <div class="container">
            <div id="divID"></div>
			<p>Нажмите start, чтобы замерить скорость интернета</p>
			<div id="startStopBtn" onclick="startStop()"></div>
			<div id="test">
				<div class="testGroup">
					<div class="testArea">
						<div class="testName">Скачать</div>
						<div id="dlText" class="meterText"></div>
						<div class="unit">Мбит/с</div>
					</div>
					<div class="testArea">
						<div class="testName">Загрузить</div>
						<div id="ulText" class="meterText"></div>
						<div class="unit">Мбит/с</div>
					</div>
				</div>
				<div class="testGroup">
					<div class="testArea">
						<div class="testName">Пинг</div>
						<div id="pingText" class="meterText"></div>
						<div class="unit">мс</div>
					</div>
				</div>
				<div id="ipArea">
					IP адрес: <span id="ip"></span>
				</div>
				<div id="testArea" style="display:none">
					<p>Скорость</p>
					<canvas id="chart1Area"></canvas>

					<p>Задержка</p>
					<canvas id="chart2Area"></canvas>
					<br/>
				</div>
				<a href="javascript:runTest()" id="startBtn"></a>
			</div>
        </div>
    </main>

    <footer class="footer">
        <div class="footer_container">
        <div class="container formLogo">        
                <div class="logo">
                    <p class="logoTextMLFooter">MLNetwork</p>
                </div>
            </div>
            <div class="footer_container_card">
                <div class="footer_card">
                    <h1 class="title_app_footer">ПРИЛОЖЕНИЕ</h1>
                        <p class="text_app_footer" onclick="location.href='windows.php'">Windows</p>
                        <p class="text_app_footer" onclick="location.href='unix.php'">Unix</p>
                        <p class="text_app_footer" onclick="location.href='linux.php'">Linux</p>
                        <p class="text_app_footer" onclick="location.href='iOS.php'">iOS</p>
                        <p class="text_app_footer" onclick="location.href='android.php'">Android</p>
                </div>

                <div class="footer_card">
                    <h1 class="title_user_footer">УЧЕТНАЯ ЗАПИСЬ</h1>
                        <p class="text_user_footer" onclick="location.href='signin.php'">Вход</p>
                        <p class="text_user_footer" onclick="location.href='registration.php'">Регистрация</p>
                </div>
                <div class="footer_card">
                    <h1 class="title_ourapp_footer">О ПРИЛОЖЕНИИ</h1>
                        <p class="text_ourapp_footer" onclick="location.href='description.php'">Описание</p>
                        <p class="text_ourapp_footer" onclick="location.href='documentation.php'">Документация</p>
                </div>

            </div>
            <div class="policy">
                        <p class="policy_footer" onclick="location.href='policy.php'">Политика конфиденциальности</p>
                        <p class="policy_footer" onclick="location.href='condition.php'">Условия использования</p>
            </div>
            <p class="footer_end">© 2022 MLNetwork</p>
        </div>
    </footer>

<script type="text/javascript">
    initUI();
</script>
</body>
</html>
