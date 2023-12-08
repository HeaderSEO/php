<?php

namespace webmonsterSEO\Tag;

class MetaProperty implements TagInterface {

    /**
     * The property attribute.
     *
     * @var string
     */
    public $property;

    /**
     * The content attribute.
     *
     * @var string
     */
    public $content;

    /**
     * Create a new meta propery tag instance.
     *
     * @param  string  $property
     * @param  string  $content
     * @return void
     */
    public function __construct(string $property, string $content) {
        $this->property = $property;
        $this->content = $content;
    }

    /**
     * Render tag.
     *
     * @return string
     */
    public function render(): string {
        return sprintf('<meta property="%s" content="%s">', $this->property, $this->content);
    }

}

