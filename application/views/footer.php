  <footer class="footer full-color" style=" font-weight: normal; background-color: gray; height: 30px; position: fixed; bottom: 0; width:100%; " >
            <div class="copyright col-md-6">
                            © 2018 Univeristas Ekasakti BY Pustikom ICT 
           </div>
        </footer>

        <!-- Javascript -->
        
        <script type="text/javascript" src="<?= base_url('/asset/home') ?>/javascript/jquery.easing.js"></script>
        <script type="text/javascript" src="<?= base_url('/asset/home') ?>/javascript/owl.carousel.js"></script>
        <script type="text/javascript" src="<?= base_url('/asset/home') ?>/javascript/parallax.js"></script>
        <script type="text/javascript" src="<?= base_url('/asset/home') ?>/javascript/jquery.tweet.min.js"></script>
        <script type="text/javascript" src="<?= base_url('/asset/home') ?>/javascript/jquery.matchHeight-min.js"></script>
        <script type="text/javascript" src="<?= base_url('/asset/home') ?>/javascript/jquery-validate.js"></script> 
        <script type="text/javascript" src="<?= base_url('/asset/home') ?>/javascript/jquery-waypoints.js"></script>

        <script>
        $(window).bind("load resize slid.bs.carousel", function() {
  var imageHeight = $(".active .holder").height();
  $(".controllers").height( imageHeight );
  console.log("Slid");
});



$(document).ready(function(){
  $(".flat-ev-carousel").owlCarousel({
dots:false,
dotData :false  
      
      
  });

});
        </script>
        
    
        <script src="<?= base_url('/asset/home') ?>/javascript/jquery.touchSwipe.min.js"></script>
        

        <!-- Bootstrap bootstrap-touch-slider Slider Main JS File -->
        <script src="<?= base_url('/asset/home') ?>/javascript/bootstrap-touch-slider.js"></script>
        
        <script type="text/javascript">
            $('#bootstrap-touch-slider').bsTouchSlider();
            
            function playMain(){
            
            alert(this.src);
            }
        </script>        
        <script type="text/javascript" src="<?= base_url('/asset/home') ?>/javascript/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?= base_url('/asset/home') ?>/javascript/main.js"></script>
    </div>
</body>
</html>