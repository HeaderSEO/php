<?php

namespace webmonsterSEO\Tag;

class Script implements TagInterface {

    /**
     * The src attribute.
     *
     * @var string
     */
    public $src;

    /**
     * Create a new script tag instance.
     *
     * @param  string  $src
     * @return void
     */
    public function __construct(string $src) {
        $this->src = $src;
    }

    /**
     * Render tag.
     *
     * @return string
     */
    public function render(): string {
        return sprintf('<script src="%s" href="%s"></script>', $this->src);
    }

}

