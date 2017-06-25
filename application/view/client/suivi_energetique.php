<div class="dashboard-content">
	
	<div class="spacer-large"></div> 	
	<h1>Suivi Energetique</h1>
	<div class="spacer-large"></div>

	<div class="spacer-small"></div>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	
	<h4 class="spacer-large">Temperature</h4>
	<div class="spacer-small"></div>
	<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	<h4 class="spacer-large">Humidité </h4>
	<div class="spacer-small"></div>
	<div id="container_3" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	<h4 class="spacer-large">Humidité </h4>
	<div class="spacer-small"></div>
	<div id="container_4" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	
	<h4 class="spacer-large">Capteurs Consommation</h4>
	<div class="spacer-small"></div>
	<div id="container_2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


	<script type="text/javascript">
		Highcharts.chart('container', {
		    chart: {
		        type: 'line'
		    },
		    title: {
		        text: 'Moyenne Mensuelle Temperature'
		    },
		    subtitle: {
		        text: 'Source: Egghome 008E'
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
		        name: 'Salon',
		        data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		    }, {
		        name: 'Chambre Louis',
		        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
		    },
		    {
		        name: 'Cuisine',
		        data: [3.9, 7.2, 5.7, 9.5, 3.9, 5.2, 19.0, 14.6, 16.2, 19.3, 2.6, 12.8]
		    }]
		});

		Highcharts.chart('container_2', {
		    chart: {
		        type: 'area'
		    },
		    title: {
		        text: 'Temps d\'activite'
		    },
		    xAxis: {
		        categories: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi','Dimanche']
		    },
		    credits: {
		        enabled: false
		    },
		    series: [{
		        name: 'Temperature',
		        data: [5, 3, 4, 7, 2, 1, 3]
		    }, {
		        name: 'Presence',
		        data: [2, -2, -3, 2, 1, 4, 0]
		    }, {
		        name: 'Humidite',
		        data: [3, 4, 4, -2, 5, 0, 0]
		    }]
		});

			Highcharts.chart('container_3', {
		    chart: {
		        type: 'line'
		    },
		    title: {
		        text: 'Temperature Average Temperature'
		    },
		    subtitle: {
		        text: 'Source: Egghome'
		    },
		    xAxis: {
		        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
		    },
		    yAxis: {
		        title: {
		            text: 'Humidité'
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
		        name: 'salon',
		        data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		    }, {
		        name: 'Chambre Louis',
		        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
		    }]
		});

		Highcharts.chart('container_4', {
	    chart: {
	        type: 'area'
	    },
	    title: {
	        text: 'Flux de Donnee'
	    },
	    subtitle: {
	        text: 'Source: tomcat:008E/'
	    },
	    xAxis: {
	        categories: ['>1750', '>1800', '>1850', '>1900', '>1950', '>1999', '>2050'],
	        tickmarkPlacement: 'on',
	        title: {
	            enabled: false
	        }
	    },
	    yAxis: {
	        title: {
	            text: 'transite'
	        }
	    },
	    tooltip: {
	        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} millions)<br/>',
	        split: true
	    },
	    plotOptions: {
	        area: {
	            stacking: 'percent',
	            lineColor: '#ffffff',
	            lineWidth: 1,
	            marker: {
	                lineWidth: 1,
	                lineColor: '#ffffff'
	            }
	        }
	    },
	    series: [{
	        name: 'Temperature',
	        data: [502, 635, 809, 947, 1402, 3634, 5268]
	    }, {
	        name: 'Camera',
	        data: [106, 107, 111, 133, 221, 767, 1766]
	    }, {
	        name: 'Presence',
	        data: [163, 203, 276, 408, 547, 729, 628]
	    }, {
	        name: 'Gaz',
	        data: [18, 31, 54, 156, 339, 818, 1201]
	    }, {
	        name: 'Luminosité',
	        data: [2, 2, 2, 6, 13, 30, 46]
	    }]
	});

	</script>
</div>