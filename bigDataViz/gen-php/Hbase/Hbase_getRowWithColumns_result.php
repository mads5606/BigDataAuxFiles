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

class Hbase_getRowWithColumns_result extends TBase
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        0 => array(
            'var' => 'success',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRUCT,
            'elem' => array(
                'type' => TType::STRUCT,
                'class' => '\Hbase\TRowResult',
                ),
        ),
        1 => array(
            'var' => 'io',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Hbase\IOError',
        ),
    );

    /**
     * @var \Hbase\TRowResult[]
     */
    public $success = null;
    /**
     * @var \Hbase\IOError
     */
    public $io = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            parent::__construct(self::$_TSPEC, $vals);
        }
    }

    public function getName()
    {
        return 'Hbase_getRowWithColumns_result';
    }


    public function read($input)
    {
        return $this->_read('Hbase_getRowWithColumns_result', self::$_TSPEC, $input);
    }


    public function write($output)
    {
        return $this->_write('Hbase_getRowWithColumns_result', self::$_TSPEC, $output);
    }

}
