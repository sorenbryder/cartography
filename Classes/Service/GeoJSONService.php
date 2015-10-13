<?php

namespace AM\Cartography\Service;

use AM\Cartography\Domain\Model\Feature;
use \TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class GeoJSONService {

    /**
     *
     * @param ObjectStorage $features
     * @return string
     */
    public function generateFeatureCollectionGeoJSON(ObjectStorage $features) {
        $geoArray = array(
            'type' => 'FeatureCollection'
        );

        foreach($features as $feature) {
            switch ($feature->getFeatureType()) {
                case 0:
                    $geoArray['features'][] = $this->generateFeatureArray($feature, 'Point');
                break;
                case 1:
                    $geoArray['features'][] = $this->generateFeatureArray($feature, 'LineString');
                break;
                case 2:
                    $geoArray['features'][] = $this->generateFeatureArray($feature, 'Polygon');
                break;
            }
        }

        return json_encode($geoArray);
    }

    /**
     *
     * @param Feature $feature
     * @param string $featureType
     * @return string
     */
    private function generateFeatureArray(Feature $feature, $featureType) {
        $coordinatesArray = array();
        foreach ($feature->getCoordinates() as $coordinates) {
            $coordinatesArray[] = array(
                (float) $coordinates->getLongitude(),
                (float) $coordinates->getLatitude(),
                (float) $coordinates->getAltitude()
            );
        }

        // Modify array structure slightly depending on feature type
        if ($featureType === 'Point') {
            $coordinatesArray = $coordinatesArray[0];
        }

        if ($featureType === 'Polygon') {
            // Start and end should be the same for a polygon
            $coordinatesArray[] = $coordinatesArray[0];
            $coordinatesArray = array($coordinatesArray);
        }

        $featureArray = array(
            'type' => 'Feature',
            'geometry' => array(
                'type' => $featureType,
                'coordinates' => $coordinatesArray,
            ),
            'properties' => array(
                'info' => $feature->getInfo(),
            )
        );

        return $featureArray;
    }
}