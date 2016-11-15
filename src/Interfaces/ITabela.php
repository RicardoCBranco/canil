<?php
namespace CasteloBranco\Canil\Interfaces;

/**
 * Interface para criaçao de tabelas de cadas módulo reponsável pelas operações
 * com o banco de dados.
 * 
 * @author Antonio Ricardo Andrade Castelo Branco
 */
interface ITabela {
   public function insert($classe);
   /**
    * 
    * @param type $classe
    */
   public function update($classe);
   /**
    * 
    * @param array $id
    */
   public function delete(array $id);
   /**
    * 
    * @param array $id
    */
   public function find(array $id);
   /**
    * 
    */
   public function findAll();
}
