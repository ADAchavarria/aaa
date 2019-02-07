$(document).ready(function(){
	
	$('#myForm').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			url: "addPlanta.php",
			dataType: "JSON",
			method: "GET",
			data: { search: $("#searchPlanta").val()}
		}).done(function(res) {

      $("#fotosModal").empty();
			$('#add_data_Modal').modal('show');
			$("#qrCodeModal").html("<img src='"+res.qrcode+"'/>");
      $("#qrcodeInput").val(res.qrcode);
      $("#contentModal").html(res.content);
      $("#descricaoInput").val(res.content);
			$("#especieModal").html(res.especie);
      $("#especieInput").val(res.especie);
			$("#familiaModal").html(res.familia);
      $("#familiaInput").val(res.familia);
			$("#ordemModal").html(res.ordem);
      $("#ordemInput").val(res.ordem);
			$("#nomeComumModal").html(res.nomeComum);
      $("#nomeComumInput").val(res.nomeComum);
			$("#tituloModal").html(res.especie);
      $("#tituloInput").val(res.especie);
			$.each(res['imagens'], function( index, value ){
    			$("#fotosModal").append("<img style ='width:100px' src='"+value+"' />");
          $("#fotosInput").val("<img style ='width:100px' src='"+value+"' />");
			});
		});

	});
	$('#insert_form').on("submit", function(event){  
           event.preventDefault(); 
           event.stopImmediatePropagation();
           if($('#nomeComumInput').val() == '')  
           {  
                alert("Introduza pelo menos um nome comum da planta !");  
           }  
           else if($('#especieInput').val() == '')  
           {  
                alert("Introduza a especie da planta !");  
           } 
           else if($('#familiaInput').val() == '')  
           {  
                alert("Introduza a familia da planta !");  
           } 
           else if($('#ordemInput').val() == '')  
           {  
                alert("Introduza a ordem da planta !");  
           } 
           else if($('#fotosInput').val() == '')  
           {  
                alert("Introduza pelo menos uma foto da planta !");  
           } 
           else if($('#qrcodeInput').val() == '')  
           {  
                alert("Falta do QR Code !");  
           }
           else if($('#descricaoInput').val() == '')  
           {  
                alert("Introduza a descrição da planta !");  
           }  
           else  
           { 

           
              $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:{
                      nomeCientifico: $("#tituloInput").val(),
                      nomeComum: $("#nomeComumInput").val(),
                      especie: $("#especieInput").val(),
                      familia: $("#familiaInput").val(),
                      ordem: $("#ordemInput").val(),
                      fotosUrl: $("#fotosModal").html(),
                      qrcode: $("#qrcodeInput").val(),
                      descricao: $("#descricaoInput").val()

                     }, 
                     dataType: "JSON",
                     contentType: 'application/x-www-form-urlencoded',
                     beforeSend:function(){  
                          $('#insert').val("Inserindo");  
                     }  
                     
                          
                     
                });
                $('#insert_form')[0].reset();  
                $('#add_data_Modal').modal('hide');  
                            
              
           }  
      });
});	




