<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">

    <!--<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=wg9zl6bathf9ajn9pjnf4a5nf5ycgso37vsvyi1u73avj6j8"></script>-->
    <script src="Public/js/1-tinyMCE-simple/tinymce/tinymce.min.js"></script>
    <script src="Public/js/2-tinyMCE-advanced/tinymce/tinymce.min.js"></script>
    <script src="Public/js/1-tinyMCE-simple/tinymce/jquery.tinymce.min.js"></script>
    <script src="Public/js/2-tinyMCE-advanced/tinymce/jquery.tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({

            mode : "exact",
            // id ou class, des textareas
            elements : "texte,texte2",
            // en mode avancé, cela permet de choisir les plugins
            theme : "advanced",
            // liste des plugins
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
            ],

            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',

        });
    </script>

</head>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Blog de Jean Forteroche</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <?= $content ?>
    </div>

</body>
</html>