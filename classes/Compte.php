<?php


class Compte {

    private string $libelle;
    private int $solde;
    private string $devise;
    private Titulaire $titulaire;


    public function __construct(string $libelle, int $solde, string $devise, Titulaire $titulaire) {
        $this->libelle = $libelle;
        $this->solde = $solde;
        $this->devise = $devise;
        $this->titulaire = $titulaire;
        $titulaire->ajouterCompte($this); 
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this->libelle;
    }

    public function getSolde()
    {
        return $this->solde;
    }

    public function setSolde($solde)
    {
        $this->solde = $solde;

        return $this->solde;
    }   

    public function getDevise()
    {
        return $this->devise;
    }

    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }

    public function getTitulaire()
    {
        return $this->titulaire;
    }

    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    public function crediterCompte($montant) {
            if ($montant > 0) {
            $this->solde += $montant;
            return $montant. "€ ont été crédités sur le " . $this->libelle . " de ". $this->titulaire . "<br> 
            Solde total du ". $this->libelle .": " .$this->getSolde() . "€<br>";
        } else {
            return "ERREUR - MONTANT NEGATIF";
        }
    }

    public function debiterCompte($montant) {
        if ($montant > 0 && $this->solde - $montant >= 0) {
            $this->solde -= $montant;
            return $montant. "€ ont été débités du ". $this->libelle. "  de ". $this->titulaire . "<br> Solde total du ". $this->libelle. ": " .$this->getSolde() . "€<br>";
        } else if ($this->solde < $montant) {
            return "ERREUR - MONTANT DU DEBIT SOUHAITE SUPERIEUR AU SOLDE DE VOTRE COMPTE";
        } else if ($montant <= 0) {
            return "ERREUR - MONTANT NEGATIF";
        }
    }

    public function transfertArgent($montant, Compte $compteCredite) {
        
            $this->debiterCompte($montant);
            $compteCredite->crediterCompte($montant);

        return $montant. "€ ont été transférés du " . $this->libelle ." vers le " .$compteCredite->libelle. ". <br>
                Comptes de ".$this->titulaire.": <br>
                **********************************<br>".
                $this->libelle. " = " .$this->getSolde() . "€ // ".$compteCredite->libelle. " = " . $compteCredite->getSolde() . "€<br>";
        
    }

    public function infosCompte() {
        return "Infos du ". $this->libelle ." :<br>
        Titulaire : ". $this->titulaire."<br>
        Date de naissance : ". $this->titulaire->getDateOfBirth() . "<br>
        Solde = ". $this->getSolde(). "€<br>";
    }


    public function toString() {
        return $this->libelle." ";
    }
}