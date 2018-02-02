<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Aesonus\Session\Contracts;

/**
 * A session that uses a single key for all it's methods
 * @author Aesonus <corylcomposinger at gmail.com>
 */
interface SingleSessionInterface
{

    /**
     * Sets the key that this object accesses
     * @param string $key
     * @return $this Returns $this for chaining
     */
    public function setKey($key);

    /**
     * Get data from the session superglobal
     * @return mixed
     */
    public function get();

    /**
     * Sets data to the session superglobal
     * @param mixed $value
     * @return $this Returns $this for chaining
     */
    public function set($value);

    /**
     * Returns whether there is data stored in the session superglobal
     * @return boolean
     */
    public function has();

    /**
     * Clear data from the session superglobal
     * @return $this Returns $this for chaining
     */
    public function clear();
}
