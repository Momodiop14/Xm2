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
     * @var integer
     *
     * @ORM\Column(name="num_trajet", type="integer")
     */
    private $numTrajet;

    /**
     * @ORM\ManyToOne(targetEntity="Covoiturage")
     * @ORM\JoinColumn(onDelete="CASCADE")
     **/
    private $ref_coivoiturage;

    /**
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumn(onDelete="CASCADE")
     **/
    private $ville_depart;

     /**
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumn(onDelete="CASCADE")
     **/
    private $ville_arrivee;


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
     * Set ville_depart
     *
     * @param \Xm\CovoiturageBundle\Entity\Ville $villeDepart
     * @return Covoiturage
     */
    public function setVilleDepart(\Xm\CovoiturageBundle\Entity\Ville $villeDepart )
    {
        $this->ville_depart = $villeDepart;

        return $this;
    }

    /**
     * Get ville_depart
     *
     * @return \Xm\CovoiturageBundle\Entity\Ville 
     */
    public function getVilleDepart()
    {
        return $this->ville_depart;
    }

    /**
     * Set ville_arrivee
     *
     * @param \Xm\CovoiturageBundle\Entity\Ville $villeArrivee
     * @return Covoiturage
     */
    public function setVilleArrivee(\Xm\CovoiturageBundle\Entity\Ville $villeArrivee)
    {
        $this->ville_arrivee = $villeArrivee;

        return $this;
    }

    /**
     * Get ville_arrivee
     *
     * @return \Xm\CovoiturageBundle\Entity\Ville 
     */
    public function getVilleArrivee()
    {
        return $this->ville_arrivee;
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
}
