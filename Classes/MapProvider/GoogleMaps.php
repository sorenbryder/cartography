<?php
namespace AM\Cartography\MapProvider;

use \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

class GoogleMaps implements MapProviderInterface {

    /**
     * @param ContentObjectRenderer $contentObjectRenderer
     * @param $settings array
     * @return string
     */
    public function renderMap(ContentObjectRenderer $contentObjectRenderer, $settings) {
        $mapIdentifier = 'map' . $contentObjectRenderer->data['uid'];

        // Include CSS in TypoScript configuration
        $GLOBALS['TSFE']->pSetup['cssInline.']['5000'] = 'TEXT';
        $GLOBALS['TSFE']->pSetup['cssInline.']['5000.'] = array (
            'value' =>
<<<EOD
                .google-maps {
                    width: 500px;
                    height: 500px;
                }
EOD

        );

        // Include JS in TypoScript configuration
        $GLOBALS['TSFE']->pSetup['jsFooterInline.'][$contentObjectRenderer->data['uid']] = 'TEXT';
        $GLOBALS['TSFE']->pSetup['jsFooterInline.'][$contentObjectRenderer->data['uid'] . '.'] = array(
            'value' =>
<<<EOD
                var $mapIdentifier;
                function initMap$mapIdentifier() {
                    $mapIdentifier = new google.maps.Map(document.getElementById('$mapIdentifier'), {
                        center: {lat: $settings[centerLat], lng: $settings[centerLng]},
                        zoom: $settings[zoom]
                    });
                    $mapIdentifier.data.loadGeoJson('/index.php?type=5000&uid=$settings[mapUid]');
                }
                google.maps.event.addDomListener(window, 'load', initMap$mapIdentifier);
EOD
        );
        $GLOBALS['TSFE']->pSetup['includeJSFooterlibs.']['GoogleMaps'] = 'https://maps.googleapis.com/maps/api/js';
        $GLOBALS['TSFE']->pSetup['includeJSFooterlibs.']['GoogleMaps.']['external'] = 1;

        // Return a simple div for map
        return
<<<EOD
            <div id="$mapIdentifier" class="google-maps""></div>
EOD;

    }

}