<?php ?>


<section class="content">

    <div class="row">

        <div class="col-md-5" align="center">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Informações sobre a categoria:</b></h3>
                </div>
                <div class="box-body">

                    <table class="vertical-table">
                        <tr>
                            <th><?= __('Nome:') ?></th>
                            <td><?= h($callsCategory->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Id:') ?></th>
                            <td><?= $this->Number->format($callsCategory->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Tempo para realização: ') ?></th>
                            <td><?= h($callsCategory->time) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Criado em: ') ?></th>
                            <td><?= h($callsCategory->created) ?></td>
                        </tr>
                    </table>

                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $callsCategory->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $callsCategory->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $callsCategory->id))); ?>

                </div>
            </div>
        </div>
    </div>
</section>

