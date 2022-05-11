<?php

namespace Drupal\brasilit2022_floatnavigation_widget\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'WidgetDeputados' Block.
 *
 * @Block(
 *   id = "brasilit2022_floatnavigation_widget_widget_block",
 *   admin_label = @Translation("Floating Navigation Block"),
 *   category = @Translation("brasilit2022_floatnavigation_widget"),
 * )
 */
class WidgetFloatNavigationBlock extends BlockBase
{
  /**
   * {@inheritdoc}
   */
  public function build()
  {
    return array(
      // '#markup' => $this->t('Hello, World!'),
      '#theme' => 'brasilit2022_floatnavigation_widget_widget_block'
    );
  }
}
