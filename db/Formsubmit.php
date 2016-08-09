<?php

namespace db;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formsubmit
 *
 * @ORM\Table(name="formSubmit")
 * @ORM\Entity
 */
class Formsubmit
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Formsubmitdata", mappedBy="formsubmit", cascade={"persist", "remove"})
     */
    private $formsubmitdata;

    /**
     * @return mixed
     */
    public function getFormsubmitdata() {
        return $this->formsubmitdata;
    }

    public function addFormsubmitdata(Formsubmitdata $formsubmitdata) {
        $this->formsubmitdata[] = $formsubmitdata;
        $formsubmitdata->setFormsubmit($this);
    }

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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Formsubmit
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
