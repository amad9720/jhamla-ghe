<div class="dashboard-content">
	
	<div class="spacer-large"></div> 	
	<h1>Suivi Energetique</h1>
	<div class="spacer-large"></div>

	<div class="spacer-small"></div>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	
	<h4 class="spacer-large">Graph 1</h4>
	<div class="spacer-small"></div>
	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	
	<h4 class="spacer-large">Graph 1</h4>
	<div class="spacer-small"></div>
	<div id="container_2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	
	<h4 class="spacer-large">Graph 1</h4>
	<div class="spacer-small"></div>
	<div id="container_3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	
	<h4 class="spacer-large">Graph 1</h4>
	<div class="spacer-small"></div>
	<div id="container_4" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	<script type="text/javascript">
		Highcharts.chart('container', {
		    chart: {
		        type: 'line'
		    },
		    title: {
		        text: 'Monthly Average Temperature'
		    },
		    subtitle: {
		        text: 'Source: WorldClimate.com'
		    },
		    xAxis: {
		        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
		    },
		    yAxis: {
		        title: {
		            text: 'Temperature (°C)'
		        }
		    },
		    plotOptions: {
		        line: {
		            dataLabels: {
		                enabled: true
		            },
		            enableMouseTracking: false
		        }
		    },
		    series: [{
		        name: 'Tokyo',
		        data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		    }, {
		        name: 'London',
		        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
		    }]
		});

		Highcharts.chart('container_2', {
		    chart: {
		        type: 'area'
		    },
		    title: {
		        text: 'Area chart with negative values'
		    },
		    xAxis: {
		        categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
		    },
		    credits: {
		        enabled: false
		    },
		    series: [{
		        name: 'John',
		        data: [5, 3, 4, 7, 2]
		    }, {
		        name: 'Jane',
		        data: [2, -2, -3, 2, 1]
		    }, {
		        name: 'Joe',
		        data: [3, 4, 4, -2, 5]
		    }]
		});

			Highcharts.chart('container_3', {
		    chart: {
		        type: 'line'
		    },
		    title: {
		        text: 'Monthly Average Temperature'
		    },
		    subtitle: {
		        text: 'Source: WorldClimate.com'
		    },
		    xAxis: {
		        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
		    },
		    yAxis: {
		        title: {
		            text: 'Temperature (°C)'
		        }
		    },
		    plotOptions: {
		        line: {
		            dataLabels: {
		                enabled: true
		            },
		            enableMouseTracking: false
		        }
		    },
		    series: [{
		        name: 'Tokyo',
		        data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		    }, {
		        name: 'London',
		        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
		    }]
		});

		Highcharts.chart('container_4', {
		    chart: {
		        type: 'area'
		    },
		    title: {
		        text: 'Area chart with negative values'
		    },
		    xAxis: {
		        categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
		    },
		    credits: {
		        enabled: false
		    },
		    series: [{
		        name: 'John',
		        data: [5, 3, 4, 7, 2]
		    }, {
		        name: 'Jane',
		        data: [2, -2, -3, 2, 1]
		    }, {
		        name: 'Joe',
		        data: [3, 4, 4, -2, 5]
		    }]
		});
	</script>
</div>