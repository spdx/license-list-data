/** * @file
 * A JavaScript file for the sub-navigation.
 *
 */
// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth

(function ($, Drupal, window, document, undefined) {
  Drupal.behaviors.droncodeNav = {
    attach: function(context, settings) {
      new cpstandardThemeNav('.sidebar_main_menu_block'); /*the left-hand sidebar menu block*/
    }
  };

  var cpstandardThemeNav = function(selector) {
    this.subnav = $(selector);
    this.subnav.addClass('expandable-nav');

    // Add the toggle icon to non-leaf menu items.
    this.subnav.find('li').each(function () {
      var li = $(this);
      if (li.children('ul').length > 0) {
        li.children('a').after('<span class="nav-icon"></span>');
      }
    });

    // Collapse everything that is NOT in the active-trail.
    this.subnav.find('li:not(.active-trail) ul').hide();

    // In order to not overwrite the actual active trail for the current page
    // we add our own classes. hl-active-trail indicates an expanded menu item.
    // hl-active indicates a selected menu item.
    this.highlight(this.subnav.find('a.active'));
    this.setToggles();
  }

  cpstandardThemeNav.prototype.highlight = function(active) {

    this.subnav.find('.hl-active').removeClass('hl-active');
    if (active) {
      active.addClass('hl-active');
      active.parents('li').addClass('hl-active-new');
    }

    // Find items that no longer need an active trail.
    this.subnav.find('.hl-active-trail').not('.hl-active-new').removeClass('hl-active-trail');

    // Remove extra class.
    this.subnav.find('.hl-active-new').addClass('hl-active-trail').removeClass('hl-active-new');

  }

  cpstandardThemeNav.prototype.setToggles = function() {
    var self = this;

    // Trigger toggling on click. 'toggle' is set to the icon that was clicked on.
    this.subnav.find('span.nav-icon').bind('click', function(e) {
      toggle = $(this);

      var li = toggle.closest('li');
      // If the toggled item is expanded, we need to collapse the submenu.
      if (li.find('ul:first').is(':visible')) {
        // Collapse all the children that may be open.
        li.find('ul').slideUp('fast');

        // If this is a root-level menu item.
        if (toggle.parents('ul', this.subnav).length <= 1) {
          self.highlight(null);
        } else {
          self.highlight(li.closest('ul').siblings('a'));
        }

      // If the toggled item is collapsed, we need to collapse other submenus
      // and expand the toggled submenu.
      } else {

        // Collapsing all other open submenus.
        li.siblings('li.hl-active-trail').find('ul').slideUp();

        // Expand the toggled item.
        li.find('ul:first').slideDown();

        // Reset the highlighting.
        self.highlight(toggle.siblings('a'));
      }

      e.stopPropagation();
      return false;
    });
  }
})(jQuery, Drupal, this, this.document);

