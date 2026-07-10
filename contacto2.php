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
                  <header class="contact-header">
                      <h2>Contacto</h2>
                      <p>
                          En REAVECO estamos listos para brindarte atención personalizada,
                          asesoría técnica y cotizaciones para tus proyectos.
                      </p>
                  </header>

                  <section class="contact-container">

                      <!-- FORMULARIO -->
                      <div class="contact-form">

                          <h3>Envíanos un mensaje</h3>

                          <form method="post" action="#">

                              <div class="row gtr-50">

                                  <div class="col-6 col-12-small">
                                      <input type="text" name="nombre" placeholder="Nombre completo">
                                  </div>

                                  <div class="col-6 col-12-small">
                                      <input type="email" name="correo" placeholder="Correo electrónico">
                                  </div>

                                  <div class="col-6 col-12-small">
                                      <input type="text" name="telefono" placeholder="Teléfono">
                                  </div>

                                  <div class="col-6 col-12-small">
                                      <input type="text" name="asunto" placeholder="Asunto">
                                  </div>

                                  <div class="col-12">
                                      <textarea name="mensaje"
                                                placeholder="Escribe tu mensaje"
                                                rows="6"></textarea>
                                  </div>

                                  <div class="col-12">
                                      <ul class="actions">
                                          <li>
                                              <input type="submit" value="Enviar mensaje">
                                          </li>
                                      </ul>
                                  </div>

                              </div>

                          </form>

                      </div>

                      <!-- INFORMACIÓN -->
                      <div class="contact-info">

                          <h3>Información de contacto</h3>

                          <div class="contact-item">
                              <h4><i class="fa fa-phone"></i>  Teléfono</h4>
                              <p>229 924 7836</p>
                          </div>

                          <div class="contact-item">
                              <h4><i class="fa fa-mail"></i>  Correo</h4>
                              <p>eucomexventas1@reaveco.com.mx</p>
                          </div>

                          <div class="contact-item">
                              <h4>📍 Dirección</h4>
                              <p>
                                  Avenida Veracruz, Playa La Quebrada 599 esquina,<br>
                                  Col. Playa Linda, 91810 Veracruz, Ver.
                              </p>
                          </div>

                          <div class="contact-item">
                              <h4>🕒 Horario</h4>
                              <p>
                                  Lunes a viernes<br>
                                  8:00 a.m. – 2:00 p.m.<br>
                                  4:00 p.m. – 6:00 p.m.
                              </p>

                              <p>
                                  Sábado<br>
                                  8:00 a.m. – 2:00 p.m.
                              </p>
                          </div>

                      </div>

                  </section>

                  <!-- MAPA -->
                  <section class="contact-map">

                      <h3>Ubicación</h3>

                      <iframe
                          src="https://www.google.com/maps?q=Avenida+Veracruz+Playa+La+Quebrada+599+Veracruz&output=embed"
                          width="100%"
                          height="400"
                          style="border:0;"
                          loading="lazy">
                      </iframe>

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
            /**lkl */


	</body>
</html>