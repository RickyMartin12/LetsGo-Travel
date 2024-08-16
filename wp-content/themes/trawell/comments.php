<?php if ( post_password_required() ) { return; } ?>

<?php if ( comments_open() || get_comments_number() ) : ?>

    <?php
    comment_form(array(
	    'title_reply_before' => '<h3 id="reply-title" class="section-title h5"><span>',
	    'title_reply'        => __trawell( 'leave_a_reply' ),
	    'title_reply_after'  => '</span></h3>',
    ) );
    ?>

    <?php if ( have_comments() ) : ?>
        <h4 id="comments" class="section-title h5">
            <span><?php comments_number( __trawell( 'no_comments' ), __trawell( 'one_comment' ), __trawell( 'multiple_comments' ) ); ?></span>
        </h4>

        <ul class="comment-list">
            <?php $args = array(
                'avatar_size' => 60,
                'reply_text' => __trawell( 'comment_reply' ),
                'format' => 'html5'
            ); ?>
            <?php wp_list_comments( $args ); ?>
        </ul>

        <?php paginate_comments_links( array(  'prev_text' => '<i class="o-angle-left-1"></i>', 'next_text' => '<i class="o-angle-right-1"></i>', 'type' => 'list' ) ); ?>
    <?php endif; ?>

<?php endif; ?>