<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
