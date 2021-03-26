<?php


namespace App\Utility;


class DataFormatter
{
    /**
     * @param $records
     * @return array
     * Format list of record.
     */
    public function list(array $records): array
    {
        $data = [];

        foreach ($records as $record)
            $data[] = $this->single($record);

        return $data;
    }//..... end of list() .....//

    /**
     * @param array $record
     * @return array
     * Format single record.
     */
    public function single(array $record): array
    {
        return [
            'airtable_id'   => $record['id'],
            'name'          => $record['fields']['Name'] ?? '',
            'email'         => $record['fields']['Email'] ?? '',
            'photo'         => json_encode($record['fields']['Photo'] ?? []),
            'status'        => 1
        ];
    }//..... end of single() .....//
}//..... end of class.
