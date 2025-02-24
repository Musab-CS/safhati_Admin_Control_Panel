<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}" theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __("var.title_404" ) }}</title>


    <style>
        a {
            text-decoration: none;
        }
        :root {
            --bg-primary : #53B3CB;
            --text-theme : #0C090D ;
        }
        body {
            /*font-family: "Tajawal", sans-serif;*/
            font-family: "Baloo Bhaijaan 2", system-ui;
            overflow: hidden;
            display: grid;
            place-content: center;
            place-items: center;
        }

        /* $04 Page*/
        .container-404 {
            height: calc(100vh);
            background-color: transparent;
            display: grid;
            place-content: center;
            place-items: center;
        }

        .container-404 img {
            max-width: 300px;
            width: 90%;
            margin:  0 a;
        }

        .container-404 .light , .container-404 .dark {
            display: none;
        }

        [theme="light"] .container-404 .light {
            display: unset !important;
        }

        [theme="dark"] .container-404 .dark {
            display: unset !important;
        }

        .link-a {
            color: var(--text-theme);
        }

        .link-a:hover {
            color: var(--bg-primary) !important;
            text-decoration: underline !important;
        }

    </style>
</head>
<body>
    <div class="container-404">
        <img class="light" src="/_files/media/404.svg" alt="" srcset="">
        <img class="dark" src="/_files/media/404-dark.svg" alt="" srcset="">
        <h2 class="m-0 mt-4 pt-4 text-base mb-0"> {{ __("var.title_404" ) }} </h2>
        <a class="link-a fw-bolder" href="/en"> {{ __('var.goto_home') }} </a>
    </div>
</body>
</html>
