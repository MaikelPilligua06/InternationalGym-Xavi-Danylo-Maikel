<footer class="tn-footer" id="contacto">
    <div class="tn-container tn-footer__grid">
        <div class="tn-footer__col">
            <div class="tn-footer__brand">
                <span class="tn-brand__mark" aria-hidden="true">TN</span>
                <a class="tn-brand" href="index.php?controller=Resumen&action=index">
                <div>
                    <strong>InternationalGym</strong>
                    <p>Entrena con método, tecnología y constancia.</p>
                </div>
                </a>
            </div>

            <ul class="tn-footer__meta">
                <li><span class="tn-dot"></span> Av. d'Eduard Maristany, 59, 08930 Sant Adrià de Besòs, Barcelona, España</li>
                <li><span class="tn-dot"></span> +34 631004556</li>
                <li><span class="tn-dot"></span> internationalgym@institutmvm.cat</li>
            </ul>
        </div>

        <div class="tn-footer__col">
            <h4>Secciones</h4>
            <a href="#programas">Programas</a>
            <a href="#horarios">Horarios</a>
            <a href="#tarifas">Tarifas</a>
            <a href="#contacto">Contacto</a>
        </div>

        <div class="tn-footer__col">
            <h4>Legal</h4>
            <a href="#privacidad">Privacidad</a>
            <a href="#cookies">Cookies</a>
            <a href="#terminos">Términos</a>
        </div>

        <div class="tn-footer__col">
            <h4>Newsletter</h4>
            <p class="tn-footer__hint">Recibe ofertas y novedades (0 spam).</p>
            <form class="tn-newsletter" action="#" method="post">
                <label class="sr-only" for="tn-email">Email</label>
                <input id="tn-email" name="email" type="email" placeholder="tu@email.com" required>
                <button type="submit" class="tn-btn tn-btn--primary">Unirme</button>
            </form>

            <div class="tn-social">
                <a href="#" aria-label="Instagram">IG</a>
                <a href="#" aria-label="TikTok">TT</a>
                <a href="#" aria-label="YouTube">YT</a>
            </div>
        </div>
    </div>

    <div class="tn-container tn-footer__bottom">
        <p>© <span id="tn-year"></span> InternationalGym. Todos los derechos reservados.</p>
        <a class="tn-top" href="#" aria-label="Volver arriba">↑</a>
    </div>
</footer>
<script>
    document.getElementById("tn-year").textContent = new Date().getFullYear();
</script>