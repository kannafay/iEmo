</body>
  <script src="<?=fileUri()?>/assets/js/theme.js"></script>
  <script src="<?=fileUri()?>/assets/static/nprogress/nprogress.js"></script>
  <script>
    NProgress.start();
    $(document).ready(()=>{
      NProgress.done();
    });
    NProgress.remove();
  </script>
</html>