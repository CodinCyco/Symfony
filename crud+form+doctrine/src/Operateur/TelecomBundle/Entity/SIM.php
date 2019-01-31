<?php

namespace Operateur\TelecomBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SIM
 *
 * @ORM\Table(name="s_i_m")
 * @ORM\Entity(repositoryClass="Operateur\TelecomBundle\Repository\SIMRepository")
 */
class SIM
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="numAppel", type="integer")
     */
    private $numAppel;

    /**
     * @var float
     *
     * @ORM\Column(name="solde", type="float")
     */
    private $solde;

    /**
     * @var float
     *
     * @ORM\Column(name="bonus", type="float")
     */
    private $bonus;
    /**
     * @ORM\ManyToOne(targetEntity="Abonnes")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $abonne;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numAppel
     *
     * @param integer $numAppel
     *
     * @return SIM
     */
    public function setNumAppel($numAppel)
    {
        $this->numAppel = $numAppel;

        return $this;
    }

    /**
     * Get numAppel
     *
     * @return int
     */
    public function getNumAppel()
    {
        return $this->numAppel;
    }

    /**
     * Set solde
     *
     * @param float $solde
     *
     * @return SIM
     */
    public function setSolde($solde)
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * Get solde
     *
     * @return float
     */
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * Set bonus
     *
     * @param float $bonus
     *
     * @return SIM
     */
    public function setBonus($bonus)
    {
        $this->bonus = $bonus;

        return $this;
    }

    /**
     * Get bonus
     *
     * @return float
     */
    public function getBonus()
    {
        return $this->bonus;
    }

    /**
     * Set abonne
     *
     * @param \Operateur\TelecomBundle\Entity\Abonnes $abonne
     *
     * @return SIM
     */
    public function setAbonne(\Operateur\TelecomBundle\Entity\Abonnes $abonne = null)
    {
        $this->abonne = $abonne;

        return $this;
    }

    /**
     * Get abonne
     *
     * @return \Operateur\TelecomBundle\Entity\Abonnes
     */
    public function getAbonne()
    {
        return $this->abonne;
    }
}
