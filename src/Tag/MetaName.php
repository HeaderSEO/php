<?php

namespace webmonsterSEO\Tag;

class MetaName implements TagInterface {

    /**
     * The name attribute.
     *
     * @var string
     */
    public $name;

    /**
     * The content attribute.
     *
     * @var string
     */
    public $content;

    /**
     * Create a new meta name tag instance.
     *
     * @param  string  $name
     * @param  string  $content
     * @return void
     */
    public function __construct(string $name, string $content) {
        $this->name = $name;
        $this->content = $content;
    }

    /**
     * Render tag.
     *
     * @return string
     */
    public function render(): string {
        return sprintf('<meta name="%s" content="%s">', $this->name,  $this->content);
    }

}

