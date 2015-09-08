<?php

namespace Xm\CovoiturageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Xm\CovoiturageBundle\Entity\Ville ;
use Symfony\Component\Validator\Constraints as Assert ;
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
     *
     *
     * @Assert\Range(
     *      min = 1,
     *      max = 5,
     *      minMessage = "veuillez proposer au moins une place",
     *      maxMessage = "Vous ne devez pas dépasser 5 places",
     *
     *     groups={"basics"}
     * )
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
     * @ORM\Column(name="date_depart", type="datetime" ,nullable=false)
     *
     * @Assert\LessThanOrEqual("+2 months",groups={"basics"})
     * @Assert\GreaterThanOrEqual("today",groups={"basics"})
     */
    private $dateDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_retour", type="datetime")
     *
     *
     * @Assert\GreaterThanOrEqual("today",groups={"basics"})
     * @Assert\LessThanOrEqual("+2 months",groups={"basics"})
     */
    private $dateRetour;

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
     * @ORM\ManyToOne(targetEntity="Xm\UserBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(onDelete="CASCADE")
     **/
    private $initiateur;


    /**
     * @ORM\OneToMany(targetEntity="Trajet", mappedBy="ref_covoiturage")
     **/
     private $trajets;
    
     /**
     * @ORM\OneToMany(targetEntity="Avis", mappedBy="covoiturage_passe")
     **/
     private $avis_clients;


    

    public function __construct() 
     {
        $this->trajets = new ArrayCollection();
        $this->avis_clients = new ArrayCollection ();
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
     * @param \Xm\UserBundle\Entity\Utilisateur $initiateur
     * @return Covoiturage
     */
    public function setInitiateur(\Xm\UserBundle\Entity\Utilisateur $initiateur )
    {
        $this->initiateur = $initiateur;

        return $this;
    }

    /**
     * Get initiateur
     *
     * @return \Xm\UserBundle\Entity\Utilisateur
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

   
    /**
     * Add avis_clients
     *
     * @param \Xm\CovoiturageBundle\Entity\Avis $avisClients
     * @return Covoiturage
     */
    public function addAvisClient(\Xm\CovoiturageBundle\Entity\Avis $avisClients)
    {
        $this->avis_clients[] = $avisClients;

        return $this;
    }

    /**
     * Remove avis_clients
     *
     * @param \Xm\CovoiturageBundle\Entity\Avis $avisClients
     */
    public function removeAvisClient(\Xm\CovoiturageBundle\Entity\Avis $avisClients)
    {
        $this->avis_clients->removeElement($avisClients);
    }

    /**
     * Get avis_clients
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAvisClients()
    {
        return $this->avis_clients;
    }
}
