<?php
namespace AM\Cartography\Controller;


use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;


class MapController extends ActionController {

    public function showAction() {

        // Default values if they are not set in plugin
        $this->settings['centerLat'] = $this->settings['centerLat'] ?: '50';
        $this->settings['centerLng'] = $this->settings['centerLng'] ?: '10';
        $this->settings['zoom'] = $this->settings['zoom'] ?: '4';
        $this->settings['snazzy'] = $this->settings['snazzy'] ?: '[]';

        // Render map
        $contentObj = $this->configurationManager->getContentObject();
        $mapProvider = $this->objectManager->get($this->settings['mapProvider']);
        $map = $mapProvider->renderMap($contentObj, $this->settings);
        $this->view->assign('map', $map);

    }


}