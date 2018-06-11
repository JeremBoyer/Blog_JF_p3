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

<body>
    <!-- Header -->
    <section>
        <nav class="navbar navbar-expand-md bg-dark navbar-fixed-top">
            <div class="container collapse navbar-collapse">
                <a href="index.php" class="logo"> Jean Forteroche</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"> Accueil </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"> Livres </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"> Présentation de l'auteur </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=addPost"> Ajouter un article </a>
                    </li>
                    <?php
                    if(empty($_SESSION['user'])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=logIn"> Connexion </a>
                    </li>
                    <?php
                    }
                    ?>

                    <?php
                        if(isset($_SESSION['user'])) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['user']['username']?></a>
                        <div class="dropdown-menu">
                            <a class="nav-link dropdown-item" href="index.php?action=profile"> Profil </a>

                            <a class="nav-link dropdown-item" href="index.php?action=logOut"> Deconnexion </a>

                            <a href="index.php?action=addPost" class="nav-link dropdown-item"><i class="fas fa-feather"></i> Ajouter un article</a>
                        </div>
                    </li>

                    <?php
                        }
                    ?>

                </ul>
            </div>
        </nav>
    </section>
    <!-- End Header -->



    <!-- About -->

    <!-- End About -->

    <!-- Content -->
    <div class="container-fluid content">
        <?= $content ?>
    </div>
    <!-- End Content -->

    <!-- Footer -->
    <footer class="container-fluid footer">

    </footer>
    <!-- End Footer -->
</body>
</html>