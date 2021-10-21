<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>function</title>
    </head>
    <body>
        <h1>function</h1>
        <?php
        $str = "Lorem ipsum dolor sit amet, consectetur 
        adipisicing elit. 

        Nisi eaque corporis perferendis corrupti maiores sit veritatis, minus optio? Molestias suscipit, 
        sapiente quis accusantium perspiciatis atque ab repudiandae fugit nostrum! Corrupti.";
        echo $str;
        ?>
        <h2>strlen()</h2>
        <?php
        echo strlen($str);
        ?>
        <h2>nl2br</h2>
        <?php
        echo nl2br($str);
        ?>
    </body>
</html>