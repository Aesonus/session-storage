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
 * Abstraction for a session object that can read and write to a session array
 * with a fluent interface
 * @author Aesonus <corylcomposinger at gmail.com>
 */
interface SessionInterface
{
    
    /**
     * Set the session property to $session_var reference. Set session
     * property to $_SESSION reference if $session_var not provided.
     * @param array|null $session_var [optional]
     * @return $this for fluency
     */
    public function setup(&$session_var = NULL);
    
    /**
     * Sets the key that this object accesses in the session superglobal
     * @param mixed $key Key to read/write to
     * @return $this for fluency
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
     * Get data from the session superglobal at previously set key
     * @return mixed
     */
    public function get();

    /**
     * Sets data to the session superglobal at previously set key
     * @param mixed $value
     * @return $this  for fluency
     */
    public function set($value);

    /**
     * Returns whether there is data stored in the session superglobal at previously set key
     * @return boolean
     */
    public function has();

    /**
     * Clear data from the session superglobal at previously set key
     * @return $this for fluency
     */
    public function clear();
}
