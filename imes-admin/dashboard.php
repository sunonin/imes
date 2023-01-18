<?php 
session_start();
require_once 'init.php';
include 'public/base.php';
?>

<?php startblock('title') ?><?php echo $menuTitle ?><?php endblock('title') ?>

<?php startblock('content') ?>
  <?php include('controller/DashboardController.php'); ?>
  <?php include('views/dashboard/index.php'); ?>
<?php endblock() ?>

<script type="text/javascript">
  $(document).ready(function(){
    
    $('#school_year').on('change', function(){
      let ss = $(this).val();
      let path = 'route/get-student-count.php?sy='+ss;

      $.get(path, function(result){
        $('.ttl-students').html(result);
      })

    });

  let cardColor, headingColor, axisColor;
  
  const chartOrderStatistics = document.querySelector('#studentStatisticsChart'),
    orderChartConfig = {
      chart: {
        height: 165,
        width: 130,
        type: 'donut'
      },
      labels: ['Present', 'EarlyBird', 'Late', 'Absent'],
      series: [<?= $totalPresent ?>, <?= $totalEarlyBird ?>, <?= $totalLate ?>, <?= $totalAbsent ?>],
      colors: [config.colors.success, config.colors.info, config.colors.warning, config.colors.danger],
      stroke: {
        width: 5,
        colors: cardColor
      },
      dataLabels: {
        enabled: false,
        formatter: function (val, opt) {
          return parseInt(val);
        }
      },
      legend: {
        show: false
      },
      grid: {
        padding: {
          top: 0,
          bottom: 0,
          right: 15
        }
      },
      plotOptions: {
        pie: {
          donut: {
            size: '75%',
            labels: {
              show: true,
              value: {
                fontSize: '1.5rem',
                fontFamily: 'Public Sans',
                color: headingColor,
                offsetY: -15,
                formatter: function (val) {
                  return parseInt(val);
                }
              },
              name: {
                offsetY: 20,
                fontFamily: 'Public Sans'
              },
              total: {
                show: true,
                fontSize: '0.8125rem',
                color: axisColor,
                label: 'today',
                formatter: function (w) {
                  return <?= $totalTodayPercentage ?> +'%';
                }
              }
            }
          }
        }
      }
    };
  if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
    const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
    statisticsChart.render();
  }


  })
</script>