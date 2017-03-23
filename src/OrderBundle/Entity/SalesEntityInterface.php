<?php

namespace Kisphp\OrderBundle\Entity;

interface SalesEntityInterface
{
    /**
     * @return \DateTime
     */
    public function getRegistered();

    /**
     * @param \DateTime $registered
     */
    public function setRegistered(\DateTime $registered);

    /**
     * @return string
     */
    public function getId();

    /**
     * @return int
     */
    public function getIdUser();

    /**
     * @param int $id_user
     */
    public function setIdUser($id_user);

    /**
     * @return SalesItemEntity
     */
    public function getItems();

    /**
     * @param SalesItemEntity $items
     */
    public function setItems($items);

    /**
     * @return int
     */
    public function getStatus();

    /**
     * @param int $status
     */
    public function setStatus($status);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @param string $address
     */
    public function setAddress($address);

    /**
     * @return string
     */
    public function getPhone();

    /**
     * @param string $phone
     */
    public function setPhone($phone);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getCompanyName();

    /**
     * @param string $company_name
     */
    public function setCompanyName($company_name);

    /**
     * @return string
     */
    public function getCompanyCif();

    /**
     * @param string $company_cif
     */
    public function setCompanyCif($company_cif);

    /**
     * @return string
     */
    public function getCompanyRegNum();

    /**
     * @param string $company_reg_num
     */
    public function setCompanyRegNum($company_reg_num);
}
