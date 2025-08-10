<?php require "partials/nav.php"; ?>
<div class="index-first-section">
    <div style="margin-top: 1%; margin-bottom: 1%;" class="index-frame17">
        <span class="index-text15">
        <span class="index-text16">Collection</span>
        </span>
    </div>
    <div style="max-width: 70%" class="index-frame18">
        <span  class="index-text18">
        <span>Welcome to our Collection page, where you'll discover a curated selection of captivating content from our diverse community of creators.</span>
        </span>
    </div>
    <div class="filter-subnav d-flex justify-content-between">
      <div class="d-flex">
        <select name="" id="">
            <option value="">Popular</option>
            <option value="">Latest</option>
        </select>
      </div>
      <div class="filter-subnav-cat d-flex">
        <button class="sub-nav-button" data-category="Technology">Technology</button>
        <button class="sub-nav-button" data-category="Travel">Travel</button>
        <button class="sub-nav-button" data-category="Health and Wellness">Health and Wellness</button>
        <button class="sub-nav-button" data-category="Nature and Environment">Nature and Environment</button>
        <button class="sub-nav-button" data-category="Fashion">Fashion</button>
        <button class="sub-nav-button" data-category="Politics and Society">Politics and Society</button>
        <button class="sub-nav-button" data-category="Personal Development">Personal Development</button>
      </div>
      <div class="filter-subnav-fill d-flex flex-column">
        <input id="search_collection" type="text" placeholder="Search collection here">
      </div>
    </div>
</div>
<div class="index-main-content">
  <div class="index-intro">
    <div class="index-stories">

    </div>
  </div>
</div>
<?php require "partials/footer.php"; ?>