<?php
namespace CasteloBranco\Canil\Interfaces;

/**
 * Interface para criaçao de tabelas de cadas módulo reponsável pelas operações
 * com o banco de dados.
 * 
 * @author Antonio Ricardo Andrade Castelo Branco
 */
interface ITabela {
   public static function insert($classe);
   /**
    * 
    * @param type $classe
    */
   public static function update($classe);
   /**
    * 
    * @param array $id
    */
   public static function delete(array $id);
   /**
    * 
    * @param array $id
    */
   public static function find(array $id);
   /**
    * 
    */
   public static function findAll();
}
