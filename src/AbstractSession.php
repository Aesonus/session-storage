<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Aesonus\Session;

/**
 * {@inheritdoc}
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
abstract class AbstractSession implements Contracts\SessionInterface
{

    protected $key;
    protected $session;
    
    public function __construct()
    {
        $this->session = &$_SESSION;
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
        return isset($this->session[$this->key]);
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
