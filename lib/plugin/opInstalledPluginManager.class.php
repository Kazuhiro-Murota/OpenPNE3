<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * opInstalledPluginManager allows you to manage installed OpenPNE plugins.
 *
 * @package    OpenPNE
 * @subpackage plugin
 * @author     Kousuke Ebihara <ebihara@tejimaya.com>
 */
class opInstalledPluginManager
{
  public function getInstalledPlugins()
  {
    $result = array();

    $plugins = sfContext::getInstance()->getConfiguration()->getAllOpenPNEPlugins();
    foreach ($plugins as $pluginName)
    {
      $result[$pluginName] = $this->getPluginInstance($pluginName);
    }

    return $result;
  }

  public function getPluginInstance($plugin)
  {
    return opPlugin::getInstance($plugin);
  }

  static public function getAdminInviteAuthPlugins()
  {
    $plugins = sfContext::getInstance()->getConfiguration()->getEnabledAuthPlugin();
    $plugins = array_unique($plugins);
    $result = array();

    foreach ($plugins as $pluginName)
    {
      $endPoint = strlen($pluginName) - strlen('opAuth') - strlen('Plugin');
      $authMode = substr($pluginName, strlen('opAuth'), $endPoint);

      $adapterClass = sfOpenPNESecurityUser::getAuthAdapterClassName($authMode);
      $adapter = new $adapterClass($authMode);
      if (!$adapter->getAuthConfig('admin_invite'))
      {
        continue;
      }

      $result[] = $authMode;
    }

    return $result;
  }
}
