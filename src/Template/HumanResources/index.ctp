
    <section class="content-header">
      <h1>
        Painel 
        <small> - Recursos Humanos</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quantidade de componentes por sexo e centro de custo:</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="barChart" style="height:230px"></canvas>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6">

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quantidade de componentes por linha de transporte:</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">                        
                        <canvas id="pieChartTrans" style="height:250px"></canvas>
                    </div>
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
    var employeesBySexAndCC = JSON.parse( '<?php echo json_encode($employeesBySexAndCC) ?>' );

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
        "#00bfff",
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

    //- PIE CHART - PESSOAS POR LINHA DE TRANSPORTE -//
    //---------------------------------------------- // 
    //---------------------------------------------- // 
    //---------------------------------------------- // 
    var pieChartCanvas = $("#pieChartTrans").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
   

    var PieData = [];


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


    //- BAR CHART - PESSOAS POR LINHA DE TRANSPORTE -//
    //---------------------------------------------- // 
    //---------------------------------------------- // 
    //---------------------------------------------- // 

    var labels =[];
    for (var i = 0; i < employeesBySexAndCC.length; i++) {
        //alert(i);
        if(i == 0){
            labels.push(employeesBySexAndCC[i].CTT_DESC01);
        }else if(employeesBySexAndCC[i].CTT_DESC01 != employeesBySexAndCC[i-1].CTT_DESC01){
            labels.push(employeesBySexAndCC[i].CTT_DESC01);
        };
        window.alert(employeesBySexAndCC[i].CTT_DESC01); 
    };


    var areaChartData = {
      labels: labels};

      areaChartData.push(
          datasets: [
            {
              label: "Electronics",
              fillColor: "rgba(210, 214, 222, 1)",
              strokeColor: "rgba(210, 214, 222, 1)",
              pointColor: "rgba(210, 214, 222, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [65, 59, 80, 81, 56, 55, 40]
            }

            ]
        );
    

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);


    
   
</script>
<?php  $this->end(); ?>
