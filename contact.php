<?php
/*
Template Name: contact
*/
get_header(); ?>

<?php 
  foreach(get_images_src('large','false') as $k => $i){
    echo '<section class="interior_hero contact_archive_hero" style="background-image:url('.$i[0].');">';
    }
?>

</section>

<div class="row">

  <div class="large-8 medium-8 columns">
    <div class="row">
      <div class="large-6 columns">
      This is the new row #1
      </div>
      <div class="large-6 columns">
        <h2>Form</h2>
        <form>
          <div class="row">
            <div class="large-12 columns">
              <label>Input Label</label>
              <input type="text" placeholder="large-12.columns" />
            </div>
          </div>
          <div class="row">
            <div class="large-4 medium-4 columns">
              <label>Input Label</label>
              <input type="text" placeholder="large-4.columns" />
            </div>
            <div class="large-4 medium-4 columns">
              <label>Input Label</label>
              <input type="text" placeholder="large-4.columns" />
            </div>
            <div class="large-4 medium-4 columns">
              <div class="row collapse">
                <label>Input Label</label>
                <div class="input-group">
                  <input type="text" placeholder="small-9.columns" class="input-group-field" />
                  <span class="input-group-label">.com</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <label>Select Box</label>
              <select>
                <option value="husker">Husker</option>
                <option value="starbuck">Starbuck</option>
                <option value="hotdog">Hot Dog</option>
                <option value="apollo">Apollo</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="large-6 medium-6 columns">
              <label>Choose Your Favorite</label>
              <input type="radio" name="pokemon" value="Red" id="pokemonRed"><label for="pokemonRed">Radio 1</label>
              <input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Radio 2</label>
            </div>
            <div class="large-6 medium-6 columns">
              <label>Check these out</label>
              <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
              <input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
              <label>Textarea Label</label>
              <textarea placeholder="small-12.columns"></textarea>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="large-12 columns contact_map_container">
          <div id="map_shop_block">
            <?php include(locate_template('inc/contact_map.php'));?>
          </div><!-- End feed_block -->
      </div><!-- End large-12 -->
    </div><!-- End row -->
  </div><!-- End large-8 -->



  <div class="large-4 medium-4 columns">
    <h4>Upcoming Events</h4>
    <div class="callout">
      <?php echo do_shortcode("[ai1ec view='agenda']"); ?>
    </div><!-- End callout -->
    <h4>Reviews</h4>
      <div id='yelpwidget' class="callout">
      </div><!-- End yelpwidget -->
  </div><!-- End large-4 -->

</div><!-- End row -->


<?php get_footer(); ?>
