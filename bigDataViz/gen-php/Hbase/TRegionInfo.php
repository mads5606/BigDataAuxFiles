<?php
namespace Hbase;

/**
 * Autogenerated by Thrift Compiler (0.14.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

/**
 * A TRegionInfo contains information about an HTable region.
 */
class TRegionInfo extends TBase
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'startKey',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'endKey',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'id',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        4 => array(
            'var' => 'name',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        5 => array(
            'var' => 'version',
            'isRequired' => false,
            'type' => TType::BYTE,
        ),
        6 => array(
            'var' => 'serverName',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        7 => array(
            'var' => 'port',
            'isRequired' => false,
            'type' => TType::I32,
        ),
    );

    /**
     * @var string
     */
    public $startKey = null;
    /**
     * @var string
     */
    public $endKey = null;
    /**
     * @var int
     */
    public $id = null;
    /**
     * @var string
     */
    public $name = null;
    /**
     * @var int
     */
    public $version = null;
    /**
     * @var string
     */
    public $serverName = null;
    /**
     * @var int
     */
    public $port = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            parent::__construct(self::$_TSPEC, $vals);
        }
    }

    public function getName()
    {
        return 'TRegionInfo';
    }


    public function read($input)
    {
        return $this->_read('TRegionInfo', self::$_TSPEC, $input);
    }


    public function write($output)
    {
        return $this->_write('TRegionInfo', self::$_TSPEC, $output);
    }

}