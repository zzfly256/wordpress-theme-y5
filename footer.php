<footer>
    By烟花易冷 © 2012 - 2022
    <span>
                Powered by WP && Designed by Rytia
    </span>
</footer>
</div>



</div>
<script src="//lib.baomitu.com/jquery/1.12.4/jquery.min.js"></script>
<script src="//lib.baomitu.com/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="//cdn.staticfile.org/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>

<script type="text/javascript">
    $(document).pjax('a', '#main', {fragment:'#main', timeout:8000});
    $(document).on('pjax:send', function() {
        $('#loading').show();
    })
    $(document).on('pjax:complete', function() {
        $('#loading').hide();
    })
</script>

</body>
</html>