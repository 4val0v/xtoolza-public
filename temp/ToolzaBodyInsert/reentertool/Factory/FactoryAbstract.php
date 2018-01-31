<?php

/**
 * Как бы фабрика, но не фабрика :D
 * Class FactoryAbstract
 */
abstract class FactoryAbstract{

    /**
     * @param $action
     * @return FactoryResponse|null
     */
    public abstract function GetInstance($action);

    /**
     * @param string $type
     * @return PageWrapper|null
     */
    public function Execute($type){
        $instance = $this->GetInstance($type);
        if(VarHelper::IsSetNotValue($instance)){
            return null;
        }
        if(!$instance->_class instanceof FactoryPart){
            throw new InvalidArgumentException('Выполняемый класс не является FactoryPart');
        }
        $instance->_class->{$instance->_func}();
        return $instance->_class->GetResult();
    }
}