<?php

namespace AM\Cartography\Service;

use \TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class GeoJSONService {
    /**
     *
     * @param ObjectStorage $points
     * @return string
     */

    public function convertPointsToGeoJSON(ObjectStorage $points) {
        $geoJSON = array(
            'type' => 'FeatureCollection'
        );

        foreach($points as $point) {
            $geoJSON['features'][] =
                array(
                    'type' => 'Feature',
                    'geometry' => array(
                        'type' => 'Point',
                        'coordinates' => array(
                            //TODO: Maybe there is a better way than casting a string
                            (float) $point->getLatitude(),
                            (float) $point->getLongitude(),
                            (float) $point->getAltitude()
                        )
                    ),
                    'properties' => array()
                );
        }

        return json_encode($geoJSON);

    }
}