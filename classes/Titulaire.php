<?php


class Titulaire {

    private string $nom;
    private string $prenom;
    private DateTime $dateOfBirth;
    private string $ville;
    private array $comptes;

    public function __construct(string $nom, string $prenom, string $dateOfBirth, string $ville) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateOfBirth = new DateTime($dateOfBirth);
        $this->ville = $ville;
        $this->comptes = [];

    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateOfBirth()
    {
        return $this->dateOfBirth->format("d.m.Y");
    }

    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    public function getComptes()
    {
        return $this->comptes;
    }

    public function setComptes($comptes)
    {
        $this->comptes = $comptes;

        return $this;
    }

    public function afficherAge() {

            $dateOfBirth = $this->dateOfBirth;
            $today = new DateTime();
            $diff = $today->diff($dateOfBirth);
    
             return  $diff->format('%Y') . " ans<br>" ;
    }
    

    public function ajouterCompte(Compte $compte) {
        $this->comptes[] = $compte;
    }

    public function infosTitulaire() {
        $result = "Infos de ". $this. ": <br>
        Date de naissance : ". $this->afficherAge().
        "Liste des comptes :<br>";

        foreach($this->comptes as $compte) {
            $result .=  $compte->getLibelle() . " = " . $compte->getSolde(). "€ <br>";
        }

        return $result;
    }

    public function __toString() {
        return $this->prenom . " " . $this->nom;
    }
}

// fonction pour convertir date de naissance en âge àintégrer à infosTitulaire