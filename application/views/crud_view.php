<div class="jumbotron">
	<h2>
		CRUD Empresario
	</h2>
</div>
<!-- DIALOGO --> 
		<div id="dialogo" style="display:none;"><div class="notify"></div></div> 
 
		<!-- ALERTA --> 
		<div class="col-md-4 col-md-offset-4" style="position:fixed;" id="msj"></div>
<div class="container-fluid"> 
 
	<button type="button" onclick="prepara_form( 'Nuevo', 0 )" class="btn btn-primary dropdown-toggle"><i class="glyphicon glyphicon-plus"></i>&nbsp;Agregar Empresario</button> 
 
	<!-- TABLA DE USUARIOS --> 
	<table class="completa table"> 
		<thead> 
			<tr> 
				<th>Nombre</th> 
				<th></th>

			</tr> 
		</thead> 
		<tbody id="lista"></tbody> 
	</table> 
 
</div><!-- FIN CONTAINER --> 
 
<!-- FORMULARIO --> 
<div class="hide_" id="div_form"> 
	<div class="red" id="msj_form"></div> 
	<?php echo form_open('', array('id'=>'my_form')) ?> 
		<!-- HIDDEN --> 
		<input type="hidden" name="idempresario" id="idempresario"> 
		<table class="completa"> 
			<tr> 
				<td width="30%"><label for="nombres">Nombre:</label></td> 
				<td width="70%"> 
					<input type="text" class="form-control" id="nombres" name="nombres"> 
				</td> 
			</tr> 
			<tr> 
				<td><label for="apellidos">Apellidos:</label></td> 
				<td> 
					<input type="text" class="form-control" id="apellidos" name="apellidos"> 
				</td> 
			</tr> 
			<tr> 
				<td><label for="direccion">Direccion:</label></td> 
				<td> 
					<input type="text" class="form-control" id="direccion" name="direccion"> 
				</td> 
			</tr> 
			<tr> 
				<td><label for="ciudad">Ciudad:</label></td> 
				<td> 
					<input type="text" class="form-control" id="ciudad" name="ciudad"> 
				</td> 
			</tr> 
			<tr>
				<td width="30%"><label>Sexo:</label></td> 
				<td width="70%">
					<label><input type="radio"  class='radio-inline' id="sexo" name="sexo" value='M' checked='checked'>Masculino</label>
					<label><input type="radio" class='radio-inline'  id="sexo" name="sexo" value='F'>Femenino</label>
				</td> 
			</tr>	
			<tr> 
				<td><label for="telefono">Telefono:</label></td> 
				<td> 
					<input type="text" class="form-control" id="telefono" name="telefono"> 
				</td> 
			</tr> 						
				<tbody id="lista"></tbody> 
		</table> 
	<?php echo form_close() ?>
	<?=validation_errors(); ?> 
</div> 
    
