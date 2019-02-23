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
     * MUST set the key that this object accesses in the session superglobal.
     * MUST return a new SessionInterface
     * @param string $key
     * @return SessionInterface
     */
    public function setKey(string $key): self;

    /**
     * MUST return whether the key has been set
     * @return bool
     */
    public function hasKey(): bool;

    /**
     * MUST return the key that was set or null
     * @return string|null
     */
    public function getKey(): ?string;

    /**
     * Get data from the session superglobal at previously set key
     * @return mixed
     */
    public function get();

    /**
     * Sets data to the session superglobal at previously set key
     * @param mixed $value
     * @return $this
     */
    public function set($value): self;

    /**
     * Returns whether there is data stored in the session superglobal at previously set key
     * @return bool
     */
    public function has(): bool;

    /**
     * Clear data from the session superglobal at previously set key
     * @return $this
     */
    public function clear(): self;
}
