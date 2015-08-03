<?php

namespace Xm\CovoiturageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Xm\CovoiturageBundle\Entity\Ville ;
/**
 * Covoiturage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Xm\CovoiturageBundle\Entity\CovoiturageRepository")
 */
class Covoiturage
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
     * @ORM\Column(name="places_dispo", type="integer")
     */
    private $placesDispo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="trajet_simple", type="boolean")
     */
    private $trajetSimple;

     /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean",nullable=false)
     */
    private $visible;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_depart", type="date" ,nullable=false)
     */
    private $dateDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_retour", type="date")
     */
    private $dateRetour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_depart", type="time" ,nullable=false)
     */
    private $heureDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_retour", type="time")
     */
    private $heureRetour;

    /**
     * @var string
     *
     * @ORM\Column(name="address_depart", type="string", length=255 ,nullable=false)
     */
    private $addressDepart;

    /**
     * @var string
     *
     * @ORM\Column(name="address_retour", type="string", length=255)
     */
    private $addressRetour;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="string", length=255 ,nullable=false)
     */
    private $resume;

    
     /**
     * @ORM\ManyToOne(targetEntity="Xm\UserBundle\Entity\User")
     * @ORM\JoinColumn(onDelete="CASCADE")
     **/
    private $initiateur;


    /**
     * @ORM\OneToMany(targetEntity="Trajet", mappedBy="Covoiturage")
     **/
     private $trajets;


    

    public function __construct() 
     {
        $this->trajets = new ArrayCollection();
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
     * Set placesDispo
     *
     * @param integer $placesDispo
     * @return Covoiturage
     */
    public function setPlacesDispo($placesDispo)
    {
        $this->placesDispo = $placesDispo;

        return $this;
    }

    /**
     * Get placesDispo
     *
     * @return integer 
     */
    public function getPlacesDispo()
    {
        return $this->placesDispo;
    }

    /**
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     * @return Covoiturage
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime 
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set dateRetour
     *
     * @param \DateTime $dateRetour
     * @return Covoiturage
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    /**
     * Get dateRetour
     *
     * @return \DateTime 
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }

    /**
     * Set heureDepart
     *
     * @param \DateTime $heureDepart
     * @return Covoiturage
     */
    public function setHeureDepart($heureDepart)
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    /**
     * Get heureDepart
     *
     * @return \DateTime 
     */
    public function getHeureDepart()
    {
        return $this->heureDepart;
    }

    /**
     * Set heureRetour
     *
     * @param \DateTime $heureRetour
     * @return Covoiturage
     */
    public function setHeureRetour($heureRetour)
    {
        $this->heureRetour = $heureRetour;

        return $this;
    }

    /**
     * Get heureRetour
     *
     * @return \DateTime 
     */
    public function getHeureRetour()
    {
        return $this->heureRetour;
    }

    /**
     * Set addressDepart
     *
     * @param string $addressDepart
     * @return Covoiturage
     */
    public function setAddressDepart($addressDepart)
    {
        $this->addressDepart = $addressDepart;

        return $this;
    }

    /**
     * Get addressDepart
     *
     * @return string 
     */
    public function getAddressDepart()
    {
        return $this->addressDepart;
    }

    /**
     * Set addressRetour
     *
     * @param string $addressRetour
     * @return Covoiturage
     */
    public function setAddressRetour($addressRetour)
    {
        $this->addressRetour = $addressRetour;

        return $this;
    }

    /**
     * Get addressRetour
     *
     * @return string 
     */
    public function getAddressRetour()
    {
        return $this->addressRetour;
    }

    /**
     * Set resume
     *
     * @param string $resume
     * @return Covoiturage
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string 
     */
    public function getResume()
    {
        return $this->resume;
    }

    
    /**
     * Set initiateur
     *
     * @param \Xm\UserBundle\Entity\User $initiateur
     * @return Covoiturage
     */
    public function setInitiateur(\Xm\UserBundle\Entity\User $initiateur )
    {
        $this->initiateur = $initiateur;

        return $this;
    }

    /**
     * Get initiateur
     *
     * @return \Xm\UserBundle\Entity\User 
     */
    public function getInitiateur()
    {
        return $this->initiateur;
    }

    /**
     * Set trajetSimple
     *
     * @param boolean $trajetSimple
     * @return Covoiturage
     */
    public function setTrajetSimple($trajetSimple)
    {
        $this->trajetSimple = $trajetSimple;

        return $this;
    }

    /**
     * Get trajetSimple
     *
     * @return boolean 
     */
    public function getTrajetSimple()
    {
        return $this->trajetSimple;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return Covoiturage
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Add trajets
     *
     * @param \Xm\CovoiturageBundle\Entity\Trajet $trajets
     * @return Covoiturage
     */
    public function addTrajet(\Xm\CovoiturageBundle\Entity\Trajet $trajets)
    {
        $this->trajets[] = $trajets;

        return $this;
    }

    /**
     * Remove trajets
     *
     * @param \Xm\CovoiturageBundle\Entity\Trajet $trajets
     */
    public function removeTrajet(\Xm\CovoiturageBundle\Entity\Trajet $trajets)
    {
        $this->trajets->removeElement($trajets);
    }

    /**
     * Get trajets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTrajets()
    {
        return $this->trajets;
    }
}
