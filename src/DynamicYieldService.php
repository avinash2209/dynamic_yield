<?php

namespace Drupal\dynamic_yield;

use Drupal\Core\Config\ConfigFactoryInterface;

/**
 * Class DynamicYieldService.
 *
 * @package Drupal\dynamic_yield
 */
class DynamicYieldService implements DynamicYieldServiceInterface {

  /**
   * Dynamic yield dynamic base code.
   */
  const DYNAMIC_YEILD_DYNAMIC_SCRIPT_CODE = '//cdn-eu.dynamicyield.com/api/{{site_id}}/api_dynamic.js';

  /**
   * Dynamic yield static base code.
   */
  const DYNAMIC_YEILD_STATIC_SCRIPT_CODE = '//cdn-eu.dynamicyield.com/api/{{site_id}}/api_static.js';

  /**
   * The config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * DynamicYieldService constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   */
  public function getDynamicYieldDynamicScriptCode() {
    $dynamic_yield_dynamic_script_code = str_replace('{{site_id}}', $this->configFactory->get('dynamic_yield.settings')->get('site_id'), self::DYNAMIC_YEILD_DYNAMIC_SCRIPT_CODE);

    return $dynamic_yield_dynamic_script_code;
  }

  /**
   * {@inheritdoc}
   */
  public function getDynamicYieldStaticScriptCode() {
    $dynamic_yield_static_script_code = str_replace('{{site_id}}', $this->configFactory->get('dynamic_yield.settings')->get('site_id'), self::DYNAMIC_YEILD_STATIC_SCRIPT_CODE);

    return $dynamic_yield_static_script_code;
  }

}
