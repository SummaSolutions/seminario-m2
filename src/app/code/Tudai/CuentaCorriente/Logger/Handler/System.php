<?php
namespace Tudai\CuentaCorriente\Logger\Handler;

use Monolog\Logger;
/**
 * CronMonitor logger handler
 */
class System
    extends \Magento\Framework\Logger\Handler\Base
{
    /**
     * Logging level
     *
     * @var int
     */
    protected $loggerType = Logger::DEBUG;

    /**
     * File name
     *
     * @var string
     */
    protected $fileName = '/var/log/tudai.log';

}