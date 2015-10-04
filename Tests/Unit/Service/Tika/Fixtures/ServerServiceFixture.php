<?php
namespace ApacheSolrForTypo3\Tika\Tests\Unit\Service\Tika\Fixtures;

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

use ApacheSolrForTypo3\Tika\Service\Tika\ServerService;


/**
 * Class ServerServiceFixture
 *
 */
class ServerServiceFixture extends ServerService {

	protected $recordedEndpoint = '';


	/**
	 * Records the requested endpoint
	 *
	 * @param string $endpoint
	 * @param resource $context optional stream context
	 * @return string Tika output
	 * @throws \Exception
	 */
	protected function queryTika($endpoint, $context = NULL) {
		$this->recordedEndpoint = $endpoint;
	}

	/**
	 * @return string
	 */
	public function getRecordedEndpoint() {
		return $this->recordedEndpoint;
	}
}
