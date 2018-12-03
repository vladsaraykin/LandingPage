
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
$stmt_insert = $pdo->prepare('INSERT INTO messages (user_name, user_email, phone, msg, start_date_time, finish_date_time, difference_date) VALUES  (?, ?, ?, ?, ?, ?, ?)');
$stmt_insert->execute(array($user_name, $user_email, $phone, $msg, $start_date_time->format('Y/m/d H:i:s'), $finish_date_time->format('Y/m/d H:i:s'), $difference_date));

include_once 'assets/pages/header.php';
if ( $_GET['page'] == 'features' ) {
    include_once 'assets/pages/features.php';

} else if ( $_GET['page'] == 'gallery' ) {
    include_once 'assets/pages/gallery.php';

} else if ( $_GET['page'] == 'video' ) {
    include_once 'assets/pages/video.php';

} else if ( $_GET['page'] == 'prices' ) {
    include_once 'assets/pages/prices.php';

} else if ( $_GET['page'] == 'testimonials' ) {
    include_once 'assets/pages/testimonials.php';

} else if ( $_GET['page'] == 'download' ) {
    include_once 'assets/pages/download.php';
    include_once 'assets/pages/contact.php';
} else{
    include_once 'assets/pages/home.php';
}
include_once 'assets/pages/footer.php';
?>
</body>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/slick/slick.min.js"></script>
<script src="assets/js/fancybox-master/dist/jquery.fancybox.min.js"></script>
<script src="https://api-maps.yandex.ru/2.1/?apikey=28ba7932-0987-4417-915e-3850f6e06650&lang=ru_RU"
        type="text/javascript"></script>
<script src="assets/js/scripts.js"></script>
</html>






