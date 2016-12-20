<?php ?>

<section class="content">



    <div class="box box-success">
        <div class="box-body">
            <div class="roles form large-9 medium-8 columns content">
                <div align='right'><?= $this->Html->link(__('Adicionar Aviso'),['controller'=>'Notices','action'=>'add'])?></div>
                    <legend><?= __('Aviso(s) recebidos(s) em grupo:') ?></legend>
                    <div class="box-body" align="center">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('Assunto:') ?></th>
                                    <th><?= $this->Paginator->sort('Conteúdo:') ?></th>
                                    <th><?= $this->Paginator->sort('Criado em:') ?></th>
                                    <th>Usuário criador:</th>
                                    <th align="center" class="actions"><?= __('Ações:') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($noticesRoles as $notice): ?>
                                        <tr>
                                            <?php 
                                            if (strlen($notice->notices['subject']) > 45) 
                                            {
                                            ?>        <td><?= h(substr($notice->notices['subject'],0,45)). ' [...]' ?></td>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>        <td><?= h($notice->notices['subject']) ?></td>     
                                            <?php
                                                }
                                            ?>                                        

                                            <?php 
                                            if (strlen($notice->notices['text']) > 65) 
                                            {
                                            ?>        <td><?= h(substr($notice->notices['text'],0,65)). ' [...]' ?></td>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>        <td><?= h($notice->notices['text']) ?></td>     
                                            <?php
                                                }
                                            

                                            $dateConvertedForTable = explode("-", $notice->notices['created']);
                                            $day = substr($dateConvertedForTable[2],0,2);
                                            $month = $dateConvertedForTable[1];
                                            $year = $dateConvertedForTable[0];
                                            $dateConvertedForTable = strval($day) . '/' . strval($month) . '/' . strval($year);
                                            ?>
                                            
                                        <td><?= h($dateConvertedForTable) ?></td>
                                        <td><?= h($notice->users['name']) ?></td>
                                        <td align="center" class="actions">
                                                <?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'Notices', 'action' => 'view', $notice->notices['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Visualizar')); ?>
                                                
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"></link>

<?php
$this->Html->script(['AdminLTE./plugins/fileSaver/FileSaver.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/canvasToBlob/canvas-toBlob.js',], ['block' => 'script']);
$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',], ['block' => 'script']);
$this->Html->script(['//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',], ['block' => 'script']);
?> 

<script>
$(document).ready(function(){
    $('#example2').DataTable({      
        "language": {
            "lengthMenu":  "Mostrando _MENU_ registros por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(Filtrado de _MAX_ total registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior"
            }
        },"lengthMenu": [ 5, 10, 15 ]
    });
});
</script>