<?php 
//namespace para o autoload(carregamento automático de classes pelo PSR-4)
namespace App\Model;

class Material{

    private $id_material, $nome_material, $desc_material, $qtde_estoque, $id_prat_fk, $id_forn_fk, $imagem;
    
	//ID DO MATERIAL------------------------------------------------
    public function getid_material(){
      return $this->id_material;
    }
    public function setid_material($id_material){
      $this->id_material = $id_material;
    }

	//NOME DO MATERIAL----------------------------------------------
    public function getnome_material(){
        return $this->nome_material;
    }
    public function setnome_material($nome_material){
      $this->nome_material = $nome_material;
    }

	//DESCRIÇÃO DO MATERIAL-----------------------------------------
    public function getdesc_material(){
      return $this->desc_material;
    }
    public function setdesc_material($desc_material){
      $this->desc_material = $desc_material;
    }

	//QUANTIDADE EM ESTOQUE-----------------------------------------
    public function getqtde_estoque(){
      return $this->qtde_estoque;
    }
    public function setqtde_estoque($qtde_estoque){
      $this->qtde_estoque = $qtde_estoque;
    }

    //ID DA PRATELEIRA----------------------------------------------
    public function getid_prat_fk(){
      return $this->id_prat_fk;
    }
    public function setid_prat_fk($id_prat_fk){
      $this->id_prat_fk = $id_prat_fk;
    }
	
	//ID DO FORNECEDOR----------------------------------------------
     public function getid_forn_fk(){
      return $this->id_forn_fk;
    }
    public function setid_forn_fk($id_forn_fk){
      $this->id_forn_fk = $id_forn_fk;
    }

    public function get_imagem(){
      return $this->imagem;
    }
    public function setimagem($imagem){
      $this->imagem = $imagem;
    }

    public function getid_edit(){
      return $this->id_edit;
    }
    public function setid_edit($id_edit){
      $this->id_edit = $id_edit;
    }
    
}
?>