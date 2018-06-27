<?php
/*
 * This file is part of the session-storage package
 * 
 *  (c) Cory Laughlin <corylcomposinger@gmail.com>
 * 
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Aesonus\Session;

/**
 * {@inheritdoc}
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
class Session implements Contracts\SessionInterface
{

    protected $key;
    protected $session;

    public function __construct(&$session_var = null)
    {
        $this->setup($session_var);
    }

    public function setup(&$session_var = null)
    {
        if (!isset($session_var)) {
            $this->session = &$_SESSION;
        } else {
            $this->session = &$session_var;
        }
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    public function getKey()
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function hasKey()
    {
        return isset($this->key);
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        unset($this->session[$this->key]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function get()
    {
        return $this->has() ? $this->session[$this->key] : NULL;
    }

    /**
     * {@inheritdoc}
     */
    public function has()
    {
        return key_exists($this->key, $this->session) && isset($this->session[$this->key]);
    }

    /**
     * {@inheritdoc}
     */
    public function set($value)
    {
        $this->session[$this->key] = $value;
        return $this;
    }
}