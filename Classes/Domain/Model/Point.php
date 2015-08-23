<?php
namespace AM\Cartography\Domain\Model;

class Point extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

    /**
     * @var \DateTime
     */
    protected $crdate;

    /**
     * @var \DateTime
     */
    protected $tstamp;

    /**
     * @var \DateTime
     */
    protected $starttime;

    /**
     * @var \DateTime
     */
    protected $endtime;

    /**
     * @var string
     */
    protected $feGroup;

    /**
     * @var boolean
     */
    protected $hidden;

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
    protected $title;

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
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AM\Cartography\Domain\Model\Map>
     * @lazy
     */
    protected $maps;

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
     * @return \AM\Cartography\Domain\Model\Point
     */
    public function __construct() {
        $this->maps = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * @return \DateTime
     */
    public function getStarttime() {
        return $this->starttime;
    }

    /**
     * @return \DateTime
     */
    public function getEndtime() {
        return $this->endtime;
    }

    /**
     * @return string
     */
    public function getFeGroup() {
        return $this->feGroup;
    }

    /**
     * @return boolean
     */
    public function isHidden() {
        return $this->hidden;
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
    public function getTitle() {
        return $this->title;
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
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AM\Cartography\Domain\Model\Map>
     */
    public function getMaps() {
        return $this->maps;
    }

}
