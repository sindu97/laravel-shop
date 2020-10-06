<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
   <!--Start .................................fome-part-->
<section class="sub-footer mt-50">
  <div class="d2-flex w-70">
    <div class="d3-flex">
      <div class="icon text-green"><i class="fas  fa-globe"></i></div>
      <div class="text">Company Name</div>
    </div>
    <div class="d3-flex">
      <div class="icon text-green"><i class="fas  fa-envelope"></i></div>
      <div class="text">company@gmail.com</div>
    </div>
    <div class="d3-flex">
      <div class="icon text-green"><i class="fas  fa-phone"></i></div>
      <div class="text">+91-9876543210</div>
    </div>
  </div>
</section>
<!-- Start ------------Footer -->
<footer class="ct-footer">
  <div class="container">
       <ul class="ct-footer-list text-center-sm">
         <li>
           <h2 class="ct-footer-list-header">Learn More</h2>
          <img src="<?php echo base_url('public/img') ?>/logo-2.png" alt="logo-2" class="img-responsive">
         </li>
         <li>
           <h2 class="ct-footer-list-header">Services</h2>
           <ul class="ct-bottom">
             <li>
               <a href="">Design</a>
             </li>
             <li>
               <a href="">Marketing</a>
             </li>
             <li>
               <a href="">Sales</a>
             </li>
             <li>
               <a href="">Programming</a>
             </li>
             <li>
               <a href="">Support</a>
             </li>
           </ul>
         </li>
         <li>
           <h2 class="ct-footer-list-header">The Industry</h2>
           <ul class="ct-bottom">
             <li>
               <a href="">Thought Leadership</a>
             </li>
             <li>
               <a href="">Webinars</a>
             </li>
             <li>
               <a href="">Events</a>
             </li>
             <li>
               <a href="">Sponsorships</a>
             </li>
             <li>
               <a href="">Advisors</a>
             </li>
         
           </ul>
         </li>
         <li>
           <h2 class="ct-footer-list-header">Public Relations</h2>
           <ul class="ct-bottom">
             <li>
               <a href="">WebCorpCo Blog</a>
             </li>
             <li>
               <a href="">Hackathons</a>
             </li>
             <li>
               <a href="">Videos</a>
             </li>
             <li>
               <a href="">News Releases</a>
             </li>
             <li>
               <a href="">Newsletters</a>
             </li>
           </ul>
         </li>
         <li>
           <h2 class="ct-footer-list-header">About</h2>
           <ul class="ct-bottom">
             <li>
               <a href="">FAQ</a>
             </li>
             <li>
               <a href="">Our Board</a>
             </li>
             <li>
               <a href="">Our Staff</a>
             </li>
             <li>
               <a href="">Contact Us</a>
             </li>
           </ul>
         </li>
       </ul>
           <div class="footer-content">
               <div class="social-media-icopns">
                 <a href="#"><i class="fab fa-facebook-f"></i></a>
                 <a href="#"><i class="fab fa-twitter"></i></a>
                 <a href="#"><i class="fab fa-linkedin-in"></i></a>
                 <a href="#"><i class="fab fa-behance"></i></a>
                 <a href="#"><i class="fab fa-instagram"></i></a>
               </div>
           </div>
     </div>
     <div class="ct-footer-post">
       <div class="container">
         <div class="inner-left">
           <ul>
             <li>
               <a href="">FAQ</a>
             </li>
             <li>
               <a href="">News</a>
             </li>
             <li>
               <a href="<?php echo base_url('contact-us/'); ?>">Contact Us</a>
             </li>
           </ul>
         </div>
         <div class="inner-right">
           <p><a class="ct-u-motive-color">&copy; <?php echo date("Y"); ?> , All rights reserved.</a></p>
         </div>
       </div>
     </div>
   </footer>
   <!-- End ------------Footer -->
   <script type="text/javascript">
      function base_url(url=""){
         return `<?php echo base_url(); ?>${url}`;
      }
   </script>
 
  
   <script src="<?php echo base_url('public'); ?>/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
   <!-- Custom -->      
   <script src="<?php echo base_url(); ?>public/js/script.js"></script>
    <script src="<?php echo base_url(); ?>public/js/appoint.js"></script>
   <?php echo isset($extra_footer) ? $extra_footer : "" ; ?>
   </body>
</html>