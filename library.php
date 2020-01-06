<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154754488-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
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
    <link rel="stylesheet" href="./css/book2.css">
    <link rel="stylesheet" href="./css/animate.css">  
    <link rel="stylesheet" href="./css/dataTables.bootstrap4.min.css">  
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

        <div class="row text-white">
            <div class="col-12 my-3 text-white">
                <h1 class="text-center text-white">公立圖書館</h1>                
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
            curl_setopt($curl, CURLOPT_URL,
             "https://www.nlpi.edu.tw/Handlers/OpenDataHandler.ashx?ID=da08aaaf-7edd-461d-a645-3039f840a1a8&Type=6");
            $data = curl_exec($curl);            
            curl_close($curl);            
            $json = json_decode($data, true);
            
        ?>  
        
        <div class="row ">
            <div class="col-12 my-3 text-white">
                <table class="table text-white" id="book">
                    <thead>
                    <tr>                       
                        <th scope="col-12">縣市</th>
                        <th scope="col-12">圖書館名稱</th>                        
                        <th scope="col-12">地址</th>
                        <th scope="col-12">電話</th>                       
                        <th scope="col-12">網址</th> 
                    </tr>
                    </thead>

                    <tbody>                 
                   
                        <?php   
                               
                            for ($i=0; $i<count($json); $i++) { 
                                $num=count($json[$i]["圖書館資訊"]); 
                                for ($j=0; $j<$num ; $j++) { 
                        ?>            
                            <tr>                         
                                <td><?=$json[$i]["縣市"];?></td> 
                                <td><?=$json[$i]["圖書館資訊"][$j]["圖書館名稱"];?></td> 
                                <td><?=$json[$i]["圖書館資訊"][$j]["地址"];?></td>                                        
                                <td><?=$json[$i]["圖書館資訊"][$j]["電話"];?></td>                                
                                <td><a href="<?=$json[$i]["圖書館資訊"][$j]["網址"];?>">詳細資料</a></td> 
                            </tr>
                        <?php  
                                }
                            }
                        ?>
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<img src="" alt="" id="testimg">
   
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

        $(window).on("load",function () {
            $("#loading").fadeOut(3000,function () {
                $("#content").fadeIn();
                $("#footer").fadeIn();
            })
        })

        new WOW().init();

        $("#book").dataTable({
            language:{
                url:'./datatables-chinese.json'
            },

            columnDefs:[
                {
                    targets:[3,4],                   
                    orderable:false,
                    searchable:false
                }
            ]

        })

        const img = (element) => {
            let url = element.href;
            $.ajax({
                method: "GET",
                url,
                dataType: "html",
                success: function(res) {
                    console.log($(res).find(".flyimg").attr("src"));
                }
            })
        }
    
    </script>

</body>
</html>