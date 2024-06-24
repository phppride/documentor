<?php

declare(strict_types=1);

namespace Phppride\Html5\Specification;

use Phppride\Documentor\Contracts\Specification;

class Html5 implements Specification
{
    private string $pattern = '/<[!?\w][\w\s="-:;А-яёЁ]*>|<\/\w+>/';

    private array $elements = [
        'a', 'abbr', 'address', 'area', 'article',
        'aside', 'audio', 'b', 'base', 'bdi',
        'bdo', 'blockquote', 'body', 'br', 'button',
        'canvas', 'caption', 'cite', 'code', 'col',
        'colgroup', 'data', 'datalist', 'dd', 'del',
        'details', 'dfn', 'dialog', 'div', 'dl',
        'dt', 'em', 'embed', 'fieldset', 'figcaption',
        'figure', 'footer', 'form', 'h1', 'h2',
        'h3', 'h4', 'h5', 'h6', 'head',
        'header', 'hgroup', 'hr', 'html', 'i',
        'iframe', 'img', 'input', 'ins', 'kbd',
        'label', 'legend', 'li', 'link', 'main',
        'map', 'mark', 'math', 'menu', 'meta',
        'meter', 'nav', 'noscript', 'object', 'ol',
        'optgroup', 'option', 'output', 'p', 'picture',
        'pre', 'progress', 'q', 'rp', 'rt',
        'ruby', 's', 'samp', 'script', 'search',
        'section', 'select', 'slot', 'small', 'source',
        'span', 'strong', 'style', 'sub', 'summary',
        'sup', 'svg', 'table', 'tbody', 'td',
        'template', 'textarea', 'tfoot', 'th', 'thead',
        'time', 'title', 'tr', 'track', 'u',
        'ul', 'var', 'video', 'wbr'
    ];

    public function pattern(): string
    {
        return $this->pattern;
    }

    public function getName(): string
    {
        return 'HTML 5';
    }

    public function getElements(): array
    {
        return $this->elements;
    }

    public function elementRules(string $name): array
    {
        return [];
    }

    public function supportUserElements(): bool
    {
        return true;
    }
}
