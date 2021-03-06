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
 * An IOError exception signals that an error occurred communicating
 * to the Hbase master or an Hbase region server.  Also used to return
 * more general Hbase error conditions.
 */
class IOError extends TException
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'message',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
    );

    /**
     * @var string
     */
    public $message = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            parent::__construct(self::$_TSPEC, $vals);
        }
    }

    public function getName()
    {
        return 'IOError';
    }


    public function read($input)
    {
        return $this->_read('IOError', self::$_TSPEC, $input);
    }


    public function write($output)
    {
        return $this->_write('IOError', self::$_TSPEC, $output);
    }

}
