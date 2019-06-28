<?php if ( is_active_sidebar( 'sidebar-main' ) ) { ?>
			<div class="sidebarRight">
<?php if ( ! dynamic_sidebar('sidebar-main') ) : ?>
<?php endif; ?>
			</div>
<?php } ?>