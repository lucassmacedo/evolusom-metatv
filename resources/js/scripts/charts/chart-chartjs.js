/*=========================================================================================
    File Name: chart-chartjs.js
    Description: Chartjs Examples
    ----------------------------------------------------------------------------------------
    Item name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function () {

  var $primary = '#7367F0';
  var $success = '#28C76F';
  var $danger = '#EA5455';
  var $warning = '#FF9F43';
  var $label_color = '#1E1E1E';
  var grid_line_color = '#dae1e7';
  var scatter_grid_color = '#f3f3f3';
  var $scatter_point_light = '#D1D4DB';
  var $scatter_point_dark = '#5175E0';
  var $white = '#fff';
  var $black = '#000';

  var themeColors = [$primary, $success, $danger, $warning, $label_color];


  //Get the context of the Chart canvas element we want to select
  var pieChartctx = $("#pie-chart");

  // Chart Options
  var piechartOptions = {
    responsive: true,
    maintainAspectRatio: true,
    responsiveAnimationDuration: 500,
    title: {
      display: false
    },
    legend: {
      position: 'bottom'
    },
  };

  // Chart Data
  var piechartData = {
    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
    datasets: [{
      label: "My First dataset",
      data: [2478, 5267, 734, 784, 433],
      backgroundColor: themeColors,
    }]
  };

  var pieChartconfig = {
    type: 'pie',

    // Chart Options
    options: piechartOptions,

    data: piechartData
  };

  // Create the chart
  var pieSimpleChart = new Chart(pieChartctx, pieChartconfig);


});
