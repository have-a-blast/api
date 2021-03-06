<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Application Entity
 *
 * @property int $id
 * @property int $activity_id
 * @property int $user_id
 * @property string $message
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $modified_at
 * @property \Cake\I18n\FrozenTime|null $deleted_at
 *
 * @property \App\Model\Entity\Activity $activity
 * @property \App\Model\Entity\User $user
 */
class Application extends Entity
{
    use AuthorizationTrait;

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
        'activity_id' => true,
        'user_id' => true,
        'message' => true
    ];
}
