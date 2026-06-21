<!DOCTYPE HTML>
<html>
<?php include("includes/head.php"); ?>

<?php
// ─── Procesamiento del formulario ────────────────────────────────────────────
$mensaje_exito = '';
$mensaje_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar entradas
    $nombre   = htmlspecialchars(trim($_POST['nombre']   ?? ''));
    $correo   = filter_var(trim($_POST['correo']   ?? ''), FILTER_SANITIZE_EMAIL);
    $telefono = htmlspecialchars(trim($_POST['telefono'] ?? ''));
    $asunto   = htmlspecialchars(trim($_POST['asunto']   ?? ''));
    $cuerpo   = htmlspecialchars(trim($_POST['mensaje']  ?? ''));

    // Validación básica
    if (!$nombre || !$correo || !$cuerpo) {
        $mensaje_error = 'Por favor, completa los campos obligatorios (nombre, correo y mensaje).';
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje_error = 'El correo electrónico no es válido.';
    } else {
        // ── Opción A: PHPMailer (recomendado) ─────────────────────────────
        // Requiere: composer require phpmailer/phpmailer
        // Descomenta este bloque y comenta la Opción B si usas PHPMailer.
        /*
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';       // Cambia según tu proveedor
            $mail->SMTPAuth   = true;
            $mail->Username   = 'tu_correo@gmail.com';  // Tu correo SMTP
            $mail->Password   = 'tu_contraseña_app';    // Contraseña de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->CharSet    = 'UTF-8';

            $mail->setFrom($correo, $nombre);
            $mail->addAddress('eucomexventas1@reaveco.com.mx', 'REAVECO');
            $mail->addReplyTo($correo, $nombre);

            $mail->isHTML(true);
            $mail->Subject = "Contacto web: $asunto";
            $mail->Body    = "
                <h3>Nuevo mensaje desde el sitio web</h3>
                <p><strong>Nombre:</strong> $nombre</p>
                <p><strong>Correo:</strong> $correo</p>
                <p><strong>Teléfono:</strong> $telefono</p>
                <p><strong>Asunto:</strong> $asunto</p>
                <hr>
                <p><strong>Mensaje:</strong><br>$cuerpo</p>
            ";
            $mail->AltBody = "Nombre: $nombre\nCorreo: $correo\nTeléfono: $telefono\nAsunto: $asunto\n\n$cuerpo";

            $mail->send();
            $mensaje_exito = '¡Mensaje enviado con éxito! Te contactaremos pronto.';
        } catch (Exception $e) {
            $mensaje_error = 'No se pudo enviar el mensaje. Por favor intenta más tarde.';
        }
        */

        // ── Opción B: mail() nativo de PHP ────────────────────────────────
        // Funciona si tu servidor tiene sendmail configurado.
        $destinatario = 'eucomexventas1@reaveco.com.mx';
        $asunto_mail  = "Contacto web: $asunto";
        $cuerpo_mail  = "Nombre: $nombre\nCorreo: $correo\nTeléfono: $telefono\n\nMensaje:\n$cuerpo";
        $headers      = "From: $correo\r\nReply-To: $correo\r\nContent-Type: text/plain; charset=UTF-8\r\n";

        if (mail($destinatario, $asunto_mail, $cuerpo_mail, $headers)) {
            $mensaje_exito = '¡Mensaje enviado con éxito! Te contactaremos pronto.';
        } else {
            $mensaje_error = 'No se pudo enviar el mensaje. Por favor intenta más tarde.';
        }
    }
}
?>

<style>
/* ── Variables del tema ─────────────────────────────── */
:root {
    --accent:        #e67e22;
    --accent-dark:   #c0620f;
    --accent-light:  #fdebd0;
    --bg-card:       #ffffff;
    --bg-alt:        #f8f5f0;
    --text-main:     #2c2c2c;
    --text-muted:    #666;
    --border:        #e0d8ce;
    --shadow:        0 4px 20px rgba(0,0,0,.08);
    --radius:        10px;
    --transition:    .25s ease;
}

