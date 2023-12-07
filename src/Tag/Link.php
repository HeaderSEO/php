<?php

namespace webmonsterSEO\Tag;

class Link implements TagInterface {

    /**
     * The rel attribute.
     *
     * @var string
     */
    public $rel;

    /**
     * The href attribute.
     *
     * @var string
     */
    public $href;

    /**
     * The type attribute.
     *
     * @var string
     */
    public $type;

    /**
     * Create a new link tag instance.
     *
     * @param  string  $rel
     * @param  string  $href
     * @return void
     */
    public function __construct(string $rel, string $href, string $type = null) {
        $this->rel = $rel;
        $this->href = $href;
        $this->type = $type;
    }

    /**
     * Render tag.
     *
     * @return string
     */
    public function render(): string {
        if (empty($this->type)) {
            return sprintf('<link rel="%s" href="%s">', $this->rel, $this->href);
        }
        return sprintf('<link rel="%s" type="%s" href="%s">', $this->rel, $this->type, $this->href);
    }

}

