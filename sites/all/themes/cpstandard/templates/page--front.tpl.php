<?php print _partial('header_collaborative_projects'); ?>

<header id="header">
  <div id="header-inner">

    <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>

    <?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan">

        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <div id="site-name">
              <h1><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a></h1>
            </div>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
            </h1>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div id="site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>

      </div>
    <?php endif; ?>

    <?php if ($page['header']): ?>
      <div id="header-region">
        <?php print render($page['header']); ?>
      </div>
    <?php endif; ?>

    <?php print render($page['navigation']); ?>

  </div>
</header> <!-- /header -->

<?php if ($page['highlighted']): ?>
  <div id="highlighted"><?php print render($page['highlighted']) ?></div>
<?php endif; ?>



<div id="page" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div id="page-inner">
  <!-- ______________________ HEADER _______________________ -->



  <!-- ______________________ MAIN _______________________ -->

  <div id="main" class="clearfix">

  <!-- ______________________ Content-top _______________________ -->
  <?php if ($page['content_top']): ?>
    <div id="content-top"><?php print render($page['content_top']) ?></div>
  <?php endif; ?>

    <section id="content">

        <?php if ($breadcrumb || $title|| $messages || $tabs || $action_links): ?>
          <div id="content-header">

            <?php print $breadcrumb; ?>

            <?php print render($title_prefix); ?>

            <?php print render($title_suffix); ?>
            <?php print $messages; ?>
            <?php print render($page['help']); ?>

            <?php if ($tabs): ?>
              <?php print render($tabs); ?>
            <?php endif; ?>

            <?php if ($action_links): ?>
              <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>

          </div> <!-- /#content-header -->
        <?php endif; ?>

        <div id="content-area">
          <?php print render($page['content']) ?>
        </div>

        <?php print $feed_icons; ?>

    </section> <!-- /content-inner /content -->

    <?php if ($page['sidebar_first']): ?>
      <aside id="sidebar-first" class="column sidebar first">
        <?php print render($page['sidebar_first']); ?>
      </aside>
    <?php endif; ?> <!-- /sidebar-first -->

    <?php if ($page['sidebar_second']): ?>
      <aside id="sidebar-second" class="column sidebar second">
        <?php print render($page['sidebar_second']); ?>
      </aside>
    <?php endif; ?> <!-- /sidebar-second -->

    <!-- ______________________ Content-bottom _______________________ -->
    <?php if ($page['content_bottom']): ?>
      <div id="content-bottom"><?php print render($page['content_bottom']) ?></div>
    <?php endif; ?>

  </div> <!-- /main -->

  <!-- ______________________ FOOTER _______________________ -->

  <?php if ($page['footer']): ?>
    <footer id="footer">
      <?php print render($page['footer']); ?>
      <div class="clearfix"></div>
    </footer> <!-- /footer -->
  <?php endif; ?>

  </div> <!-- /page inner -->
</div> <!-- /page -->


<?php print _partial('footer_copyright'); ?>

<?php
  if ($pardot_code = variable_get('pardot_code', NULL)) {
    print $pardot_code;
  }
?>
