<?php get_header(); ?>

    <div class="row">
      <div class="large-12 columns">
        <?php echo do_shortcode("[rev_slider alias='homeSlide']"); ?>
      </div>
    </div>
    
    <div class="row">
      <div class="large-8 medium-8 columns">

      </div>
      
         
          <?php
            $mypost = array( 'post_type' => 'report','orderby' => 'menu_order');
            $loop = new WP_Query( $mypost );
          ?>
          <?php while ( $loop->have_posts() ) : $loop->the_post();?>
             
                <div class="large-4 medium-4 columns"> 
                  <h3><?php the_title(); ?></h3>                     
                  <ul class="species_list">
                    <?php 
                      $balls = get_post_meta( $post->ID, '_cmb2_species_multicheckbox', true );
                      foreach($balls as $term): ?>
                        <li class="<?php echo $term; ?> species_box">
                          <img src="<?php echo bloginfo('template_directory'); ?>/images/species_<?php echo $term?>.jpg " />
                        </li>
                    <?php endforeach; ?>
                  </ul>   
                </div>                 
              
          <?php endwhile; ?>
      </div>
    </div>



    <div class="row">
      <div class="large-8 medium-8 columns">
        <h5>Here&rsquo;s your basic grid:</h5>
        <!-- Grid Example -->

        <div class="row">
          <div class="large-12 columns">
            <div class="primary callout">
              <p><strong>This is a twelve column section in a row.</strong> Each of these includes a div.callout element so you can see where the columns are - it's not required at all for the grid.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="large-6 medium-6 columns">
            <div class="primary callout">
              <p>Six columns</p>
            </div>
          </div>
          <div class="large-6 medium-6 columns">
            <div class="primary callout">
              <p>Six columns</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="large-4 medium-4 small-4 columns">
            <div class="primary callout">
              <p>Four columns</p>
            </div>
          </div>
          <div class="large-4 medium-4 small-4 columns">
            <div class="primary callout">
              <p>Four columns</p>
            </div>
          </div>
          <div class="large-4 medium-4 small-4 columns">
            <div class="primary callout">
              <p>Four columns</p>
            </div>
          </div>
        </div>
        
        <hr />
                
        <h5>We bet you&rsquo;ll need a form somewhere:</h5>
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

      <div class="large-4 medium-4 columns">
        <h5>Try one of these buttons:</h5>
        <p><a href="#" class="button">Simple Button</a><br/>       
        <a href="#" class="success button">Success Btn</a><br/>
        <a href="#" class="alert button">Alert Btn</a><br/>
        <a href="#" class="secondary button">Secondary Btn</a></p>           
        <div class="callout">
          <h5>So many components, girl!</h5>
          <p>A whole kitchen sink of goodies comes with Foundation. Check out the docs to see them all, along with details on making them your own.</p>
          <a href="http://foundation.zurb.com/sites/docs/" class="small button">Go to Foundation Docs</a>          
        </div>
      </div>
    </div>

  </body>
<?php get_footer(); ?>
