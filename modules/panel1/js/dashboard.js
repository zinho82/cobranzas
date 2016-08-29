      var datos = $.ajax({
    		url:'../view/panel.php',
    		type:'post',
    		dataType:'json',
    		async:false    		
    	}).responseText;
        datos = JSON.parse(datos);
        window.alert('jquery funciona');
    	google.load("visualization", "1", {packages:["corechart"]});
      	google.setOnLoadCallback(dibujarGrafico);
      
      	function dibujarGrafico() {
        var data = google.visualization.arrayToDataTable(datos);
            window.alert(data);
        	var options = {
          	title: 'VENTAS DEL PRIMER BIMESTRE',
          	hAxis: {title: 'MESES', titleTextStyle: {color: 'green'}},
          	vAxis: {title: 'MILES DE PESOS', titleTextStyle: {color: '#FF0000'}},
          	backgroundColor:'#ffffcc',
          	legend:{position: 'bottom', textStyle: {color: 'blue', fontSize: 13}},
          	width:900,
            height:500
        	};

        	var grafico = new google.visualization.ColumnChart(document.getElementById('grafica'));
        	grafico.draw(data, options);
      	}
