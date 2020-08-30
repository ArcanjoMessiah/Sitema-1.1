<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <style>
            .footer{
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #6c757d;
                color: white;
                text-align: center;
                height: 30px;
            }
            p{
                margin-top: 8px; 
            }
        </style>
    </head>
    <body>
        <div class="footer">
            <p>
                Sistema MBO 1.0 &COPY; 2019 - <?php
                $date = date("Y");
                echo " $date";
                ?>
            </p>
        </div> 
    </body>
</html>
