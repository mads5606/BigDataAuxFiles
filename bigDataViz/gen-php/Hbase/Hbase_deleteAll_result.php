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

class Hbase_deleteAll_result extends TBase
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'io',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\Hbase\IOError',
        ),
    );

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
        return 'Hbase_deleteAll_result';
    }


    public function read($input)
    {
        return $this->_read('Hbase_deleteAll_result', self::$_TSPEC, $input);
    }


    public function write($output)
    {
        return $this->_write('Hbase_deleteAll_result', self::$_TSPEC, $output);
    }

}
