/* Symbol.php */


/**
 * 


 * 
 * 
 * \author Diego Saa - cuco.saa@gmail.com
 */
namespace CodeSampleGenerator;

class Symbol
{
    private $symbol;

    /**
     * @var Language
     */
    private $language;

    /**
     * @param $productionRule ProductionRule
     * @return LanguageString
     */
    public function applyProductionRule($productionRule)
    {
        $productionRule->apply($this);
    }

    public function isTerminal()
    {
        return in_array($this, $this->language->getTerminalSymbols());
    }
}