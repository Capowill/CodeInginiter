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
        //$aProduits['article'] = array("Aramis", "Athos", "Clatronic", "Camping", "Green");        
        // $this->load->view('liste',$aView + $aProduits);
        

        // --------- Base de donnée --------- ANCIENNE METHOD(CODE)
        // Charge la librairie 'database'
        // $this->load->database();
        // // Exécute la requête 
        // $results = $this->db->query("SELECT * FROM produits");
        // // Récupération des résultats    
        // $aListe = $results->result();


        // --------- Base de donnée --------- NOUVEAU CODE
        // Chargement du modèle 'produitsModel'
        $this->load->model('produitsModel');

        $aListe = $this->produitsModel->liste();

        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
        //$aView["liste_produits"] = $aListe;
        $aView["liste"] = $aListe;
        
        // Appel de la vue avec transmission du tableau  
        // $this->load->view('liste', $aView);
        $this->load->view('liste', $aListe + $aView);
    }




    	// --------- Code igniter : formulaire ---------
        public function ajouter()
{
   // Chargement des assistants 'form' et 'url'
    $this->load->helper('form', 'url'); 

   // Chargement de la librairie 'database'
    $this->load->database(); 

   // Chargement de la librairie form_validation
    $this->load->library('form_validation'); 

    if ($this->input->post()) 
   { // 2ème appel de la page: traitement du formulaire

        $data = $this->input->post();

        // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
        $this->form_validation->set_rules("pro_ref", "Référence", "required", array("required" => "Le %s doit être obligatoire."));

        if ($this->form_validation->run() == FALSE)
        { // Echec de la validation, on réaffiche la vue formulaire 

            $this->load->view('ajouter');
        }
        else
        { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base

            $this->db->insert('produits', $data);

            redirect("produits/liste");
        }       
    } 
    else 
    { // 1er appel de la page: affichage du formulaire
        $this->load->view('ajouter');
    }
} // -- ajouter() 


}
