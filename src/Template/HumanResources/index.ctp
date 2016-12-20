<?php 

$quantWoman = 0;
$quantMan = 0;

foreach ($employeesBySexAndCC as $key) {
  if ($key['RA_SEXO'] == "F") {
    $quantWoman += $key['COUNT_RA_MAT']; 
  }elseif ($key['RA_SEXO'] == "M") {
    $quantMan += $key['COUNT_RA_MAT']; 
  }
}

 ?>

<section class="content-header">
  <h1>
    Painel
    <small>Recursos Humanos</small>
  </h1>      
</section>    

<section class="content">
  <div class="row">

    <div class="col-md-6">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Quantidade de pessoas por linha de transporte:</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove">
              <i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <canvas id="pieChart" style="height:250px"></canvas>
        </div>             
      </div>
    </div>
        
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Quantidade de pessoas por sexo e por centro de custo:</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove">
              <i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="chart">
            <h4>Total geral:</h4>
            <ul>
              <li>
                <font color="#ff5bff"><h4>Mulheres:</font> <?php echo $quantWoman ?></h4>
              </li>
              <li>
                <font color="rgba(60,141,188,0.9)"><h4>Homens:</font> <?php echo $quantMan ?></h4>
              </li>
            </ul>            
            <canvas id="barChart" style="height:500px"></canvas>    
          </div>
        </div>
      </div>
    </div>
        
  </div>
</section>
    

<?php
$this->Html->script(['AdminLTE./plugins/chartjs/Chart.js',],['block' => 'script']);
$this->Html->script(['FileSaver./fileSaver/FileSaver.js',],['block' => 'script']);
$this->Html->script(['CanvasToBlob./canvasToBlob/canvas-toBlob.js',],['block' => 'script']);
//$this->Html->script(['AdminLTE./plugins/Chart.js-2.3.0/dist/Chart.js',],['block' => 'script']);
?>


<?php $this->start('scriptBotton'); ?>


<script>

  $(function () {
    

    colors = [
      "#f56954", "#00a65a", "#f39c12", "#00c0ef", "#3c8dbc",
      "#d2d6de", "#a52a2a", "#00ffff", "#00008b", "#008b8b",
      "#ffff00", "#ff0000", "#ff00bf", "#8000ff", "#00bfff",
      "#f56954", "#00a65a", "#f39c12", "#00c0ef", "#3c8dbc",
      "#d2d6de", "#a52a2a", "#00ffff", "#00008b", "#008b8b",
      "#ffff00", "#ff0000", "#ff00bf", "#8000ff", "#00bfff"
    ];

    var peopleQquantityByLines = JSON.parse( '<?php echo json_encode($peopleQquantityByLines) ?>' );
    var employeesBySexAndCC = JSON.parse( '<?php echo json_encode($employeesBySexAndCC) ?>' );

    //-------------
    //- PIE CHART -
    //-------------  
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);    
    var PieData = [];

    //POPULA O DUNOT CHART 
    for (var i = 0; i < peopleQquantityByLines.length; i++) {
      
      if (peopleQquantityByLines[i].RA_XLINHA < "01") {
        peopleQquantityByLines[i].RA_XLINHA = "Sem linha cadastrada";
      }else{
        peopleQquantityByLines[i].RA_XLINHA = "Linha: " + peopleQquantityByLines[i].RA_XLINHA;      
      };

      PieData.push(
      {
        value: peopleQquantityByLines[i].COUNT_PEOPLE_BY_GROUPS,
        color: colors[i],
        highlight: colors[i],
        label: peopleQquantityByLines[i].RA_XLINHA + " Quantidade"      
      }      
      ); 

    };


    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 35, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 200,
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

    //-------------
    //- BAR CHART -
    //-------------
    var labels =[];
    for (var i = 0; i < employeesBySexAndCC.length; i++) {
      if(i == 0){
        labels.push(employeesBySexAndCC[i].CTT_DESC01);
      }else if(employeesBySexAndCC[i].CTT_DESC01 != employeesBySexAndCC[i-1].CTT_DESC01){
        labels.push(employeesBySexAndCC[i].CTT_DESC01);
      };
    };

    var dataWoman = [];
    var dataMan = [];
    var existWoman = false;
    var existMan = false;    

    for (var i = 0; i < labels.length; i++) {
      for (var x = 0; x < employeesBySexAndCC.length; x++) {
        if (labels[i] == employeesBySexAndCC[x].CTT_DESC01) {
          if (employeesBySexAndCC[x].RA_SEXO == "F") {
            existWoman = true;
            dataWoman.push(employeesBySexAndCC[x].COUNT_RA_MAT);
          }else if(employeesBySexAndCC[x].RA_SEXO == "M"){
            existMan = true;
            dataMan.push(employeesBySexAndCC[x].COUNT_RA_MAT);                        
          };         
        };
      };
      if (existWoman == false) {
        dataWoman.push(0);
      }else if (existMan == false) {
        dataMan.push(0);
      };
      existWoman = false;
      existMan = false;

    };

    var barChartData = {
      labels: labels,
      datasets: [
        {
          label: 'Mulheres',
          fillColor: "rgba(255, 73, 255, 0.9)",
          strokeColor: "rgba(255, 73, 255, 0.9)",
          pointColor: "rgba(255, 73, 255, 0.9)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(255, 73, 255, 0.9)",
          data: dataWoman
        },
        {
          label: 'Homens',
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: dataMan
        }
      ]
    };

    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
  

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

  });
</script>
<?php  $this->end(); ?>
