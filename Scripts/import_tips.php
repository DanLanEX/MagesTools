<?php
function f2h($str)
{
    $arr = array(
        '０' => '0', '１' => '1', '２' => '2', '３' => '3', '４' => '4',
        '５' => '5', '６' => '6', '７' => '7', '８' => '8', '９' => '9',
        'Ａ' => 'A', 'Ｂ' => 'B', 'Ｃ' => 'C', 'Ｄ' => 'D', 'Ｅ' => 'E',
        'Ｆ' => 'F', 'Ｇ' => 'G', 'Ｈ' => 'H', 'Ｉ' => 'I', 'Ｊ' => 'J',
        'Ｋ' => 'K', 'Ｌ' => 'L', 'Ｍ' => 'M', 'Ｎ' => 'N', 'Ｏ' => 'O',
        'Ｐ' => 'P', 'Ｑ' => 'Q', 'Ｒ' => 'R', 'Ｓ' => 'S', 'Ｔ' => 'T',
        'Ｕ' => 'U', 'Ｖ' => 'V', 'Ｗ' => 'W', 'Ｘ' => 'X', 'Ｙ' => 'Y',
        'Ｚ' => 'Z', 'ａ' => 'a', 'ｂ' => 'b', 'ｃ' => 'c', 'ｄ' => 'd',
        'ｅ' => 'e', 'ｆ' => 'f', 'ｇ' => 'g', 'ｈ' => 'h', 'ｉ' => 'i',
        'ｊ' => 'j', 'ｋ' => 'k', 'ｌ' => 'l', 'ｍ' => 'm', 'ｎ' => 'n',
        'ｏ' => 'o', 'ｐ' => 'p', 'ｑ' => 'q', 'ｒ' => 'r', 'ｓ' => 's',
        'ｔ' => 't', 'ｕ' => 'u', 'ｖ' => 'v', 'ｗ' => 'w', 'ｘ' => 'x',
        'ｙ' => 'y', 'ｚ' => 'z', '（' => '(', '）' => ')',
        '〔' => '[', '〕' => ']', '【' => '[', '】' => ']',
        '〖' => '[', '〗' => ']', '“' => '[', '”' => ']', '‘' => '[',
        '’' => ']', '｛' => '{', '｝' => '}', '《' => '<', '》' => '>',
        '％' => '%', '＋' => '+', '—' => '-', '－' => '-', '～' => '-',
        '：' => ':', '。' => '.', '、' => ',', '，' => '.', '、' => '.',
        '；' => ',', '？' => '?', '！' => '!', '…' => '-', '‖' => '|',
        '”' => '"', '’' => '`', '‘' => '`', '｜' => '|', '〃' => '"',
        '　' => ' ', '＄' => '$', '＠' => '@', '＃' => '#', '＾' => '^', '＆' => '&',
        '＊' => '*', '＂' => '"'
    );
    return strtr($str, $arr);
}

function h2f($str)
{
    $arr = array(
        '0' => '０', '1' => '１', '2' => '２', '3' => '３', '4' => '４',
        '5' => '５', '6' => '６', '7' => '７', '8' => '８', '9' => '９',
        'A' => 'Ａ', 'B' => 'Ｂ', 'C' => 'Ｃ', 'D' => 'Ｄ', 'E' => 'Ｅ',
        'F' => 'Ｆ', 'G' => 'Ｇ', 'H' => 'Ｈ', 'I' => 'Ｉ', 'J' => 'Ｊ',
        'K' => 'Ｋ', 'L' => 'Ｌ', 'M' => 'Ｍ', 'N' => 'Ｎ', 'O' => 'Ｏ',
        'P' => 'Ｐ', 'Q' => 'Ｑ', 'R' => 'Ｒ', 'S' => 'Ｓ', 'T' => 'Ｔ',
        'U' => 'Ｕ', 'V' => 'Ｖ', 'W' => 'Ｗ', 'X' => 'Ｘ', 'Y' => 'Ｙ',
        'Z' => 'Ｚ', 'a' => 'ａ', 'b' => 'ｂ', 'c' => 'ｃ', 'd' => 'ｄ',
        'e' => 'ｅ', 'f' => 'ｆ', 'g' => 'ｇ', 'h' => 'ｈ', 'i' => 'ｉ',
        'j' => 'ｊ', 'k' => 'ｋ', 'l' => 'ｌ', 'm' => 'ｍ', 'n' => 'ｎ',
        'o' => 'ｏ', 'p' => 'ｐ', 'q' => 'ｑ', 'r' => 'ｒ', 's' => 'ｓ',
        't' => 'ｔ', 'u' => 'ｕ', 'v' => 'ｖ', 'w' => 'ｗ', 'x' => 'ｘ',
        'y' => 'ｙ', 'z' => 'ｚ', '(' => '（', ')' => '）',
        '[' => '〔', ']' => '〕', '[' => '【', ']' => '】',
        '[' => '〖', ']' => '〗', '[' => '“', ']' => '”', '[' => '‘',
        ']' => '’', '{' => '｛', '}' => '｝', '<' => '《', '>' => '》',
        '%' => '％', '+' => '＋', '-' => '—', '-' => '－', '-' => '～',
        ':' => '：', '.' => '。', ',' => '、', '.' => '，', '.' => '、',
        ',' => '；', '?' => '？', '!' => '！', '-' => '…', '|' => '‖',
        '"' => '”', '`' => '’', '`' => '‘', '|' => '｜', '"' => '〃',
        ' ' => '　', '$' => '＄', '@' => '＠', '#' => '＃', '^' => '＾', '&' => '＆',
        '*' => '＊', '"' => '＂'
    );
    return strtr($str, $arr);
}

