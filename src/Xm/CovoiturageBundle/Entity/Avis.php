<?php

namespace Xm\CovoiturageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Xm\UserBundle\Entity\User ;
/**
 * Avis
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Xm\CovoiturageBundle\Entity\AvisRepository")
 */
class Avis
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
     * @var string
     *
     * @ORM\Column(name="contenu_avis", type="text")
     */
    private $contenuAvis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_publication", type="datetime")
     */
    private $datePublication;

    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

      /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="Xm\UserBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(name="sender_id", referencedColumnName="id")
     * 
     */
    private $expediteur;


      /**
     * @var \Covoiturage
     *
     * @ORM\ManyToOne(targetEntity="Covoiturage",inversedBy="avis_clients")
     * @ORM\JoinColumn(name="covoiturage_id", referencedColumnName="id")
     * 
     */
    private $covoiturage_passe;



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
     * Set contenuAvis
     *
     * @param string $contenuAvis
     * @return Avis
     */
    public function setContenuAvis($contenuAvis)
    {
        $this->contenuAvis = $contenuAvis;

        return $this;
    }

    /**
     * Get contenuAvis
     *
     * @return string 
     */
    public function getContenuAvis()
    {
        return $this->contenuAvis;
    }

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     * @return Avis
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime 
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set note
     *
     * @param integer $note
     * @return Avis
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set expediteur
     *
     * @param \Xm\UserBundle\Entity\Utilisateur $expediteur
     * @return Avis
     */
    public function setExpediteur(\Xm\UserBundle\Entity\Utilisateur $expediteur )
    {
        $this->expediteur = $expediteur;

        return $this;
    }

    /**
     * Get expediteur
     *
     * @return \Xm\UserBundle\Entity\Utilisateur
     */
    public function getExpediteur()
    {
        return $this->expediteur;
    }

   

    /**
     * Set covoiturage_passe
     *
     * @param \Xm\CovoiturageBundle\Entity\Covoiturage $covoituragePasse
     * @return Avis
     */
    public function setCovoituragePasse(\Xm\CovoiturageBundle\Entity\Covoiturage $covoituragePasse )
    {
        $this->covoiturage_passe = $covoituragePasse;

        return $this;
    }

    /**
     * Get covoiturage_passe
     *
     * @return \Xm\CovoiturageBundle\Entity\Covoiturage 
     */
    public function getCovoituragePasse()
    {
        return $this->covoiturage_passe;
    }
}
