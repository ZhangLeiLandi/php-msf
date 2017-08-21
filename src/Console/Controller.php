<?php
/**
 * Console Controller基类
 *
 * @author camera360_server@camera360.com
 * @copyright Chengdu pinguo Technology Co.,Ltd.
 */

namespace PG\MSF\Console;

use PG\MSF\Controllers\Controller as BController;

class Controller extends BController
{
    /**
     * Controller constructor.
     *
     * @param string $controllerName
     * @param string $methodName
     */
    public function __construct($controllerName, $methodName)
    {
        parent::__construct($controllerName, $methodName);
    }

    /**
     * 请求结束销毁
     */
    public function destroy()
    {
        if ($this->getContext()) {
            $this->getContext()->getLog()->pushLog('params', $this->getContext()->getInput()->getAllPostGet());
            $this->getContext()->getLog()->pushLog('status', '200');
        }
        parent::destroy();
        clearTimes();
        exit();
    }
}
