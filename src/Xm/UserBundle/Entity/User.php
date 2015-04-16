<?php

namespace Xm\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Xm\CovoiturageBundle\Entity\Ville;
use Symfony\Component\Validator\Constraints as Assert ;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Table(name="User", indexes={@ORM\Index(name="IDX_2DA17977A73F0036", columns={"ville_id"})})
 * @ORM\Entity
 *@ORM\Entity(repositoryClass="Xm\UserBundle\Entity\UserRepository")
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 * @UniqueEntity("telephone")
 */
class User
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
     * @ORM\Column(name="username", type="string", unique=true, length=255, nullable=false)
     * @assert\NotBlank()
     * @Assert\Length(
     *      min = "8",
     *      max = "50",
     *      minMessage = "Votre pseudonyme  doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre pseudonyme  ne peut pas être plus long que {{ limit }} caractères"
     * )
     * /**
     * @Assert\Regex(
     *                pattern="/^\w+/",
     *                message="Le pseudonyme ne doit contenir que des caractères alphanumériques ",   
     *                match =true
     *
     *             )
     *
     *
     *                                      
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     * @assert\NotBlank()
     * @Assert\Length(
     *      min = "8",
     *      max = "50",
     *      minMessage = "Votre mot de passe doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre mot de passe ne peut pas être plus long que {{ limit }} caractères"
     * )                                      
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=false)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255,  unique=true, nullable=false)
     */
    private $email;

   
    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=9 , nullable=false)
     * @Assert\length(
     *      min = "9",
     *      max = "9",
     *      minMessage = "Votre numero de telephone doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre numero de telephone ne peut pas être plus long que {{ limit }} caractères"
     *             )
     *@Assert\Regex(
     *                    pattern="/(77|33|30|70|76|78)\d{7}/",
     *                    match=true,
     *                    message="Votre numero doit commencer par (77 ou 33 ou 30 ou ou  70 ou 76 ou  78) "
     *              
     *           )
     */
    private $telephone;

   

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=false)
     */
    private $address;

    /**
     * @var boolean
     *
     * @ORM\Column(name="etat_compte", type="boolean", nullable=false)
     */
    private $etatCompte;

    /**
     * @var \Ville
     *
     * @ORM\ManyToOne(targetEntity="Xm\CovoiturageBundle\Entity\Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ville_id", referencedColumnName="id")
     * })
     */
    private $ville;

     
    

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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return User
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set etatCompte
     *
     * @param boolean $etatCompte
     * @return User
     */
    public function setEtatCompte($etatCompte)
    {
        $this->etatCompte = $etatCompte;

        return $this;
    }

    /**
     * Get etatCompte
     *
     * @return boolean 
     */
    public function getEtatCompte()
    {
        return $this->etatCompte;
    }

    /**
     * Set ville
     *
     * @param \Xm\CovoiturageBundle\Entity\Ville $ville
     * @return User
     */
    public function setVille(\Xm\CovoiturageBundle\Entity\Ville $ville )
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \Xm\CovoiturageBundle\Entity\Ville 
     */
    public function getVille()
    {
        return $this->ville;
    }
}
