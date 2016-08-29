
    <?php
       $id_cliente=$_GET['idcl'];
       $id_campana=$_GET['idc'];
       $grabacion=$_GET['graba'];
       $fonocontacto=$_GET['fc'];
    	require_once '../../ppal/superior.php';
		$dc=new Cobranzas();
                Campanas::getCampana($id_campana);
   $datos_cliente= $dc->getCliente($id_cliente, $_SESSION['bd'], $_SESSION['tabla'],'id_cartera');
    ?>
<div class="container">
      <div class="panel panel-default panel-danger">
        <!-- Default panel contents -->
        <div class="panel-heading"><?php if(isset($_SESSION['campana'])); echo "<b>Campaña: ".$_SESSION['campana']."</b> -" ?> Adicionales</div>

        <!-- Table -->
        <table class="table">
            <tr> 
                <td>Carta Abogado</td> <td><?php echo $datos_cliente['cartaabogado'] ?></td>
                <td>Pie 0</td><td><?php echo $datos_cliente['pie0'] ?></td>
                <td>Origen</td><td><?php  ?></td>
                <td>Sponsor</td>
                <td>
                    <b>
                        <?php 
                        if($datos_cliente['dmprod']==1){
                            echo 'DIN';
                        }
                        else{
                            echo 'ABC';
                        }
                        ?>
                    </b>
                </td>
                <td>Cliente Ambas Cadenas</td><td><b><?php echo $datos_cliente['u6ctaacad'] ?></b></td>
                    
            </tr>
            <tr>
                <td>Juicio</td><td><?php echo $datos_cliente['juicio'] ?></td>
                <td>Rol</td><td><?php echo $datos_cliente['rol'] ?></td>
                <td>Juzgado</td><td><?php echo $datos_cliente['juzgado'] ?></td>
            </tr>
        </table>
      </div>
     <div class="panel panel-default panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading"><?php if(isset($_SESSION['campana'])); echo "<b>Campaña: ".$_SESSION['campana']."</b> -" ?> Datos Cliente</div>

        <!-- Table -->
        <table class="table">
            <tr>
                <td>Numero de cuenta</td><td><b><?php echo $datos_cliente['dmacct'] ?></b></td>
            </tr>
            <tr>
                <td>Nombre</td><td><b><?php echo $datos_cliente['dmname'] ?></b></td>
                <td>Rut</td><td><b><?php echo $datos_cliente['dmssnum'] ?></b></td>
                <td>Fecha de Nacimiento</td><td><?php echo $datos_cliente['u6fecnac'] ?></td>
            </tr>
            <tr>
                <td>Estado Civil</td><td><?php echo $datos_cliente['u6estciv'] ?></td>
                <td>Sexo</td><td><?php echo $datos_cliente['u6sexo'] ?></td>
            </tr>
            <tr>
                <td>Direccion</td><td><?php echo $datos_cliente['dmaddr1'] ?></td>
                <td>Villa/Pob</td><td><?php echo $datos_cliente['dmaddr2'] ?></td>
                <td>Comuna</td><td><?php echo $datos_cliente['u6desccomu'] ?></td>
                <td>Ciudad</td><td><?php echo $datos_cliente['dmcity'] ?></td>
            </tr>
            <tr>
                <td>Region</td><td></td>
                <td>Codigo Postal</td><td><?php echo $datos_cliente['dmzip'] ?></td>
                <td>Correo electronico</td><td><?php echo $datos_cliente['u6mailper'] ?></td>
            </tr>
        </table>
      </div>
      <div class="panel panel-default panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading"><?php if(isset($_SESSION['campana'])); echo "<b>Campaña: ".$_SESSION['campana']."</b> -" ?> Datos Deuda</div>
        <table class="table">
            <tr>
                  <td>Fecha Ultimo Compromiso</td>
                  <td><b><?php echo $datos_cliente['dmppmade']  ?></b></td>
                  <td>Origen Plan Credito</td>
                  <td>
                      <b><?php $datos_cliente['u6orplanc'].' ';
                            if($datos_cliente['u6orplanc'] ==3 ){
                                echo "Refinanciado";
                            }else{
                                echo 'Normal';
                            }
                            ?>
                      </b></td>
              </tr>
            <tr>
                <td>Dias de atraso</td><td><b><?php echo $datos_cliente['dmdays'] ?></b></td>
                <td>Dias de atraso a la fecha </td><td><b><?php echo $datos_cliente['dmdays']+date('d') ?></b></td>
                <td>Tramo mora</td><td><b><?php echo $datos_cliente['u6trammor'] ?></b></td>
                <td>Ultimo Pago</td><td><b><?php echo number_format($datos_cliente['dmpayamt']) ?></b></td>
                <td>Fecha Ultimo pago</td><td><b><?php echo $datos_cliente['dmpaydt'] ?></b></td>
                <td>Cupo disponible</td><td><b><?php echo number_format($datos_cliente['u6cupodisp']) ?></b></td>
            </tr>
             <tr>
                <td>Comportamiento cliente</td><td><b><?php echo $datos_cliente['u6scrbehavio'] ?></b></td>
                <td>Campa&ntilde;a</td><td><b><?php echo $datos_cliente['u6codcam'] ?></b></td>
            </tr>
            <tr>
                <td>Monto deuda</td><td><b><?php echo number_format($datos_cliente['dmcurbal']) ?></b></td>
                <td>Cargos por mora</td><td><b><?php echo number_format($datos_cliente['u6carxtrve']) ?></b></td>
                <td>Gastos Cobranza</td><td><b><?php echo number_format($datos_cliente['u6gastcob']) ?></b></td>
                <td>Interes X mora</td><td><b><?php echo number_format($datos_cliente['u6intxmora']) ?></b></td>
                <td>Otros cargos</td><td><b><?php echo number_format($datos_cliente['u6otrcarv']) ?></b></td>
                <td>Total Vencido</td><td><b><?php echo number_format($datos_cliente['u6deuvenc'])  ?></b></td>
            </tr>
             <tr>
                <td>Deuda X Vencer</td><td><b><?php echo number_format($datos_cliente['u6mondeuxven']) ?></b></td>
                <td>Cargos por mora x vencer</td><td><b><?php echo number_format($datos_cliente['u6carxtrxv']) ?></b></td>
                <td>Otros Cargos X vencer</td><td><b><?php echo number_format($datos_cliente['u6carxven']) ?></b></td>
                <td>Total X vencer</td><td><b><?php echo number_format($datos_cliente['u6tdeuxven'])  ?></b></td>
            </tr>
            <tr>
                <td>Deuda Facturada</td><td><b><?php echo number_format($datos_cliente['dmpayoff']) ?></b></td>
                <td>% PIE Refinanciamiento</td><td><b><?php echo number_format($datos_cliente['u6conrepie']) ?></b></td>
                <td>Pie Refinanciamiento</td><td><b><?php echo number_format(($datos_cliente['u6conrepie']*$datos_cliente['dmpayoff'])/100,0) ;?></b></td>
            </tr>
        </table>
      </div>
      <div class="panel panel-default panel-warning">
        <!-- Default panel contents -->
        <div class="panel-heading">Calificacion Gestion</div>

        <!-- Table -->
        <form id="gestiones" method="post">
        <table class="table">
            <tr>
                <td>
                    <div class="container">
                        <div class="row">
                            <div class='col-sm-6'>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Comentario</span>
                                        <textarea name="comentario" class="form-control"></textarea>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" hidden="hidden" id="idcliente" style="display:none" name="idcliente" class="form-control" value="<?php echo $datos_cliente['id_cartera']  ?>">
                                        <input type="text" hidden="hidden" style="display:none" name="agente" class="form-control" value="<?php echo $_GET['agente']  ?>">
                                        <input type="text" hidden="hidden" style="display:none" name="fc" class="form-control" value="<?php echo $_GET['fc']  ?>">
                                        <input type="text" hidden="hidden" style="display:none" name="grabacion" class="form-control" value="<?php echo $_GET['graba']  ?>">
                                        
                                        </div>
                                    <div class='input-group date' id='datetimepicker2'>
                                        <span class="input-group-addon">
                                            Compromiso Pago
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                        <input type='text' name="fec_com_pago" class="form-control" />
                                
                                    </div>
                                     <div class="input-group">
                                         <input type="button" id="editfono" class="btn btn-info" value="Ver Telefonos" onclick="telefonos(<?php echo $id_cliente ?>)">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </td>
            </tr>
            <div class="form-group">
                <div class="input-group">
            <tr>
                <td ><select id="primer_select" name="rrr" class="btn btn-info col-sm-4" >
                        <option value="0" selected="">Seleccione Opcion</option>
                        <?php 
                           echo  $dc->traer_codigos('callcenter','resp_rapida_accion','group by accion','accion','id_resp_rapida_accion')
                        ?>
                             
                    </select>
                        <select id="segundo_select" name="segundo_select" class="btn btn-info">
                            <option value="0" selected="">Seleccione Opcion</option>
                        </select>
                    <select  id="tercero_select" name="rrs" class="btn btn-info">
                        <option value="0" selected="">Seleccione Opcion</option>
                    </select></td>
                    
                        
            </tr>
                </div>
            </div>
            <tr><td ><div class="btn-group-lg" role="group" aria-label="...">
                        <button onclick="window.close();" type="button" id="btn_guardar" class="btn btn-default ">Guardar</button>
                    </div></td></tr>
        </table>
      </form>
      </div>
                    <div class="panel panel-danger">
                        <div class="panel-heading">Gestiones Anteriores</div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td><b>Fecha Gestion</b></td>
                                    <td><b>Operador</b></td>
                                    <td><b>Comentario</b></td>
                                    <td><b>Gestion</b></td>
                                    <td><b>Clasificacion</b></td>
                                    <td><b>Telefono Contacto</b></td>
                            </tr>
                                    <?php  $recorrido_cliente=$dc->getCliente_historico($id_cliente, $_SESSION['bd'], 'historico_gestion','cartera_id_cartera');?>
                            </table>
                        </div>
                    </div>
                    </div>
    <?php
                        require_once __ROOT__.MODULO_ppal_req."/footer.php"; 
    ?>
    
  