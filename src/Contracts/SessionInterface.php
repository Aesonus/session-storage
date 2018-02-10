<?php
/*
 * This file is part of the session-storage package
 * 
 *  (c) Cory Laughlin <corylcomposinger@gmail.com>
 * 
 * For full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace Aesonus\Session\Contracts;

/**
 * Abstraction for a session object that can only read and write a single key.
 * Keep in mind that this only supports accessing the first level of the session
 * superglobal
 * @author Aesonus <corylcomposinger at gmail.com>
 */
interface SessionInterface
{

    /**
     * Sets the key that this object accesses in the session superglobal
     * @param mixed $key Key to read/write to
     * @return $this Returns $this for chaining
     */
    public function setKey($key);
    
    /**
     * Returns whether the key has been set
     * @return boolean 
     */
    public function hasKey();
    
    /**
     * Must return the key that was set or null
     * @return mixed|null Must return the key that was set or null
     */
    public function getKey();

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
