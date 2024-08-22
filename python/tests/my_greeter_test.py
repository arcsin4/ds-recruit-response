import unittest
from src.my_greeter import MyGreeter

class TestStringMethods(unittest.TestCase):

    @classmethod
    def setUpClass(cls):
        cls._my_greeter = MyGreeter()

    def test_init(self):
        self.assertIsInstance(self._my_greeter, MyGreeter)

    def test_greeting(self):
        self.assertTrue(len(self._my_greeter.greeting())>0)

        # 王少强：此处按照正常逻辑判断当前时间应该返回的greeting字符串
        import datetime
        # 当前时间的小时数0-23
        h = int(datetime.datetime.now().strftime("%H"))

        if 6 <= h < 12:
            # 当运行时间在6AM至12AM之间时，返回 "Good morning"。
            self.assertTrue(self._my_greeter.greeting() == 'Good morning')

        elif 12 <= h < 18:
            # 当运行时间在12AM至6PM之间时，返回 "Good afternoon"。
            self.assertTrue(self._my_greeter.greeting() == 'Good afternoon')

        else:
            # 当运行时间在6PM至第二天6AM之间时，返回 "Good evening"。
            self.assertTrue(self._my_greeter.greeting() == 'Good evening')

    # 王少强：由于不太方便直接修改系统时间来进行test，所以我新增了greetingByHour，根据当前hour来返回greeting字符串，此处为test方法
    def test_greeting_by_hour(self):
        self.assertTrue(self._my_greeter.greetingByHour(6) == 'Good morning')
        self.assertTrue(self._my_greeter.greetingByHour(11) == 'Good morning')

        self.assertTrue(self._my_greeter.greetingByHour(12) == 'Good afternoon')
        self.assertTrue(self._my_greeter.greetingByHour(17) == 'Good afternoon')

        self.assertTrue(self._my_greeter.greetingByHour(18) == 'Good evening')
        self.assertTrue(self._my_greeter.greetingByHour(23) == 'Good evening')
        self.assertTrue(self._my_greeter.greetingByHour(0) == 'Good evening')
        self.assertTrue(self._my_greeter.greetingByHour(5) == 'Good evening')


if __name__ == '__main__':
    unittest.main()
