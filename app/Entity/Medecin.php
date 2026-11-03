<?php

namespace Entity;

class Medecin
{
    public function __construct(
        private ?int $id,
        private string $nom,
        private string $prenom,
        private string $email,
        private string $password
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getDisplayInfo(): string
    {
        return "{$this->nom} {$this->prenom} - {$this->email}";
    }
}