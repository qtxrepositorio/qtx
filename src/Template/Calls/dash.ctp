<?php

$manunten = 0;
$supp = 0;
$customs = 0;
$outros = 0;

foreach ($callsCountCategory as $key => $value) {
	//debug($value['count']);
	if ($value['category'] == 'Manuntenção/elétrica') {
		$manunten = $value['count'];
	}elseif($value['category'] == 'Costumizações de sistema'){
		$customs = $value['count'];
	}elseif($value['category'] == 'Suporte ao usuário'){
		$supp = $value['count'];
	}elseif($value['category'] == 'Outros'){
		$outros = $value['count'];
	}
}

$novo = 0;
$pendente = 0;
$fechado = 0;
$processando = 0;
$solucionado = 0;

foreach ($callsCountStatus as $key => $value) {
	//debug($value['status']);
	if ($value['status'] == 'Novo') {
		$novo = $value['count'];
	}elseif($value['status'] == 'Pendente'){
		$pendente = $value['count'];
	}elseif($value['status'] == 'Fechado'){
		$fechado = $value['count'];
	}elseif($value['status'] == 'Processando'){
		$processando = $value['count'];
	}elseif($value['status'] == 'Solucionado'){
		$solucionado = $value['count'];
	}
}


?>

<!-- Content Header (Page header) -->
<section class="content-header">

    <legend><?= __('Central de chamados:') ?></legend> 
    <div align='right'> <?= $this->Html->link(__('Criar novo chamado'), ['action'=>'add'])?> </div>
    <div align='left'>Números do último mês: (chamados atribuídos a mim)</div>
</section>

<section class="content">

<!-- =========================================================== -->

      <!-- Small boxes (Stat box) -->
      <div class="row">
      <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $novo ?></h3>

              <p>Novos Chamados</p>
            </div>
            <div class="icon">
              <i class="ion ion-settings"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $processando ?></h3>

              <p>Chamados em andamento</p>
            </div>
            <div class="icon">
              <i class="fa ion-android-walk"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $solucionado ?></h3>

              <p>Chamados Finalizados</p>
            </div>
            <div class="icon">
              <i class="ion ion-thumbsup"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $pendente+$fechado ?></h3>

              <p>Chamados pendentes e/ou fechados</p>
            </div>
            <div class="icon">
              <i class="ion ion-thumbsdown"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <!-- =========================================================== -->
	

    <div class="row">
    	<div class="col-md-12">
            <div class="box box-default">
                <div class="box-body">
                	<legend><?= __('Todos os chamados:') ?></legend> 
                    <table id="example1" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20">Id</th>
                                <th>Assunto</th>
                                <th width="200">Descrição</th>
                                <th>Urgência</th>
                                <th>Categoria</th>
                                <th>Status</th>
                                <th>Criado em</th>
                                <th class="actions">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($calls as $call): ?>
                            <tr>
                                <td width="20"><?= $this->Number->format($call->id) ?></td>
                                <td><?= h($call->subject) ?></td>
                                <td  width="200"><?= h($call->text) ?></td>
                                <td><?= h($call->urgency) ?></td>
                                <td><?= h($call->category) ?></td>
                                <td><?= h($call->status) ?></td>
                                <td><?= h($call->created) ?></td>
                                
                                <td align="center" class="actions">

                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $call->id), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>

                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $call->id), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Editar')); ?>

                                <?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $call->id), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Deletar', 'confirm' => __('Tem certeza de que deseja excluir # {0}?', $call->id))); ?>

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

<section class="content"></section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"></link>

<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
$this->Html->script(['//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',], ['block' => 'script']);
?> 

<script>
    $(document).ready(function () {

        $('#example1').DataTable({
        	"order": [[ 0, "desc" ]],
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(Filtrado de _MAX_ total registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior"
                }
            }, "lengthMenu": [5, 10, 15]
        });

    });
</script>
