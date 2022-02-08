<div id="preloader" class="preloader">
    <div class="logo">
        <?php svg_embed('preloader1.svg') ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", e => {

        let preLoader = document.getElementById('preloader');
        let logo = preLoader.querySelectorAll('.logo .act');
        let loaded = false;
        window.addEventListener('DOMContentLoaded', preloadStart);
        window.addEventListener('load', e => loaded = true);
        function preloadStart() {
            let c = 0;
            let interval = setInterval(function () {
                logo[c].classList.toggle('op');
                c++;
                if (c >= logo.length) {
                    c = 0;
                    clearInterval(interval);
                    loaded ?
                        setTimeout(e=>{domLoaded()},1000) :
                        setTimeout(e=>{logo.forEach(l=>l.classList.remove('op'));
                        preloadStart()},700);
                }
            },90);
        }
        function domLoaded() {
            preLoader.classList.add('opacity');
            document.querySelectorAll('main, header').forEach(e => e.style.opacity = '');
            setTimeout(e => preLoader.classList.add('none'), 1000)
        }

    });
</script>