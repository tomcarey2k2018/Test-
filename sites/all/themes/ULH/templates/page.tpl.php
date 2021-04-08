<?php

/**
 * @file
 * Bartik's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see ULH_process_page()
 * @see html.tpl.php
 */
?>
<meta name="viewport" content="width=device-width, user-scalable=no">
<script type="text/plain" data-cookieconsent="cookieconsent-optin-marketing" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53d0e41712f6e943"></script>
<div id="page-wrapper"><div id="page">

  <div id="header" class="<?php print $secondary_menu ? 'with-secondary-menu': 'without-secondary-menu'; ?>">
	<div class="section clearfix">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan"<?php if ($hide_site_name && $hide_site_slogan) { print ' class="element-invisible"'; } ?>>

        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong>
            </div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="site-name"<?php if ($hide_site_name) { print ' class="element-invisible"'; } ?>>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div id="site-slogan"<?php if ($hide_site_slogan) { print ' class="element-invisible"'; } ?>>
            <?php print $site_slogan; ?>
          </div>
        <?php endif; ?>

      </div> <!-- /#name-and-slogan -->
    <?php endif; ?>

    <?php print render($page['header']); ?>

   <?php if ($main_menu): ?>
     <!-- <div id="main-menu" class="navigation">
        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu-links',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> --> <!-- /#main-menu -->
    <?php endif; ?>

    <?php if ($secondary_menu): ?>
      <div id="secondary-menu" class="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'id' => 'secondary-menu-links',
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Secondary menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </div> <!-- /#secondary-menu -->
    <?php endif; ?>

	<div id="UL_header">
		<div class="row top_password">
			<a href="http://www.ul.ie">
				<img src="<?= $GLOBALS['base_path'] ?>sites/all/themes/ULH/images/UL_logo_large.jpg"/></a>
<!--<a class="celeb_40" href="http://www.ul.ie/news-centre/news/ul-named-sunday-times-universirty-of-the-year"><h1>University of the Year 2015</h1></a>-->

			<div id="button_bar">
				<ul>
