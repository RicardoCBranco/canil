<?php
namespace CasteloBranco\Canil\Interfaces;

/**
 * Interface para criaçao de tabelas de cadas módulo reponsável pelas operações
 * com o banco de dados.
 * 
 * @author Antonio Ricardo Andrade Castelo Branco
 */
interface ITabela {
   public static function getInstancia();
    
   public static function insert($classe);
   /**
    * 
    * @param type $classe
    * @return  int Retorna a última chave inserida
    */
   public static function update($classeAnt,$classePos);
   /**
    * 
    * @param array recebe um array com o id
    * @return void
    */
   public static function delete($id);
   /**
    * 
    * @param array recebe um array com os ids.
    * @return array recebe com os dados do id.
    */
   public static function find($id);
   /**
    * 
    * @return Classe retorna uma classe povoada
    */
   public static function findAll();
}
