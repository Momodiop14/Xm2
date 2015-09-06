<?php

namespace Xm\CovoiturageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trajet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Xm\CovoiturageBundle\Entity\TrajetRepository")
 */
class Trajet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix_trajet", type="integer")
     */
    private $prixTrajet;

    /**
     * @ORM\ManyToOne(targetEntity="Covoiturage",inversedBy="trajets")
     * @ORM\JoinColumn(onDelete="CASCADE")
     **/
    private $ref_covoiturage;

    /**
     * @var string
     *
     * @ORM\Column(name="localite_depart", type="string", length=100)
     */
    private $localiteDepart;

      /**
     * @var string
     *
     * @ORM\Column(name="localite_destination", type="string", length=100)
     */
    private $localiteDestination;

   /**
     * @ORM\ManyToMany(targetEntity="Reservation", inversedBy="trajets")
     * @ORM\JoinTable(name="trajet_reservation")
     **/
    private $reservations ;



     public function __construct() {
        $this->reservations = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set prixTrajet
     *
     * @param integer $prixTrajet
     * @return Trajet
     */
    public function setPrixTrajet($prixTrajet)
    {
        $this->prixTrajet = $prixTrajet;

        return $this;
    }

    /**
     * Get prixTrajet
     *
     * @return integer 
     */
    public function getPrixTrajet()
    {
        return $this->prixTrajet;
    }

    /**
     * Set numTrajet
     *
     * @param integer $numTrajet
     * @return Trajet
     */
    public function setNumTrajet($numTrajet)
    {
        $this->numTrajet = $numTrajet;

        return $this;
    }

    /**
     * Get numTrajet
     *
     * @return integer 
     */
    public function getNumTrajet()
    {
        return $this->numTrajet;
    }

   
    /**
     * Set ref_coivoiturage
     *
     * @param \Xm\CovoiturageBundle\Entity\Covoiturage $refCoivoiturage
     * @return Trajet
     */
    public function setRefCoivoiturage(\Xm\CovoiturageBundle\Entity\Covoiturage $refCoivoiturage )
    {
        $this->ref_coivoiturage = $refCoivoiturage;

        return $this;
    }

    /**
     * Get ref_coivoiturage
     *
     * @return \Xm\CovoiturageBundle\Entity\Covoiturage 
     */
    public function getRefCoivoiturage()
    {
        return $this->ref_coivoiturage;
    }

    /**
     * Set localiteDepart
     *
     * @param string $localiteDepart
     * @return Trajet
     */
    public function setLocaliteDepart($localiteDepart)
    {
        $this->localiteDepart = $localiteDepart;

        return $this;
    }

    /**
     * Get localiteDepart
     *
     * @return string 
     */
    public function getLocaliteDepart()
    {
        return $this->localiteDepart;
    }

    /**
     * Set localiteDestination
     *
     * @param string $localiteDestination
     * @return Trajet
     */
    public function setLocaliteDestination($localiteDestination)
    {
        $this->localiteDestination = $localiteDestination;

        return $this;
    }

    /**
     * Get localiteDestination
     *
     * @return string 
     */
    public function getLocaliteDestination()
    {
        return $this->localiteDestination;
    }

    /**
     * Add reservations
     *
     * @param \Xm\CovoiturageBundle\Entity\Reservation $reservations
     * @return Trajet
     */
    public function addReservation(\Xm\CovoiturageBundle\Entity\Reservation $reservations)
    {
        $this->reservations[] = $reservations;

        return $this;
    }

    /**
     * Remove reservations
     *
     * @param \Xm\CovoiturageBundle\Entity\Reservation $reservations
     */
    public function removeReservation(\Xm\CovoiturageBundle\Entity\Reservation $reservations)
    {
        $this->reservations->removeElement($reservations);
    }

    /**
     * Get reservations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReservations()
    {
        return $this->reservations;
    }
}
