<?php

namespace Kisphp\OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Kisphp\Entity\KisphpEntityInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sales", options={"collate": "utf8_general_ci", "charset": "utf8"})
 * @ORM\Entity(repositoryClass="Kisphp\OrderBundle\Entity\Repository\SalesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class SalesEntity implements KisphpEntityInterface, SalesEntityInterface
{
    const TYPE_PERSON = 'person';
    const TYPE_COMPANY = 'company';

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned": true})
     * @ORM\GeneratedValue(strategy="AUTO")
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
     * @var string
     *
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    protected $type;

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
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $phone;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $email;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getCompanyUsername()
    {
        return $this->company_username;
    }

    /**
     * @param mixed $company_username
     */
    public function setCompanyUsername($company_username)
    {
        $this->company_username = $company_username;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
