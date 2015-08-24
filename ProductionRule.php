<?php

namespace CodeSampleGenerator;

class ProductionRule
{

    /**
     * @var Symbol
     */
    private $startSymbol;

    /**
     * @var [Symbol]
     */
    private $rule;

    public function __construct($rule, $startSymbol)
    {
        $this->rule = $rule;
        $this->startSymbol = $startSymbol;
    }
    
    /**
     * Applies the production rule to a language expression
     *
     * @param $expression [Symbol]
     * @return LanguageString
     */
    public function apply($expression)
    {
        $resultString = [];
        $index = 0;
        foreach($this->rule as $symbol)
        {
            if($symbol == $this->startSymbol)
            {
                $index += count($expression);
                $resultString = array_merge($resultString, $expression);
            }
            else
            {
                $resultString[$index] = $symbol;
            }
        }
        return new LanguageString($resultString);
    }
}

?>
