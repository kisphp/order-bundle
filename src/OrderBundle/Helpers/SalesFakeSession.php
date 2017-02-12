<?php

namespace Kisphp\OrderBundle\Helpers;

use Symfony\Component\HttpFoundation\Session\SessionBagInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Storage\MetadataBag;

class SalesFakeSession implements SessionInterface
{
    /**
     * @var array
     */
    protected $context = [];

    /**
     * @param string $name
     *
     * @return bool
     */
    public function has($name)
    {
        return array_key_exists($name, $this->context);
    }

    /**
     * @param string $name
     * @param null $default
     *
     * @return mixed|null
     */
    public function get($name, $default = null)
    {
        if (empty($this->context[$name])) {
            return $default;
        }

        return $this->context[$name];
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function set($name, $value)
    {
        $this->context[$name] = $value;
    }

    /**
     * @return bool
     */
    public function isStarted()
    {
        return true;
    }

    public function start()
    {
        // TODO: Implement start() method.
    }

    public function getId()
    {
        // TODO: Implement getId() method.
    }

    public function setId($id)
    {
        // TODO: Implement setId() method.
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }

    public function setName($name)
    {
        // TODO: Implement setName() method.
    }

    public function invalidate($lifetime = null)
    {
        // TODO: Implement invalidate() method.
    }

    public function migrate($destroy = false, $lifetime = null)
    {
        // TODO: Implement migrate() method.
    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function replace(array $attributes)
    {
        // TODO: Implement replace() method.
    }

    public function remove($name)
    {
        // TODO: Implement remove() method.
    }

    public function clear()
    {
        // TODO: Implement clear() method.
    }

    public function registerBag(SessionBagInterface $bag)
    {
        // TODO: Implement registerBag() method.
    }

    public function getBag($name)
    {
        // TODO: Implement getBag() method.
    }

    public function getMetadataBag()
    {
        // TODO: Implement getMetadataBag() method.
    }

}
