<?php

namespace Drupal\custom_drush_command\Commands;

use Consolidation\OutputFormatters\StructuredData\RowsOfFields;
use Drush\Commands\DrushCommands;

/**
 * A Drush commandfile.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 *
 * See these files for an example of injecting Drupal services:
 *   - http://cgit.drupalcode.org/devel/tree/src/Commands/DevelCommands.php
 *   - http://cgit.drupalcode.org/devel/tree/drush.services.yml
 */
class CustomDrushCommandCommands extends DrushCommands {
/**
   * Echos back hello with the argument provided.
   *
   * @param string $name
   *   Argument provided to the drush command.
   *
   * @command hello
   * @aliases hi
   * @options arr An option that takes multiple values.
   * @options msg Whether or not an extra message should be displayed to the user.
   * @usage drush9_example:hello akanksha --msg
   *   Display 'Hello Akanksha!' and a message.
   */
  public function hello($name, $options = ['msg' => FALSE]) {
    if ($options['msg']) {
      $this->output()->writeln('Hello ' . $name . '! This is your first Drush 9 command.');
    }
    else {
      $this->output()->writeln('Hello ' . $name . '!');
    }
  }

  // /**
  //  * Command description here.
  //  *
  //  * @param $arg1
  //  *   Argument description.
  //  * @param array $options
  //  *   An associative array of options whose values come from cli, aliases, config, etc.
  //  * @option option-name
  //  *   Description
  //  * @usage custom_drush_command-commandName foo
  //  *   Usage description
  //  *
  //  * @command custom_drush_command:commandName
  //  * @aliases foo
  //  */ 
  // public function commandName($arg1, $options = ['option-name' => 'default']) {
  //   $this->logger()->success(dt('Achievement unlocked.'));
  // }

  // /**
  //  * An example of the table output format.
  //  *
  //  * @param array $options An associative array of options whose values come from cli, aliases, config, etc.
  //  *
  //  * @field-labels
  //  *   group: Group
  //  *   token: Token
  //  *   name: Name
  //  * @default-fields group,token,name
  //  *
  //  * @command custom_drush_command:token
  //  * @aliases token
  //  *
  //  * @filter-default-field name
  //  * @return \Consolidation\OutputFormatters\StructuredData\RowsOfFields
  //  */
  // public function token($options = ['format' => 'table']) {
  //   $all = \Drupal::token()->getInfo();
  //   foreach ($all['tokens'] as $group => $tokens) {
  //     foreach ($tokens as $key => $token) {
  //       $rows[] = [
  //         'group' => $group,
  //         'token' => $key,
  //         'name' => $token['name'],
  //       ];
  //     }
  //   }
  //   return new RowsOfFields($rows);
  // }
}
