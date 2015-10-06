<?php
namespace ApacheSolrForTypo3\Tika\Tests\Unit\Service\Tika;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Ingo Renner <ingo@typo3.org>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use ApacheSolrForTypo3\Tika\Service\Tika\AppService;
use ApacheSolrForTypo3\Tika\Tests\Unit\ExecRecorder;


/**
 * Test case for class AppService
 *
 */
class AppServiceTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	protected function setUp() {
		ExecRecorder::reset();
	}

	/**
	 * Creates Tika App configuration
	 *
	 * @return array
	 */
	protected function getTikaAppConfiguration() {
		$tikaVersion = getenv('TIKA_VERSION') ? getenv('TIKA_VERSION') : '1.10';
		$tikaPath    = getenv('TIKA_PATH') ? getenv('TIKA_PATH') : '/opt/tika';

		return array(
			'tikaPath' => "$tikaPath/tika-app-$tikaVersion.jar",
		);
	}

	/**
	 * @test
	 */
	public function getTikaVersionUsesVParameter() {
		$service = new AppService($this->getTikaAppConfiguration());
		$service->getTikaVersion();

		$this->assertContains('-V', ExecRecorder::$execCommand);
	}

}