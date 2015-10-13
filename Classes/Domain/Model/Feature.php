<?php
namespace AM\Cartography\Domain\Model;

class Feature extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

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
    protected $featureType;

    /**
     * @var string
     */
    protected $info;


    /**
     * @var string
     */
    protected $title;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AM\Cartography\Domain\Model\Map>
     * @lazy
     */
    protected $maps;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AM\Cartography\Domain\Model\Coordinates>
     * @lazy
     */
    protected $coordinates;

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
     * @return \AM\Cartography\Domain\Model\Feature
     */
    public function __construct() {
        $this->maps = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->coordinates = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * @return string
     */
    public function getFeatureType() {
        return $this->featureType;
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
    public function getInfo() {
        return $this->info;
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

    /**
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AM\Cartography\Domain\Model\Coordinates>
     */
    public function getCoordinates() {
        return $this->coordinates;
    }

}
