/**
 * @file
 * Block behaviors.
 */

(function ($, window, Drupal, once) {
  /**
   *
   * Behaviors for campaign blocks.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches the behavior for campaign blocks.
   */
  Drupal.behaviors.campaign = {
    attach(context) {
      once('campaign', '#campaign', context).forEach( () => {
        $.ajaxSe
        $.get({
            url: 'https://backend.patrondeti.cz/api/3.3/campaigns',
            data: {_format: 'json', filter: 'active', order: 'ends_soon', offset: '0', limit: '6', tu_index: 4},
            success: (data) => console.log(data),
          });
      });
    }
  };
})(jQuery, window, Drupal, once);
