<?php
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

class THBaseService_truncateTable_args
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'tableName',
            'isRequired' => true,
            'type' => TType::STRUCT,
            'class' => '\TTableName',
        ),
        2 => array(
            'var' => 'preserveSplits',
            'isRequired' => true,
            'type' => TType::BOOL,
        ),
    );

    /**
     * the tablename to truncate
     * 
     * @var \TTableName
     */
    public $tableName = null;
    /**
     * whether to  preserve previous splits
     * 
     * @var bool
     */
    public $preserveSplits = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['tableName'])) {
                $this->tableName = $vals['tableName'];
            }
            if (isset($vals['preserveSplits'])) {
                $this->preserveSplits = $vals['preserveSplits'];
            }
        }
    }

    public function getName()
    {
        return 'THBaseService_truncateTable_args';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRUCT) {
                        $this->tableName = new \TTableName();
                        $xfer += $this->tableName->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->preserveSplits);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('THBaseService_truncateTable_args');
        if ($this->tableName !== null) {
            if (!is_object($this->tableName)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('tableName', TType::STRUCT, 1);
            $xfer += $this->tableName->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->preserveSplits !== null) {
            $xfer += $output->writeFieldBegin('preserveSplits', TType::BOOL, 2);
            $xfer += $output->writeBool($this->preserveSplits);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
