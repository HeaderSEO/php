<?php

namespace webmonsterSEO\Tag;

class Title implements TagInterface {

    /**
     * The title attribute.
     *
     * @var string
     */
    public $title;

    /**
     * Create a new title tag instance.
     *
     * @param  string  $title
     * @return void
     */
    public function __construct(string $title) {
        $this->title = $title;
    }

    /**
     * Render tag.
     *
     * @return string
     */
    public function render(): string {
        return sprintf('<title>%s</title>', $this->title);
    }

}

