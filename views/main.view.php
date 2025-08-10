<?php 
require "partials/nav.php";
?>
  <div class="index-first-section">
    <div class="index-frame16">
      <span class="index-text13"><span>Our Blog</span></span>
    </div>
    <div class="index-frame17">
      <span class="index-text15">
        <span class="index-text16">Discover Engaging Content on </span>
        <span>(CMS) Blog Site</span>
      </span>
    </div>
    <div class="index-frame18">
      <span class="index-text18">
        <span>Whether you're seeking expert advice, inspiration, or entertainment, you'll find it all here.</span>
      </span>
    </div>
  </div>
  <div class="index-main-content">
  <div class="index-intro">
    <span class="index-text20">
      <span>Top 4 Stories You Might Like</span>
    </span>
  </div>
        <?php 
          displayTopFourBlogs($mydb);
        ?>
  </div>

<?php require "partials/footer.php"; ?>
