<?php
namespace CasteloBranco\Canil\Interfaces;

/**
 * Interface para criação dos controladores de cada módulo.
 * @author ricardo
 */
interface IController {
    public function addAction();
    public function editAction();
    public function deleteAction();
    public function indexAction();
}
