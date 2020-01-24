<?php

namespace Drupal\dynamic_yield\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DynamicYieldSettingsForm.
 *
 * @package Drupal\dynamic_yield\Form
 */
class DynamicYieldSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dynamic_yield_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['dynamic_yield.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('dynamic_yield.settings');

    $form['basic_settings'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Basic settings'),
      '#open' => FALSE,
    ];

    $form['basic_settings']['site_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Site ID'),
      '#default_value' => $config->get('site_id'),
      '#required' => TRUE,
    ];

    $form['basic_settings']['exclude_admin_pages'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Exclude admin pages'),
      '#default_value' => $config->get('exclude_admin_pages'),
    ];

    $form['basic_settings']['excluded_roles'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Exclude Dynamic yield for the following roles'),
      '#options' => array_map('\Drupal\Component\Utility\Html::escape', user_role_names()),
      '#default_value' => $config->get('excluded_roles'),
    ];

    $form['#attached']['library'][] = 'dynamic_yield/dynamic_yield.admin';

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    $this->config('dynamic_yield.settings')
      ->set('site_id', $values['site_id'])
      ->set('exclude_admin_pages', $values['exclude_admin_pages'])
      ->set('excluded_roles', $values['excluded_roles'])
      ->save();

    parent::submitForm($form, $form_state);
  }

}
