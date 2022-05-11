<?php

/**
 * @file
 * Contains \Drupal\video_embed_youku\Plugin\video_embed_field\Provider\Youku.
 */

namespace Drupal\video_embed_youku\Plugin\video_embed_field\Provider;

use Drupal\video_embed_field\ProviderPluginBase;

/**
 * @VideoEmbedProvider(
 *   id = "youku",
 *   title = @Translation("Youku")
 * )
 */
class Youku extends ProviderPluginBase {

  /**
   * {@inheritdoc}
   */
  public function renderEmbedCode($width, $height, $autoplay) {
    return [
      '#type' => 'html_tag',
      '#tag' => 'iframe',
      '#attributes' => [
        'width' => $width,
        'height' => $height,
        'frameborder' => '0',
        'allowfullscreen' => 'allowfullscreen',
        'src' => sprintf('https://player.youku.com/embed/%s?autoplay=%d', $this->getVideoId(), $autoplay),
      ],
    ];
  }

  /**
   * Get the Youku oEmbed data.
   *
   * @return array
   *   An array of data from the Youku endpoint.
   */
  protected function oEmbedData() {
    return json_decode(file_get_contents(sprintf('https://api.youku.com/videos/show.json?client_id=8d025b9c897b22a8&video_id=%s', $this->getVideoId())));
  }

  /**
   * Get the Youku video thumbnail url.
   */
  public function getRemoteThumbnailUrl() {
    return $this->oEmbedData()->bigThumbnail;
  }

  /**
   * Get the Youku video title.
   */
  public function getName() {
    return $this->oEmbedData()->title;
  }

  /**
   * Get the Youku video description.
   */
  public function getDescription() {
    return $this->oEmbedData()->description;
  }

  /**
   * Get the Youku id from page url.
   */
  public static function getIdFromInput($input) {
    $id = FALSE;
    // Parse_url is an easy way to break a url into its components.
    $parsed = parse_url($input);
    $path = $parsed['path'];
    $parts = explode('/', $path);
    foreach ($parts as $part) {
      if (strstr($part, 'id_')) {
        $id = str_replace('id_', '', $part);
        $id = str_replace('.html', '', $id);
        return $id;
      }
    }
  }

}
