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
   	<span>Articles count:20</span>
   	<span>comments count:100</span>
   </div>
   </div>
   <div class="clearfix"></div>
   </div>
     <?php 

     if (have_posts()):
	while (have_posts()):
		 the_post(); 
		 ?>

		 <div class="col-sm-6">
		<div class="main-post">
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
	   <?php the_post_thumbnail('',['class'=>'img-responsive img-thumbnail','title' => 'post Image']) ?>

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

		<?php endwhile; endif;
		echo '<div class="clearfix"></div>';
		
		/*echo '<div class="post-pagination" >';
		 if (get_previous_posts_link()){
          previous_posts_link('<i class="fa fa-chevron-left  fa-lg" aria-hiden="true"></i> new articles');
		 } 
		 else{
		 	echo '<span class="previous-span"> previous <span>'; }
        if (get_next_posts_link()){
          next_posts_link('old articles <i class="fa fa-chevron-right  fa-lg" aria-hiden="true"></i>');
        }
        else{
        	echo '<span class="next-span"> next <span>';
        }
	     
          echo '</div>';
          */
        
        ?>
         <div class="pagination-number">
         <?php echo numbering_pagenation();?>
          </div>
    </div>
</div>
<?php get_footer();?>