<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Aesonus\Session;

/**
 * Abstract implementation of SingleSessionInterface
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
abstract class AbstractSingleSession implements Contracts\SingleSessionInterface
{

    protected $key;

    /**
     * {@inheritdoc}
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        unset($_SESSION[$this->key]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function get()
    {
        return $this->has() ? $_SESSION[$this->key] : NULL;
    }

    /**
     * {@inheritdoc}
     */
    public function has()
    {
        return isset($_SESSION[$this->key]);
    }

    /**
     * {@inheritdoc}
     */
    public function set($value)
    {
        $_SESSION[$this->key] = $value;
        return $this;
    }
}
