<?php

namespace Axe\Core;

use Axe\Models\Options;

class Network
{

    static $cacheKey = 'network_options';
    private $networkOptions = [];
    private $expireCache = HOUR_IN_SECONDS / 2;

    public function __construct()
    {
    }

    static function makeCacheKey($prefix)
    {
        return self::$cacheKey.'_'.$prefix;
    }

    public function get()
    {
        $cacheKey = self::makeCacheKey('all');

        // Get fresh data.
        if ($this->isExpired($cacheKey)) {
            $this->setData($cacheKey);
        } else {
            $this->networkOptions = get_site_transient($cacheKey);
        }

        return $this->networkOptions;
    }

    public function getMainSite()
    {
        $cacheKey = self::makeCacheKey('main_site');
        // Get fresh data.
        if ($this->isExpired($cacheKey)) {
            $this->setMainSiteData($cacheKey);
        } else {
            $this->networkOptions = get_site_transient($cacheKey);
        }

        return $this->networkOptions[1];
    }

    static function getMainSiteLogo($class = '')
    {
        switch_to_blog(1);

        $logo = get_the_logo(true, 'site-logo', $class);

        restore_current_blog(); // NEED to restore the cuirrent blog

        return $logo;
    }

    static function getLogo($id = false, $class = '', $size = 'logo-sm')
    {
        if ($id) {
            switch_to_blog($id);
            $logo = get_the_logo(true, 'site-logo', $class, $size);
            restore_current_blog();
        } else {
            $logo = get_the_logo(true, 'site-logo', $class, $size);
        }

        return $logo;
    }

    public function setMainSiteData($cacheKey)
    {
        switch_to_blog(1);

        $this->networkOptions[1]['title']   = get_bloginfo('name');
        $this->networkOptions[1]['options'] = Options::get();

        set_site_transient($cacheKey, $this->networkOptions, $this->expireCache);

        restore_current_blog(); // NEED to restore the cuirrent blog
    }

    public function getAllSites()
    {
        return collect($this->get())->sortBy('title')->reject(function ($value, $key) {
            return ! _has($value, 'options.hide', false);
        });
    }

    public function setData($cacheKey)
    {
        foreach (get_sites() as $key => $site) {
            // Don't return data from the main site.
            if ($site->blog_id !== "1") {
                switch_to_blog($site->blog_id);

                $this->networkOptions[$site->blog_id]['title']   = get_bloginfo('name');
                $this->networkOptions[$site->blog_id]['url']     = get_site_url();
                $this->networkOptions[$site->blog_id]['options'] = Options::get();

                restore_current_blog(); // NEED to restore the cuirrent blog
            }
        }

        set_site_transient($cacheKey, $this->networkOptions, $this->expireCache);
    }

    public function isExpired($cacheKey)
    {
        // Don't cache for DEV
        if (WP_DEBUG) {
            return true;
        }

        return ! get_site_transient($cacheKey);
    }
}
