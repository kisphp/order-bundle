<?php

namespace Kisphp\OrderBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Kisphp\Entity\KisphpEntityInterface;

/**
 * @ORM\MappedSuperclass()
 * @ORM\Table(name="sales", options={"collate": "utf8_general_ci", "charset": "utf8"})
 * @ORM\HasLifecycleCallbacks()
 */
class SalesEntity implements KisphpEntityInterface, SalesEntityInterface
{
    /**
     * @var string
     *
     * @ORM\Column(type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=true, options={"unsigned": true})
     */
    protected $id_user;

    /**
     * @var SalesItemEntity
     *
     * @ORM\OneToMany(targetEntity="SalesItemEntity", mappedBy="order")
     */
    protected $items;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", options={"unsigned": true})
     */
    protected $status = 1;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $registered;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $company_name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $company_cif;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $company_reg_num;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $customer_name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $customer_address;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $customer_phone;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $customer_country;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $customer_city;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $customer_email;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    /**
     * @ORM\PrePersist()
     */
    public function updateModifiedDatetime()
    {
        if ($this->registered === null) {
            $this->setRegistered(new \DateTime());
        }
    }

    /**
     * @return \DateTime
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * @param \DateTime $registered
     */
    public function setRegistered(\DateTime $registered)
    {
        $this->registered = $registered;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param int $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return SalesItemEntity
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param SalesItemEntity $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customer_name;
    }

    /**
     * @param string $customer_name
     */
    public function setCustomerName($customer_name)
    {
        $this->customer_name = $customer_name;
    }

    /**
     * @return string
     */
    public function getCustomerAddress()
    {
        return $this->customer_address;
    }

    /**
     * @param string $customer_address
     */
    public function setCustomerAddress($customer_address)
    {
        $this->customer_address = $customer_address;
    }

    /**
     * @return string
     */
    public function getCustomerPhone()
    {
        return $this->customer_phone;
    }

    /**
     * @param string $customer_phone
     */
    public function setCustomerPhone($customer_phone)
    {
        $this->customer_phone = $customer_phone;
    }

    /**
     * @return string
     */
    public function getCustomerCountry()
    {
        return $this->customer_country;
    }

    /**
     * @param string $customer_country
     */
    public function setCustomerCountry($customer_country)
    {
        $this->customer_country = $customer_country;
    }

    /**
     * @return string
     */
    public function getCustomerCity()
    {
        return $this->customer_city;
    }

    /**
     * @param string $customer_city
     */
    public function setCustomerCity($customer_city)
    {
        $this->customer_city = $customer_city;
    }

    /**
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->customer_email;
    }

    /**
     * @param string $customer_email
     */
    public function setCustomerEmail($customer_email)
    {
        $this->customer_email = $customer_email;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * @param string $company_name
     */
    public function setCompanyName($company_name)
    {
        $this->company_name = $company_name;
    }

    /**
     * @return string
     */
    public function getCompanyCif()
    {
        return $this->company_cif;
    }

    /**
     * @param string $company_cif
     */
    public function setCompanyCif($company_cif)
    {
        $this->company_cif = $company_cif;
    }

    /**
     * @return string
     */
    public function getCompanyRegNum()
    {
        return $this->company_reg_num;
    }

    /**
     * @param string $company_reg_num
     */
    public function setCompanyRegNum($company_reg_num)
    {
        $this->company_reg_num = $company_reg_num;
    }
}
