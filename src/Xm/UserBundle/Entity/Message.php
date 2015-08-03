<?php

namespace Xm\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="Message", indexes={@ORM\Index(name="IDX_790009E3F624B39D", columns={"sender_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Xm\UserBundle\Entity\MessageRepository")
 */ 
 
class Message
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
     * @ORM\Column(name="object", type="string", length=255, nullable=false)
     */
    private $object;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255, nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="send_date", type="datetime", nullable=false)
     */
    private $sendDate;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sender_id", referencedColumnName="id")
     * })
     */
    private $sender;

    /**
     * @var \User
     *
     * @ORM\ManyToMany(targetEntity="User",inversedBy ="messages")
     * @ORM\JoinTable("messages_receivers")
     */
    private  $receivers ;

   
     public function __construct()
      {
         $this->receivers = new \Doctrine\Common\Collections\ArrayCollection(); 
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
     * Set object
     *
     * @param string $object
     * @return Message
     */
    public function setObject($object)
    {
        $this->object = $object;

        return $this;
    }

    /**
     * Get object
     *
     * @return string 
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set sendDate
     *
     * @param \DateTime $sendDate
     * @return Message
     */
    public function setSendDate($sendDate)
    {
        $this->sendDate = $sendDate;

        return $this;
    }

    /**
     * Get sendDate
     *
     * @return \DateTime 
     */
    public function getSendDate()
    {
        return $this->sendDate;
    }

    /**
     * Set sender
     *
     * @param \Xm\UserBundle\Entity\User $sender
     * @return Message
     */
    public function setSender(\Xm\UserBundle\Entity\User $sender )
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return \Xm\UserBundle\Entity\User 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Get receivers
     *
     * @return \Xm\UserBundle\Entity\User 
     */
    public function getReceivers()
    {
        return $this->receivers;
    }

      /**
     * Add receiver
     *
     * @param \Xm\UserBundle\Entity\User $receiver
     * @return Message
     */
    public function addReceiver(\Xm\UserBundle\Entity\User $receiver)
    {
        $this->receivers[] = $receiver;

        return $this;
    }


     /**
    * Is the given User connected is the author of this Message?
    * @return bool
    */
    public function isAuthor(User $user_connected)
    {

      return $user->getUsername() == $this->getUsername();
    }
}
