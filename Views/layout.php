<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Jquery CDN GOOGLE-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=wg9zl6bathf9ajn9pjnf4a5nf5ycgso37vsvyi1u73avj6j8"></script>-->
    <script src="Public/js/1-tinyMCE-simple/tinymce/tinymce.min.js"></script>
    <!--<script src="Public/js/2-tinyMCE-advanced/tinymce/tinymce.min.js"></script>-->
    <script src="Public/js/1-tinyMCE-simple/tinymce/jquery.tinymce.min.js"></script>
    <!--<script src="Public/js/2-tinyMCE-advanced/tinymce/jquery.tinymce.min.js"></script>-->
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