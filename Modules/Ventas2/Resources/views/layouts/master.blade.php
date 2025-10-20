<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">

        <style media="screen">

          td,
          th,
          tr,
          table {
            border-top: 1px solid black;
            border-collapse: collapse;
          }

          td.producto,
          th.producto {
            width: 75px;
            max-width: 75px;
          }

          td.cantidad,
          th.cantidad {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
          }

          td.precio,
          th.precio {
            width: 40px;
            max-width: 40px;
            word-break: break-all;
          }

          .centrado {
            text-align: center;
            align-content: center;
          }

          .ticket {
            width: 155px;
            max-width: 155px;
            font-size: 12px;
            font-family: 'Times New Roman';
          }


        </style>

    </head>
    <body>
      @yield('contents')
    </body>
</html>
