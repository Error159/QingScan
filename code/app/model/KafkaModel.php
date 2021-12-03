<?php

namespace app\model;

use \RdKafka\Conf;
use \RdKafka\Producer;
use \RdKafka\Consumer;
use think\facade\Db;

class KafkaModel extends BaseModel
{
    /**
     * consumeStart
     *   第一个参数标识分区，生产者是往分区0发送的消息，这里也从分区0拉取消息
     *   第二个参数标识从什么位置开始拉取消息，可选值为
     *     RD_KAFKA_OFFSET_BEGINNING : 从开始拉取消息
     *     RD_KAFKA_OFFSET_END : 从当前位置开始拉取消息
     *     RD_KAFKA_OFFSET_STORED : 猜测跟RD_KAFKA_OFFSET_END一样
     */
    public static function xiaofei()
    {
        $conf = new \RdKafka\Conf();
        $conf->set("bootstrap.servers", "10.83.52.133:9092,10.83.52.50:9092");
        $objRdKafka = new \RdKafka\Consumer($conf);
        $objRdKafka->addBrokers("10.83.52.133:9092,10.83.52.50:9092");

        $oObjTopic = $objRdKafka->newTopic("kms_aws");
        $oObjTopic->consumeStart(0, RD_KAFKA_OFFSET_END);

        while (true) {
            // 第一个参数是分区，第二个参数是超时时间
            $oMsg = $oObjTopic->consume(0, 1000);

            // 没拉取到消息时，返回NULL
            if (!$oMsg) {
                usleep(10000);
                continue;
            }
            if ($oMsg->err) {
                echo $oMsg->errstr(), "\n";
                break;
            } else {
                $arr = json_decode($oMsg->payload, true);
                if (!isset($arr['message']) || !strstr($arr['message'], "hmac-sha256")) {
                    continue;
                }
                if (!strstr($arr['message'], '"kv"')) {
                    continue;
                }
                $kmsData = json_decode($arr['message'], true);
                $kmsData['path'] = $kmsData['request']['path'];
                foreach ($kmsData as &$value) {
                    $value = is_string($value) ? $value : json_encode($value);
                }
                $kmsData['hash'] = md5($kmsData['request'].($kmsData['response'] ?? ''));

                Db::table('kms_audit')->extra('IGNORE')->insert($kmsData);


            }
        }
    }

    public static function sendMsg($msg)
    {

        $rk = new Rdkafka\Producer();
        $rk->setLogLevel(LOG_DEBUG);
        // 链接kafka集群
        $rk->addBrokers("10.83.52.133:9092,10.83.52.50:9092");
        // 创建topic
        $topic = $rk->newTopic("kms_aws_data");

        try {
            $topic->produce(RD_KAFKA_PARTITION_UA, 0, $msg);
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }
}
