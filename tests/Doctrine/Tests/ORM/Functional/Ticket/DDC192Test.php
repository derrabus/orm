<?php

namespace Doctrine\Tests\ORM\Functional\Ticket;

use Doctrine\Tests\OrmFunctionalTestCase;

/**
 * @group DDC-192
 */
class DDC192Test extends OrmFunctionalTestCase
{
    public function testSchemaCreation()
    {
        $this->_schemaTool->createSchema(
            [
                $this->_em->getClassMetadata(DDC192User::class),
                $this->_em->getClassMetadata(DDC192Phonenumber::class)
            ]
        );
    }
}

/**
 * @Entity
 * @Table(name="ddc192_users")
 */
class DDC192User
{
    /**
     * @Id
     * @Column(name="id", type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @Column(name="name", type="string")
     */
    public $name;
}


/**
 * @Entity
 * @Table(name="ddc192_phonenumbers")
 */
class DDC192Phonenumber
{
    /**
     * @Id
     * @Column(name="phone", type="string", length=40)
     */
    protected $phone;

    /**
     * @Id
     * @ManyToOne(targetEntity="DDC192User")
     * @JoinColumn(name="userId", referencedColumnName="id")
     */
    protected $User;


    public function setPhone($value)
    {
        $this->phone = $value;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setUser(User $user)
    {
        $this->User = $user;
    }

    public function getUser()
    {
        return $this->User;
    }
}
