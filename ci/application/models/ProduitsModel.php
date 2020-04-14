
<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Comme pour un contrôleur, le nom de classe de modèle doit commencer par une majuscule et le fichier php doit porter le même nom.
class ProduitsModel extends CI_Model
{
    public function liste() 
    {
        $this->load->database();
        $requete = $this->db->query("SELECT * FROM produits");
        $aProduits = $requete->result();

        return $aProduits;
     } // -- liste()    
}     