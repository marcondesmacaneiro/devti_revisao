<?php
    //deletar
    if (isset($_POST['salvar'])) {
        $sql_alterar_filme = "UPDATE Filmes
                              SET nome    = :nome,
                                  ano     = :ano,
                                  resumo  = :resumo
                             WHERE codigo = :codigo
        ";
        $filme_alterar_prepara = $conn->prepare($sql_alterar_filme);
        if ($filme_alterar_prepara->execute(array(
            "codigo"  => $_GET['codigo'],
            "nome"    => $_POST['nome'],
            "ano"     => $_POST['ano'],
            "resumo"  => $_POST['resumo']
            ))) {
            echo "
                <br>
                <div class=\"alert alert-success\">
                    Filme alterado com sucesso!
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
<form method="post">
<table class="table">
    <tr>
        <td>
            Nome
        </td>
        <td>
            <div class="form-floating mb-3">
                <input type="text" name="nome" class="form-control" id="floatingInput" value="<?php echo $filme['nome']; ?>" placeholder="Nome">
                <label for="floatingInput">Nome</label>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            Ano
        </td>
        <td>
            <div class="form-floating mb-3">
                <input type="text" name="ano" class="form-control" id="floatingInput" value="<?php echo $filme['ano']; ?>" placeholder="Ano">
                <label for="floatingInput">Ano</label>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            Resumo
        </td>
        <td>
            <div class="form-floating">
                <textarea class="form-control" name="resumo" placeholder="Digite o resumo" id="floatingTextarea2" style="height: 100px"><?php echo $filme['resumo']; ?></textarea>
                <label for="floatingTextarea2">Resumo</label>
            </div>
        </td>
    </tr>
</table>
    <input class="btn btn-primary" type="submit" name="salvar" value="Salvar">
</form>
<br>

<?php
    }
?>