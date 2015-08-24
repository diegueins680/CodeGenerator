<?php

namespace CodeSampleGenerator\Parser;

interface Node
{
    /**
     * Gets the type of the node.
     *
     * @return string Type of the node
     */
    public function getType();

    /**
     * Gets the names of the sub-nodes.
     * 
     * @return array Names of the sub-nodes
     */
    public function getSubNodeNames();

    /**
     * Gets the line the node started in.
     *
     * @return int Line;
     */
    public function getLine();
     
    /**
     * Sets the line the node started in.
     *
     * @param int $line Line
     */
    public function setLine($line);

    /**
     * Sets an attribute on a node.
     *
     * @param string $key
     * @param mixed $value
     */
    public function setAttribute($key, $value);

    /**
     * Returns the value of an attribute.
     *
     * @param string $key
     * @param mixed $default
     *
     * @return mixed
     */
    public function &getAttribute($key, $default =  null);

    /**
     * Returns all attributes for the given node.
     *
     * @return array
     */
    public function getAttributes();
}
?>