<?php

declare(strict_types=1);

namespace Olivia\OsInfo;

use mysqli;
use Linfo\Linfo;

/**
 *	Class OSInfo
 *
 *	@link		https://anomaly.ink
 *
 *	@author		Anomaly lab, Inc <support@anomaly.ink>
 *	@author		Olivia Fu <olivia.fu@anomaly.ink>
 *	@author		Bill Li <bill.li@anomaly.ink>
 *
 *	@package	Olivia\OsInfo\OSInfo
 */
class OSInfo
{
	/**
	 * The Linfo instance.
	 *
	 * @var Linfo
	 */
	protected $linfo;

	/**
	 *	Created an a OSInfo.
	 *
	 *	@param		Linfo		$linfo
	 */
	public function __construct(Linfo $linfo)
	{
		$this->linfo = $linfo;
	}

	/**
	 * Return the CPU information.
	 *
	 * @return string
	 */
	public function getCpu() : string
	{
		$cpu = $this->linfo->getCPU();

		return implode(
			' ',
			[
				$cpu[0]['Model'],
				$cpu[0]['MHz'],
				$cpu[0]['Vendor']
			]
		);
	}

	/**
	 * Return the OS info.
	 *
	 * @return string
	 */
	public function getServer() : string
	{
		return $this->linfo->getModel() .' '. $this->linfo->getOS();
	}

	/**
	 * Return memory size.
	 *
	 * @return string
	 */
	public function getMemory() : string
	{
		$memory = $this->linfo->getRam();

		return $memory['type'] . ' ' . ceil((int) $memory['total']/(1024*1024*1024)) . 'GB';
	}

	/**
	 *	Return the MySQL version.
	 *
	 * @param  string      $host
	 * @param  string      $username
	 * @param  string|null $password
	 *
	 * @return string
	 */
	public function getMysqlVersion(string $host = '127.0.0.1', string $username = 'root', ?string $password = null) : string
	{
		return (
			new mysqli($host, $username, $password)
		)->server_info,
	}

	/**
	 *	Return the PHP version.
	 *
	 * @return string
	 */
	public function getPHPVersion()
	{
		return phpversion();
	}

	/**
	 *	Return upload max file size.
	 *
	 * @return	string
	 */
	public function getUploadMaxFileSize()
	{
		return ini_get('upload_max_filesize');
	}
}