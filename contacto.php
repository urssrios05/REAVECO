<!DOCTYPE HTML>
<html>
    <?php include("includes/head.php"); ?>
	
			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="index.php"><img src="images/logo.png" alt=""></a></h1>
								<span></span>
							</div>

						<!-- Navefacion -->
							<nav id="nav">
								<ul>
									<li><a href="index.php">Inicio</a></li>
 									<li><a href="galeria.php">Galeria</a></li>                                   
									<li><a href="acerca.php">Acerca de nosotros</a></li>
									<li class="current"><a href="contacto.php">Contacto</a></li>
									<li><a href="https://www.eucomex.com.mx/portafolio/productos/" target="_blank" rel="noopener noreferrer">Productos</a></li>
								</ul>
							</nav>

					</header>
				</div>

            			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div id="content">

							<!-- Content -->
								<article>

									<section id="main" class="wrapper style1">
  <div class="container">
    <div id="content">

      <article>
        <header>
          <h2>Contacto</h2>
          <p>
            En REAVECO estamos listos para brindarte atención personalizada,
            asesoría técnica y cotizaciones para tus proyectos.
          </p>
        </header>

        <div class="row">
          <div class="col-6 col-12-medium">
            <section class="box feature">
              <div class="inner">
                <h3>Información de contacto</h3>
                <p><strong>Empresa:</strong> Comercializadora Reaveco S.A. de C.V.</p>
                <p><strong>Teléfono:</strong> 229 924 7836</p>
                <p><strong>Correo:</strong> eucomexventas1@reaveco.com.mx</p>
                <p><strong>Dirección:</strong><br>
                Avenida Veracruz, Playa La Quebrada 599 esquina,<br>
                Col. Playa Linda, 91810 Veracruz, Ver.</p>
              </div>
            </section>
          </div>

          <div class="col-6 col-12-medium">
            <section class="box feature">
              <div class="inner">
                <h3>Horario de atención</h3>
                <p><strong>Lunes a viernes:</strong><br>
                8:00 a.m. – 2:00 p.m.<br>
                4:00 p.m. – 6:00 p.m.</p>

                <p><strong>Sábado:</strong><br>
                8:00 a.m. – 2:00 p.m.</p>

                <p><strong>Domingo:</strong> Cerrado</p>

                <p><strong>Servicio:</strong> Entrega el mismo día</p>
              </div>
            </section>
          </div>
        </div>

        <section class="box feature" style="margin-top: 2em;">
          <div class="inner">
            <h3>Envíanos un mensaje</h3>
            <form method="post" action="#">
              <div class="row gtr-50">
                <div class="col-6 col-12-small">
                  <input type="text" name="nombre" placeholder="Nombre completo" />
                </div>
                <div class="col-6 col-12-small">
                  <input type="email" name="correo" placeholder="Correo electrónico" />
                </div>
                <div class="col-6 col-12-small">
                  <input type="text" name="telefono" placeholder="Teléfono" />
                </div>
                <div class="col-6 col-12-small">
                  <input type="text" name="asunto" placeholder="Asunto" />
                </div>
                <div class="col-12">
                  <textarea name="mensaje" placeholder="Escribe tu mensaje" rows="6"></textarea>
                </div>
                <div class="col-12">
                  <ul class="actions">
                    <li><input type="submit" value="Enviar mensaje" /></li>
                    <li><input type="reset" value="Limpiar" class="alt" /></li>
                  </ul>
                </div>
              </div>
            </form>
          </div>
        </section>

        <section class="box feature" style="margin-top: 2em;">
          <div class="inner">
            <h3>Ubicación</h3>
            <p>Encuéntranos fácilmente en Veracruz:</p>

            <iframe
              src="https://www.google.com/maps?q=Avenida+Veracruz+Playa+La+Quebrada+599+Veracruz&output=embed"
              width="100%"
              height="300"
              style="border:0;"
              allowfullscreen=""
              loading="lazy">
            </iframe>

          </div>
        </section>

      </article>

    </div>
  </div>
</section>

								</article>

						</div>
					</div>
				</div>

			<!-- Footer -->
			 <?php include("includes/footer.php"); ?>
			</div>
            <!-- Scripts --> 
            <?php include("includes/scripts.php"); ?>


	</body>
</html>