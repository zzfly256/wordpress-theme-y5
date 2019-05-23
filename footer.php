<footer>
    By烟花易冷 © 2012 - 2019
    <span>
                Powered by WP && Designed by Rytia
    </span>
</footer>
</div>



</div>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>

<script type="text/javascript">
    $(document).pjax('a', '#main', {fragment:'#main', timeout:8000});
    $(document).on('pjax:send', function() {
        $('#main').css("opacity","0.7");
    })
    $(document).on('pjax:complete', function() {
        $('#main').css("opacity","1");
    })
</script>

</body>
</html>