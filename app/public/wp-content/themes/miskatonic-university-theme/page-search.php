<?php 
get_header();

while(have_posts()){
    the_post(); 
    pageBanner(

   
    );
    
    ?>



<div class="container container--narrow page-section">
    <?php 
          $isParent = wp_get_post_parent_id(get_the_ID());
         if($isParent){
           
          ?>

    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="<?php echo get_permalink($isParent)?>"><i class="fa fa-home"
                    aria-hidden="true"></i> Back to <?php echo get_the_title($isParent);?></a> <span
                class="metabox__main"><?php the_title();?></span>
        </p>
    </div>

    <?php


           
         }
        ?>

<?php  
     $testArray = get_pages(array(
     'child_of' => get_the_ID()

     ));


if($isParent or $testArray){ ?>
    <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo get_the_permalink($isParent);?>"><?php echo get_the_title($isParent)?></a></h2>
        <ul class="min-list">
            <?php 
      
      if($isParent){
        $findChildrenOf = $isParent;
      } else {
        $findChildrenOf = get_the_ID();
      }


      wp_list_pages(array(
        'title_li' => NULL,
        'child_of' => $findChildrenOf,
        'sort_column' => 'menu_order',
      ))
      ?>
        </ul>
    </div>

    <?php }?>

   

    <div class="generic-content">
      

    <form class="search-form" action="<?php echo esc_url(site_url('/'))?>" method="get" >
    <label for="s" class="headline headline--medium"> Perform a new Search </label>
    <div class="search-form-row">
        <input  class="s"type="search" name="s" placeholder="Search Here">
        <input type="submit" value="Search" class="search-submit">
      </div>
      </form>
    </div>
</div>

<?php



}

get_footer();
?>