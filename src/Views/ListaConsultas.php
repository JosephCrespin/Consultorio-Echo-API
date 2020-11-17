<?php require_once("Components/Header.php");?>

<body>
<a href="?action=create">
<button type="button" class="btn btn-outline-dark">Crear Consulta</button> 
</a>

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
                  <a href='?action=marcarHecha&id={$consulta->id}'>
                  <button class= 'btn btn-danger'>Done</button></a>
                  <th scope='row'>{$consulta->id}</th> 
                  <td>{$consulta->name}</td>
                  <td>{$consulta->tema}</td>
                  <td>{$consulta->fecha}</td>
                  <td>
                  <a href='?action=delete&id={$consulta->id}'>
                  <button class= 'btn btn-danger'>Delete</button></a>
                  <a href='?action=edit&id={$consulta->id}'>
                  <button class= 'btn btn-secondary'>Edit</button></a>
                  </td>
                </tr>
                ";
        } 
      ?>
    </tbody>
  </table>
</body>


</html>