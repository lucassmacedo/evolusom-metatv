<iframe src="http://192.168.1.160/index.php?l=dashboard#painel_5"
        frameborder="0"
        width="100%" height="100%"></iframe>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

<script>

  // iframe load
  $(document).ready(function () {
    $('iframe').on('load', function () {
      $('input [name="login"]').val(11);
    });
  });
</script>
