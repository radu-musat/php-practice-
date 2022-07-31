<?php
class BaseTool {
    public static $name = 'BaseTool';
    public static function getName() {
        return static::$name;
    }
}

class HammerTool extends Basetool {
    public static $name = 'hammer';
}

echo HammerTool::getName();
