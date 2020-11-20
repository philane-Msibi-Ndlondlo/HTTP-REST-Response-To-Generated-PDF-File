<?php
session_start();

$mockyURL = "https://run.mocky.io/v3/8edfdbe4-6caf-4835-b76a-454c7a525bc2";

require_once __DIR__ . '/models/Request.php';

$mocky_json = Request::get($mockyURL, true, false);

$_SESSION['RESULTS'] = $mocky_json;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REST Return To PDF</title>
    <style>

        body{
            height: 100vh;
            width: 100%;
        }
        .container {
            width: 60%;
            height: 100vh;
            margin: 0 auto;
            text-align:center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h1 {
            margin-bottom: 3em;
            font-weight: bold;
        }

        a {
            padding: 1em 3em;
            border: none;
            outline: 0;
            color: #fff;
            background: rgba(39,174,96 ,1);
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>REST Return To PDF</h1>
        <a href='download.php'>DOWNLOAD PDF</a>
    </div>
</body>
</html>