/* ── Sección contacto ───────────────────────────────── */
#contacto-page {
    padding: 3em 0 4em;
    background: var(--bg-alt);
}

#contacto-page h2.page-title {
    font-size: 2em;
    color: var(--text-main);
    margin-bottom: .3em;
}

#contacto-page .page-subtitle {
    color: var(--text-muted);
    font-size: 1.05em;
    margin-bottom: 2.5em;
    max-width: 600px;
}

/* ── Tarjetas de info ───────────────────────────────── */
.contact-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.2em;
    margin-bottom: 2.5em;
}

.contact-card {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 1.5em;
    display: flex;
    align-items: flex-start;
    gap: 1em;
    box-shadow: var(--shadow);
    transition: transform var(--transition), box-shadow var(--transition);
}

.contact-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 28px rgba(0,0,0,.12);
}

.contact-card .icon {
    width: 44px;
    height: 44px;
    background: var(--accent-light);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: var(--accent);
    font-size: 1.1em;
}

.contact-card h4 {
    margin: 0 0 .3em;
    font-size: .85em;
    text-transform: uppercase;
    letter-spacing: .08em;
    color: var(--text-muted);
}

.contact-card p {
    margin: 0;
    color: var(--text-main);
    font-size: .95em;
    line-height: 1.5;
}

.contact-card a {
    color: var(--accent);
    text-decoration: none;
}

.contact-card a:hover { text-decoration: underline; }

/* ── Columnas principales ───────────────────────────── */
.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2em;
    align-items: start;
}

@media (max-width: 768px) {
    .contact-grid { grid-template-columns: 1fr; }
}

/* ── Panel genérico ─────────────────────────────────── */
.contact-panel {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 2em;
    box-shadow: var(--shadow);
}

.contact-panel h3 {
    font-size: 1.15em;
    color: var(--text-main);
    margin-bottom: 1.2em;
    padding-bottom: .6em;
    border-bottom: 2px solid var(--accent-light);
    display: flex;
    align-items: center;
    gap: .5em;
}

.contact-panel h3 i { color: var(--accent); }

/* ── Horario ────────────────────────────────────────── */
.schedule-table { width: 100%; border-collapse: collapse; }
.schedule-table td {
    padding: .5em .3em;
    font-size: .95em;
    border-bottom: 1px solid var(--border);
    color: var(--text-main);
}
.schedule-table td:first-child { font-weight: 600; width: 55%; }
.schedule-table tr:last-child td { border-bottom: none; }
.badge-open {
    display: inline-block;
    background: #e8f5e9;
    color: #2e7d32;
    font-size: .75em;
    padding: .15em .6em;
    border-radius: 20px;
    font-weight: 600;
    margin-left: .4em;
    vertical-align: middle;
}
.badge-closed {
    display: inline-block;
    background: #fce4ec;
    color: #c62828;
    font-size: .75em;
    padding: .15em .6em;
    border-radius: 20px;
    font-weight: 600;
    margin-left: .4em;
    vertical-align: middle;
}

/* ── Formulario ─────────────────────────────────────── */
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1em;
    margin-bottom: 1em;
}

@media (max-width: 500px) {
    .form-row { grid-template-columns: 1fr; }
}

.form-group { display: flex; flex-direction: column; gap: .4em; }
.form-group label {
    font-size: .85em;
    font-weight: 600;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: .05em;
}
.form-group label span.req { color: var(--accent); }

.form-group input,
.form-group textarea {
    width: 100%;
    padding: .75em 1em;
    border: 1.5px solid var(--border);
    border-radius: 7px;
    font-size: .95em;
    color: var(--text-main);
    background: #fafafa;
    transition: border-color var(--transition), box-shadow var(--transition);
    box-sizing: border-box;
    font-family: inherit;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(230,126,34,.15);
    background: #fff;
}

.form-group textarea { resize: vertical; min-height: 130px; }

