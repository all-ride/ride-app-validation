<?php

namespace pallo\application\validation\validator;

use pallo\library\dependency\DependencyInjector;
use pallo\library\validation\validator\Validator;

/**
 * Validator interface to perform extra processing after creating the validator
 */
interface DependencyValidator {

    /**
     * Hook to process a created validator
     * @param pallo\library\dependency\DependencyInjector $dependencyInjector
     * @return null
     */
    public function processValidator(DependencyInjector $dependencyInjector);

}