<?php  get_header();?>

  <div class="container home-page">
  	<div class="row">
<div class="category-information text-center">
	<div class="col-sm-4">
         <h1 class="text-center category-title"><?php single_cat_title()?></h1>
   </div>
   <div class="col-sm-4">
         <p class="category-description"><?php echo category_description()?></p>
     </div>
         <div class="col-sm-4">
   <div class="cat-stats">
   	<span>This Is Special Layout </span>
  
   </div>
   </div>
   <div class="clearfix"></div>
   </div>
   <div class="col-md-9">
     <?php 

     if (have_posts()):
	while (have_posts()):
		 the_post(); 
		 ?>

	
		<div class="main-post">
      <div class="row">
      <div class="col-md-3">
         <?php the_post_thumbnail('',['class'=>'img-responsive img-thumbnail','title' => 'post Image']) ?>
      </div>
      <div class="col-md-9">
        <h4 class="post-title">
        <a href="<?php the_permalink() ?>">
          <?php the_title(); ?>
        </a>
      </h4>
    <span class="post-author"> 
      <i class="fa fa-user fa-fw fa-lg"></i>
    <?php the_author_posts_link() ?>
      </span>
        <span class="post-date">
         <i class="fa fa-calendar fa-fw fa-lg"></i>
        <?php the_time('F j, Y') ;?>
    </span>
    <span class="comments">
     <i class="fa fa-comments fa-fw fa-lg"></i>
    <?php comments_popup_link('0 comments','one comments','% comments','comments-url','comments disabled') ?>
     </span>
    

      <p class="post-centent ">
     <?php the_excerpt()?>
     <a href="<?php echo get_permalink();?>"> read more ...</a>
    </p>

      <hr>
        <p class="post-categories"> 
           <i class="fa fa-tags fa-fw fa-lg"></i>
             <?php the_category(' , ')?>
        </p>
        <p class="post-tags">
          <?php 
          if(has_tag()){
            the_tags();}
            else{
              echo'tags: there\' no tags';
            }
           ?>
        </p>
      </div>
    </div>
			
	</div>
	

		<?php endwhile; endif;
      ?>
    </div>
    <div class="col-md-3">
      <div class="linux-sidebar">
    <?php if(is_active_sidebar('main-sidebar')){
    dynamic_sidebar('main-sidebar');
    }
       get_sidebar('linux');
     ?>
    </div>
    </div>
    
		<div class="clearfix"></div>
		
	
      
        
      
         <div class="pagination-number">
         <?php echo numbering_pagenation();?>
          </div>
    </div>
</div>
<?php get_footer();?>