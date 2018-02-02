<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Aesonus\Session\Contracts;

/**
 *
 * @author Aesonus
 */
interface SessionInterface
{
    /**
     * Gets a value from $_SESSION superglobal with key
     * @param string $key Key to fetch from
     * @return mixed 
     */
    public function get($key);
    
    /**
     * Sets a value from $_SESSION superglobal
     * @param string $key Key to set to
     * @param mixed $value Value to store
     * @return $this 
     */
    public function set($key, $value);
    
    /**
     * Has a key in $_SESSION superglobal
     * @param string $key Key to set to
     * @return boolean 
     */
    public function has($key);    
    
    /**
     * Destroy a key in $_SESSION superglobal
     * @param string $key Key to clear from
     * @return $this 
     */
    public function clear($key);
    
}