<script> 
	var img='<i class="glyphicon glyphicon-dashboard"></i>'; 
 
	setTimeout(function(){ traer_lista(); }, 500); 
 
	function traer_lista(){ 
		$.ajax({ 
			url      : 'index.php/crud/getempresarios', 
			type     : 'post', 
			dataType : 'json', 

			success : function(data){ 
				$('#lista').empty(); 
				if( data.type==false){ 
					alerta( data.message, false ); 
				}else{ 
					var fila=''; 
					$.each(data.lista, function( k, v ){ 
						fila  ='<tr tabindex="2014'+v.idempresario+'" >'; 
						fila +='<td>'+v.nombres+' '+v.apellidos+'</td>';  
						fila +='<td>'; 
						fila += '<i class="glyphicon glyphicon-pencil" onclick="prepara_form(\'Editar\', '+v.idempresario+')" title="EDITAR"></i>'; 
						fila +='<i class="glyphicon glyphicon-remove" onclick="confirm_delete( '+v.idempresario+' )" title="ELIMINAR"></i>'; 
						fila +='</td>'; 
						fila +='</tr>'; 
						$('#lista').append(fila); 
					}); 
				} 
			}, 
			error : function(){ 
				alerta(); dialogo( 'Error', 'Error en la función usuarios/traer_lista.' ); 
			} 
		}); 
	}; 

	function prepara_form( accion, idempresario ){ 
		$('#my_form')[0].reset(); 
		$('#idempresario').val( idempresario ); 
		if( accion=='Editar' ){ 
			$.ajax({ 
				url      : 'index.php/crud/getoneempresario', 
				type     : 'post', 
				dataType : 'json', 
				data     : { idempresario : idempresario }, 
				success : function(data){ 
					if( data.type==false ){ 
						dialogo('Notificación', data.message); 
					}else{ 
						var v=data.empresario[0]; 
						$('#nombres').val( v.nombres );
						$('#apellidos').val( v.apellidos );
						$('#direccion').val( v.direccion );
						$('#ciudad').val( v.ciudad );
						$('#telefono').val( v.telefono );
						$('input:radio[name="sexo"]').filter('[value="'+v.sexo+'"]').attr('checked',true);
						load_form( accion ); 
					} 
				}, 
				error : function(){ 
					alerta(); dialogo( 'Error', 'Error en la función usuarios/traer_usuario.' ); 
				} 
			}); 
		}else{ 
			load_form( accion ); 
		} 
	};

		function load_form( accion ){ 
		$( "#div_form" ).dialog({ 
		    autoOpen  : true, 
		    width     : 600, 
		    title     : accion + ' Empresario', 
		    "position": ['middle',70], 
		    modal     : true, 
		    resizable : false, 
		    buttons   : { 
		        "Cancelar": function() { 
		            $( "#div_form" ).dialog( "close" ); 
		        }, 
		        "Guardar": function(){ 
		    		save_form(); 
		    	} 
		    }, 
		    open: function(){}, 
		    close: function(){} 
		}); 
	};// --------------- 

	function save_form(){ 
		$.ajax({ 
			url      : 'index.php/crud/save_form', 
			type     : 'post', 
			dataType : 'json', 
			data     : $('#my_form').serialize(), 
			beforeSend : function(){ 
				$('#msj_form').html( img + ' Espere...' ); 
			}, 
			success : function(data){ 
				$('#msj_form').empty(); 
				if( data.type==false ){ 
					dialogo( 'Notificación', data.message ); 
				}else{ 
					$('#div_form').dialog('close'); 
					traer_lista(); 
	
					setTimeout(function(){  
						alerta(data.message, true);  
						$('tr[tabindex="2014'+data.id_usuario+'"]').focus(); 
					}, -1000); 
				} 
			}, 
			error : function(){ 
				$('#msj_form').empty(); dialogo( 'Error', 'Error en la función usuarios/save_form.' ); 
			} 
		}); 
	}; 
	function confirm_delete( idempresario ){ 
		$('.notify').html( '¿Confirma que desea eliminar este empresario?' ); 
		$( "#dialogo" ).dialog({ 
		    autoOpen  : true, 
		    width     : 400, 
		    title     : 'Confirmación', 
		    "position": ['middle',70], 
		    modal     : true, 
		    resizable : false, 
		    buttons   : { 
		        "Cancelar": function() { 
		            $( "#dialogo" ).dialog( "close" ); 
		        }, 
		        "Eliminar": function(){ 
		        	$( "#dialogo" ).dialog( "close" ); 
		        	delete_( idempresario ); 
		        } 
		    }, 
		    open: function(){}, 
		    close: function(){} 
		}); 
	};// -------------------------- 
function delete_( idempresario ){ 
		$.ajax({ 
			url      : 'index.php/crud/delete', 
			type     : 'post', 
			dataType : 'json', 
			data     : { idempresario : idempresario },  
			success : function( data ){ 
				if( data.type==false ){ 
				dialogo( 'Notificación', data.message ); 
				}else{ 
					$( "#dialogo" ).dialog( "close" ); 
					setTimeout(function(){ alerta( data.message, true ); }, -1000); 
					traer_lista(); 
				} 
			}, 
			error : function(){ 
				//dialogo( 'Error', 'Error en la función usuarios/delete_.' ); 
			} 
		}); 
	} 
</script> 
 
<style> 
	.red { color: red; min-height: 30px } 
	.completa { width: 100% } 
	.hide_ { display: none } 
	table td { padding: 5px } 
	table td i { margin: 5px } 
</style>