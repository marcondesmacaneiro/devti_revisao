<?php
    //deletar
    if (isset($_POST['deletar'])) {
        $sql_delete_filme = "DELETE
                             FROM filmes
                             WHERE codigo = :codigo
        ";
        $filme_delete_prepara = $conn->prepare($sql_delete_filme);
        if ($filme_delete_prepara->execute(array("codigo" => $_GET['codigo']))) {
            echo "
                <br>
                <div class=\"alert alert-success\">
                    Filme excluído com sucesso!
                </div>
            ";
        }
    } else {


    $sql_filme = "SELECT * 
                    FROM filmes 
                    WHERE codigo = :codigo";
    $filme_prepara = $conn->prepare($sql_filme);
    $filme_prepara->execute(array("codigo"=>$_GET['codigo']));

    $filme = $filme_prepara->fetch();

?>
<table class="table">
    <tr>
        <td>
            Código
        </td>
        <td>
            <?php echo $filme['codigo']; ?>
        </td>
    </tr>
    <tr>
        <td>
            Nome
        </td>
        <td>
            <?php echo $filme['nome']; ?>
        </td>
    </tr>
    <tr>
        <td>
            Resumo
        </td>
        <td>
            <?php echo $filme['resumo']; ?>
        </td>
    </tr>
</table>
<form method="post">
    <input class="btn btn-danger" type="submit" name="deletar" value="Deletar">
</form>
<br>

<?php
    }
?>