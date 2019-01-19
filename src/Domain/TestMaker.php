<?php
declare(strict_types = 1);

namespace CodelyTv\Context\Video\Module\User\Domain;

use OatAPI\Shared\Domain\Aggregate\AggregateRoot;

final class TestMaker
{
    private $id;
    private $login;
    private $password;
    private $title;
    private $lastname;
    private $firstname;
    private $gender;
    private $email;
    private $picture;
    private $address;

    public function __construct(TMId $id,
	TMLogin $login, 
        TMPassword $password,
        TMTitle $title, 
        TMLastname $lastname, 
        TMFirstname $firstname, 
        TMGender $gender, 
        TMEmail $email, 
        TMPicture $picture, 
        TMAddress $address)
    {
	$this->id        = $id;
    	$this->login     = $login;
    	$this->password  = $password;
    	$this->title     = $title;
    	$this->lastname  = $lastname;
    	$this->firstname = $firstname;
    	$this->gender    = $gender;
    	$this->email     = $email;
    	$this->picture   = $picture;
    	$this->address   = $address;
    }
    
    public function id(): TMId
    {
        return $this->id;
    }

    public function login(): TMLogin
    {
        return $this->login;
    }

    public function password(): TMPassword
    {
        return $this->password;
    }

    public function title(): TMTitle
    {
        return $this->title;
    }

    public function lastname(): TMLastname
    {
        return $this->lastname;
    }

    public function firstname(): TMFirstname
    {
        return $this->firstname;
    }

    public function gender(): TMGender
    {
        return $this->gender;
    }

    public function email(): TMEmail
    {
        return $this->email;
    }

    public function picture(): TMPicture
    {
        return $this->picture;
    }

    public function address(): TMAddress
    {
        return $this->address;
    }
}
