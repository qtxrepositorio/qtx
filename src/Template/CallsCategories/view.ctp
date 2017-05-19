<?php ?>

<section class="content">

    <div class="row">

        <div class="col-md-5" align="center">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Informações sobre a categoria:</b></h3>
                </div>
                <div class="box-body">

                    <p><b>ID: </b><?= $this->Number->format($callsCategory->id) ?></p>
                    <p><b>Nome: </b><?= h($callsCategory->name) ?></p>
                    <p><b>Descrição: </b><?= h($callsCategory->description) ?></p>
                    <p>
                        <b>Área: </b>
                        <?= $callsCategory->has('calls_area') ? $this->Html->link($callsCategory->calls_area->name, ['controller' => 'CallsAreas', 'action' => 'view', $callsCategory->calls_area->id]) : '' ?>
                    </p>
                    <p><b>Criado em: </b><?= h($callsCategory->created) ?></p>
                    <p><b>Modificado em: </b><?= h($callsCategory->modified) ?></p>

                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $callsCategory->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $callsCategory->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $callsCategory->id))); ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>

