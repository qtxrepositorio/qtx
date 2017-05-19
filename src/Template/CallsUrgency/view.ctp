<?php ?>

<section class="content">

    <div class="row">
        <div class="col-md-5" align="center">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Informações sobre a urgência:</b></h3>
                </div>
                <div class="box-body">

                    <p><b>ID: </b><?= $this->Number->format($callsUrgency->id) ?></p>
                    <p><b>Titulo: </b><?= h($callsUrgency->title) ?></p>
                    <p><b>Descrição: </b><?= h($callsUrgency->description) ?></p>
                    <p><b>Criado em: </b><?= h($callsUrgency->created) ?></p>
                    <p><b>Modificado em: </b><?= h($callsUrgency->modified) ?></p>

                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $callsUrgency->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $callsUrgency->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $callsUrgency->id))); ?>
                    
                </div>
            </div>
        </div>
    </div>
    
</section>

