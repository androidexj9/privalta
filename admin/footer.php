
				</div>
			</div>
			<!-- Main -->

			<!-- Sidebar -->
			<div id="sidebar">
				<div class="inner">

					<img src="../public/img/privalta_logo.png" width="250" alt="" />

					<!-- Login -->
					<?php if (!isset($_SESSION['loggedin_admin'])) { ?>
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

					<!-- Menu -->
					<?php if (isset($_SESSION['loggedin_admin'])) { ?>
					<nav id="menu">
						<header class="major">
							<h2>Menu</h2>
						</header>
						<ul>
							<li><a href="index.php">Inicio</a></li>
							<li><a href="admon_usuarios.php">Usuarios</a></li>
							<li><a href="admon_departamentos.php">Departamentos</a></li>
							<li><a href="admon_pagos.php">Pagos</a></li>
							<li><a href="admon_ingresos.php">Ingresos</a></li>
							<li><a href="admon_egresos.php">Egresos</a></li>
							<li><a href="admon_estados_cuenta.php">Estados de Cuenta</a></li>
						</ul>
					</nav>
					<?php } ?>
					<!-- Menu -->

					<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Comit&eacute; PRIVALTA 2019, Todos los derechos reservados.</p>
					</footer>

				</div>
			</div>
			<!-- Sidebar -->

		</div>
		<!-- Wrapper -->	

		<script src="../public/assets/js/browser.min.js"></script>
		<script src="../public/assets/js/breakpoints.min.js"></script>
		<script src="../public/assets/js/util.js"></script>
		<script src="../public/assets/js/main.js"></script>
		
	</body>
</html>