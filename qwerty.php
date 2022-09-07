<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<a id="detailed">LINK</a>
<div id="main">Hello - This is my main Div that will be reloaded using Jquery.</div>
<script type="text/javascript" language="javascript">
$(document).ready(function() { /// Wait till page is loaded
   $('#detailed').click(function(){
      $('#main').load('property-detailed.php #main', function() {
           /// can add another function here
      });
   });
}); //// End of Wait till page is loaded
</script>