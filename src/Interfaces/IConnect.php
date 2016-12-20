<?php
namespace CasteloBranco\Canil\Interfaces;

/**
 * Interface para criação de conexão nela estão disponiveis os dados para conexao.
 * @author Antonio Ricardo Andrade Castelo Branco
 */
interface IConnect {
    const USER = "root";
    const PSWD = "root";
    const HOST = "localhost";
    const DBNAME = "canil";
    const DRIVER = "mysql";
    const CHARSET = "SET NAMES UTF8";
    /**
     * Função getConection componente do Connection responsável pela conexão do
     * banco de dados deve ser implementado o padrao de projeto singleton desta
     * forma na implementação os metodos clone, contruct devem ser do tipo private.
     * 
     * @params Não recebe parametros
     * 
     * @return Connection retorna a conexão com o banco de dados
     */
    public static function getConection();
}
