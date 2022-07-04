<div class="container mt-2">
    <h1> Listagem de Categorias </h1>
    <hr>

    <table class="table table-hover">
        <thead>
            <tr>
                <th class="col-10"> Nome </th>
                <th> Ações </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria) :?>
            <tr>
                <td> <?= $categoria['nome'] ?></td>
                <td>
                <a href="<?= base_url() ?>?c=categoria&m=excluir&id=<?= $categoria['idcategoria'] ?>" class="btn btn-danger" title="excluir">
                <i class="fa-solid fa-trash-can"></i>
                </a>

                <a href="http://" class="btn btn-primary" title="editar">
                <i class="fa-solid fa-pencil"></i>
                </a>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
