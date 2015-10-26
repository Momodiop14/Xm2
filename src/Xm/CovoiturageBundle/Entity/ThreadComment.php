<?php

namespace Xm\CovoiturageBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use FOS\CommentBundle\Entity\Thread as BaseThread;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class ThreadComment extends BaseThread
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


      /**
     * Thread of this comment
     *
     * @var ThreadComment
     * @ORM\OneToOne(targetEntity="Covoiturage" ,mappedBy="threadComment",cascade={"persist"})
     */
     private $refCovoiturage;


    /**
     * Get ref_coivoiturage
     *
     * @return \Xm\CovoiturageBundle\Entity\Covoiturage 
     */
    public function getRefCovoiturage()
    {
        return $this->refCovoiturage;
    }

    /**
     * Set ref_coivoiturage
     *
     * @param \Xm\CovoiturageBundle\Entity\Covoiturage $refCoivoiturage
     * @return Trajet
     */
    public function setRefCovoiturage(\Xm\CovoiturageBundle\Entity\Covoiturage $refCovoiturage )
    {
        $this->refCovoiturage = $refCovoiturage;
        $refCovoiturage->setThreadComment($this);

        return $this;
    }

}