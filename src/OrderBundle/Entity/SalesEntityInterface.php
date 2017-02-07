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
    public function getCustomerName();

    /**
     * @param string $customer_name
     */
    public function setCustomerName($customer_name);

    /**
     * @return string
     */
    public function getCustomerAddress();

    /**
     * @param string $customer_address
     */
    public function setCustomerAddress($customer_address);

    /**
     * @return string
     */
    public function getCustomerPhone();

    /**
     * @param string $customer_phone
     */
    public function setCustomerPhone($customer_phone);

    /**
     * @return string
     */
    public function getCustomerCountry();

    /**
     * @param string $customer_country
     */
    public function setCustomerCountry($customer_country);

    /**
     * @return string
     */
    public function getCustomerCity();

    /**
     * @param string $customer_city
     */
    public function setCustomerCity($customer_city);

    /**
     * @return string
     */
    public function getCustomerEmail();

    /**
     * @param string $customer_email
     */
    public function setCustomerEmail($customer_email);

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