<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Aesonus\Session;

/**
 * A basic session to override if desired
 *
 * @author Aesonus
 */
abstract class AbstractSession implements Contracts\SessionInterface
{
    /**
     * {@inheritdoc}
     */
    public function get($key)
    {
        return $this->has($key) ? $_SESSION[$key] : null;
    }
    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        return isset($_SESSION[$key]);
    }
    /**
     * {@inheritdoc}
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
        return $this;
    }
    /**
     * {@inheritdoc}
     */
    public function clear($key)
    {
        unset($_SESSION[$key]);
        return $this;
    }
}
