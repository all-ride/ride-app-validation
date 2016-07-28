<?php

namespace ride\application\validation\factory;

use ride\application\validation\validator\DependencyValidator;

use ride\library\dependency\DependencyInjector;
use ride\library\validation\factory\ValidationFactory;

/**
 * Generic factory for filters and validators
 */
class DependencyValidationFactory implements ValidationFactory {

    /**
     * Constructs a new dependency validation factory
     * @param \ride\library\dependency\DependencyInjector $dependencyInjector
     * @return null
     */
    public function __construct(DependencyInjector $dependencyInjector) {
        $this->dependencyInjector = $dependencyInjector;
    }

    /**
     * Creates a constraint
     * @param string $name Machine name of the constraint
     * @return \ride\library\validation\constraint\Constraint
     */

    public function createConstraint($name) {
        return $this->dependencyInjector->get('ride\\library\\validation\\constraint\\Constraint', $name, array(), true);
    }

    /**
     * Creates a filter
     * @param string $name Machine name of the filter
     * @param array $options Options to construct the filter
     * @return \ride\library\validation\filter\Filter
     */
    public function createFilter($name, array $options) {
        return $this->dependencyInjector->get('ride\\library\\validation\\filter\\Filter', $name, array('options' => $options), true);
    }

    /**
     * Creates a validator
     * @param string $name Machine name of the validator
     * @param array $options Options to construct the validator
     * @return \ride\library\validation\validator\Validator
     */
    public function createValidator($name, array $options) {
        $validator = $this->dependencyInjector->get('ride\\library\\validation\\validator\\Validator', $name, array('options' => $options), true);

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
