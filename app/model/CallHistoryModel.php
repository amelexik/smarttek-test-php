<?php
/**
 * User: amelexik
 * Date: 14.11.2021
 */


class CallHistoryModel extends Model
{
    protected string $table = 'call_history';


    /**
     * @param $customerId
     * @param $date
     * @param $duration
     * @param $phoneNumber
     * @param $phoneCountry
     * @param $phoneContinent
     * @param $customer_ip
     * @param $costumerCountry
     * @param $costumerContinent
     * @return bool
     */
    public function add(
        $customerId, $date,
        $duration,
        $phoneNumber,
        $phoneCountry,
        $phoneContinent,
        $customer_ip,
        $costumerCountry,
        $costumerContinent
    ): bool
    {
        $query = "INSERT INTO {$this->table}
            (customer_id,date,duration,phone_number,phone_country,phone_continent,customer_ip,customer_country,customer_continent) 
            VALUES
            (:customer_id,:date,:duration,:phone_number,:phone_country,:phone_continent,:customer_ip,:customer_country,:customer_continent)";
        dump($query);
        if ($this->db->execute($query, [
            ':customer_id' => $customerId,
            ':date' => $date,
            ':duration' => $duration,
            ':phone_number' => $phoneNumber,
            ':phone_country' => $phoneCountry,
            ':phone_continent' => $phoneContinent,
            ':customer_ip' => $customer_ip,
            ':customer_country' => $costumerCountry,
            ':customer_continent' => $costumerContinent,
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