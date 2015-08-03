<?php
class Parcel
{
    private $contents;
    private $length;
    private $width;
    private $height;
    private $weight

    function __construct($contents, $length, $width, $height, $weight)
    {
        $this->contents = $contents;
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->weight = $weight;
    }

    function getContents()
    {
        return $this->contents;
    }

    function getLength()
    {
        return $this->length;
    }

    function getWidth()
    {
        return $this->Width;
    }

    function getHeight()
    {
        return $this->Height;
    }

    function getWeight()
    {
        return $this->Weight;
    }
}
?>
