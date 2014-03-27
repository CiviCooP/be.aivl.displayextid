<?php

require_once 'displayextid.civix.php';

/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function displayextid_civicrm_config(&$config) {
  _displayextid_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function displayextid_civicrm_xmlMenu(&$files) {
  _displayextid_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function displayextid_civicrm_install() {
  return _displayextid_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function displayextid_civicrm_uninstall() {
  return _displayextid_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function displayextid_civicrm_enable() {
  return _displayextid_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function displayextid_civicrm_disable() {
  return _displayextid_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function displayextid_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _displayextid_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function displayextid_civicrm_managed(&$entities) {
  return _displayextid_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function displayextid_civicrm_caseTypes(&$caseTypes) {
  _displayextid_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function displayextid_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _displayextid_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

function displayextid_civicrm_summary( $contactID, &$content, &$contentPlacement = CRM_Utils_Hook::SUMMARY_BELOW )
{
  try { 
    $result = civicrm_api3('Contact', 'getsingle', array('id' => $contactID));
  
    if (isset($result['external_identifier'])) {
      $extId = '<div class=\"crm-summary-row\"><div class=\"crm-label\">External Identifier</div><div class=\"crm-content\"><span class=\"crm-contact-external_id\">'.$result['external_identifier']."</span></div></div>";
    
      $content .= '<script type="text/javascript">' . PHP_EOL;
      $content .= 'cj( document ).ready(function() {' . PHP_EOL;
      $content .= 'var parent_el_contact_id = cj("#contact-summary .crm-summary-block .crm-contact-contact_id").parent().parent();' . PHP_EOL;
      $content .= 'parent_el_contact_id.before("'.$extId.'");' . PHP_EOL;
      $content .= '});' . PHP_EOL;
      $content .= '</script>' . PHP_EOL;
    }
  } catch (Exception $e) {
    
  }
}