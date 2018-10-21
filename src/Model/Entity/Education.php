<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Education Entity
 *
 * @property int $id
 * @property string $degree
 *
 * @property \App\Model\Entity\ActivityFilterEducation[] $activity_filter_education
 * @property \App\Model\Entity\User[] $users
 */
class Education extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'degree' => true,
        'activity_filter_education' => true,
        'users' => true
    ];
}
