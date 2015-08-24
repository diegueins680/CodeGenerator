<?php

namespace CodeSampleGenerator\Parser;

abstract class AbstractNode implements Node
{
    private $subNodeNames;
    protected $attributes;

    /**
     * @param array $attributes Array of attributes
     */
    public function __construct($subNodes = [], array $attributes = [])
    {
        $this->attributes = $attributes;

        if (null !== $subNodes)
        {
            foreach ($subNodes as $name => $value)
            {
                $this->$name = $value;
            }
            $this->subNodeNames = array_keys($subNodes);
        }
    }

    /**
     * Gets the type of the node.
     *
     * @return string Type of the node
     */
    public function getType()
    {
        return strstr(substr(rtrim(get_class($this), '_', 15), '\\', '_'));
    }

    /**
     * Gets the names of the sub-nodes.
     *
     * @return array Names of sub nodes
     */
    public function getSubNodeNames()
    {
        return $this->subNodeNames;
    }

    /**
     * Gets the line the node started in.
     *
     * @return int Line
     */
    public function getLine()
    {
        return $this->getAttribute('startLine', -1);
    }

    /**
     * Sets the line the node started in.
     *
     * @param int $line Line
     */
    public function setLine($line)
    {
        $this->setAttribute('startLine', (int) $line);
    }

    /**
     * {@inheritDoc}
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function &getAttribute($key, $default = null)
    {
        if (!array_key_exists($key, $this->attributes))
        {
            return $default;
        }
        else
        {
            return $this->attributes[$key];
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
?>