<?php ?>

<section class="content-header">

    <legend><?= __('Categorias:') ?></legend> 
    <div align='right'> <?= $this->Html->link(__('Criar nova categoria'), ['action'=>'add'])?> </div>

</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body">

                    <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id:</th>
                                <th>Nome:</th>
                                <th>Tempo:</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($callsCategories as $callsCategory): ?>
                            <tr>
                                <td><?= $this->Number->format($callsCategory['id']) ?></td>
                                <td><?= h($callsCategory['name']) ?></td>
                                <td><?= h(substr($callsCategory['time'],0,5)) ?></td>
                                
                                <td align="center" class="actions">

                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $callsCategory['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>

                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $callsCategory['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

                                <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $callsCategory['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $callsCategory['id']))); ?>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
</section>
