<?php
namespace AM\Cartography\Domain\Model;

class Coordinates extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * @var \DateTime
     */
    protected $crdate;

    /**
     * @var \DateTime
     */
    protected $tstamp;

    /**
     * @var boolean
     */
    protected $deleted;

    /**
     * @var integer
     */
    protected $cruserId;

    /**
     * @var string
     */
    protected $latitude;

    /**
     * @var string
     */
    protected $longitude;

    /**
     * @var string
     */
    protected $altitude;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AM\Cartography\Domain\Model\Feature>
     * @lazy
     */
    protected $features;

    /**
     * @var integer
     */
    protected $editlock;

    /**
     * @var integer
     */
    protected $sorting;

    /**
     *
     * @return \AM\Cartography\Domain\Model\Coordinates
     */
    public function __construct() {
        $this->features = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @return \DateTime
     */
    public function getCrdate() {
        return $this->crdate;
    }

    /**
     * @return \DateTime
     */
    public function getTstamp() {
        return $this->tstamp;
    }

    /**
     * @return boolean
     */
    public function isDeleted() {
        return $this->deleted;
    }

    /**
     * @return integer
     */
    public function getCruserId() {
        return $this->cruserId;
    }


    /**
     * @return string
     */
    public function getLatitude() {
        return $this->latitude;
    }

    /**
     * @return string
     */
    public function getLongitude() {
        return $this->longitude;
    }

    /**
     * @return string
     */
    public function getAltitude() {
        return $this->altitude;
    }

    /**
     * @return integer
     */
    public function getEditlock() {
        return $this->editlock;
    }

    /**
     * @return integer
     */
    public function getSorting() {
        return $this->sorting;
    }

    /**
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AM\Cartography\Domain\Model\Feature>
     */
    public function getFeatures() {
        return $this->features;
    }

}