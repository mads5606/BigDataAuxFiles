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

class Hbase_getColumnDescriptors_args extends TBase
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'tableName',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
    );

    /**
     * table name
     * 
     * @var string
     */
    public $tableName = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            parent::__construct(self::$_TSPEC, $vals);
        }
    }

    public function getName()
    {
        return 'Hbase_getColumnDescriptors_args';
    }


    public function read($input)
    {
        return $this->_read('Hbase_getColumnDescriptors_args', self::$_TSPEC, $input);
    }


    public function write($output)
    {
        return $this->_write('Hbase_getColumnDescriptors_args', self::$_TSPEC, $output);
    }

}
