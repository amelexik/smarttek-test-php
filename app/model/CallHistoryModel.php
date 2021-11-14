<?php
/**
 * User: amelexik
 * Date: 14.11.2021
 */


class CallHistoryModel extends Model
{
    protected string $table = 'call_history';


    /**
     * @param $clientId
     * @param $date
     * @param $duration
     * @param $phoneNumber
     * @param $ip
     * @return bool
     */
    public function add($clientId, $date, $duration, $phoneNumber, $ip): bool
    {
        $query = "INSERT INTO {$this->table}
            (client_id,date,duration,phone_number,ip) 
            VALUES
            (:client_id,:date,:duration,:phone_number,:ip)";
        if ($this->db->execute($query, [
            ':client_id' => $clientId,
            ':date' => $date,
            ':duration' => $duration,
            ':phone_number' => $phoneNumber,
            ':ip' => $ip
        ])) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function truncate(): bool
    {
        $query = "TRUNCATE {$this->table}";
        if ($this->db->execute($query)) {
            return true;
        }
        return false;
    }
}