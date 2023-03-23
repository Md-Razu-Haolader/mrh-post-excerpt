<?php

namespace MRH\PostExcerpt;

/**
 * Plugin activator class
 */
class Activator
{

    /**
     * Runs the activator
     *
     * @return void
     */
    public function run()
    {
        $this->add_plugin_info();
    }

    /**
     * Adds plugin info
     *
     * @return void
     */
    public function add_plugin_info()
    {
        $activated = get_option('mrhpe_installation_time');

        if (!$activated) {
            update_option('mrhpe_installation_time', time());
        }

        update_option('mrhpe_version', MRHPE_VERSION);
    }
}
