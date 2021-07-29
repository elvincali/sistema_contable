<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style>
    body {
      /*position: relative;*/
      /*width: 16cm;  */
      /*height: 29.7cm; */
      /*margin: 0 auto; */
      /*color: #555555;*/
      /*background: #FFFFFF; */
      font-family: Arial, sans-serif;
      font-size: 24px;
      /*font-family: SourceSansPro;*/
    }

    #logo {
      float: left;
      margin-top: 1%;
      margin-left: 2%;
      margin-right: 2%;
    }

    #imagen {
      width: 100px;
    }

    #datos {

      margin-top: 0%;
      margin-left: 0%;
      margin-right: 0%;
      /*text-align: justify;*/
    }

    #encabezado {
      text-align: center;
      margin-left: 10%;
      margin-right: 35%;
      font-size: 25px;
    }


    #fact {
      /*position: relative;*/
      float: right;
      margin-top: 2%;
      margin-left: 2%;
      margin-right: 2%;
      font-size: 20px;
    }

    section {
      clear: left;
    }

    #cliente {
      text-align: left;
    }

    #facliente {
      width: 60%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 15px;
    }

    #fac,
    #fv,
    #fa {
      color: #FFFFFF;
      font-size: 25px;
    }

    #facliente thead {
      padding: 20px;
      background: #5b9cdd;
      text-align: left;
      border-bottom: 1px solid #FFFFFF;
    }

    #facvendedor {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 15px;
    }

    #facvendedor thead {
      padding: 20px;
      background: #2183E3;
      text-align: center;
      border-bottom: 1px solid #FFFFFF;
    }

    #example {
      padding: 20px;
      background: #5b9cdd;
      text-align: left;
      border-bottom: 1px solid #FFFFFF;
    }

    #facarticulo {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 15px;
    }

    #facarticulo thead {
      padding: 20px;
      background: #2183E3;
      text-align: center;
      border-bottom: 1px solid #FFFFFF;
    }

    #gracias {
      text-align: center;
    }

    #test {}
  </style>

  <title>Document</title>
</head>

<body>
  <header>
    <div id="datos">
      <p id="encabezado">
        <b>Sap Funanciero</b><br>José Gálvez 1368, Santa Cruz - Bolivia<br>Telefono: 800 18684
        <br>Email:sapFinanciero@example.com
      </p>
    </div>
  </header>
  <br>

  <br>
  <table class="table table-striped table-bordered table-sm text-center" style="width:100%">
    <thead id='example'>
      <tr class="">
        <th>ID</th>
        <th>Cuenta destno</th>
        <th>Monto Transferencia</th>
        <th>Fecha</th>
        <th>Detalle</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($trans as $visita)
      <tr>o
        <td>{{ $visita->id}}</td>
        <td>{{ $visita->cuenta_destino }}</td>
        <td>{{ $visita->amount_deposit }}</td>
        <td>{{ $visita->created_at }}</td>
        <td>{{ $visita->description }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>
</body>

</html>
