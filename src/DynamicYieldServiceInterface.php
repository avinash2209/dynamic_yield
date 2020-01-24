<?php

namespace Drupal\dynamic_yield;

/**
 * Interface DynamicYieldServiceInterface.
 */
interface DynamicYieldServiceInterface {

  /**
   * Gets Dynamic Yield script code.
   *
   * @return string
   *   The Dynamic Yield dynamic script code.
   */
  public function getDynamicYieldDynamicScriptCode();

  /**
   * Gets Dynamic Yield script code.
   *
   * @return string
   *   The Dynamic Yield static script code.
   */
  public function getDynamicYieldStaticScriptCode();

}
