<?php
/**
 * @file
 * Contains \Drupal\event_email\Form\SendEventForm.
 */
namespace Drupal\event_email\Form;

use Drupal\Core\Ajax\CloseModalDialogCommand;
use Drupal\Core\Ajax\InsertCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Mail\MailManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Mail\MailManagerInterface;
use Drupal\Component\Utility\EmailValidator;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Session\AccountProxy;

class SendEventForm extends FormBase {

  /**
   *
   * @var AccountProxy
   */
  protected $accountProxy;

  /**
   *
   * @var MailManagerInterface
   */
  protected $mailManager;

  /**
   *
   * @var EmailValidator
   */
  protected $emailValidator;

  /**
   *
   * @var LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * Constructs a new SendEventForm.
   *
   * @param MailManagerInterface $mail_manager
   * @param LanguageManagerInterface $language_manager
   * @param EmailValidator $email_validator
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

  /**
   * {@inheritdoc}
   */
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
    return 'resume_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['message'] = array(
      '#type' => 'markup',
      '#markup' => '<div class="form_msg"></div>',
      '#weight' => -2,
    );

    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Name:'),
      '#required' => TRUE,
      '#weight' => 0,
    );

    $form['friend_mail'] = array(
      '#type' => 'textfield',
      '#title' => t('Email:'),
      '#required' => TRUE,
      '#weight' => 1,
    );

    $form['actions'] = array(
      '#type' => 'button',
      '#value' => t("Send Emil"),
      '#ajax' => array(
        'callback' => '::sendEmail'
      ),
      '#weight' => 2,
    );
    $form['#attached']['library'][] = 'core/drupal.dialog.ajax';

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if ($form_state->getValue('name') === '' || $form_state->getValue('friend_mail') === '') {
      return array(
        'message' => $this->t('All fields are required.'),
        'valid' => false
      );
    }
    elseif (!filter_var($form_state->getValue('friend_mail'), FILTER_VALIDATE_EMAIL)) {
      return array(
        'message' => $this->t('Please enter valid email.'),
        'valid' => false
      );
    }
    else {
      return array(
        'message' => $this->t('Valid fields.'),
        'valid' => true
      );
    }
  }

  public function sendEmail(array &$form, FormStateInterface $form_state) {
    $isValid = $this->validateForm($form, $form_state);
    $response = new AjaxResponse();
    if ( !$isValid['valid'] ) {
      $response->addCommand(
        new HtmlCommand(
          '.form_msg',
          '<div class="form_msg">' . $isValid['message'] . '</div>'
        )
      );
    }
    else {
      $module = 'event_email';
      $key = 'general';
      $to = $form_state->getValue('friend_mail');
      $params['node_title'] = $form_state->getValue('title');
      $params['name'] = $form_state->getValue('name');
      $params['event_date'] = $form_state->getValue('event_date');
      $params['location'] = $form_state->getValue('location');
      $params['message'] = "Mail body";
      $params['link'] = $form_state->getValue('link');
      $langcode = $this->accountProxy->getPreferredLangcode();
      $send = true;
      $result = $this->mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);

      $response->addCommand(
        new HtmlCommand(
          '.form_msg',
          '<div class="form_msg">' . t("Successfully sent email") . '</div>'
        )
      );

      $response->addCommand(new CloseModalDialogCommand());
    }

    return $response;
  }

}
