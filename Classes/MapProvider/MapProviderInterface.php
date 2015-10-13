<?php
namespace AM\Cartography\MapProvider;

use \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

interface MapProviderInterface {

    /**
     * @param ContentObjectRenderer $contentObjectRenderer
     * @param $settings array
     * @return string
     */
    public function renderMap(ContentObjectRenderer $contentObjectRenderer, $settings);

}