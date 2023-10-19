<?php
/**
 * Created by PhpStorm.
 * User: 12271
 * Date: 2021/2/2
 * Time: 9:37
 * Note: testKMP.php
 */

class testKMP
{
  public function contains(string $text, string $pattern): int
  {
    if ($text == null || $pattern == null) {
      return -1;
    }
    $tlen = strlen($text);
    $plen = strlen($pattern);
    if ($tlen < $plen || $tlen == 0 || $plen == 0) {
      return -1;
    }
    $nexts = $this->nexts($pattern);
    $ti    = $pi = 0;
    $mlen  = $tlen - $plen;
    while ($pi < $plen && $ti - $pi <= $mlen) {
      if ($pi < 0 || $text[$ti] == $pattern[$pi]) {
        $pi++;
        $ti++;
      } else {
        $pi = $nexts[$pi];
      }
    }
    return $pi == $plen ? $ti - $pi : -1;
  }

  private function nexts(string $pattern): array
  {
    $len  = strlen($pattern);
    $i    = 0;
    $next = array_fill(0, $len, 0);
    $n    = $next[$i] = -1;
    $mlen = $len - 1;
    while ($i < $mlen) {
      if ($n < 0 || $pattern[$i] == $pattern[$n]) {
        $n++;
        $i++;
        if ($pattern[$i] == $pattern[$n]) {
          $next[$i] = $next[$n];
        } else {
          $next[$i] = $n;
        }
      } else {
        $n = $next[$n];
      }
    }
    return $next;
  }
}
