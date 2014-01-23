<?php

namespace pallo\application\validation\factory;

use pallo\application\validation\validator\DependencyValidator;

use pallo\library\dependency\DependencyInjector;
use pallo\library\validation\factory\ValidationFactory;

/**
 * Generic factory for filters and validators
 */
class DependencyValidationFactory implements ValidationFactory {

    /**
     * Constructs a new dependency validation factory
     * @param pallo\library\dependency\DependencyInjector $dependencyInjector
     * @return null
     */
    public function __construct(DependencyInjector $dependencyInjector) {
        $this->dependencyInjector = $dependencyInjector;
    }

    /**
     * Creates a filter
     * @param string $name Machine name of the filter
     * @param array $options Options to construct the filter
     * @return pallo\library\validation\filter\Filter
     */
    public function createFilter($name, array $options) {
        $filter = $this->dependencyInjector->get('pallo\\library\\validation\\filter\\Filter', $name, array('options' => $options));

        $this->processInstance($filter);

        return $filter;
    }

    /**
     * Creates a validator
     * @param string $name Machine name of the validator
     * @param array $options Options to construct the validator
     * @return pallo\library\validation\validator\Validator
     */
    public function createValidator($name, array $options) {
        $validator = $this->dependencyInjector->get('pallo\\library\\validation\\validator\\Validator', $name, array('options' => $options));

        $this->processInstance($validator);

        return $validator;
    }

    /**
     * Process the setters of created instances
     * @param mixed $instance
     * @return null
     */
    protected function processInstance($instance) {
        if ($instance instanceof DependencyValidator) {
            $instance->processValidator($this->dependencyInjector);
        }
    }

}