.btn-enviar {
    display: inline-flex;
    align-items: center;
    gap: .5em;
    background: var(--accent);
    color: #fff;
    border: none;
    border-radius: 7px;
    padding: .85em 2em;
    font-size: 1em;
    font-weight: 700;
    cursor: pointer;
    transition: background var(--transition), transform var(--transition);
    margin-top: .5em;
    letter-spacing: .03em;
}

.btn-enviar:hover {
    background: var(--accent-dark);
    transform: translateY(-2px);
}

/* ── Alertas ────────────────────────────────────────── */
.alert {
    padding: 1em 1.2em;
    border-radius: 8px;
    margin-bottom: 1.5em;
    font-size: .95em;
    display: flex;
    align-items: center;
    gap: .7em;
}
.alert-success { background: #e8f5e9; color: #2e7d32; border-left: 4px solid #43a047; }
.alert-error   { background: #fce4ec; color: #c62828; border-left: 4px solid #e53935; }

/* ── Mapa ───────────────────────────────────────────── */
.map-panel {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    margin-top: 2em;
}

.map-panel h3 {
    font-size: 1.15em;
    color: var(--text-main);
    padding: 1.2em 1.5em .8em;
    margin: 0;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    gap: .5em;
}

.map-panel h3 i { color: var(--accent); }

.map-panel iframe {
    display: block;
    width: 100%;
    height: 360px;
    border: none;
}
</style>

<!-- Header -->
<div id="header-wrapper">
    <header id="header" class="container">
        <div id="logo">
            <h1><a href="index.php"><img src="images/logo.png" alt="REAVECO"></a></h1>
            <span></span>
        </div>
        <nav id="nav">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="galeria.php">Galería</a></li>
                <li><a href="acerca.php">Acerca de nosotros</a></li>
                <li class="current"><a href="contacto.php">Contacto</a></li>
                <li><a href="https://www.eucomex.com.mx/portafolio/productos/">Productos</a></li>
            </ul>
        </nav>
    </header>
</div>

<!-- Contenido principal -->
<div id="main-wrapper">
    <div class="container">
        <div id="contacto-page">

            <h2 class="page-title">Contacto</h2>
            <p class="page-subtitle">
                Estamos listos para brindarte asesoría técnica, atención personalizada
                y cotizaciones para tus proyectos de construcción.
            </p>

            <!-- Alertas de resultado -->
            <?php if ($mensaje_exito): ?>
                <div class="alert alert-success">
                    <i class="fa fa-check-circle"></i> <?= $mensaje_exito ?>
                </div>
            <?php endif; ?>
            <?php if ($mensaje_error): ?>
                <div class="alert alert-error">
                    <i class="fa fa-exclamation-circle"></i> <?= $mensaje_error ?>
                </div>
            <?php endif; ?>

            <!-- Tarjetas de información rápida -->
            <div class="contact-cards">
                <div class="contact-card">
                    <div class="icon"><i class="fa fa-phone"></i></div>
                    <div>
                        <h4>Teléfono</h4>
                        <p><a href="tel:2299247836">229 924 7836</a></p>
                    </div>
                </div>
                <div class="contact-card">
                    <div class="icon"><i class="fa fa-envelope"></i></div>
                    <div>
                        <h4>Correo</h4>
                        <p><a href="mailto:eucomexventas1@reaveco.com.mx">eucomexventas1@reaveco.com.mx</a></p>
                    </div>
                </div>
                <div class="contact-card">
                    <div class="icon"><i class="fa fa-map-marker"></i></div>
                    <div>
                        <h4>Dirección</h4>
                        <p>Av. Veracruz 599, Col. Playa Linda,<br>Veracruz, Ver. 91810</p>
                    </div>
                </div>
                <div class="contact-card">
                    <div class="icon"><i class="fa fa-truck"></i></div>
                    <div>
                        <h4>Entrega</h4>
                        <p>Servicio el mismo día</p>
                    </div>
                </div>
            </div>

            <!-- Grid: formulario + horario -->
            <div class="contact-grid">

                <!-- Formulario -->
                <div class="contact-panel">
                    <h3><i class="fa fa-paper-plane"></i> Envíanos un mensaje</h3>

                    <form method="post" action="contacto.php" novalidate>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Nombre <span class="req">*</span></label>
                                <input type="text" name="nombre"
                                    value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>"
                                    placeholder="Tu nombre completo" required>
                            </div>
                            <div class="form-group">
                                <label>Correo electrónico <span class="req">*</span></label>
                                <input type="email" name="correo"
                                    value="<?= htmlspecialchars($_POST['correo'] ?? '') ?>"
                                    placeholder="tu@correo.com" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="tel" name="telefono"
                                    value="<?= htmlspecialchars($_POST['telefono'] ?? '') ?>"
                                    placeholder="229 000 0000">
                            </div>
                            <div class="form-group">
                                <label>Asunto</label>
                                <input type="text" name="asunto"
                                    value="<?= htmlspecialchars($_POST['asunto'] ?? '') ?>"
                                    placeholder="¿En qué podemos ayudarte?">
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:1em;">
                            <label>Mensaje <span class="req">*</span></label>
                            <textarea name="mensaje" placeholder="Describe tu proyecto o consulta..." required><?= htmlspecialchars($_POST['mensaje'] ?? '') ?></textarea>
                        </div>
                        <button type="submit" class="btn-enviar">
                            <i class="fa fa-paper-plane"></i> Enviar mensaje
                        </button>
                    </form>
                </div>

                <!-- Horario -->
                <div class="contact-panel">
                    <h3><i class="fa fa-clock-o"></i> Horario de atención</h3>
                    <table class="schedule-table">
                        <tr>
                            <td>Lunes – Viernes</td>
                            <td>8:00 – 14:00 &nbsp;/&nbsp; 16:00 – 18:00 <span class="badge-open">Abierto</span></td>
                        </tr>
                        <tr>
                            <td>Sábado</td>
                            <td>8:00 – 14:00 <span class="badge-open">Abierto</span></td>
                        </tr>
                        <tr>
                            <td>Domingo</td>
                            <td><span class="badge-closed">Cerrado</span></td>
                        </tr>
                    </table>

                    <div style="margin-top:2em;">
                        <h3 style="margin-bottom:.8em;"><i class="fa fa-building"></i> Empresa</h3>
                        <p style="color:var(--text-main);font-size:.95em;line-height:1.7;margin:0;">
                            <strong>Comercializadora Reaveco S.A. de C.V.</strong><br>
                            Avenida Veracruz, Playa La Quebrada 599 esquina,<br>
                            Col. Playa Linda, 91810 Veracruz, Ver.
                        </p>
                    </div>

                    <div style="margin-top:2em;">
                        <h3 style="margin-bottom:.8em;"><i class="fa fa-whatsapp"></i> WhatsApp</h3>
                        <a href="https://wa.me/522299247836?text=Hola%2C%20me%20interesa%20obtener%20información%20sobre%20sus%20productos."
                           target="_blank"
                           style="display:inline-flex;align-items:center;gap:.5em;background:#25D366;color:#fff;padding:.7em 1.4em;border-radius:7px;font-weight:700;text-decoration:none;font-size:.95em;transition:background .2s;"
                           onmouseover="this.style.background='#1ebe57'"
                           onmouseout="this.style.background='#25D366'">
                            <i class="fa fa-whatsapp"></i> Escríbenos por WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mapa corregido -->
            <div class="map-panel">
                <h3><i class="fa fa-map-marker"></i> Cómo llegar</h3>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3772.0!2d-96.1477!3d19.1738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c3403eeeeaaaab%3A0x0!2sAv.+Veracruz+599%2C+Playa+Linda%2C+91810+Veracruz%2C+Ver.!5e0!3m2!1ses!2smx!4v1"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Ubicación de REAVECO en Veracruz">
                </iframe>
            </div>

        </div><!-- /#contacto-page -->
    </div><!-- /.container -->
</div><!-- /#main-wrapper -->

<!-- Footer -->
<?php include("includes/footer.php"); ?>

<!-- Scripts -->
<?php include("includes/scripts.php"); ?>
</body>
</html>