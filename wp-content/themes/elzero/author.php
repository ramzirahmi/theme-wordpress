<?php get_header()?>
<div class="container author-page">
	<h1 class="profile-header text-center"><?php the_author_meta('nickname') ?> page </h1>
	<div class="author-main-info">
	<div class="row">
		
		<div class="col-md-3">
			<?php 
		$avatar_arguments=array(
			'class'=>'img-responsive img-thumbnail center-block'
		);

		echo get_avatar(get_the_author_meta('ID'),196,'','user avtar',$avatar_arguments)
		?>
		</div>
		<div class="col-md-9">
			<ul class=" author-names list-unstyled">
				<li><span>First Name</span>: <?php the_author_meta('first_name') ?></li>
				<li><span> Last Name </span>: <?php the_author_meta('last_name') ?></li>
				<li><span>Nickname</span>: <?php the_author_meta('nickname') ?></li>
			</ul>
			<hr>
			<?php if (the_author_meta('description')){ ?>
	     </p><?php the_author_meta('description') ?></p>
	     
	    <?php } else 
	    {echo 'theres no biography';}

        ?>
		</div>
	</div>
	</div>

<div class="row author-stats">
	<div class="col-md-3"><div class="stats">posts count
		<span><?php echo count_user_posts(get_the_author_meta('id'))?></span>
	</div></div>
	<div class="col-md-3"><div class="stats">
		comments count
		<span>
			 <?php $commentscount_arguments = array(
			 	'user_id'=>get_the_author_meta('id'),
			 	'count' =>true
			 );
			 echo get_comments($commentscount_arguments );
			 ?>
		</span>
	</div></div>
	<div class="col-md-3">
		<div class="stats">
			total posts view
			<span>0</span>
		</div>
	</div>
	<div class="col-md-3">
		<div class="stats">
			testing
			<span>0</span>
		 </div>
	   </div>
     </div>
<?php
$author_posts_per_page=6;
$author_posts_arguments=array(
	  'author'          =>get_the_author_meta('id'),
	 'posts_per_page'   => $author_posts_per_page
	);

$author_posts=new wp_query($author_posts_arguments);
 if ( $author_posts ->have_posts()):?>
 	 <h3 class="author-posts-title">latest[<?php echo $author_posts_per_page ?>] posts of <?php the_author_meta('nickname');?> </h3> 
 	<?php
	  while ( $author_posts -> have_posts()):
		   $author_posts->the_post(); 
		 ?>

       <div class="row">
		 <div class="col-sm-3">
		 	   <?php the_post_thumbnail('',['class'=>'img-responsive img-thumbnail','title' => 'post Image']) ?>
		 </div>

         <div class="author-posts">
		 <div class="col-sm-9">
		<h4 class="post-title">
		<a href="<?php the_permalink() ?>">
		<?php the_title(); ?>
		</a></h4>
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
	   </p>
	</div>
	 </div>
	</div>
	<div class="clearfix"></div>

		<?php endwhile; endif;
		wp_reset_postdata();
		$comments_per_page=4;
          $comments_arguments=array(
	      'user_id'          =>get_the_author_meta('id'),
	      'status'            => 'approve',
	      'number'           =>$comments_per_page,
	      'post_status'      =>'publish',
           'post_type'      =>'post'
	      );
	      $comments=get_comments($comments_arguments);

	       if($comments){ ?>
	       	<h3 class="author-comments-title">
	       <?php
	       if(get_comments($commentscount_arguments)->$comments_per_page){
	       	echo 'latest'.$comments_per_page .'comments of';
	       	the_author_meta('nickname');
	       }
	       else{
	       	echo'latest comments of ';
	       		the_author_meta('nickname');
	     
	      }	?>	
	       	</h3>
          <?php
            foreach ($comments as $comment) { ?>
	        <div class="author-comments">
	        	<h3 class="post-title">
	      	<a href="<?php get_the_permalink($comment->$comment_post_ID) ?>">
	      	<?php  echo get_the_title($comment->$comment_post_ID)?>
	      	</a>
	      	</h3>
	      	<span class="post-date">
	      		<i class="fa fa-calendar fa-fw"></i>
	      	<?php echo 'Added on '. mysql2date('l, F j, Y',$comment->comment_date)?>
           </span>
           <div class="post-content">
           	<?php echo $comment->comment_content?>
           	</div>
           </div>
	      <?php	
	      }
	     } else
	      {
	      	echo 'this author dont have Any comments';
	      }

	       
	      
		?>
	
		</div>
</div>

<?php get_footer() ?>