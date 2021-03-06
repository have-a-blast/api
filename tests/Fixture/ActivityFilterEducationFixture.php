<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActivityFilterEducationFixture
 *
 */
class ActivityFilterEducationFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'activity_filter_education';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'filter_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'education_id' => ['type' => 'tinyinteger', 'length' => 3, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'education_id' => ['type' => 'index', 'columns' => ['education_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['filter_id', 'education_id'], 'length' => []],
            'activity_filter_education_ibfk_1' => ['type' => 'foreign', 'columns' => ['education_id'], 'references' => ['education', 'id'], 'update' => 'cascade', 'delete' => 'noAction', 'length' => []],
            'activity_filter_education_ibfk_2' => ['type' => 'foreign', 'columns' => ['filter_id'], 'references' => ['activity_filters', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'filter_id' => 1,
                'education_id' => 1
            ],
        ];
        parent::init();
    }
}
