<?php ?>

<section class="content">

    <div class="row">
        <div class="col-md-5" align="center">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Informações sobre a solução:</b></h3>
                </div>
                <div class="box-body">

                    <p><b>ID: </b><?= $this->Number->format($callsSolution->id) ?></p>
                    <p><b>Titulo: </b><?= h($callsSolution->title) ?></p>
                    <p><b>Descrição: </b><?= h($callsSolution->description) ?></p>
                    <p>
                        <b>Sub categoria:</b>
                        <?= $callsSolution->has('calls_subcategory') ? $this->Html->link($callsSolution->calls_subcategory->name, ['controller' => 'CallsSubcategories', 'action' => 'view', $callsSolution->calls_subcategory->id]) : '' ?>
                    </p>
                    <p><b>Criado em: </b><?= h($callsSolution->created) ?></p>
                    <p><b>Modificado em: </b><?= h($callsSolution->modified) ?></p>

                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $callsSolution->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $callsSolution->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $callsSolution->id))); ?>
                    
                </div>
            </div>
        </div>
    </div>
    
</section>


