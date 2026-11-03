<?php

namespace Repository;

use Entity\Medecin;
use Studoo\EduFramework\Core\Service\DatabaseService;

class MedecinRepository
{


    public function createMedecin(Medecin $medecin): int
    {
        $comBase = DatabaseService::getConnect();
        $statementPDO = $comBase->prepare(
            "INSERT INTO medecin (nom, mail, password) VALUES (:nom, :email, :password)"
        );
        $statementPDO->execute([
            'nom' => $medecin->getNom(),
            'email' => $medecin->getEmail(),
            'password' => $medecin->getPassword()
        ]);

        return (int) $comBase->lastInsertId();
    }
    
    
    public function getMedecin(int $id): Medecin|false
    {
        $comBase = DatabaseService::getConnect();
        $statementPDO = $comBase->prepare("SELECT *, mail AS email FROM medecin WHERE id = :id");
        $statementPDO->execute(['id' => $id]);

        $row = $statementPDO->fetch();

        if ($row === false) {
            return false;
        }

        return new Medecin(
            $row['id'],
            $row['nom'],
            $row['prenom'] ?? '',
            $row['email'],
            $row['password']
        );
    }

    public function getMedecins(): array
    {
        $comBase = DatabaseService::getConnect();
        $statementPDO = $comBase->query("SELECT *, mail AS email FROM medecin");

        $medecins = [];
        while ($row = $statementPDO->fetch()) {
            $medecins[] = new Medecin(
                $row['id'],
                $row['nom'],
                $row['prenom'] ?? '',
                $row['email'],
                $row['password']
            );
        }

        return $medecins;
    }

    public function updateMedecin(Medecin $medecin): bool
    {
        $comBase = DatabaseService::getConnect();
        $statementPDO = $comBase->prepare(
            "UPDATE medecin SET nom = :nom, mail = :email, password = :password WHERE id = :id"
        );
        return $statementPDO->execute([
            'nom' => $medecin->getNom(),
            'email' => $medecin->getEmail(),
            'password' => $medecin->getPassword(),
            'id' => $medecin->getId()
        ]);
    }



}