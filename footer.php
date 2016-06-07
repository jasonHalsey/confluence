<footer class="footer">
  <div class="row">
    
    <div class="small-12 medium-3  columns">
      <p class="footer_logo hide-for-small-only"><i class="icon-solo_shield"></i>Confluence Fly Shop</p> 
      <p class="footer_logo show-for-small-only"><i class="icon-reel_icon"></i> Confluence</p> 
<!--       <p class="footer-links">
        <a href="#">Home</a>
        <a href="#">Blog</a>
        <a href="#">Fishing Reports</a>
        <a href="#">Contact</a>
      </p> -->
      <ul class="inline-list social">
        <a href="#"><i class="icon-facebook"></i></a>
        <a href="#"><i class="icon-twitter"></i></a>
        <a href="#"><i class="icon-instagram"></i></a>
      </ul>
      <p class="copywrite">&copy; Confluence Fly Shop <?php echo date("Y"); ?></p>
    </div>



    <div class="small-12 medium-3 columns drop-col hours-block">
      <p class="hours-title">Shop Hours</p> 
      <p id="hr_1" class="hour-links">
        <?php echo $GLOBALS['hours_line_1'] ?>
      </p>
      <?php $hr_line2 = $GLOBALS['hours_line_2'];
            if( !empty( $hr_line2 ) ): ?>
        <p class="hour-links">
          <?php echo $GLOBALS['hours_line_2'] ?>
        </p>
      <?php endif; ?>
      <?php $hr_line3 = $GLOBALS['hours_line_3'];
            if( !empty( $hr_line3 ) ): ?>
        <p class="hour-links">
           <?php echo $GLOBALS['hours_line_3'] ?>
        </p>
       <?php endif; ?>
    </div>

    <div class="small-12 medium-3 drop-col columns">
      <p class="hours-title">Shop Address</p> 
      <p class="hour-links">
      375 SW Powerhouse Dr Suite 100<br />Bend, OR 97702
      </p>
      <p class="hours-title">Shop Phone</p> 
      <p class="hour-links">
        <?php echo $GLOBALS['phone_number'] ?>
      </p>
    </div>

    <div class="small-12 medium-3 drop-col columns">
      
      <form class="footer-form">
        <div class="row">
          <div class="medium-9 medium-push-3 columns">
           <p class="hours-title">Newsletter Sign-Up</p> 
            <label>
              <input type="email" id="email" placeholder="Email Address" />
            </label>
          </div>
        </div>
          <div class="row">
            <div class="medium-9 medium-push-3 columns">
              <button class="submit" type="submit" value="Submit">Send</button>
            </div>
          </div>
        </div>
      </form>
    </div>



  </div>
  <a href="#0" class="cd-top icon-circle-up"></a>
</footer>

  
<?php wp_footer(); ?>
</body>
<link href='https://api.tiles.mapbox.com/mapbox.js/v2.2.4/mapbox.css' rel='stylesheet' />
</html>