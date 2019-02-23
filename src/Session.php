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

use Aesonus\Session\Contracts\SessionInterface;

/**
 * Responsible for setting session variable values at a specific key in a fluent
 * interface.
 *
 * @author Aesonus <corylcomposinger at gmail.com>
 */
class Session implements SessionInterface
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
    public function setKey(string $key): SessionInterface
    {
        $this->key = $key;
        $new = clone $this;

        return $new;
    }

    /**
     * {@inheritdoc}
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function hasKey(): bool
    {
        return isset($this->key);
    }

    /**
     * {@inheritdoc}
     */
    public function clear(): SessionInterface
    {
        unset($this->session[$this->key]);
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function get()
    {
        return $this->has() ? $this->session[$this->key] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function has(): bool
    {
        return isset($this->session[$this->key]);
    }

    /**
     * {@inheritdoc}
     */
    public function set($value): SessionInterface
    {
        $this->session[$this->key] = $value;
        return $this;
    }
}
