<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Refresh: 0; URL = index.php');
}
?>

<?php require_once("header.php"); ?>

<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>

<!-- Content -->
<section>
	<header class="main">
		<h1>¡Hola nuevo Vecin@!</h1>
	</header>

	<h2 id="reglamento">Reglamento Condominio PRIVALTA</h2>
	<a href="https://drive.google.com/drive/folders/1yCtBEtaGkjGBb5V_Ru0rjqtHIDMgcGfP?usp=sharing">Reglamento Anterior</a>
	<br><br>
	<p><img src="public/img/alert.png" width="32px" /> En proceso: Modificaciones y Actualizaciones al Reglamento Anterior.</p>

	<hr class="major" />

	<h2 id="cuenta">Cuenta Bancaria Condominio PRIVALTA</h2>
	<table>
		<tr>
			<th>Datos Bancarios</th>
			<th>Ejemplo</th>
		</tr>
		<tr>
			<td style="vertical-align: top; width: 50%">
				Banco: SANTANDER<br>
				Titular: Oscar Adolfo S&aacute;nchez Rosas<br>
				CLABE: 014180606130807768<br>
				Cuenta: 60613080776 
			</td>
			<td style="vertical-align: top; width: 50%">
				<a href="public/img/ejemplo_comprobante.png" data-lightbox="image-1" data-title="Ejemplo Comprobante de Pago">
					<img src="public/img/ejemplo_comprobante.png" width="50%" />
				</a>
			</td>
		</tr>
	</table>

	<hr class="major" />

	<h2 id="procedimiento_gas">Contrato de GAS Natural: NATURGY</h2>
	<p>Pasos:<br>
		1.- Verificar con Constructora que la conexi&oacute;n de gas este terminada al 100%.<br>
		2.- Mandar un correo a <a href="puestaenserviciognf@outlook.com">puestaenserviciognf@outlook.com</a> con los siguientes datos:
		Identificaci&oacute;n oficial por ambos lados (INE) de la persona a quien quedar&aacute; el contrato 
		Acta de entrega-recepci&oacute;n proporcionada por la constructora Y datos de contacto (n&uacute;mero telef&oacute;nico y n&uacute;mero de departamento).<br>

		<font style="font-family:georgia,garamond,serif;font-size:14px;font-style:italic;">Nota: En caso de firmar una persona distinta a la que quedar&aacute; el contrato; Enviar INE tambi&eacute;n por ambos lados y carta poder.</font><br>

		3.- La promo-vendedora Mar&iacute;a de <b>Lourdes Armenta</b> se comunicar&aacute; para firma de contrato y se le dar&aacute;n en ese momento $500.00 en efectivo.<br>

		4.- En un lapso de semana y media Rebeca Cedillo se comunicar&aacute; para agendar cita con un Inspector certificado de Naturgy, el cual acudir&aacute; al departamento indicado; Verificar&aacute; que la conexi&oacute;n de gas este en perfectas condiciones y sin fugas. Se le pagar&aacute;n $3,509.00 con tarjeta de D&eacute;bito o Cr&eacute;dito y despu&eacute;s se proceder&aacute; a la liberaci&oacute;n.<br><br>

		<font style="font-family:georgia,garamond,serif;font-size:13px;font-style:italic;">Nota: En caso de que la conexi&oacute;n de gas no este terminada o haya fugas, el inspector no podr&aacute; realizar la liberaci&oacute;n del gas natural; El cond&oacute;mino se tendr&aacute; que poner en contacto con la constructora para que solucione el problema a trav&eacute;s de Arturo Mej&iacute;a. Y  En caso de no hacer el pago con tarjeta, el inspector proporcionar&aacute; al cond&oacute;mino un n&uacute;mero de cuenta para dep&oacute;sito de los $3,509.00 en cualquier Oxxo; Y este regresar&aacute; al d&iacute;a siguiente para la liberaci&oacute;n del gas natural.</font><br><br>

		Tel&eacute;fonos de Contacto:<br>
		Oficinas Jomer: 77 71 02 95 97
    </p>

	<hr class="major" />

	<h2 id="procedimiento_agua">Contrato de AGUA</h2>
	<p>
		La oficina de <b>SACMEX (Sistemas de Aguas de la Ciudad de M&eacute;xico)</b> m&aacute;s cercana se encuentra en Rio Churubusco #264, Col Granjas M&eacute;xico, entre Azafr&aacute;n y Centeno, Tel&eacute;fono 5650-9258.<br><br>

		Para el cambio de nombre de usuario y solicitud de medidor se requieren los siguientes documentos:<br>
		<ul>
			<li>Recibo de agua</li>
			<li>Copia recibo de predial pagado</li>
			<li>Copia de escritura</li>
			<li>Copia de INE del titular</li>
			<li>Carta poder en caso de que el titular no pueda realizar el tr&aacute;mite. (Recomendaci&oacute;n: llevar la carta poder firmada y que se llene seg&uacute;n las indicaciones de la persona que te atienda)</li>
			<li>Copia de INE de testigos y persona que acepta el poder.</li>
		</ul><br>

		El cambi&oacute; de nombre y la solicitud de medidor son dos procesos diferentes, se puede solicitar uno, otro o los dos al mismo tiempo, la ventaja de solicitar los dos a la vez es que los mismos documentos te sirven.<br><br>

		El costo de la instalaci&oacute;n de medidor es de $4,900.00 y se puede diferir hasta en 18 bimestres.
	</p>

	<hr class="major" />

	<h2 id="procedimiento_cfe">Contrato de CFE</h2>
	<p>Pasos:<br>
		1.- Pedir al guardia de seguridad el acceso al &aacute;rea de medidores que se encuentran en el nivel "S" al fondo.<br>
		2.- Identificar tu preparaci&oacute;n y sacarle fotograf&iacute;a al medidor mas pr&oacute;ximo, donde se observe su n&uacute;mero.<br>
		3.- Hablar a <b>CFE</b> al 071 y tener a la mano los siguientes datos:<br>
			<ul>
				<li>Nombre Completo del Titular del servicio</li>
				<li>RFC con homoclave</li>
				<li>CURP</li>
				<li>Dar los siguientes datos:
					<ul>
						<li>Base del medidor redonda</li>
						<li>Cuenta con 5 terminales para un m&aacute;ximo de 100 amperajes pero el servicio es monof&aacute;sico</li>
						<li>El calibre del cableado es 8 en fuente y carga</li>
						<li>Est&aacute; aterrizado</li>
						<li>La distancia entre la base del medidor y el Interruptor es de 20 cent&iacute;metros</li>
					</ul>
				</li>
			</ul>
		4.- CFE te da un folio, el cual tienes que pegar sobre la base de tu preparaci&oacute;n.<br>
		5.- En un lapso de 2 d&iacute;as h&aacute;biles CFE acudir&aacute; a solventar tu solicitud, y el guardia de seguridad le dar&aacute; acceso.
	</p>

	<hr class="major" />

	<h2 id="procedimiento_salones">Contrataci&oacute;n de SALONES</h2>
	<p>PROCEDIMIENTO PARA LA RESERVACION DEL USO DE SALONES DE EVENTOS SOCIALES PRIVALTA<br>
	CAFETAL (SALON 1) Y AZAFRAN (SALON 2)
	<h2 style="color: red">Recuerda vecin@ que los pagos en efectivo solo se permiten para Devoluciones de Salones.</h2>

	Pasos:<br>
	<!--1.- Entrar a la siguiente liga: <a href="www.casandra.com.mx/index.aspx" target="_blank">www.casandra.com.mx/index.aspx</a><br>
	2.- En el men&uacute;, dar clic en servicios y se desplegar&aacute; el icono de reservaciones.<br>
	3.- Elegir el sal&oacute;n de su preferencia y reservarlo.<br>-->

	1.- Entrar a la siguiente liga: <a href="https://calendar.google.com/calendar/b/3?cid=MWVub3JhMXRyc21wZXBidWZmaTk5M2QzODBAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ" target="_blank">Google Calendar</a><br>
	2.- Identificar la disponibilidad del sal&oacute;n de su preferencia y reservarlo, enviando un mensaje por correo al correo del comité de vigilancia: <a href="mailto:comite@privalta.mx">comite@privalta.mx</a> y/o Administraci&oacute;n.<br>
	
	3.- Una vez hecha la reservaci&oacute;n, se cuenta con hasta 7 d&iacute;as h&aacute;biles para realizar el dep&oacute;sito a la <b>cuenta del condominio</b> de la cuota de recuperaci&oacute;n. Posteriormente mandar el comprobante al correo del comité de vigilancia: <a href="mailto:comite@privalta.mx">comite@privalta.mx</a>, De no realizar el depósito en dicho plazo, se proceder&aacute; a la cancelaci&oacute;n de la reservac&oacute;n.<br>
	
	4.- 7 d&iacute;as h&aacute;biles antes del evento se tendr&aacute; que acudir a administraci&oacute;n a entregar el dep&oacute;sito en garant&iacute;a en <b>efectivo</b>, para que esta lo resguarde en su caja chica.<br>
	
	5.- Si el cond&oacute;mino desea cancelar la reservaci&oacute;n del evento, tendr&aacute; hasta esta fecha, de lo contrario la penalizaci&oacute;n ser&aacute; la cuota de recuperaci&oacute;n.<br>

	6.- El d&iacute;a del evento, el personal de <b>Administraci&oacute;n</b> y/o <b>Vigilancia</b> abrir&aacute; el sal&oacute;n; y el cond&oacute;mino tendr&aacute; que verificar que se entrega en optimas condiciones. De no ser as&iacute; deber&aacute; reportarlo inmediatamente a la <b>Administraci&oacute;n</b>.<br><br>

	7.- Una vez terminado el evento, se deber&aacute; entregar limpio y sin daño alguno en sus instalaciones; Lo recibir&aacute; <b>Administraci&oacute;n</b> y/o <b>Comit&eacute; de Vigilancia</b> apoyados en su <b>Mesa de trabajo</b>, a m&aacute;s tardar a las 9 am del d&iacute;a siguiente del evento.<br>
	
	8.- Si todo esta en orden, <b>Administraci&oacute;n</b> entregar&aacute; el dep&oacute;sito en garant&iacute;a en efectivo. De no ser as&iacute; se someter&aacute; a evaluaci&oacute;n de la misma, la cantidad requerida para solucionar el desperfecto.<br><br>

	Banco: SANTANDER<br>
	Titular: Oscar Adolfo S&aacute;nchez Rosas<br>
	CLABE: 014180606130807768<br>
	Cuenta: 60613080776
	</p>
	<table>
		<tr>
			<th></th>
			<th>PRIVALTA</th>
			<th>CAFETAL</th>
			<th>AZAFRAN</th>
		</tr>
		<tr>
			<td>Dep&oacute;sito en garant&iacute;a</td>
			<td>$3,000.00 M.N</td>
			<td>$1,000.00 M.N</td>
			<td>$1,000.00 M.N</td>
		</tr>
		<tr>
			<td>Cuota de recuperaci&oacute;n</td>
			<td>$500.00 M.N</td>
			<td>$250.00 M.N</td>
			<td>$250.00 M.N</td>
		</tr>
	</table>

	<br>
	<iframe src="https://calendar.google.com/calendar/b/3/embed?height=500&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FMexico_City&amp;src=Y29taXRlcHJpdmFsdGFAZ21haWwuY29t&amp;src=MWVub3JhMXRyc21wZXBidWZmaTk5M2QzODBAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=ZXMudXNhI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%2322AA99&amp;color=%239F3501&amp;color=%231F753C&amp;title=Calendario%20PRIVALTA&amp;showNav=1&amp;showTz=0" style="border:solid 1px #777" width="100%" height="500" frameborder="0" scrolling="no"></iframe>
</section>
<!-- Content -->

<?php require_once("footer.php"); ?>