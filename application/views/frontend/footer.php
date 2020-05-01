<div class="top_jumparrow" style="display: none;">
    <a title="zur Spitze gehen" href="#top" class="btn btn-default btn-pink"><i class="fa fa-2x fa-angle-up"></i></a>
</div>
<script  src="<?php echo base_url();?>assets/js/jquery-2.2.4.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" ></script>
<!---<script src="<?php echo base_url();?>assets/js/lightbox.min.js" ></script>--->
<script src="<?php echo base_url();?>assets/js/jquery.swipebox.min.js" ></script>
<script type="text/javascript"> 
	$(function () {
		$(window).scroll(function() {
			if($(this).scrollTop() > 76){
				$('.top_jumparrow').fadeIn();
			}
			else {
				$('.top_jumparrow').fadeOut();
			}
		});
		$('.top_jumparrow').click(function() {
			$('body,html').animate({
				scrollTop: 0
			}, 1600);
			return false; 
		});
	});
	
	/*$('.product_item figure a').attr('data-lightbox','rr');*/
	$(function () {
		$('.swipebox').swipebox();
	});
	$(document).ready(function(){
	});
	
	function filter_data(page){
		$("#filter_data").html('<div id="loading"></div>');
		var color1 = $('#color1').val();
		/*var color2 = $('#color2').val();
		var color3 = $('#color3').val();*/
		var design_type = $('#design_type').val();
		
		$.ajax({
			url: '<?php echo base_url()."index.php/home/fetch_data";?>', 
			method:"POST",
			dataType:"JSON",
			data: {color:color1, design_type:design_type},
			success: function(data){
				$('#filter_data').html(data);
				$('.product_item figure a').attr('data-lightbox','rr');
			}
		});
	}
	
	
//Lazy loading
document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages = document.querySelectorAll("img.lazy");    
  var lazyloadThrottleTimeout;
  
  function lazyload () {
    if(lazyloadThrottleTimeout) {
      clearTimeout(lazyloadThrottleTimeout);
    }    
    
    lazyloadThrottleTimeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('lazy');
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
    }, 20);
  }
  
  document.addEventListener("scroll", lazyload);
  window.addEventListener("resize", lazyload);
  window.addEventListener("orientationChange", lazyload);
});
</script>
</body>
</html>