<?php ?>

<section class="content">

    <div class="row">

        <div class="col-md-5" align="center">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Informações sobre a área:</b></h3>
                </div>
                <div class="box-body">

                    <p><b>ID: </b><?= $this->Number->format($callsArea->id) ?></p>
                    <p><b>Nome: </b><?= h($callsArea->name) ?></p>
                    <p><b>Descrição: </b><?= h($callsArea->description) ?></p>
                    <p><b>Criado em: </b><?= h($callsArea->created) ?></p>
                    <p><b>Modificado em: </b><?= h($callsArea->modified) ?></p>

                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $callsArea->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $callsArea->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $callsArea->id))); ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>


