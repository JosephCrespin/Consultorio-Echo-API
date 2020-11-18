<?php require_once("Components/Header.php");?>

<body>
        <a href="index.php">
            <button type="button" id="back-button" class="btn btn-primary" aria="volver a pagina principal">
                <svg width="3em" height="3em" viewBox="0 0 16 16" id="flecha" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
            </button>
        </a>
        <h2>HISTORIAL DE CONSULTAS</h2>
  <table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Tema</th>
        <th scope="col">Hora</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
<?php
       foreach ($data["consultas"] as $consulta) 
        { echo "
                <tr>
                  <th scope='row'>{$consulta->id}</th> 
                  <td>{$consulta->name}</td>
                  <td>{$consulta->tema}</td>
                  <td>{$consulta->fecha}</td>
                  <td>
                  <a href='?action=delete&id={$consulta->id}'>
                  <button class= 'btn btn-danger'>Delete</button></a>
                  </td>
                </tr>
                ";
        } 
      ?>
    </tbody>
  </table>
</body>
       
                  