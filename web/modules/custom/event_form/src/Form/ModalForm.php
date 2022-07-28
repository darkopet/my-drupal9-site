<?php

namespace Drupal\event_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Component\Utility\EmailValidator;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Mail\MailManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Session\AccountProxy;

/**
 * ModalForm class.
 */
class ModalForm extends FormBase {

  /**
   *
   * @var AccountProxy
   */
  protected $accountProxy;

  /**
   * The mail manager.
   *
   * @var \Drupal\Core\Mail\MailManagerInterface
   */
  protected $mailManager;

  /**
   * @var $currentRouteService CurrentRouteMatch
   */
  protected $currentRouteService;

  /**
   * The email validator.
   *
   * @var \Drupal\Component\Utility\EmailValidator
   */
  protected $emailValidator;

  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;


  /**
   * Constructs a new EmailExampleGetFormPage.
   *
   * @param \Drupal\Core\Mail\MailManagerInterface $mail_manager
   *   The mail manager.
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager.
   * @param \Drupal\Component\Utility\EmailValidator $email_validator
   *   The email validator.
   * @param CurrentRouteMatch $currentRouteMatch
   *   The email validator.
   */
  public function __construct(
    AccountProxy $accountProxy,
    MailManagerInterface $mail_manager,
    LanguageManagerInterface $language_manager,
    EmailValidator $email_validator) {
    $this->mailManager = $mail_manager;
    $this->languageManager = $language_manager;
    $this->emailValidator = $email_validator;
    $this->accountProxy = $accountProxy;
  }

  public static function create(ContainerInterface $container) {
    $form = new static(
      $container->get('current_user'),
      $container->get('plugin.manager.mail'),
      $container->get('language_manager'),
      $container->get('email.validator')
    );
    $form->setMessenger($container->get('messenger'));
    $form->setStringTranslation($container->get('string_translation'));
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'modalform';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $options = NULL) {

    $form['#prefix'] = '<div id="modal_example_form">';
    $form['#suffix'] = '</div>';

        $form['message'] = array(
      '#type' => 'markup',
      '#markup' => '<div class="ajax_form_msg"></div>',
    );

    $form['title'] = array(
      '#type' => 'textfield',
      '#title' => t('Title:'),
      '#required' => FALSE,
    );

    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Name:'),
      '#required' => TRUE,
    );

    $form['email'] = array(
      '#type' => 'email',
      '#title' => t('Email:'),
      '#required' => TRUE,
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Send Email'),
      '#button_type' => 'primary',
      '#ajax' => array(
        'callback' => '::send'
      ),
    );

    $form['#attached']['library'][] = 'core/drupal.dialog.ajax';

    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if ($form_state->getValue('name') === '') {
      return array(
        'message' => $this->t('All Form fields are required.'),
        'valid' => false
      );
    } elseif (!$this->emailValidator->isValid($form_state->getValue('email'))) {
      if(!str_contains('email','.')) {
        return array(
          'message' => $this->t('Please enter valid email.'),
          'valid' => false
        );
      }
    }
    else {
      return array(
        'message' => $this->t('Successfully sent email'),
        'valid' => true
      );
    }
  }
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {}

  /**
   * {@inheritdoc}
   */
  public function send(array &$form, FormStateInterface $form_state): AjaxResponse
  {

    $isValid = $this->validateForm($form, $form_state);
    $response = new AjaxResponse();
    $module = 'event_form';
    $key = 'general';
    $to = $form_state->getValue('email');
    $params['node_title'] = $form_state->getValue('title');
    $params['name'] = $form_state->getValue('name');
    $params['event_date'] = $form_state->getValue('event_date');
    $params['location'] = $form_state->getValue('location');
    $params['message'] = "Mail body";
    $params['link'] = $form_state->getValue('link');
    $langcode = $this->accountProxy->getPreferredLangcode();
    $send = true;


    $result = $this->mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
    if ($result['result'] == TRUE) {
      $response->addCommand(
        new HtmlCommand(
          '.ajax_form_msg',
          '<div class="ajax_form_msg">' . $isValid['message'] . '</div>'
        )
      );
    }
    else {
      $response->addCommand(
        new HtmlCommand(
          '.ajax_form_msg',
          '<div class="ajax_form_msg">' . t("Successfully sent email") . '</div>'
        )
      );
    }

    return $response;
  }
}
