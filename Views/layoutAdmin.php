<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <!-- Bootstrap core CSS -->
    <link href="Public/bootstrap/bootstrap.min.css" rel="stylesheet"/>
    <!-- Custom CSS -->
    <link href="Public/css/style.css" rel="stylesheet" />

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Cantarell|Great+Vibes|Roboto+Slab" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

    <!-- Jquery CDN GOOGLE-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap core JS -->
    <script src="Public/bootstrap/popper.min.js"></script>
    <script src="Public/bootstrap/bootstrap.min.js"></script>

    <script src="Public/js/1-tinyMCE-simple/tinymce/tinymce.min.js"></script>
    <script src="Public/js/1-tinyMCE-simple/tinymce/jquery.tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({

            selector: '#mytextarea',
            theme: 'modern',
            width: 600,
            height: 300,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ],
            content_css: 'css/content.css',
            formNoValidate: true,
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',

            language: "fr_FR"
        });
    </script>

</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a href="index.php" class="navbar-brand"> Jean Forteroche</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="index.html">
                    <i class="far fa-newspaper"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="charts.html">
                    <i class="fa fa-fw fa-area-chart"></i>
                    <span class="nav-link-text">Charts</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="tables.html">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">Tables</span>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-sign-out-alt"></i>  Logout</a>
            </li>
        </ul>
    </div>
</nav>
<!-- End Header -->



<!-- About -->


<!-- End About -->

<!-- Content -->
<!--<div class="container-fluid content">-->
<?= $content ?>
<!--</div>-->
<!-- End Content -->

<!-- Footer -->
<footer class="container-fluid footer">

</footer>
<!-- End Footer -->
</body>
</html>