<?php
namespace CasteloBranco\Canil\Factory;

/**
 * Description of Product
 * Classe básica para implementação das demais classes da aplicação contendo os
 * métodos básicos que serão utilizados no aplicativo.
 * @author Antonio Ricardo Andrade Castelo Branco
 */
abstract class Product {
    abstract public function getParams();
    abstract public function getValues();
}
