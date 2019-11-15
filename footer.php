	
				</div>
			</div>
			<!-- Main -->

			<!-- Sidebar -->
			<div id="sidebar">
				<div class="inner">
					<a href="index.php"><img src="public/img/privalta_logo.png" width="220" alt="" /></a>
					<!-- Login -->
					<?php if (!isset($_SESSION['loggedin'])) { ?>
					<section id="search" class="alt">
						<?php
							echo '<form method="post" action="login.php">';
							echo '<input type="text" name="correo" id="correo" placeholder="Email" />';
							echo '<input type="password" name="password" id="password" placeholder="Contrase&ntilde;a" />';
							echo '<button type="submit">Login</button>';
							echo '</form>';
						?>
					</section>
					<?php } ?>
					<!-- Login -->

					<?php if (isset($_SESSION['loggedin'])) { ?>
					<!-- Menu -->
					<nav id="menu">
						<header class="major">
							<h2>Menu</h2>
						</header>
						<ul>
							<li><a href="index.php">Inicio</a></li>
							<li><a href="transparencia.php">Cuentas Claras</a></li>
							<li><a href="mesas.php">Mesas de Trabajo</a></li>
							<li><a href="avisos.php">Avisos</a></li>
							<li><a href="concursos.php">Concursos y Proveedores</a></li>
							<li><a href="convocatorias.php">Convocatorias</a></li>
							<li><a href="asambleas.php">Asambleas</a></li>
							<!--<li><a href="#">Participa (Propuestas)</a></li>-->
							<!--<li><a href="reportes.php">Reportes Hist&oacute;rico</a></li>-->
							<li><a href="procedimientos.php">Nuevos Vecin@s (Procedimientos)</a></li>
							<li><a href="links.php">Links de Inter&eacute;s</a></li>
						</ul>
					</nav>
					<!-- Menu -->
					<?php } ?>

					<!-- Contacto -->
					<section>
						<header class="major">
							<h2>Contacto</h2>
						</header>
						<p>¡Escribenos, queremos escucharte!</p>
						<ul class="contact">
							<li class="icon solid fa-envelope"><a href="mailto:comite@privalta.mx">comite@privalta.mx</a></li>
							<li class="icon solid fa-phone">(000) 000-0000</li>
							<li class="icon solid fa-home">Av Az&uacute;car 107, Granjas M&eacute;xico, 08400 Ciudad de M&eacute;xico, CDMX</li>
						</ul>
					</section>
					<!-- Contacto -->

					<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Comit&eacute; PRIVALTA 2019, Todos los derechos reservados.
							<a href="versiones.php">Ver 1.0</a>
						</p><br>
					</footer>

				</div>
			</div>
			<!-- Sidebar -->

		</div>
		<!-- Wrapper -->

		<!-- Scripts -->
		<!--script src="public/assets/js/jquery.min.js"></script>-->
		<script src="public/assets/js/browser.min.js"></script>
		<script src="public/assets/js/breakpoints.min.js"></script>
		<script src="public/assets/js/util.js"></script>
		<script src="public/assets/js/main.js"></script>
	</body>
</html>