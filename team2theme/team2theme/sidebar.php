      <div id="site_content">
      <div id="banner"></div>
	  <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
		  
          <div class="sidebar_item">
            <!-- insert your sidebar items here -->
            <h3>Fuel Price</h3>

            <p>AUD 1.36/litre</p>
			<?php edit_post_link(); ?>
			<?php wp_link_pages(); ?> 
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item1">
            <h3>For Appointment</h3>
			
			<input type="submit"  name="submit" value="Book Now">
			<?php edit_post_link(); ?>
			<?php wp_link_pages(); ?> 
            
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item1">
            <h3>Search</h3>
            <form method="post" action="#" id="search_form">
              <p>
                <input class="search" type="text" name="search_field" value="Enter keywords....." />
                <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
              </p>
            </form>
          </div>
          <div class="sidebar_base"></div>
        </div>
      </div>