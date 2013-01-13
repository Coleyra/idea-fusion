<?php

namespace IdeaFusion\Bundle\UsersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert; // pour la validation
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

use Symfony\Component\Routing\RequestContext;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * IdeaFusion\Bundle\UsersBundle\Entity\User
 *
 * @ORM\Entity(repositoryClass="IdeaFusion\Bundle\UsersBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="users")
 * @UniqueEntity(fields="login", message="Un utilisateur existe déjà avec ce login.")
 */
class User implements AdvancedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id_user;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $email;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $login;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $salt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\File(
     *     maxSize = "2M",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png"},
     *     mimeTypesMessage = "Le fichier choisi ne correspond pas à un fichier valide",
     *     notFoundMessage = "Le fichier n'a pas été trouvé sur le disque",
     *     uploadErrorMessage = "Erreur dans l'upload du fichier"
     * )
     */
    protected $avatar;

    /**
     * @ORM\Column(type="integer", length=1)
     */
    protected $actif;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date_creation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $date_update;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $last_connect;
    
    public function __construct()
    {
		//valeurs par défaut
    	$this->date_creation = new \DateTime();
		$this->actif = 1;
    }

    /**
     * Set the value of id_user.
     *
     * @param integer $id_user
     * @return \Ic\Bundle\PslwebBundle\Entity\User
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of id_user.
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Set the value of email.
     *
     * @param string $email
     * @return \Ic\Bundle\PslwebBundle\Entity\User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of type_email.
     *
     * @param string $type_email
     * @return \Ic\Bundle\PslwebBundle\Entity\User
     */
    public function setTypeEmail($type_email)
    {
        $this->type_email = $type_email;

        return $this;
    }

    /**
     * Get the value of type_email.
     *
     * @return string
     */
    public function getTypeEmail()
    {
        return $this->type_email;
    }

    /**
     * Set the value of login.
     *
     * @param string $login
     * @return \Ic\Bundle\PslwebBundle\Entity\User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of login.
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of password.
     *
     * @param string $password
     * @return \Ic\Bundle\PslwebBundle\Entity\User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of salt.
     *
     * @param string $salt
     * @return \Ic\Bundle\PslwebBundle\Entity\User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get the value of salt.
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set the value of lastname.
     *
     * @param string $lastname
     * @return \Ic\Bundle\PslwebBundle\Entity\User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of lastname.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of firstname.
     *
     * @param string $firstname
     * @return \Ic\Bundle\PslwebBundle\Entity\User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of firstname.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of avatar.
     *
     * @param string $avatar
     * @return \Ic\Bundle\PslwebBundle\Entity\User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get the value of avatar.
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of actif.
     *
     * @param integer $actif
     * @return \Ic\Bundle\PslwebBundle\Entity\User
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get the value of actif.
     *
     * @return boolean
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set the value of date_creation.
     *
     * @param integer $date_creation
     * @return \Ic\Bundle\PslwebBundle\Entity\User
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * Get the value of date_creation.
     *
     * @return integer
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Set the value of date_update.
     *
     * @param integer $date_update
     * @return \Ic\Bundle\PslwebBundle\Entity\User
     */
    public function setDateUpdate($date_update)
    {
        $this->date_update = $date_update;

        return $this;
    }

    /**
     * Get the value of date_update.
     *
     * @return integer
     */
    public function getDateUpdate()
    {
        return $this->date_update;
    }

    /**
     * Set the value of last_connect.
     *
     * @param integer $last_connect
     * @return \Ic\Bundle\PslwebBundle\Entity\User
     */
    public function setLastConnect($last_connect)
    {
        $this->last_connect = $last_connect;

        return $this;
    }

    /**
     * Get the value of last_connect.
     *
     * @return integer
     */
    public function getLastConnect()
    {
        return $this->last_connect;
    }

    /**
	 * Fonction permettant de faire la correspondance entre les rôles en BDD et ceux de Symfony
	 * @param integer $id_role
	 */
	public function getRoleCorrespondance($id_role)
    {
        switch($id_role)
        {
            case 1 :
                return 'ROLE_SUPER_ADMIN';
            break;
            case 2 :
                return 'ROLE_ADMIN';
            break;
            case 3 :
                return 'ROLE_USER';
            break;
        }
    }
    
	/**
	 * Récupère tous les rôles symfony de l'utilisateur en fonction de ses communautés
	 */
    public function getRoles()
    {
    	$roles = array('ROLE_USER');
    	return $roles;
    }
    
    
    

	/**
	 * Encode le mot de passe
	 * @param PasswordEncoderInterface $encoder
	 */
    public function encodePassword(PasswordEncoderInterface $encoder)
    {
        if($this->password)
	{
            $this->salt = sha1(uniqid().time().rand(0,999999));
            $this->password = $encoder->encodePassword
            (
                $this->password,
                $this->salt
            );
        }
    }
    
	/**
	 * Retourne le chemin absolut vers l'avatar
	 */
    public function getAbsolutePath()
    {
        return null === $this->avatar ? null : $this->getUploadRootDir().'/'.$this->avatar;
    }

	/**
	 * Retourne le chemin web vers l'avatar
	 */
    public function getAvatarWebPath()
    {
        //Image par défaut en fonction de la civilité
        if(null === $this->avatar || $this->avatar == '')
        {
            switch($this->civilite)
            {
                case 1 : default :
                    $sexe = 'homme';
                break;
                case 2 :
                    $sexe = 'femme';
                break;
            }
            return 'bundles/icpslweb/img/default_'.$sexe.'.png';
        }
        else return $this->getUploadDir().'/'.$this->avatar;
    }

	/**
	 * Retourne le répertoire permetant l'upload
	 */
    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__.'/../../../../../web/'.$this->getUploadDir();
    }

	/**
	 * Retourne le répertoire permettant l'upload des avatars
	 */
    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'avatars';
    }
    
	/**
	 * Permet l'upload de l'avatar, et la suppression des caches de thumbnail
	 */
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->avatar)
        {
            return;
        }

        //Lastname du fichier
        $file = $this->id_user.'.'.$this->avatar->guessExtension();
        // move takes the target directory and then the target filename to move to
        $this->avatar->move($this->getUploadRootDir(), $file);
        //Suppression des thumbnail déjà en cache
        @unlink(__DIR__.'/../../../../../web/imagine/thumbnail/avatars/'.$file);
        @unlink(__DIR__.'/../../../../../web/imagine/avatar_thumbnail/avatars/'.$file);
        @unlink(__DIR__.'/../../../../../web/imagine/moyen_thumbnail/avatars/'.$file);
        @unlink(__DIR__.'/../../../../../web/imagine/mini_thumbnail/avatars/'.$file);

        // set the path property to the filename where you'ved saved the file
        $this->avatar = $file;
    }    
 
	/**
	 * Renvoi si le compte est non-expiré
	 */
    public function isAccountNonExpired()
    {
    	return true;
    }
    
	/**
	 * Renvoi si le compte est actif
	 */
    public function isEnabled()
    {
		if($this->actif == 1) return true;
    	else return false;
    }
    
    public function isCredentialsNonExpired()
    {
    	return true;
    }
    
    public function isAccountNonLocked()
    {
    	return true;
    }

    public function eraseCredentials()
    {
    	$this->Password = null;
    }

	/**
	 * Retourne l'username
	 */
    public function getUsername()
    {
        return $this->login;
    }
    
	/**
	 * Renvoi le lastname du role de l'utilisateur pour cette communauté
	 */
	public function getRole($id_communaute)
	{
        /*$communautes = $this->getUsersCommunautes();
		$min = 10;
        foreach($communautes as $communaute)
        {
			if($communaute->getIdCommunaute()->getIdCommunaute() == $id_communaute)
			{
				$min = min($communaute->getRole()->getIdRole(), $min);
				if($min == $communaute->getRole()->getIdRole()) $role = $communaute->getRole()->getLastname();
			}
        }
		if($min != 10) return $role;
    	else return 'Vide';*/
		return 'User';
	}

	//Génère un lastname utilisable via l'url
	public function getLastnameUrl()
	{
		$lastname = $this->getLastname();
		$translit = array('Á'=>'A','À'=>'A','Â'=>'A','Ä'=>'A','Ã'=>'A','Å'=>'A','Ç'=>'C','É'=>'E','È'=>'E','Ê'=>'E','Ë'=>'E','Í'=>'I','Ï'=>'I','Î'=>'I','Ì'=>'I','Ñ'=>'N','Ó'=>'O','Ò'=>'O','Ô'=>'O','Ö'=>'O','Õ'=>'O','Ú'=>'U','Ù'=>'U','Û'=>'U','Ü'=>'U','Ý'=>'Y','á'=>'a','à'=>'a','â'=>'a','ä'=>'a','ã'=>'a','å'=>'a','ç'=>'c','é'=>'e','è'=>'e','ê'=>'e','ë'=>'e','í'=>'i','ì'=>'i','î'=>'i','ï'=>'i','ñ'=>'n','ó'=>'o','ò'=>'o','ô'=>'o','ö'=>'o','õ'=>'o','ú'=>'u','ù'=>'u','û'=>'u','ü'=>'u','ý'=>'y','ÿ'=>'y','-'=>'','_'=>'',' '=>'');
		$lastname = strtr($lastname, $translit);
		return preg_replace('#[^a-zA-Z0-9\-\._]#', '', $lastname);
		//return $lastname;
	}
}