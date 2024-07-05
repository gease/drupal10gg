<?php

namespace Drupal\gg_test\Plugin\Block;

use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a block to test Gutenberg editor.
 */
#[Block(
  id: "gg_test_block",
  admin_label: new TranslatableMarkup("Gutenberg Test"),
)]
class GGBlock extends BlockBase implements ContainerFactoryPluginInterface
{

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration()
  {
    return ['random_text' => $this->t('Random text'), 'label_display' => FALSE];
  }


  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state)
  {
    return [
      'random_text' => [
        '#type' => 'textfield',
        '#title' => $this->t('Random text'),
        '#default_value' => $this->configuration['random_text'],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['random_text'] = $form_state->getValue('random_text');
  }


  /**
   * {@inheritdoc}
   */
  public function build()
  {
    return [
      '#markup' => $this->configuration['random_text'],
    ];
  }
}
