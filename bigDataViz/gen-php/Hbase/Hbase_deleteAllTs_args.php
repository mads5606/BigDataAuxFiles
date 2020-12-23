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

class Hbase_deleteAllTs_args extends TBase
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'tableName',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'row',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'column',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        4 => array(
            'var' => 'timestamp',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        5 => array(
            'var' => 'attributes',
            'isRequired' => false,
            'type' => TType::MAP,
            'ktype' => TType::STRING,
            'vtype' => TType::STRING,
            'key' => array(
                'type' => TType::STRING,
            ),
            'val' => array(
                'type' => TType::STRING,
                ),
        ),
    );

    /**
     * name of table
     * 
     * @var string
     */
    public $tableName = null;
    /**
     * Row to update
     * 
     * @var string
     */
    public $row = null;
    /**
     * name of column whose value is to be deleted
     * 
     * @var string
     */
    public $column = null;
    /**
     * timestamp
     * 
     * @var int
     */
    public $timestamp = null;
    /**
     * Delete attributes
     * 
     * @var array
     */
    public $attributes = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            parent::__construct(self::$_TSPEC, $vals);
        }
    }

    public function getName()
    {
        return 'Hbase_deleteAllTs_args';
    }


    public function read($input)
    {
        return $this->_read('Hbase_deleteAllTs_args', self::$_TSPEC, $input);
    }


    public function write($output)
    {
        return $this->_write('Hbase_deleteAllTs_args', self::$_TSPEC, $output);
    }

}
