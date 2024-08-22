<?php
/*
 * @Author: wang.shaoqiang
 * @Date: 2024-08-21 18:31:46
 * @LastEditors: wang.shaoqiang wangshaoqiang
 * @LastEditTime: 2024-08-22 14:47:15
 * @FilePath: /ds-recruit-response/php/Src/MyGreeter.php
 * @Description: 能够根据不同的运行时间返回不同的消息字符串
 *  - 实现一个方法（让我们叫他greeting），能够根据不同的运行时间返回不同的消息字符串。
 *  - 当运行时间在6AM至12AM之间时，返回 "Good morning"。
 *  - 当运行时间在12AM至6PM之间时，返回 "Good afternoon"。
 *  - 当运行时间在6PM至第二天6AM之间时，返回 "Good evening"。
 */

namespace Src;

class MyGreeter
{
    private $rtnMsgArr = [
        "morning" => "Good morning",
        "afternoon" => "Good afternoon",
        "evening" => "Good evening",
    ];

    public function greeting(): string
    {
        # 当前时间的小时数0-23
        $h = date("H");

        return $this->greetingByHour($h);
    }

    # 王少强：此处方法为根据指定的时间（小时）来返回指定的greeting字符串
    public function greetingByHour(int $h): string 
    {

        if (!isset($h)){
            return "";
        }
        $h = intval($h);

        if ($h < 24) {
            if ($h >= 6 && $h < 12) {
                # 当运行时间在6AM至12AM之间时，返回 "Good morning"。
                return $this->rtnMsgArr['morning'];
            }
            else if ($h >= 12 && $h < 18) {
                # 当运行时间在12AM至6PM之间时，返回 "Good afternoon"。
                return $this->rtnMsgArr['afternoon'];
            }

            # 当运行时间在6PM至第二天6AM之间时，返回 "Good evening"。
            return $this->rtnMsgArr['evening'];
        }

        return "";
    }
}