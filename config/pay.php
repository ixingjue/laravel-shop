<?php
return
    [
        'alipay' => [
            'app_id' => '2016092300578592',
            'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzvjbu88dBT6ygPIcxc6Pwc8XAQIhZUIaKELwCrqsE7u9hlj4Zfb0spUNmQ9eTUHdfHsCT4VmmSh6lHO66HEVQyvzL1qCJK0wf0p3RJBnkPb09qakSWHO7w9P+JPELshg5g6kp2NgoAusWvi8b+g91ZDQpCJlEuqa+csaLO3VmV7P0kMseSpgmnxjMbDg2r6XFuyz2wAN+dnOeLov45at0+mchDp3xS7ogEn/fzbIQRnb1jNMVvPP//2LAuXfJVMM+KTibZuSx5oj73VL/8iL2IACU7FGVoTLcE7hkmCc7B92Cbpn3Tlgzq1Tuecr+HBe4PAsf6o8kmpJctI8EfSQgQIDAQAB',
            'private_key' => 'MIIEowIBAAKCAQEA13yKTKNTBagUwhUp12X+5o2QUnNgcwbdZ913i8GeiZpVIvr3e9IZow+XV4mXpiUbDDPtQt/3b/5Y1zuj+J/qVM6yK9kxS+6BnClNKoKdUGmnzAz0FyOrhjuiBtANymMZTJhCjjA7kAecrCDRlLK3Xgx+AdodH+qb9T1ltSDzl6gnjQ2laeZUBPflxgJNHWcqHZa+N6Ijms5PjNhfAUWCkBF9JUhmr1ydvXdVbFQ7Q1P3b2FzyGTzMNcWMm8J1K2R3WaO736fa3BVpJWSmrsb0gKyGJbdBy3sBKjR+R7xNrhlcYgWUu74omlSAv9zGlCMsAnIQ2P41o2e7Ix+6AwmnQIDAQABAoIBAF6ZcxGQBeuOzYYiylqgkVXfwgMgWbBFzD9Dz66QEqxwD34q1SkLpGucdaFdazDqS0SBK2DXeAY3kAL1UNfeRH50u21ajTS7gTTwQMsvyiY6LAr9iM77vtpQJaJ+Bf/an4mrslQ/wnZJkTNTuQ5hovRr4Ymomm6fjVYNXTA2RhpGTtPYVp5ePpCEmONzwanHmL5YrotJM34D64Xgsu8sYs3zcbTYYrFoUQ1rtvpyYnNha0JAWWZJkQlCuL+JmSF209C8ShQa0N3es2m6eu1oJg3mNTtFuPYOGl8UiSWWPnUoW1BEbc1ZUKug+oa5G7UEi7q78mFhesaDx5xJYyOV1qECgYEA7O8CYBbL8H6pEFN0M0CR3Z1X5GWpCRTJ24X/NebjiIt5VR17zNhqYtWCh69f8eQ9d7r/spzzMq+33UtUsONSj3taRN7Ox9f5ZzFFgVmy7JRgIIxtyZ06AQadXRUtZo1ZV7xhBtypMIRIBgPfFnGKSoR3bUmRmOmeKquwceUt5IUCgYEA6NO0mgRXLfGkKRiAzDcZfL7fqaN+Mxjxo21pbEz9p1F/CnFKkmciwT+Fpe/EQcZW9UQTonLb2Ndu6UzfmQ9lH6kq5kpEC39uMzxjJb8tFG5dwF0b6fFneHLf1BQYXxgbT15CK+kQDCRqQgHH/lvXZeI4gP5TSQyZDg1VB/UcwTkCgYAxNRZuNG3YncWpAVwRxOhGeYYmhkKMA0hFElhFrpU055qkZcIvcgbuTd+VJIQtrbRiaHDwfI45yarLB/kn355m9Dx0Lz4M3TsMBnyj96gkYFBykhe/FqtUSTZnfZ13PgX/Jb2U+kEdNWvr6+PqOlx5S3euN+hINMTHoe68SNe2LQKBgH0WUK92qYfrjTDvEzOkXrMgsXWoewLk4d3VyJABBT5BkKmBmHjzpD6C7EDsglp8PvfirVHXt7nWdKYvQOow1TmfX4b+W3R58DDivrnm7kdNzFyvKXIU2mxh+1MrwLRGdVW85HxG6PI9FkGER3imyyDX21eiTAixFgHws8BktiAxAoGBAOOkmfdyOSNp2Y1aJqEpagvU2Bop5P5OLWXitGXlG2MCFklY/W1bDDZBtCpWB1UxtqS70kY3JtvqPzI+1fHfky6bedxNE8AhOOcZJsd4ROzC8N9uNYm1IzXAsPNFy/yzYFXiNzC/m06Lc1TzR3ZGdWhQF/muL1LkH/uxv1c9/I28',
            'log' => [
                'file' => storage_path('logs/alipay.log'),
            ],
        ],
        'wechat' => [
            'app_id' => '',
            'mch_id' => '',
            'key' => '',
            'cert_client' => '',
            'cert_key' => '',
            'log' => [
                'file' => storage_path('logs/wechat_pay.log'),
            ],
        ],
    ];