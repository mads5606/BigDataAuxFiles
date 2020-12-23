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
 * An HColumnDescriptor contains information about a column family
 * such as the number of versions, compression settings, etc. It is
 * used as input when creating a table or adding a column.
 */
class ColumnDescriptor extends TBase
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'name',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'maxVersions',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        3 => array(
            'var' => 'compression',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        4 => array(
            'var' => 'inMemory',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        5 => array(
            'var' => 'bloomFilterType',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        6 => array(
            'var' => 'bloomFilterVectorSize',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        7 => array(
            'var' => 'bloomFilterNbHashes',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        8 => array(
            'var' => 'blockCacheEnabled',
            'isRequired' => false,
            'type' => TType::BOOL,
        ),
        9 => array(
            'var' => 'timeToLive',
            'isRequired' => false,
            'type' => TType::I32,
        ),
    );

    /**
     * @var string
     */
    public $name = null;
    /**
     * @var int
     */
    public $maxVersions = 3;
    /**
     * @var string
     */
    public $compression = "NONE";
    /**
     * @var bool
     */
    public $inMemory = false;
    /**
     * @var string
     */
    public $bloomFilterType = "NONE";
    /**
     * @var int
     */
    public $bloomFilterVectorSize = 0;
    /**
     * @var int
     */
    public $bloomFilterNbHashes = 0;
    /**
     * @var bool
     */
    public $blockCacheEnabled = false;
    /**
     * @var int
     */
    public $timeToLive = -1;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            parent::__construct(self::$_TSPEC, $vals);
        }
    }

    public function getName()
    {
        return 'ColumnDescriptor';
    }


    public function read($input)
    {
        return $this->_read('ColumnDescriptor', self::$_TSPEC, $input);
    }


    public function write($output)
    {
        return $this->_write('ColumnDescriptor', self::$_TSPEC, $output);
    }

}
