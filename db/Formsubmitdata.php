<?php

namespace db;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formsubmitdata
 *
 * @ORM\Table(name="formSubmitData", indexes={@ORM\Index(name="fk_table1_formSubmit_idx", columns={"formSubmit_id"})})
 * @ORM\Entity
 */
class Formsubmitdata
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=true)
     */
    private $value;

    /**
     * @var \Formsubmit
     *
     * @ORM\ManyToOne(targetEntity="Formsubmit", inversedBy="formsubmitdata")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="formSubmit_id", referencedColumnName="id")
     * })
     */
    private $formsubmit;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Formsubmitdata
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Formsubmitdata
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set formsubmit
     *
     * @param \Formsubmit $formsubmit
     *
     * @return Formsubmitdata
     */
    public function setFormsubmit(Formsubmit $formsubmit = null)
    {
        $this->formsubmit = $formsubmit;

        return $this;
    }

    /**
     * Get formsubmit
     *
     * @return \Formsubmit
     */
    public function getFormsubmit()
    {
        return $this->formsubmit;
    }
}
