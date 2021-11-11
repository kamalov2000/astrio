<?php
interface Box
{
    public function setData($key, $value);
    public function getData($key);
    public function save();
    public function load();
}

abstract class BoxAbstract implements Box
{
    protected $data = [];

    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getData($key)
    {
        return $this->data[$key] ?? null;
    }

}

class FileBox extends BoxAbstract
{
    private $props = [];
    private static $instance;

    public function __construct() {}

    public function getInstance()
    {
      if ( empty(self::$instance)) {
        self::$instance = new static;
      }
    }

    public function save(string $key, string $value)
    {
      $this->props[$key] = $value;
    }

    public function load(string $key)
    {
        return $this->props[$key];
    }

}

$box = FileBox::getInstance();
$box->save("key1", "val1");
unset($box);
$box1 = FileBox::getInstance();
