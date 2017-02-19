<?php

namespace StudyApp\Domain\Gnavi\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Rest")
 */
class Rest {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="gnavi_id", type="string", length=255, unique=true)
     *
     * @Assert\NotBlank()
     */
    private $gnaviId;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(name="name_kana", type="string", length=255)
     *
     * @Assert\NotBlank()
     */
    private $nameKana;

    /**
     * @ORM\Column(name="tel", type="string", length=20)
     *
     */
    private $tel;

    /**
     * @ORM\Column(name="address", type="string", length=255)
     *
     */
    private $address;

    public function setGnaviId($gnaviId)
    {
        $this->gnaviId = $gnaviId;

        return $this;
    }

    public function getGnaviId()
    {
        return $this->gnaviId;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setNameKana($nameKana)
    {
        $this->nameKana = $nameKana;

        return $this;
    }

    public function getNameKana()
    {
        return $this->nameKana;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }
}
