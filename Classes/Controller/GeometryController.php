<?php

namespace AM\Cartography\Controller;

use \TYPO3\CMS\Core\Cache\CacheManager;
use \TYPO3\CMS\Core\Cache\Exception\NoSuchCacheException;
use \TYPO3\CMS\Core\Cache\Frontend\FrontendInterface;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use \TYPO3\CMS\Core\Cache\Frontend\AbstractFrontend;
use \AM\Cartography\Domain\Repository\MapRepository;
use \AM\Cartography\Service\GeoJSONService;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;


class GeometryController extends ActionController {

    /**
     * @var MapRepository
     */
    protected $mapRepository;

    /**
     * @var GeoJSONService
     */
    protected $geoJSONService;

    /**
     * @var CacheManager
     */
    protected $cacheManager;

    /**
     * @var FrontendInterface
     */
    protected $frontend;

    /**
     *
     * @param MapRepository $mapRepository
     * @return void
     */
    public function injectMapRepository(MapRepository $mapRepository) {
        $this->mapRepository = $mapRepository;
    }

    /**
     *
     * @param GeoJSONService $geoJSONService
     * @return void
     */
    public function injectGeoJSONService(GeoJSONService $geoJSONService) {
       $this->geoJSONService = $geoJSONService;
    }

    public function initializeAction() {
        $this->initializeCache();
    }

    public function geoJSONAction() {
        $geoJson = '{}';
        if (is_numeric($uid = GeneralUtility::_GP('uid'))) {

            // Don't return anything, not even cached entry, if the map is not in the repository
            if (!is_null($map = $this->mapRepository->findByIdentifier($uid))) {
                if ($GLOBALS['TSFE']->sys_page->versioningPreview) {
                    $geoJson = $this->geoJSONService->generateFeatureCollectionGeoJSON($map->getFeatures());
                } else if ($this->frontend->get($uid) == FALSE) {
                    $geoJson = $this->geoJSONService->generateFeatureCollectionGeoJSON($map->getFeatures());
                    $this->frontend->set($uid, $geoJson);
                } else {
                    $geoJson = $this->frontend->get($uid);
                }
            }

        }

        return $geoJson;
    }

    /**
     * Initialize cache
     *
     * @return void
     */
    protected function initializeCache() {
        $this->cacheManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Cache\\CacheManager');
        try {
            $this->frontend = $this->cacheManager->getCache('cartography_cache');
        } catch (NoSuchCacheException $e) {

        }
    }
}