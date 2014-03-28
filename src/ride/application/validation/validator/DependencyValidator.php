<?php

namespace ride\application\validation\validator;

use ride\library\dependency\DependencyInjector;
use ride\library\validation\validator\Validator;

/**
 * Validator interface to perform extra processing after creating the validator
 */
interface DependencyValidator extends Validator {

    /**
     * Hook to process a created validator
     * @param \ride\library\dependency\DependencyInjector $dependencyInjector
     * @return null
     */
    public function processValidator(DependencyInjector $dependencyInjector);

}