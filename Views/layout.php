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
                'advlist autolink link lists charmap preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking',
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
        <nav class="navbar navbar-expand-lg bg-dark navbar-fixed-top">
            <div class="container collapse navbar-collapse" >
                <a href="index.php" class="logo"> Jean Forteroche</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Accueil </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-item dropdown-toggle text-white bg-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-book"></i> Livres </a>
                        <div class="dropdown-menu bg-dark">
                            <?php
                            $categoryManager = new \Blog\Model\CategoryManager();
                            $categories =  $categoryManager->listCategory();
                            while ($category = $categories->fetch()) {
                                ?>
                                <div>
                                    <a href="index.php?action=getPostsCategory&amp;category_id_fk=<?= $category['id'] ?>"
                                       class="nav-link dropdown-item"><?= $category['title'] ?>
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=listCategories"><i class="fas fa-address-card"></i> Présentation de l'auteur </a>
                    </li>
                    <?php
                        if (Authentication::isAdmin()) {
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=addPost"><i class="fas fa-feather"></i> Ajouter un article </a>
                    </li>

                    <?php
                        }
                        if(empty($_SESSION['user'])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=logIn"><i class="fas fa-sign-in-alt"></i> Connexion </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=signUp"><i class="fas fa-user-plus"></i> Inscription </a>
                    </li>
                    <?php
                        }
                    ?>

                    <?php
                        if(isset($_SESSION['user'])) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-item dropdown-toggle text-white bg-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['user']['username']?></a>
                        <div class="dropdown-menu bg-dark">
                            <a class="nav-link dropdown-item " href="index.php?action=profile&amp;id=<?= $_SESSION['user']['id']?>"><i class="fas fa-user"></i> Profil </a>

                            <?php
                            if (Authentication::isAdmin()) {
                                ?>
                            <a class="nav-link dropdown-item" href="index.php?action=dashBoard"><i class="far fa-newspaper"></i> Administration </a>

                                <?php
                            }
                            ?>

                            <a class="nav-link dropdown-item" href="index.php?action=logOut"><i class="fas fa-sign-out-alt"></i> Deconnexion </a>

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

    <!-- Content -->
        <?= $content ?>
    <!-- End Content -->

    <!-- Footer -->
    <footer class="container-fluid footer">

        <nav class="navbar navbar-expand-md bg-dark">
            <div class="container-fluid m-4 p-4">
                <div class="container">
                    <div class="row  text-white text-center">
                        <div class="col-md-4">
                            Site école @OpenClassrooms
                        </div>
                        <div class="col-md-4">
                            <?php
                                if (Authentication::isAdmin()) {
                            ?>
                                    <a class="nav-link" href="index.php?action=dashBoard"> Administration </a>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="col-md-4 ">
                            Pour contacter l'auteur écrivez lui via cette adresse <em>jean.forteroche@blog.fr</em>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </footer>
    <!-- End Footer -->
</body>
</html>