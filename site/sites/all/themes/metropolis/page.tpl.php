<?php
// $Id$
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
<title><?php print $head_title; ?></title>
<?php print $head; ?>
<meta http-equiv="Content-Style-Type" content="text/css" />
<?php print $styles; ?>
<!--[if IE 6]><link rel="stylesheet" href="<?php echo $base_path . $directory; ?>/style.ie6.css" type="text/css" /><![endif]-->
<?php print $scripts; ?>
</head>

<body class="<?php print $body_classes; ?>">
	<div id="page-wrapper">
		<div id="header-wrapper">
			<div id="header"> 
					<div id="branding-wrapper">
						<div class="branding">
							<?php if ($logo): ?>
								<div class="logo">
									<a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a>
								</div> <!-- end logo -->
							<?php endif; ?>
							<div class="name-slogan-wrapper">
							<?php if ($site_name) : ?>
								<?php if ($is_front) : ?>
									<h1 class="site-name"><a href="<?php print $base_path ?>" title="<?php print $site_name ?>"><?php print $site_name ?></a></h1>
								<?php endif; ?>
								<?php if (!$is_front) : ?>
									<h2 class="site-name"><a href="<?php print $base_path ?>" title="<?php print $site_name ?>"><?php print $site_name ?></a></h2>
								<?php endif; ?>
							<?php endif; ?>
							<?php if ($site_slogan) : ?>
								<span class='site-slogan'><?php print $site_slogan; ?></span>
							<?php endif; ?>
							</div> <!-- end site-name + site-slogan wrapper -->
						</div>
					</div> <!-- end branding wrapper -->
				<?php if ($feed_icons): ?>
					<div class="feed-wrapper">
						<?php print $feed_icons; ?>
					</div> <!-- end feed wrapper -->
				<?php endif; ?>
				<div id="authorize">
					<ul>
						<?php global $user; 
							if ($user->uid != 0) {
								print '<li class="first">' .t('Logged in as '). '<a href="' .url('user/'.$user->uid). '">' .$user->name. '</a></li>';
								print '<li class="last"><a href="' .url('logout'). '">' .t('Logout'). '</a></li>'; } 
							else {
								print '<li class="first"><a href="' .url('user'). '">' .t('Login'). '</a></li>';
								print '<li class="last"><a href="' .url('user/register'). '">' .t('Register'). '</a></li>'; }
								?>
					</ul>
				</div> <!-- end authorize -->
			</div> <!-- end header -->
		</div> <!-- end header wrapper -->
		
		<div id="container-wrapper">
			<div id="container-outer">
				<div id="menu-wrapper">
					<div class="menu-outer">
						<div class="menu-inner">
							<div class="menu-left"></div> 
							<?php if ($primary_links || $superfish_menu): ?>
										<div id="<?php print $primary_links ? 'menu' : 'superfish' ; ?>">
											<?php if ($primary_links) {
												print theme('links', $primary_links);}
											elseif (!empty($superfish_menu)) {
												print $superfish_menu;} ?>
										</div> <!-- end menu / superfish -->
							<?php endif; ?>
							<div class="menu-right"></div>
						</div>
					</div>
					<?php print $breadcrumb; ?>
				</div> <!-- end menu wrapper -->
				
				<?php if (!$slideshow): ?>
					<?php if (!$is_front): ?>
						<div class="breadcrumb-shadow"></div> <!-- end breadcrumb shadow -->
					<?php endif; ?>
				<?php endif; ?>
				
				<?php if ($slideshow): ?>
					<div id="slideshow-wrapper">
						<div class="slideshow">
							<?php print $slideshow;?>
						</div> <!-- end slideshow -->
					</div> <!-- end slideshow wrapper -->
				<?php endif; ?>
				
				<?php if (!$slideshow): ?>
					<?php if ($is_front): ?>
						<div id="slideshow-wrapper">
							<?php if ($mission): ?><div class="mission"><?php print $mission; ?></div><?php endif; ?>
							<div class="slideshow">
								<img src="<?php print $base_path . $directory; ?>/images/slides/metropolis-1.jpg" width="804" height="375" alt="Metropolis 1"/>
								<img src="<?php print $base_path . $directory; ?>/images/slides/metropolis-2.jpg" width="804" height="375" alt="Metropolis 2"/>
								<img src="<?php print $base_path . $directory; ?>/images/slides/metropolis-3.jpg" width="804" height="375" alt="Metropolis 3"/>
							</div> <!-- end slideshow -->
						</div> <!-- end slideshow wrapper -->
					<?php endif; ?>
				<?php endif; ?>
				
				<div id="container-inner">
					<div id="content-wrapper" class="clearfix">
						<div id="main-content">
							<?php if($content_top):?><div id="content-top"><?php print ($content_top); ?></div><?php endif; ?>
							<?php if ($show_messages) { print $messages; }; ?>
							<?php if ($tabs) : ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
							<?php if ($title) : ?><h1 class="title"><?php print $title; ?></h1><?php endif; ?>
							<?php print $help; ?>
							<?php if ($content) : ?><?php print $content; ?><?php endif; ?>
						</div>
						<?php if ($right): ?>
							<div id="sidebar" class="sidebar">
								<?php print $right; ?>
							</div>
						<?php endif; ?>
						<div class="clearfix"></div>
					</div> <!-- end content wrapper-->
				</div> <!-- end container inner -->
				
				<?php if($bottom_1 || $bottom_2 || $bottom_3 || $bottom_4) : ?>
					<div id="bottom-wrapper" class="in<?php print (bool) $bottom_1 + (bool) $bottom_2 + (bool) $bottom_3 + (bool) $bottom_4; ?> clearfix">
						<?php if($bottom_1) : ?>
							<div class="column A">
								<?php print $bottom_1; ?>
							</div>
						<?php endif; ?>
						<?php if($bottom_2) : ?>
							<div class="column B">
								<?php print $bottom_2; ?>
							</div>
						<?php endif; ?>
						<?php if($bottom_3) : ?>
							<div class="column C">
								<?php print $bottom_3; ?>
							</div>
						<?php endif; ?>
						<?php if($bottom_4) : ?>
							<div class="column D">
								<?php print $bottom_4; ?>
							</div>
						<?php endif; ?>
					<div class="clearfix"></div>
					</div><!-- end bottom wrapper-->
				<?php endif; ?>

			</div> <!-- end container outer -->
			<div id="shadow-bottom"></div>
		</div> <!-- end container wrapper -->
			
		<div id="footer">
			<?php print $footer; ?>
			<?php if (isset($secondary_links)) : ?><div id="subnav"><?php print theme('links', $secondary_links, array('class' => 'links')); ?></div><?php endif; ?>
			<div class="footer-message"><?php print $footer_message; ?></div>
		</div> <!-- end footer -->
			
	</div> <!-- end page wrapper -->
	<?php print $closure; ?>
</body>