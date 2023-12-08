<?php

namespace webmonsterSEO\Tag;

class MetaCharset implements TagInterface {

    /**
     * The charset attribute.
     *
     * @var string
     */
    public $charset;

    /**
     * Create a new meta charset tag instance.
     *
     * @param  string  $charset
     * @return void
     */
    public function __construct(string $charset = 'UTF-8') {
        $this->charset = $charset;
    }

    /**
     * Render tag.
     *
     * @return string
     */
    public function render(): string {
        return sprintf('<meta charset="%s">', $this->charset);
    }

}

