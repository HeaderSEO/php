<?php
namespace webmonsterSEO;

use webmonsterSEO\Tag;

class HeadGenerator implements HeadGeneratorInterface {

    protected string    $language = 'en';
    protected string    $viewport = 'width=device-width, initial-scale=1';
    protected string    $title = '';
    protected string    $description = '';
    protected string    $keywords = '';
    protected string    $author = '';
    protected string    $robots = 'index, follow';
    protected string    $creationDate = '';
    protected string    $lastModified = '';
    protected string    $geoPosition = '';
    protected string    $geoCity = '';
    protected string    $geoCountry = '';
    protected string    $canonicalUrl = '';
    protected string    $sitemapUrl = '/sitemap.xml';
    protected string    $faviconUrl = '/favicon.png';
    protected string    $themeColor = '#ffffff';
    protected string    $siteName = '';
    protected string    $fbImageUrl = '';
    protected string    $twitterImageUrl = '';
    protected string    $whatsappImageUrl = '';
    protected array     $styleSheetUrls = [];
    protected array     $scriptUrls = [];
    protected array     $metaTags = [];

    /**
     * @return false|string
     */
    public function getCanonicalLink() {
        if (!empty($_SERVER)) {
            $url = $_SERVER['REQUEST_URI'];
            $url = rtrim($url, '/');
            return sprintf('%s://%s%s', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http', $_SERVER['HTTP_HOST'], $url);
        }
        return false;
    }

    /**
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language): HeadGenerator
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @param string $viewport
     * @return $this
     */
    public function setViewport(string $viewport): HeadGenerator
    {
        $this->viewport = $viewport;
        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): HeadGenerator
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): HeadGenerator
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param string $keywords
     * @return $this
     */
    public function setKeywords(string $keywords): HeadGenerator
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * @param string $author
     * @return $this
     */
    public function setAuthor(string $author): HeadGenerator
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @param string $robots
     * @return $this
     */
    public function setRobots(string $robots): HeadGenerator
    {
        $this->robots = $robots;
        return $this;
    }

    /**
     * @param string $creationDate
     * @return $this
     */
    public function setCreationDate(string $creationDate): HeadGenerator
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    /**
     * @param string $lastModified
     * @return $this
     */
    public function setLastModified(string $lastModified): HeadGenerator
    {
        $this->lastModified = $lastModified;
        return $this;
    }

    /**
     * @param string $geoPosition
     * @return $this
     */
    public function setGeoPosition(string $geoPosition): HeadGenerator
    {
        $this->geoPosition = $geoPosition;
        return $this;
    }

    /**
     * @param string $geoCity
     * @return $this
     */
    public function setGeoCity(string $geoCity): HeadGenerator
    {
        $this->geoCity = $geoCity;
        return $this;
    }

    /**
     * @param string $geoCountry
     * @return $this
     */
    public function setGeoCountry(string $geoCountry): HeadGenerator
    {
        $this->geoCountry = $geoCountry;
        return $this;
    }

    /**
     * @param string $canonicalUrl
     * @return $this
     */
    public function setCanonicalUrl(string $canonicalUrl): HeadGenerator
    {
        $this->canonicalUrl = $canonicalUrl;
        return $this;
    }

    /**
     * @param string $sitemapUrl
     * @return $this
     */
    public function setSitemapUrl(string $sitemapUrl): HeadGenerator
    {
        $this->sitemapUrl = $sitemapUrl;
        return $this;
    }

    /**
     * @param string $faviconUrl
     * @return $this
     */
    public function setFaviconUrl(string $faviconUrl): HeadGenerator
    {
        $this->faviconUrl = $faviconUrl;
        return $this;
    }

    /**
     * @param string $themeColor
     * @return $this
     */
    public function setThemeColor(string $themeColor): HeadGenerator
    {
        $this->themeColor = $themeColor;
        return $this;
    }

    /**
     * @param string $siteName
     * @return $this
     */
    public function setSiteName(string $siteName): HeadGenerator
    {
        $this->siteName = $siteName;
        return $this;
    }

    /**
     * @param string $fbImageUrl
     * @return $this
     */
    public function setFbImageUrl(string $fbImageUrl): HeadGenerator
    {
        $this->fbImageUrl = $fbImageUrl;
        return $this;
    }

    /**
     * @param string $twitterImageUrl
     * @return $this
     */
    public function setTwitterImageUrl(string $twitterImageUrl): HeadGenerator
    {
        $this->twitterImageUrl = $twitterImageUrl;
        return $this;
    }

