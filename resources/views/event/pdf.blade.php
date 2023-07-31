<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="./bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            /** 
                Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
                puede ser de altura y anchura completas.
             **/
            @page {
                margin: 0cm 0cm;
            }

            /** Defina ahora los márgenes reales de cada página en el PDF **/
            body {
                
                margin: 3cm 2cm 2cm;
            }

            /** Definir las reglas del encabezado **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm; 
                width: 100%;
                right: 0cm; 
                text-align: center;
                font-size: .7em;
                height: 3cm;
            }
            h4 { color: #0E4CD0; }
            /** Definir las reglas del pie de página **/
            footer {
                position: fixed; 
                bottom: 0px; 
                left: 0cm; 
                width: 100%;
                right: 0cm; 
                text-align: center;
                font-size: .7em;
                height: 3cm;
                
            }
            dt {
                font-weight: bold;
            }
        </style>
  </head>
  <body>
    <header>
        <img src="./img/ICHEJA.png" width="100%" height="100%"/>
    </header>
    
    {{ date('d-m-Y g:i A', strtotime($date))}} 
    @foreach ( $eventos as $e )
      {{$e->id}} <br>
      {{$e->description}} <br>
      @if ($e->start == $e->end)
        {{$e->start}} <br>
        @else
        {{$e->start}} <br>
        {{$e->end}} <br>
      @endif

      <br>
    @endforeach
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>