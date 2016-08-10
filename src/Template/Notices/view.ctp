<?php ?>

<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notice'), ['action' => 'edit', $notice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notice'), ['action' => 'delete', $notice->id], ['confirm' => __('
Tem certeza de que deseja excluir # {0}?', $notice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
-->

<br>

<?php 
    
    $creatorNamePRINT = '';
    foreach ($creatorName as $key) {
        # code...
        $creatorNamePRINT = $key->users['name'];
    }

 ?>

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
            <li><?= $this->Html->link(__('Editar Notícia'), ['action'=>'edit', $notice->id]) ?> </li>
            <li><?= $this->Form->postLink(__('Apagar Notícia'), ['action' => 'delete', $notice->id], ['confirm' => __('Tem certeza de que deseja excluir # {0}?', $notice->id)]) ?> </li>   
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