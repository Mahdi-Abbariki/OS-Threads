<?php

namespace Classes;

class Helper
{
    public static function makeTheGrammarArray(string $grammar): array
    {
        $res = [];
        $array = explode("@", $grammar);
        foreach ($array as $item) {
            $arr = explode('=', $item);
            $key = $arr[0];
            $value = $arr[1];

            $res[$key] = $value;
        }
        return $res;
    }
}