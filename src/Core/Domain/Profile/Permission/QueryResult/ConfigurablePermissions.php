<?php
/**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace PrestaShop\PrestaShop\Core\Domain\Profile\Permission\QueryResult;

class ConfigurablePermissions
{
    /**
     * @var array
     */
    private $profilePermissionsForTabs;

    /**
     * @var array
     */
    private $profiles;

    /**
     * @var array
     */
    private $tabs;

    /**
     * @var array
     */
    private $bulkConfiguration;

    /**
     * @var array
     */
    private $profilePermissionsForModules;

    /**
     * @var array
     */
    private $permissions;

    /**
     * @var array
     */
    private $permissionIds;

    /**
     * @var int
     */
    private $employeeProfileId;

    /**
     * @var bool
     */
    private $hasEmployeeEditPermission;

    /**
     * @param array $profilePermissionsForTabs
     * @param array $profilePermissionsForModules
     * @param array $profiles
     * @param array $tabs
     * @param array $bulkConfiguration
     * @param string[] $permissions
     * @param int[] $permissionIds
     * @param int $employeeProfileId
     * @param bool $hasEmployeeEditPermission
     */
    public function __construct(
        array $profilePermissionsForTabs,
        array $profilePermissionsForModules,
        array $profiles,
        array $tabs,
        array $bulkConfiguration,
        array $permissions,
        array $permissionIds,
        $employeeProfileId,
        $hasEmployeeEditPermission
    ) {
        $this->profilePermissionsForTabs = $profilePermissionsForTabs;
        $this->profiles = $profiles;
        $this->tabs = $tabs;
        $this->bulkConfiguration = $bulkConfiguration;
        $this->profilePermissionsForModules = $profilePermissionsForModules;
        $this->permissions = $permissions;
        $this->permissionIds = $permissionIds;
        $this->employeeProfileId = $employeeProfileId;
        $this->hasEmployeeEditPermission = $hasEmployeeEditPermission;
    }

    /**
     * @return array
     */
    public function getProfilePermissionsForTabs()
    {
        return $this->profilePermissionsForTabs;
    }

    /**
     * @return array
     */
    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     * @return array
     */
    public function getTabs()
    {
        return $this->tabs;
    }

    /**
     * @param int $profileId
     *
     * @return bool
     */
    public function isBulkViewConfigurationEnabled($profileId)
    {
        return $this->bulkConfiguration[$profileId]['view'];
    }

    /**
     * @param int $profileId
     *
     * @return bool
     */
    public function isBulkAddConfigurationEnabled($profileId)
    {
        return $this->bulkConfiguration[$profileId]['add'];
    }

    /**
     * @param int $profileId
     *
     * @return bool
     */
    public function isBulkEditConfigurationEnabled($profileId)
    {
        return $this->bulkConfiguration[$profileId]['edit'];
    }

    /**
     * @param int $profileId
     *
     * @return bool
     */
    public function isBulkDeleteConfigurationEnabled($profileId)
    {
        return $this->bulkConfiguration[$profileId]['delete'];
    }

    /**
     * @param int $profileId
     *
     * @return bool
     */
    public function isBulkAllConfigurationEnabled($profileId)
    {
        return $this->bulkConfiguration[$profileId]['all'];
    }

    /**
     * @return array
     */
    public function getProfilePermissionsForModules()
    {
        return $this->profilePermissionsForModules;
    }

    /**
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @return array
     */
    public function getPermissionIds()
    {
        return $this->permissionIds;
    }

    /**
     * @return int
     */
    public function getEmployeeProfileId()
    {
        return $this->employeeProfileId;
    }

    /**
     * @return bool
     */
    public function hasEmployeeEditPermission()
    {
        return $this->hasEmployeeEditPermission;
    }
}
