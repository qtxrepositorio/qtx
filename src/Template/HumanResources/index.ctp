
    <section class="content-header">
      <h1>
        Painel 
        <small> - Recursos Humanos</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            

            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quantidade de componentes por linha:</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <canvas id="pieChart" style="height:250px"></canvas>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
          

            </div>

        </div>
    </section>
    

<?php

$this->Html->script([
  'AdminLTE./plugins/chartjs/Chart.min',
],
['block' => 'script']);
?>


<?php $this->start('scriptBotton'); ?>
<!-- page script -->
<script>
  
    var peopleQquantityByLines = JSON.parse( '<?php echo json_encode($peopleQquantityByLines) ?>' );

    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);

    var PieData = [];

    colors = [
        "#f56954",
        "#00a65a",
        "#f39c12",
        "#00c0ef",
        "#3c8dbc",
        "#d2d6de",
        "#a52a2a",
        "#00ffff",
        "#00008b",
        "#008b8b",
        "#ffff00",        
        "#ff0000",        
        "#ff00bf",        
        "#8000ff",        
        "#00bfff"
    ];

    for (var i = 0; i < peopleQquantityByLines.length; i++) {

        if (peopleQquantityByLines[i].RA_XLINHA < "01") {

            peopleQquantityByLines[i].RA_XLINHA = "Sem linha cadastrada";

        }else{

            peopleQquantityByLines[i].RA_XLINHA = "Linha: " + peopleQquantityByLines[i].RA_XLINHA;
        };

        PieData.push({
            value: peopleQquantityByLines[i].COUNT_PEOPLE_BY_GROUPS,
            color: colors[i],
            highlight: colors[i],
            label: peopleQquantityByLines[i].RA_XLINHA + " Quantidade"
        });
       
    };
    
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

   
</script>
<?php  $this->end(); ?>
