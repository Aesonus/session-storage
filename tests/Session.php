<?php
/*
 * This file is part of the session-storage package
 * 
 *  (c) Cory Laughlin <corylcomposinger@gmail.com>
 * 
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Aesonus\Tests;

/**
 * Class to test project
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
class Session extends \Aesonus\Session\AbstractSession
{
    public function __construct()
    {
        $this->session = [];
    }
}
