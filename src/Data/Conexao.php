<?php
namespace CasteloBranco\Canil\Data;
use CasteloBranco\Canil\Interfaces\IConnect;

/**
 * Description of Conexao
 * Classe que realiza conexão com o banco de dados.
 * @author ricardo
 */
class Conexao implements IConnect{
    protected static $instance;
    
    public static function getConection() {
        if(!isset(self::$instance)){
            $options = array(\PDO::MYSQL_ATTR_INIT_COMMAND => IConnect::CHARSET);
            $instance = new \PDO(IConnect::DSN.":host=".IConnect::HOST.
                    ";dbname=".IConnect::DBNAME,  IConnect::USER, IConnect::PSWD,
                    $options);
            self::$instance = $instance;
        }
        return self::$instance;
    }
}
