</div>
<div class="d-flex p-3 bg-white mt-auto"></div>
</div>
</div>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.4/chart.umd.min.js"></script> -->
<!-- <script>
    const sbToggle = document.querySelectorAll('.sbToggle');
    const sbBackdrop = document.getElementById('sbBackdrop');
    const sidebarEl = document.querySelector('.sidebar');

    function isDesktop() {
      sidebarEl.classList.add('sb-pinned');
      return window.matchMedia('(min-width: 992px)').matches;
    }

    if (isDesktop()) {
      document.body.classList.add('sb-open');
    }

    sbToggle.forEach(btn => {
      btn.addEventListener('click', () => {
        document.body.classList.toggle('sb-open');
        
        // When sidebar is collapsed, collapse all accordion nav-groups as well
        if (!document.body.classList.contains('sb-open')) {
          document.querySelectorAll('.nav-group').forEach(group => {
            group.classList.add('collapsed');
          });
        }
      });
    });

    sbBackdrop.addEventListener('click', () => {
      document.body.classList.remove('sb-open');
    });

    document.querySelectorAll('.nav-link-custom').forEach(link => {
      link.addEventListener('click', () => {
        if (!isDesktop()) document.body.classList.remove('sb-open');
      });
    });

    // Toggle nav-label groups (Core HR / Management) open-close on click.
    // While the sidebar is in its collapsed icon-rail state (body without
    // .sb-open), opening a group also expands the sidebar itself so the
    // dropdown reveals both the icon AND the text label for each link —
    // not just icons.
    document.querySelectorAll('.nav-label-toggle').forEach(toggle => {
      toggle.addEventListener('click', () => {
        // Do nothing if sidebar is collapsed (flyout menu handles interaction)
        if (!document.body.classList.contains('sb-open')) return;
        
        const group = toggle.closest('.nav-group');
        group.classList.toggle('collapsed');
      });
    });

    // Default state: every group collapsed except the one holding the active page.
    // That group's label also gets highlighted so it's clear which section you're in.
    document.querySelectorAll('.nav-group').forEach(group => {
      const toggle = group.querySelector('.nav-label-toggle');
      const hasActiveLink = group.querySelector('.nav-link-custom.active');
      if (hasActiveLink) {
        group.classList.remove('collapsed');
        toggle.classList.add('active-group');
      } else {
        group.classList.add('collapsed');
        toggle.classList.remove('active-group');
      }
    });

    // ===== Collapsed sidebar: flyout dropdown =====
    // Flyouts are teleported to <body> so sidebar overflow:hidden can't clip them.
    // We attach hover events to the toggle button itself (not the wrapper div)
    // and use the sidebar's right edge for the flyout's left position.
    document.querySelectorAll('.nav-group-hover').forEach(wrapper => {
      const flyout = wrapper.querySelector('.nav-flyout');
      const btn    = wrapper.querySelector('.nav-label-toggle');
      if (!flyout || !btn) return;

      // Teleport flyout to <body> so sidebar overflow:hidden can't clip it
      document.body.appendChild(flyout);

      let hideTimer = null;

      function showFlyout() {
        clearTimeout(hideTimer);
        // Only show in collapsed state
        if (document.body.classList.contains('sb-open')) return;
        const btnRect     = btn.getBoundingClientRect();
        const sidebarRect = sidebarEl.getBoundingClientRect();
        flyout.style.top  = btnRect.top + 'px';
        flyout.style.left = (sidebarRect.right + 6) + 'px';
        flyout.classList.add('flyout-open');
      }

      function startHideTimer() {
        hideTimer = setTimeout(() => {
          flyout.classList.remove('flyout-open');
        }, 150);
      }

      function cancelHide() {
        clearTimeout(hideTimer);
      }

      function hideFlyout() {
        clearTimeout(hideTimer);
        flyout.classList.remove('flyout-open');
      }

      // Trigger on the button itself (works in both collapsed and expanded state check)
      btn.addEventListener('mouseenter', showFlyout);
      btn.addEventListener('mouseleave', startHideTimer);

      // Flyout panel: keep open when hovered, hide when left
      flyout.addEventListener('mouseenter', cancelHide);
      flyout.addEventListener('mouseleave', hideFlyout);

      // Hide flyout when sidebar expands
      document.querySelectorAll('.sbToggle').forEach(toggleBtn => {
        toggleBtn.addEventListener('click', hideFlyout);
      });
    });

    <?php if (isset($pageScripts)) {
      echo $pageScripts;
    } ?>
  </script> -->
