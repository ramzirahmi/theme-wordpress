<?php  get_header();?>

  <div class="container post-page">
	
		 

     <?php 

     if (have_posts()):
	while (have_posts()):
		 the_post(); 
		 ?>

		 
		<div class="main-post single-post">
			<?php edit_post_link('edit <i class="fa fa-pencil"></i>') ?>
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

      <p class="post-centent">
	   <?php the_content()?>
	  
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
	

		<?php endwhile; endif;
		echo '<div class="clearfix"></div>'; 


		$random_posts_arguments=array(
			'posts_per_page'    =>5,
			'orderby'           =>'rand',
			'category__in'     =>wp_get_post_categories(get_queried_object_id()),
			'post__not_in'     =>array(get_queried_object_id())
		);

       $random_posts=new wp_query($random_posts_arguments);

    if ( $random_posts ->have_posts()):?>
 	<?php
	  while ( $random_posts -> have_posts()):
		   $random_posts->the_post(); 
		 ?>
		
        <div class="author-posts">
       <h3 class="post-title">
		<a href="<?php the_permalink() ?>">
		<?php the_title(); ?>
		</a></h3>
		
		</div>
	

		<?php endwhile; endif;
                                
        ?>
       <div class="row">
       	<div class="col-md-2">
		<?php 
		$avatar_arguments=array(
			'class'=>'img-responsive img-thumbnail center-block'
		);

		echo get_avatar(get_the_author_meta('ID'),128,'','user avtar',$avatar_arguments)?>
		</div>
		<div class="col-md-10 author-info">

		<h4> <?php the_author_meta('first_name') ?>
			<?php the_author_meta('last_name') ?>
			(<?php the_author_meta('nickname') ?>)
		</h4>

		<?php if (the_author_meta('description')){ ?>
	     </p><?php the_author_meta('description') ?></p>
	     
	    <?php } else 
	    {echo 'theres no biography';}

        ?>
        </div>
      </div>
      <hr>
      <p class="author-stats"> <i class="fa fa-tags fa-fw"></i>user posts:<span class="posts-count">

      	<?php echo count_user_posts(get_the_author_meta('id'))?>
      </span>,
      	 <i class="fa fa-users fa-fw"></i>   user profile link:<?php the_author_posts_link() ?>
       </p>
		<?php

		echo '<hr class="comment-separator">';
		echo '<div class="post-pagination" >';
		 if (get_previous_post_link()){
          previous_post_link('%link','<i class="fa fa-chevron-left  fa-lg" aria-hiden="true"></i> previous article: %title');
		 } 
		 else{
		 	echo '<span class="previous-span"> Previous Article: None <span>'; }
        if (get_next_post_link()){
          next_post_link('%link','next article: %title <i class="fa fa-chevron-right  fa-lg" aria-hiden="true"></i>');
        }
        else{
        	echo '<span class="next-span"> Next Article: None <span>';
        }
	     
          echo '</div>';
          
          comments_template();
        ?>


</div>

<?php get_footer();?>