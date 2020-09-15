<?php


namespace App\Libraries;


class Data
{
    static function distribution()
    {
        return [
            'u' => '未知',
            'o' => '开源',
            'f' => '免费',
            'b' => '商业授权'
        ];
    }

    static function genders()
    {
        return [
            '无' => '无',
            '男' => '男',
            '女' => '女'
        ];
    }
}
