<?php

namespace Camspiers\StatisticalClassifier\SilverStripe;

use DataList;
use Camspiers\StatisticalClassifier\DataSource\DataArray;

/**
 * Class DataSource
 * @package Camspiers\StatisticalClassifier\SilverStripe
 */
class DataSource extends DataArray
{
    /**
     * @var \DataList
     */
    protected $list;

    /**
     * @param \DataList $list
     */
    public function __construct(DataList $list)
    {
        $this->list = $list;
    }
    /**
     * @return array
     */
    protected function read()
    {
        $data = array();
        foreach ($this->list as $result) {
            if ($result instanceof Document) {
                $document = $result->getDocument();
                foreach ($result->getCategories() as $category) {
                    $data[] = array(
                        'category' => $category,
                        'document' => $document
                    );
                }
            }
        }

        return $data;
    }
}
