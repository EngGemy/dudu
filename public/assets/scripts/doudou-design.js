/**
 * Sticky navigation — desktop only (≥1024px).
 * Targets .navbar_nav directly: no duplicate element, no headroom.js dependency.
 * Mobile/tablet: nav scrolls with the page (already hidden via max-lg:hidden CSS).
 */
(function () {
  'use strict';

  var SCROLL_THRESHOLD = 150; // px before sticky kicks in
  var DESKTOP_BP = 1024;      // matches Tailwind lg:

  var nav = document.querySelector('.navbar_nav');
  if (!nav) return;

  var ticking = false;
  var lastKnown = 0;
  var isSticky = false;

  function update() {
    var onDesktop = window.innerWidth >= DESKTOP_BP;
    var pastThreshold = lastKnown > SCROLL_THRESHOLD;

    if (onDesktop && pastThreshold) {
      if (!isSticky) {
        nav.classList.add('nav-sticky');
        isSticky = true;
      }
    } else {
      if (isSticky) {
        nav.classList.remove('nav-sticky');
        isSticky = false;
      }
    }
    ticking = false;
  }

  window.addEventListener('scroll', function () {
    lastKnown = window.scrollY;
    if (!ticking) {
      requestAnimationFrame(update);
      ticking = true;
    }
  }, { passive: true });

  // Remove sticky on resize to mobile
  window.addEventListener('resize', function () {
    if (window.innerWidth < DESKTOP_BP && isSticky) {
      nav.classList.remove('nav-sticky');
      isSticky = false;
    }
  }, { passive: true });
})();
