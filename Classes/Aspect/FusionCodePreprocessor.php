<?php

namespace MhsDesign\FusionCodePreprocessorExample\Aspect;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Aop\JoinPointInterface;

/**
 * @Flow\Aspect
 */
class FusionCodePreprocessor
{
    /**
     * @Flow\Before("method(Neos\Fusion\Core\Parser->getFusionFile())")
     * @param JoinPointInterface $joinPoint
     */
    public function preProcessFusionCode(JoinPointInterface $joinPoint): void
    {
        // as this is unplanned extensibility, it might/will change retroactively with
        // https://github.com/neos/neos-development-collection/pull/3839
        $sourceCode = $joinPoint->getMethodArgument('sourceCode');
        $code = str_replace('@debug {', '@process.debug = Neos.Fusion:Debug {', $sourceCode);
        $joinPoint->setMethodArgument('sourceCode', $code);
    }
}