<script src="./assets/js/header-layout.js?v=<?php echo time(); ?>"></script>
<script src="./assets/js/app.js?v=<?php echo time(); ?>"></script>
<script>
  (function() {
    var MIN_DISPLAY_MS = 200;

    function hideLoader() {
      document.body.classList.remove('gh-loading');
      var loader = document.getElementById('gh-loader');
      if (loader) loader.classList.add('gh-hide');
    }

    var start = Date.now();

    function onLoaded() {
      var elapsed = Date.now() - start;
      var wait = Math.max(0, MIN_DISPLAY_MS - elapsed);
      setTimeout(hideLoader, wait);
    }

    if (document.readyState === 'complete') {
      onLoaded();
    } else {
      window.addEventListener('load', onLoaded);
    }

    // Also hide loader on back/forward navigation (bfcache)
    window.addEventListener('pageshow', function(e) {
      if (e.persisted) hideLoader();
    });

    // Show loader on every internal page navigation
    document.addEventListener('click', function(e) {
      var link = e.target.closest('a[href]');
      if (!link) return;
      var href = link.getAttribute('href');
      // Skip anchors, javascript:, mailto:, blank targets, modals, dropdowns
      if (!href || href.charAt(0) === '#' || href.startsWith('javascript:') || href.startsWith('mailto:') || link.target === '_blank' || link.closest('.dropdown-menu') || link.closest('[data-bs-toggle]') || link.closest('.pagination')) return;
      // Only internal .php pages
      if (href.match(/\.php(\?|$)/)) {
        document.body.classList.add('gh-loading');
        var loader = document.getElementById('gh-loader');
        if (loader) {
          loader.classList.remove('gh-hide');
          loader.style.display = '';
        }
      }
    });
  })();
</script>
<!-- <script src="./assets/js/bootstrap.min.js"></script> -->
<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/select2.js"></script>
<script src="./assets/js/DataTables/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="./assets/js/date-picker.js"></script>
<script src="./assets/js/master-table.js"></script>
<script src="./assets/js/auto-master-table.js?v=<?php echo time(); ?>"></script>

<script>
  $(document).ready(function() {
    
    function ghColorOption(state) {
      if (!state.id) return state.text;
      var color = state.element ? jQuery(state.element).attr('data-color') : '';
      if (!color) return state.text;

      var dot = jQuery('<span></span>').css({
        display: 'inline-block',
        width: 10,
        height: 10,
        borderRadius: 3,
        marginRight: 8,
        verticalAlign: 'middle',
        background: color,
        boxShadow: 'inset 0 0 0 1px rgba(17, 24, 39, .12)'
      });

      return jQuery('<span></span>').css({
        display: 'inline-flex',
        alignItems: 'center'
      }).append(dot).append(jQuery('<span></span>').text(state.text));
    }

    $('.select2').select2({
      templateResult: ghColorOption,
      templateSelection: ghColorOption,
      width: '100%',
    });
  });
</script>

<script>
 
  function ghSyncSelect2(scope) {
    var $scope = jQuery(scope);
    var $targets = $scope.is('select.select2') ? $scope : $scope.find('select.select2');
    $targets.each(function() {
      var $el = jQuery(this);
      if ($el.data('select2')) $el.trigger('change.select2');
    });
  }
</script>


<script>
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');

  tooltipTriggerList.forEach(function(el) {
    const tooltipClasses = ['no-tooltip-arrow'];
    const customClass = el.getAttribute('data-bs-custom-class');
    if (customClass) tooltipClasses.push(customClass);
    if (el.classList.contains('quick-checkout-btn')) tooltipClasses.push('tooltip-checkout');
    if (el.classList.contains('quick-breakout-btn')) tooltipClasses.push('tooltip-breakout');
    if (el.classList.contains('quick-breakin-btn')) tooltipClasses.push('tooltip-breakin');
    if (el.classList.contains('quick-lunchout-btn')) tooltipClasses.push('tooltip-lunchout');
    if (el.classList.contains('quick-lunchin-btn')) tooltipClasses.push('tooltip-lunchin');

    const tooltip = new bootstrap.Tooltip(el, {
      trigger: 'hover',
      customClass: tooltipClasses.join(' ')
    });

    el.addEventListener('click', function() {
      tooltip.hide();
    });

    el.addEventListener('mouseleave', function() {
      tooltip.hide();
    });
  });
</script>



<script>
  <?php if (isset($pageScripts)) {
    echo $pageScripts;
  } ?>
</script>
</body>

</html>