<li class="round_all">
						<a class="round_all" href="http://www.ulaa.ul.ie" target=_blank>Alumni</a></li>

					<li class="round_all">
						<a class="round_all" href="http://www.ul.ie/portal">Students & Staff</a></li>
					<li class="round_left gap" id="language" style="display: none">
						<a class="round_left " href="#">Gaeilge</a></li>
					<li class="round_left gap">
						<a class="popup" title='Departments' width="350" href="#popup_faculties">Departments</a></li>
					<li>
						<a class="popup" title="Quicklinks"  href="#popup_quicklinks">Quicklinks</a></li>
					<li class="round_right">
						<a class="round_right" href="#sitemap">Sitemap</a></li>
					<li class="gap round_all">
						<a class="popup round_all" href="#popup_search" width="500" >Search</a></li>
				</ul>
			</div>
		</div>

		<div class="row bottom_part">
			<div id="nav_wrapper" class="clearfix">
				<div id="nav" class="grid_24 alpha omega">
					<ul id="nav_list" class="clearfix">
						<li class="current" id="nav-home"><a href="http://www.ul.ie/">Home</a>
							<!--<ul>
								<li class="last" id="nav-crest"><a href="http://www.ul.ie/crest/">crest</a></li>
							</ul>-->
						</li>
						<li id="nav-study-at-ul"><a href="http://www.ul.ie/study-at-ul/">Study at UL</a>
							<!--<ul>
								<li id="nav-study-at-ul-undergraduate"><a href="http://www.ul.ie/study-at-ul/undergraduate/">Undergraduate</a></li>
								<li id="nav-study-at-ul-postgraduate"><a href="http://www.ul.ie/study-at-ul/postgraduate/">Postgraduate</a></li>
								<li id="nav-study-at-ul-international"><a href="http://www.ul.ie/study-at-ul/international/">International</a></li>
								<li id="nav-study-at-ul-continuing-education"><a href="http://www.ul.ie/study-at-ul/continuing-education/">Continuing Education</a></li>
								<li id="nav-study-at-ul-springboard-initiative"><a href="http://www.ul.ie/study-at-ul/springboard-initiative/">SpringBoard Initiative</a></li>
								<li id="nav-study-at-ul-undergraduate-admissions"><a href="http://www.ul.ie/study-at-ul/undergraduate-admissions/">Undergraduate Admissions</a></li>
								<li id="nav-study-at-ul-apply-to-ul"><a href="http://www.ul.ie/study-at-ul/apply-to-ul/">Apply to UL</a></li>
							</ul>-->
						</li>
						<li id="nav-research"><a href="http://www.ul.ie/research/">Research</a>
						<!--	<ul>
								<li id="nav-research-research-profile"><a href="http://www.ul.ie/research/research-profile/">Research Profile</a></li>
								<li id="nav-research-expertise-search"><a href="http://www.ul.ie/research/expertise-search/">Expertise Search</a></li>
								<li id="nav-research-institutes-and-centres"><a href="http://www.ul.ie/research/institutes-and-centres/">Institutes & Centres</a></li>
								<li id="nav-research-facilities"><a href="http://www.ul.ie/research/facilities/">Facilities</a></li>
								<li id="nav-research-research-portal"><a href="http://www.ul.ie/research/research-portal/">Research Portal</a></li>
								<li id="nav-research-research-information-system"><a href="http://www.ul.ie/research/research-information-system/">Research Information System</a></li>
								<li class="last" id="nav-research-science-without-borders"><a href="http://www.ul.ie/research/science-without-borders/">Science without Borders</a></li>
							</ul>-->
						</li>
						<li id="nav-industry-business"><a href="http://www.ul.ie/research/">Industry & Business</a>
							<!--<ul>
								<li id="nav-industry-business-services-industry-business"><a href="http://www.ul.ie/industry-business/services-industry-business/">Industry Services</a></li>
								<li id="nav-industry-business-industry-partners"><a href="http://www.ul.ie/industry-business/industry-partners/">Industry Partners</a></li>
								<li id="nav-industry-business-professional-development"><a href="http://www.ul.ie/industry-business/professional-development/">Professional Development</a>
									<ul>
										<li id="nav-industry-business-professional-development-arts-humanities-social-sciences"><a href="http://www.ul.ie/industry-business/professional-development/arts-humanities-social-sciences/">Arts, Humanities & Social Sciences</a></li>
										<li id="nav-industry-business-professional-development-kemmy-business-school"><a href="http://www.ul.ie/industry-business/professional-development/kemmy-business-school/">Kemmy Business School</a></li>
										<li class="last" id="nav-industry-business-professional-development-education-health-sciences"><a href="http://www.ul.ie/industry-business/professional-development/education-health-sciences/">Education & Health Sciences</a></li>
									</ul>
								</li>
								<li id="nav-industry-business-networking-events"><a href="http://www.ul.ie/industry-business/networking-events/">Networking Events</a></li>
								<li id="nav-industry-business-graduate-recruitment"><a href="http://www.ul.ie/industry-business/graduate-recruitment/">Graduate Recruitment</a></li>
								<li id="nav-industry-business-student-work-placement"><a href="http://www.ul.ie/industry-business/student-work-placement/">Student Work Placement</a></li>
								<li id="nav-industry-business-ul-foundation"><a href="http://www.ul.ie/industry-business/ul-foundation/">UL Foundation</a></li>
								<li class="last" id="nav-industry-business-nexus-innovation-centre"><a href="http://www.ul.ie/industry-business/nexus-innovation-centre/">Nexus Innovation Centre</a></li>
							</ul>-->
						</li>
						<li id="nav-about-ul"><a href="http://www.ul.ie/about-ul/">About UL</a>
						<!--	<ul>
								<li id="nav-about-ul-presidents-welcome"><a href="http://www.ul.ie/about-ul/presidents-welcome/">President's Welcome</a></li>
								<li id="nav-about-ul-university-leadership"><a href="http://www.ul.ie/about-ul/university-leadership/">University Leadership</a>
									<ul>
										<li id="nav-about-ul-university-leadership-history-of-ul"><a href="http://www.ul.ie/about-ul/university-leadership/history-of-ul/">History of UL</a></li>
										<li class="last" id="nav-about-ul-university-leadership-administration-support-offices"><a href="http://www.ul.ie/about-ul/university-leadership/administration-support-offices/">Administration & Support Offices</a></li>
									</ul>
								</li>
								<li id="nav-about-ul-directory-of-services"><a href="http://www.ul.ie/about-ul/directory-of-services/">A-Z Directory</a></li>
								<li id="nav-about-ul-academic-faculties"><a href="http://www.ul.ie/about-ul/academic-faculties/">Faculties & Departments</a></li>
								<li id="nav-about-ul-ul-community"><a href="http://www.ul.ie/about-ul/ul-community/">UL Community</a></li>
								<li id="nav-about-ul-strategic-alliances"><a href="http://www.ul.ie/about-ul/strategic-alliances/">Strategic Alliances</a>
									<ul>
										<li class="last" id="nav-about-ul-strategic-alliances-nuig-ul-alliance"><a href="http://www.ul.ie/about-ul/strategic-alliances/nuig_ul_alliance/">NUIG UL Alliance</a></li>
									</ul>
								</li>
								<li id="nav-about-ul-press-office"><a href="http://www.ul.ie/about-ul/press-office/">Press Office</a></li>
								<li id="nav-about-ul-vacancies-at-ul"><a href="http://www.ul.ie/about-ul/vacancies-at-ul/">Vacancies at UL</a></li>
								<li class="last" id="nav-about-ul-contact-information"><a href="http://www.ul.ie/about-ul/contact-information/">Contact Information</a></li>
							</ul>-->
						</li>
						<li id="nav-about-ul"><a href="http://www.ul.ie/covid/">Covid 19</a>
						</li>
					</ul>
					<div id="bottom_bar" class="grad_grey">
						<ul id="breadcrumb" class="clearfix">
							<li style="height:10px;">&nbsp;</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script language="javascript">
		var mouse_over_UL_menu = false;
		jQuery(document).ready(function(){
			jQuery("#nav_list").mouseenter(function(){
				mouse_over_UL_menu = true;
				state = jQuery("#header #nav > ul li ul").css('display');
				if(state == "none")
					setTimeout("show_UL_menu()", 500);
			});
			jQuery("#nav_list").mouseleave(function(){
				mouse_over_UL_menu = false;
				state = jQuery("#header #nav > ul li ul").css('display');
				if(state == "block")
					setTimeout("hide_UL_menu()", 500);
			});
		});
		function show_UL_menu(){
			if(mouse_over_UL_menu == true)
				jQuery("#header #nav > ul li ul").slideToggle();
		}
		function hide_UL_menu(){
			if(mouse_over_UL_menu == false)
				jQuery("#header #nav > ul li ul").slideToggle();
		}
	</script>
	
  </div>
  </div> <!-- /.section, /#header -->
  
  

  <?php if ($messages): ?>
    <div id="messages"><div class="section clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>

  <div id="main-wrapper" class="clearfix"><div id="main" class="clearfix">

  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>
  
    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>

    <?php if ($page['sidebar_first']): ?>
      <div id="sidebar-first" class="column sidebar"><div class="section">
        <?php print render($page['sidebar_first']); ?>
      </div></div> <!-- /.section, /#sidebar-first -->
    <?php endif; ?>
	
	<div id="right-side">
		<?php if ($page['content_full_width']): ?>
		  <div id="content-full-width"><div class="section">
			<?php print render($page['content_full_width']); ?>
		  </div></div>
		<?php endif; ?>

		<div id="content" class="column"><div class="section">
		  <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
		  <a id="main-content"></a>
		  <?php print render($title_prefix); ?>
		  <?php if ($title): ?>
			<h1 class="title" id="page-title">
			  <?php print $title; ?>
			</h1>
		  <?php endif; ?>
		  <?php print render($title_suffix); ?>
		  <?php if ($tabs): ?>
			<div class="tabs">
			  <?php print render($tabs); ?>
			</div>
		  <?php endif; ?>
		  <?php print render($page['help']); ?>
		  <?php if ($action_links): ?>
			<ul class="action-links">
			  <?php print render($action_links); ?>
			</ul>
		  <?php endif; ?>
		  <?php print render($page['content']); ?>
		  <?php print $feed_icons; ?>

		</div></div> <!-- /.section, /#content -->

		<?php if ($page['sidebar_second']): ?>
		  <div id="sidebar-second" class="column sidebar"><div class="section">
			<?php print render($page['sidebar_second']); ?>
		  </div></div> <!-- /.section, /#sidebar-second -->
		<?php endif; ?>
	</div>

  </div></div> <!-- /#main, /#main-wrapper -->

  <?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
    <div id="triptych-wrapper"><div id="triptych" class="clearfix">
      <?php print render($page['triptych_first']); ?>
      <?php print render($page['triptych_middle']); ?>
      <?php print render($page['triptych_last']); ?>
    </div></div> <!-- /#triptych, /#triptych-wrapper -->
  <?php endif; ?>

	<div id="footer-wrapper">
		<div class="section">

		<?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
		  <div id="footer-columns" class="clearfix">
			<?php print render($page['footer_firstcolumn']); ?>
			<?php print render($page['footer_secondcolumn']); ?>
			<?php print render($page['footer_thirdcolumn']); ?>
			<?php print render($page['footer_fourthcolumn']); ?>
		  </div> <!-- /#footer-columns -->
		<?php endif; ?>

		<?php if ($page['footer']): ?>
		  <div id="footer" class="clearfix">
			<?php print render($page['footer']); ?>

			<div class="row logos">
				<a class="athena_swan" href="http://www.ul.ie/hr/athena-swan"><h1>Athena Swan at UL</h1></a>
		
		<span class="hea_logos footer_logo"></span>
		


                              <!--<img src="http://www.ul.ie/ULH/sites/default/files/logos.jpg"/>-->
			</div>
			
		  </div> <!-- /#footer -->
		<?php endif; ?>
		

		</div>
		
		<img class="cookies_triangle" src="<?= $GLOBALS['base_path'] ?>sites/all/themes/ULH/images/cookies.png"/>
		<div class="cookies_policy">
			<div class="row header">
				Cookie/Privacy </div>
			<div class="row body">
				<div class="text">
					By using our site you accept the terms of our
					<a href="http://www.ul.ie/information/privacy-statement/">Privacy Policy</a>.</div> </div>
		</div>
		
		<script language="javascript">
			jQuery("img.cookies_triangle").click(function(){
				jQuery(".cookies_policy").toggle();
			});
		</script>
		
	</div> <!-- /.section, /#footer-wrapper -->

</div></div> <!-- /#page, /#page-wrapper -->
