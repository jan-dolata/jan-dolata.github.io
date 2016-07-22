<!doctype html>
<!--[if lte IE 7 ]><html lang="pl" class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="pl" class="ie ie8"><![endif]-->
<!--[if !IE]>--><html lang="pl" class="modern"><!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">

    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="node_modules/markdown-it/dist/markdown-it.min.js"></script>

    <style>
        body {
            font-family: 'Lato';
        }
    </style>
</head>

<?php
    include('vendor/erusev/parsedown/Parsedown.php');
    include('vendor/erusev/parsedown-extra/ParsedownExtra.php');

    $parsedown = new ParsedownExtra();

    $folder = 'wiki/en/';
    $all = scandir($folder);

    $files = [];
    foreach($all as $file) {
        if ($file != '.' && $file != '..') {
            $content = file_get_contents($folder . $file);

            $a = strpos($content, '# ') + 1;
            $b = strpos($content, '---') - 2;
            $name = substr($content, $a, $b - $a);

            $files[] = [
                'id' => substr($file, 0, -3),
                'name' => $name,
                'content' => $parsedown->text($content)
            ];
        }
    }
?>

<body>
    <div class="container">
        <div class="col-sm-3 text-right">
            <div style="position: fixed">
                <h1>CrudeCRUD</h1>
                <hr>
                <div id="menu">
                    <?php
                        foreach($files as $file) {
                            echo '<a href="#' . $file['id'] . '">' . $file['name'] .'</a><br>';
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="col-sm-9">
            <div id="content">
                <?php
                    foreach($files as $file) {
                        echo '<div id="' . $file['id'] . '" >' . $file['content'] . '</div><hr><hr>';
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
