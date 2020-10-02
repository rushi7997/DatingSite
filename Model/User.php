<?php


class User
{
    private string $id;
    private string $firstName;
    private string $lastName;
    private string $about;
    private string $profilePicUrl;
    private bool $isPremium;
    private int $age;
    private bool $gender; // TRUE for male and False for FEMALE
    private string $password;



    public function __construct(string $id,string $firstName, string $lastName, string $about, string $profilePicUrl, bool $isPremium, int $age, bool $gender, string $password)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->about = $about;
        $this->profilePicUrl = $profilePicUrl;
        $this->isPremium = $isPremium;
        $this->age = $age;
        $this->gender = $gender;
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getAbout(): string
    {
        return $this->about;
    }

    public function setAbout(string $about): void
    {
        $this->about = $about;
    }

    public function getProfilePicUrl(): string
    {
        return $this->profilePicUrl;
    }

    public function setProfilePicUrl(string $profilePicUrl): void
    {
        $this->profilePicUrl = $profilePicUrl;
    }

    public function isPremium(): bool
    {
        return $this->isPremium;
    }

    public function setIsPremium(bool $isPremium): void
    {
        $this->isPremium = $isPremium;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function isGender(): bool
    {
        return $this->gender;
    }

    public function setGender(bool $gender): void
    {
        $this->gender = $gender;
    }
}