<div class="container mt-2">
    <h1> Listagem de Professores </h1>
    <hr>

    <a href="<?= base_url() . "?c=produto&m=add"?>" class="btn btn-success">Inserir Professores</a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th class="col-6">Nome</th>
                <th>Preço</th>
                <th>Marca</th>
                <th>Foto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <td><?php foreach ($produtos as $produto) :?></td>
            
            <tr>
                <td><?= $produto['nome'] ?></td>
                <td><?= $produto['preco'] ?></td>
                <td><?= $produto['marca'] ?></td>
                <td>
                    <a href="<?= $produto['foto']; ?>">
                        <img src="<?= $produto['foto']; ?>"height="30px"></td>
                    </a>
                <td>
                <a href="<?= base_url() ?>?c=produto&m=excluir&id=<?= $produto['idproduto'] ?>" class="btn btn-danger" title="excluir"> <i class="fa-solid fa-trash-can"></i> </a>
                <a href="<?= base_url() ?>?c=produto&m=editar&id=<?= $produto['idproduto'] ?>" class="btn btn-primary" title="editar"> <i class="fa-solid fa-pencil"></i> </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
