<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    @vite('resources/js/app.js')

    <style>
        #nprogress .bar {
            height: 5px !important;
        }
    </style>
    @inertiaHead
  </head>
  <body dir="rtl">
    @inertia

  </body>
</html>
