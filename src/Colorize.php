<?php

namespace BobV\IrkerUtils;

class Colorize
{
  /**
   * 0  White  (255,255,255)
   * 1  Black  (0,0,0)
   * 2  Blue  (0,0,127)
   * 3  Green  (0,147,0)
   * 4  Light Red  (255,0,0)
   * 5  Brown  (127,0,0)
   * 6  Purple  (156,0,156)
   * 7  Orange  (252,127,0)
   * 8  Yellow  (255,255,0)
   * 9  Light Green  (0,252,0)
   * 10  Cyan  (0,147,147)
   * 11  Light Cyan  (0,255,255)
   * 12  Light Blue  (0,0,252)
   * 13  Pink  (255,0,255)
   * 14  Grey  (127,127,127)
   * 15  Light Grey  (210,210,210)
   */
  final public const int COLOR_WHITE = 0;
  final public const int COLOR_BLACK = 1;
  final public const int COLOR_BLUE = 2;
  final public const int COLOR_GREEN = 3;
  final public const int COLOR_LIGHT_RED = 4;
  final public const int COLOR_DARK_RED = 5;
  final public const int COLOR_PURPLE = 6;
  final public const int COLOR_ORANGE = 7;
  final public const int COLOR_YELLOW = 8;
  final public const int COLOR_LIGHT_GREEN = 9;
  final public const int COLOR_CYAN = 10;
  final public const int COLOR_LIGHT_CYAN = 11;
  final public const int COLOR_LIGHT_BLUE = 12;
  final public const int COLOR_PINK = 13;
  final public const int COLOR_GREY = 14;
  final public const int COLOR_LIGHT_GREY = 15;

  static function colorize(string $message, int $color): string
  {
    return sprintf(
      $color < 10 ? '%s0%s%s%s' : '%s%s%s%s',
      chr(03),
      $color,
      $message,
      chr(03)
    );
  }
}
