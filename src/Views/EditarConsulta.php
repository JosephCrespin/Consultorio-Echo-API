
<?php require_once("Components/Header.php");?>

<body>
    <header class="container">
        <h1>Editar Consulta</h1>
        <button type="button" id="back-button" class="btn btn-primary" aria="volver a pagina principal">
            <svg width="3em" height="3em" viewBox="0 0 16 16" id="flecha" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
        </button>
    </header>
    <main class="container" id="main">
        <form action='?action=update&id=<?php echo $data["consulta"]->id ?>' method="post">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input required value='<?php echo $data["consulta"]->name ?>' name="name" type="text" class="form-control"  aria-label="Name" aria-describedby="basic-addon1">
            </div>
            <div class="form-group">
                <label name="tema">Tema</label>
                <input required value='<?php echo $data["consulta"]->tema ?>' type="text" name="tema" class="form-control"  aria-label="tema de consulta" aria-describedby="basic-addon1">

            </div>
            <?php
            echo "<p id=fecha> Fecha de creacion: " . date("Y/m/d") . "  " . date("h:i") . "</p>";

            ?>
            <div class="form-group" id="buttons">
                <button type="reset" value="reset" class="btn btn-primary">Borrar Campos</button>
                <button type="submit" value="savebd" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </main>
</body>

</html>
