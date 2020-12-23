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

class Hbase_scannerOpen_args extends TBase
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'tableName',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'startRow',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'columns',
            'isRequired' => false,
            'type' => TType::LST,
            'etype' => TType::STRING,
            'elem' => array(
                'type' => TType::STRING,
                ),
        ),
        4 => array(
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
     * Starting row in table to scan.
     * Send "" (empty string) to start at the first row.
     * 
     * @var string
     */
    public $startRow = null;
    /**
     * columns to scan. If column name is a column family, all
     * columns of the specified column family are returned. It's also possible
     * to pass a regex in the column qualifier.
     * 
     * @var string[]
     */
    public $columns = null;
    /**
     * Scan attributes
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
        return 'Hbase_scannerOpen_args';
    }


    public function read($input)
    {
        return $this->_read('Hbase_scannerOpen_args', self::$_TSPEC, $input);
    }


    public function write($output)
    {
        return $this->_write('Hbase_scannerOpen_args', self::$_TSPEC, $output);
    }

}
