<div class="box-body">

    <h3>Apagado por: <?= h($deleted_by) ?></h3>
    
    <p><b>Dados do pedido:</b></p>
    <br>
    <p><b>Id do Chamado: </b><?= $this->Number->format($call->id) ?></p> 
    <p><b>Assunto: </b><?= h($call->subject) ?></p> 
    <p><b>Descrição: </b><?= h($call->text) ?></p>
    <p><b>Urgência: </b><?= h($call->urgency) ?></p>
    <p><b>Categoria: </b><?= h($call->category) ?></p>
    <p><b>Status: </b><?= h($call->status) ?></p>
    <p><b>Atribuído para: </b><?= h($call->attributed_to) ?></p>
    <p><b>Criado por: </b><?= h($call->created_by) ?></p>
    <p><b>Criado em: </b><?= h($call->created) ?></p>
    <p><b>Modificado em: </b><?= h($call->modified) ?></p>

</div>