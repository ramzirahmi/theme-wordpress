<?php
if (comments_open()) {
	echo '<h3>'.comments_number('0 comments','one comments','% comments').'</h3>';
	echo '<ul class="list-unstyled comments-list">';
	$comments_arguments=array(
	'max_depth' =>3,
	'type'      =>'comment',
	'avatar_size' =>64,
	);
	wp_list_comments();
	echo '</ul>';
	 echo '<hr class="comment-separator">';
	 $commentform_arguments=array(
	 	
	 		'title_reply'      =>'Add your comment',
	 		'title_reply_to'       =>'Add to reply to[%s]',
	 		'class_submit'         =>'btn btn-primary btn-md',
	 		'comment_notes_before' =>''
	 	  );
	comment_form($commentform_arguments);
	//foreach ($comments as $comment ) {
		//comment_author();
	//}
}
else{
	echo "comments not open";

}