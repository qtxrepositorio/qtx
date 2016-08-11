<?php 
    $creatorNamePRINT = '';
    foreach ($creatorName as $key) {
        # code...
        $creatorNamePRINT = $key->users['name'];
    }
?>

<br>

<div class="col-md-4" align="center">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Informações sobre a notícia:</b></h3>
        </div>
        <div class="box-body">

            <p><b>Assunto: </b><?= h($notice->subject) ?></p> 
            <p><b>Conteúdo: </b><?= h($notice->text) ?></p>
            <p><b>Criado Por: </b><?= h($creatorNamePRINT) ?></p> 
            <p><b>Criado em: </b><?= h($notice->created) ?></p> 
            <p><b>Modificado em: </b><?=  h($notice->modified)  ?></p> 
            <?php 
            if($authenticatedUserId == $notice->user_id)
            {
            ?>

            <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $notice->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

            <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $notice->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $notice->id))); ?>

            <?php } ?>                
        </div>
    </div>
</div>


<div class="col-md-8">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Pessoas que receberam este aviso:</b></h3>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?= __('Nome:') ?></th>
                        <th><?= __('Cpf:') ?></th>
                        <th><?= __('Usuário:') ?></th>
                        <th><?= __('Ativo:') ?></th>
                    </tr>
                    <?php foreach ($notice->users as $users): ?>
                    <tr>                        
                        <td><?= h($users->name) ?></td>
                        <td><?= h($users->cpf) ?></td>
                        <td><?= h($users->username) ?></td>                        
                        <td><?= $users->status ? __('Sim') : __('Não'); ?></td>
                    </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>




<div class="col-md-8">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Grupos que receberam este aviso:</b></h3>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?= __('Nome:') ?></th>
                        <th><?= __('Descrição:') ?></th>
                    </tr>
                </thead>    
                <tbody>
                    <?php foreach ($notice->roles as $roles): ?>
                        <tr>
                            <td><?= h($roles->name) ?></td>
                            <td><?= h($roles->description) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>