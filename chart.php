<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154754488-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-154754488-2');
    </script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Primary Meta Tags -->
    <title>親子共讀</title>
    <meta name="title" content="親子共讀">
    <meta name="description" content="OPEN BOOKS , OPEN THE WORLD!">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://metatags.io/">
    <meta property="og:title" content="親子共讀">
    <meta property="og:description" content="OPEN BOOKS , OPEN THE WORLD!">
    <meta property="og:image" content="./img/1.jpg">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://metatags.io/">
    <meta property="twitter:title" content="親子共讀">
    <meta property="twitter:description" content="OPEN BOOKS , OPEN THE WORLD!">
    <meta property="twitter:image" content="./img/1.jpg">
    <!-- link -->
    <link rel="shortcut icon" href="./img/favicon2.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/book1.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/dataTables.bootstrap4.min.css">

    <style>
        .chart1,
        .chart2 {
            width: 80%;
            height: 30%;
            margin: auto;
        }
    </style>

</head>

<body>
    <!-- 導覽列 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./img/book1.png" width="30" height="30" class="d-inline-block">
                親子共讀
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.html">
                            <i class="fas fa-home"></i> 首頁
                            <span class="sr-only">(current)</span></a>
                    </li>
                    <!-- add dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-book"></i> 教育資源
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./od1.php">繪本花園</a>
                            <a class="dropdown-item" href="./od2.php">主題動畫</a>
                            <a class="dropdown-item" href="./od3.php">有聲書</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-info-circle"></i> 參考資訊
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./chart.php">統計資料</a>
                            <a class="dropdown-item" href="./library.php">公立圖書館</a>
                            <a class="dropdown-item" href="./activity.php">藝文活動</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- loading -->
    <div class="container-fluid" id="loading">
        <div class="row h-100">
            <div class="col-12 align-self-center text-center">
                <img src="./img/loading.svg">
            </div>
        </div>
    </div>


    <!-- 內容區 -->
    <div class="container" id="content">

        <div class="row text-success">
            <div class="col-12 my-3 text-success">
                <h1 class="text-center text-success">公共圖書館統計</h1>
            </div>
        </div>

        <!-- add php code -->
        <?php   
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36");
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);        
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);        
            curl_setopt($curl, CURLOPT_AUTOREFERER, true);        
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
            curl_setopt($curl, CURLOPT_URL, "https://www.nlpi.edu.tw/Handlers/OpenDataHandler.ashx?ID=e211a9f7-99f9-479d-9c77-8c43db809f78&Type=2");
            $data = curl_exec($curl);            
            curl_close($curl);            
            $json = json_decode($data, true);
        ?>


        <div class="row ">
            <div class="col-12 my-3 text-success">
                <table class="table text-success" id="book">
                    <thead>
                        <tr>
                            <th scope="col-12">#</th>
                            <th scope="col-12">縣市別</th>
                            <th scope="col-12">圖書館數</th>
                            <th scope="col-12">全年圖書預算(元)</th>
                            <th scope="col-12">全年圖書資訊借閱人次</th>
                            <th scope="col-12">幼兒閱讀(場次)</th>
                            <th scope="col-12">兒童閱讀(場次)</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php                       
                    for ($i=0; $i < count($json); $i++) {
                        $t1=$json[$i]["圖書館數 總館(所)"];
                        $t2=$json[$i]["分館(所)"];
                        $t3=$json[$i]["區館(所)"];
                        $tot=$t1+$t2+$t3;                             
                    ?>

                        <tr>
                            <td scope="row"><?=($i+1);?></td>
                            <td scope="縣市別"><?=$json[$i]["縣市別"];?></td>
                            <td scope="圖書館數"><?=$tot;?></td>
                            <td scope="全年購買圖書資料費-預算(元)"><?=$json[$i]["全年購買圖書資料費-預算(元)"];?></td>
                            <td scope="全年圖書資訊借閱人次"><?=$json[$i]["全年圖書資訊借閱人次"];?></td>
                            <td scope="幼兒閱讀推廣活動(場次)"><?=$json[$i]["幼兒閱讀推廣活動(場次)"];?></td>
                            <td scope="兒童閱讀推廣活動(場次)"><?=$json[$i]["兒童閱讀推廣活動(場次)"];?></td>
                        </tr>
                        <?php                                               
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- 圖表區 -->
    <div class="chart1">
        <canvas id="linechart"></canvas>
        <script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/Chart.min.js"></script>

        <script>
            let line = $("#linechart");
            let myLineChart = new Chart(line, {
                type: "line",
                data: {
                    labels: ["基隆市", "台北市", "新北市", "桃園市", "新竹縣", "新竹市", "苗栗縣", "南投縣", "台中市", "彰化縣",
                        "雲林縣", "嘉義縣", "嘉義市", "台南市", "高雄市", "屏東縣", "台東縣", "花蓮縣", "宜蘭縣", "澎湖縣",
                        "金門縣", "連江縣"
                    ],

                    datasets: [{
                        label: "全年圖書預算(元)",
                        data: [7533780, 118135489, 100627646, 60245000, 6066705,
                            9147000, 8841680, 7243943, 91473297, 12523513,
                            10891068, 6281804, 6578000, 55718966, 43535498,
                            9060166, 7212750, 12440686, 8015720, 3784319,
                            8149710, 1237000
                        ],
                        borderColor: "rgba(54, 162, 235, 0.7)",
                        backgroundColor: "rgba(54, 162, 235, 0.5)",
                        fill: false,
                        borderWidth: 5,
                        lineTension: 0
                    }]
                },

                options: {
                    title: {
                        text: "2018各縣市圖書館購書預算",
                        display: true
                    }
                }
            })
        </script>
    </div>


    <div class="chart2">
        <canvas id="barchart"></canvas>
        <script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/Chart.min.js"></script>

        <script>
            let bar = $("#barchart");
            let myBarChart = new Chart(bar, {
                type: "bar",
                data: {

                    labels: ["基隆市", "台北市", "新北市", "桃園市", "新竹縣", "新竹市", "苗栗縣", "南投縣", "台中市", "彰化縣",
                        "雲林縣", "嘉義縣", "嘉義市", "台南市", "高雄市", "屏東縣", "台東縣", "花蓮縣", "宜蘭縣", "澎湖縣",
                        "金門縣", "連江縣"
                    ],
                    datasets: [{
                        label: "各縣市公共圖書館總數",
                        data: [10, 45, 64, 38, 14, 5, 20, 15, 47, 28,
                            24, 20, 3, 43, 63, 38, 16, 14, 16, 7,
                            5, 6
                        ],
                        borderColor: "rgba(153, 102, 255, 1)",
                        backgroundColor: "rgba(153, 102, 255, 0.2)",
                        fill: false,
                        borderWidth: 1
                    }]
                },

                options: {
                    title: {
                        text: "公共圖書館統計",
                        display: true
                    }
                }
            })
        </script>
    </div>


    <!-- 頁尾版權區 -->
    <div class="container-fluid bg-info text-white text-center " id="footer">
        <div class="row">
            <div class="col-12">
                <ul class="nav justify-content-center">
                    <li class="nav-item ">
                        <a class="nav-link" href="./index.html">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./od1.php">
                            <i class="fas fa-book"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./chart.php">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </li>
                </ul>

                <h5>
                    &COPY;JOY |
                    <script>
                        document.write(new Date().getFullYear())
                    </script> 泰山職訓網頁班習作

                </h5>
            </div>
        </div>
    </div>


    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/wow.min.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(window).on("load", function () {
            $("#loading").fadeOut(3000, function () {
                $("#content").fadeIn();
                $("#footer").fadeIn();
            })
        })

        new WOW().init();

        $("#book").dataTable({
            language: {
                url: './datatables-chinese.json'
            },

            columnDefs: [{
                // targets:[3,4],                   
                orderable: false,
                searchable: false
            }]

        })
    </script>

</body>

</html>