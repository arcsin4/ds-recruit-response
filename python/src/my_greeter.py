# -*- coding: utf-8 -*-
"""
Author: wang.shaoqiang
Date: 2024-08-22 10:40:54
LastEditors: wang.shaoqiang
LastEditTime: 2024-08-22 14:30:50
FilePath: /ds-recruit-response/python/src/my_greeter.py
Description: 能够根据不同的运行时间返回不同的消息字符串
    - 实现一个方法（让我们叫他greeting），能够根据不同的运行时间返回不同的消息字符串。
    - 当运行时间在6AM至12AM之间时，返回 "Good morning"。
    - 当运行时间在12AM至6PM之间时，返回 "Good afternoon"。
    - 当运行时间在6PM至第二天6AM之间时，返回 "Good evening"。
"""
import datetime


class MyGreeter(object):

    _rtnMsgArr = {
        "morning": "Good morning",
        "afternoon": "Good afternoon",
        "evening": "Good evening",
    }

    def greeting(self) -> str:
        # 当前时间的小时数0-23
        h = int(datetime.datetime.now().strftime("%H"))

        return self.greetingByHour(h)

    # 王少强：此处方法为根据指定的时间（小时）来返回指定的greeting字符串
    def greetingByHour(self, h: int) -> str:
        if h < 24:
            if 6 <= h < 12:
                # 当运行时间在6AM至12AM之间时，返回 "Good morning"。
                return self._rtnMsgArr['morning']

            elif 12 <= h < 18:
                # 当运行时间在12AM至6PM之间时，返回 "Good afternoon"。
                return self._rtnMsgArr['afternoon']

            # 当运行时间在6PM至第二天6AM之间时，返回 "Good evening"。
            return self._rtnMsgArr['evening']

        return ''

