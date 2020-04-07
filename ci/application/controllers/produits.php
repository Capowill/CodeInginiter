<!-- création du controller -->


<?php
// application/controllers/Produits.php

defined('BASEPATH') or exit('No direct script access allowed');

class Produits extends CI_Controller
{

    public function liste()
    {
        // on peu appelé 10 fonctions pareil ca fonctionnera (fuck la logique)
        $aView = array();
        $aView["prenom"] = 'Dave';
        $aView["nom"] = "Lopez";

        $aView['article'] = array("Aramis", "Athos", "Clatronic", "Camping", "Green");
        //$this->load->view('liste', $aView);
        // je préfère quand même appelé mes variable differement .
        // $aProduits['article'] = array("Aramis", "Athos", "Clatronic", "Camping", "Green");        
        // $this->load->view('liste',$aView + $aProduits);
        

        // --------- Base de donnée ---------
        // Charge la librairie 'database'
        $this->load->database();

        // Exécute la requête 
        $results = $this->db->query("SELECT * FROM produits");

        // Récupération des résultats    
        $aListe = $results->result();

        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
        $aView["liste_produits"] = $aListe;

        // Appel de la vue avec transmission du tableau  
        $this->load->view('liste', $aView);
    }
}