    /**
     * @param string $whatsappImageUrl
     * @return $this
     */
    public function setWhatsappImageUrl(string $whatsappImageUrl): HeadGenerator
    {
        $this->whatsappImageUrl = $whatsappImageUrl;
        return $this;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function addStyleSheetUrl(string $url): HeadGenerator
    {
        $this->styleSheetUrls[] = $url;
        return $this;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function addScriptUrl(string $url): HeadGenerator
    {
        $this->scriptUrls[] = $url;
        return $this;
    }

    /**
     * @param string $name
     * @param string $content
     * @return $this
     */
    public function addMeta(string $name, string $content): HeadGenerator
    {
        $this->metaTags[] = ['name' => $name, 'content' => $content];
        return $this;
    }

    /**
     * @param string $format
     * @param string $value
     * @return string
     */
    public function addContent(string $format, string $value): string
    {
        return $value ? (sprintf($format, $value) . "\n") : '';
    }

    /**
     * @param string $url
     * @return string|null
     */
    public function get_external_domain_url(string $url): ?string {
        $url_parts = parse_url($url);
        if ($url_parts === false || !isset($url_parts['scheme'], $url_parts['host'])) {
            return null;
        }
        $external_domain_url = $url_parts['scheme'] . '://' . $url_parts['host'];
        $current_domain_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . '://' . $_SERVER['HTTP_HOST'];
        if ($external_domain_url !== $current_domain_url) {
            return $external_domain_url;
        }
        return null;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $location = array_map('trim', explode(",", $this->geoPosition));

        if(empty($this->canonicalUrl)){
            $this->canonicalUrl = $this->getCanonicalLink();
        }

        $tags = [
            new Tag\MetaCharset('UTF-8'),
            $this->viewport ? new Tag\MetaName('viewport', $this->viewport) : null,
            $this->language ? new Tag\MetaName('language', $this->language) : null,
            $this->title ? new Tag\Title($this->title) : null,
            $this->description ? new Tag\MetaName('description', $this->description) : null,
            $this->keywords ? new Tag\MetaName('keywords', $this->keywords) : null,
            $this->author? new Tag\MetaName('author', $this->author) : null,
            $this->robots ? new Tag\MetaName('robots', $this->robots) : null,
            new Tag\MetaName('robots', 'max-snippet:150, max-image-preview:large'),
            $this->creationDate ? new Tag\MetaName('creation_date', $this->creationDate) : null,
            $this->lastModified ? new Tag\MetaName('last_modified', $this->lastModified) : null,
            $this->geoPosition ? new Tag\MetaName('geo.position', $this->geoPosition) : null,
            $this->geoPosition ? new Tag\MetaName('ICBM', $this->geoPosition) : null,
            $this->geoPosition ? new Tag\MetaName('place:location:latitude', $location[0]) : null,
            $this->geoPosition ? new Tag\MetaName('place:location:longitude', $location[1]) : null,
            $this->geoPosition ? new Tag\MetaName('place:location:altitude', '1') : null,
            $this->geoPosition ? new Tag\MetaName('place:location:accuracy', '100') : null,
            $this->geoCity ? new Tag\MetaProperty('business:contact_data:locality', $this->geoCity) : null,
            $this->geoCountry ? new Tag\MetaProperty('business:contact_data:country_name', $this->geoCountry) : null,
            new Tag\MetaName('referrer', 'no-referrer-when-downgrade'),
            new Tag\MetaName('format-detection', 'telephone=no'),
            new Tag\Link('canonical', $this->canonicalUrl),
            $this->sitemapUrl ? new Tag\Link('sitemap', $this->sitemapUrl, 'application/xml') : null,
            $this->faviconUrl ? new Tag\Link('icon', $this->faviconUrl,  'image/png') : null,
            $this->themeColor ? new Tag\MetaName('theme-color', $this->themeColor) : null
        ];

        // OG tags
        array_push(
            $tags,
            new Tag\MetaProperty('og:type', 'website'),
            $this->siteName ? new Tag\MetaProperty('og:site_name', $this->siteName) : null,
            $this->title ? new Tag\MetaProperty('og:title', $this->title) : null,
            $this->description ? new Tag\MetaProperty('og:description', $this->description) : null,
            $this->canonicalUrl ? new Tag\MetaProperty('og:url', $this->canonicalUrl) : null,
            $this->fbImageUrl ? new Tag\MetaProperty('og:image', $this->fbImageUrl) : null
        );

        if(!empty($this->fbImageUrl)) {
            array_push(
                $tags,
                new Tag\MetaProperty('og:image:width', '1200'),
                new Tag\MetaProperty('og:image:height', '630')
            );
        }

        array_push(
            $tags,
            new Tag\MetaName('twitter:card', 'summary_large_image'),
            $this->title ? new Tag\MetaName('twitter:title', $this->title) : null,
            $this->description ? new Tag\MetaName('twitter:description', $this->description) : null,
            $this->twitterImageUrl ? new Tag\MetaName('twitter:image', $this->twitterImageUrl) : null
        );

        if(!empty($this->twitterImageUrl)) {
            array_push(
                $tags,
                new Tag\MetaName('twitter:image:width', '800'),
                new Tag\MetaName('twitter:image:height', '400')
            );
        }

        array_push(
            $tags,
            new Tag\MetaProperty('og:whatsapp', 'share'),
            $this->whatsappImageUrl ? new Tag\MetaProperty('og:image:whatsapp', $this->whatsappImageUrl) : null
        );

        // Add additional meta tags
        foreach ($this->metaTags as $meta) {
            array_push($tags, new Tag\MetaName($meta['name'], $meta['content']));
        }

        // Add CSS links
        foreach ($this->styleSheetUrls as $url) {
            array_push(
                $tags,
                new Tag\Link('prefetch', $url),
                new Tag\Link('stylesheet', $url)
            );
        }

        // Add JS links
        foreach ($this->scriptUrls as $url) {
            if(!empty($this->get_external_domain_url($url))) {
                array_push($tags, new Tag\Link('dns-prefetch', $this->get_external_domain_url($url)));
            }
            array_push($tags, new Tag\Script($url));
        }

        $metas = array_map(fn($tag): string => '    ' . $tag->render(), array_filter($tags));

        $html = '<!DOCTYPE html>' . "\n";
        $html .= '<html lang="' . $this->language . '">' . "\n";
        $html .= '<head>' . "\n";
        $html .= implode("\n", $metas) . "\n";
        $html .= '</head>' . "\n";

        return $html;
    }
}
