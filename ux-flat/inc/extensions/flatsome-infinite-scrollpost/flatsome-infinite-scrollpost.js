/* global flatsome_infinite_scrollpost, Packery, ga */

;(function ($) {
  $.fn.flatsomeInfiniteScrollPost = function () {
    return this.each(function () {
      var $container = jQuery('#post-list, .blog-archive .large-columns-1, .blog-archive .large-columns-2, .blog-archive .large-columns-3')
      var paginationNext = '.nav-pagination li a.next'

      if ($container.length === 0 ||
        jQuery(paginationNext).length === 0 ||
        $container.hasClass('ux-infinite-scrollpost-js-attached')) {
        return
      }

      var viewMoreButton = jQuery('button.view-more-button.posts-archive')
      var byButton = flatsome_infinite_scrollpost.type === 'button'
      var isMasonry = flatsome_infinite_scrollpost.list_style === 'masonry'
      // Set packery instance as outlayer when masonry is set.
      var outlayer = isMasonry ? Packery.data($container[0]) : false

      var $infiScrollContainer = $container.infiniteScroll({
        path: paginationNext,
        append: '#post-list .post, .blog-archive .large-columns-1 .post-item, .blog-archive .large-columns-2 .post-item, .blog-archive .large-columns-3 .post-item',
        checkLastPage: true,
        status: '.page-load-status',
        hideNav: '.blog-archive .nav-pagination',
        button: '.view-more-button',
        history: flatsome_infinite_scrollpost.history,
        historyTitle: true,
        debug: false,
        outlayer: outlayer,
        scrollThreshold: parseInt(flatsome_infinite_scrollpost.scroll_threshold)
      })

      if (byButton) {
        viewMoreButton.removeClass('hidden')
        $infiScrollContainer.infiniteScroll('option', {
          scrollThreshold: false,
          loadOnScroll: false
        })
      }

      $infiScrollContainer.on('load.infiniteScroll', function (event, response, path) {
        flatsomeInfiniteScrollPost.attachBehaviors(response)
      })

      $infiScrollContainer.on('request.infiniteScroll', function (event, path) {
        if (byButton) viewMoreButton.addClass('loading')
      })

      $infiScrollContainer.on('append.infiniteScroll', function (event, response, path, items) {
        jQuery(document).trigger('flatsome-infiniteScroll-append', [response, path, items])
        if (byButton) viewMoreButton.removeClass('loading')

        // Fix Safari bug
        jQuery(items).find('img').each(function (index, img) {
          img.outerHTML = img.outerHTML
        })

        // Load fragments and init_handling_after_ajax for new items.
        jQuery(document).trigger('flatsome-equalize-box')

        Flatsome.attach('lazy-load-images', $container)
        flatsomeInfiniteScrollPost.animateNewItems(items)

        if (isMasonry) {
          setTimeout(function () {
            $infiScrollContainer.imagesLoaded(function () {
              $infiScrollContainer.packery('layout')
            })
          }, 500)
        }

        if (window.ga && ga.loaded && typeof ga === 'function') {
          var link = document.createElement('a')
          link.href = path
          ga('set', 'page', link.pathname)
          ga('send', 'pageview')
        }
      })

      var flatsomeInfiniteScrollPost = {
        attachBehaviors: function (response) {
          Flatsome.attach('tooltips', response)
        },
        animateNewItems: function (items) {
          if (isMasonry) return
          jQuery(items).hide().fadeIn(parseInt(flatsome_infinite_scrollpost.fade_in_duration))
        }
      }

      // Initialize completed.
      $container.addClass('ux-infinite-scrollpost-js-attached')
    })
  }

  // Doc ready.
  $(function () {
    $(document.body).flatsomeInfiniteScrollPost()
  })
})(jQuery)
