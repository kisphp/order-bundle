<?php

namespace Kisphp\OrderBundle\Model;

use Doctrine\ORM\EntityManagerInterface;
use Kisphp\Model\AbstractModel;
use Kisphp\OrderBundle\Entity\SalesEntity;
use Kisphp\OrderBundle\Entity\SalesEntityInterface;
use Kisphp\OrderBundle\Exceptions\MethodNotFound;

abstract class SalesModel extends AbstractModel implements SalesModelInterface
{
    const REPOSITORY = 'OrderBundle:SalesEntity';

    /**
     * @var FactoryModelInterface
     */
    protected $factory;

    /**
     * @param EntityManagerInterface $em
     * @param FactoryModelInterface $factoryModel
     */
    public function __construct(EntityManagerInterface $em, FactoryModelInterface $factoryModel)
    {
        parent::__construct($em);

        $this->factory = $factoryModel;
    }

    /**
     * @param array $formData
     *
     * @throws MethodNotFound
     *
     * @return SalesEntity
     */
    public function createFromFormData(array $formData)
    {
        $method = 'populate' . ucfirst($formData['type']);

        if (!method_exists($this, $method)) {
            throw new MethodNotFound();
        }

        $salesEntity = call_user_func_array([$this, $method], [$formData]);

        $this->save($salesEntity);

        return $salesEntity;
    }

    /**
     * @param array $formData
     *
     * @return SalesEntity
     */
    protected function populatePerson($formData)
    {
        $salesEntity = $this->createSalesEntity();
        $salesEntity->setType(SalesEntity::TYPE_PERSON);

        $salesEntity->setAddress($formData['address']);
        $salesEntity->setName($formData['name']);
        $salesEntity->setPhone($formData['phone']);
        $salesEntity->setEmail($formData['email']);

        return $salesEntity;
    }

    /**
     * @param array $formData
     *
     * @return SalesEntity
     */
    protected function populateCompany(array $formData)
    {
        $salesEntity = $this->createSalesEntity();
        $salesEntity->setType(SalesEntity::TYPE_COMPANY);

        $salesEntity->setCompanyName($formData['company_name']);
        $salesEntity->setCompanyCif($formData['company_cif']);
        $salesEntity->setCompanyRegNum($formData['company_reg']);
        $salesEntity->setAddress($formData['address']);
        $salesEntity->setName($formData['name']);
        $salesEntity->setPhone($formData['phone']);
        $salesEntity->setEmail($formData['email']);

        return $salesEntity;
    }

    /**
     * @return SalesEntity
     */
    protected function createSalesEntity()
    {
        return new SalesEntity();
    }

    /**
     * @return SalesEntityInterface
     */
    protected function getCartBySessionId()
    {
        /** @var SalesEntityInterface $order */
        $order = $this->getRepository()->findOneBy([
            'session_id' => $this->factory->getSession()->getId(),
        ]);

        if ($order === null) {
            $order = $this->createSalesEntity();

            $this->save($order);
        }

        return $order;
    }

    /**
     * @return array
     */
    public function getSalesList()
    {
        return $this->getRepository()->findAll();
    }
}
