<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\db\Exception;
use yii\helpers\Console;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    public function actionDump($table_name)
    {
        try {
            $sql = "SELECT * FROM $table_name";
            $dataReader = Yii::$app->db->createCommand($sql)->queryAll();
            foreach ($dataReader as $item) {
                var_dump($item);
            }

            return ExitCode::OK;
        } catch (Exception $e) {
            Console::error($e->getMessage());
            return ExitCode::UNSPECIFIED_ERROR;
        }
    }
}
