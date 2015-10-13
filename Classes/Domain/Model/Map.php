<?php
namespace AM\Cartography\Domain\Model;

class Map extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

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
     * @return \AM\Cartography\Domain\Model\Map
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
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getFeatures() {
        return $this->features;
    }

}
