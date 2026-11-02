<?php
/** Native WordPress comments. @package Growth_Factory_Theme */
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( post_password_required() ) { return; }
?>
<section id="comments" class="gf-comments">
	<?php if ( have_comments() ) : ?>
		<h2><?php esc_html_e( 'Comments', 'growth-factory-theme' ); ?></h2>
		<ol class="comment-list"><?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true ) ); ?></ol>
		<?php the_comments_navigation(); ?>
		<?php if ( ! comments_open() ) : ?>
			<p><?php esc_html_e( 'Comments are closed.', 'growth-factory-theme' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>
	<?php comment_form(); ?>
</section>