function getFirstCharter($str)
{
    if (empty($str)) {
        return '';
    }
    $fchar = ord($str[0]);
    if ($fchar >= ord('A') && $fchar <= ord('Z') || $fchar >= ord('a') && $fchar <= ord('z')) return strtoupper($str[0]);    $s1 = iconv('UTF-8', 'gb2312', $str);
    $s2 = iconv('gb2312', 'UTF-8', $s1);
    $s = $s2 == $str ? $s1 : $str;
    if(!isset($s[1]))
    {
        return '';
    }
    $asc = ord($s[0]) * 256 + ord($s[1]) - 65536;
    if ($asc >= -20319 && $asc <= -20284) return 'A';
    if ($asc >= -20283 && $asc <= -19776) return 'B';
    if ($asc >= -19775 && $asc <= -19219) return 'C';
    if ($asc >= -19218 && $asc <= -18711) return 'D';
    if ($asc >= -18710 && $asc <= -18527) return 'E';
    if ($asc >= -18526 && $asc <= -18240) return 'F';
    if ($asc >= -18239 && $asc <= -17923) return 'G';
    if ($asc >= -17922 && $asc <= -17418) return 'H';
    if ($asc >= -17417 && $asc <= -16475) return 'J';
    if ($asc >= -16474 && $asc <= -16213) return 'K';
    if ($asc >= -16212 && $asc <= -15641) return 'L';
    if ($asc >= -15640 && $asc <= -15166) return 'M';
    if ($asc >= -15165 && $asc <= -14923) return 'N';
    if ($asc >= -14922 && $asc <= -14915) return 'O';
    if ($asc >= -14914 && $asc <= -14631) return 'P';
    if ($asc >= -14630 && $asc <= -14150) return 'Q';
    if ($asc >= -14149 && $asc <= -14091) return 'R';
    if ($asc >= -14090 && $asc <= -13319) return 'S';
    if ($asc >= -13318 && $asc <= -12839) return 'T';
    if ($asc >= -12838 && $asc <= -12557) return 'W';
    if ($asc >= -12556 && $asc <= -11848) return 'X';
    if ($asc >= -11847 && $asc <= -11056) return 'Y';
    if ($asc >= -11055 && $asc <= -10247) return 'Z';
    return '';
}

$original = json_decode(file_get_contents('local/tips_old.json'), true);
$translated = json_decode(file_get_contents('local/tips_new.json'), true);

$result = array();
for ($i = 0; $i < count($translated); $i++) {
    $o = $original[$i];
    $t = $translated[$i];
    $result[] = array(
        $t['category']
    );
    $result[] = array(
        $t['name']
    );
    $result[] = array(
        $t['extra']
    );
    $result[] = array(
        h2f(implode('', array_map(function ($c) {
            return getFirstCharter($c);
        }, preg_split('//u', f2h($t['name']), -1, PREG_SPLIT_NO_EMPTY))))
    );
    $result[] = array(
        $t['content']
    );
}
file_put_contents('local/tips.json', json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
