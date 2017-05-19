<?php ?>

<section class="content">

    <div class="row">

        <div class="col-md-5" align="center">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Informações sobre a sub categoria:</b></h3>
                </div>
                <div class="box-body">

                    <p><b>ID: </b><?= $this->Number->format($callsSubcategory->id) ?></p>
                    <p><b>Nome: </b><?= h($callsSubcategory->name) ?></p>
                    <p><b>Descrição: </b><?= h($callsSubcategory->description) ?></p>
                    <p><b>Categoria: </b><?= h($callsSubcategory->category_id) ?></p>
                    <p><b>sla: </b><?= h($callsSubcategory->sla) ?></p>
                    <p><b>Criado em: </b><?= h($callsSubcategory->created) ?></p>
                    <p><b>Modificado em: </b><?= h($callsSubcategory->modified) ?></p>

                    <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $callsSubcategory->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

                    <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $callsSubcategory->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $callsSubcategory->id))); ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>

