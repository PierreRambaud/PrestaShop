<?php
/**
 * 2007-2019 PrestaShop SA and Contributors
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
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace Tests\Core\Addon;

use PHPUnit\Framework\TestCase;
use PrestaShop\PrestaShop\Core\Addon\AddonListFilter;
use PrestaShop\PrestaShop\Core\Addon\AddonListFilterOrigin;
use PrestaShop\PrestaShop\Core\Addon\AddonListFilterStatus;
use PrestaShop\PrestaShop\Core\Addon\AddonListFilterType;

class AddonListFilterTest extends TestCase
{
    /**
     * @var AddonListFilter
     */
    private $filter;

    public function setUp()
    {
        $this->filter = new AddonListFilter();
        $this->filter->setOrigin(0);
        $this->filter->setStatus(0);
        $this->filter->setType(0);
    }

    /**
     * @dataProvider getOrigins
     */
    public function testAddOrigin(array $origins)
    {
        foreach ($origins as $origin) {
            $this->filter->addOrigin($origin);
        }

        // Check after everything have been compute
        foreach ($origins as $origin) {
            $this->assertTrue($this->filter->hasOrigin($origin));
        }
    }

    public function testOriginWithChainedAction()
    {
        $this->filter->addOrigin(AddonListFilterOrigin::DISK);
        $this->assertTrue($this->filter->hasOrigin(AddonListFilterOrigin::DISK));
        $this->filter->removeOrigin(AddonListFilterOrigin::DISK);
        $this->assertFalse($this->filter->hasOrigin(AddonListFilterOrigin::DISK));
        $this->filter->setOrigin(AddonListFilterOrigin::DISK);
        $this->assertTrue($this->filter->hasOrigin(AddonListFilterOrigin::DISK));
    }

    public function getOrigins()
    {
        return [
            [[AddonListFilterOrigin::ADDONS_NATIVE]],
            [[AddonListFilterOrigin::DISK, AddonListFilterOrigin::ADDONS_NATIVE]],
            [[AddonListFilterOrigin::DISK & AddonListFilterOrigin::ADDONS_NATIVE]],
        ];
    }


    /**
     * @dataProvider getStatuses
     */
    public function testAddStatus(array $statuses)
    {
        foreach ($statuses as $status) {
            $this->filter->addStatus($status);
        }

        // Check after everything have been compute
        foreach ($statuses as $status) {
            $this->assertTrue($this->filter->hasStatus($status));
        }
    }

    public function testStatusWithChainedAction()
    {
        $this->filter->addStatus(AddonListFilterStatus::ON_DISK);
        $this->assertTrue($this->filter->hasStatus(AddonListFilterStatus::ON_DISK));
        $this->filter->removeStatus(AddonListFilterStatus::ON_DISK);
        $this->assertFalse($this->filter->hasStatus(AddonListFilterStatus::ON_DISK));
        $this->filter->setStatus(AddonListFilterStatus::ON_DISK);
        $this->assertTrue($this->filter->hasStatus(AddonListFilterStatus::ON_DISK));
    }

    public function getStatuses()
    {
        return [
            [[AddonListFilterStatus::NOT_ON_DISK]],
            [[AddonListFilterStatus::ON_DISK, AddonListFilterStatus::INSTALLED]],
            [[AddonListFilterStatus::ON_DISK & AddonListFilterStatus::INSTALLED]],
        ];
    }

    /**
     * @dataProvider getTypes
     */
    public function testAddType(array $types)
    {
        foreach ($types as $type) {
            $this->filter->addType($type);
        }

        // Check after everything have been compute
        foreach ($types as $type) {
            $this->assertTrue($this->filter->hasType($type));
        }
    }

    public function testTypeWithChainedAction()
    {
        $this->filter->addType(AddonListFilterType::THEME);
        $this->assertTrue($this->filter->hasType(AddonListFilterType::THEME));
        $this->filter->removeType(AddonListFilterType::THEME);
        $this->assertFalse($this->filter->hasType(AddonListFilterType::THEME));
        $this->filter->setType(AddonListFilterType::THEME);
        $this->assertTrue($this->filter->hasType(AddonListFilterType::THEME));
    }

    public function getTypes()
    {
        return [
            [[AddonListFilterType::THEME]],
            [[AddonListFilterType::THEME, AddonListFilterType::MODULE]],
            [[AddonListFilterType::THEME & AddonListFilterType::MODULE]],
        ];
    }
}
