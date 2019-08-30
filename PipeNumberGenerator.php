<?php

class PipeNumberGenerator
{
    /**
     * 生成序列号
     * @param string $perfix_str
     * @return string
     */
    public static function create($perfix_str = '')
    {
        //订单号码主体（YYYYMMDDHHIISSNNNNNNNN）
        $order_id_main = date('YmdHis') . rand(10000000, 99999999);

        //订单号码主体长度
        $order_id_len = strlen($order_id_main);
        $order_id_sum = 0;
        for ($i = 0; $i < $order_id_len; $i++) {
            $order_id_sum += (int)(substr($order_id_main, $i, 1));
        }

        //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
        return $perfix_str . $order_id_main . str_pad((100 - $order_id_sum % 100) % 100, 2, '0', STR_PAD_LEFT);
    }
}
