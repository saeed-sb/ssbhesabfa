<?php
/**
 * 2007-2020 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author    PrestaShop SA <contact@prestashop.com>
 *  @copyright 2007-2020 PrestaShop SA
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_0_9_4($module)
{
    if (!Configuration::updateValue('SSBHESABFA_INVOICE_RETURN_STATUE', 6) || !Configuration::updateValue('SSBHESABFA_INVOICE_REFERENCE_TYPE', 1)) {
        return false;
    }

    if (!$module->isRegisteredInHook('actionOrderStatusPostUpdate')) {
        $module->registerHook('actionOrderStatusPostUpdate');
    }

    if (file_exists(_PS_MODULE_DIR_.$module->name.'/classes/HesabfaApi.php')) {
        unlink(_PS_MODULE_DIR_.$module->name.'/classes/HesabfaApi.php');
    }

    if (file_exists(_PS_MODULE_DIR_.$module->name.'/classes/hesabfaAPI.php')) {
        unlink(_PS_MODULE_DIR_.$module->name.'/classes/hesabfaAPI.php');
    }

    return true;
}
