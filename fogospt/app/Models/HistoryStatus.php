<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use \MongoDB\BSON\UTCDateTime;

class HistoryStatus extends Eloquent
{
    protected $connection = 'historyStatus';
    protected $collection  = 'data';

    public static function getLastRecordsById($id, $limit = 50)
    {
        try {
            $results = [
                [
                    'label' => Fire::getFire($id)['hour'],
                    'status' => 'Inicio',
                    'statusCode' => 99
                ]
            ];
            $queryRecords = self::where('id', $id)
                                ->orderBy('created', 'DESC')
                                ->get()->take($limit);
            foreach ($queryRecords as $queryRecord) {
                $queryRecord['label'] = $queryRecord['created']->toDateTime()->format('H:i');
                unset($queryRecord['created'], $queryRecord['updated']);
                $results[] = $queryRecord;
            }
            return $results;
        } catch (Exception $ex) {
            return ['error' => $ex->getMessage()];
        }
    }
}