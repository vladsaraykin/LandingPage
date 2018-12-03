
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LandingPage</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/js/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/js/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="assets/js/fancybox-master/dist/jquery.fancybox.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<?php
include_once 'config.php';
$dsn = "mysql:host=$host;dbname=$db_name;";
$pdo = new PDO($dsn, $username, $password);
$header = $pdo->query('SELECT name_block, content FROM pages ORDER BY number_in_list')->fetchAll(PDO::FETCH_UNIQUE);

//include_once 'assets/pages/header.php';
echo $header['header'][0];

if ( $_GET['page'] == 'home' ) {
//    include_once 'assets/pages/features.php';
    echo $header['home'][0];
}else if ( $_GET['page'] == 'features' ) {
//    include_once 'assets/pages/features.php';
    echo $header['features'][0];
} else if ( $_GET['page'] == 'gallery' ) {
//    include_once 'assets/pages/gallery.php';
    echo $header['gallery'][0];
} else if ( $_GET['page'] == 'video' ) {
//    include_once 'assets/pages/video.php';
    echo $header['video'][0];
} else if ( $_GET['page'] == 'prices' ) {
//    include_once 'assets/pages/prices.php';
    echo $header['prices'][0];
} else if ( $_GET['page'] == 'testimonials' ) {
//    include_once 'assets/pages/testimonials.php';
    echo $header['testimonials'][0];
} else if ( $_GET['page'] == 'download' ) {
//    include_once 'assets/pages/download.php';
    echo $header['download'][0];
} else if ( $_GET['page'] == 'contacts' ) {
//    include_once 'assets/pages/contact.php';
    echo $header['contacts'][0];
} else{
//    include_once 'assets/pages/home.php';
    foreach ($header as $key => $item){
        if($key == 'header' || $key == 'footer'){
            continue;
        }
        echo $item[0];
    }
}
//include_once 'assets/pages/footer.php';
echo $header['footer'][0];
?>
</body>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/slick/slick.min.js"></script>
<script src="assets/js/fancybox-master/dist/jquery.fancybox.min.js"></script>
<script src="https://api-maps.yandex.ru/2.1/?apikey=28ba7932-0987-4417-915e-3850f6e06650&lang=ru_RU"
        type="text/javascript"></script>
<script src="assets/js/scripts.js"></script>
</html>






