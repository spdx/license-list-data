<?php
  $project_type = (theme_get_setting('cpstandard_project_type') == 'workgroup')
    ? 'Linux Foundation. All rights reserved.' // Workgroup.
    : 'a Linux Foundation Collaborative Project. All Rights Reserved.' // Collaborative Project.
?>

<div class="collaborative-projects">
  <div class="gray-diagonal">
    <div class="container">
      <div id="footer-copyright">
        <p>&copy; <?php print date("Y"); ?>
          <?php
            if ($cp_name = variable_get('cp_name', NULL)) {
              print $cp_name . ' ';
            }
            print $project_type;
          ?>
        </p>
        <p>Linux Foundation is a registered trademark of The Linux Foundation. Linux is a registered <a href="http://www.linuxfoundation.org/programs/legal/trademark" title="Linux Mark Institute">trademark</a> of Linus Torvalds.</p>
        <p>Please see our <a href="http://www.linuxfoundation.org/privacy">privacy policy</a> and <a href="http://www.linuxfoundation.org/terms">terms of use</a>.</p>
      </div>
    </div>
  </div>
</div>
