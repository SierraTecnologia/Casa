<?php

/**
 * This file is part of Gitonomy.
 *
 * (c) Alexandre Salomé <alexandre.salome@gmail.com>
 * (c) Julien DIDIER <genzo.wm@gmail.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Casa\Models\Registers;

use Muleta\Traits\Models\ComplexRelationamentTrait;
use Support\Models\Base;
use Log;

class Spent extends Base
{
    use ComplexRelationamentTrait;

    protected $organizationPerspective = true;

    protected $table = 'spents';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'collaborator_id',
        'user_id',
        'initwork',
        'tempo_gasto'
    ];

    // class JiraRestApi\Issue\TimeTracking#6230 (6) {
    //     public $originalEstimate =>
    //     NULL
    //     public $remainingEstimate =>
    //     string(2) "0m"
    //     public $timeSpent =>
    //     string(2) "2d"
    //     public $originalEstimateSeconds =>
    //     NULL
    //     public $remainingEstimateSeconds =>
    //     int(0)
    //     public $timeSpentSeconds =>
    //     int(57600)
    //   }
    // class JiraRestApi\Issue\Worklog#5479 (12) {
    //     public $id =>
    //     int(10012)
    //     public $self =>
    //     string(70) "https://stopclubdev.atlassian.net/rest/api/2/issue/10169/worklog/10012"
    //     public $author =>
    //     array(8) {
    //       'self' =>
    //       string(84) "https://stopclubdev.atlassian.net/rest/api/2/user?accountId=5d6eac856e3e1f0d9623d3e7"
    //       'accountId' =>
    //       string(24) "5d6eac856e3e1f0d9623d3e7"
    //       'emailAddress' =>
    //       string(22) "sierra@stopclub.com.br"
    //       'avatarUrls' =>
    //       class stdClass#5450 (4) {
    //         public $48x48 =>
    //         string(180) "https://secure.gravatar.com/avatar/a0bb8b177e5da55802f6974f5af1ef2c?d=https%3A%2F%2Favatar-management--avatars.us-west-2.prod.public.
    //   atl-paas.net%2Finitials%2FRS-4.png&size=48&s=48"
    //         public $24x24 =>
    //         string(180) "https://secure.gravatar.com/avatar/a0bb8b177e5da55802f6974f5af1ef2c?d=https%3A%2F%2Favatar-management--avatars.us-west-2.prod.public.
    //   atl-paas.net%2Finitials%2FRS-4.png&size=24&s=24"
    //         public $16x16 =>
    //         string(180) "https://secure.gravatar.com/avatar/a0bb8b177e5da55802f6974f5af1ef2c?d=https%3A%2F%2Favatar-management--avatars.us-west-2.prod.public.
    //   atl-paas.net%2Finitials%2FRS-4.png&size=16&s=16"
    //         public $32x32 =>
    //         string(180) "https://secure.gravatar.com/avatar/a0bb8b177e5da55802f6974f5af1ef2c?d=https%3A%2F%2Favatar-management--avatars.us-west-2.prod.public.
    //   atl-paas.net%2Finitials%2FRS-4.png&size=32&s=32"
    //       }
    //       'displayName' =>
    //       string(14) "Ricardo Sierra"
    //       'active' =>
    //       bool(true)
    //       'timeZone' =>
    //       string(17) "America/Sao_Paulo"
    //       'accountType' =>
    //       string(9) "atlassian"
    //     }
    //     public $updateAuthor =>
    //     array(8) {
    //       'self' =>
    //       string(84) "https://stopclubdev.atlassian.net/rest/api/2/user?accountId=5d6eac856e3e1f0d9623d3e7"
    //       'accountId' =>
    //       string(24) "5d6eac856e3e1f0d9623d3e7"
    //       'emailAddress' =>
    //       string(22) "sierra@stopclub.com.br"
    //       'avatarUrls' =>
    //       class stdClass#4799 (4) {
    //         public $48x48 =>
    //         string(180) "https://secure.gravatar.com/avatar/a0bb8b177e5da55802f6974f5af1ef2c?d=https%3A%2F%2Favatar-management--avatars.us-west-2.prod.public.
    //   atl-paas.net%2Finitials%2FRS-4.png&size=48&s=48"
    //         public $24x24 =>
    //         string(180) "https://secure.gravatar.com/avatar/a0bb8b177e5da55802f6974f5af1ef2c?d=https%3A%2F%2Favatar-management--avatars.us-west-2.prod.public.
    //   atl-paas.net%2Finitials%2FRS-4.png&size=24&s=24"
    //         public $16x16 =>
    //         string(180) "https://secure.gravatar.com/avatar/a0bb8b177e5da55802f6974f5af1ef2c?d=https%3A%2F%2Favatar-management--avatars.us-west-2.prod.public.
    //   atl-paas.net%2Finitials%2FRS-4.png&size=16&s=16"
    //         public $32x32 =>
    //         string(180) "https://secure.gravatar.com/avatar/a0bb8b177e5da55802f6974f5af1ef2c?d=https%3A%2F%2Favatar-management--avatars.us-west-2.prod.public.
    //   atl-paas.net%2Finitials%2FRS-4.png&size=32&s=32"
    //       }
    //       'displayName' =>
    //       string(14) "Ricardo Sierra"
    //       'active' =>
    //       bool(true)
    //       'timeZone' =>
    //       string(17) "America/Sao_Paulo"
    //       'accountType' =>
    //       string(9) "atlassian"
    //     }
    //     public $updated =>
    //     string(28) "2020-02-03T18:50:07.660-0300"
    //     public $timeSpent =>
    //     string(2) "2d"
    //     public $comment =>
    //     NULL
    //     public $started =>
    //     string(28) "2020-01-29T18:49:00.000-0300"
    //     public $timeSpentSeconds =>
    //     int(57600)
      
    /**
     * @todo diferenciar worklog de timespent
     */
    public static function registerSpentForIssue($spent, $projectUrl = false)
    {
        return true;
        // $field =  self::firstOrCreate([
        //     'name' => $field->name
        // ]);

        // if ($projectUrl) {
        //     if (!$reference = Reference::where([
        //         'code' => $projectUrl
        //     ])->first()) {
        //         $reference = Reference::create([
        //             'code' => $projectUrl,
        //             'name' => $projectUrl,
        //         ]);
        //     }
        //     if (!$field->references()->where('reference_id', $reference->id)->first()) {
        //         $field->references()->save(
        //             $reference,
        //             [
        //                 'identify' => $field->id,
        //             ]
        //         );
        //     }
        // }
        // return $field;

        // if (!empty($rets)){
        //     foreach ($rets as $ret) {
        //         if (!empty($ret)) {
        //             Spent::firstOrCreate([
        //                 'name' => $ret->name
        //             ]);
        //         }
        //     }
        // }
    }
}
