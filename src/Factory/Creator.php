<?php
namespace CasteloBranco\Canil\Factory;

/**
 * Description of Creator
 * Classe componente do padrão de projeto Factory responsável pela instanciação
 * de classes retornando objetos.
 * @author Antonio Ricardo Andrade Castelo Branco
 */
class Creator {   
    /*
     * Método responsável pela instanciação e população de um objeto, são reque-
     * ridos dois parametros o primeiro uma String contendo o namespace para a
     * classe que será instanciada, o segundo um array contendo os dados que
     * irão popular o objeto.
     */
    public static function factoryMethod($namespace, array $data){
        /*
         * Condicional verifica se a classe existe, caso não levanta a exceção.
         */
        if(class_exists($namespace)){
            $classe = new $namespace($data);
            return $classe;
        }else{
            throw new \Exception("Não existe classe com o namespace");
        }
    }
}
