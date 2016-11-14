<?php
namespace CasteloBranco\Canil\Interfaces;

/**
 * Interface para criaçao de tabelas de cadas módulo reponsável pelas operações
 * com o banco de dados.
 * 
 * @author Antonio Ricardo Andrade Castelo Branco
 */
interface ITabela {
    /*
     * Função getInstancia tem a finalidade de declarar a tabela e a id que irá
     * fazer com que a DataSet realize as operações no banco de dados para isto
     * deve-se utilizar a função setTabela do DataSet;
     */
    public static function getInstancia();
   /**
    * 
    * @param type $classe
    * @return string
    */
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
